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
              <h4 class="card-title text-center" id="cardCenterTitle"> Add Truck</h4>
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

            <button type="button" name="add" id="add" class="btn btn-success">Add More</button>

            <form name="add_trucks" id="add_trucks" method="post" action="{{ route('store.truck') }}">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-4">
                    <div class="form-floating form-floating-outline mb-3">
                      <input type="text" name="vehicle_registration_number[]" placeholder="Enter Vehicle Registration Number" class="form-control" />
                      <label for="username1">Vehicle Registration Number</label>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-floating form-floating-outline mb-3">
                      <input type="text" name="vehicle_make[]" placeholder="Enter Vehicle Make" class="form-control" />
                      <label for="email1">Vehicle Make</label>
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-floating form-floating-outline mb-3">
                      <input type="text" name="vehicle_model[]" placeholder="Enter Vehicle Model" class="form-control" />
                      <label for="email1">Vehicle Model</label>
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-floating form-floating-outline mb-3">
                      <input type="text" name="vehicle_year[]" placeholder="Enter Vehicle Year" class="form-control" />
                      <label for="email1">Vehicle Year</label>
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-floating form-floating-outline mb-3">
                      <input type="text" name="vehicle_capacity[]" placeholder="Enter Vehicle Capacity" class="form-control" />
                      <label for="email1">Vehicle Capacity</label>
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-floating form-floating-outline mb-3">
                      <input type="text" name="vehicle_status[]" placeholder="Enter Vehicle Status" class="form-control" />
                      <label for="email1">Vehicle Status</label>
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-floating form-floating-outline mb-3">
                      <input type="text" name="mc_number[]" placeholder="Enter Motor Carrier Number" class="form-control" />
                      <label for="email1">Motor Carrier Number</label>
                    </div>
                  </div>


                  <div class="col-4">
                    <div class="form-floating form-floating-outline mb-3">
                      <input type="text" name="license_number[]" placeholder="Enter Motor Carrier Number" class="form-control" />
                      <label for="email1">License Number</label>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-floating form-floating-outline mb-3">
                      <input type="text" name="license_type[]" placeholder="Enter Motor Carrier Number" class="form-control" />
                      <label for="email1"> License Type </label>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-floating form-floating-outline mb-3">
                      <input type="text" name="license_expiry_date[]" placeholder="Enter Motor Carrier Number" class="form-control" />
                      <label for="email1"> License Expiry Date</label>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-floating form-floating-outline mb-3">
                      <input type="text" name="years_of_experience[]" placeholder="Enter Motor Carrier Number" class="form-control" />
                      <label for="email1"> Years of Experience </label>
                    </div>
                  </div>


                  <div class="col-12">
                    <div id="dynamic_field"></div>
                  </div>

                  <input type="submit" name="submit" id="submit" class="btn btn-outline-info" value="Submit" />
                </div>
              </div>
            </form>

          </div>
        </div>
        {{-- card end --}}
      </div>
    </div>
  </div>
</div>
@push('body-scripts')
<script>
  var i = 1;

  $('#add').click(function() {
    i++;
    $('#dynamic_field').append(
      '<br><hr><br>' +
      '<div class="row" id="row' + i + '">' +
        '<div class="col-4">' +
          '<div class="form-floating form-floating-outline mb-3">' +
            '<input name="vehicle_registration_number[]" placeholder="Enter Vehicle Registration Number" class="form-control">' +
            '<label for="username1">Vehicle Registration Number</label>' +
          '</div>' +
        '</div>' +
        '<div class="col-4">' +
          '<div class="form-floating form-floating-outline mb-3">' +
            '<input name="vehicle_make[]" placeholder="Enter Vehicle Make" class="form-control">' +
            '<label for="email1">Vehicle Make</label>' +
          '</div>' +
        '</div>' +
        '<div class="col-4">' +
          '<div class="form-floating form-floating-outline mb-3">' +
            '<input name="vehicle_model[]" placeholder="Enter Vehicle Model" class="form-control">' +
            '<label for="email1">Vehicle Model</label>' +
          '</div>' +
        '</div>' +
        '<div class="col-4">' +
          '<div class="form-floating form-floating-outline mb-3">' +
            '<input name="vehicle_year[]" placeholder="Enter Vehicle Year" class="form-control">' +
            '<label for="email1">Vehicle Year</label>' +
          '</div>' +
        '</div>' +
        '<div class="col-4">' +
          '<div class="form-floating form-floating-outline mb-3">' +
            '<input name="vehicle_capacity[]" placeholder="Enter Vehicle Capacity" class="form-control">' +
            '<label for="email1">Vehicle Capacity</label>' +
          '</div>' +
        '</div>' +
        '<div class="col-4">' +
          '<div class="form-floating form-floating-outline mb-3">' +
            '<input name="vehicle_status[]" placeholder="Enter Vehicle Status" class="form-control">' +
            '<label for="email1">Vehicle Status</label>' +
          '</div>' +
        '</div>' +
        '<div class="col-4">' +
          '<div class="form-floating form-floating-outline mb-3">' +
            '<input name="mc_number[]" placeholder="Enter Motor Carrier Number" class="form-control">' +
            '<label for="email1">Motor Carrier Number</label>' +
          '</div>' +
        '</div>' +
        '<div class="col-4">' +
  '<div class="form-floating form-floating-outline mb-3">' +
    '<input type="text" name="license_number[]" placeholder="Enter License Number" class="form-control">' +
    '<label for="license_number">License Number</label>' +
  '</div>' +
'</div>' +
'<div class="col-4">' +
  '<div class="form-floating form-floating-outline mb-3">' +
    '<input type="text" name="license_type[]" placeholder="Enter License Type" class="form-control">' +
    '<label for="license_type">License Type</label>' +
  '</div>' +
'</div>' +
'<div class="col-4">' +
  '<div class="form-floating form-floating-outline mb-3">' +
    '<input type="text" name="license_expiry_date[]" placeholder="Enter License Expiry Date" class="form-control">' +
    '<label for="license_expiry_date">License Expiry Date</label>' +
  '</div>' +
'</div>' +
'<div class="col-4">' +
  '<div class="form-floating form-floating-outline mb-3">' +
    '<input type="text" name="years_of_experience[]" placeholder="Enter Years of Experience" class="form-control">' +
    '<label for="years_of_experience">Years of Experience</label>' +
  '</div>' +
'</div>'+
        '<div class="col-4">' +
          '<button type="button" class="btn btn-outline-danger waves-input-wrapper waves-effect btn_remove" id="' + i + '">Remove</button>' +
        '</div>' +
      '</div>' 

    );
  });

  $(document).on('click', '.btn_remove', function() {
    var button_id = $(this).attr("id");
    $('#row' + button_id).remove();
  });
</script>

@endpush

@endsection
