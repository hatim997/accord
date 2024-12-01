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
use Smalot\PdfParser\Parser;
use Illuminate\Support\Facades\Mail;

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
          $request->status = 0;  // Mark as read
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

  public function opnrqet($id)
  {
      // Find the policy type
      $get = PolicyType::find($id);

      // Retrieve the authenticated user's ID and driver details
      $user = Auth::user()->id;
      $truck = DriverDetail::where('user_id', $user)->first();

      // Create a new open request
      $request = Openrequest::create([
          'to' => 1,
          'from' => $user,
          'titel' => 'Add ' . $get->type_name . ' from Carrier ' . $truck->name,
          'status' => '1',
      ]);

      // Debug: Check if session values are being set correctly
      // dd($request->to, $request->from, $request->titel, $request->status);

// Store in session and redirect back with the data
return Redirect::back()->with('success', [
  'to' => $request->to,
  'from' => $request->from,
  'titel' => $request->titel,
  'status' => $request->status,
  'orderTime' => now()->format('Y-m-d H:i:s') // Add current time to session for "Order Time"
]);
  }
  public function showRequestDetails($id)
  {
      // dd(session()->all()); // Check the session data here

      return Redirect::back()->with('success', [
          'to' => session('to'),
          'from' => session('from'),
          'titel' => session('titel'),
          'status' => session('status'),
          'orderTime' => session('orderTime'),
      ]);
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
    // dd($request->all());
    Subscription_plan::create($request->all());
    $sub = Subscription_plan::all();

    // return view('sub', compact('sub'))->with('success', 'Subscription Plan created successfully.');
    return response()->json([
      'message' => 'Subscription Plan created successfully.'
    ]);
  }
  public function notice()
{
    $userId = Auth::user()->id;

    // Fetch notices for logged-in user and user_id 1, ensuring no duplicates
    $notice = Notice::where(function ($query) use ($userId) {
        $query->where('to', $userId)
              ->orWhere('to', 1);
    })
    ->orderBy('status', 'asc') // Ensure unread (0) appears before read (1)
    ->orderBy('created_at', 'desc')
    ->get();

    return view('notice', compact('notice'));
}
public function updateNoticeStatus($id)
{
    $userId = Auth::user()->id;

    // Update only the clicked notice's status to 1
    Notice::where('id', $id)
        ->where('to', $userId)
        ->update(['status' => 1]);

    return redirect()->route('notice'); // Redirect back to the notice page
}

  public function markAllAsRead()
{
    $userId = Auth::user()->id;

    // Update status to 1 for all notifications for the logged-in user and user_id 1
    Notice::where(function ($query) use ($userId) {
        $query->where('to', $userId)
              ->orWhere('to', 1);
    })->update(['status' => 1]);

    return redirect()->route('notice')->with('success', 'All notifications marked as read.');
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
    // dd($shipper_certificates);
    return view('admin_view_shipper_certificate', compact('shipper_certificates'));
  }

  public function viewCertificate($path)
{
    $filePath = storage_path('app/public/uploads_shipper/' . $path);

    if (file_exists($filePath)) {
        return response()->file($filePath);
    }

    return abort(404);
}

public function getPdfValue($path, $user_id)
{

  // $shipperLimt = ShipperLimit::where('shipper_id', $user_id)
  // ->join('policy_limits', 'shipper_limits.policy_limit_id','=','policy_limits.id')
  // ->join('policy_types','policy_limits.policy_type_id','=','policy_types.id')
  // ->select('type_name', 'coverage_item','policy_amount')
  // ->get();
  $shipperLimt = ShipperLimit::where('shipper_id', $user_id)
  ->join('policy_limits', 'shipper_limits.policy_limit_id','=','policy_limits.id')
  ->join('policy_types','policy_limits.policy_type_id','=','policy_types.id')
  ->select('type_name', 'coverage_item', 'policy_limit_id', 'policy_amount')
  ->orderByRaw("FIELD(shipper_limits.policy_type_id, 2, 1, 9, 5, 4, 3, 6, 7, 8)")
  ->get()
  ->groupBy('type_name'); // Group by policy type name

  $user_id;
  //  dd($shipperLimt->toArray());
    // Resolve the correct file path
    $filePath = storage_path('app/public/uploads_shipper/' . $path);

    if (!file_exists($filePath)) {
        return response()->json(['error' => 'File not found'], 404);
    }

    try {
        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile($filePath);

        // Extract text from the PDF
        $text = $pdf->getText();
        // dd($text);

        // Clean the text
        // $cleanedText = $this->cleanPdfContent($text);
        // dd($cleanedText);

        // Extract details
        $pdfDetails = $this->extractPdfDetails($text);
        // dd($pdfDetails);

        // Return the extracted text in a view or as JSON
        return view('pdf-content', compact('pdfDetails','user_id', 'shipperLimt'));

    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
public function cleanPdfContent($content)
{
    // Remove non-breaking spaces
    $cleanedContent = str_replace('\u{A0}', ' ', $content);

    // Replace multiple spaces/tabs/newlines with a single space
    $cleanedContent = preg_replace('/\s+/', ' ', $cleanedContent);

    // Trim any leading/trailing spaces
    $cleanedContent = trim($cleanedContent);

    return $cleanedContent;
}


public function extractPdfDetails($content)
{
    $details = [];

    // Clean the content (replace special characters like non-breaking space)
    $content = preg_replace('/\s+/', ' ', $content);  // Replace multiple spaces with a single space
    $content = str_replace("\u{A0}", ' ', $content);  // Replace non-breaking space with regular space

    // GENERAL LIABILITY
    $pattern = '/EACH\s+OCCURRENCE[\s\xA0]*\$\s*([\d,]+\.\d{2})/i';
    if (preg_match($pattern, $content, $matches)) {
        $details['5'] = $matches[1];
    }
    $pattern = '/DAMAGE\s+TO\s+RENTED\s+PREMISES[\s\xA0]*\(\s*EA\s*Occurence\s*\)[\s\xA0]*\$\s*([\d,]+\.\d{2})/i';
    if (preg_match($pattern, $content, $matches)) {
        $details['6'] = $matches[1];
    }

    $pattern = '/MED\s+EXP\s*\(\s*Any\s+one\s+person\s*\)[\s\xA0]*\$\s*([\d,]+\.\d{2})/i';
    if (preg_match($pattern, $content, $matches)) {
        $details['7'] = $matches[1];
    }

    $pattern = '/PERSONAL\s*&\s*ADV\s*INJURY[\s\xA0]*\$\s*([\d,]+\.\d{2})/i';  // Corrected regex

    if (preg_match($pattern, $content, $matches)) {
        $details['8'] = $matches[1];
    }

    $pattern = '/GENERAL\s+AGGREGATE[\s\xA0]*\$\s*([\d,]+\.\d{2})/i';
    if (preg_match($pattern, $content, $matches)) {
        $details['9'] = $matches[1];
    }

    $pattern = '/PRODUCTS\s*-\s*COMP\/OP\s*AGG[\s\xA0]*\$\s*([\d,]+\.\d{2})/i';
    if (preg_match($pattern, $content, $matches)) {
        $details['10'] = $matches[1];
    }

    // AUTO LIABILITY
    $pattern = '/COMBINED\s+SINGLE\s+LIMIT\s*\(\s*EA\s+accident\s*\)[\s\xA0]*\$\s*([\d,]+\.\d{2})/i';
    if (preg_match($pattern, $content, $matches)) {
        $details['1'] = $matches[1]; // Extracted value
    }

    $pattern = '/BODILY\s+INJURY\s*\(\s*Per\s+person\s*\)[\s\xA0]*\$\s*([\d,]+\.\d{2})?/i';
    if (preg_match($pattern, $content, $matches)) {
        $details['2'] = $matches[1] ?? '0.00'; // Extracted value or 0.00 if not present
    }

    $pattern = '/BODILY\s+INJURY\s*\(\s*Per\s+accident\s*\)[\s\xA0]*\$\s*([\d,]+\.\d{2})?/i';
    if (preg_match($pattern, $content, $matches)) {
        $details['3'] = $matches[1] ?? '0.00'; // Extracted value or 0.00 if not present
    }

    $pattern = '/PROPERTY\s+DAMAGE\s*\(\s*Per\s+accident\s*\)[\s\xA0]*\$\s*([\d,]+\.\d{2})?/i';
    if (preg_match($pattern, $content, $matches)) {
        $details['4'] = $matches[1] ?? '0.00'; // Extracted value or 0.00 if not present
    }

    // $pattern = '/EACH\s+OCCURRENCE[\s\xA0]*\$\s*([\d,]+\.\d{2})/i';
    // if (preg_match($pattern, $content, $matches)) {
    //     $details['each_occurrence(2f)'] = $matches[1]; // Extracted value
    // }

    $pattern = '/EACH\s+OCCURRENCE[\s\xA0]*\$\s*([\d,]+\.\d{2})/i';
    preg_match_all($pattern, $content, $matches);
    if (!empty($matches[1])) {
      $customKeys = [5, 25];
        foreach ($matches[1] as $index => $value) {
          $details[$customKeys[$index]] = $value;
      }
    }

    $pattern = '/AGGREGATE[\s\xA0]*\$\s*([\d,]+\.\d{2})/i';
    if (preg_match($pattern, $content, $matches)) {
        $details['26'] = $matches[1] ?? '0.00'; // Extracted value
    }

    $pattern = '/E\.L\.\s*EACH\s*ACCIDENT[\s]*\$\s*([\d,]+\.\d{2})/i';  // Handle flexible spaces

    if (preg_match($pattern, $content, $matches)) {
        $details['15'] = $matches[1] ?? '0.00'; // Extracted value or default to '0.00'
    }

    $pattern = '/E\.L\.\s*DISEASE\s*-\s*EA\s*EMPLOYEE[\s]*\$\s*([\d,]*\.?\d{0,2})?/i';
    if (preg_match($pattern, $content, $matches)) {
    $details['16'] = $matches[1];
    }

$pattern = '/E\.L\.\s*DISEASE\s*-\s*POLICY\s*LIMIT[\s]*\$\s*([\d,]*\.?\d{0,2})?/i';

if (preg_match($pattern, $content, $matches)) {
  // Extract and store the value, or default to '0.00'
  $details['17'] = $matches[1];
}


$pattern = '/Limit\/\s*Trailer[\s]*([\d,]*\.?\d{0,2})/i';

if (preg_match($pattern, $content, $matches)) {
    $details['12'] = $matches[1] ?? '0.00';
}


    $pattern = '/LIMIT\s*PER\s*VEHICLE[\s\xA0]*([\d,]+\.\d{2})/i';

    if (preg_match($pattern, $content, $matches)) {
        $details['11'] = $matches[1] ?? '0.00';
    }


    $pattern = '/Limit\/Ded\s*([\d,\.]+)?\s*(?:\/\s*([\d,\.]+))?/i';

  //   if (preg_match_all($pattern, $content, $matches, PREG_SET_ORDER)) {
  //     foreach ($matches as $matchIndex => $match) {
  //         // echo "Match Set $matchIndex:\n";

  //         $first_value = isset($match[1]) ? $match[1] : '0.00';
  //         $second_value = isset($match[2]) ? $match[2] : $first_value;

  //         // echo "  Value 1: $first_value\n";
  //         // echo "  Value 2: $second_value\n";

  //         $details[] = [
  //             'Limit' => $first_value,
  //             'Ded' => $second_value,
  //         ];
  //     }
  // }
  $keys = [19, 20, 21, 22, 23, 24]; // Predefined keys for Limit and Ded

 // Initialize the details array

if (preg_match_all($pattern, $content, $matches, PREG_SET_ORDER)) {
    $keyIndex = 0; // To keep track of which key to use from the $keys array

    foreach ($matches as $matchIndex => $match) {
        $first_value = isset($match[1]) ? str_replace(',', '', $match[1]) : '0';
        $second_value = isset($match[2]) ? str_replace(',', '', $match[2]) : $first_value;

        // Convert values to integers
        $first_value = $first_value;
        $second_value = $second_value;

        // Ensure that there are enough keys in $keys array
        if (isset($keys[$keyIndex])) {
            // Assign Limit value to the key from $keys
            $details[$keys[$keyIndex]] = $first_value;
            $keyIndex++; // Move to the next key in the $keys array

            // Assign Ded value to the next unique key
            if (isset($keys[$keyIndex])) {
                $details[$keys[$keyIndex]] = $second_value;
                $keyIndex++; // Move to the next key in the $keys array
            }
        } else {
            break; // Stop if there are no more keys
        }
    }
}
    return $details;
}


public function req_shipper_limits($id) {
  $user = User::find($id);

  $shiper_info = ShipperInfos::where('user_id', $id)->first();


  // Prepare data for the email view
  $data = [
    'id' => $id,
    'email' => $user->email,
    'custom_message' => 'Please insert your limit to continue using our services.', // Renamed
    'shiper_info' => $shiper_info->name,
  ];

  // Send the email
  Mail::send('email.insert_limits', $data, function ($message) use ($user) {
    $message->to($user->email)
            ->subject('Request to Insert Your Limits');
  });

  Notice::create([
    'to' => $id,
    'from' => 1,
    'name' => "you have not entered your certificate limit, please insert your certificate limit",
    // 'status' => 0,
  ]);

return back()->with([ 'success' => 'Order placed successfully.']);


}






  public function download_certificate($file_name) {
    $file = $path = storage_path().'/app/public/uploads_shipper/' . $file_name;
    $headers = array('Content-Type: application/pdf',);
    return response()->download($file, 'info.pdf', $headers);
  }

  public function userview($id)
  {
      // Retrieve the user and related data
      $user = User::find($id);

      $userviewlist = User::with(['subscription.subscriptionPlan', 'agencies', 'truckers', 'subscription', 'shippers', 'freights'])
                          ->where('id', $id)
                          ->get();

      // Retrieve the subscription with plan details
      $subscription = Subscription::with('subscriptionPlan')->where('user_id', $id)->first();

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

      return view('uv', compact('userviewlist', 'subscription', 'progressPercentage', 'daysRemaining'));
  }

    function userlist() {
      $currentWeekUsers = User::where('role', '!=', 'admin')
          ->whereHas('subscription', function ($query) {
              $query->where('start_date', '>=', Carbon::now()->startOfWeek())
                    ->where('end_date', '>=', Carbon::now());
          })
          ->with('subscription')
          ->get();

      $totalUsers = User::where('role', '!=', 'admin')->count();
      $percentageChange = $totalUsers > 0 ? round(($currentWeekUsers->count() / $totalUsers) * 100, 2) : 0;

      // Get current month users Active
      $currentMonthUsers = User::where('role', '!=', 'admin')->where('status', 1)
          ->whereHas('subscription', function ($query) {
              $query->where('start_date', '>=', Carbon::now()->startOfMonth())
                    ->where('end_date', '>=', Carbon::now());
          })
          ->with('subscription')
          ->get();
          // dd($currentMonthUsers->toArray());

      $totalUsers = User::where('role', '!=', 'admin')->where('status', 1)->count();

      $monthPercentageChange = $totalUsers > 0 ? round(($currentMonthUsers->count() / $totalUsers) * 100, 2) : 0;


      // Get current month users InActive
      $currentMonthUsersIn = User::where('role', '!=', 'admin')->where('status', 0)
          ->whereHas('subscription', function ($query) {
              $query->where('start_date', '>=', Carbon::now()->startOfMonth())
                    ->where('end_date', '>=', Carbon::now());
          })
          ->with('subscription')
          ->get();
          // dd($currentMonthUsersIn);

      $totalUsers = User::where('role', '!=', 'admin')->where('status', 0)->count();

      $monthPercentageChangeIn = $totalUsers > 0 ? round(($currentMonthUsersIn->count() / $totalUsers) * 100, 2) : 0;


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
      $userlist = User::with('subscription')->whereNot('role', 'admin')->get();

      $usersWithPlans = User::with(['subscription.subscriptionPlan', 'agencies', 'truckers', 'subscription', 'shippers', 'freights'])->whereNot('role', 'admin')
      ->get();
      // dd($usersWithPlans->toArray());
      return view('ul', compact('userlist', 'usersWithPlans' ,'currentWeekUsers', 'percentageChange', 'currentMonthUsers', 'monthPercentageChange', 'currentMonthUsersIn', 'monthPercentageChangeIn', 'Paidresult', 'currentMonthPercentage'));
    }


}
