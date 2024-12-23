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
use App\Models\Openrequest;
use App\Services\CertificateService;
use App\Models\Subscription;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
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


  public function getagency()
  {
     $certificate = InsuranceProvider::all();
return view('agent.agency', compact('certificate'));
  }


  public function getcert($id)
  {
    $certificates = Certificate::where('client_user_id', $id)
    ->with(['certificatePolicies.policyType' => function($query) {
        $query->select('id', 'type_name');
    }])
    ->get();
  //   foreach ($certificates as $certificate) {
  //     echo 'Certificate ID: ' . $certificate->id . '<br>';
  //     echo 'Certificate client_user_id: ' . $certificate->client_user_id . '<br>';

  //     if ($certificate->certificatePolicies->isEmpty()) {
  //         echo 'No policies found for this certificate.<br>';
  //     } else {
  //         // Grouping the policies by policy_type_id
  //         $groupedPolicies = $certificate->certificatePolicies->groupBy('policy_type_id');

  //         foreach ($groupedPolicies as $policyTypeId => $policies) {
  //             // Get the name of the policy type
  //             $policyTypeName = optional($policies->first()->policyType)->type_name ?? 'No Policy Type';
  //             echo 'Policy Type ID: ' . $policyTypeId . '<br>';
  //             echo 'Policy Type Name: ' . $policyTypeName . '<br>';

  //             // Display only one policy from the group
  //             $firstPolicy = $policies->first(); // Get the first policy in the group
  //             echo 'Policy Number: ' . $firstPolicy->policy_number . '<br>';
  //             echo 'Start Date: ' . $firstPolicy->start_date . '<br>';
  //             echo 'Expiry Date: ' . $firstPolicy->expiry_date . '<br>';
  //             echo '<br>'; // Add some space between different policy types
  //         }
  //     }
  // }


    //  dd($certificate);
    return $certificates ;
  }
  public function agentprofiles()
  {
    $userId = Auth::user()->id;

    $driverdetail = User::with('agencies')->where('id', $userId)->get();


   return view('agent.profile' , compact('driverdetail'));
  }
  public function userplan($id)
  {
      // Retrieve the user and related data
      $user = User::find($id);

      $userviewlist = User::with(['subscription.subscriptionPlan', 'agencies', 'truckers', 'subscription', 'shippers', 'freights'])
                          ->where('id', $id)
                          ->get();


      // Retrieve the subscription with plan details
      $subscription = Subscription::with('subscriptionPlan')->where('user_id', $id)->first();
      // dd($subscription);

      // Initialize progress and days remaining
      $progressPercentage = 0;
      $daysRemaining = 0;

      // Calculate the progress and days remaining if subscription exists
      if ($subscription) {
          $endDate = Carbon::parse($subscription->end_date);
          $currentDate = Carbon::now();

          // Check if end_date is in the current month
          if ($endDate->year == $currentDate->year && $endDate->month == $currentDate->month) {
              $daysInMonth = $endDate->daysInMonth;
              $daysRemaining = $currentDate->diffInDays($endDate, false);
              $progressPercentage = 100 - (($daysRemaining / $daysInMonth) * 100);
              $daysRemaining = max(0, $daysRemaining); // Ensure days remaining doesn't go negative
          }
      }

      return view('agent.plan', compact('userviewlist', 'subscription', 'progressPercentage', 'daysRemaining'));
  }
  public function billinguser()
  {
      $userId = Auth::user()->id;

      $billing = DB::table('orders')
          ->join('subscriptions', 'orders.subscription_id', '=', 'subscriptions.id')
          ->join('users', 'subscriptions.user_id', '=', 'users.id')
          ->join('subscription_plans', 'subscriptions.plan_id', '=', 'subscription_plans.id')
          ->where('users.id', '=', $userId)
          ->select(
              'subscription_plans.name as plan_name',
              'orders.price as order_price',
              'orders.issue_date as order_date',
              'orders.invoice as order_invoice',
              'subscriptions.start_date',
              'subscriptions.end_date'
          )
          ->get();

      // Calculate the duration in years or months
      $billing = $billing->map(function ($item) {
          $start = Carbon::parse($item->start_date);
          $end = Carbon::parse($item->end_date);

          // Check if the difference is in years, months, or days and display accordingly
          if ($start->diffInYears($end) >= 1) {
              $item->plan_duration = $start->diffInYears($end) . ' year(s)';
          } elseif ($start->diffInMonths($end) >= 1) {
              $item->plan_duration = $start->diffInMonths($end) . ' month(s)';
          } else {
              $item->plan_duration = $start->diffInDays($end) . ' day(s)';
          }

          return $item;
      });

      return view('agent.billing', compact('billing'));
  }
  public function proupd(Request $request)
  {
    $userId = Auth::user()->id;

    $user =   user::find($userId);

    $user->name = $request->input('username');
$user->save();


    $driver = AgencyInfos::find($request->id);


    if ($driver) {
        $driver->name = $request->input('name');
        $driver->mname = $request->input('mname');
        $driver->lname = $request->input('lname');
        $driver->ialn = $request->input('ialn');
        $driver->suffix = $request->input('suffix');
        $driver->title = $request->input('title');
        $driver->websit = $request->input('websit');
        $driver->extra_email = $request->input('altemail');
        $driver->cellphone = $request->input('cellphone');
        $driver->address = $request->input('Addss');
        $driver->address2 = $request->input('Addss2');
        $driver->state = $request->input('state');
        $driver->city = $request->input('city');
        $driver->zip = $request->input('zip');

        $driver->save();
    }
    return redirect()->back()->with('success', 'User  updated successfully!');


  }

  public function checkpass(Request $request)
  {
    $request->validate([
      'password' => 'required',
      'newpass' => 'required|min:8|confirmed',
  ]);

      // Get the currently authenticated user
      $user = Auth::user();

      // Check if the provided current password matches the user's actual password
      if (!Hash::check($request->password, $user->password)) {
          return response()->json(['status' => 'error', 'message' => 'The current password is incorrect.'], 422);
      }

      // Update the user's password
      $user->password = Crypt::encryptString($request->newpass);
      $user->save();

      Auth::logout();
      Session::flush(); // Destroy all sessions
      $cookies = Cookie::get();
      foreach ($cookies as $name => $value) {
        Cookie::queue(Cookie::forget($name));
      }
      // Return a success response
      return response()->json(['status' => 'success', 'message' => 'Password updated successfully!']);

  }

  public function dash()
  {
    $users = User::all();
    $userId = Auth::user()->id;
    // $monthExp = CertificatePolicy::whereDate('expiry_date', '<=', Carbon::now()->addDays(30))->count();
    $monthExp = CertificatePolicy::whereHas('certificate', function($query) use ($userId) {
      $query->where('producer_user_id', $userId);
  })
  ->whereDate('expiry_date', '<=', Carbon::now()->addDays(30))
  ->groupBy('policy_type_id')
  ->select('policy_type_id') // Select policy_type_id to group by
  ->get() // Get the results
  ->count(); // Count the total grouped rows
    // $weekExp = CertificatePolicy::whereDate('expiry_date', '<=', Carbon::now()->addDays(7))->count();
    $weekExp =  CertificatePolicy::whereHas('certificate', function($query) use ($userId) {
      $query->where('producer_user_id', $userId);
  })
  ->whereDate('expiry_date', '<=', Carbon::now()->addDays(7))
  ->groupBy('policy_type_id')
  ->select('policy_type_id') // Select policy_type_id to group by
  ->get() // Get the results
  ->count(); // Count the total grouped rows

  $query = "
  SELECT * ,policy_types.type_name as names
  FROM certificate_policies
  JOIN certificates ON certificate_policies.certificate_id = certificates.id
  JOIN  policy_types ON certificate_policies.policy_type_id = policy_types.id
  WHERE certificates.producer_user_id = ?
  AND certificate_policies.expiry_date <= DATE_ADD(NOW(), INTERVAL 30 DAY)
  GROUP BY policy_type_id
";

$results = DB::select($query, [$userId]);

$monthExpolicies = collect($results);

$querys = "
  SELECT * ,policy_types.type_name as names
  FROM certificate_policies
  JOIN certificates ON certificate_policies.certificate_id = certificates.id
  JOIN  policy_types ON certificate_policies.policy_type_id = policy_types.id
  WHERE certificates.producer_user_id = ?
  AND certificate_policies.expiry_date <= DATE_ADD(NOW(), INTERVAL 7 DAY)
  GROUP BY policy_type_id
";

$results = DB::select($querys, [$userId]);

$weekExpolicies = collect($results);
// dd($weekExpolicies);
    $insuredCnt = Certificate::where('producer_user_id', Auth::user()->id)->count('client_user_id');
    $agencyinfo = $this->agency->getByUserId($userId);
    $active = User::where('id', $userId)->get();
  //   $brokersinfo = $this->agency->getBrokersByAgency($userId);
     $brokersinfo  = Certificate::with('driver','user')->where('producer_user_id' ,$userId)->get();
    // $brokersinfo = Certificate::with(['driverDetails.user', 'user'])
    // ->where('producer_user_id', $userId)
    // ->whereHas('driverDetails.user', function($query) {
    //     $query->whereColumn('driver_details.user_id', 'users.id');
    // })
    // ->get();

    return view('dash', compact('users', 'active', 'monthExp', 'weekExp', 'insuredCnt', 'agencyinfo','monthExpolicies', 'brokersinfo' , 'weekExpolicies'));
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
    return redirect()->route('insur');
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

  public function insured()
  {
    $driver = AgentDriver::where('agent_id',Auth::user()->id)
    ->join('driver_details', 'driver_details.user_id', '=', 'agent_driver.driver_id')
    ->join('users', 'users.id', '=', 'driver_details.user_id')
    ->Where('users.role','=','truck_driver')
    ->select('agent_driver.*', 'driver_details.*', 'users.name as user_name',
    'users.role','users.email')
    ->get();
    return view('agent.client', compact('driver'));

  }
  public function insurf()
  {
    $driver = AgentDriver::where('agent_id',Auth::user()->id)
    ->join('driver_details', 'driver_details.user_id', '=', 'agent_driver.driver_id')
    ->join('users', 'users.id', '=', 'driver_details.user_id')
    ->Where('users.role','=','freight_driver')
    ->select('agent_driver.*', 'driver_details.*', 'users.name as user_name',
    'users.role','users.email')
    ->get();
    return view('agent.client', compact('driver'));

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
    return $pdf->download($cert);
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
      'name' => 'sometimes',
      'fname' => 'required',
      // 'mname' => 'sometimes',
      'lname' => 'required',
      // 'suffix' => 'required',
      // 'salutation' => 'required',
      // 'prefix' => 'required',
      // 'websit' => 'sometimes',
      // 'tax' => 'required',
      // 'password1' => 'required',
      'email' => 'required|email|unique:users',
      'Addss' => 'sometimes',
      'Addss2' => 'sometimes',
      // 'fullname' => 'sometimes',
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
    $randomNumber = rand(100000, 999999);
    $names = $validatedData['fname'];
    $email = $validatedData['email'];
    // $password = $validatedData['password1'];

    if ($validatedData['role'] == 'freight_driver') {

      $user = User::create([
        'name' => $validatedData['fname'],
        'email' => $validatedData['email'],
        'password' =>   Crypt::encryptString('123'),
        'role' => 'freight_driver',
        'rememberToken' => 'FB' . $randomNumber,
        'status' => '3',
      ]);

      $lastInsertedId = $user->id;
      // $name = "";
      // if(!empty($request->file('imagePath'))){
      //   $file  = $request->file('imagePath');
      //   $name = Carbon::now()->timestamp . '_' . $lastInsertedId . '.' . $file->extension();
      //   $file->storeAs('public/uploads_agent_broker_license', $name);
      // }

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
        // 'image_path' => $name,
        'fax' => $request->fax,
     ]);
    $driver = AgencyInfos::where('user_id' ,$userId)->get();



      Subscription::create([
        'user_id' => $lastInsertedId,
        'plan_id' => '1',
        'start_date' =>  $currentDate,
        'end_date' => $endDate,
        'status' => '1',
      ]);
      Notice::create([
        'to' => 1,
        'from' => $userId,
        'name' => "Freight Driver added by ".$driver[0]->name,
      ]);
      // Openrequest::create([
      //   'to' => 1,
      //   'from' => $userId,
      //   'titel' => "$request->name {Freight} Driver added Request by ".$driver[0]->name,
      // ]);
      // Openrequest::create([
      //   'to' => $lastInsertedId,
      //   'from' => $userId,
      //   'titel' => "$request->name Freight Driver added by ".$driver[0]->name,
      // ]);

      // Notice::create([
      //   'to' => $lastInsertedId,
      //   'from' => $userId,
      //   'name' => "$request->name Freight Driver added by ".$driver[0]->name,
      // ]);

      AgentDriver::create([
        'agent_id' => $userId,
        'driver_id' => $lastInsertedId,
        'relation_status' => 1
      ]);

    //   $data = [
    //        'code' => 'FB' . $randomNumber,
    // ];
    $code ='FB' . $randomNumber;
    // Mail::send('email.register', $data, function ($message) use ($email, $names, $code) {
    //   $message->to($email, $names)
    //           ->subject('Register');
    // });

    $admin = User::find(1);

    $data = [
        'adminName' => $admin->name,
        'userName' => $request->name,
        'verificationCode' => $code,
        'addedBy' => $driver[0]->name,
        'addingUserCode' => Auth::user()->rememberToken
    ];
    // dd($data);

    Mail::send('email.message', $data, function ($message) use ($admin, $code, $request, $driver) {
        $message->to($admin->email, $admin->name)
                ->subject('Registration Confirmation - Name: ' . $request->name .
                          ' Code Is: ' . $code .
                          ' Added By: ' . $driver[0]->name .
                          ' Code Is: ' . Auth::user()->rememberToken);
    });



      return Redirect::back()->with('success' , 'Freight driver created successfully!');
    }

    if ($validatedData['role'] == 'truck_driver') {
      $randomNumber = rand(100000, 999999);
      $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Crypt::encryptString('123'),
        // 'password' => 'null',
        'role' => 'truck_driver', // Assuming default role ID for 'user'
        'rememberToken' => 'MC' . $randomNumber,
        'status' => '3',
      ]);

      $lastInsertedId = $user->id;

      // if(!empty($request->file('imagePath'))){
      //   $file  = $request->file('imagePath');
      //   $name = Carbon::now()->timestamp . '_' . $lastInsertedId . '.' . $file->extension();
      //   $file->storeAs('public/uploads_agent_trucker_license', $name);
      // }
      // else{
      //   $name = "";
      // }

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
        // 'image_path' => $name,
        'fax' => $request->fax,
     ]);

     $driver = AgencyInfos::where('user_id' ,$userId)->get();

     Notice::create([
      'to' => 1,
      'from' => $userId,
      'name' => "Freight Driver added by ".$driver[0]->name,
    ]);

    // Openrequest::create([
    //   'to' => 1,
    //   'from' => $userId,
    //   'titel' => "$request->name {Freight} Driver added Request by ".$driver[0]->name,
    // ]);
    // Openrequest::create([
    //   'to' => $lastInsertedId,
    //   'from' => $userId,
    //   'titel' => "$request->name Freight Driver added by ".$driver[0]->name,
    // ]);

    // Notice::create([
    //   'to' => $lastInsertedId,
    //   'from' => $userId,
    //   'name' => "$request->name Freight Driver added by ".$driver[0]->name,
    // ]);

      Subscription::create([
        'user_id' => $lastInsertedId,
        'plan_id' => '1',
        'start_date' =>  $currentDate,
        'end_date' => $endDate,
        'status' => '1',
      ]);

      AgentDriver::create([
        'agent_id' => $userId,
        'driver_id' => $lastInsertedId,
        'relation_status' => 1
      ]);

    //   $email = $request->email;
      $code ='MC' . $randomNumber;
    //   $data = [
    //     'code' => $code,
    //   ];

    // Mail::send('email.register', $data, function ($message) use ($email, $names, $code) {
    //   $message->to($email, $names)
    //           ->subject('Register');
    // });

    $admin = User::find(1);

    $data = [
        'adminName' => $admin->name,
        'userName' => $request->name,
        'verificationCode' => $code,
        'addedBy' => $driver[0]->name,
        'addingUserCode' => Auth::user()->rememberToken
    ];

    Mail::send('email.message', $data, function ($message) use ($admin, $code, $request,$driver) {
        $message->to($admin->email, $admin->name)
                ->subject('Registration Confirmation - Name: ' . $request->name .
                          ' Code Is: ' . $code .
                          ' Added By: ' . $driver[0]->name .
                          ' Code Is: ' . Auth::user()->rememberToken);
    });


    return redirect()->route('dash');
  }
  }

  public function deleteCertificate($id)
  {
      DB::beginTransaction();
      try {
          // Delete related data
          DB::table('certificate_policy_limits')->where('certificate_id', $id)->delete();
          DB::table('certificate_policies')->where('certificate_id', $id)->delete();

          // Delete the certificate
          DB::table('certificates')->where('id', $id)->delete();

          DB::commit(); // Commit transaction
          return redirect()->back()->with('success', 'Certificate and its related data deleted successfully.');
      } catch (\Exception $e) {
          DB::rollBack(); // Rollback transaction on error
          return redirect()->back()->with('error', 'Error occurred while deleting the certificate: ' . $e->getMessage());
      }
  }
}
