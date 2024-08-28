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
      <div class="col-6">
        <div class="form-floating form-floating-outline mb-3">
          <input type="text" class="form-control" name="username" id="username" placeholder="ACME Inc." />
          <label for="username1">USERNAME</label>
        </div>
      </div>

      <div class="col-6">
        <div class="form-floating form-floating-outline mb-3">
          <input type="text" class="form-control" name="email" id="email1" placeholder="example.com" required />
          <label for="email1">EMAIL</label>
        </div>
      </div>
   

      <div class="col-6">
        <div class="form-floating form-floating-outline mb-3">
          <input type="text" class="form-control" name="altemail" id="altemail1" placeholder="Address line1" />
          <label for="altemail1">ALT EMAIL</label>
        </div>
      </div>
      <div class="col-6">
        <div class="form-floating form-floating-outline mb-3">
          <input type="text" class="form-control" name="phone" id="phone1" placeholder="Address line1" />
          <label for="phone1">CONTACT #</label>
        </div>
      </div>
      <div class="col-6">
        <div class="form-floating form-floating-outline mb-3">
          <input type="text" class="form-control" name="password1" id="password" placeholder="********" />
          <label for="password1">PASSWORD</label>
        </div>
      </div>
      <div class="col-6">
        <div class="mb-3">
          <div class="form-floating form-floating-outline mb-3">
            <select class="form-select" name="role" id="role_id1" aria-label="Default select example">
              <option selected>Open this select menu</option>
              <option value="agent">AGENT</option>
              <option value="truck_driver">TRUCK</option>
              <option value="shipper">SHIPPER</option>
              <option value="fre+ight_driver">FREIGHT</option>
            </select>
            <label for="role_id1">ROLE OF USER</label>
          </div>
        </div>
      </div>
      <div class="col-6">

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
          <label for="Address21"> Address 1</label>
        </div>
      </div>
      <div class="col-6">
        <div class="form-floating form-floating-outline mb-3">
          <input type="text" class="form-control" name="state" id="state1" placeholder="" />
          <label for="state1">state</label>
        </div>
      </div>
      <div class="col-6">
        <div class="form-floating form-floating-outline mb-3">
          <input type="text" class="form-control" name="country" id="country1" placeholder="" />
          <label for="country1"> country</label>
        </div>
      </div>
      <div class="col-6">
        <div class="form-floating form-floating-outline mb-3">
          <input type="text" class="form-control" name="city" id="city1" placeholder="" />
          <label for="city1"> city</label>
        </div>
      </div>
      <div class="col-6">
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
  <script>
    $('#saveButton').click(function(e) {
    
      var form = document.getElementById('AddForm');
          var formData = new FormData(form);
    
         
    
    // Display the string in an alert
    
    // alert(formData);
     console.log(formData);
    
      $.ajax({
        url: '/reg',
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
                location.reload();
               
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
  @endsection