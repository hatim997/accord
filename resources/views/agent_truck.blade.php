@php
$isMenu = false;
$navbarHideToggle = false;
@endphp
@extends('layouts/contentNavbarLayout')
@section('title', ' Vertical Layouts - Forms')
@push('body-style')
<link rel="stylesheet" href="{{ asset('assets/css/datatable.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/datatables-Cl.css') }}" />
<style>
thead, tbody, tfoot, tr, td, th {
    /* border-style: hidden !important; */
  }
.focus {
  border-radius: 7px;
  background-color: #f1f1f1; /* Highlight color */
  border: 1px solid #add5ff; /* Optional: Add a border */
}
</style>
@endpush
@section('content')




<div class="row">
    <!---------------------------------------------------------------------------------------------------------------------------
      --------------------------------------------------------------- PRODUCER  ---------------------------------------------------
      ----------------------------------------------------------------------->
  <div class="col-xl">


  <!------------------------------------------------------------------------------------------------------------
      ---------------------------------------------------------------------------------------------------------------
      -------------------------------------------- add Form  start----------------------------------------------------
    ----------------------------------------------------------------------------------------------------------------
    --------------------------------------------------------------------------------------------------------------->




    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

          <form id="AddForm">

        <!-- Basic Layout -->

          <div class="modal-header">
            <h4 class="modal-title" id="modalCenterTitle">Connect Agent Driver </h4>

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">




        <div class="row">

          <div class="col-6">
          <div class="form-floating form-floating-outline mb-4">
            <select name="agent_id" id="agent_id" class="form-control">
                <option value="">-Select Agent-</option>
                @foreach ($agents as $agent)
                  <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="col-6">
      <div class="form-floating form-floating-outline mb-4">
        <select name="driver_id" id="driver_id" class="form-control">
          <option value="">-Select Driver-</option>
          @foreach ($drivers as $driver)
            <option value="{{ $driver->id }}">{{ $driver->name }}</option>
          @endforeach
      </select>
    </div>
</div>

</div>


      {{-- card end --}}
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" id="saveButton" class="btn btn-primary">Save changes</button>
  </div>
</form>
</div>
</div>
</div>


    <!------------------------------------------------------------------------------------------------------------
      ---------------------------------------------------------------------------------------------------------------
      -------------------------------------------- EDit Form  start----------------------------------------------------
    ----------------------------------------------------------------------------------------------------------------
    --------------------------------------------------------------------------------------------------------------->



<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">

      <form id="editForm">

    <!-- Basic Layout -->

      <div class="modal-header">
        <h4 class="modal-title" id="modalCenterTitle">Edit USER</h4>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-6">
        <div class="form-floating form-floating-outline mb-4">
          <input type="text" class="form-control" name="name" id="name" placeholder="ACME Inc." />
          <label for="username1"> NAME</label>
        </div>
      </div>
        <div class="col-6">
        <div class="form-floating form-floating-outline mb-4">
          <input type="text" class="form-control"name="price" id="price" placeholder="example.com" required />
          <label for="email1">PRICE</label>
      </div>
  </div>

  <input type="hidden" class="form-control"name="id" id="id" placeholder="Address line1" />
  <div class="col-6">
    <div class="form-floating form-floating-outline mb-4">
      <input type="text" class="form-control"name="duration" id="duration" placeholder="Address line1" />
      <label for="altemail1">DURATION </label>
  </div>
</div>
<div class="col-6">
<div class="form-floating form-floating-outline mb-4">
  <input type="text" class="form-control"name="exdetail" id="exdetail" placeholder="Address line1" />
  <label for="phone1">EXTRA DETAILS</label>
</div>
</div>
      <div class="col-6">
      <div class="form-floating form-floating-outline mb-4">
          <textarea type="text" class="form-control" name="description" id="description"  placeholder="********" >
          </textarea>
          <label for="password1">DESCRIPTION</label>
      </div>
  </div>



  <button type="button" id="updateButton"class="btn btn-primary">Save changes</button>
    </div>


  </div>


  {{-- card end --}}
</div>

</form>
</div>
</div>
</div>

  <!------------------------------------------------------------------------------------------------------------
      ---------------------------------------------------------------------------------------------------------------
      -------------------------------------------- EDit Form  ends----------------------------------------------------
    ----------------------------------------------------------------------------------------------------------------
    --------------------------------------------------------------------------------------------------------------->





    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Agent-Trucker List </h5>
        <div class=" d-flex justify-content-right align-items-center demo-inline-spacing">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
         + ADD
          </button>
      </div>
    </div>

      <div class="table-responsive text-nowrap">
        <table class="table dataTable collapsed chat-contact-list" id="contact-list" style="width: 1193px;">
         <thead class="table-light">
            <tr>
              <th class="">Agent Name</th>
              <th class="">Trucker Name</th>
            </tr>
          </thead>
          <tbody>
             @foreach ($agent_trucker as $at)
             <tr class="parent">

              <td>
                <div class="d-flex align-items-center">
                  <div>
                    <h6 class="mb-0 "> {{$at->agent->name}}</h6>
                  </div>
                </div>
              </td>
              <td>
                <div class="d-flex align-items-center">
                  <div>
                    <h6 class="mb-0 "> {{$at->driver->name}}</h6>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <!--/ Striped Rows -->
  </div>
</div>
@endsection

@section('page-scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$('#saveButton').click(function(e) {

  var form = document.getElementById('AddForm');
      var formData = new FormData(form);
  $.ajax({
    url: '{{route("add_agent_driver")}}',
    type: 'post',
    data: formData,
    contentType: false,
    processData: false,  // Important! Don't process the data
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {
        // Check if response contains the expected message
        if (response && response.message !== undefined) {
            alert(response.message);
            // Additional logic after a successful save
            location.reload();
            $('#modalCenter').modal('hide');
        }
        else{
          console.log(response.error);
        }
    },
    error: function(error) {
        console.error('Error saving data:', error);
    }
  });
  $('#modalCenter').modal('hide');
});
</script>

@endsection
