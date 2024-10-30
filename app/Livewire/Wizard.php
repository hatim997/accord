<?php

namespace App\Livewire;
use App\Rules\TransparentPNG;
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\AgencyInfos;
use App\Models\User;
use App\Models\Notice;
use App\Models\Subscription_plan;
use App\Models\Subscription;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Crypt;
use Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class Wizard extends Component
{
    use WithFileUploads;

    public $image;

    public $currentStep = 1;

    public $name, $mc_number ,$suffix ,$fname , $salutation , $mname ,$lname , $title , $prefix;
    public $address , $address2 , $zip , $city, $state , $country, $password , $password_confirmation;
    public $email ,$phone, $fax, $exemail ,$secphone;
    public $websit ,$ialn , $scac, $usdot ,$imagePath;
    public $successMessage = '';

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        return view('livewire.wizard');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

     public function firstStepSubmit()
     {
         $validatedData = $this->validate([
             'name' => 'required',
             'ialn' => 'required',
             'fname' => 'required',
             'lname' => 'required',
             'title' => 'required',
             'suffix' => 'required',
             'mname' => 'nullable',
             'websit' => 'nullable',
         ]);
         $this->currentStep = 2;
     }
     /**
      * Write code on Method
      *
      * @return response()
      */
     public function secondStepSubmit()
     {
         $validatedData = $this->validate([
         'websit' => 'nullable',
         'address' => 'required',
         'address2' => 'nullable',
         'state' => 'required',
         'zip' => 'required',
         'city' => 'required',
         'email' => 'required|email',
         'phone' => 'required',
         'fax' => 'nullable',
         'exemail' => 'nullable',
        
 ]);

     $this->currentStep = 3;

     }

     /**
      * Write code on Method
      *
      * @return response()
      */

      public function thirdStepSubmit()
      {
        $validatedData = $this->validate([
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required',
        ]);
        if ($validatedData['password'] !== $validatedData['password_confirmation']) {
            throw ValidationException::withMessages([
                'password_confirmation' => 'The password confirmation does not match.',
            ]);
        }
        $this->currentStep = 4;
      }

  /**
      * Write code on Method
      *
      * @return response()

      */

      public function forthStepSubmit()
      {
        $this->currentStep = 5;
      }

      public function fithStepSubmit()
      {
        $validatedData = $this->validate([
            'image' => 'required|image|mimes:png|dimensions:min_width=200,max_width=200,min_height=100,max_height=100|max:1024',
          ]);
          $name = md5($this->image . microtime()).'.'.$this->image->extension();
          $this->imagePath = $this->image->storeAs('photos', $name);
          $this->submitForm();
      }

    /**
      * Write code on Method
      *
      * @return response()
      */
     public function submitForm()
         { 
            $currentDate = Carbon::now();
            $endDate = $currentDate->copy()->addDays(30);
            $randomNumber = rand(100000, 999999);

             // Create record using validated data
             $user = User::create([
                'name' => $this->fname,
                'email' =>$this->email,
                'password' => Crypt::encryptString($this->password),
                'rememberToken' => 'IA' . $randomNumber,
                'role' => "agent",
              ]);
              DB::table('wp_users')->insert([
                'user_nicename' => $this->fname,
                'user_login' => $this->email,
                'user_email' =>  $this->email,
                'user_pass' => bcrypt($this->password), // Ensure to hash passwords
                'user_url' =>  'null',
                'user_registered' => $currentDate,
                'user_activation_key'	 => "agent",
                'user_status' => 1,
                'display_name' =>  $this->fname,
              ]);          
              $lastInsertedId = $user->id;
              AgencyInfos::create([
                  'user_id' =>$lastInsertedId,
                  'name' => $this->name,
                  'title' => $this->title,
                  'ialn' => $this->ialn,
                  'mname' => $this->mname,
                  'websit' => $this->websit,                  
                  'lname' => $this->lname,
                  'suffix' => $this->suffix,
                  'prefix' => $this->prefix,
                  'address' => $this->address,
                  'fax' => $this->fax,
                  'exemail' => $this->exemail,
                  'address2' => $this->address2,
                  'zip' => $this->zip,
                  'city' => $this->city,
                  'state' => $this->state,
                  'cellphone' => $this->phone,
                  'fname' => $this->fname,
                  'is_active' => "2",
                  'image_path' => $this->imagePath,
             ]);
             $data = [
               
                'code' => 'IA' . $randomNumber,
            ];
            $code ='IA' . $randomNumber;



            Mail::send('email.register', $data, function ($message) use ($code){
                $message->to($this->email, $this->name)
                        ->subject('Register');
            });

            $admin = User::find(1);

            $data = [
                'adminName' => $admin->name,
                'userName' => $this->name,
                'verificationCode' => $code,
            ];

            Mail::send('email.message', $data, function ($message) use ($admin, $code) {
                $message->to($admin->email, $admin->name)
                        ->subject('Registration Confirmation - Name: ' . $this->name . ' Code Is: ' . $code);
            });


            
            Notice::create([
                'to' => 1,
                'from' => $lastInsertedId,
                'name' => "you have new registering  ".$this->name."  agency pls check",
              ]);

            Notice::create([
                'to' => $lastInsertedId,
                'from' => $lastInsertedId,
                'name' => "you have new registering" .$this->name." ,agency pls check",
              ]);
             $this->successMessage = 'Created Successfully.';
             $this->clearForm();
           //  return $pdf->stream($cert);
            session()->flash('message', "Thank you for registering with COI360! Please check your email to complete your account setup. You can <a href=" .route('auth-login-basic'). ">log in here</a> once your account is activated.");
            //  return redirect()->to('/logg');
         }
        
     /**
      * Write code on Method
      *
      * @return response()
      */
     public function back($step)
     {
         $this->currentStep = $step;
     }

     /**
      * Write code on Method
      *
      * @return response()
      */
     public function clearForm()
     {
         $this->name = '';
         $this->mc_number = '';



    //
     }


}
