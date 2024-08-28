@php
$isMenu = false;
$navbarHideToggle = false;
@endphp
@extends('layouts/contentNavbarLayout')
@section('title', ' Vertical Layouts - Forms')
@section('content')

  <form method="post" {{ route('form.user') }} action="reg" >
    @csrf
<!-- Basic Layout -->
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



<div class="row"> 
    <!---------------------------------------------------------------------------------------------------------------------------
      --------------------------------------------------------------- PRODUCER  ---------------------------------------------------
      ----------------------------------------------------------------------->
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">shiper</h5> <small class="text-muted float-end">USER INFO</small>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div class="form-floating form-floating-outline mb-4">
              <input type="text" class="form-control"name="email" id="basic-default-company" placeholder="Address line1" />
              <label for="basic-default-company">EMAIL</label>
            </div>
          </div>
          <div class="col-12">
        <div class="form-floating form-floating-outline mb-4">
          <input type="text" class="form-control" name="username" id="basic-default-fullname" placeholder="ACME Inc." />
          <label for="basic-default-fullname">Company Name</label>
        </div>
      </div>
        <div class="col-6">
        <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control" name="password"id="basic-default-company"  placeholder="" />
            <label for="basic-default-company">Company Address 1</label>
        </div>
    </div> 
          <div class="col-6">
            <div class="form-floating form-floating-outline mb-4">
              <input type="text" class="form-control" name="password"id="basic-default-company"  placeholder="" />
              <label for="basic-default-company">Company Address 1</label>
          </div>
        </div>
        <div class="col-6">
          <div class="form-floating form-floating-outline mb-4">
              <input type="text" class="form-control" name="password"id="basic-default-company"  placeholder="" />
              <label for="basic-default-company">Company state</label>
          </div>
      </div> 
            <div class="col-6">
              <div class="form-floating form-floating-outline mb-4">
                <input type="text" class="form-control" name="password"id="basic-default-company"  placeholder="" />
                <label for="basic-default-company">Company country</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating form-floating-outline mb-4">
                <input type="text" class="form-control" name="password"id="basic-default-company"  placeholder="" />
                <label for="basic-default-company">Company city</label>
            </div>
        </div> 
              <div class="col-6">
                <div class="form-floating form-floating-outline mb-4">
                  <input type="text" class="form-control" name="password"id="basic-default-company"  placeholder="" />
                  <label for="basic-default-company">Company zip</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating form-floating-outline mb-4">
                <input type="text" class="form-control" name="password"id="basic-default-company"  placeholder="" />
                <label for="basic-default-company">tax id/FEN</label>
            </div>
          </div>

<div class="col-8">
  <div class="d-flex align-items-start align-items-sm-center gap-4">
    <img src="http://127.0.0.1:8000/assets/img/avatars/1.jpg" alt="user-avatar" class="d-block w-px-120 h-px-120 rounded" id="uploadedAvatar">
    <div class="button-wrapper">
            <div class="text-muted small">Allowed JPG, GIF or PNG. Max size of 800K</div>
    </div>
  </div>
</div>
<div class="col-4"> <button type="submit" class="btn btn-primary">Send</button> </div>

      </div>
          
         
                
      </div>    
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Send</button> 
    </form>

@endsection
