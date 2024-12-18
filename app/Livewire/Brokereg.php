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
use Illuminate\Support\Facades\Crypt;
class Brokereg extends Component
{
    use WithFileUploads;

    public $image;

    public $currentStep = 1;

    public $name, $mc_number ,$suffix ,$fname ,$salutation, $mname ,$lname ,$title ,$prefix;
    public $address ,$address2 , $zip , $city, $state ,$country, $password ,$password_confirmation;
    public $email ,$phone, $fax, $exemail ,$secphone;
    public $websit ,$tax , $scac, $usdot ,$imagePath;
    public $license_number, $license_expiry_date, $license_type, $years_of_experience;
    public $vehicle_registration_number, $validatedData,$vehicle_make, $vehicle_model,$vehicle_year;
    public $vehicle_capacity, $vehicle_status;
     public $successMessage = '';


    public function render()
    {
        return view('livewire.brokereg');
    }


    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'mc_number' => 'required|numeric' ,
            'tax' => 'required',
            'scac' => 'required',
            'usdot' => 'required',
            "websit" => "nullable"
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
          'email' => 'required|email',
          'phone' => [ 'required' ],
          'fax' => 'nullable',
          'exemail' => 'nullable',

      ]);

    $this->currentStep = 3;
    }

    /**sechalfStepSubmit
     * Write code on Method
     *
     * @return response()
     */

    //  public function sechalfStepSubmit()
    //  {
    //     $validatedData = $this->validate([
    //      'license_expiry_date' => 'required|date',
    //     ]);

    //    $this->currentStep = 4;
    //  }

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
            // Create record using validated data

            $randomNumber = rand(100000, 999999);


            $user = User::create([
               'name' => $this->fname,
               'email' =>$this->email,
               'password' => Crypt::encryptString($this->password),
               'rememberToken' => 'FB' . $randomNumber,
               'role' => "freight_driver",
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
                'tax' => $this->tax,
                'fax' => $this->fax,
                'scac' => $this->scac,
                'usdot' => $this->usdot,
                'state' => $this->state,
                'cellphone' => $this->phone,
                'extra_email' => $this->exemail,
                'city' => $this->city,
                'fname' => $this->fname,
                'mc_number' => $this->mc_number,
                'is_active' => "2",

            ]);
            $this->successMessage = 'Broker Created Successfully.';
            $this->clearForm();
          //  return $pdf->stream($cert);

          $data = [

            'code' => 'FB' . $randomNumber,
        ];
        $code ='FB' . $randomNumber;



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
                'name' => "you have new registering  " .$this->name."  broker pls check",
              ]);
            Notice::create([
                'to' => $lastInsertedId,
                'from' => $lastInsertedId,
                'name' => "you have new registering" .$this->name." ,broker pls check",
              ]);
             $this->successMessage = 'Created Successfully.';
             $this->clearForm();
           //  return $pdf->stream($cert);
           session()->flash('message', "Thank you for registering with COI360! Please check your email to complete your account setup. You can <a href=" .route('auth-login-f'). ">log in here</a> once your account is activated.");
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
