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
        thead,
        tbody,
        tfoot,
        tr,
        td,
        th {
            /* border-style: hidden !important; */
        }

        .focus {
            border-radius: 7px;
            background-color: #f1f1f1;
            /* Highlight color */
            border: 1px solid #add5ff;
            /* Optional: Add a border */
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
                                <h4 class="modal-title" id="modalCenterTitle">ADD PLAN </h4>

                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">




                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline mb-4">
                                            <select class="form-select" id="roleSelect" name="role" required="">
                                                <option value="">Select Role</option>
                                                <option value="freight_driver">Broker</option>
                                                <option value="shipper">Shipper</option>
                                                <option value="agent">Agent</option>
                                                <option value="truck_driver">Carrier</option>
                                            </select>
                                            <label for="roleSelect">Select Role</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating form-floating-outline mb-4">
                                            <input type="text" class="form-control" name="name" id="username"
                                                placeholder="ACME Inc." />
                                            <label for="username1"> NAME</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating form-floating-outline mb-4">
                                            <input type="text" class="form-control"name="price" id="email1"
                                                placeholder="example.com" required />
                                            <label for="email1">PRICE</label>
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-floating form-floating-outline mb-4">
                                            <input type="text" class="form-control"name="duration" id="altemail1"
                                                placeholder="Address line1" />
                                            <label for="altemail1">DURATION </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating form-floating-outline mb-4">
                                            <input type="text" class="form-control"name="exdetail" id="phone1"
                                                placeholder="Address line1" />
                                            <label for="phone1">EXTRA DETAILS</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating form-floating-outline mb-4">
                                            <textarea type="text" class="form-control" name="description" id="password" placeholder="********"></textarea>
                                            <label for="password1">DESCRIPTION</label>
                                        </div>
                                    </div>
                                </div>


                                {{-- card end --}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary"
                                    data-bs-dismiss="modal">Close</button>
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

                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-4">
                                        <select class="form-select" id="role" name="role" required="">
                                            <option value="">Select Role</option>
                                            <option value="freight_driver">Broker</option>
                                            <option value="shipper">Shipper</option>
                                            <option value="agent">Agent</option>
                                            <option value="truck_driver">Carrier</option>
                                        </select>
                                        <label for="roleSelect">Select Role</label>
                                    </div>
                                </div>
                                    <div class="col-6">
                                        <div class="form-floating form-floating-outline mb-4">
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="ACME Inc." />
                                            <label for="username1"> NAME</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating form-floating-outline mb-4">
                                            <input type="text" class="form-control"name="price" id="price"
                                                placeholder="example.com" required />
                                            <label for="email1">PRICE</label>
                                        </div>
                                    </div>

                                    <input type="hidden" class="form-control"name="id" id="id"
                                        placeholder="Address line1" />
                                    <div class="col-6">
                                        <div class="form-floating form-floating-outline mb-4">
                                            <input type="text" class="form-control"name="duration" id="duration"
                                                placeholder="Address line1" />
                                            <label for="altemail1">DURATION </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating form-floating-outline mb-4">
                                            <input type="text" class="form-control"name="exdetail" id="exdetail"
                                                placeholder="Address line1" />
                                            <label for="phone1">EXTRA DETAILS</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating form-floating-outline mb-4">
                                            <textarea type="text" class="form-control" name="description" id="description" placeholder="********">
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
                <h5 class="mb-0">Plans List </h5>
                <div class=" d-flex justify-content-right align-items-center demo-inline-spacing">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                        + ADD
                    </button>

                </div>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table dataTable collapsed chat-contact-list" id="contact-list">
                    <thead class="table-light">
                        <tr>
                            <th class="">Role</th>
                            <th class="">name</th>
                            <th class="">duration</th>
                            <th class="">price</th>
                            <th class="">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sub as $subs)
                            <tr class="parent">
                                <td>{{ $subs->role }}</td>
                                <td>
                                    <div class="d-flex align-items-center">

                                        <div>
                                            <h6 class="mb-0 "> {{ $subs->name }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="">{{ $subs->price }}</td>
                                <td class="">{{ $subs->duration }}</td>

                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" onclick="openEditModal({{ $subs }})"><i
                                                    class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                            {{-- <a class="dropdown-item" href="javascript:void(0);"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a> --}}
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

    <script>
        function openEditModal(data) {
            // Parse the JSON-encoded data
            // console.log(data);
            var parsedData = typeof data === 'object' ? data : JSON.parse(data);
            var id = parsedData.id;
            var exdetail = parsedData.exdetail;
            var role = parsedData.role;
            var name = parsedData.name;
            var price = parsedData.price;
            var duration = parsedData.duration;
            var description = parsedData.description;
            console.log("Role value:", role);
            $('#id').val(id);
            $('#exdetail').val(exdetail);
            $('#role').val(role).change();
            $('#name').val(name);
            $('#price').val(price);
            $('#duration').val(duration);
            $('#description').val(description);

            // Show the edit modal
            $('#editModal').modal('show');
        }

        function editData() {
            // Logic to edit data using AJAX or form submission
            // ...

            // Close the modal
            $('#editModal').modal('hide');
        }


        //   $('#saveButton').click(function() {
        //     var form = document.getElementById('myForm');
        //         var formData = new FormData(form);

        //         alert(formData);
        //     // $.ajax({
        //     //     url: '/save-data',
        //     //     type: 'POST',
        //     //     data: formData,
        //     //     success: function(response) {
        //     //         alert(response.message); // Show success message
        //     //         // Additional logic after successful save
        //     //     },
        //     //     error: function(error) {
        //     //         console.error('Error saving data:', error);
        //     //     }
        //     // });
        // });
    </script>

@endsection

@section('page-scripts')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $('#saveButton').click(function(e) {

            var form = document.getElementById('AddForm');
            var formData = new FormData(form);



            // Display the string in an alert

            // alert(formData);
            //  console.log(formData);

            $.ajax({
                url: '{{ route('add_sub') }}',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false, // Important! Don't process the data
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
                    } else {
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
    <script>
        $('#updateButton').click(function(e) {

            var form = document.getElementById('editForm');
            var formData = new FormData(form);



            // Display the string in an alert

            // alert(formData);
            //  console.log(formData);
            var id = formData.get('id');
            var url = '{{ route('edit_sub', ':id') }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'post',
                data: formData,
                contentType: false,
                processData: false, // Important! Don't process the data
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
                    } else {
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
