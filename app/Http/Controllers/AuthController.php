<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notice;
use App\Models\ShipperInfos;
use App\Models\DriverDetail;
use App\Models\AgencyInfos;
use App\Models\Subscription_plan;
use App\Models\Subscription;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;
use Mail;
use Illuminate\Validation\ValidationException;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class AuthController extends Controller
{
  public function login(Request $request)
  {
    $fields = $request->validate([
      'email' => 'required',
      'password' => 'required',
    ]);  
    $user = User::where('email', $fields['email'])->first();
    $credentials = $request->only('email', 'password');
    if (!Auth::attempt($credentials)) {    
         $message = 'Wrong credentials';
   return Redirect::back()->with('danger' ,$message);
    }  
    if ($user->role == 'truck_driver') {
      $message = 'Wrong credentials';
   return Redirect::back()->with('danger' ,$message);
    }
    if ($user->role == 'shipper') {
      $message = 'Wrong credentials';
      return Redirect::back()->with('danger' ,$message);
    }
    Session::put('userRole', $user->role);
    Session::put('userId', $user->id);
    $request->session()->regenerate();
    if ($user->role == 'admin') {
      return redirect()->route('dashs');
    }
    if ($user->role == 'agent') {
      return redirect('/dash');
    }
   
    $message = 'Wrong credentials';
    return Redirect::back()->with('danger' ,$message);

   
  }
  public function logins(Request $request)
  {
    $fields = $request->validate([
      'email' => 'required',
      'password' => 'required',
    ]);  
    $user = User::where('email', $fields['email'])->first();
    $credentials = $request->only('email', 'password');
    if (!Auth::attempt($credentials)) {    
         $message = 'Wrong credentials';
   return Redirect::back()->with('danger' ,$message);
    }
    Session::put('userRole', $user->role);
    Session::put('userId', $user->id);
    $request->session()->regenerate();
    if ($user->role == 'admin') {
      return redirect()->route('dashs');
    }
    if ($user->role == 'agent') {
      $message = 'Wrong credentials';
   return Redirect::back()->with('danger' ,$message);
    }
    if ($user->role == 'truck_driver') {
      $message = 'Wrong credentials';
      return Redirect::back()->with('danger' ,$message);
    }
    if ($user->role == 'shipper') {
      return redirect("/sportal");
    }
    $message = 'Wrong credentials';
    return Redirect::back()->with('danger' ,$message);
  }
  public function logint(Request $request)
  {
    $fields = $request->validate([
      'email' => 'required',
      'password' => 'required',
    ]);  
    $user = User::where('email', $fields['email'])->first();
    $credentials = $request->only('email', 'password');
    if (!Auth::attempt($credentials)) {    
         $message = 'Wrong credentials';
   return Redirect::back()->with('danger' ,$message);
    }
    Session::put('userRole', $user->role);
    Session::put('userId', $user->id);
    $request->session()->regenerate();
    if ($user->role == 'admin') {
      return redirect()->route('dashs');
    }
    if ($user->role == 'agent') {
      $message = 'Wrong credentials';
      return Redirect::back()->with('danger' ,$message);
    }
    if ($user->role == 'truck_driver') {
      return redirect("/portal");
    }
    if ($user->role == 'shipper') {
      $message = 'Wrong credentials';
      return Redirect::back()->with('danger' ,$message);
    }
    return redirect('/fportal');
  }
  public function loginf(Request $request)
  {
    $fields = $request->validate([
      'email' => 'required',
      'password' => 'required',
    ]);  
    $user = User::where('email', $fields['email'])->first();
    $credentials = $request->only('email', 'password');
    if (!Auth::attempt($credentials)) {    
         $message = 'Wrong credentials';
   return Redirect::back()->with('danger' ,$message);
    }
    Session::put('userRole', $user->role);
    Session::put('userId', $user->id);
    $request->session()->regenerate();
    if ($user->role == 'admin') {
      return redirect()->route('dashs');
    }
    if ($user->role == 'agent') {
      $message = 'Wrong credentials';
      return Redirect::back()->with('danger' ,$message);
    }
    if ($user->role == 'truck_driver') {
      $message = 'Wrong credentials';
      return Redirect::back()->with('danger' ,$message);
    }
    if ($user->role == 'shipper') {
      $message = 'Wrong credentials';
      return Redirect::back()->with('danger' ,$message);
    }
    return redirect('/fportal');
  }



  public function register(Request $request)
  {
    $validatedDataa = Validator::make($request->all(), [
      'username' => 'required',
      'password1' => 'required',
      'email' => 'required|email|unique:users',
      'role' => 'required',
      'Addss' => 'sometimes',
      'Addss2' => 'sometimes',
      'fullname' => 'sometimes',
      'country' => 'sometimes',
      'city' => 'sometimes',
      'state' => 'sometimes',
      'zip' => 'sometimes',
      'phone' => 'sometimes',
      'altemail' => 'sometimes',
      'license_number' => 'sometimes',
      'license_expiry_date' => 'sometimes',
      'license_type' => 'sometimes',
      'years_of_experience' => 'sometimes',
      'vehicle_registration_number' => 'sometimes',
      'vehicle_make' => 'sometimes',
      'vehicle_model' => 'sometimes',
      'vehicle_year' => 'sometimes:',
      'vehicle_capacity' => 'sometimes',
      'vehicle_status' => 'sometimes',
      'mc_number' => 'sometimes',
      'subs_id' => 'sometimes',

    ]);
    // var_dump( $validatedDataa);


    if($validatedDataa->fails()){
      // return Redirect::back()
      //   ->withErrors($validatedDataa)
      //   ->withInput();
      return 'fail';
    }
    $currentDate = Carbon::now();
    $endDate = $currentDate->copy()->addDays(30);
    $validatedData = $validatedDataa->validated();



    // dd( $validatedDataa->getData()['Addss']);


    if ($validatedData['role'] == 'agent') {

      $randomNumber = rand(100000, 999999);
      $user = User::create([
        'name' => $validatedData['username'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password1']),
        'rememberToken' => 'IA' . $randomNumber,
      'role' => $validatedData['role'], // Assuming default role ID for 'user'
    ]);
    $lastInsertedId = $user->id;

$subb = Subscription::create([
  'user_id' => $lastInsertedId,
  'plan_id' => $validatedData['subs_id'],
    'start_date' =>  $currentDate,
    'end_date' => $endDate,
  'status'=> 'Active',
]);
$name = $validatedData['username'];
$email = $validatedData['email'];
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
      return response()->json([
        'message' => 'agent created successfully!',
        'user_id' => $lastInsertedId,
      ]);

        $data = [
                'name' => 'name',
                'email' => 'email'
            ];

            Mail::send('email.register', $data, function ($message) use ($email, $name) {
                $message->to($email, $name)
                        ->subject('Register');
            });
    }
    if ($validatedData['role'] == 'shipper') {

      $randomNumber = rand(100000, 999999);
      $user = User::create([
        'name' => $validatedData['username'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password1']),
        'rememberToken' => 'SH' . $randomNumber,
      'role' => $validatedData['role'], // Assuming default role ID for 'user'
    ]);
    $lastInsertedId = $user->id;

$subb = Subscription::create([
  'user_id' => $lastInsertedId,
  'plan_id' => $validatedData['subs_id'],
    'start_date' =>  $currentDate,
    'end_date' => $endDate,
  'status'=> 'Active',
]);
$name = $validatedData['username'];
$email = $validatedData['email'];
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
      return response()->json([
        'message' => 'shipper created successfully!',
        'user_id' => $lastInsertedId,
      ]);
        $data = [
                'name' => 'name',
                'email' => 'email'
            ];

            Mail::send('email.register', $data, function ($message) use ($email, $name){
                $message->to($email, $name)
                        ->subject('Register');
            });
    }
    if ($validatedData['role'] == 'truck_driver') {

      $randomNumber = rand(100000, 999999);
      $user = User::create([
        'name' => $validatedData['username'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password1']),
        'rememberToken' => 'MC' . $randomNumber,
      'role' => $validatedData['role'], // Assuming default role ID for 'user'
    ]);
    $lastInsertedId = $user->id;

$subb = Subscription::create([
  'user_id' => $lastInsertedId,
  'plan_id' => $validatedData['subs_id'],
    'start_date' =>  $currentDate,
    'end_date' => $endDate,
  'status'=> 'Active',
]);
$name = $validatedData['username'];
$email = $validatedData['email'];
       $user = DriverDetail::create([
        'user_id' => $lastInsertedId,
        'address' => $validatedData['Addss'],
        'address2' => $validatedData['Addss2'],
        'name' => $validatedData['fullname'],
        'city' => $validatedData['city'],
        'state' => $validatedData['state'],
        'zip' => $validatedData['zip'],
        'cellphone' => $validatedData['phone'],
        'extra_email' => $validatedData['altemail'],
        'license_number' => $validatedData['license_number'],
        'license_expiry_date'=> $validatedData['license_expiry_date'],
        'license_type' => $validatedData['license_type'],
        'years_of_experience'=> $validatedData['years_of_experience'],
        'vehicle_registration_number'=> $validatedData['vehicle_registration_number'],
        'vehicle_make'=> $validatedData['vehicle_make'],
        'vehicle_model'=> $validatedData['vehicle_model'],
        'vehicle_year'=> $validatedData['vehicle_year'],
        'vehicle_capacity'=> $validatedData['vehicle_capacity'],
        'vehicle_status'=> $validatedData['vehicle_status'],
        'mc_number'=> $validatedData['mc_number'],
      ]);
      return response()->json([
        'message' => 'truker created successfully!',
        'user_id' => $lastInsertedId,
      ]);
        $data = [
                'name' => 'name',
                'email' => 'email'
            ];

            Mail::send('email.register', $data, function ($message) use ($email, $name){
                $message->to($email, $name)
                        ->subject('Register');
            });
    }

    if ($validatedData['role'] == 'freight_driver') {

      $randomNumber = rand(100000, 999999);
      $user = User::create([
        'name' => $validatedData['username'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password1']),
        'rememberToken' => 'FB' . $randomNumber,
      'role' => $validatedData['role'], // Assuming default role ID for 'user'
    ]);
    $lastInsertedId = $user->id;

$subb = Subscription::create([
  'user_id' => $lastInsertedId,
  'plan_id' => $validatedData['subs_id'],
    'start_date' =>  $currentDate,
    'end_date' => $endDate,
  'status'=> 'Active',
]);
$name = $validatedData['username'];
$email = $validatedData['email'];
      $user = DriverDetail::create([
        'user_id' => $lastInsertedId,

        'address' => $validatedData['Addss'],
        'address2' => $validatedData['Addss2'],
        'name' => $validatedData['fullname'],
        'city' => $validatedData['city'],
        'state' => $validatedData['state'],
        'zip' => $validatedData['zip'],
        'cellphone' => $validatedData['phone'],
        'extra_email' => $validatedData['altemail'],
      ]);
      return response()->json([
        'message' => 'freight created successfully!',
        'user_id' => $lastInsertedId,
      ]);
        $data = [
                'name' => 'name',
                'email' => 'email'
            ];

            Mail::send('email.register', $data, function ($message) use ($email, $name) {
                $message->to($email, $name)
                        ->subject('Register');
            });
    }
    // // return response()->json([
    // //   'message' => 'admin created successfully!',
    // //   'user_id' => $lastInsertedId,
    // // ]);

    // // Your existing code...

    // // return response()->json(['message' => 'Success']);
    // // return response()->json(['message' => 'Success']);
    // // Redirect to intended or successful registration page

      return 'notthing';
  }


  public function getregister(Request $request)
  {
    $validatedDataa = Validator::make($request->all(), [
      'username' => 'required',
      'password1' => 'required',
      'email' => 'required|email|unique:users',
      'role' => 'required',
      'Addss' => 'sometimes',
      'Addss2' => 'sometimes',
      'fullname' => 'sometimes',
      'country' => 'sometimes',
      'city' => 'sometimes',
      'state' => 'sometimes',
      'zip' => 'sometimes',
      'phone' => 'sometimes',
      'altemail' => 'sometimes',
      'license_number' => 'sometimes',
      'license_expiry_date' => 'sometimes',
      'license_type' => 'sometimes',
      'years_of_experience' => 'sometimes',
      'vehicle_registration_number' => 'sometimes',
      'vehicle_make' => 'sometimes',
      'vehicle_model' => 'sometimes',
      'vehicle_year' => 'sometimes:',
      'vehicle_capacity' => 'sometimes',
      'vehicle_status' => 'sometimes',
      'mc_number' => 'sometimes',
      'subs_id' => 'sometimes',

    ]);
    // var_dump( $validatedDataa);


    if($validatedDataa->fails()){
      // return Redirect::back()
      //   ->withErrors($validatedDataa)
      //   ->withInput();
      return 'fail';
    }
    $currentDate = Carbon::now();
    $endDate = $currentDate->copy()->addDays(30);
    $validatedData = $validatedDataa->validated();

    $user = User::create([
      'name' => $validatedData['username'],
      'email' => $validatedData['email'],
      'password' => Hash::make($validatedData['password1']),
      'role' => $validatedData['role'], // Assuming default role ID for 'user'
    ]);
    $lastInsertedId = $user->id;

$subb = Subscription::create([
  'user_id' => $lastInsertedId,
   'plan_id' => '1',
    'start_date' =>  $currentDate,
    'end_date' => $endDate,
  'status'=> 'Active',
]);



    // dd( $validatedDataa->getData()['Addss']);


    if ($validatedData['role'] == 'agent') {
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
      $request->session()->flash('message', 'agent created successfully!');
        $data = [
                'name' => 'name',
                'email' => 'email'
            ];

            Mail::send('email.register', $data, function ($message) use ($email, $name){
                $message->to($email, $name)
                        ->subject('Register');
            });
      return redirect()->route('auth-login-basic');
    }
    if ($validatedData['role'] == 'shipper') {
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
      $request->session()->flash('message', 'truck_driver created successfully!');
        $data = [
                'name' => 'name',
                'email' => 'email'
            ];

            Mail::send('email.register', $data, function ($message) use ($email, $name){
                $message->to($email, $name)
                        ->subject('Register');
            });
      return redirect()->route('auth-login-s');
    }
    if ($validatedData['role'] == 'truck_driver') {
       $user = DriverDetail::create([
        'user_id' => $lastInsertedId,
        'address' => $validatedData['Addss'],
        'address2' => $validatedData['Addss2'],
        'name' => $validatedData['fullname'],
        'city' => $validatedData['city'],
        'state' => $validatedData['state'],
        'zip' => $validatedData['zip'],
        'cellphone' => $validatedData['phone'],
        'extra_email' => $validatedData['altemail'],
        'license_number' => $validatedData['license_number'],
        'license_expiry_date'=> $validatedData['license_expiry_date'],
        'license_type' => $validatedData['license_type'],
        'years_of_experience'=> $validatedData['years_of_experience'],
        'vehicle_registration_number'=> $validatedData['vehicle_registration_number'],
        'vehicle_make'=> $validatedData['vehicle_make'],
        'vehicle_model'=> $validatedData['vehicle_model'],
        'vehicle_year'=> $validatedData['vehicle_year'],
        'vehicle_capacity'=> $validatedData['vehicle_capacity'],
        'vehicle_status'=> $validatedData['vehicle_status'],
        'mc_number'=> $validatedData['mc_number'],
      ]);
      $request->session()->flash('message', 'truck_driver created successfully!');
        $data = [
                'name' => 'name',
                'email' => 'email'
            ];

            Mail::send('email.register', $data, function ($message) use ($email, $name) {
                $message->to($email, $name)
                        ->subject('Register');
            });
      return redirect()->route('auth-login-t');
    }

    if ($validatedData['role'] == 'freight_driver') {
      $user = DriverDetail::create([
        'user_id' => $lastInsertedId,

        'address' => $validatedData['Addss'],
        'address2' => $validatedData['Addss2'],
        'name' => $validatedData['fullname'],
        'city' => $validatedData['city'],
        'state' => $validatedData['state'],
        'zip' => $validatedData['zip'],
        'cellphone' => $validatedData['phone'],
        'extra_email' => $validatedData['altemail'],
      ]);
      $request->session()->flash('message', 'freight_driver created successfully!');
        $data = [
                'name' => 'name',
                'email' => 'email'
            ];

            Mail::send('email.register', $data, function ($message) use ($email, $name) {
                $message->to($email, $name)
                        ->subject('Register');
            });
      return redirect()->route('auth-login-t');
    }
    // // return response()->json([
    // //   'message' => 'admin created successfully!',
    // //   'user_id' => $lastInsertedId,
    // // ]);

    // // Your existing code...

    // // return response()->json(['message' => 'Success']);
    // // return response()->json(['message' => 'Success']);
    // // Redirect to intended or successful registration page

      return 'notthing';
  }


  public function form(int $id)
  {
    $data = AgencyInfos::Where('user_id' , $id)->get();
    $view = 'truck.from';
    // $cert = 'driver.pdf';
    // $pdf = PDF::loadView($view, compact('data'))->setPaper('a4', 'portrait');
    // return $pdf->download($cert);
    return view($view, compact('data'));
  }

  public function logout()
  {
    $role = Auth::user()->role;
   if ($role == "freight_driver") {
    Session::flush();

    // Delete all cookies
    $cookies = Cookie::get();
    foreach ($cookies as $name => $value) {
      Cookie::queue(Cookie::forget($name));
    }  
    return redirect('/login/freight');
   }
   else{
    Session::flush();

    // Delete all cookies
    $cookies = Cookie::get();
    foreach ($cookies as $name => $value) {
      Cookie::queue(Cookie::forget($name));
    }
  
    return redirect('/logg');
  }
  }

  public function land()
  {
    $data=Subscription_plan::All();

    return view('index' ,compact('data'));
  }
  public function registerfrom (Request $request)
  {
   $subs_id =$request->sub_id;
    return view('auth.regist' ,compact('subs_id'));
  }


}
