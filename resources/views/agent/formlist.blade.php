@php
    $isMenu = false;
    $navbarHideToggle = false;
 
@endphp
@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')
@push('body-style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
@endpush
@section('content')

    <div class="row gy-4">
        <!-- Data Tables -->
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">

                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th class="text-truncate">Name</th>
                                <th class="text-truncate">Role</th>
                                <th class="text-truncate">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- {{ dd($driver) }} --}}
                            @foreach ($driver as $data)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="btn" 
                                                data-driver_id="{{ $data->driver_id }}" data-user_name="{{ $data->user_name }}" 
                                                 data-company_name="{{ $data->name }}"                                             
                                                data-cell_number="{{ $data->cellphone }}"
                                                data-address="{{ $data->address }}"
                                                data-address2="{{ $data->address2 }}"
                                                data-email="{{ $data->email }}"
                                                data-mc_number="{{ $data->mc_number }}"
                                                data-usdot_number="{{ $data->usdot }}"
                                                data-state="{{ $data->state }}"
                                                data-city="{{ $data->city }}"
                                                data-zip="{{ $data->zip }}">
                                                {{ $data->user_name }}
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="btn btn-success">{{ str_replace('_', ' ', $data->role) }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('main_cert', $data->driver_id) }}"
                                                class="btn btn-primary">{{ $data->name }}</a>
                                        </div>
                                    </td>

                                </tr>  
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ Data Tables -->

        <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Driver Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm" method="POST" action="{{ route('update_driver') }}">
                            @csrf
                            <input type="hidden" name="driver_id" id="modalDriverId">
                           <div class="row">
                            <div class="col-md-6">
                            <div class="form-group pb-3">
                                <label for="userName">Company Name:</label>
                                <input type="text" class="form-control" id="modalCompanyName" name="user_name" value="" readonly>
                            </div>
                            <div class="form-group pb-3">
                                <label for="userName">USDOT#</label>
                                <input type="text" class="form-control" id="modalUsdotNumber" name="user_name" value="" readonly>
                            </div>
                            <div class="form-group pb-3">
                                <label for="userName">Email:</label>
                                <input type="text" class="form-control" id="modalEmail" name="user_name" value="" readonly>
                            </div>
                            <div class="form-group pb-4">
                                <label for="userName">Address:</label>
                                <input type="text" class="form-control" id="modalAddress" name="user_name" value="" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group pb-3">
                                <label for="userName">User Name:</label>
                                <input type="text" class="form-control" id="modalUserName" name="user_name" value="" readonly>
                            </div>
                            <div class="form-group pb-3">
                                <label for="userName">Federal Registration No. (MC Number):</label>
                                <input type="text" class="form-control" id="modalMcNumber" name="user_name" value="" readonly>
                            </div>
                            <div class="form-group pb-3">
                                <label for="userName">Phone No:</label>
                                <input type="text" class="form-control" id="modalCellNumber" name="user_name" value="" readonly>
                            </div>
                            <div class="form-group pb-4">
                                <label for="userName">Address 2:</label>
                                <input type="text" class="form-control" id="modalAddress2" name="user_name" value="" readonly>
                            </div>

                        </div></div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group pb-3">
                                <label for="userName">Zip Code:</label>
                                <input type="text" class="form-control" id="zip" name="user_name" value="" readonly>
                            </div>
                            <div class="form-group pb-3">
                                <label for="userName">City:</label>
                                <input type="text" class="form-control" id="city" name="user_name" value="" readonly>
                            </div>                          
                        </div>
                        <div class="col-md-6">
                            <div class="form-group pb-3">
                                <label for="userName">State:</label>
                                <input type="text" class="form-control" id="state" name="user_name" value="" readonly >
                            </div>
                             
                            
                            <div class="form-group pb-3">
                                <label for="userName">No. Of Trucks:</label>
                                <input type="text" class="form-control" id="modalContent" name="modalContent" value="" readonly>
                            </div>
                           

                        </div></div>



                            <!-- Add more form fields as needed -->
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                {{-- <button type="submit" class="btn btn-primary">Save changes</button> --}}
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

        @push('body-scripts')



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>   $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var driverId = button.data('driver_id'); // Extract info from data-* attributes
            var userName = button.data('user_name');
            var companyName = button.data('company_name');
            var cellNumber = button.data('cell_number');
            var address = button.data('address');
            var address2 = button.data('address2');
            var email = button.data('email');
            var mcNumber = button.data('mc_number');
            var usdotNumber = button.data('usdot_number');
            var zip = button.data('zip');
            var state = button.data('state');
            var city = button.data('city');
           
            // Update the modal's content
            var modal = $(this);
            modal.find('#modalUserName').val(userName);
            modal.find('#modalDriverId').val(driverId);
            modal.find('#modalCompanyName').val(companyName);    
            modal.find('#modalCellNumber').val(cellNumber);
            modal.find('#modalAddress').val(address);
            modal.find('#modalAddress2').val(address2);
            modal.find('#modalEmail').val(email);
            modal.find('#modalMcNumber').val(mcNumber);
            modal.find('#modalUsdotNumber').val(usdotNumber);
            modal.find('#zip').val(zip);
            modal.find('#state').val(state);
            modal.find('#city').val(city);
            // modal.find('#modalCertLink').attr('href', '/route-to-certificate/' + driverId); // Update link href
            var userId = button.data('driver_id');
     
     // Use AJAX or fetch to get the data from the server (assuming you have an endpoint)
     $.ajax({
         url: 'get-driver/' + userId, // Replace with your route
         method: 'GET',
         success: function(response) {
             // Assuming `response` contains the data you want to display
             modal.find('#modalContent').val(response); // Update the modal content
             // $('#dataModal').show(); // Show the modal
             

         }
     });
    
    
        });
     
   
      
     
  



        </script> 
        @endpush
    </div>
@endsection
