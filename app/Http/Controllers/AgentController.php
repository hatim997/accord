<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Agent;
use App\Models\Notice;
use App\Models\Policy;
use App\Models\PolicyType;
use App\Models\AgencyInfos;
use App\Models\PolicyLimit;
use App\Models\DriverDetail;
use App\Models\TruckDetail;
use App\Models\Certificate;
use App\Models\CertificatePolicy;
use App\Models\CertificatePolicyLimit;
use App\Models\InsuranceProvider;
use App\Models\AgentDriver;
use App\Services\CertificateService;
use App\Models\Subscription;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;
use Mail;
use Illuminate\Validation\ValidationException;

use Barryvdh\DomPDF\Facade\Pdf as PDF;

class AgentController extends Controller
{
  protected $agency;

  public function __construct(AgencyInfos $agency)
  {
    $this->middleware('checkRole:agent');
    $this->agency = $agency;
  }

  public function dash()
  {
    $users = User::all();
    $userId = Auth::user()->id;

    $monthExp = CertificatePolicy::whereDate('expiry_date', '<=', Carbon::now()->addDays(30))->count();
    $weekExp = CertificatePolicy::whereDate('expiry_date', '<=', Carbon::now()->addDays(7))->count();
    $insuredCnt = Certificate::where('producer_user_id', Auth::user()->id)->distinct()->count('client_user_id');

    $agencyinfo = $this->agency->getByUserId($userId);
    $brokersinfo = $this->agency->getBrokersByAgency($userId);

    return view('dash', compact('users', 'monthExp', 'weekExp', 'insuredCnt', 'agencyinfo', 'brokersinfo'));
  }

  public function formlist()
  {
    $driver = AgentDriver::where('agent_id',Auth::user()->id)
    ->join('driver_details', 'driver_details.user_id', '=', 'agent_driver.driver_id')
    ->join('users', 'users.id', '=', 'driver_details.user_id')    
    ->select('agent_driver.*', 'driver_details.*', 'users.name as user_name',  
    'users.role','users.email')    
    ->get();
    return view('agent.formlist', compact('driver'));
  }
  public function update_driver(Request $request)
  {
      // $driver = User::find($request->driver_id);
      // $driver->user_name = $request->user_name;
      // // Update other fields as necessary
      // $driver->save();
  
      return redirect()->back()->with('success', 'Driver information updated successfully!');
  }
  public function get_driver( $id)
  {
    $records = TruckDetail::where('user_id' , $id)->count('truck_details.id'); // Replace 'your_table' with your actual table name


      return $records;
  }



  /**
   * Show the form for creating a new resource.
   */
  public function choosePolicyTypes($id)
  {
    $policytypes = PolicyType::all();
    Session::put('driver_id', $id);
    return view('fromdrop', compact('policytypes'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(Request $request)
  {
    $customOrder = [
      'General Liability',
      'Auto Liability',
      'Trailer Interchange',
      'Umbrella',
      'Work Comp Employers Liability',
      'Cargo',
      'Contingent Cargo',
      'Ref. Trailer',
      'Employee Dishonesty',
  ];
    $policytypes = PolicyType::with('policies', 'policyLimits', 'certificateUmbrellas')
      ->whereIn('id', $request->policyGroup)
      ->orderByRaw('FIELD(type_name, "'.implode('","', $customOrder).'")')
      ->get();

    $allpolicytypes = PolicyType::whereNotIn('id', $request->policyGroup)
    ->orderByRaw('FIELD(type_name, "'.implode('","', $customOrder).'")')
    ->get();

    $r=0;

    $insurProviders = InsuranceProvider::all();

    $driver_id = Session::get('driver_id');

    $driver = User::with('truckers')->find($driver_id);
    $agent = User::with('agencies')->find(Auth::user()->id);

    return view('agent.form3', compact('policytypes', 'driver', 'agent', 'r', 'allpolicytypes', 'insurProviders'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request, CertificateService $certificateService)
  {
    $resp = $certificateService->store($request->all());
    // return dd($request);
    return redirect()->route('formlist');
  }

  /**
   * Display the specified resource.
   */
  public function MainCertificate(string $driverId)
  {
    $certificate = Certificate::where('client_user_id', $driverId)->get() ?? '';
    return view('agent.certificate_main', compact('certificate', 'driverId'));
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $certificate = Certificate::with('policies', 'policyLimits')
      ->where('id', $id)
      ->first();
    $certPolicy = CertificatePolicy::with('policyType', 'policy')
      ->where('certificate_id', $certificate->id)
      ->get();
    $driver = User::with('truckers')->find($certificate->client_user_id);
    $agent = User::with('agencies')->find($certificate->producer_user_id);
    return view('agent.certificate_list', compact('certificate', 'certPolicy', 'driver', 'agent'));
  }

  public function showCertificate(string $id)
  {
    $certificate = Certificate::with('policies', 'policyLimits', 'certificateUmbrellas')
      ->where('id', $id)
      ->first();

    $certPolicy = CertificatePolicy::with('policyType', 'policy')
      ->where('certificate_id', $certificate->id)
      ->get();

    $certPolimit = CertificatePolicyLimit::with('certificate', 'policyType', 'policyLimit')
      ->where('certificate_id', $certificate->id)
      ->get();

    $policytypes = PolicyType::with('policies', 'policyLimits')
      ->whereIn('id', $certPolicy->map->only(['policy_type_id']))
      ->get();

      $allpolicytypes = PolicyType::with('policies', 'policyLimits')
      ->whereNotIn('id', $certPolicy->map->only(['policy_type_id']))
      ->get();

    $r = 1;

    $driver = User::with('truckers')->find($certificate->client_user_id);
    $agent = User::with('agencies')->find($certificate->producer_user_id);

    $insurProviders = InsuranceProvider::all();

    $data = [
      'certificate' => $certificate,
      'policytypes' => $policytypes,
      'certPolicy' => $certPolicy,
      'certPolimit' => $certPolimit,
      'driver' => $driver,
      'agent' => $agent,
    ]; 

    return view(
      'agent.form23',
      compact('certificate', 'policytypes', 'certPolicy', 'certPolimit', 'driver', 'agent', 'r', 'allpolicytypes', 'insurProviders')
    );
  }

  public function showPDF(string $id)
  {
    $certificate = Certificate::with('policies', 'policyLimits', 'certificateUmbrellas')
      ->where('id', $id)
      ->first();

    $certPolicy = CertificatePolicy::with('policyType', 'policy')
      ->where('certificate_id', $certificate->id)
      ->get();

    $certPolimit = CertificatePolicyLimit::with('certificate', 'policyType', 'policyLimit')
      ->where('certificate_id', $certificate->id)
      ->get();

      $customOrder = [
        'General Liability',
        'Auto Liability',
        'Trailer Interchange',
        'Umbrella',
        'Work Comp Employers Liability'
    ];

    $policyExistTypes = PolicyType::with('policies', 'policyLimits')
    ->whereIn('id', $certPolicy->map->only(['policy_type_id']))
    ->orderByRaw('FIELD(type_name, "'.implode('","', $customOrder).'")')
    ->get();

    $insurProviders = InsuranceProvider::all();
    $policyNotExistTypes = PolicyType::with('policies', 'policyLimits')
    ->whereNotIn('id', $certPolicy->map->only(['policy_type_id']))
    ->orderByRaw('FIELD(type_name, "'.implode('","', $customOrder).'")')
    ->get();

    $policytypes = $policyExistTypes->merge($policyNotExistTypes);

    $policytypes = $policytypes->sortBy(function ($el) use ($customOrder) {
        // Get the index of the current fruit in the custom order array
        $index = array_search($el->type_name, $customOrder);
        // If the fruit is not found in the custom order array, assign a high index
        return $index === false ? count($customOrder) : $index;
    });
    $r = 1;

    $driver = User::with('truckers')->find($certificate->client_user_id);
    $agent = User::with('agencies')->find($certificate->producer_user_id);
    $data = compact('certificate', 'policytypes', 'certPolicy', 'insurProviders', 'certPolimit', 'driver', 'agent', 'r');
    $view = 'agent.form_pdf5';
    $cert = 'certificate.pdf';
    $pdf = PDF::loadView($view, $data)->setPaper('a4', 'portrait');
    return $pdf->stream($cert);
    // return view($view , $data);
  }

  public function showPDF2(string $id)
  {
    $certificate = Certificate::with('policies', 'policyLimits')
      ->where('id', $id)
      ->first();

    $certPolicy = CertificatePolicy::with('policyType', 'policy', 'policyType.certificatePolicies')
      ->where('certificate_id', $certificate->id)
      ->get();

    $certPolimit = CertificatePolicyLimit::with('certificate', 'policyType', 'policyLimit')
      ->where('certificate_id', $certificate->id)
      ->get();

      $customOrder = [
        'General Liability',
        'Auto Liability',
        'Cargo',
        'RAILER INTERCHANGEPHYSICAL DAMAG',
        'UMBRELLA LIA',
        'WORKERS COMPENSATION'
    ];

    $policyExistTypes = PolicyType::with('policies', 'policyLimits')
    ->whereIn('id', $certPolicy->map->only(['policy_type_id']))
    ->orderByRaw('FIELD(type_name, "'.implode('","', $customOrder).'")')
    ->get();

    $policyNotExistTypes = PolicyType::with('policies', 'policyLimits')
    ->whereNotIn('id', $certPolicy->map->only(['policy_type_id']))
    ->orderByRaw('FIELD(type_name, "'.implode('","', $customOrder).'")')
    ->get();

    $policytypes = $policyExistTypes->merge($policyNotExistTypes);

    $policytypes = $policytypes->sortBy(function ($el) use ($customOrder) {
        // Get the index of the current fruit in the custom order array
        $index = array_search($el->type_name, $customOrder);
        // If the fruit is not found in the custom order array, assign a high index
        return $index === false ? count($customOrder) : $index;
    });

    $r = 1;

    $driver = User::with('truckers')->find($certificate->client_user_id);
    $agent = User::with('agencies')->find($certificate->producer_user_id);

    $data = compact('certificate', 'policytypes', 'certPolicy', 'certPolimit', 'driver', 'agent', 'r');

    $view = 'agent.form_pdf5';
    $cert = 'certificate.pdf';

    $pdf = PDF::loadView($view, $data)->setPaper('a4', 'portrait');
    return $pdf->stream($cert);

    // return view($view , $data);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function editCertificatee(string $id)
  {
    $certificate = Certificate::with('policies', 'policyLimits', 'certificateUmbrellas')
      ->where('id', $id)
      ->first();

    $certPolicy = CertificatePolicy::with('policyType', 'policy')
      ->where('certificate_id', $certificate->id)
      ->get();

    $certPolimit = CertificatePolicyLimit::with('certificate', 'policyType', 'policyLimit')
      ->where('certificate_id', $certificate->id)
      ->get();

    $policytypes = PolicyType::with('policies', 'policyLimits')
      ->whereIn('id', $certPolicy->map->only(['policy_type_id']))
      ->get();

      $allpolicytypes = PolicyType::with('policies', 'policyLimits')
      ->whereNotIn('id', $certPolicy->map->only(['policy_type_id']))
      ->get();

     $insurProviders = InsuranceProvider::all();
     $userId = Auth::user()->id;
    $driver = User::with('truckers')->find($certificate->client_user_id);
    $agent = User::with('agencies')->find($certificate->producer_user_id);
    $shipper = User::with('drives','shippers')->find($userId);
     //dd($certPolicy);
      // dd($shipper);
    $data = [
      'certificate' => $certificate,
      'policytypes' => $policytypes,
      'certPolicy' => $certPolicy,
      'certPolimit' => $certPolimit,
      'driver' => $driver,
      'agent' => $agent
    ];

    $options = ([
      'dpi' => 100,
      'defaultFont' => 'sans-serif',
      'fontHeightRatio' => 1,
      'isPhpEnabled' => true,
    ]);
$r=0;
    // $pdf = Pdf::loadView('agent.form_cert', $data);
    // $pdf->setOptions($options);
    // $pdf->setPaper('L', 'landscape');
    // return $pdf->download('cert_pdf.pdf');

    return view(
      'freight.form_edited',
      compact('certificate', 'policytypes', 'certPolicy','shipper', 'certPolimit', 'driver', 'agent', 'r', 'allpolicytypes', 'insurProviders')
    );


  }












  public function editCertificate(string $id)
  {
    $certificate = Certificate::with('policies', 'policyLimits', 'certificateUmbrellas')
      ->where('id', $id)
      ->first();

    $certPolicy = CertificatePolicy::with('policyType', 'policy')
      ->where('certificate_id', $certificate->id)
      ->get();

    $certPolimit = CertificatePolicyLimit::with('certificate', 'policyType', 'policyLimit')
      ->where('certificate_id', $certificate->id)
      ->get();

    $policytypes = PolicyType::with('policies', 'policyLimits')
      ->whereIn('id', $certPolicy->map->only(['policy_type_id']))
      ->get();

      $allpolicytypes = PolicyType::with('policies', 'policyLimits')
      ->whereNotIn('id', $certPolicy->map->only(['policy_type_id']))
      ->get();

     $insurProviders = InsuranceProvider::all();

    $driver = User::with('truckers')->find($certificate->client_user_id);
    $agent = User::with('agencies')->find($certificate->producer_user_id);

     //dd($certPolicy);

    $data = [
      'certificate' => $certificate,
      'policytypes' => $policytypes,
      'certPolicy' => $certPolicy,
      'certPolimit' => $certPolimit,
      'driver' => $driver,
      'agent' => $agent
    ];

    $options = ([
      'dpi' => 100,
      'defaultFont' => 'sans-serif',
      'fontHeightRatio' => 1,
      'isPhpEnabled' => true,
    ]);
$r=0;
    // $pdf = Pdf::loadView('agent.form_cert', $data);
    // $pdf->setOptions($options);
    // $pdf->setPaper('L', 'landscape');
    // return $pdf->download('cert_pdf.pdf');

    return view(
      'agent.form_edited',
      compact('certificate', 'policytypes', 'certPolicy', 'certPolimit', 'driver', 'agent', 'r', 'allpolicytypes', 'insurProviders')
    );


  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request , CertificateService $certificateService)
  {
     $resp = $certificateService->update($request->all());

     if(Auth::user()->hasRole('admin')){
      return redirect()->route('dashs');
     }
     return redirect()->route('formlist');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }

  public function add_trucker()
  {
    return view('agent.add-trucker');
  }

  public function add_broker()
  {
    return view('agent.add-broker');
  }

  public function store_trucker(Request $request)
  {
    $userId = Auth::user()->id;
    $validatedDataa = Validator::make($request->all(), [
      'name' => 'required',
      'fname' => 'required',
      'mname' => 'required',
      'lname' => 'required',
      'suffix' => 'required',
      'salutation' => 'required',
      'prefix' => 'required',
      'websit' => 'sometimes',
      'tax' => 'required',
      'password1' => 'required',
      'email' => 'required|email|unique:users',
      'Addss' => 'sometimes',
      'Addss2' => 'sometimes',
      'fullname' => 'sometimes',
      'city' => 'required',
      'state' => 'sometimes',
      'zip' => 'sometimes',
      'phone' => 'sometimes',
      'altemail' => 'sometimes',
      'role' => 'sometimes', 
      'subs_id' => 'sometimes',
    ]);

    if ($validatedDataa->fails())
    {
      return Redirect::back()->withErrors($validatedDataa)->withInput();
    }

    $currentDate = Carbon::now();
    $endDate = $currentDate->copy()->addDays(30);
    $validatedData = $validatedDataa->validated();

    $names = $validatedData['fname'];
    $email = $validatedData['email'];
    $password = $validatedData['password1']; 

    if ($validatedData['role'] == 'freight_driver') {

      $user = User::create([
        'name' => $validatedData['fname'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password1']),
        'role' => 'freight_driver',
        'status' => "1"
      ]);

      $lastInsertedId = $user->id;
      $name = "";
      if(!empty($request->file('imagePath'))){
        $file  = $request->file('imagePath');
        $name = Carbon::now()->timestamp . '_' . $lastInsertedId . '.' . $file->extension();
        $file->storeAs('public/uploads_agent_broker_license', $name);
      }

      DriverDetail::create([
        'user_id' =>$lastInsertedId ,
        'name' => $request->name,
        'title' => $request->title,
        'mname' => $request->mname,
        'lname' => $request->lname,
        'suffix' => $request->suffix,
        'salutation' => $request->salutation,
        'prefix' => $request->prefix,
        'address' => $request->address,
        'address2' => $request->address2,
        'zip' => $request->zip,
        'websit' => $request->websit,
        'city' => $request->city,
        'tax' => $request->tax,
        'scac' => $request->scac,
        'usdot' => $request->usdot,
        'state' => $request->state,
        'cellphone' => $request->cellphone,
        'extra_email' => $request->extra_email,
        'fname' => $request->fname,
        'mc_number' => $request->mc_number,
        'is_active' => "1",
        'image_path' => $name,
        'fax' => $request->fax,
     ]);

      Subscription::create([
        'user_id' => $lastInsertedId,
        'plan_id' => '1',
        'start_date' =>  $currentDate,
        'end_date' => $endDate,
        'status' => 'Active',
      ]);

      Notice::create([
        'to' => $lastInsertedId,
        'from' => $userId,
        'name' => "Freight Driver added by ".$userId,
      ]);

      AgentDriver::create([
        'agent_id' => $userId,
        'driver_id' => $lastInsertedId,
        'relation_status' => 1
      ]);

      $data = [
        'name' => $names,
        'email' => $email,
        'password' => $password
    ];

    Mail::send('email.login', $data, function ($message) use ($email, $names,$password) {
        $message->to($email, $names)
                ->subject('Register');
    });



      return Redirect::back()->with('success' , 'Freight driver created successfully!');
    }

    if ($validatedData['role'] == 'truck_driver') {

      $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make('123'),
        'role' => 'truck_driver', // Assuming default role ID for 'user'
        'status' => "1"
      ]);

      $lastInsertedId = $user->id;

      if(!empty($request->file('imagePath'))){
        $file  = $request->file('imagePath');
        $name = Carbon::now()->timestamp . '_' . $lastInsertedId . '.' . $file->extension();
        $file->storeAs('public/uploads_agent_trucker_license', $name);
      }

      DriverDetail::create([
        'user_id' =>$lastInsertedId ,
        'name' => $request->name,
        'title' => $request->title,
        'mname' => $request->mname,
        'lname' => $request->lname,
        'suffix' => $request->suffix,
        'salutation' => $request->salutation,
        'prefix' => $request->prefix,
        'address' => $request->address,
        'address2' => $request->address2,
        'zip' => $request->zip,
        'websit' => $request->websit,
        'tax' => $request->tax,
        'city' => $request->city,
        'license_number' => $request->license_number,
        'license_expiry_date' => $request->license_expiry_date,
        'license_type' => $request->license_type,
        'years_of_experience' => $request->years_of_experience,
        'vehicle_registration_number' => $request->vehicle_registration_number,
        'vehicle_make' => $request->vehicle_make,
        'vehicle_model' => $request->vehicle_model,
        'vehicle_year' => $request->vehicle_year,
        'vehicle_capacity' => $request->vehicle_capacity,
        'vehicle_status' => $request->vehicle_status,
        'scac' => $request->scac,
        'usdot' => $request->usdot,
        'state' => $request->state,
        'cellphone' => $request->cellphone,
        'extra_email' => $request->extra_email,
        'fname' => $request->fname,
        'mc_number' => $request->mc_number,
        'is_active' => "1",
        'image_path' => $name,
        'fax' => $request->fax,
     ]);

      Notice::create([
        'to' => $lastInsertedId,
        'from' => $userId,
        'name' => "Truck Driver added by ".$userId,
      ]);

      Subscription::create([
        'user_id' => $lastInsertedId,
        'plan_id' => '1',
        'start_date' =>  $currentDate,
        'end_date' => $endDate,
        'status' => 'Active',
      ]);

      AgentDriver::create([
        'agent_id' => $userId,
        'driver_id' => $lastInsertedId,
        'relation_status' => 1
      ]);

      $data = [
        'name' => $names,
        'email' => $email,
         'password' => $password
    ];

    Mail::send('email.login', $data, function ($message) use ($email, $names,$password) {
        $message->to($email, $names)
                ->subject('Register');
    });
    return redirect()->route('formlist');
  }
}
}
