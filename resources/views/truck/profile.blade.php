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
            {{-- {{dd($driverdetail)}} --}}
     
                
           
            <div class="card-body">
              <form  method="POST" action="{{route('driver.proupd')}}">
                @csrf
                <div style="display: flex;justify-content: flex-end;">
    
                  <button type="submit" id="update-password-btn text-right" class="btn btn-primary">Save Changes </button>
                </div>
                <br>
<br>
<br>
              @foreach ($driverdetail as $item)
              <input type="hidden" class="form-control" value="{{$item->truckers[0]->id}}" name="id"   id="username" placeholder="ACME Inc."  />

              <div class="row">
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->name}}" name="username" id="username" placeholder="ACME Inc."  />
                    <label for="username1">USERNAME</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->mname}}"  name="mname" id="fullname1" placeholder="ACME Inc."  />
                    <label for="fullname1"> Middle Name</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->lname}}"  name="lname" id="fullname1" placeholder="ACME Inc."  />
                    <label for="fullname1">Last Name</label>
                  </div>
                </div>

                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->email}}"  name="email"  id="email1" placeholder="example.com"
                      required disabled  />
                    <label for="email1">EMAIL</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->extra_email}}"  name="altemail" id="altemail1"
                      placeholder="Address line1"  />
                    <label for="altemail1">ALT EMAIL</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->cellphone}}"  name="cellphone" id="phone1" placeholder="Address line1"  />
                    <label for="phone1">CONTACT #</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->fax}}"  name="fax" id="phone1" placeholder="Address line1"  />
                    <label for="phone1">Fax #</label>
                  </div>
                </div>

              </div>
              <hr> <br>
              <div class="row">
              <div class="col-4">
                <div class="form-floating form-floating-outline mb-3">
                  <input type="text" class="form-control" value="{{$item->truckers[0]->name}}"  name="name" id="fullname1" placeholder="ACME Inc."  />
                  <label for="fullname1">Company Name</label>
                </div>
              </div>
              <div class="col-4">
                <div class="form-floating form-floating-outline mb-3">
                  <input type="text" class="form-control" value="{{$item->truckers[0]->mc_number}}"  name="mc_number" id="state1" placeholder=""  />
                  <label for="state1">MC Number </label> </div>
              </div>
              <div class="col-4">
                <div class="form-floating form-floating-outline mb-3">
                  <input type="text" class="form-control" value="{{$item->truckers[0]->scac}}"  name="scac" id="fullname1" placeholder="ACME Inc."  />
                  <label for="fullname1"> SCAC Code</label>
                </div>
              </div>
              <div class="col-4">
                <div class="form-floating form-floating-outline mb-3">
                  <input type="text" class="form-control" value="{{$item->truckers[0]->tax}}"  name="tax" id="fullname1" placeholder="ACME Inc."  />
                  <label for="fullname1">US Tax ID / Canadian Business Number</label>
                </div>
              </div>
              <div class="col-4">
                <div class="form-floating form-floating-outline mb-3">
                  <input type="text" class="form-control" value="{{$item->truckers[0]->usdot}}"  name="usdot" id="fullname1" placeholder="ACME Inc."  />
                  <label for="fullname1">US DOT #</label>
                </div>
              </div>
              <div class="col-4">
                <div class="form-floating form-floating-outline mb-3">
                  <input type="text" class="form-control" value="{{$item->truckers[0]->suffix}}"  name="suffix" id="fullname1" placeholder="ACME Inc."  />
                  <label for="fullname1"> Suffix</label>
                </div>
              </div>

              <div class="col-4">
                <div class="form-floating form-floating-outline mb-3">
                  <input type="text" class="form-control" value="{{$item->truckers[0]->salutation}}"  name="salutation" id="fullname1" placeholder="ACME Inc."  />
                  <label for="fullname1"> salutation</label>
                </div>
              </div>
              <div class="col-4">
                <div class="form-floating form-floating-outline mb-3">
                  <input type="text" class="form-control" value="{{$item->truckers[0]->websit}}"  name="websit" id="fullname1" placeholder="ACME Inc."  />
                  <label for="fullname1"> Company Website address:</label>
                </div>
              </div>
            </div>
            <hr> <br>

              <div class="row" id="inputContainer2">
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->license_number}}"  name="license_number" id="fullname1"
                      placeholder="ACME Inc."  />
                    <label for="fullname1"> license_number</label> </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="date" class="form-control" value="{{$item->truckers[0]->license_expiry_date}}"  name="license_expiry_date" id="Addss1" placeholder=""  />
                    <label for="Addss1"> license_expiry_date</label></div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->license_type}}"  name="license_type" id="Address21" placeholder=""  />
                    <label for="Address21"> license_type</label> </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->years_of_experience}}"  name="years_of_experience" id="state1" placeholder=""  />
                    <label for="state1">years_of_experience</label> </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->vehicle_registration_number}}"  name="vehicle_registration_number" id="country1"
                      placeholder=""  />
                    <label for="country1"> vehicle_registration_number</label> </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->vehicle_make}}"  name="vehicle_make" id="city1" placeholder=""  />
                    <label for="city1"> vehicle_make</label> </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->vehicle_model}}"  name="vehicle_model" id="zip1" placeholder=""  />
                    <label for="zip1"> vehicle_model</label> </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->vehicle_year}}"  name="vehicle_year" id="fullname1"
                      placeholder="ACME Inc."  />
                    <label for="fullname1"> vehicle_year</label> </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->vehicle_capacity}}"  name="vehicle_capacity" id="Addss1" placeholder=""  />
                    <label for="Addss1"> vehicle_capacity</label></div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->vehicle_status}}"  name="vehicle_status" id="Address21" placeholder=""  />
                    <label for="Address21"> vehicle_status</label> </div>
                </div>
             

              </div>
              <hr> <br>
              <div class="row">
              
                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->address}}"  name="Addss" id="Addss1" placeholder=""  />
                    <label for="Addss1"> Address 1</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->address2}}"  name="Addss2" id="Address21" placeholder=""  />
                    <label for="Address21"> Address 2</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->state}}"  name="state" id="state1" placeholder=""  />
                    <label for="state1">state</label>
                  </div>
                </div>

                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->city}}"  name="city" id="city1" placeholder=""  />
                    <label for="city1">city</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->zip}}"  name="zip" id="zip1" placeholder=""  />
                    <label for="zip1">zip</label>
                  </div>
                </div>

              </div>
              @endforeach
              </form>

              <hr>
              <br>
                            <div class="row">
                              <div class="col-3">
                                <div class="form-floating form-floating-outline mb-3">
                                  <input type="text" class="form-control" name="password" id="current_password" placeholder=""  />
                                  <label for="zip1">Old Password</label>
                                </div>
                          </div>
                         
                            <div class="col-3">
                              <div class="form-floating form-floating-outline mb-3">
                                <input type="text" id="new_password" name="newpass"  class="form-control"   placeholder=""  />
                                <label for="zip1"> New Password</label>
                              </div>
                            </div>
                     
                        <div class="col-3">
                          <div class="form-floating form-floating-outline mb-3">
                            <input type="text" id="new_password_confirmation"  class="form-control"   placeholder=""  />
                            <label for="zip1"> ReNew Password</label>
                          </div>
                        </div>
                        <div class="col-3">
                          <button type="submit" id="update-password-btn" class="btn btn-primary">Changes Password</button>
                        </div>
                        <div id="response-message"></div>
                    </div>




            </div>
        
          </div>
        </div>
        {{-- card end --}}
      </div>
    </div>
  </div>
</div>


@endsection
@push('body-scripts')
<script>
$('#update-password-btn').on('click', function() {
        var currentPassword = $('#current_password').val();
        var newPassword = $('#new_password').val();
        var newPasswordConfirmation = $('#new_password_confirmation').val();

        var formData = {
            _token: '{{ csrf_token() }}',
            password: currentPassword,
            newpass: newPassword,
            newpass_confirmation: newPasswordConfirmation
        };

        $.ajax({
            url: '{{ route('password.update') }}',
            type: 'POST',
            data: formData,
            success: function(response) {
              if (response.status === 'success') {
                    // Show a success message and redirect to the login page
                    $('#response-message').html('<p style="color: green;">' + response.message + '</p>');
                    setTimeout(function() {
                        window.location.href = '{{ route('auth-login-basic') }}';  // Redirect to login page
                    }, 2000); // Delay for 2 seconds before redirect
                }
                else {
                    $('#response-message').html('<p style="color: red;">' + response.message + '</p>');
                }
            },
            error: function(xhr, status, error) {
                // Handle the validation or server error response
                var errors = xhr.responseJSON.errors;
                var errorMessage = '';

                if (errors) {
                    for (var key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            errorMessage += '<p style="color: red;">' + errors[key][0] + '</p>';
                        }
                    }
                } else {
                    // Fallback in case it's a different error
                    errorMessage = '<p style="color: red;">' + xhr.responseJSON.message + '</p>';
                }

                $('#response-message').html(errorMessage);
            }
        });
    });
</script>
@endpush