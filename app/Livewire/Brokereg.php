<?php

namespace App\Livewire;
use App\Rules\TransparentPNG;
use Livewire\WithFileUploads;
use App\Models\DriverDetail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Mail;

class Brokereg extends Component
{
    use WithFileUploads;

    public $image;

    public $currentStep = 1;

    public $name, $mc_number ,$suffix ,$fname ,$salutation, $mname ,$lname ,$title ,$prefix;
    public $address ,$address2 , $zip , $city, $state ,$country, $password ,$password_confirmation;
    public $email ,$phone, $fax, $exemail ,$secphone;
    public $websit ,$tax , $scac, $usdot ,$imagePath;
    public $license_number,    $license_expiry_date,    $license_type,    $years_of_experience;
    public $vehicle_registration_number,  $validatedData,  $vehicle_make,    $vehicle_model,    $vehicle_year;
    public $vehicle_capacity,    $vehicle_status;
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
          'title' => 'required',
          'suffix' => 'required',
          'mname' => 'required',
          'address' => 'required',
          'address2' => 'required',
          'state' => 'required',
          'zip' => 'required',
          'city' => 'required',
          'exemail' => 'required',
          'email' => 'required|email',
          'phone' => [ 'required' ],
          'fax' => 'required|numeric',
          'exemail' => 'required|email',
          'secphone' => ['required'],
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
         'license_expiry_date' => 'required|date',
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
            // Create record using validated data

            $randomNumber = rand(100000, 999999);
          
           
            $user = User::create([
               'name' => $this->fname,
               'email' =>$this->email,
               'password' => Hash::make($this->password),
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
                'cellphone' => $this->phone,
                'extra_email' => $this->exemail,
                'fname' => $this->fname,
                'mc_number' => $this->mc_number,
                'is_active' => "2",
                'image_path' => $this->imagePath,
            ]);
            $this->successMessage = 'Broker Created Successfully.';
            $this->clearForm();
          //  return $pdf->stream($cert);

          Mail::send('email.register', ['user' => $validatedData], function ($message) use ($validatedData) {
            $message->to($this->email, $this->name)
                    ->subject('register');
        });
             return redirect()->to('login/freight');
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
