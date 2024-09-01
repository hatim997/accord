@extends('layouts/contentNavbarLayout')
@section('title', ' Vertical Layouts - Forms')
@section('content')
@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Truckers Certificate of Insurance</h4>
<p>Please fill out the following information and press the submit button to request a certificate of insurance. Your request will be processed and sent to you as soon as possible. Certificates will only be issued upon verification of coverage.</p>


<form method="POST" action="{{ route('agent.regs.store') }}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="role" value="truck_driver" />

  @if(Session::has('success'))
  <div class="alert alert-success alert-dismissible" role="alert">
    {{ Session::get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
  </div>
  @endif
  @if($errors->any())
  @foreach($errors->all() as $error)
  <div class="alert alert-danger alert-dismissible" role="alert">
    {{ $error }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
  </div>
  @endforeach
  @endif

  <!-- Basic Layout -->
  <div class="position-relative">
    <div class="container authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner py-4">
        <div class="card" id="cardCenter">
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
                <div class="container">

                  @if(!empty($successMessage))
                  <div class="alert alert-success">
                    {{ $successMessage }}
                  </div>
                  @endif
                  <div class="row p-2  bg-white">

                  </div>
                  <div class="row p-3 setup-content " id="step-1">
                    <div class="col-xs-12">
                      <div class="row px-5">
                        <div class="col-md-6">
                          <div class="form-group p-3">
                            <label for="name" class="required">Company Name:</label>
                            <input type="text" name="name" class="form-control" id="name">
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-group p-3">
                            <label for="mc_number"class="required">Federal Registration No. (MC Number)</label>
                            <input type="number" oninput="this.value=this.value.slice(0,8)" maxlength="8"
                              name="mc_number" class="form-control" id="mc_number" />
                            @error('mc_number') <span class="error">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-group p-3">
                            <label for="tax"class="required">US Tax ID / Canadian Business Number</label>
                            <input type="text" name="tax" class="form-control" id="tax" />
                            @error('tax') <span class="error">{{ $message }}</span> @enderror

                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group p-3">
                            <label for="scac"class="required">SCAC Code</label>
                            <input type="text" name="scac" maxlength="4" class="form-control" id="scac">
                            @error('scac') <span class="error">{{ $message }}</span> @enderror

                          </div>
                          <div class="form-group p-3">
                            <label for="usdot"class="required">US DOT #</label>
                            <input type="number" name="usdot" oninput="this.value=this.value.slice(0,8)" maxlength="8"
                              class="form-control" id="usdot" />
                            @error('usdot') <span class="error">{{ $message }}</span> @enderror

                          </div>

                          <div class="form-group p-3">
                            <label for="websit">Company Website address:</label>
                            <input type="text" name="websit" class="form-control" id="websit" />
                            @error('websit') <span class="error">{{ $message }}</span> @enderror

                          </div>

                        </div>
                      </div>

                    </div>
                  </div>
                  <div class="row setup-content " id="step-2">
                
                            <div class="col-md-6">
                              <div class="form-group py-3">
                                <label for="prefix">Prefix</label>
                                <select class="form-select" id="prefix" name="prefix"
                                  aria-label="Default select example">
                                  <option selected>Open this select menu</option>
                                  <option value="1">Mr</option>
                                  <option value="2">Mrs</option>
                                  <option value="3">Ms</option>
                                </select>

                              </div>
                              <div class="form-group py-3">
                                <label for="mname">Middle Name:</label>
                                <input type="text" name="mname" class="form-control" id="mname" />
                                @error('mname') <span class="error">{{ $message }}</span> @enderror
                              </div>
                              <div class="form-group py-3">
                                <label for="suffix"class="required">Suffix</label>
                                <input type="text" name="suffix" class="form-control" id="suffix" />
                                @error('suffix') <span class="error">{{ $message }}</span> @enderror
                              </div>
                              <div class="form-group py-3">
                                <label for="salutation"class="required">Salutation</label>
                                <input type="text" name="salutation" class="form-control" id="salutation" />
                                @error('salutation') <span class="error">{{ $message }}</span> @enderror
                              </div>

                            </div>
                            <div class="col-md-6">
                              <div class="form-group py-3">
                                <label for="fname"class="required">First Name:</label>
                                <input type="text" name="fname" class="form-control" id="fname" />
                                @error('fname') <span class="error">{{ $message }}</span> @enderror
                              </div>

                              <div class="form-group py-3">
                                <label for="lname"class="required">Last Name:</label>
                                <input type="text" name="lname" class="form-control" id="lname" />
                                @error('lname') <span class="error">{{ $message }}</span> @enderror
                              </div>
                              <div class="form-group py-3">
                                <label for="email"class="required">Email:</label>
                                <input type="email" name="email" class="form-control" id="email" />
                                @error('email') <span class="error">{{ $message }}</span> @enderror
                              </div>
                              <div class="form-group py-3">
                                <label for="title"class="required">Title:</label>
                                <input type="text" name="title" class="form-control" id="title" />
                                @error('title') <span class="error">{{ $message }}</span> @enderror
                              </div>
                            </div>
                       
                     
                            <div class="col-md-6">
                            

                              <div class="form-group py-3">
                                <label for="cellphone"class="required">Phone No:</label>
                                <input type="tel" name="cellphone" class="form-control" id="cellphone" />
                                @error('cellphone') <span class="error">{{ $message }}</span> @enderror
                              </div>
                              <div class="form-group py-3">
                                <label for="fax">Fax No:</label>
                                <input type="tel" name="fax" class="form-control" id="fax" />
                                @error('fax') <span class="error">{{ $message }}</span> @enderror
                              </div>

                            </div>

                            <div class="col-md-6">
                              <div class="form-group py-3">
                                <label for="address"class="required">Address:</label>
                                <input type="text" name="address" class="form-control" id="address" />
                                @error('address') <span class="error">{{ $message }}</span> @enderror
                              </div>
                              <div class="form-group py-3">
                                <label for="address2">Address 2</label>
                                <input type="text" name="address2" class="form-control" id="address2" />
                                @error('address2') <span class="error">{{ $message }}</span> @enderror
                              </div>

                            </div>
                            <div class="col-md-6">
                              <div class="form-group py-3">
                                <label for="zip"class="required">Zip Code:</label>
                                <input type="number" oninput="this.value=this.value.slice(0,5)" maxlength="5" name="zip"
                                  class="form-control" id="zip" />
                                @error('zip') <span class="error">{{ $message }}</span> @enderror
                              </div>
                              <div class="form-group py-3">
                                <label for="city"class="required">City:</label>
                                <input type="text" name="city" class="form-control" id="city" />
                                @error('city') <span class="error">{{ $message }}</span> @enderror
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group py-3">
                                <label for="state"class="required">State:</label>
                                <select class="form-control" id="state"  name="state" >
                                  <option value='AL'>Alabama</option>
                              <option value='AK'>Alaska</option>
                              <option value='AZ'>Arizona</option>
                              <option value='AR'>Arkansas</option>
                              <option value='CA'>California</option>
  
                              <option value='CO'>Colorado</option>
                              <option value='CT'>Connecticut</option>
                              <option value='DE'>Delaware</option>
                              <option value='DC'>District of Columbia</option>
                              <option value='FL'>Florida</option>
  
                              <option value='GA'>Georgia</option>
                              <option value='HI'>Hawaii</option>
                              <option value='ID'>Idaho</option>
                              <option value='IL'>Illinois</option>
                              <option value='IN'>Indiana</option>
  
                              <option value='IA'>Iowa</option>
                              <option value='KS'>Kansas</option>
                              <option value='KY'>Kentucky</option>
                              <option value='LA'>Louisiana</option>
                              <option value='ME'>Maine</option>
  
                              <option value='MD'>Maryland</option>
                              <option value='MA'>Massachusetts</option>
                              <option value='MI'>Michigan</option>
                              <option value='MN'>Minnesota</option>
                              <option value='MS'>Mississippi</option>
  
                              <option value='MO'>Missouri</option>
                              <option value='MT'>Montana</option>
                              <option value='NE'>Nebraska</option>
                              <option value='NV'>Nevada</option>
                              <option value='NH'>New Hampshire</option>
  
                              <option value='NJ'>New Jersey</option>
                              <option value='NM'>New Mexico</option>
                              <option value='NY'>New York</option>
                              <option value='NC'>North Carolina</option>
                              <option value='ND'>North Dakota</option>
  
                              <option value='OH'>Ohio</option>
                              <option value='OK'>Oklahoma</option>
                              <option value='OR'>Oregon</option>
                              <option value='PA'>Pennsylvania</option>
                              <option value='RI'>Rhode Island</option>
  
                              <option value='SC'>South Carolina</option>
                              <option value='SD'>South Dakota</option>
                              <option value='TN'>Tennessee</option>
                              <option value='TX'>Texas</option>
                              <option value='UT'>Utah</option>
  
                              <option value='VT'>Vermont</option>
                              <option value='VA'>Virginia</option>
                              <option value='WA'>Washington</option>
                              <option value='WV'>West Virginia</option>
                              <option value='WI'>Wisconsin</option>
  
                              <option value='WY'>Wyoming</option>
                              </select>                                @error('state') <span class="error">{{ $message }}</span> @enderror
                              </div>
                              <div class="form-group py-3">
                                <label for="country">Country:</label>
                                <input type="text" name="country" class="form-control" id="country" />
                                @error('country') <span class="error">{{ $message }}</span> @enderror
                              </div>
                            </div>
                          </div>
                       

                  <div class="row setup-content " id="step-3">
               
                        <div class="col-md-6">
                          <div class="form-group py-3">
                            <label for="license_type"class="required">License Type:</label>
                            <input type="text" name="license_type" class="form-control" id="license_type" />
                            @error('license_type') <span class="error">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-group py-3">
                            <label for="license_number"class="required">License Number  :</label>
                            <input type="text" name="license_number" class="form-control" id="license_number" />
                            @error('license_number') <span class="error">{{ $message }}</span> @enderror
                          </div>

                          <div class="form-group py-3">
                            <label for="license_expiry_date"class="required">License Expiry Date:</label>
                            <input type="date" name="license_expiry_date" class="form-control"
                              id="license_expiry_date" />
                            @error('license_expiry_date') <span class="error">{{ $message }}</span> @enderror
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group py-3">
                            <label for="years_of_experience"class="required">Years Of Experience:</label>
                            <input type="text" name="years_of_experience" class="form-control"
                              id="years_of_experience" />
                            @error('years_of_experience') <span class="error">{{ $message }}</span> @enderror
                          </div>

                          <div class="form-group py-3">
                            <label for="vehicle_registration_number"class="required">Vehicle Registration Number:</label>
                            <input type="text" name="vehicle_registration_number" class="form-control"
                              id="vehicle_registration_number" />
                            @error('vehicle_registration_number') <span class="error">{{ $message }}</span> @enderror
                          </div>

                          <div class="form-group py-3">
                            <label for="vehicle_make"class="required">Vehicle Make:</label>
                            <input type="text" name="vehicle_make" class="form-control" id="vehicle_make" />
                            @error('vehicle_make') <span class="error">{{ $message }}</span> @enderror
                          </div>
                        </div>
                
                
                        <div class="col-md-6">
                          <div class="form-group py-3">
                            <label for="vehicle_model"class="required">Vehicle Model :</label>
                            <input type="text" name="vehicle_model" class="form-control" id="vehicle_model" />
                            @error('vehicle_model') <span class="error">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-group py-3">
                            <label for="vehicle_year"class="required">Vehicle Year:</label>
                            <input type="text" name="vehicle_year" class="form-control" id="vehicle_year" />
                            @error('vehicle_year') <span class="error">{{ $message }}</span> @enderror
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group py-3">
                            <label for="vehicle_status"class="required">Vehicle Status :</label>
                            <input type="text" name="vehicle_status" class="form-control" id="vehicle_status" />
                            @error('vehicle_status') <span class="error">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-group py-3">
                            <label for="vehicle_capacity"class="required">Vehicle Capacity:</label>
                            <input type="text" name="vehicle_capacity" class="form-control" id="vehicle_capacity" />
                            @error('vehicle_capacity') <span class="error">{{ $message }}</span> @enderror
                          </div>
                        </div>
                     
             
               
                        <div class="col-md-6">
                          <div class="form-group py-3">
                            <label for="extra_email">ALT EMAIL</label>
                            <input type="text" class="form-control" name="extra_email" id="extra_email" placeholder="Extra Email" />
                          </div>

                          <div class="form-group py-3">
                            <label for="password">Upload License</label>
                            <input type="file" class="form-control" name="imagePath" id="imagePath" placeholder="Choose License" />
                          </div>

                        </div>
                        <div class="col-md-6">
                          <div class="form-group py-3">
                            <label for="password"class="required">PASSWORD</label>
                            <input type="text" class="form-control" name="password1" id="password" placeholder="********" />
                          </div>
                        </div>
                      </div>
                 

            </div>
          </div>
        </div>
        {{-- card end --}}
        <button type="submit" id="saveButton" class="btn btn-primary">Save changes</button>
      </div>
</form>


@endsection
