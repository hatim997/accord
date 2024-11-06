<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notice;
use App\Models\ShipperInfos;
use App\Models\DriverDetail;
use App\Models\Order;
use App\Models\AgencyInfos;
use App\Models\Subscription_plan;
use App\Models\Subscription;
use App\Models\AddToCart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Mail;
use Illuminate\Support\Facades\Crypt;
use GuzzleHttp\Client;
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


    // $result = DB::table('wp_wc_orders')
    // ->join('wp_woocommerce_order_items', 'wp_wc_orders.id', '=', 'wp_woocommerce_order_items.order_id')
    // ->select('wp_wc_orders.*', 'wp_woocommerce_order_items.order_item_name')  // You can select specific columns if needed
    // ->where('wp_wc_orders.billing_email', $user->email )  // Assuming you want to get a specific user with ID 1
    // ->first();
      $message = 'Wrong credentials or insufficient permissions';

      if ($user && Hash::check($fields['password'], $user->password) && $user->role == 'agent' || $user->role == 'admin') {
          $result = DB::table('wp_wc_orders')
              ->join('wp_woocommerce_order_items', 'wp_wc_orders.id', '=', 'wp_woocommerce_order_items.order_id')
              ->select('wp_wc_orders.*', 'wp_woocommerce_order_items.order_item_name')
              ->where('wp_wc_orders.billing_email', $user->email)
              ->first();

          // return response()->json(['status' => 'success', 'data' => $result]);
      } else {
          return Redirect::back()->with('danger', $message);
      }

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

    if ($user->role == 'admin') {
      return redirect()->route('dashs');
    }
    if ($user->role == 'agent') {
      if ($result && $result->order_item_name != null) {
        Session::put('plans', $result->order_item_name);
        Session::put('order_id', $result->id);
        $request->session()->regenerate();
      return redirect('/dash');
    }
    Session::put('plans', 'free');
    $request->session()->regenerate();
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
    // $result = DB::table('wp_wc_orders')
    // ->join('wp_woocommerce_order_items', 'wp_wc_orders.id', '=', 'wp_woocommerce_order_items.order_id')
    // ->select('wp_wc_orders.*', 'wp_woocommerce_order_items.order_item_name')  // You can select specific columns if needed
    // ->where('wp_wc_orders.billing_email', $user->email )  // Assuming you want to get a specific user with ID 1
    // ->first();
    $message = 'Wrong credentials or insufficient permissions';
    if ($user && Hash::check($fields['password'], $user->password) && $user->role == 'shipper' || $user->role == 'admin') {
        $result = DB::table('wp_wc_orders')
            ->join('wp_woocommerce_order_items', 'wp_wc_orders.id', '=', 'wp_woocommerce_order_items.order_id')
            ->select('wp_wc_orders.*', 'wp_woocommerce_order_items.order_item_name')
            ->where('wp_wc_orders.billing_email', $user->email)
            ->first();
        // return response()->json(['status' => 'success', 'data' => $result]);
    } else {
        return Redirect::back()->with('danger', $message);
    }

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
      if ($result && $result->order_item_name != null) {
        Session::put('plans', $result->order_item_name);
        Session::put('order_id', $result->id);
        $request->session()->regenerate();
      return redirect('/sportal');
    }
    Session::put('plans', 'free');
    $request->session()->regenerate();
  return redirect('/sportal');


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
    // $result = DB::table('wp_wc_orders')
    // ->join('wp_woocommerce_order_items', 'wp_wc_orders.id', '=', 'wp_woocommerce_order_items.order_id')
    // ->select('wp_wc_orders.*', 'wp_woocommerce_order_items.order_item_name')  // You can select specific columns if needed
    // ->where('wp_wc_orders.billing_email', $user->email )  // Assuming you want to get a specific user with ID 1
    // ->first();

    $message = 'Wrong credentials or insufficient permissions';
    if ($user && Hash::check($fields['password'], $user->password) && $user->role == 'truck_driver' || $user->role == 'admin') {
        $result = DB::table('wp_wc_orders')
            ->join('wp_woocommerce_order_items', 'wp_wc_orders.id', '=', 'wp_woocommerce_order_items.order_id')
            ->select('wp_wc_orders.*', 'wp_woocommerce_order_items.order_item_name')
            ->where('wp_wc_orders.billing_email', $user->email)
            ->first();
        // return response()->json(['status' => 'success', 'data' => $result]);
    } else {
        return Redirect::back()->with('danger', $message);
    }

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
      if ($result && $result->order_item_name != null) {
        Session::put('plans', $result->order_item_name);
        Session::put('order_id', $result->id);
        $request->session()->regenerate();
      return redirect('/portal');
    }
    Session::put('plans', 'free');
    $request->session()->regenerate();
  return redirect('/portal');
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
    // $result = DB::table('wp_wc_orders')
    // ->join('wp_woocommerce_order_items', 'wp_wc_orders.id', '=', 'wp_woocommerce_order_items.order_id')
    // ->select('wp_wc_orders.*', 'wp_woocommerce_order_items.order_item_name')  // You can select specific columns if needed
    // ->where('wp_wc_orders.billing_email', $user->email )  // Assuming you want to get a specific user with ID 1
    // ->first();

    $message = 'Wrong credentials or insufficient permissions';
    if ($user && Hash::check($fields['password'], $user->password) && $user->role == 'freight_driver' || $user->role == 'admin') {
        $result = DB::table('wp_wc_orders')
            ->join('wp_woocommerce_order_items', 'wp_wc_orders.id', '=', 'wp_woocommerce_order_items.order_id')
            ->select('wp_wc_orders.*', 'wp_woocommerce_order_items.order_item_name')
            ->where('wp_wc_orders.billing_email', $user->email)
            ->first();
        // return response()->json(['status' => 'success', 'data' => $result]);
    } else {
        return Redirect::back()->with('danger', $message);
    }

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
    if ($result && $result->order_item_name != null) {
      Session::put('plans', $result->order_item_name);
      Session::put('order_id', $result->id);
      $request->session()->regenerate();
    return redirect('/fportal');
  }
  Session::put('plans', 'free');
  $request->session()->regenerate();
return redirect('/fportal');

  }


      public function loginWordPress(Request $request)
      {
          // Step 1: Get the current user in Laravel
          $user = Auth::user();
          if (!$user) {
              return response()->json(['message' => 'User not logged in Laravel'], 401);
          }
          $result = DB::table('wp_users')
          ->where('user_login', $user->email )  // Assuming you want to get a specific user with ID 1
          ->first();

          // Step 2: Prepare data for WordPress login request
          $wpLoginUrl = 'https://insur.dboss.pk/wp/login-form';
          $credentials = [
              'log'      => $user->email,    // WordPress login (typically the email or username)
              'pwd'      => $result->user_pass, // Pass the user’s password from the request or session
              'remember' => true
          ];

          // Step 3: Make the request to WordPress
          $client = new Client();
          $response = $client->post($wpLoginUrl, [
              'form_params' => $credentials,
              'allow_redirects' => true,
          ]);

          // Step 4: Get the WordPress login cookies from the response
          $cookies = $response->getHeader('Set-Cookie');

          // Step 5: Set these cookies in Laravel, so that the user is logged in to WordPress as well
          foreach ($cookies as $cookie) {
              setcookie(...explode(';', $cookie)[0]); // Set each WordPress login cookie in the browser
          }

          // Optionally, redirect the user to WordPress or another page
          return redirect('https://insur.dboss.pk/wp/my-account/orders');
      }
  // validated
  public function validated()
  {
    // return"sds";
     return view('validate');
  }

  public function validation(Request $request)
  {
      // Validate the email field
      $validator = Validator::make($request->all(), [
        'code' => 'required',
    ]);

    if ($validator->fails()) {
        // If validation fails, return back with errors
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Assuming $fields['code'] contains the rememberToken value
    $fields = $request->only(['code']); // Get the relevant input from the request

    // Fetch the user with the given rememberToken
    $user = User::where('rememberToken', $fields['code'])->first();
    $result = DB::table('wp_wc_orders')
    ->join('wp_woocommerce_order_items', 'wp_wc_orders.id', '=', 'wp_woocommerce_order_items.order_id')
    ->select('wp_wc_orders.*', 'wp_woocommerce_order_items.order_item_name')  // You can select specific columns if needed
    ->where('wp_wc_orders.billing_email', $user->email )  // Assuming you want to get a specific user with ID 1
    ->first();
    if (!$user) {
        // If the user is not found, return back with a message
        return redirect()->back()->with('error', 'User not found. Please check your token and try again.');
    }

    $currentDate = Carbon::now();
    $endDate = $currentDate->copy()->addDays(30);

    $subb = Subscription::create([
      'user_id' => $user->id,
      'plan_id' => 1,
      'plan_name' => $result->order_item_name ?? null,
      'start_date' =>  $currentDate,
      'end_date' => $endDate,
      'status'=> 'Active',
    ]);

    $decryptedData = Crypt::decryptString($user->password);
    $users = User::findOrFail($user->id);
    $user->password = Hash::make($decryptedData);
    // Crypt::encryptString($validatedData['password1']),
    $user->save();
    $data = [
      'name' => $user->name,
      'email' => $user->email,
      'password' => $decryptedData,
  ];
      $name = $user->name ;
      $email = $user->email;
      $password = $decryptedData;


    Mail::send('email.login', $data, function ($message) use ($email, $name,$password) {
      $message->to($email, $name)
              ->subject('Register');
  });
  Notice::create([
      'to' => 1,
      'from' => $user->id,
      'name' => "you have new registering agency pls check",
    ]);
    // Proceed with your logic if the user is found
    // Example: return success response or perform further actions
    return redirect()->away('https://insur.dboss.pk/wp');

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

  // public function logout()
  // {
  //     $role = Auth::user()->role;
  //   if ($role == "freight_driver") {
  //     Session::flush();

  //     // Delete all cookies
  //     $cookies = Cookie::get();
  //     foreach ($cookies as $name => $value) {
  //       Cookie::queue(Cookie::forget($name));
  //     }
  //     return redirect('/login/freight');
  //   }
  //   else{
  //     Session::flush();

  //     // Delete all cookies
  //     $cookies = Cookie::get();
  //     foreach ($cookies as $name => $value) {
  //       Cookie::queue(Cookie::forget($name));
  //     }
  //       return redirect('/logg');
  //   }
  // }

  public function logout()
  {
      if (Auth::check()) {
          $role = Auth::user()->role;

          Auth::logout();
          Session::flush();

          $cookies = Cookie::get();
          foreach ($cookies as $name => $value) {
              Cookie::queue(Cookie::forget($name));
          }

          switch ($role) {
              case "freight_driver":
                  return redirect('/login/freight');
              case "shipper":
                  return redirect('/login/shipper');
              case "truck_driver":
                  return redirect('/login/truck');
              case "agent":
                  return redirect('/logg');
              default:
                  return redirect('/logg');
          }
      }

      return redirect('/logg')->with('message', 'You have been logged out.');
  }


  public function land()
  {
    $data=Subscription_plan::All();
    return view('index' ,compact('data'));
  }

  public function addtocart(Request $request)
  {
      // Initialize empty data array
      $data = [];

      // Retrieve subscription plan details using sub_id
      $subs_idd = Subscription_plan::find($request->input('sub_id'));

      // Check if the subscription exists before proceeding
      if (!$subs_idd) {
          return redirect()->back()->withErrors(['error' => 'Subscription not found.']);
      }

      // Retrieve the authenticated user
      $user = Auth::user();

      // Create a new subscription record


      // Generate unique 11-digit invoice number
      $invoiceNumber = $this->generateUniqueInvoiceNumber();
// dd($invoiceNumber );
      // Insert a new record into the orders table using the subscription ID


      // Fetch user-specific data based on role
      if ($user->role == 'agent') {
          $data = AgencyInfos::where('user_id', $user->id)->get();
      } elseif ($user->role == 'truck_driver') {
          $data = DriverDetail::where('user_id', $user->id)->get();
      } elseif ($user->role == 'shipper') {
          $data = ShipperInfos::where('user_id', $user->id)->get();
      }

      // Pass the data and subscription information to the view
      return view('auth.addtocart', compact('subs_idd', 'data', 'invoiceNumber'));
  }


  private function generateUniqueInvoiceNumber()
  {
      do {
          // Generate a random 11-digit number
          $invoiceNumber = rand(10000, 99999);
      } while (Order::where('invoice', $invoiceNumber)->exists()); // Check if it already exists

      return $invoiceNumber;
  }
  public function payNow(Request $request)
  {
      // Validate the request data
      $request->validate([
          'invoice' => 'required|string',
          'sub_id' => 'required|integer',
          'price' => 'required|numeric',
      ]);

      // Retrieve the authenticated user
      $user = Auth::user();

      // Fetch the subscription plan details
      $subscriptionPlan = Subscription_plan::find($request->sub_id);
      if (!$subscriptionPlan) {
          return redirect()->back()->withErrors(['error' => 'Subscription plan not found.']);
      }

      // Create a new subscription record
      $subscription = Subscription::create([
          'user_id' => $user->id,
          'plan_id' => $request->sub_id,
          'start_date' => now(),
          'end_date' => now()->addMonth(),
          'status' => 'Active',
      ]);

      // Insert a new record into the orders table
      $order = Order::create([
          'subscription_id' => $subscription->id,
          'invoice' => $request->input('invoice'),
          'issue_date' => now(),
          'price' => $request->price,
      ]);

      // Retrieve user name based on role
      if ($user->role == 'agent') {
          $userInfo = AgencyInfos::where('user_id', $user->id)->first();
          $userName = $userInfo ? $userInfo->name : $user->name;
      } elseif (in_array($user->role, ['truck_driver', 'freight_driver'])) {
          $userInfo = DriverDetail::where('user_id', $user->id)->first();
          $userName = $userInfo ? $userInfo->name : $user->name;
      } elseif ($user->role == 'shipper') {
          $userInfo = ShipperInfos::where('user_id', $user->id)->first();
          $userName = $userInfo ? $userInfo->name : $user->name;
      } else {
          $userName = $user->name;
      }

      // Retrieve admin details for email
      $admin = User::find(1);
      $data = [

          'userName' => $userName,  // Custom user name based on role
          'userRole' => $user->role,
          'userEmail' => $user->email,
          'planName' => $subscriptionPlan->name,  // Plan name for the admin email
      ];
      $orderId = $order->id;
      $orderTime = $order->created_at->format('d/m/Y h:ia');

      // Send email to admin
      Mail::send('email.message', $data, function ($message) use ($admin, $user, $orderId, $orderTime, $subscriptionPlan) {
          $message->to($admin->email, $admin->name)
                  ->subject(
                      'Order ID: ' . $orderId .
                      ' | User Email: ' . $user->email .
                      ' | Plan: ' . $subscriptionPlan->name .
                      ' | Order Placed At: ' . $orderTime
                  );
      });

      // Send email to user
      Mail::send('email.user_message', $data, function ($message) use ($user, $orderId, $orderTime) {
          $message->to($user->email, $user->name)
                  ->subject(
                      'Your - Order ID: ' . $orderId .
                      ' | Order Placed At: ' . $orderTime
                  );
      });

      // Redirect to a confirmation page or the orders page, passing data in session
      return redirect()->route('blanks')->with([
          'success' => 'Order placed successfully.',
          'invoice' => $request->input('invoice'),
          'email' => $user->email,
          'orderTime' => $orderTime,
      ]);
  }




}
