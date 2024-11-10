@php
$isMenu = false;
$navbarHideToggle = false;
@endphp
{{-- @extends('layouts/contentNavbarLayout') --}}
@extends('layouts/commonMaster' )
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@section('layoutContent')
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
            <a class="nav-link " href="{{ route('profile.agency')}}"
              ><i class="fa-solid fa-user" ></i> &nbsp;&nbsp;Account</a
            >
          </li>
          @elseif ($user->role == "truck_driver")
          <li class="nav-item">
            <a class="nav-link " href="{{ route('profile.truck')}}"
              ><i class="fa-solid fa-user" ></i> &nbsp;&nbsp;Account</a
            >
          </li>
          @elseif ($user->role == "shipper")
          <li class="nav-item">
            <a class="nav-link " href="{{ route('profile.shipper')}}"
              ><i class="fa-solid fa-user" ></i> &nbsp;&nbsp;Account</a
            >
          </li>
          @elseif ($user->role == "freight_driver")
          <li class="nav-item">
            <a class="nav-link " href="{{ route('profile.freight')}}"
              ><i class="fa-solid fa-user" ></i> &nbsp;&nbsp;Account</a
            >
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link " ><i class="fa-solid fa-user" ></i> &nbsp;&nbsp;Account</a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="{{ route('billing.agency')}}"
              ><i class="fa-solid fa-receipt"></i>&nbsp;&nbsp;Billing</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('plan.agency', ['id' => Auth::user()->id]) }}"
              ><i class="fa-solid fa-calendar-check" style="color: #ffff;"></i>&nbsp;&nbsp;Plan</a
            >
          </li>
        </ul>
      </div>


      <div class="col-xl-8 col-lg-8 col-md-8 order-1 order-md-0 mx-auto d-flex justify-content-center align-items-center text-center" style="margin-top: 8%;">
        <br>

        @if ($subscription && $subscription->subscriptionPlan)
        <div class="card mb-6 border border-2 border-primary rounded" style="width: 100%;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <span class="badge bg-label-primary rounded-pill">{{ $subscription->subscriptionPlan->name }}</span>
                    <div class="d-flex justify-content-center">
                        <sub class="h5 pricing-currency mb-auto mt-1 text-primary">$</sub>
                        <h1 class="mb-0 text-primary">{{ $subscription->subscriptionPlan->price }}</h1>
                        <sub class="h6 pricing-duration mt-auto mb-3 fw-normal">month</sub>
                    </div>
                </div>

                <ul class="list-unstyled g-2 my-6 text-center">
                    <li class="mb-2 d-flex align-items-center justify-content-center">
                        <i class="mdi mdi-check-all mdi-10px text-body me-2"></i>
                        <span><strong> Duration</strong>: {{ $subscription->subscriptionPlan->duration }}</span>
                    </li>
                    <li class="mb-2 d-flex align-items-center justify-content-center">
                        <i class="mdi mdi-check-all mdi-10px text-body me-2"></i>
                        <span><strong>Description</strong>: {{ $subscription->subscriptionPlan->description }}</span>
                    </li>
                    <li class="mb-2 d-flex align-items-center justify-content-center">
                        <i class="mdi mdi-check-all mdi-10px text-body me-2"></i>
                        <span><strong>Extra Detail</strong>: {{ $subscription->subscriptionPlan->exdetail }}</span>
                    </li>
                </ul>

                <div class="d-flex justify-content-between align-items-center mb-1">
                    <span class="h6 mb-0">Days</span>
                    <span class="h6 mb-0">{{ round($progressPercentage) }}%</span>
                </div>

                <div class="progress mb-1 rounded" style="height: 6px;">
                    <div class="progress-bar rounded" role="progressbar" style="width: {{ round($progressPercentage) }}%;" aria-valuenow="{{ round($progressPercentage) }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <small>{{ $daysRemaining }} days remaining</small>
                <div class="d-grid w-100 mt-6" style="margin-top: 3%;">
                    <button class="btn btn-primary waves-effect waves-light" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">Upgrade Plan</button>
                </div>
            </div>
        </div>
        @else
        <p class="text-danger">No subscription plan found for this user.</p>
        @endif
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
