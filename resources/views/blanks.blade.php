@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp
@extends('layouts/commonMaster')

@section('title', 'Dashboard - main')

@push('body-style')
<style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

.wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 10vh; /* Full viewport height */
    background-color: #f9f9f9;
}

.confirmation-container {
    text-align: center;
    max-width: 600px;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h1 {
    font-size: 2em;
    color: #333;
    margin-bottom: 10px;
}

.emoji {
    font-size: 1.2em;
}

.order-text {
    font-size: 1.1em;
    color: #555;
    margin: 10px 0;
}

.order-number {
    color: #057ae4;
    font-weight: bold;
}

.email-notice {
    color: #666;
    font-size: 0.95em;
    margin: 15px 0;
    line-height: 1.6;
}

.email {
    font-weight: bold;
}

.time-placed {
    color: #888;
    font-size: 0.9em;
    margin-top: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
}

.clock-icon {
    font-size: 1.2em;
}
</style>
@endpush

@section('content')

<div class="wrapper">
  <div class="confirmation-container">
      <h1>Thank You! <span class="emoji">😇</span></h1>

      @if(session('invoice'))
          <p class="order-text">Your order <span class="order-number">#{{ session('invoice') }}</span> has been placed!</p>
      @else
          <p class="order-text">Order ID not found.</p>
      @endif

      <p class="email-notice">
          We sent an email to
          <span class="email">
              {{ session('email', 'no-email@example.com') }}
          </span>
          with your order confirmation and receipt. If the email hasn't arrived within two minutes, please check your spam folder to see if the email was routed there.
      </p>

      @if(session('orderTime'))
          <p class="time-placed">
              <span class="clock-icon">🕒</span> Time placed: {{ session('orderTime') }}
          </p>
      @else
          <p class="time-placed">Order time not found.</p>
      @endif
  </div>
</div>



@endsection
