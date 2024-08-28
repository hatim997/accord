@php
$isMenu = false;
$navbarHideToggle = false;
@endphp
{{-- @extends('layouts/contentNavbarLayout') --}}
@extends('layouts/commonMaster' )

@section('layoutContent')
<!-- Name -->
<div id="AddForm">
  <!-- Basic Layout -->
  <div class="position-relative">
    <div class="container authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner py-4">
        <div class="card" id="cardCenter">
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
            @foreach ($driverdetail as $item)
                
           
            <div class="card-body">
              <div class="row">
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->name}}" id="username" placeholder="ACME Inc." disabled />
                    <label for="username1">USERNAME</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->extra_email}}"  name="email"  id="email1" placeholder="example.com"
                      required disabled />
                    <label for="email1">EMAIL</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->extra_email}}"  name="altemail" id="altemail1"
                      placeholder="Address line1" disabled />
                    <label for="altemail1">ALT EMAIL</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->cellphone}}"  name="phone" id="phone1" placeholder="Address line1" disabled />
                    <label for="phone1">CONTACT #</label>
                  </div>
                </div>

              </div>
              <div class="row" id="inputContainer2">
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->license_number}}"  name="license_number" id="fullname1"
                      placeholder="ACME Inc." disabled />
                    <label for="fullname1"> license_number</label> </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="date" class="form-control" value="{{$item->license_expiry_date}}"  name="license_expiry_date" id="Addss1" placeholder="" disabled />
                    <label for="Addss1"> license_expiry_date</label></div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->license_type}}"  name="license_type" id="Address21" placeholder="" disabled />
                    <label for="Address21"> license_type</label> </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->years_of_experience}}"  name="years_of_experience" id="state1" placeholder="" disabled />
                    <label for="state1">years_of_experience</label> </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->vehicle_registration_number}}"  name="vehicle_registration_number" id="country1"
                      placeholder="" disabled />
                    <label for="country1"> vehicle_registration_number</label> </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->vehicle_make}}"  name="vehicle_make" id="city1" placeholder="" disabled />
                    <label for="city1"> vehicle_make</label> </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->vehicle_model}}"  name="vehicle_model" id="zip1" placeholder="" disabled />
                    <label for="zip1"> vehicle_model</label> </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->vehicle_year}}"  name="vehicle_year" id="fullname1"
                      placeholder="ACME Inc." disabled />
                    <label for="fullname1"> vehicle_year</label> </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->vehicle_capacity}}"  name="vehicle_capacity" id="Addss1" placeholder="" disabled />
                    <label for="Addss1"> vehicle_capacity</label></div>
                </div>
                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->vehicle_status}}"  name="vehicle_status" id="Address21" placeholder="" disabled />
                    <label for="Address21"> vehicle_status</label> </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->mc_number}}"  name="mc_number" id="state1" placeholder="" disabled />
                    <label for="state1">mc_number</label> </div>
                </div>';

              </div>
              <div class="row">
                <div class="col-4">

                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->name}}"  name="fullname" id="fullname1" placeholder="ACME Inc." disabled />
                    <label for="fullname1"> Name</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->address}}"  name="Addss" id="Addss1" placeholder="" disabled />
                    <label for="Addss1"> Address 1</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->address2}}"  name="Addss2" id="Address21" placeholder="" disabled />
                    <label for="Address21"> Address 2</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->state}}"  name="state" id="state1" placeholder="" disabled />
                    <label for="state1">state</label>
                  </div>
                </div>

                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->city}}"  name="city" id="city1" placeholder="" disabled />
                    <label for="city1">city</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->zip}}"  name="zip" id="zip1" placeholder="" disabled />
                    <label for="zip1">zip</label>
                  </div>
                </div>

              </div>
            </div>
            @endforeach
          </div>
        </div>
        {{-- card end --}}
      </div>
    </div>
  </div>
</div>


@endsection
