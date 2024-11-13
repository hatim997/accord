@php
$isMenu = false;
$navbarHideToggle = false;
@endphp
{{-- @extends('layouts/contentNavbarLayout') --}}
@extends('layouts/commonMaster' )

@section('layoutContent')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@php
$userId = auth()->user()->id;
$user = request()->user();

@endphp
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-md-12">
      <div class="nav-align-top mb-4">
        <ul class="nav nav-pills flex-column flex-md-row mb-6 gap-2 gap-lg-0">
          @if ($user->role == "agent")
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('profile.agency')}}"
              ><i class="fa-solid fa-user" style="color: #ffffff;"></i> &nbsp;&nbsp;Account</a
            >
          </li>
          @elseif ($user->role == "truck_driver")
          <li class="nav-item">
            <a class="nav-link " href="{{ route('profile.truck')}}"
              ><i class="fa-solid fa-user" style="color: #ffffff;"></i> &nbsp;&nbsp;Account</a
            >
          </li>
          @elseif ($user->role == "shipper")
          <li class="nav-item">
            <a class="nav-link " href="{{ route('profile.shipper')}}"
              ><i class="fa-solid fa-user" style="color: #ffffff;"></i> &nbsp;&nbsp;Account</a
            >
          </li>
          @elseif ($user->role == "freight_driver")
          <li class="nav-item">
            <a class="nav-link " href="{{ route('profile.freight')}}"
              ><i class="fa-solid fa-user" style="color: #ffffff;"></i> &nbsp;&nbsp;Account</a
            >
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link " ><i class="fa-solid fa-user" style="color: #ffffff;"></i> &nbsp;&nbsp;Account</a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="{{ route('billing.agency')}}"
              ><i class="fa-solid fa-receipt"></i>&nbsp;&nbsp;Billing</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ route('plan.agency', ['id' => Auth::user()->id]) }}"
              ><i class="fa-solid fa-calendar-check"></i>&nbsp;&nbsp;Plan</a
            >
          </li>
        </ul>
      </div>
      <div class="card mb-6">

        <div class="card-body pt-0">
          <form id="formAccountSettings" method="POST" action="{{route('agent.proupd')}}">
            @csrf
            <div class="row mt-1 g-5">
              @foreach ($driverdetail as $item)
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input
                    class="form-control"
                    type="text"
                    id="firstName"
                    name="firstName"
                   value="{{$item->name}}"
                    autofocus />
                  <label for="firstName">First Name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input class="form-control" type="text" value="{{$item->agencies[0]->mname}}" name="mname"   id="username" placeholder="ACME Inc." />
                  <label for="lastName">Middle Name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input class="form-control" type="text" value="{{$item->agencies[0]->lname}}" name="lname"   id="username" placeholder="ACME Inc."  />
                  <label for="lastName">Last Name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input
                    class="form-control"
                    type="text"
                    value="{{$item->email}}"  name="email"  id="email1" placeholder="example.com"/>
                  <label for="email">Email</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input
                    type="text"
                    class="form-control"
                    value="{{$item->agencies[0]->extra_email}}"  name="altemail" id="altemail1" />
                  <label for="organization">ALT EMAIL</label>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input type="text" class="form-control"   name="cellphone" id="phone1" placeholder="03xxxxxxxxx" value="{{$item->agencies[0]->cellphone}}" />
                  <label for="altemail1">Contact #</label>
                </div>
              </div>






              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input
                    class="form-control"
                    type="text"
                    value="{{$item->agencies[0]->name}}"  name="name" id="fullname1" placeholder="ACME Inc."
                    autofocus />
                  <label for="firstName">Company Name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input class="form-control" type="text" value="{{$item->agencies[0]->ialn}}"  name="ialn"  id="email1" placeholder="xxxxxx"/>
                  <label for="lastName">Insurance Agency License Number</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input class="form-control" type="text" value="{{$item->agencies[0]->suffix}}"  name="suffix"  id="email1" placeholder="ltd" />
                  <label for="lastName">Suffix</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input
                    class="form-control"
                    type="text"
                    value="{{$item->agencies[0]->websit}}"  name="websit"  id="email1" placeholder="example.com"/>
                  <label for="email">Company Website address:</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input
                    type="text"
                    class="form-control"
                    value="{{$item->agencies[0]->address}}"  name="Addss" id="Addss1" placeholder="" />
                  <label for="organization">Address 1</label>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input type="text" class="form-control"   value="{{$item->agencies[0]->address2}}"  name="Addss2" id="Address21" placeholder=""  />
                  <label for="altemail1">Address 2</label>
                </div>
              </div>




              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input class="form-control" type="text" value="{{$item->agencies[0]->state}}"  name="state" id="state1" placeholder=""  />
                  <label for="lastName">state</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input class="form-control" type="text" value="{{$item->agencies[0]->city}}"  name="city" id="city1" placeholder=""  />
                  <label for="lastName">city</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating form-floating-outline">
                  <input
                    class="form-control"
                    type="text"
                    value="{{$item->agencies[0]->zip}}"  name="zip" id="zip1" placeholder=""/>
                  <label for="email">zip</label>
                </div>
              </div>






              @endforeach
            </div>
            <div class="mt-4">
              <button type="submit" class="btn btn-primary me-3 sv-button">Save changes</button>
            </div>
          </form>
        </div>
        <!-- /Account -->
      </div>
      <div class="card mt-4">
        <h5 class="card-header">Change Password</h5>
        <div class="card-body">
          <form id="formAccountDeactivation" onsubmit="return false">
            <div class="form-check mb-6 ms-3 d-flex">

              <div class="col-md-3">
                <div class="form-floating form-floating-outline">
                  <input type="text" class="form-control" name="password" id="current_password" placeholder=""    />
                  <label for="altemail1">Old Password</label>
                </div>
              </div>
              <div class="col-md-3 " style="margin-left: 3% !important;">
                <div class="form-floating form-floating-outline">
                  <input type="text" id="new_password" name="newpass"  class="form-control"   placeholder=""  />
                  <label for="altemail1">New Password</label>
                </div>
              </div>
              <div class="col-md-3 " style="margin-left: 3% !important;">
                <div class="form-floating form-floating-outline">
                  <input type="text" class="form-control" placeholder=""  id="new_password_confirmation" />
                  <label for="altemail1">ReNew Password</label>
                </div>
              </div>

            </div>
            <button type="submit" id="update-password-btn" class="btn c-pass" style="margin-top: 1% !important; background-color:#00a2ff; color:#ffffff;" >
              Change Password
            </button>
            <div id="response-message"></div>
          </form>
        </div>
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
