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
                    <input type="text" class="form-control" name="password" id="password" placeholder="********" />
                    <label for="password">PASSWORD</label>
                  </div>
                </div>
                <div class="col-6">
                  <input type="hidden" class="form-control" name="id" id="id" />
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" name="fullname" value="{{$userss->name??''}}" id="fulldname"
                      placeholder="ACME Inc." />
                    <label for="fulldname"> Name</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" value="{{$userss->address??''}}" name="Address" id="Adddress" placeholder="" />
                    <label for="Adddress"> Address 1</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" value="{{$userss->address2??''}}" name="Address2" id="Address2" placeholder="" />
                    <label for="Address2"> Address 1</label>
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
