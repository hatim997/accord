<?php

namespace App\Livewire;
use App\Rules\TransparentPNG;
use Livewire\WithFileUploads;
use App\Models\DriverDetail;
use App\Models\User;
use App\Models\Notice;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Mail;
class Truckreg extends Component
{
    use WithFileUploads;

    public $image;

    public $currentStep = 1;

    public $name, $mc_number ,$suffix ,$fname ,$salutation, $mname ,$lname ,$title ,$prefix;
    public $address ,$address2 , $zip , $city, $state ,$country, $password ,$password_confirmation;
    public $email ,$phone, $fax, $exemail ,$secphone;
    public $websit ,$tax , $scac, $usdot ,$imagePath;
    public $license_number,    $license_expiry_date,    $license_type,    $years_of_experience;
    public $vehicle_registration_number,    $vehicle_make,    $vehicle_model,    $vehicle_year;
    public $vehicle_capacity,    $vehicle_status;
     public $successMessage = '';


    public function render()
    {
        return view('livewire.truckreg');
    }


    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'mc_number' => 'required|numeric' ,
            'tax' => 'required',
            'scac' => 'required',
            'usdot' => 'required',
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
          'fname' => 'required',
          'salutation' => 'required',
          'lname' => 'required',
          'title' => 'nullable',
          'suffix' => 'required',
          'mname' => 'nullable',
          'address' => 'required',
          'address2' => 'nullable',
          'state' => 'required',
          'zip' => 'required',
          'city' => 'required',
          'exemail' => 'nullable',
          'email' => 'required|email',
          'phone' => 'required',
          'fax' => 'nullable',
          'secphone' =>'nullable',
      ]);

    $this->currentStep = 3;
    }

    /**sechalfStepSubmit
     * Write code on Method
     *
     * @return response()
     */

     public function sechalfStepSubmit()
     {
        $validatedData = $this->validate([
         'license_number' => 'required',
        ]);

       $this->currentStep = 4;
     }

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
       $this->currentStep = 5;
     }

 /**
     * Write code on Method
     *
     * @return response()

     */




     public function forthStepSubmit()
     {

        $this->submitForm();
     }
    //  public function fithStepSubmit()
    //  {
    //    $validatedData = $this->validate([
    //        'image' => 'required|image|mimes:png|dimensions:min_width=200,max_width=200,min_height=100,max_height=100|max:1024',
    //      ]);
    //      $name = md5($this->image . microtime()).'.'.$this->image->extension();
    //      $this->imagePath = $this->image->storeAs('photos', $name);
    //      $this->submitForm();
    //  }

/**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForm()
        {
            $randomNumber = rand(100000, 999999);
            $user = User::create([
               'name' => $this->fname,
               'email' =>$this->email,
               'password' => Hash::make($this->password),
               'rememberToken' => 'MC' . $randomNumber,
               'role' => "truck_driver",
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

            DriverDetail::create([
                'user_id' =>$lastInsertedId ,
                'name' => $this->name,
                'title' => $this->title,
                'mname' => $this->mname,
                'lname' => $this->lname,
                'suffix' => $this->suffix,
                'salutation' => $this->salutation,
                'prefix' => $this->prefix,
                'address' => $this->address,
                'address2' => $this->address2,
                'zip' => $this->zip,
                'websit' => $this->websit,
                'tax' => $this->tax,'fax' => $this->fax,
                'license_number' => $this->license_number,
                'license_expiry_date' => $this->license_expiry_date,
                'license_type' => $this->license_type,
                'years_of_experience' => $this->years_of_experience,
                'vehicle_registration_number' => $this->vehicle_registration_number,
                'vehicle_make' => $this->vehicle_make,
                'vehicle_model' => $this->vehicle_model,
                'vehicle_year' => $this->vehicle_year,
                'vehicle_capacity' => $this->vehicle_capacity,
                'vehicle_status' => $this->vehicle_status,
                'scac' => $this->scac,
                'usdot' => $this->usdot,
                'state' => $this->state,
                'city' => $this->city,
                'cellphone' => $this->phone,
                'extra_email' => $this->exemail,
                'fname' => $this->fname,
                'mc_number' => $this->mc_number,
                'is_active' => "2",
               
            ]);

            $data = [
               
                'code' => 'MC' . $randomNumber,
            ];
            $code ='MC' . $randomNumber;



            Mail::send('email.register', $data, function ($message) use ($code){
                $message->to($this->email, $this->name)
                        ->subject('Register');
            });    
            $this->successMessage = 'Trucker Created Successfully.';
            $this->clearForm();
          session()->flash('message', "Thank you for registering with COI360! Please check your email to complete your account setup. You can <a href=" .route('auth-login-t'). ">log in here</a> once your account is activated.");
            //  return redirect()->to('login/truck' );
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
