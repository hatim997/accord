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

class FreightController extends Controller
{public function __construct()
    {
      $this->middleware('checkRole:freight_driver');
    }


    public function drivers()
    {
      return view('freight.add-shipper');
    }
    public function addshipper(Request $request)
    {
        $parentId = Auth::user()->id;
        $currentDate = Carbon::now();
        $endDate = $currentDate->copy()->addDays(30);
        $randomNumber = rand(100000, 999999);

        // Create user
        $user = User::create([
            'name' => $request->fname,
            'email' => $request->email,
            'password' => Crypt::encryptString($request->password),
            'role' => "shipper",
            'rememberToken' => 'SH' . $randomNumber,
            'status' => "1",
        ]);

        $lastInsertedId = $user->id;
        // $name = '';

        // // Store uploaded image if available
        // if (!empty($request->file('imagePath'))) {
        //     $file = $request->file('imagePath');
        //     $name = Carbon::now()->timestamp . '_' . $lastInsertedId . '.' . $file->extension();
        //     $file->storeAs('public/uploads_broker_license', $name);
        // }

        // Create shipper info
        ShipperInfos::create([
            'user_id' => $lastInsertedId,
            'name' => $request->name,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'suffix' => $request->suffix,
            'nominal_capital' => $request->nominal_capital,
            'prefix' => $request->prefix,
            'address' => $request->address,
            'address2' => $request->address2,
            'zip' => $request->zip,
            'websit' => $request->websit,
            'tax' => $request->tax,
            'industry' => $request->industry,
            'state' => $request->state,
            'cellphone' => $request->cellphone,
            'extra_email' => $request->extra_email,
            'fname' => $request->fname,
            'owner' => $request->owner,
            'is_active' => "1",
            // 'image_path' => $name,
        ]);

        // Create subscription
        Subscription::create([
            'user_id' => $lastInsertedId,
            'plan_id' => '1',
            'start_date' => $currentDate,
            'end_date' => $endDate,
            'status' => '1',
        ]);

        // Link driver to shipper
        DB::table('shipper_driver')->insert([
            'driver_id' => $parentId,
            'shipper_id' => $lastInsertedId,
            'relation_status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Add notice
        Notice::create([
            'to' => $lastInsertedId,
            'from' => $parentId,
            'name' => "Shipper added by " . $parentId,
        ]);

        // Prepare email data for the shipper
        $data = [
            'code' => 'SH' . $randomNumber,
        ];
        $names = $request->name;
        $email = $request->email;

        // Send email to the new shipper
        Mail::send('email.register', $data, function ($message) use ($email, $names) {
            $message->to($email, $names)
                    ->subject('Shipper Registration Confirmation');
        });

        // Admin notification
        $admin = User::find(1);  // Assuming admin has ID 1
        $data = [
            'adminName' => $admin->name,
            'userName' => $request->name,
            'verificationCode' => 'SH' . $randomNumber,
            'addedBy' => Auth::user()->name,
            'addingUserCode' => Auth::user()->rememberToken,
        ];

        Mail::send('email.message', $data, function ($message) use ($admin, $request) {
            $message->to($admin->email, $admin->name)
                    ->subject('New Shipper Added: ' . $request->name);
        });

        return Redirect::back()->with('success', 'Shipper added successfully!');
    }



    public function dashf()
    {
        $ship = ShipperInfos::all();
        $userId = auth()->user()->id;
        $user = request()->user();

        // Retrieve all freight drivers
        $allFreightDrivers = User::where('role', 'freight_driver')->get();

        // Initialize counters
        $activeFreightCount = 0;
        $inactiveFreightCount = 0;

        // Separate active and inactive drivers and count each type
        $activeFreight = [];
        $inactiveFreight = [];
        foreach ($allFreightDrivers as $freightDriver) {
            if ($freightDriver->status == 1 && $freightDriver->name === $user->name) {
                $activeFreightCount++;
                $activeFreight[] = [
                    'name' => $freightDriver->name,
                    'email' => $freightDriver->email,
                    'rememberToken' => $freightDriver->rememberToken,
                ];
            } elseif ($freightDriver->status == 0 && $freightDriver->name === $user->name) {
                $inactiveFreightCount++;
                $inactiveFreight[] = [
                    'name' => $freightDriver->name,
                    'email' => $freightDriver->email,
                    'rememberToken' => $freightDriver->rememberToken,
                ];
            }
        }

        // Pass the variables to the view
        return view('freight.dash', compact('ship', 'activeFreightCount', 'activeFreight', 'inactiveFreightCount', 'inactiveFreight'));
    }


  public function storeDriverr(Request $reqeust)
  {
    $validatedDataa = Validator::make($reqeust->all(), [
      'name' => 'required',
      // 'scac' => 'required',
      // 'mc_number' => 'required',
      // 'usdot' => 'required',
      // 'tax' => 'required',
      // 'prefix' => 'required',
      'fname' => 'required',
      'mname' => 'sometimes',
      'lname' => 'required',
      // 'suffix' => 'required',
      'title' => 'required',
      'email' => 'required|email|unique:users',
      'address' => 'required',
      'cellphone' => 'required',
      // 'salutation'=> 'required',
      'zip' => 'required',
      'state' => 'required',
      'city' => 'required',
      // 'license_number'=> 'required',
      // 'password' => 'required',
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
      'name' => $reqeust->fname,
      'email' =>$reqeust->email,
      'password' => Crypt::encryptString($reqeust->password),
      'role' => "truck_driver",
      'rememberToken' => 'MC'.$randomNumber,
      'status' => "1",
    ]);

    $lastInsertedId = $user->id;
    // $name = ''

    // if(!empty($reqeust->file('imagePath'))){
    //   $file  = $reqeust->file('imagePath');
    //   $name = Carbon::now()->timestamp . '_' . $lastInsertedId . '.' . $file->extension();
    //   $file->storeAs('public/uploads_driver_license', $name);
    // }

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
      // 'image_path' => $name,
      'fax' => $reqeust->fax,
   ]);

    $subb = Subscription::create([
      'user_id' => $lastInsertedId,
      'plan_id' => '1',
      'start_date' =>  $currentDate,
      'end_date' => $endDate,
      'status' => '1',
    ]);

    $linkedAgent = AgentDriver::where('driver_id', $parentId)->first();


    $driver = DriverDetail::where('parent_id' ,$parentId)->get();
    // dd( $driver);
    Notice::create([
      'to' => 1,
      'from' => $parentId,
      'name' => "$reqeust->name {Trucker} Driver added by ".$driver[0]->name,
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
$names = $reqeust->name;
$email = $reqeust->email;

$code ='MC' . $randomNumber;
Mail::send('email.register', $data, function ($message) use ($email, $names, $code) {
 $message->to($email, $names)
         ->subject('Register');
});

$admin = User::find(1);

$data = [
    'adminName' => $admin->name,
    'userName' => $reqeust->name,
    'verificationCode' => $code,
    'addedBy' => $driver[0]->name,
    'addingUserCode' => Auth::user()->rememberToken
];

Mail::send('email.message', $data, function ($message) use ($admin, $code, $reqeust, $driver) {
    $message->to($admin->email, $admin->name)
            ->subject('Registration Confirmation - Name: ' . $reqeust->name .
                      ' Code Is: ' . $code .
                      ' Added By: ' . $driver[0]->name .
                      ' Code Is: ' . Auth::user()->rememberToken);
});

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
    public function update(Request $request )
  {
    $certificate = Certificate::find($request->cert_id);
    if ($certificate) {
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
