@php
$isMenu = false;
$navbarHideToggle = false;
@endphp
@extends('layouts/contentNavbarLayout')
@section('title', ' Vertical Layouts - Forms')
@section('content')




<div class="row">
    <!---------------------------------------------------------------------------------------------------------------------------
      --------------------------------------------------------------- PRODUCER  ---------------------------------------------------
      ----------------------------------------------------------------------->
  <div class="col-xl">






    <!------------------------------------------------------------------------------------------------------------
      ---------------------------------------------------------------------------------------------------------------
      -------------------------------------------- EDit Form  start----------------------------------------------------
    ----------------------------------------------------------------------------------------------------------------
    --------------------------------------------------------------------------------------------------------------->

    @if(isset($message))
    <script>
      // JavaScript code to display the alert

          alert({{ session('message') }});

  </script>
@endif

    <div class="card">

        <div class="modal-content">

          <form id="editForm" method="POST" action="{{route('update_user')}}">
    @csrf
            <!-- Basic Layout -->

            <div class="card-header">
              <h4 class="modal-title" id="modalCenterTitle">Edit USER</h4>


            </div>
            <div class="card-body">


              <input type="hidden" name="user_id" value="{{$users->id}}">
              <input type="hidden" name="role"  value="{{$users->role}}">
              <input type="hidden" name="table_id" value="{{$userss->id??0}}" >

              <div class="row">
                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="username" value="{{$users->name}}" id="username"
                      placeholder="ACME Inc." />
                    <label for="username">USERNAME</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="middlename" value="{{$users->mname}}" id="middlename"
                      placeholder="ACME Inc." />
                    <label for="username">MIDDLENAME</label>
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="lastname" value="{{$users->lname}}" id="lastname"
                      placeholder="ACME Inc." />
                    <label for="username">LASTNAME</label>
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="email" id="email" value="{{$users->email}}" placeholder="Address line1" />
                    <label for="email">EMAIL</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="altemail" id="altemail" value="{{$userss->extra_email??''}}"
                      placeholder="Address line1" />
                    <label for="altemail">ALT EMAIL</label>
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="phone" id="phone" value="{{$userss->cellphone??''}}" placeholder="Address line1" />
                    <label for="phone">CONTACT #</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="companyname" id="companyname" value="{{$userss->name??''}}"
                      placeholder="Address line1" />
                    <label for="companyname">COMPANY NAME</label>
                  </div>
                </div>

                  @if ($users->role == "agent")


                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="ialn" id="ialn" value="{{$userss->ialn??''}}"
                      placeholder="Address line1" />
                    <label for="ialn">Insurance Agency License Number</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="suffix" id="suffix" value="{{$userss->suffix??''}}"
                      placeholder="Address line1" />
                    <label for="suffix">Suffix</label>
                  </div>
                </div>


                @elseif ($users->role == "shipper")


                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="fax" id="fax" value="{{$userss->fax??''}}"
                      placeholder="Address line1" />
                    <label for="fax">Fax #</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="title" id="title" value="{{$userss->title??''}}"
                      placeholder="Address line1" />
                    <label for="title">Title</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="nominal_capital" id="nominal_capital" value="{{$userss->nominal_capital??''}}"
                      placeholder="Address line1" />
                    <label for="nominal_capital">Nominal Capital</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="owner" id="owner" value="{{$userss->owner??''}}"
                      placeholder="Address line1" />
                    <label for="owner">Owner</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="industry" id="industry" value="{{$userss->industry??''}}"
                      placeholder="Address line1" />
                    <label for="industry">Industry</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="tax" id="tax" value="{{$userss->tax??''}}"
                      placeholder="Address line1" />
                    <label for="tax">US Tax ID / Canadian Business Number</label>
                  </div>
                </div>

                @elseif ($users->role == "freight_driver")

                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="fax" id="fax" value="{{$userss->fax??''}}"
                      placeholder="Address line1" />
                    <label for="fax">Fax #</label>
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="title" id="title" value="{{$userss->title??''}}"
                      placeholder="Address line1" />
                    <label for="title">Title</label>
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="suffix" id="suffix" value="{{$userss->suffix??''}}"
                      placeholder="Address line1" />
                    <label for="suffix">Suffix</label>
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="tax" id="tax" value="{{$userss->tax??''}}"
                      placeholder="Address line1" />
                    <label for="tax">US Tax ID / Canadian Business Number</label>
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="usdot" id="usdot" value="{{$userss->usdot??''}}"
                      placeholder="Address line1" />
                    <label for="usdot">US DOT #</label>
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="scac" id="scac" value="{{$userss->scac??''}}"
                      placeholder="Address line1" />
                    <label for="scac">SCAC Code</label>
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="mc_number" id="mc_number" value="{{$userss->mc_number??''}}"
                      placeholder="Address line1" />
                    <label for="mc_number">Federal Registration No. (MC Number)</label>
                  </div>
                </div>

                @elseif ($users->role == "truck_driver")

                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="fax" id="fax" value="{{$userss->fax??''}}"
                      placeholder="Address line1" />
                    <label for="fax">Fax #</label>
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="salutation" id="salutation" value="{{$userss->salutation??''}}"
                      placeholder="Address line1" />
                    <label for="salutation">Salutation</label>
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="suffix" id="suffix" value="{{$userss->suffix??''}}"
                      placeholder="Address line1" />
                    <label for="suffix">Suffix</label>
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="tax" id="tax" value="{{$userss->tax??''}}"
                      placeholder="Address line1" />
                    <label for="tax">US Tax ID / Canadian Business Number</label>
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="usdot" id="usdot" value="{{$userss->usdot??''}}"
                      placeholder="Address line1" />
                    <label for="usdot">US DOT #</label>
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="scac" id="scac" value="{{$userss->scac??''}}"
                      placeholder="Address line1" />
                    <label for="scac">SCAC Code</label>
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="mc_number" id="mc_number" value="{{$userss->mc_number??''}}"
                      placeholder="Address line1" />
                    <label for="mc_number">Federal Registration No. (MC Number)</label>
                  </div>
                </div>


                <div class="col-md-6">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$userss->license_number}}"  name="license_number" id="fullname1"
                      placeholder="ACME Inc."  />
                    <label for="fullname1"> license_number</label> </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="date" class="form-control" value="{{$userss->license_expiry_date}}"  name="license_expiry_date" id="Addss1" placeholder=""  />
                    <label for="Addss1"> license_expiry_date</label></div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$userss->license_type}}"  name="license_type" id="Address21" placeholder=""  />
                    <label for="Address21"> license_type</label> </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$userss->years_of_experience}}"  name="years_of_experience" id="state1" placeholder=""  />
                    <label for="state1">years_of_experience</label> </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$userss->vehicle_registration_number}}"  name="vehicle_registration_number" id="country1"
                      placeholder=""  />
                    <label for="country1"> vehicle_registration_number</label> </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$userss->vehicle_make}}"  name="vehicle_make" id="city1" placeholder=""  />
                    <label for="city1"> vehicle_make</label> </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$userss->vehicle_model}}"  name="vehicle_model" id="zip1" placeholder=""  />
                    <label for="zip1"> vehicle_model</label> </div>
                </div>
                <div class="col-4">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$userss->vehicle_year}}"  name="vehicle_year" id="fullname1"
                      placeholder="ACME Inc."  />
                    <label for="fullname1"> vehicle_year</label> </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$userss->vehicle_capacity}}"  name="vehicle_capacity" id="Addss1" placeholder=""  />
                    <label for="Addss1"> vehicle_capacity</label></div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline mb-3">
                    <input type="text" class="form-control" value="{{$userss->vehicle_status}}"  name="vehicle_status" id="Address21" placeholder=""  />
                    <label for="Address21"> vehicle_status</label> </div>
                </div>






                @endif







                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="websit" id="websit" value="{{$userss->websit??''}}"
                      placeholder="Address line1" />
                    <label for="websit">Company Website address</label>
                  </div>
                </div>


                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" value="{{$userss->address??''}}" name="Address" id="Adddress" placeholder="" />
                    <label for="Adddress">Address 1</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" value="{{$userss->address2??''}}" name="Address2" id="Address2" placeholder="" />
                    <label for="Address2">Address 1</label>
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" value="{{$userss->state??''}}" name="state" id="state" placeholder="" />
                    <label for="state">state</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" value="{{$userss->city??''}}" name="city" id="city" placeholder="" />
                    <label for="city"> city</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" value="{{$userss->zip??''}}" name="zip" id="zip" placeholder="" />
                    <label for="zip"> zip</label>
                  </div>
                </div>

                <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              </div>

              {{-- card end --}}
            </div>




          </form>
        </div>

    </div>

  <!------------------------------------------------------------------------------------------------------------
      ---------------------------------------------------------------------------------------------------------------
      -------------------------------------------- EDit Form  ends----------------------------------------------------
    ----------------------------------------------------------------------------------------------------------------
    --------------------------------------------------------------------------------------------------------------->






    <!--/ Striped Rows -->
  </div>
</div>


@endsection
