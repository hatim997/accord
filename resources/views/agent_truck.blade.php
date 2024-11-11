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
  .disabled-link {
      color: gray;
      pointer-events: none;
      cursor: not-allowed;
      text-decoration: none;
  }
  .card .table{
    text-align: center;
  }

  .custom-button {
      display: inline-flex;
      align-items: center;
      padding: 10px 15px;
      border-radius: 30px;
      color: black !important;
      font-weight: bold;
      text-decoration: none;
      transition: background-color 0.3s, transform 0.2s;
      border: none;
      font-size: 16px;
      position: relative;
  }

  .custom-name {
      color: black !important;
      font-weight: bold;
      text-decoration: none;
      border: none;
      font-size: 16px;

  }

  .btn-primary {
background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);
border: none !important;
border-radius: 10px !important;
color: white;
font-weight: bold; /* Bold text */
}

input, textarea, button {
padding: 10px 15px;
border-radius: 5px;
margin: 10px 0; /* Space between fields */
box-sizing: border-box;
border: 1px solid #ccc;
font-size: 16px; /* Slightly smaller font */
transition: border-color 0.3s;
}
.form-heading{
font-weight: bold !important;
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
        <div class="modal-content container">

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







    <div class="row  justify-content-center mb-4">

      <div class="col-md-10 col-lg-10">
        <div class="card-header d-flex justify-content-between align-items-center mb-3">
          <div class="d-flex justify-content-center align-items-center ">
            <div class="text-center">
                <h4 class="mb-0 py-4  fw-bold">Agent-Trucker List</h4>
            </div>
        </div>

          <div >
              <button type="button" id="saveButton" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter"> + ADD</button>
          </div>
      </div>

          <div class="row gy-4">




              <div class="col-12">
                  <div class="card">
                      <div class="table-responsive">
                          <table class="table " id="contact-list">
                              <thead>
                                  <tr style="background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);">
                                    <th>Agent Name</th>
                                      <th>Trucker Name</th>

                                  </tr>
                              </thead>
                              <tbody class="table-border-bottom-0 ">
                                @foreach ($agent_trucker as $at)
                                      <tr>

                                          <td>
                                              <a  target="blank" class="custom-button eye-c">
                                                {{$at->agent->name}}
                                              </a>
                                          </td>
                                          <td>
                                            <a  target="blank" class="custom-button eye-c">
                                              {{$at->driver->name}}
                                            </a>
                                        </td>

                                      </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <!--/ Data Tables -->
          </div>
      </div>
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
