@php
$isMenu = false;
$navbarHideToggle = false;
@endphp
{{-- @extends('layouts/contentNavbarLayout') --}}
@extends('layouts/commonMaster' )

@section('layoutContent')
{{-- <form method="POST" action="{{ route('register') }}">
  @csrf --}}

  <!-- Name -->

  <form id="AddForm">
    @csrf
    <input type="hidden" name="subs_id" value="{{$subs_id}}">
    <!-- Basic Layout -->
<div class="position-relative">
 <div class="container authentication-wrapper authentication-basic container-p-y" > 
  <div class="authentication-inner py-4">
    <div class="card" id="cardCenter" >
      <div style="background-image: url('assets/img/logo.png'); background-repeat: no-repeat; position:absolute; background-size:cover;display:block;  opacity: 0.05;
      width: 100%;height: 100%;top: 0;left: 0;right: 0;bottom: 0;"> </div>
        <div class="card-content">

      
       
        <!-- Basic Layout -->
   
          <div class="card-header">
            <h4 class="card-title text-center" id="cardCenterTitle"> Register</h4>
  <!-- Logo -->
                            <div class="app-brand justify-content-center mt-5">
                                <a href="{{url('/')}}" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">@include('_partials.macros',["height"=>20,"withbg"=>'fill:
                                        #fff;'])</span>
                                <span class="app-brand-text demo text-heading fw-semibold">{{config('variables.templateName')}}</span>
                                </a>
                            </div>
                            <!-- /Logo -->
            
          </div>
          <div class="card-body">
    <div class="row">
      <div class="col-4">
        <div class="form-floating form-floating-outline mb-3">
          <input type="text" class="form-control" name="username" id="username" placeholder="ACME Inc." />
          <label for="username1">USERNAME</label>
        </div>
      </div>
      <div class="col-4">
        <div class="form-floating form-floating-outline mb-3">
          <input type="text" class="form-control" name="email" id="email1" placeholder="example.com" required />
          <label for="email1">EMAIL</label>
        </div>
      </div>  

      <div class="col-4">
        <div class="form-floating form-floating-outline mb-3">
          <input type="text" class="form-control" name="altemail" id="altemail1" placeholder="Address line1" />
          <label for="altemail1">ALT EMAIL</label>
        </div>
      </div>
      <div class="col-4">
        <div class="form-floating form-floating-outline mb-3">
          <input type="text" class="form-control" name="phone" id="phone1" placeholder="Address line1" />
          <label for="phone1">CONTACT #</label>
        </div>
      </div>
      <div class="col-4">
        <div class="form-floating form-floating-outline mb-3">
          <input type="text" class="form-control" name="password1" id="password" placeholder="********" />
          <label for="password1">PASSWORD</label>
        </div>
      </div>
      <div class="col-4">
        <div class="mb-3">
          <div class="form-floating form-floating-outline mb-3">
            <select class="form-select" name="role" id="role_id1" onchange="addInputField()"  aria-label="Default select example">
              <option selected>Open this select menu</option>
              <option value="agent">AGENT</option>
              <option value="truck_driver">TRUCK</option>
              <option value="shipper">SHIPPER</option>
              <option value="freight_driver">FREIGHT</option>
            </select>
            <label for="role_id1">ROLE OF USER</label>
          </div>
        </div>
      </div>
    </div>
      <div  class="row" id="inputContainer">
        <!-- Input field will be appended here -->

      </div>
    <div class="row">
      <div class="col-4">

        <div class="form-floating form-floating-outline mb-3">
          <input type="text" class="form-control" name="fullname" id="fullname1" placeholder="ACME Inc." />
          <label for="fullname1"> Name</label>
        </div>
      </div>
      <div class="col-6">
        <div class="form-floating form-floating-outline mb-3">
          <input type="text" class="form-control" name="Addss" id="Addss1" placeholder="" />
          <label for="Addss1"> Address 1</label>
        </div>
      </div>
      <div class="col-6">
        <div class="form-floating form-floating-outline mb-3">
          <input type="text" class="form-control" name="Addss2" id="Address21" placeholder="" />
          <label for="Address21"> Address 2</label>
        </div>
      </div>
      <div class="col-4">
        <div class="form-floating form-floating-outline mb-3">
          <input type="text" class="form-control" name="state" id="state1" placeholder="" />
          <label for="state1">state</label>
        </div>
      </div>
      <div class="col-4">
        <div class="form-floating form-floating-outline mb-3">
          <input type="text" class="form-control" name="country" id="country1" placeholder="" />
          <label for="country1"> country</label>
        </div>
      </div>
      <div class="col-4">
        <div class="form-floating form-floating-outline mb-3">
          <input type="text" class="form-control" name="city" id="city1" placeholder="" />
          <label for="city1"> city</label>
        </div>
      </div>
      <div class="col-4">
        <div class="form-floating form-floating-outline mb-3">
          <input type="text" class="form-control" name="zip" id="zip1" placeholder="" />
          <label for="zip1"> zip</label>
        </div>
      </div>


    </div>
  </div>
</div>
</div>
    {{-- card end --}}




    <div class="flex items-center justify-end mt-4">
      <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        href="{{ route('auth-login-basic') }}">
        {{ __('Already registered?') }}
      </a>
    </div>

    <button type="button" id="saveButton" class="btn btn-primary">Save changes</button>
  </div>
  </form>

  @push('body-scripts')  
  <script>
function addInputField() {
  var vehicleType = document.getElementById("role_id1").value;
  var inputContainer = document.getElementById("inputContainer");

  // Clear existing input fields
  inputContainer.innerHTML = "";

  // Append input field if vehicle type is "truck"
  if (vehicleType === "truck_driver") {
    var inputField = '<div class="col-4">'
      +  '<div class="form-floating form-floating-outline mb-3">'
        +  '<input type="text" class="form-control" name="license_number" id="fullname1" placeholder="ACME Inc." />'
        +  '<label for="fullname1"> license_number</label> </div>  </div>'
        +  '<div class="col-4">  <div class="form-floating form-floating-outline mb-3">'
          +  '<input type="date" class="form-control" name="license_expiry_date" id="Addss1" placeholder="" />'
          +  ' <label for="Addss1"> license_expiry_date</label></div>  </div>'
          +  '<div class="col-4">  <div class="form-floating form-floating-outline mb-3">'
            +  '  <input type="text" class="form-control" name="license_type" id="Address21" placeholder="" />'
            +  ' <label for="Address21"> license_type</label>  </div>  </div>'
            +  ' <div class="col-4">  <div class="form-floating form-floating-outline mb-3">'
              +  '  <input type="text" class="form-control" name="years_of_experience" id="state1" placeholder="" />'
              +  '  <label for="state1">years_of_experience</label>  </div>  </div>'
              +  '<div class="col-4">  <div class="form-floating form-floating-outline mb-3">'
                +  '  <input type="text" class="form-control" name="vehicle_registration_number" id="country1" placeholder="" />'
                +  '<label for="country1"> vehicle_registration_number</label>  </div>  </div>'
                +  ' <div class="col-4">  <div class="form-floating form-floating-outline mb-3">'
                  +  ' <input type="text" class="form-control" name="vehicle_make" id="city1" placeholder="" />'
                  +  ' <label for="city1"> vehicle_make</label>  </div>  </div>'
                  +  ' <div class="col-4">  <div class="form-floating form-floating-outline mb-3">'
                    +  ' <input type="text" class="form-control" name="vehicle_model" id="zip1" placeholder="" />'
                    +  '<label for="zip1"> vehicle_model</label>  </div>  </div>'
                    +  ' <div class="col-4">  <div class="form-floating form-floating-outline mb-3">'
                      +  ' <input type="text" class="form-control" name="vehicle_year" id="fullname1" placeholder="ACME Inc." />'
                      +  ' <label for="fullname1"> vehicle_year</label> </div>  </div>'
                      +  '<div class="col-4">  <div class="form-floating form-floating-outline mb-3">'
                        +  ' <input type="text" class="form-control" name="vehicle_capacity" id="Addss1" placeholder="" />'
                        +  ' <label for="Addss1"> vehicle_capacity</label></div>  </div>'
                        +  '<div class="col-6">  <div class="form-floating form-floating-outline mb-3">'
                          +  ' <input type="text" class="form-control" name="vehicle_status" id="Address21" placeholder="" />'
                          +  ' <label for="Address21"> vehicle_status</label>  </div>  </div>'
                          +  '<div class="col-4">  <div class="form-floating form-floating-outline mb-3">'
                            +  ' <input type="text" class="form-control" name="mc_number" id="state1" placeholder="" />'
    + '<label for="state1">mc_number</label> </div> </div>';

    var containerDiv = document.createElement('div');
    containerDiv.classList.add("row");
containerDiv.innerHTML = inputField;
    inputContainer.appendChild(containerDiv);
  }
}


    $('#saveButton').click(function(e) {    
      var form = document.getElementById('AddForm');
          var formData = new FormData(form);
        // Display the string in an alert
    
    // alert(formData);
     console.log(formData);
    
      $.ajax({
        url: "{{ route('form.reg')}}",
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,  // Important! Don't process the data
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            // Check if response contains the expected message
            if (response && response.message !== undefined) {
                alert(response.message);
                // Additional logic after a successful save
                window.location.href = "{{ route('auth-login-basic') }}";    
            }
            else{
              console.log(response.error);
            }
        },
        error: function(error) {
            console.error('Error saving data:', error);
        }
      });
    
    });
    
    
    
    
  </script>

@endpush

  @endsection