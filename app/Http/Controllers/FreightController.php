<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Insurance_data;
use App\Models\Insurance_detail;
use App\Models\DriverDetail;
use App\Models\Subscription;
use App\Models\Notice;
use App\Models\UploadShipper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Mail;

use Barryvdh\DomPDF\Facade\Pdf as PDF;

class FreightController extends Controller
{public function __construct()
    {
      $this->middleware('checkRole:freight_driver');
    }


  public function dashf()
  {
    return view('freight.dash');
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
        'password' => Hash::make('123'),
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
                'name' => 'name',
                'email' => 'email'
            ];

            Mail::send('email.register', $data, function ($message) use ($email, $name){
                $message->to($email, $name)
                        ->subject('Register');
            });


      return Redirect::back()->with('success' ,'truck_driver created successfully!');
    }

    return 'nothing';
  }
}
