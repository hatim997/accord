<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notice;
use App\Models\ShipperInfos;
use App\Models\DriverDetail;
use App\Models\AgencyInfos;
use App\Models\Subscription_plan;
use App\Models\Certificate;
use App\Models\Subscription;
use App\Models\CertificatePolicy;
use App\Models\PolicyType;
use App\Models\Upload;
use App\Models\AgentDriver;
use App\Models\TruckDetail;
use App\Models\Openrequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use Mail;
use Illuminate\Support\Facades\DB;

class TruckController extends Controller
{
  protected $driver;

  public function __construct(DriverDetail $driver)
  {
    $this->middleware('checkRole:truker');
    $this->driver = $driver;
  }

  public function trucker()
  {
    $userId = Auth::user()->id;

    $users = User::all();

    // $monthExp = CertificatePolicy::whereDate('expiry_date', '<=', Carbon::now()->addDays(30))->count();
    $monthExp = CertificatePolicy::whereHas('certificate', function($query) use ($userId) {
      $query->where('client_user_id', $userId);
  })
  ->whereDate('expiry_date', '<=', Carbon::now()->addDays(30))
  ->groupBy('policy_type_id')
  ->select('policy_type_id') // Select policy_type_id to group by
  ->get() // Get the results
  ->count(); // Count the total grouped rows
    // $weekExp = CertificatePolicy::whereDate('expiry_date', '<=', Carbon::now()->addDays(7))->count();
    $weekExp =  CertificatePolicy::whereHas('certificate', function($query) use ($userId) {
      $query->where('client_user_id', $userId);
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
  WHERE certificates.client_user_id = ?
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
  WHERE certificates.client_user_id = ?
  AND certificate_policies.expiry_date <= DATE_ADD(NOW(), INTERVAL 7 DAY)
  GROUP BY policy_type_id
";

$results = DB::select($querys, [$userId]);
$activeShippersCount = User::where('role', 'shipper')
                            ->where('status', 0)
                            ->count();
                            $activeShippers = User::where('role', 'shipper')
                            ->where('status', 0)
                            ->select('name', 'email', 'rememberToken') // Select only the name and email columns
                            ->get();

$inactiveShippersCount = User::where('role', 'shipper')
                           ->where('status', 1)
                           ->count();
                           $inactiveShippers = User::where('role', 'shipper')
                           ->where('status', 1)
                           ->select('name', 'email', 'rememberToken') // Select only the name and email columns
                           ->get();

$weekExpolicies = collect($results);
    $certificatePolicies = null;
    $driverInfo = $this->driver->getByUserId($userId);
    $policies = null;
    $yourCertificateId = Certificate::select('id')
      ->where('client_user_id', $userId)
      ->pluck('id');


    if (isset($yourCertificateId)) {
      $certificatePolicies = CertificatePolicy::whereIn('certificate_id', $yourCertificateId)->get();
    }
      $policies = PolicyType::get();
    $ship = ShipperInfos::all();
    return view('truck.dash', compact('users', 'monthExp', 'weekExp', 'ship', 'certificatePolicies', 'monthExpolicies', 'weekExpolicies', 'policies', 'driverInfo', 'activeShippersCount','inactiveShippersCount','activeShippers','inactiveShippers'));

  }
  public function shipper()
  {
    $ship = ShipperInfos::all();
    return view('truck.list-shipper', compact('ship'));
  }

  public function trucks()
  {
    $truck = TruckDetail::all();
    return view('truck.list-truck', compact('truck'));
  }

  public function deltruck($id)
  {
    $truck = TruckDetail::findOrFail($id);
    $truck->delete();

    return redirect()->route('lists.truck')->with('success', 'Truck deleted successfully');
}
  public function addReg(Request $request)
  {

    $userId = Auth::user()->id;
    $validatedDataa = Validator::make($request->all(), [
      'username' => 'required',
      'password1' => 'required',
      'email' => 'required|email|unique:users',
      'role' => 'required',
      'Addss' => 'sometimes',
      'Addss2' => 'sometimes',
      'fullname' => 'sometimes',
      'city' => 'sometimes',
      'state' => 'sometimes',
      'zip' => 'sometimes',
      'phone' => 'sometimes',
      'altemail' => 'sometimes',
      'role' => 'sometimes',
    ]);
    // var_dump( $validatedDataa);

    if ($validatedDataa->fails()) {
      return Redirect::back()
        ->withErrors($validatedDataa)
        ->withInput();
      // return 'fail';
    }
    $currentDate = Carbon::now();
    $endDate = $currentDate->copy()->addDays(30);
    $validatedData = $validatedDataa->validated();
    $names = $validatedData['username'];
    $email = $validatedData['email'];
    if ($validatedData['role'] == 'agent') {
      $randomNumber = rand(100000, 999999);
      $user = User::create([
        'name' => $validatedData['username'],
        'email' => $validatedData['email'],
        'password' => Crypt::encryptString($validatedData['password1']),
        'rememberToken' => 'IA' . $randomNumber,
        'role' => $validatedData['role'], // Assuming default role ID for 'user'
      ]);
      $lastInsertedId = $user->id;

      $subb = Subscription::create([
        'user_id' => $lastInsertedId,
        'plan_id' => '1',
        'start_date' =>  $currentDate,
        'end_date' => $endDate,
        'status' => '1',
      ]);
      $user = AgencyInfos::create([
        'user_id' => $lastInsertedId,
        'status' => '1',
        'address' => $validatedData['Addss'],
        'address2' => $validatedData['Addss2'],
        'name' => $validatedData['fullname'],
        'city' => $validatedData['city'],
        'state' => $validatedData['state'],
        'zip' => $validatedData['zip'],
        'cellphone' => $validatedData['phone'],
        'extra_email' => $validatedData['altemail'],
      ]);
      $driver = DriverDetail::where('user_id' ,$userId)->get();
    Notice::create([
      'to' => 1,
      'from' => $userId,
      'name' => "Agency  added by ".$driver[0]->name,
    ]);
    Openrequest::create([
      'to' => 1,
      'from' => $userId,
      'titel' => "$names {Agency}  added Request by ".$driver[0]->name,
    ]);
    Openrequest::create([
      'to' => $lastInsertedId,
      'from' => $userId,
      'titel' => "$names Agency added by ".$driver[0]->name,
    ]);
    Notice::create([
      'to' => $lastInsertedId,
      'from' => $userId,
      'name' => "$names Agency  added by ".$driver[0]->name,
    ]);







          $data = [
            'code' => 'IA' . $randomNumber,
     ];
     $code ='IA' . $randomNumber;




     Mail::send('email.register', $data, function ($message) use ($email, $names, $code) {
       $message->to($email, $names)
               ->subject('Register');
     });

    $admin = User::find(1);

    $data = [
        'adminName' => $admin->name,
        'userName' => $request->name,
        'verificationCode' => $code,
        'addedBy' => $driver[0]->name,
        'addingUserCode' => Auth::user()->rememberToken
    ];

    Mail::send('email.message', $data, function ($message) use ($admin, $code, $request, $driver) {
        $message->to($admin->email, $admin->name)
                ->subject('Registration Confirmation - Name: ' . $request->name .
                          ' Code Is: ' . $code .
                          ' Added By: ' . $driver[0]->name .
                          ' Code Is: ' . Auth::user()->rememberToken);
    });
          return Redirect::back()
          ->with('success' , 'agent created successfully!');
    }

    if ($validatedData['role'] == 'shipper') {
      $randomNumber = rand(100000, 999999);
      $user = User::create([
        'name' => $validatedData['username'],
        'email' => $validatedData['email'],
        'password' => Crypt::encryptString($validatedData['password1']),
        'rememberToken' => 'SH' . $randomNumber,
        'role' => $validatedData['role'], // Assuming default role ID for 'user'
      ]);
      $lastInsertedId = $user->id;
      $user = Notice::create([
        'to' => $lastInsertedId,
        'from' => $userId,
        'name' => "Shipper added by ".$userId,
          ]);
      $subb = Subscription::create([
        'user_id' => $lastInsertedId,
        'plan_id' => '1',
        'start_date' =>  $currentDate,
        'end_date' => $endDate,
        'status' => '1',
      ]);
      $user = ShipperInfos::create([
        'user_id' => $lastInsertedId,
        'status' => '1',
        'address' => $validatedData['Addss'],
        'address2' => $validatedData['Addss2'],
        'name' => $validatedData['fullname'],
        'city' => $validatedData['city'],
        'state' => $validatedData['state'],
        'zip' => $validatedData['zip'],
        'cellphone' => $validatedData['phone'],
        'extra_email' => $validatedData['altemail'],
      ]);
            $data = [
              'code' => 'SH' . $randomNumber,
       ];
       $code ='SH' . $randomNumber;


       $admin = User::find(1);
  $driver = DriverDetail::where('user_id' ,$userId)->get();
            Notice::create([
    'to' => 1,
    'from' => $userId,
    'name' => "Agency  added by ".$driver[0]->name,
  ]);
  Mail::send('email.register', $data, function ($message) use ($email, $names, $code) {
    $message->to($email, $names)
            ->subject('Register');
  });
      $data1 = [
          'adminName' => $admin->name,
          'userName' => $request->name,
          'verificationCode' => $code,
          'addedBy' => $driver[0]->name,
          'addingUserCode' => Auth::user()->rememberToken
      ];

      Mail::send('email.message', $data1, function ($message) use ($admin, $code, $request, $driver) {
          $message->to($admin->email, $admin->name)
                  ->subject('Registration Confirmation - Name: ' . $request->name .
                            ' Code Is: ' . $code .
                            ' Added By: ' . $driver[0]->name .
                            ' Code Is: ' . Auth::user()->rememberToken);
      });

      return Redirect::back()
      ->with('success' ,'shipper created successfully!');
    }

    return 'nothing';
  }


  public function truckprofiles()
  {
    $userId = Auth::user()->id;

    $driverdetail =  User::with('truckers')->where('id', $userId)->get();





    return view('truck.profile' , compact('driverdetail'));
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

    $driver = DriverDetail::find($request->id);
    if ($driver) {
        $driver->name = $request->input('name');
        $driver->mname = $request->input('mname');
        $driver->lname = $request->input('lname');
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
        $driver->salutation = $request->input('salutation');
        $driver->tax = $request->input('tax');
        $driver->fax = $request->input('fax');
        $driver->license_number = $request->input('license_number');
        $driver->license_expiry_date = $request->input('license_expiry_date');
        $driver->license_type = $request->input('license_type');
        $driver->years_of_experience = $request->input('years_of_experience');
        $driver->vehicle_registration_number = $request->input('vehicle_registration_number');
        $driver->vehicle_make = $request->input('vehicle_make');
        $driver->vehicle_model = $request->input('vehicle_model');
        $driver->vehicle_year = $request->input('vehicle_year');
        $driver->vehicle_capacity = $request->input('vehicle_capacity');
        $driver->vehicle_status = $request->input('vehicle_status');
        $driver->scac = $request->input('scac');
        $driver->usdot = $request->input('usdot');
        $driver->mc_number = $request->input('mc_number');
        $driver->save();
    }
    return redirect()->back()->with('success', 'User  updated successfully!');

  }

  public function addTruck()
  {
    return view('truck.add-truck');
  }

  public function storeTruck(Request $request)
  {
    $data = $request->only(['vehicle_registration_number',
                            'vehicle_make',
                            'vehicle_model',
                            'vehicle_year',
                            'vehicle_capacity',
                            'vehicle_status',
                            'mc_number',
                            'license_number',
                            'license_expiry_date',
                            'license_type',
                            'years_of_experience'
                          ]);
    $trukData = [];

    foreach ($data['vehicle_registration_number'] as $index => $title) {
        $trukData[] = [
            'user_id'=>Auth::user()->id,
            'vehicle_registration_number' => $title,
            'vehicle_make' => $data['vehicle_make'][$index],
            'vehicle_model' => $data['vehicle_model'][$index],
            'vehicle_year' => $data['vehicle_year'][$index],
            'vehicle_capacity' => $data['vehicle_capacity'][$index],
            'vehicle_status' => $data['vehicle_status'][$index],
            'mc_number' => $data['mc_number'][$index],
'license_number' => $data['license_number'][$index],
'license_expiry_date' => $data['license_expiry_date'][$index],
'license_type' => $data['license_type'][$index],
'years_of_experience' => $data['years_of_experience'][$index],



        ];
    }

    TruckDetail::insert($trukData);
    return redirect()->to('portal');
  }

  public function truckers()
  {
    return view('userss');
  }

  public function truckerss()
  {
    return view('usersss');
  }
  public function adash()
  {
    $user = request()->user();
    $id = $user->id;
    $users = Upload::where('user_id', $id)->get();
    // return $users;
    return view('truck.dash', compact('users'));
  }

  public function certadmin()
  {
    $certificate = Certificate::where('client_user_id',Auth::user()->id)
    ->join('shipper_infos', 'shipper_infos.user_id', '=', 'certificates.ch')
    ->select('certificates.*','shipper_infos.id as shipperid', 'shipper_infos.name as name')->get();
if ($certificate->isEmpty()) {
  $certificate = Certificate::where('client_user_id',Auth::user()->id)->get();

}


    return view('freight.certifecateturck', compact('certificate'));
  }



  public function upload(Request $request)
  {
    // Validate the uploaded file if necessary
    $request->validate([
      'file' => 'required|file|max:10240', // Example: Maximum file size of 10MB
    ]);

    // Store the uploaded file
    $path = $request->file('file')->store('uploads');
    $userId = Auth::user()->id;
    // You can also store file information in the database here if needed
    $upload = new Upload();
    $upload->user_id = $request->user_id; // Assuming you have authentication and each upload is associated with a user
    $upload->path = $path;
    $upload->save();
    $lastInsertedId = $upload->id;
    $user = Notice::create([
      'to' => $request->user_id,
      'from' => $userId,
      'upload_id' => $lastInsertedId,
      'name' => "truck_driver uploaded files by ".$userId,
        ]);

    //  return "successfully";
    return back()->with('success', 'File uploaded successfully.');
  }

  public function truckersss()
  {
    $insurance_data = Insurance_data::Join(
      'insurance_details',
      'insurance_datas.id',
      '=',
      'insurance_details.id_isu_data_fk'
    )->get();
    return view('truck.policy-list', compact('insurance_data'));
  }

  public function pdf(request $request, $id)
  {
    $insuranceData = Insurance_data::where('id', $id)->first();
    $Insurance_detail = Insurance_detail::where('id_isu_data_fk', $id)->first();
    return view('truck.pdf', compact('insuranceData', 'Insurance_detail'));
  }

  public function drivers()
  {
    return view('truck.add-driver');
  }

  public function brokers()
  {
    return view('truck.add-broker');
  }

  public function storeDriver(Request $request)
  {
    $parentId = Auth::user()->id;
    $currentDate = Carbon::now();
    $endDate = $currentDate->copy()->addDays(30);

    $randomNumber = rand(100000, 999999);
    $user = User::create([
      'name' => $request->fname,
      'email' =>$request->email,
      'password' => Crypt::encryptString($request->password),
      'role' => "truck_driver",
      'rememberToken' => 'MC'.$randomNumber,
      'status' => "1",
    ]);

    $lastInsertedId = $user->id;
    $name = '';

    if(!empty($request->file('imagePath'))){
      $file  = $request->file('imagePath');
      $name = Carbon::now()->timestamp . '_' . $lastInsertedId . '.' . $file->extension();
      $file->storeAs('public/uploads_driver_license', $name);
    }

   DriverDetail::create([
      'parent_id' =>$parentId ,
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

    $subb = Subscription::create([
      'user_id' => $lastInsertedId,
      'plan_id' => '1',
      'start_date' =>  $currentDate,
      'end_date' => $endDate,
      'status' => '1',
    ]);

    $linkedAgent = AgentDriver::where('driver_id', $parentId)->first();

    $notice = Notice::create([
      'to' => $linkedAgent->agent_id,
      'from' => $parentId,
      'name' => "Driver added by ". $parentId,
    ]);

    return redirect()->to('portal');
  }





  public function storeBroker(Request $request)
  {

    $validatedDataa = Validator::make($request->all(), [
      'name' => 'required',
      'state' => 'required',
      'password' => 'required',
      'title' => 'required',
      'city' => 'required',
      'lname' => 'required',
      'zip' => 'required',
      'fname' => 'required',
      'address2' => 'required',
      'cellphone' => 'required',
      'mname' => 'sometimes',
      'address' => 'required',
      'email' => 'required|email|unique:users',
      'prefix' => 'required',
      'websit' => 'required',
      'tax' => 'required',
      'usdot' => 'required',
      'mc_number' => 'required',
      'scac' => 'required',
    ]);

    if ($validatedDataa->fails())
    {
      return Redirect::back()->withErrors($validatedDataa)->withInput();
    }


    $parentId = Auth::user()->id;
    $currentDate = Carbon::now();
    $endDate = $currentDate->copy()->addDays(30);
    $randomNumber = rand(100000, 999999);
    $user = User::create([
      'name' => $request->fname,
      'email' =>$request->email,
      'password' => Crypt::encryptString($request->password),
      'role' => "freight_driver",
      'rememberToken' => 'FB'.$randomNumber,

      'status' => "1",
    ]);

    $lastInsertedId = $user->id;
    $name = '';

    if(!empty($request->file('imagePath'))){
      $file  = $request->file('imagePath');
      $name = Carbon::now()->timestamp . '_' . $lastInsertedId . '.' . $file->extension();
      $file->storeAs('public/uploads_broker_license', $name);
    }

   DriverDetail::create([
      'parent_id' =>$parentId ,
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

    $subb = Subscription::create([
      'user_id' => $lastInsertedId,
      'plan_id' => '1',
      'start_date' =>  $currentDate,
      'end_date' => $endDate,
      'status' => '1',
    ]);

    $linkedAgent = AgentDriver::where('driver_id', $parentId)->first();

    $notice = Notice::create([
      'to' => '1',
      'from' => $parentId,
      'name' => "Broker added by ". $parentId,
    ]);

    $driver = DriverDetail::where('user_id' ,$parentId)->get();

$admin = User::find(1);


$email = $request->email;
$names = $request->name;
$code = 'FB' . $randomNumber;
$data = [
    'adminName' => $admin->name,
    'userName' => $request->name,
    'verificationCode' => $code,
    'addedBy' => $driver[0]->name,
    'addingUserCode' => Auth::user()->rememberToken
];

Mail::send('email.register', $data, function ($message) use ($email, $names, $code) {
  $message->to($email, $names)
          ->subject('Register');
});

Mail::send('email.message', $data, function ($message) use ($admin, $code, $request, $driver) {
    $message->to($admin->email, $admin->name)
            ->subject('Registration Confirmation - Name: ' . $request->name .
                      ' Code Is: ' . $code .
                      ' Added By: ' . $driver[0]->name .
                      ' Code Is: ' . Auth::user()->rememberToken);
});

    return redirect()->to('portal');
  }
}
