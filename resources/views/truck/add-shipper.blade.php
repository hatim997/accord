@extends('layouts/contentNavbarLayout')
@section('title', ' Vertical Layouts - Forms')
@section('content')
@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Truckers Certificate of Insurance</h4>
<p>Please fill out the following information and press the submit button to request a certificate of insurance. Your request will be processed and sent to you as soon as possible. Certificates will only be issued upon verification of coverage.</p>
 

<form method="POST" action="{{ route('reg.add') }}">

  @csrf


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
  <input type="hidden" name="role" value="shipper">
  <!-- Basic Layout -->
<div class="position-relative">
<div class="container authentication-wrapper authentication-basic container-p-y" > 
<div class="authentication-inner py-4">
  <div class="card" id="cardCenter" >
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
        <div class="card-body">
  <div class="row">
    <div class="col-4">
      <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" name="username" id="username" placeholder="ACME Inc." />
        <label for="username1">USERNAME</label>
      </div>
    </div>
    <div class="col-4">
      <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" name="email" id="email1" placeholder="example.com" required />
        <label for="email1">EMAIL</label>
      </div>
    </div>  

    <div class="col-4">
      <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" name="altemail" id="altemail1" placeholder="Address line1" />
        <label for="altemail1">ALT EMAIL</label>
      </div>
    </div>
    <div class="col-4">
      <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" name="phone" id="phone1" placeholder="Address line1" />
        <label for="phone1">CONTACT #</label>
      </div>
    </div>
    <div class="col-4">
      <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" name="password1" id="password" placeholder="********" />
        <label for="password1">PASSWORD</label>
      </div>
    </div>
    <div class="col-4">
      <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" name="fullname" id="fullname1" placeholder="ACME Inc." />
        <label for="fullname1">Company Name</label>
      </div>
    </div>
  </div>    
  <div class="row">   
    <div class="col-6">
      <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" name="Addss" id="Addss1" placeholder="" />
        <label for="Addss1"> Address 1</label>
      </div>
    </div>
    <div class="col-6">
      <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" name="Addss2" id="Address21" placeholder="" />
        <label for="Address21"> Address 2</label>
      </div>
    </div>
    <div class="col-4">
      <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" name="state" id="state1" placeholder="" />
        <label for="state1">state</label>
      </div>
    </div>
   
    <div class="col-4">
      <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" name="city" id="city1" placeholder="" />
        <label for="city1"> city</label>
      </div>
    </div>
    <div class="col-4">
      <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" name="zip" id="zip1" placeholder="" />
        <label for="zip1"> zip code</label>
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
