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
              <a class="nav-link " ><i class="fa-solid fa-user" style="color: #ffffff;"></i> &nbsp;&nbsp;Account</a>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('billing.agency')}}"
                ><i class="fa-solid fa-receipt" style="color: #ffff;"></i>&nbsp;&nbsp;Billing</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{ route('plan.agency', ['id' => Auth::user()->id]) }}"
                ><i class="fa-solid fa-calendar-check"></i>&nbsp;&nbsp;Plan</a
                >
            </li>
          </ul>
        </div>
      <div class="card">
        <!-- Notifications -->
        <div class="card-body">
          <h5 class="mb-0">All Billings</h5>
          <span class="card-subtitle">
            These are the list of all billings of your account
          </span>
          <div class="error"></div>
        </div>
        <div class="table-responsive">
          <table class="table " style="padding-right: 2%;padding-left: 2%;padding-bottom: 2% !important">
            <thead style="background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);">
              <tr>
                <th class="text-nowrap fw-medium" style="border-left: 1px solid #E6E5E8 !important;">Plan</th>
                <th class="text-nowrap fw-medium text-center">Price</th>
                <th class="text-nowrap fw-medium text-center">Subscription Purchased Date</th>
                <th class="text-nowrap fw-medium text-center">Duration</th>
                <th class="text-nowrap fw-medium text-center">Invoice</th>
              </tr>
            </thead>
            <tbody>
              @foreach($billing as $bill)
              <tr>
                <td class="text-nowrap text-heading" style="border-left: 1px solid #E6E5E8 !important;">{{ $bill->plan_name }}</td>
                <td class="text-center">${{ number_format($bill->order_price, 2) }}</td>
                <td class="text-center">{{ \Carbon\Carbon::parse($bill->order_date)->format('Y-m-d') }}</td>

                <td class="text-center">{{ $bill->plan_duration }}</td>

                <td class="text-center">{{ $bill->order_invoice }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection



@push('body-scripts')
<script>


</script>
@endpush
