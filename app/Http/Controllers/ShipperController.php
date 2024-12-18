<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AgencyInfos;
use App\Models\AgentDriver;
use App\Models\DriverDetail;
use App\Models\Subscription;
use App\Models\Notice;
use App\Models\UploadShipper;
use App\Models\Endorsement;
use App\Models\EndorsementFile;
use App\Models\ShipperEndorsement;
use App\Models\ShipperDriver;
use App\Models\Certificate;
use App\Models\CertificatePolicy;
use Illuminate\Support\Facades\DB;

use App\Models\ShipperLimit;
use App\Models\ShipperInfos;
use App\Models\PolicyLimit;
use App\Models\PolicyType;
use App\Models\Openrequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Mail;

use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ShipperController extends Controller
{public function __construct()
    {
      $this->middleware('checkRole:shipper');
    }

    // public function dash()
    // {
    //   return view('shipper.dash');
    // }
  public function dash()
  {
    $insurance_data = Insurance_data::Join(
      'insurance_details',
      'insurance_datas.id',
      '=',
      'insurance_details.id_isu_data_fk'
    )->get();
    return view('shipper.policy-list', compact('insurance_data'));
  }
  public function pdf(request $request, $id)
  {
    $insuranceData = Insurance_data::where('id', $id)->first();
    $Insurance_detail = Insurance_detail::where('id_isu_data_fk', $id)->first();
    return view('shipper.pdf', compact('insuranceData', 'Insurance_detail'));
  }
  public function profiles()
  {
    $userId = Auth::user()->id;

    $driverdetail = User::with('shippers')->where('id', $userId)->get();


   return view('shipper.profile' , compact('driverdetail'));
  }
  public function proupd(Request $request)
  {
    $userId = Auth::user()->id;

    $user =   user::find($userId);

    $user->name = $request->input('username');
$user->save();


    $driver = ShipperInfos::find($request->id);


    if ($driver) {
        $driver->name = $request->input('name');
        $driver->mname = $request->input('mname');
        $driver->lname = $request->input('lname');
        $driver->industry = $request->input('industry');
        $driver->owner = $request->input('owner');
        $driver->fax = $request->input('fax');
        $driver->tax = $request->input('tax');
        $driver->nominal_capital = $request->input('nominal_capital');
        $driver->title = $request->input('title');
        $driver->websit = $request->input('website');
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


  public function dash2()
  {
      // Get the current authenticated user ID
      $authUserId = Auth::user()->id;

      // Fetch active users based on the relationships and count them
      $activeUserCount = DB::table('shipper_driver')
      ->join('users', 'shipper_driver.driver_id', '=', 'users.id') // Join directly with users table
      ->where('shipper_driver.shipper_id', '=', $authUserId)  // Match shipper_id with authenticated user
      ->where('users.status', '=', '1')  // Ensure the user has status 1
      ->count();  // Get the count of active users

      $inactiveUserCount = DB::table('shipper_driver')
      ->join('users', 'shipper_driver.driver_id', '=', 'users.id') // Join directly with users table
      ->where('shipper_driver.shipper_id', '=', $authUserId)  // Match shipper_id with authenticated user
      ->where('users.status', '=', '0')  // Ensure the user has status 1
      ->count();  // Get the count of active users


      $activeUsers = DB::table('shipper_driver')
      ->join('users', 'shipper_driver.driver_id', '=', 'users.id')
      ->where('shipper_driver.shipper_id', '=', $authUserId)  // Match shipper_id with authenticated user
      ->where('users.status', '=', '1')  // Ensure the user has status 1
      ->select('users.id', 'users.name', 'users.role', 'users.email', 'users.status')  // Select relevant fields
      ->get();


      $inactiveUsers = DB::table('shipper_driver')
      ->join('users', 'shipper_driver.driver_id', '=', 'users.id')
      ->where('shipper_driver.shipper_id', '=', $authUserId)  // Match shipper_id with authenticated user
      ->where('users.status', '=', '0')  // Ensure the user has status 1
      ->select('users.id', 'users.name', 'users.role', 'users.email', 'users.status')  // Select relevant fields
      ->get();

      // Fetch records based on certificate expiry date for the current month and year
      $currentDate = Carbon::now();
      $previousMonth = $currentDate->subMonth();
      $previousMonthNumber = $previousMonth->month;
      $previousYear = $previousMonth->year;
      
      $records = Certificate::where('certificates.ch', '=', $authUserId)
          ->join('users', 'certificates.client_user_id', '=', 'users.id')
          ->join('certificate_policies', 'certificates.id', '=', 'certificate_policies.certificate_id')
          ->join('policy_types', 'certificate_policies.policy_type_id', '=', 'policy_types.id')
          ->where('users.status', '=', '1')
          ->whereBetween('certificate_policies.expiry_date', [$currentDate, $previousMonth])
          
          ->select(
              'users.*',
              'certificates.*',
              'certificate_policies.*',
              'policy_types.*'
          )
          ->get();

      // Fetch records for certificates expiring in the next week
      $today = Carbon::today();
      $nextWeek = Carbon::today()->addWeek();
// return$nextWeek ;
//           }
      $recordweeks = Certificate::where('certificates.ch', '=', $authUserId)
          ->join('users', 'certificates.client_user_id', '=', 'users.id')
          ->join('certificate_policies', 'certificates.id', '=', 'certificate_policies.certificate_id')
          ->join('policy_types', 'certificate_policies.policy_type_id', '=', 'policy_types.id')
          ->where('users.status', '=', '1')
           ->whereBetween('certificate_policies.expiry_date', [$today, $nextWeek])
          ->select(
              'users.*',
              'certificates.*',
              'certificate_policies.*',
              'policy_types.*'
          )
          ->get();
          //dd($recordweeks);
      $brokersinfo  = Certificate::with('driver','user')->where('ch' ,$authUserId)->get();

      // Fetch all endorsements
      $endors = Endorsement::all();

      // Return the view with the active users count and other data
      return view('shipper.dash', compact('endors', 'records', 'recordweeks','brokersinfo', 'activeUserCount','inactiveUserCount','activeUsers','inactiveUsers'));
  }

 
  public function AgentNotification(Request $request)
  {
    // dd($agent_id);

    // $company_name = DriverDetail::where('user_id', $request->client_user_id)->get();
    // dd($company_name[0]->name);

    $getuser = User::where('id', $request->client_user_id)->get();

    $agent_user = Certificate::where('id', $request->certificate_id)->select('producer_user_id')->get();
    // dd($agent_user[0]->producer_user_id);

$policy = PolicyType::find($request->policy_type_id);

    $agent_email = User::where('id', $agent_user[0]->producer_user_id)->get();
    // dd($agent_email[0]->email);
$camapony = AgencyInfos::where("user_id", $agent_user[0]->producer_user_id)->first();
    $agntemail = $agent_email[0]->email;
    $data = [
        'success' => "An email and notification regarding the policy, " . $policy->type_name  . ", have been sent to the client's email: " . $getuser[0]->email ." where company name ".$camapony->name,  // Added space for readability
    ];

    Mail::send('email.success_notice', $data, function ($message) use ($agntemail) {
        $message->to($agntemail)
                ->subject('Policy Success Notice');
    });


    Notice::create([
      'to' => $agent_user[0]->producer_user_id,
      'from' => Auth::id(),
      'name' => "Please Upgrade Your ".$policy->type_name." Policy",
    ]);
    Notice::create([
      'to' => Auth::id(),
      'from' => Auth::id(),
      'name' => "Notification has been sent to the Agent.",
    ]);

    return redirect()->back();

  }

  public function ClientNotification(Request $request)
  {
    // dd($agent_id);
    $getuser = User::where('id', $request->client_user_id)->get();
    $policy = PolicyType::find($request->policy_type_id);

    $user_email = $getuser[0]->email;
    $data = [
        'expiry_message' => 'Your '.$policy->type_name.' policy  is about to expire. Please take action.',
    ];
    Mail::send('email.expiry_notice', $data, function ($message) use ($user_email) {
        $message->to($user_email)
                ->subject('Policy Expiry Notice');
    });


  
    Notice::create([
     'to' => $request->client_user_id,
      'from' => Auth::id(),
      'name' => "Please Upgrade Your Policy",
    ]);
    Notice::create([
      'to' => Auth::id(),
      'from' => Auth::id(),
      'name' => "Notification has been sent to the Carrier.",
    ]);
    return redirect()->back();

  }


  public function endors(Request $request)
  {
   // dd ($request);

    $userId = Auth::user()->id;

    foreach ($request->endo_name as $item) {
      $user = new ShipperEndorsement();
      $user->shipper_id = $userId;
      $user->endors_id = $item;
if($user->endors_id == 7)
{
$user->endors_id = 7;
$user->others = $request->other;}
      $user->save();
         }

         $uploadedFiles = [];
         if ($request->hasFile('files')) {
             foreach ($request->file('files') as $file) {
                 $fileName = time() . '_' . $file->getClientOriginalName();
                 $filePath = $file->storeAs('endors', $fileName, 'public'); // Save files in the 'public/uploads' directory
                 $uploadedFiles[] = $fileName;

                 // Store file information in the database
                 EndorsementFile::create([
                      'shipper_id' =>$userId,
                     'name' => $fileName,
                     'path' => $filePath,
                 ]);
             }
         }



    $endors=Endorsement::All();





    return view('shipper.dash',compact('endors'));


  }

  public function addReg(Request $request)
  {
    $userId = Auth::user()->id;
    $validatedDataa = Validator::make($request->all(), [
      'username' => 'required',
      'password1' => 'sometimes',
      'email' => 'required|email|unique:users',
      // 'Addss' => 'sometimes',
      // 'Addss2' => 'sometimes',
      // 'fullname' => 'sometimes',
      // 'city' => 'sometimes',
      // 'state' => 'sometimes',
      // 'zip' => 'sometimes',
      'phone' => 'sometimes',
      // 'altemail' => 'sometimes',
      'role' => 'sometimes',
      // 'license_number' => 'sometimes',
      // 'license_expiry_date' => 'sometimes',
      // 'license_type' => 'sometimes',
      // 'years_of_experience' => 'sometimes',
      // 'vehicle_registration_number' => 'sometimes',
      // 'vehicle_make' => 'sometimes',
      // 'vehicle_model' => 'sometimes',
      // 'vehicle_year' => 'sometimes:',
      // 'vehicle_capacity' => 'sometimes',
      // 'vehicle_status' => 'sometimes',
      // 'mc_number' => 'sometimes',
      'subs_id' => 'sometimes',
    ]);
    // var_dump( $validatedDataa);

    if ($validatedDataa->fails()) {
      return Redirect::back()
        ->withErrors($validatedDataa)
        ->withInput();
    }
    $currentDate = Carbon::now();
    $endDate = $currentDate->copy()->addDays(30);
    $validatedData = $validatedDataa->validated();
    $name = $validatedData['username'];
    $email = $validatedData['email'];
    if ($validatedData['role'] == 'freight_driver') {

      $randomNumber = rand(100000, 999999);

      $user = User::create([
        'name' => $validatedData['username'],
        'email' => $validatedData['email'],
        'password' => Crypt::encryptString('password'),
        'rememberToken' => 'FB' . $randomNumber,
        'role' => $validatedData['role'], // Assuming default role ID for 'user'
        'status' => 1
      ]);
      $lastInsertedId = $user->id;

      $subb = Subscription::create([
        'user_id' => $lastInsertedId,
        'plan_id' => '1',
        'start_date' =>  $currentDate,
        'end_date' => $endDate,
        'status' => '1',
      ]);
      // $user = DriverDetail::create([
      //   'user_id' => $lastInsertedId,
      //   'status' => '1',
      //   'address' => $validatedData['Addss'],
      //   'address2' => $validatedData['Addss2'],
      //   'name' => $validatedData['fullname'],
      //   'city' => $validatedData['city'],
      //   'state' => $validatedData['state'],
      //   'zip' => $validatedData['zip'],
      //   'cellphone' => $validatedData['phone'],
      //   'extra_email' => $validatedData['altemail'],
      // ]);
      $user = Notice::create([
        'to' => $lastInsertedId,
        'from' => $userId,
        'name' => "freight_driver added by".$userId,
          ]);

          $data = [
            'code' => 'FB' . $randomNumber,
      ];
      $code ='FB' . $randomNumber;
      Mail::send('email.register', $data, function ($message) use ($email, $names, $code) {
       $message->to($email, $names)
               ->subject('Register');
      });

          return Redirect::back()
          ->with('success' , 'freight_driver created successfully!');
    }
    if ($validatedData['role'] == 'truck_driver') {
      $randomNumber = rand(100000, 999999);

      $user = User::create([
        'name' => $validatedData['username'],
        'email' => $validatedData['email'],
        'password' => Crypt::encryptString('password'),
        'rememberToken' => 'MC' . $randomNumber,
        'role' => $validatedData['role'], // Assuming default role ID for 'user'
        'status' => 1

      ]);
      $lastInsertedId = $user->id;
      $user = Notice::create([
        'to' => $lastInsertedId,
        'from' => $userId,
        'name' => "truck_driver added by".$userId,
          ]);
      $subb = Subscription::create([
        'user_id' => $lastInsertedId,
        'plan_id' => '1',
        'start_date' =>  $currentDate,
        'end_date' => $endDate,
        'status' => '1',
      ]);

      //   $user = DriverDetail::create([
      //    'user_id' => $lastInsertedId,
      //    'address' => $validatedData['Addss'],
      //    'address2' => $validatedData['Addss2'],
      //    'name' => $validatedData['fullname'],
      //    'city' => $validatedData['city'],
      //    'state' => $validatedData['state'],
      //    'zip' => $validatedData['zip'],
      //    'cellphone' => $validatedData['phone'],
      //    'extra_email' => $validatedData['altemail'],
      //    'license_number' => $validatedData['license_number'],
      //    'license_expiry_date'=> $validatedData['license_expiry_date'],
      //    'license_type' => $validatedData['license_type'],
      //    'years_of_experience'=> $validatedData['years_of_experience'],
      //    'vehicle_registration_number'=> $validatedData['vehicle_registration_number'],
      //    'vehicle_make'=> $validatedData['vehicle_make'],
      //    'vehicle_model'=> $validatedData['vehicle_model'],
      //    'vehicle_year'=> $validatedData['vehicle_year'],
      //    'vehicle_capacity'=> $validatedData['vehicle_capacity'],
      //    'vehicle_status'=> $validatedData['vehicle_status'],
      //    'mc_number'=> $validatedData['mc_number'],
      //  ]);
      $data = [
        'code' => 'MC' . $randomNumber,
  ];
  $code ='MC' . $randomNumber;
  Mail::send('email.register', $data, function ($message) use ($email, $names, $code) {
   $message->to($email, $names)
           ->subject('Register');
  });

      return Redirect::back()->with('success' ,'truck_driver created successfully!');
    }
    return 'nothing';
  }
  public function storeDriver(Request $reqeust)
  {
    $parentId = Auth::user()->id;
    $currentDate = Carbon::now();
    $endDate = $currentDate->copy()->addDays(30);
    $randomNumber = rand(100000, 999999);
    $name = $reqeust->username;
    $email = $reqeust->email;
    $user = User::create([
      'name' => $reqeust->fname,
      'email' =>$reqeust->email,
      'password' => Crypt::encryptString($reqeust->password),
      'role' => "truck_driver",
      'rememberToken' => 'MC'.$randomNumber,
      'status' => "1",
    ]);

    $lastInsertedId = $user->id;
    $name = '';

    if(!empty($reqeust->file('imagePath'))){
      $file  = $reqeust->file('imagePath');
      $name = Carbon::now()->timestamp . '_' . $lastInsertedId . '.' . $file->extension();
      $file->storeAs('public/uploads_driver_license', $name);
    }

   $driverdetail = DriverDetail::create([
      'parent_id' =>$parentId ,
      'user_id' =>$lastInsertedId ,
      'name' => $reqeust->name,
      'title' => $reqeust->title,
      'mname' => $reqeust->mname,
      'lname' => $reqeust->lname,
      'suffix' => $reqeust->suffix,
      'salutation' => $reqeust->salutation,
      'prefix' => $reqeust->prefix,
      'address' => $reqeust->address,
      'address2' => $reqeust->address2,
      'zip' => $reqeust->zip,
      'websit' => $reqeust->websit,
      'tax' => $reqeust->tax,
      'scac' => $reqeust->scac,
      'usdot' => $reqeust->usdot,
      'state' => $reqeust->state,
      'cellphone' => $reqeust->cellphone,
      'extra_email' => $reqeust->extra_email,
      'fname' => $reqeust->fname,
      'mc_number' => $reqeust->mc_number,
      'is_active' => "1",
      'image_path' => $name,
      'fax' => $reqeust->fax,
   ]);
    $subb = Subscription::create([
      'user_id' => $lastInsertedId,
      'plan_id' => '1',
      'start_date' =>  $currentDate,
      'end_date' => $endDate,
      'status' => '1',
    ]);
    $linkedAgentt = ShipperDriver::create([
      'shipper_id' => $parentId,
      'driver_id' => $lastInsertedId,
      'relation_status' => 1,
    ]);


    $driver = ShipperInfos::where('user_id' ,$parentId)->get();

    Notice::create([
      'to' => 1,
      'from' => $parentId,
      'name' => "Trucker Driver added by ".$driver[0]->name,
    ]);
    Openrequest::create([
      'to' => 1,
      'from' => $parentId,
      'titel' => "$reqeust->name {Trucker} Driver added Request by ".$driver[0]->name,
    ]);
    Openrequest::create([
      'to' => $lastInsertedId,
      'from' => $parentId,
      'titel' => "$reqeust->name Trucker Driver added by ".$driver[0]->name,
    ]);

    Notice::create([
      'to' => $lastInsertedId,
      'from' => $parentId,
      'name' => "$reqeust->name Trucker Driver added by ".$driver[0]->name,
    ]);





    $data = [
      'code' => 'MC' . $randomNumber,
];
$code = 'MC' . $randomNumber;
$names = $reqeust->name;
$email = $reqeust->email;
Mail::send('email.register', $data, function ($message) use ($email, $names, $code) {
 $message->to($email, $names)
         ->subject('Register');
});
    return redirect()->to('sportal');
  }
  public function drivers()
  {
    return view('shipper.add-driver');
  }
  public function brokers()
  {
$agent =AgencyInfos::All();
    return view('shipper.add-broker', compact('agent'));
  }
  public function storeBroker(Request $reqeust)
  {
    $parentId = Auth::user()->id;
    $currentDate = Carbon::now();
    $endDate = $currentDate->copy()->addDays(30);
    $randomNumber = rand(100000, 999999);
    $name = $reqeust->username;
    $email = $reqeust->email;
    $user = User::create([
      'name' => $reqeust->fname,
      'email' =>$reqeust->email,
      'password' => Crypt::encryptString('123'),
      'role' => "freight_driver",
      'rememberToken' => 'FB'.$randomNumber,
      'status' => "1",
    ]);
    $lastInsertedId = $user->id;
    $name = '';
    if(!empty($reqeust->file('imagePath'))){
      $file  = $reqeust->file('imagePath');
      $name = Carbon::now()->timestamp . '_' . $lastInsertedId . '.' . $file->extension();
      $file->storeAs('public/uploads_driver_license', $name);
    }
   DriverDetail::create([
      'parent_id' =>$parentId ,
      'user_id' =>$lastInsertedId ,
      'name' => $reqeust->name,
      'title' => $reqeust->title,
      'mname' => $reqeust->mname,
      'lname' => $reqeust->lname,
      'suffix' => $reqeust->suffix,
      'salutation' => $reqeust->salutation,
      'prefix' => $reqeust->prefix,
      'address' => $reqeust->address,
      'address2' => $reqeust->address2,
      'zip' => $reqeust->zip,
      'websit' => $reqeust->websit,
      'tax' => $reqeust->tax,
      'scac' => $reqeust->scac,
      'usdot' => $reqeust->usdot,
      'state' => $reqeust->state,
      'cellphone' => $reqeust->cellphone,
      'extra_email' => $reqeust->extra_email,
      'fname' => $reqeust->fname,
      'mc_number' => $reqeust->mc_number,
      'is_active' => "1",
      'image_path' => $name,
      'fax' => $reqeust->fax,
   ]);
    $subb = Subscription::create([
      'user_id' => $lastInsertedId,
      'plan_id' => '1',
      'start_date' =>  $currentDate,
      'end_date' => $endDate,
      'status' => '1',
    ]);
    $linkedShipper = ShipperDriver::create([
      'shipper_id' => $parentId,
      'driver_id' => $lastInsertedId,
      'relation_status' => 1,
    ]);
    if($reqeust->agent_id){

      $linkedAgentt = AgentDriver::create([
        'agent_id' => $reqeust->agent_id,
        'driver_id' => $lastInsertedId,
        'relation_status' => 1,
      ]);
    }

    $driver = ShipperInfos::where('user_id', $parentId)->get();
    Notice::create([
      'to' => 1,
                  'from' => $parentId,
      'name' => "Freight Driver added by ".$driver[0]->name,

    ]);
    Openrequest::create([
      'to' => 1,
      'from' => $parentId,
      'titel' => "$reqeust->name {Freight} Driver added Request by ".$driver[0]->name,
    ]);
    Openrequest::create([
      'to' => $lastInsertedId,
      'from' => $parentId,
      'titel' => "$reqeust->name Freight Driver added by ".$driver[0]->name,
    ]);
    Notice::create([
      'to' => $lastInsertedId,
      'from' => $parentId,
      'name' => "$reqeust->name Freight Driver added by ".$driver[0]->name,
    ]);
  $data = [
      'code' => 'FB' . $randomNumber,
];
$code ='FB' . $randomNumber;
$names = $reqeust->username;
$email = $reqeust->email;
Mail::send('email.register', $data, function ($message) use ($email, $names, $code) {
 $message->to($email, $names)
         ->subject('Register');
});
    return redirect()->to('sportal');
  }
  public function truckprofiles()
  {
    $userId = Auth::user()->id;
    $driverdetail = DriverDetail::where('user_id', $userId)->get();
    return view('truck.profile' , compact('driverdetail'));
  }

  public function uploadCertificate()
  {
    return view('shipper.upload');
  }

  public function storeCertificate(Request $request)
  {
    $userId = Auth::user()->id;
    $request->validate([
      'file' => 'required|file|max:10240', // Example: Maximum file size of 10MB
    ]);
    // Store the uploaded file
    $file  = $request->file('file');
    $name = Carbon::now()->timestamp . '_' . $userId . '.' . $file->extension();
    $file->storeAs('public/uploads_shipper', $name);

    $upload = new UploadShipper();
    $upload->user_id = $request->user_id; // Assuming you have authentication and each upload is associated with a user
    $upload->path = $name;
    $upload->save();

    $lastInsertedId = $upload->id;

    $user = Notice::create([
      'to' => $request->user_id,
      'from' => $userId,
      'shipper_upload_id' => $lastInsertedId,
      'name' => "shipper uploaded files by".$userId,
      ]);

    //  return "successfully";
    return back()->with('success', 'File uploaded successfully.');
  }

  public function listCertificate()
  {
    $userId = Auth::user()->id;
    $shipper_certs = UploadShipper::where('user_id', $userId)->get();

    return view('shipper.certificate_list', compact('shipper_certs'));
  }

  public function downloadCertificate($file_name) {
    $file = $path = storage_path().'/app/public/uploads_shipper/' . $file_name;
    $headers = array('Content-Type: application/pdf',);
    return response()->download($file, 'info.pdf', $headers);
  }

  public function choosePolicyTypes()
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

  $policytypes = PolicyType::with('policies', 'policyLimits')
  ->orderByRaw('FIELD(type_name, "'.implode('","', $customOrder).'")')
  ->get();


    return view('shipper.fromdrop2', compact('policytypes'));
  }

  public function shipperLimitForm(Request $request)
  {
    $userId = Auth::user()->id;

    foreach ($request['main_policy_coverage'] as $k => $v) {
      foreach ($request['main_policy_coverage'][$k] as $vv => $val) {
        if (!empty($val)) {
          $certificatePolicyLimit = new ShipperLimit();
          $certificatePolicyLimit->shipper_id = $userId;
          $certificatePolicyLimit->policy_type_id = $k;
          $certificatePolicyLimit->policy_limit_id = $vv;
          $certificatePolicyLimit->policy_amount = floatval(str_replace(',', '', $val));
          $certificatePolicyLimit->save();
        }
      }
    }

 return back()->with('success', ' Data Update  successfully.');

  }

}
