@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp
@extends('layouts/contentNavbarLayout')

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
    min-height: 10vh;
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

.info-text {
    font-size: 1.1em;
    color: #555;
    margin: 10px 0;
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

      <p class="info-text">Your request has been successfully submitted!</p>



      @if(session('orderTime'))
          <p class="time-placed">
              <span class="clock-icon">🕒</span> Time placed: {{ session('orderTime') }}
          </p>
      @else
          <p class="time-placed">Order time not available.</p>
      @endif

      @if(session('to') && session('from') && session('titel') && session('status'))
      @if(session('to') && session('from') && session('titel') && session('status'))
      @if(session('to') && session('from') && session('titel') && session('status'))
      <p class="info-text">
          Request Details:
          <br>
          <strong>To:</strong> {{ session('to') }} <br>
          <strong>From:</strong> {{ session('from') }} <br>
          <strong>Title:</strong> {{ session('titel') }} <br>
          <strong>Status:</strong> {{ session('status') }} <br>
          <strong>Order Time:</strong> {{ session('orderTime') }}
      </p>
  @else
      <p class="info-text">
          Request details are not available.
      </p>
  @endif
  
  @else
      <p class="info-text">
          Request details are not available.
      </p>
  @endif
  
  @else
      <p class="info-text">
          Request details are not available.
      </p>
  @endif
  
  </div>
</div>

@endsection
