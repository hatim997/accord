@php
$isMenu = false;
$navbarHideToggle = false;
@endphp
{{-- @extends('layouts/contentNavbarLayout') --}}
@extends('layouts/commonMaster' )

@section('layoutContent')




<div class="row">
  <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
      <!-- User Card -->
      <div class="card mb-6">
        <div class="card-body pt-12">
          <div class="user-avatar-section">
            <div class=" d-flex align-items-center flex-column">
              <img class="img-fluid rounded mb-4" src="{{ asset('assets/img/logo.png') }}" height="120" width="120" alt="User avatar">
              <div class="user-info text-center">
                {{-- @foreach($userviewlist->truckers as $item)
                <h5>{{$item->name}}</h5>
                @endforeach --}}
                {{-- <span class="badge bg-label-danger rounded-pill">{{$userviewlist->role}}</span> --}}
              </div>
            </div>
          </div>


          <h5 class="pb-4 border-bottom mb-4">Details</h5>
          @foreach ($driverdetail as $item)
          <div class="info-container border-bottom mb-4"">
            <ul class="list-unstyled mb-6">
              <li class="mb-2">
                <span class="h6">Name:</span>
                <span>{{$item->name}} {{$item->truckers[0]->mname}} {{$item->truckers[0]->lname}}</span>
              </li>
              <li class="mb-2">
                <span class="h6">Email:</span>
                <span>{{$item->email}} </span>
              </li>
              <li class="mb-2">
                <span class="h6">Alt Email:</span>
                <span>  {{$item->truckers[0]->extra_email}} </span>
              </li>
              <li class="mb-2">
                <span class="h6">Contact #:</span>
                <span>  {{$item->truckers[0]->cellphone}} </span>
              </li>
              <li class="mb-2">
                <span class="h6">Fax #:</span>
                <span> {{$item->truckers[0]->fax}}
                </span>
              </li>

            </ul>

          </div>

          <div class="info-container">
            <ul class="list-unstyled mb-6">
              <li class="mb-2">
                <span class="h6">Company Name:</span>
                <span>{{$item->truckers[0]->name}}</span>
              </li>
              <li class="mb-2">
                <span class="h6">Email:</span>
                <span>{{$item->truckers[0]->mc_number}} </span>
              </li>
              <li class="mb-2">
                <span class="h6">Alt Email:</span>
                <span>  {{$item->truckers[0]->suffix}} </span>
              </li>
              <li class="mb-2">
                <span class="h6">Contact #:</span>
                <span> {{$item->truckers[0]->title}}</span>
              </li>
              <li class="mb-2">
                <span class="h6">Fax #:</span>
                <span> {{$item->truckers[0]->tax}}
                </span>
              </li>
              <li class="mb-2">
                <span class="h6">Status:</span>
                {{-- @if($userviewlist->status == 1) --}}
                <span class="badge bg-label-success rounded-pill">Active</span>
                {{-- @else --}}
                <span class="badge bg-label-danger rounded-pill">InActive</span>
                {{-- @endif --}}

              </li>
              <li class="mb-2">
                <span class="h6">Role:</span>
                {{-- <span>{{$userviewlist->role}}</span> --}}
              </li>
              <li class="mb-2">
                <span class="h6">Tax id:</span>
                {{-- @foreach($userviewlist->truckers as $item)
                <span>{{$item->tax}}</span>
                @endforeach --}}
              </li>
              <li class="mb-2">
                <span class="h6">Contact:</span>
                {{-- @foreach($userviewlist->truckers as $item)
                <span>{{$item->fax}}</span>
                @endforeach --}}
              </li>
              <!-- <li class="mb-2">
                <span class="h6">Languages:</span>
                <span>French</span>
              </li> -->
              <li class="mb-2">
                <span class="h6">State-City-ZipCode:</span>
                {{-- @foreach($userviewlist->truckers as $item) --}}
                {{-- <span>{{$item->state}}-{{$item->city}}-{{$item->zip}}</span> --}}
                {{-- @endforeach/ --}}
              </li>
            </ul>
            <div class="d-flex justify-content-center">
              <a href="javascript:;" class="btn btn-primary me-4 waves-effect waves-light" data-bs-target="#editUser" data-bs-toggle="modal">Edit</a>
              <a href="javascript:;" class="btn btn-outline-danger suspend-user waves-effect">Suspend</a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <!-- /User Card -->

    </div>

  <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">

      <div class="card mb-6">
          <!-- Notifications -->
          <h5 class="card-header border-bottom mb-0">Notifications</h5>
          <div class="card-body py-4">
            <span class="text-heading fw-medium">Change to notification settings, the user will get the update</span>
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th class="text-nowrap">Type</th>
                  <th class="text-nowrap text-center">Email</th>
                  <th class="text-nowrap text-center">Browser</th>
                  <th class="text-nowrap text-center">App</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-nowrap text-heading">New for you</td>
                  <td>
                    <div class="form-check mb-0 d-flex justify-content-center">
                      <input class="form-check-input" type="checkbox" id="defaultCheck1" checked="">
                    </div>
                  </td>
                  <td>
                    <div class="form-check mb-0 d-flex justify-content-center">
                      <input class="form-check-input" type="checkbox" id="defaultCheck2" checked="">
                    </div>
                  </td>
                  <td>
                    <div class="form-check mb-0 d-flex justify-content-center">
                      <input class="form-check-input" type="checkbox" id="defaultCheck3" checked="">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-nowrap text-heading">Account activity</td>
                  <td>
                    <div class="form-check mb-0 d-flex justify-content-center">
                      <input class="form-check-input" type="checkbox" id="defaultCheck4" checked="">
                    </div>
                  </td>
                  <td>
                    <div class="form-check mb-0 d-flex justify-content-center">
                      <input class="form-check-input" type="checkbox" id="defaultCheck5" checked="">
                    </div>
                  </td>
                  <td>
                    <div class="form-check mb-0 d-flex justify-content-center">
                      <input class="form-check-input" type="checkbox" id="defaultCheck6" checked="">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-nowrap text-heading">A new browser used to sign in</td>
                  <td>
                    <div class="form-check mb-0 d-flex justify-content-center">
                      <input class="form-check-input" type="checkbox" id="defaultCheck7" checked="">
                    </div>
                  </td>
                  <td>
                    <div class="form-check mb-0 d-flex justify-content-center">
                      <input class="form-check-input" type="checkbox" id="defaultCheck8" checked="">
                    </div>
                  </td>
                  <td>
                    <div class="form-check mb-0 d-flex justify-content-center">
                      <input class="form-check-input" type="checkbox" id="defaultCheck9">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="text-nowrap text-heading">A new device is linked</td>
                  <td>
                    <div class="form-check mb-0 d-flex justify-content-center">
                      <input class="form-check-input" type="checkbox" id="defaultCheck10" checked="">
                    </div>
                  </td>
                  <td>
                    <div class="form-check mb-0 d-flex justify-content-center">
                      <input class="form-check-input" type="checkbox" id="defaultCheck11">
                    </div>
                  </td>
                  <td>
                    <div class="form-check mb-0 d-flex justify-content-center">
                      <input class="form-check-input" type="checkbox" id="defaultCheck12">
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="card-body">
            <button type="submit" class="btn btn-primary me-3 waves-effect waves-light">Save changes</button>
            <button type="reset" class="btn btn-outline-secondary waves-effect">Discard</button>
          </div>
          <!-- /Notifications -->
        </div>
  </div></div>

























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
          <form  method="POST" action="{{route('freight.proupd')}}">
            @csrf
            <div style="display: flex;justify-content: flex-end;">

              <button type="submit" id="update-password-btn text-right" class="btn btn-primary">Save Changes </button>
            </div>

<br>
<br>
<br>

{{-- {{dd($driverdetail)}} --}}
            @foreach ($driverdetail as $item)


            <input type="hidden" class="form-control" value="{{$item->truckers[0]->id}}" name="id"   id="username" placeholder="ACME Inc."  />

              <div class="row">
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->name}}" name="username"   id="username" placeholder="ACME Inc."  />
                    <label for="username1">First Name:</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->mname}}" name="mname"   id="username" placeholder="ACME Inc."  />
                    <label for="username1">Middle Name:</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->lname}}" name="lname"   id="username" placeholder="ACME Inc."  />
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
                    <label for="phone1">fax #</label>
                  </div>
                </div>

              </div>
              <hr><br>
              <div class="row">
                <div class="col-4">

                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->name}}"  name="name" id="fullname1" placeholder="ACME Inc."  />
                    <label for="fullname1">Campany Name</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->mc_number}}"  name="mc_number"  id="email1" placeholder="example.com"
                        />
                    <label for="email1">Federal Registration No. (MC Number)</label>
                  </div>
                </div>

                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->suffix}}"  name="suffix"  id="email1" placeholder="example.com"
                        />
                    <label for="email1">Suffix</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->title}}"  name="title"  id="email1" placeholder="example.com"
                        />
                    <label for="email1">Title</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->tax}}"  name="tax"  id="email1" placeholder="example.com"
                        />
                    <label for="email1">US Tax ID / Canadian Business Number:</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->usdot}}"  name="usdot"  id="email1" placeholder="example.com"
                        />
                    <label for="email1">US DOT #</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->scac}}"  name="scac"  id="email1" placeholder="example.com"
                        />
                    <label for="email1">SCAC Code</label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$item->truckers[0]->websit}}"  name="websit"  id="email1" placeholder="example.com"
                        />
                    <label for="email1">Company Website address:</label>
                  </div>
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
