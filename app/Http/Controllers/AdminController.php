<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Notice;
use App\Models\DriverDetail;
use App\Models\AgencyInfos;
use App\Models\Subscription_plan;
use App\Models\ShipperInfos;
use App\Models\AgentDriver;
use App\Models\Certificate;
use App\Models\ShipperDriver;
use App\Models\Subscription;
use App\Models\UploadShipper;
use App\Models\PolicyLimit;
use App\Models\PolicyType;
use App\Models\Openrequest; 
use App\Models\ShipperLimit;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
  public function __construct()
  {
    $this->middleware('checkRole:admin');
  }

  public function dashuser()
  {
    $users = User::all();
    return view('admin_user', compact('users'));
    // return view('dash');
  }
  public function dashadmin()
  {
    $users = User::all();
    $recently = User::where('created_at', '>=', Carbon::now()->subWeek())->get();
    $activeUser = User::where('status', '0')->get();
    $inactiveUser = User::where('status', '1')->get();
    $oneWeekAgo = Carbon::now()->subWeek();
    $userCount = User::where('created_at', '>=', $oneWeekAgo)->count();
    $activeUserCount = User::where('status', '0')->count();
    $inactiveUserCount = User::where('status', '1')->count();



    return view('admin_dash', compact('userCount','activeUserCount', 'inactiveUserCount', 'recently', 'activeUser', 'inactiveUser'));
    // return view('dash');
  }
  public function markAsRead($id)
  {
      $request = Openrequest::find($id);
      if ($request) {
          $request->status = 1;  // Mark as read
          $request->save();
          
          // Check if there are any other open requests
          $openRequests = Openrequest::where('status', 0)
                          ->where('from', auth()->user()->id)
                          ->exists();
  
          return response()->json([
              'success' => true,
              'allRead' => !$openRequests  // True if all requests are now read
          ]);
      }
  
      return response()->json(['success' => false], 400);
  }




  public function certadmin()
  {
    $certificate = Certificate::all();
    return view('certifecate', compact('certificate'));
  }
  public function edituser(int $id){
    $users = User::find($id);
    // return $users->role;

    if ($users->role == "agent") {

      $userss = AgencyInfos::where('user_id', $id)->first();
    }
    elseif ($users->role == "shipper") {
      $userss = ShipperInfos::where('user_id', $id)->first();
    }
    elseif ($users->role == "truck_driver" || $users->role == "freight_driver" ) {
      $userss = DriverDetail::where('user_id', $id)->first();
    }
    return view('users', compact('users','userss'));

  }
  public function deleteuser(int $id){
    $users = User::find($id);
    if ($users->status != "0") {

    if ($users->role == "agent") {

      $userss = AgencyInfos::where('user_id', $id)->delete();
      Notice::where('to',$id)->orWhere('from',$id)->delete();
      AgentDriver::where('driver_id',$id)->orWhere('agent_id',$id)->delete();
      Subscription::where('user_id', $id)->delete();  
      User::where('id',$id)->delete();
      $message = 'delete done agent';
      return  Redirect::back()->with('success' , $message);

    }
    elseif ($users->role == "shipper") {
      $userss = ShipperInfos::where('user_id', $id)->delete();     
      ShipperDriver::where('driver_id',$id)->orWhere('shipper_id',$id)->delete();
      Notice::where('to',$id)->orWhere('from',$id)->delete();
      Subscription::where('user_id', $id)->delete();  
      User::where('id',$id)->delete();
      $message = 'delete done shipper';
      return Redirect::back()->with('success' ,$message);
    }
    elseif ($users->role == "truck_driver" || $users->role == "freight_driver" ) {
      $userss = DriverDetail::where('user_id', $id)->delete();  
      ShipperDriver::where('driver_id',$id)->orWhere('shipper_id',$id)->delete();
      Notice::where('to',$id)->orWhere('from',$id)->delete();
      Subscription::where('user_id', $id)->delete(); 
      AgentDriver::where('driver_id',$id)->orWhere('agent_id',$id)->delete(); 
      User::where('id',$id)->delete();
      $message = 'delete done ';
      return Redirect::back()->with('success' ,$message);

    }
  }
  else{
    $message = 'First User have to inactive';
   return Redirect::back()->with('success' ,$message);
  }
    
  }
  public function shipperlimits(string $id)
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

  $shipper = User::with('shipper_limit')->where('id', $id)->get();

  return view('fromdrop2', compact('policytypes', 'shipper'));

  }



  public function certactive($id)
  {
    $user = Certificate::find($id);

    // Check if user exists
    if ($user) {
        // Update the user's status to 'deactivated'
        $user->status = '1';
        $user->save();
    } else {
        // Handle the case where the user was not found
        return redirect()->back()->withErrors(['User not found.']);
    }
    return redirect()->back();
  }
  public function certdeactive($id)
  {
    $user = Certificate::find($id);

    // Check if user exists
    if ($user) {
        // Update the user's status to 'deactivated'
        $user->status = '0';
        $user->save();
    } else {
        // Handle the case where the user was not found
        return redirect()->back()->withErrors(['User not found.']);
    }
    return redirect()->back();
  }





  public function updateuser(Request $request)
  {
     //dd($request);
    if ($request->role == "agent") {
      $userss = AgencyInfos::find($request->table_id);

      if(!empty($userss)){
        $userss->name =  $request->fullname;
        $userss->cellphone =  $request->phone;
        $userss->Address =  $request->Address;
        $userss->address2 =  $request->Address2;
        $userss->extra_email =  $request->altemail;
        $userss->city =  $request->city;
        $userss->state =  $request->state;
        $userss->zip =  $request->zip;
        $userss->save();
      } else {
        $userss = new AgencyInfos;
        $userss->name =  $request->fullname;
        $userss->cellphone =  $request->phone;
        $userss->Address =  $request->Address;
        $userss->address2 =  $request->Address2;
        $userss->extra_email =  $request->altemail;
        $userss->city =  $request->city;
        $userss->state =  $request->state;
        $userss->zip =  $request->zip;
        $userss->user_id =  $request->user_id;
        $userss->save();
      }

      $users = User::find($request->user_id);
      $users->name =  $request->username;
      $users->email =  $request->email;
      $users->save();
      $message = 'edite done agent';
      return back()->with($message);

    }
    elseif ($request->role == "shipper") {
      $userss = ShipperInfos::find($request->table_id);
      if(!empty($userss)){
        $userss->name =  $request->fullname;
        $userss->cellphone =  $request->phone;
        $userss->Address =  $request->Address;
        $userss->address2 =  $request->Address2;
        $userss->extra_email =  $request->altemail;
        $userss->city =  $request->city;
        $userss->state =  $request->state;
        $userss->zip =  $request->zip;
        $userss->save();
      } else {
        $userss = new ShipperInfos;
        $userss->name =  $request->fullname;
        $userss->cellphone =  $request->phone;
        $userss->Address =  $request->Address;
        $userss->address2 =  $request->Address2;
        $userss->extra_email =  $request->altemail;
        $userss->city =  $request->city;
        $userss->state =  $request->state;
        $userss->zip =  $request->zip;
        $userss->user_id =  $request->user_id;
        $userss->save();
      }

      $users = User::find($request->user_id);
      $users->name =  $request->username;
      $users->password = Crypt::encryptString ($request->password);
      $users->email =  $request->email;
      $users->save();
      $message="edite done shipper";
      return back()->with( $message);

    }
elseif ($request->role == "truck_driver" || $request->role == "freight_driver" ) {
  $userss = DriverDetail::find($request->table_id);

  if(!empty($userss)){
    $userss->name =  $request->fullname;
    $userss->cellphone =  $request->phone;
    $userss->Address =  $request->Address;
    $userss->address2 =  $request->Address2;
    $userss->extra_email =  $request->altemail;
    $userss->city =  $request->city;
    $userss->state =  $request->state;
    $userss->zip =  $request->zip;
    $userss->save();
  } else {
    $userss = new DriverDetail;
    $userss->name =  $request->fullname;
    $userss->cellphone =  $request->phone;
    $userss->Address =  $request->Address;
    $userss->address2 =  $request->Address2;
    $userss->extra_email =  $request->altemail;
    $userss->city =  $request->city;
    $userss->state =  $request->state;
    $userss->zip =  $request->zip;
    $userss->user_id =  $request->user_id;
    $userss->save();
  }

  $users = User::find($request->user_id);
  $users->name =  $request->username;
  $users->password = Crypt::encryptString ($request->password);
  $users->email =  $request->email;
  $users->save();
  $message='edite done truck & freight driver ';
  return back()->with($message);

}

$message='Not Done';
return back()->with($message);
  }

  public function pdf()
  {
    $insuranceData = Insurance_data::first();
    $Insurance_detail = Insurance_detail::first();

    return view('agent.pdf', compact('insuranceData', 'Insurance_detail'));
  }

  public function active($id)
  {
    
    $user = User::find($id);

    // Check if user exists
    if ($user) {
        // Update the user's status to 'deactivated'
        $user->status = '1';
        $user->save();
    } else {
        // Handle the case where the user was not found
        return redirect()->back()->withErrors(['User not found.']);
    }
    return redirect()->back();
  }
  public function deactive($id)
  {
    $user = User::find($id);

    // Check if user exists
    if ($user) {
        // Update the user's status to 'deactivated'
        $user->status = '0';
        $user->save();
    } else {
        // Handle the case where the user was not found
        return redirect()->back()->withErrors(['User not found.']);
    }
    return redirect()->back();
  }




  public function subs()
  {
  $sub = Subscription_plan::all();
    return view('sub', compact('sub'));
  }
  public function add_sub (Request $request)
  {
    Subscription_plan::create($request->all());
    $sub = Subscription_plan::all();

    // return view('sub', compact('sub'))->with('success', 'Subscription Plan created successfully.');
    return response()->json([
      'message' => 'Subscription Plan created successfully.'
    ]);
  }
  public function notice ()
  {$userId = Auth::user()->id;
    Notice::query()->update(['status' => 0]);
    $notice = Notice::where('to', $userId)->orderBy('created_at', 'desc')->get();  // Get all notices ordered by newest first
    // dd($notice);
    return view('notice', compact('notice'));
  }

  public function edit_sub (Request $request , int $id)
  {
    $sub = Subscription_plan::all();
    $subs = Subscription_plan::find($request->id);
    $subs->update($request->all());
    return response()->json([
      'message' => 'Subscription Plan Update successfully.'
    ]);
  }

  public function assign_driver_to_agent()
  {
    $agents = User::where('role', 'agent')->get();
    $drivers = User::where('role', 'truck_driver')->orWhere('role', 'freight_driver')->get();
    $agent_trucker = AgentDriver::with(['agent', 'driver'])->get();

    return view('agent_truck', compact('agents', 'drivers', 'agent_trucker'));
  }

  public function relate_driver_to_agent(Request $request)
  {

    $agent_driver_relate = AgentDriver::where('agent_id', $request->agent_id)->where('driver_id', $request->driver_id)->first();

    if(!empty($agent_driver_relate))
    {
      return response()->json(['message' => 'Relation Already Exists']);
    }
    else
    {
      $new_relate = new AgentDriver;
      $new_relate->agent_id = $request->agent_id;
      $new_relate->driver_id = $request->driver_id;
      $new_relate->save();

      return response()->json(['message' => 'Relation Added Successfully']);
    }
  }

  public function view_certificate_by_shipper()
  {
    $shipper_certificates = UploadShipper::all();
    return view('admin_view_shipper_certificate', compact('shipper_certificates'));
  }

  public function download_certificate($file_name) {
    $file = $path = storage_path().'/app/public/uploads_shipper/' . $file_name;
    $headers = array('Content-Type: application/pdf',);
    return response()->download($file, 'info.pdf', $headers);
  }

  public function userview($id)
  {
    $userviewlist = User::with('truckers')->where('id', $id)->first();
    // dd($userviewlist);
    return view('uv', compact('userviewlist'));
  }

  function userlist() {
    $currentWeekUsers = User::where('role', '!=', 'admin')
        ->whereHas('subscription', function ($query) {
            $query->where('status', 'Active')
                  ->where('start_date', '>=', Carbon::now()->startOfWeek())
                  ->where('end_date', '>=', Carbon::now());
        })
        ->with('subscription')
        ->get();

    $totalUsers = User::where('role', '!=', 'admin')->count();
    $percentageChange = $totalUsers > 0 ? round(($currentWeekUsers->count() / $totalUsers) * 100, 2) : 0;

    // Get current month users Active
    $currentMonthUsers = User::where('role', '!=', 'admin')
        ->whereHas('subscription', function ($query) {
            $query->where('status', 'Active')
                  ->where('start_date', '>=', Carbon::now()->startOfMonth())
                  ->where('end_date', '>=', Carbon::now());
        })
        ->with('subscription')
        ->get();
        // dd($currentMonthUsers);

    $totalUsers = User::where('role', '!=', 'admin')->count();

    $monthPercentageChange = $totalUsers > 0 ? round(($currentMonthUsers->count() / $totalUsers) * 100, 2) : 0;


    // Get current month users InActive
    $currentMonthUsersIn = User::where('role', '!=', 'admin')
        ->whereHas('subscription', function ($query) {
            $query->where('status', 'Inactive')
                  ->where('start_date', '>=', Carbon::now()->startOfMonth())
                  ->where('end_date', '>=', Carbon::now());
        })
        ->with('subscription')
        ->get();
        // dd($currentMonthUsersIn);

    $totalUsers = User::where('role', '!=', 'admin')->count();

    $monthPercentageChangeIn = $totalUsers > 0 ? round(($currentMonthUsersIn->count() / $totalUsers) * 100, 2) : 0;

    // $Paidresult = DB::table('wp_wc_orders')
    // ->join('wp_woocommerce_order_items', 'wp_wc_orders.id', '=', 'wp_woocommerce_order_items.order_id')
    // ->select('wp_wc_orders.*', 'wp_woocommerce_order_items.order_item_name')
    // // ->where('wp_wc_orders.billing_email', $user->email)
    // ->get();
    // $result = User::where('email', $result->);
    // dd($Paidresult);
    $Paidresult = DB::table('wp_wc_orders')
        ->join('wp_woocommerce_order_items', 'wp_wc_orders.id', '=', 'wp_woocommerce_order_items.order_id')
        ->select('wp_wc_orders.*', 'wp_woocommerce_order_items.order_item_name')
        ->get();

    // Step 1: Count registrations per month
    $monthlyCounts = [];
    $totalRegistrations = 0;

    foreach ($Paidresult as $item) {
        $month = date('Y-m', strtotime($item->date_created_gmt)); // Extract month and year
        $monthlyCounts[$month] = ($monthlyCounts[$month] ?? 0) + 1;
        $totalRegistrations++;
    }

    // Step 2: Calculate monthly percentage ratio
    $monthlyPercentageRatio = [];
    foreach ($monthlyCounts as $month => $count) {
        $monthlyPercentageRatio[$month] = ($count / $totalRegistrations) * 100;
    }

    // Optionally, you can select a specific month if needed
    $currentMonth = date('Y-m'); // Change as necessary
    $currentMonthPercentage = isset($monthlyPercentageRatio[$currentMonth]) ? round($monthlyPercentageRatio[$currentMonth], 2) : 0;




    $userlist = User::where('role', '!=', 'admin')->get();
    return view('ul', compact('userlist' ,'currentWeekUsers', 'percentageChange', 'currentMonthUsers', 'monthPercentageChange', 'currentMonthUsersIn', 'monthPercentageChangeIn', 'Paidresult', 'currentMonthPercentage'));
  }
}
