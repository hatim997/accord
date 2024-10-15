<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Mail;

use Barryvdh\DomPDF\Facade\Pdf as PDF;

class FreightController extends Controller
{public function __construct()
    {
      $this->middleware('checkRole:freight_driver');
    }


    public function drivers()
    {
      return view('freight.add-shipper');
    }
    public function addshipper(Request $reqeust)
    {
      $parentId = Auth::user()->id;
    $currentDate = Carbon::now();
    $endDate = $currentDate->copy()->addDays(30);
    $randomNumber = rand(100000, 999999);
    $user = User::create([
      'name' => $reqeust->fname,
      'email' =>$reqeust->email,
      'password' => Crypt::encryptString($reqeust->password),
      'role' => "shipper",
      'rememberToken' => 'SH'.$randomNumber,
      'status' => "1",
    ]);

    $lastInsertedId = $user->id;
    $name = '';

    if(!empty($reqeust->file('imagePath'))){
      $file  = $reqeust->file('imagePath');
      $name = Carbon::now()->timestamp . '_' . $lastInsertedId . '.' . $file->extension();
      $file->storeAs('public/uploads_broker_license', $name);
    }

    ShipperInfos::create([     
      'user_id' =>$lastInsertedId,
      'name' => $reqeust->name,     
      'mname' => $reqeust->mname,
      'lname' => $reqeust->lname,
      'suffix' => $reqeust->suffix,
      'nominal_capital' => $reqeust->nominal_capital,
      'prefix' => $reqeust->prefix,
      'address' => $reqeust->address,
      'address2' => $reqeust->address2,
      'zip' => $reqeust->zip,
      'websit' => $reqeust->websit,
      'tax' => $reqeust->tax,     
      'industry' => $reqeust->industry,
      'state' => $reqeust->state,
      'cellphone' => $reqeust->cellphone,
      'extra_email' => $reqeust->extra_email,
      'fname' => $reqeust->fname,
      'owner' => $reqeust->owner,    
      'is_active' => "1",
      'image_path' => $name,      
   ]);
   $subb = Subscription::create([
      'user_id' => $lastInsertedId,
      'plan_id' => '1',
      'start_date' =>  $currentDate,
      'end_date' => $endDate,
      'status' => 'Active',
    ]);

    // $linkedAgent = DriverDetail::create(['driver_id' => $parentId, 'shipper_driver' => $lastInsertedId, 'relation_status' => '1',]);
    DB::table('shipper_driver')->insert([
      'driver_id' => $parentId,
      'shipper_id' => $lastInsertedId,
      'relation_status' => 1,
      'created_at' => now(),
      'updated_at' => now(),
  ]);
    $notice = Notice::create([
      'to' =>  $lastInsertedId,
      'from' => $parentId,
      'name' => "shipper added by ". $parentId,
    ]);  
    return Redirect::back()->with('success' ,'Shipper Added  successfully!');
    }
    

  public function dashf()
  {
    $ship = ShipperInfos::all();

    return view('freight.dash',  compact('ship'));
  
  }

  public function storeDriverr(Request $reqeust)
  {
    $parentId = Auth::user()->id;
    $currentDate = Carbon::now();
    $endDate = $currentDate->copy()->addDays(30);

    $randomNumber = rand(100000, 999999);
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
      'license_number' => $reqeust->license_number,
      'license_expiry_date' => $reqeust->license_expiry_date,
      'license_type' => $reqeust->license_type,
      'years_of_experience' => $reqeust->years_of_experience,
      'vehicle_registration_number' => $reqeust->vehicle_registration_number,
      'vehicle_make' => $reqeust->vehicle_make,
      'vehicle_model' => $reqeust->vehicle_model,
      'vehicle_year' => $reqeust->vehicle_year,
      'vehicle_capacity' => $reqeust->vehicle_capacity,
      'vehicle_status' => $reqeust->vehicle_status,
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
      'status' => 'Active',
    ]);

    $linkedAgent = AgentDriver::where('driver_id', $parentId)->first();

    $notice = Notice::create([
      'to' => $linkedAgent->agent_id,
      'from' => $parentId,
      'name' => "Driver added by ". $parentId,
    ]);

    return Redirect::back()->with('success' ,'truck_driver created successfully!');
  }



  public function profiles()
  {
    $userId = Auth::user()->id;

    $driverdetail = User::with('truckers')->where('id', $userId)->get();


   return view('freight.profile' , compact('driverdetail'));
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
        $driver->fax = $request->input('fax');
        $driver->tax = $request->input('tax');
        $driver->usdot = $request->input('usdot');
        $driver->mc_number = $request->input('mc_number');
        $driver->suffix = $request->input('suffix');
        $driver->scac = $request->input('scac');
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
    public function addReg(Request $request)
  {
    $userId = Auth::user()->id;
    $validatedDataa = Validator::make($request->all(), [
      'username' => 'required',
      'password' => 'sometimes',
      'email' => 'required|email|unique:users',
      'phone' => 'sometimes',
      'role' => 'sometimes',
    ]);

    if ($validatedDataa->fails()) {
      return Redirect::back()->withErrors($validatedDataa)->withInput();
    }

    $currentDate = Carbon::now();
    $endDate = $currentDate->copy()->addDays(30);
    $validatedData = $validatedDataa->validated();

    if ($validatedData['role'] == 'truck_driver') {
      $user = User::create([
        'name' => $validatedData['username'],
        'email' => $validatedData['email'],
        'password' => Crypt::encryptString('123'),
        'role' => 'truck_driver',
        'status' => 1
      ]);
      $lastInsertedId = $user->id;

      Subscription::create([
        'user_id' => $lastInsertedId,
        'plan_id' => '1',
        'start_date' =>  $currentDate,
        'end_date' => $endDate,
        'status' => 'Active',
      ]);

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
     $data = [
      'code' => 'MC' . $randomNumber,
];
$names = $request->username;
$email = $request->email;

$code ='MC' . $randomNumber;
Mail::send('email.register', $data, function ($message) use ($email, $names, $code) {  
 $message->to($email, $names)
         ->subject('Register');
});



      return Redirect::back()->with('success' ,'truck_driver created successfully!');
    }

    return 'nothing';
  }

  public function update(Request $request )
  {
    $certificate = Certificate::find($request->cert_id);

    if ($certificate) {
        // Update the ch column
        $certificate->ch = $request->ch;
        $certificate->save();
    }





   
     return Redirect::back();
  }
  

  public function shortaddshipper(Request $request)
  {


    $userId = Auth::user()->id;
    $rules = [
      'name' => 'required',
      'Cname' => 'required',
      'password' => 'sometimes',
      'email' => 'required|email|unique:users',      
      'role' => 'sometimes',
  ];
      $validator = Validator::make($request->all(), $rules);

      // Check if validation fails
      if ($validator->fails()) {
          return response()->json([
              'status' => 'error',
              'errors' => $validator->errors()
          ], 422); // 422 Unprocessable Entity status code
      }
      $validatedData = $validator->validated();

      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Crypt::encryptString('123'),
        'role' => 'shipper',
        'status' => 1
      ]);
$lastInsertedId = $user->id;
           
        $linkedAgenxt =  ShipperInfos::create([           
          'user_id' => $lastInsertedId,
          'name' => $request->Cname,
          'status' => 0 ,
          ]);

        DB::table('shipper_driver')->insert([
          'driver_id' => $userId,
          'shipper_id' => $lastInsertedId,
          'relation_status' => 1,
          'created_at' => now(),
          'updated_at' => now(),
      ]);


      return response()->json([
        'success' => true,
        'newDriverId' => $user->id,
        'newDriverName' => $linkedAgenxt->name
    ]);

    return 'nothing';
  }
  
}
