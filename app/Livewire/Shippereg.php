<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\DriverDetail;
use App\Models\User;
use App\Models\Notice;
use App\Models\ShipperInfos;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Mail;
use Illuminate\Support\Facades\Crypt;

class Shippereg extends Component
{
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

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        return view('livewire.shipperreg');
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
            'mc_number' => 'required|numeric' ,
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
            'address' => 'required',
            'address2' => 'required',
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

       $this->submitForm();
    }










    public function submitForm()
    {
  // Create record using validated data

  $randomNumber = rand(100000, 999999);


  $user = User::create([
     'name' => $this->fname,
     'email' =>$this->email,
     'password' => Crypt::encryptString($this->password),
     'rememberToken' => 'SH'. $randomNumber,
     'role' => "shipper",
   ]);

   $lastInsertedId = $user->id;


        ShipperInfos::create([

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
                'website' => $this->websit,
                'tax' => $this->tax,
                'fax' => $this->fax,
                'state' => $this->state,
                'cellphone' => $this->phone,
                'extra_email' => $this->exemail,
                'city' => $this->city,
                'is_active' => "2",

        ]);
        $data = [

            'code' => 'SH' . $randomNumber,
        ];
        $code ='SH' . $randomNumber;



        Mail::send('email.register', $data, function ($message) use ($code){
            $message->to($this->email, $this->name)
                    ->subject('Register');
        });
        $this->successMessage = 'Product Created Successfully.';

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

        $this->clearForm();

        Notice::create([
            'to' => $lastInsertedId,
            'from' => $lastInsertedId,
            'name' => "you have new registering" .$this->name." ,Shipper pls check",
          ]);

        Notice::create([
            'to' => $lastInsertedId,
            'from' => $lastInsertedId,
            'name' => "you have new registering Shipper pls check",
          ]);
         $this->successMessage = 'Created Successfully.';
         $this->clearForm();
       //  return $pdf->stream($cert);
       session()->flash('message', "Thank you for registering with COI360! Please check your email to complete your account setup. You can <a href=" .route('auth-login-s'). ">log in here</a> once your account is activated.");
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
        $this->description = '';
        $this->stock = '';
        $this->status = 1;
    }
}

