<?php

namespace App\Livewire;
use Livewire\Component;
use Mail;


class Regtruck extends Component
{
    public $currentStep = 1;
    public $name, $mc_number, $validatedData, $description, $status = 1, $stock;
    public $successMessage = '';
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        return view('livewire.regtruck');
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

    public function submitForm()
    {    $lastInsertedId = [];

        
        DriverDetail::create([
           
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
        $data = [
            'name' => $this->name,
            'email' => $this->email
        ];

        Mail::send('email.register', $data, function ($message) {
            $message->to($this->email, $this->name)
                    ->subject('Register');
        });
        $this->successMessage = 'Product Created Successfully.';
  
        $this->clearForm();
  
        $this->currentStep = 1;
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

