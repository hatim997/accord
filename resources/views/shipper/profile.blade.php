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
              <h4 class="card-title text-center" id="cardCenterTitle">Proflies</h4>
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
          <form  method="POST" action="{{route('shipper.proupd')}}">
            @csrf
            <div style="display: flex;justify-content: flex-end;">

              <button type="submit" id="update-password-btn text-right" class="btn btn-primary">Save Changes </button>
            </div>

<br>
<br>
<br>

{{-- {{dd($driverdetail)}} --}}
            @foreach ($driverdetail as $item)
                
           
            <input type="hidden" class="form-control" value="{{$item->shippers[0]->id}}" name="id"   id="username" placeholder="ACME Inc."  />

              <div class="row">
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->name}}" name="username"   id="username" placeholder="ACME Inc."  />
                    <label for="username1">First Name:</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->shippers[0]->mname}}" name="mname"   id="username" placeholder="ACME Inc."  />
                    <label for="username1">Middle Name:</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->shippers[0]->lname}}" name="lname"   id="username" placeholder="ACME Inc."  />
                    <label for="username1">Last Name:</label>
                  </div>
                </div>
             
              
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->email}}"  name="email"  id="email1" placeholder="example.com"
                      required  disabled/>
                    <label for="email1">EMAIL</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->shippers[0]->extra_email}}"  name="altemail" id="altemail1"
                      placeholder="Address line1"  />
                    <label for="altemail1">ALT EMAIL</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->shippers[0]->cellphone}}"  name="cellphone" id="phone1" placeholder="Address line1"  />
                    <label for="phone1">CONTACT #</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->shippers[0]->fax}}"  name="fax" id="phone1" placeholder="Address line1"  />
                    <label for="phone1">fax #</label>
                  </div>
                </div>
              </div>
              <hr><br>  
              <div class="row">
                <div class="col-4">

                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->shippers[0]->name}}"  name="name" id="fullname1" placeholder="ACME Inc."  />
                    <label for="fullname1">Campany Name</label>
                  </div>
                </div> <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->shippers[0]->title}}"  name="title"  id="email1" placeholder="example.com"
                        />
                    <label for="email1">Title</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->shippers[0]->nominal_capital}}"  name="nominal_capital"  id="email1" placeholder="example.com"
                        />
                    <label for="email1">Nominal Capital</label>
                  </div>
                </div>

                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->shippers[0]->owner}}"  name="owner"  id="email1" placeholder="example.com"
                        />
                    <label for="email1">Owner</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->shippers[0]->industry}}"  name="industry"  id="email1" placeholder="example.com"
                        />
                    <label for="email1">Industry</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->shippers[0]->website}}"  name="website"  id="email1" placeholder="example.com"
                        />
                    <label for="email1">Company Website address:</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->shippers[0]->tax}}"  name="tax"  id="email1" placeholder="example.com"
                        />
                    <label for="email1">US Tax ID / Canadian Business Number</label>
                  </div>
                </div>
              </div>
<hr> <br>
                <div class="row">
                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->shippers[0]->address}}"  name="Addss" id="Addss1" placeholder=""  />
                    <label for="Addss1"> Address 1</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->shippers[0]->address2}}"  name="Addss2" id="Address21" placeholder=""  />
                    <label for="Address21"> Address 2</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->shippers[0]->state}}"  name="state" id="state1" placeholder=""  />
                    <label for="state1">state</label>
                  </div>
                </div>

                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->shippers[0]->city}}"  name="city" id="city1" placeholder=""  />
                    <label for="city1">city</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->shippers[0]->zip}}"  name="zip" id="zip1" placeholder=""  />
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