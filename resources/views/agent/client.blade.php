@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp
@extends('layouts/contentNavbarLayout')
@section('title', ' Certificate Form')
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
.temp:hover{
                background-color: #f5f6fa;  
              }
      

</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
@endpush

@section('content')
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
    <div  class="container-xxl flex-grow-1 container-p-y">
        <div class="app-chat card overflow-hidden">
            <div class="row g-0">
    <div class="col app-chat-contacts app-sidebar flex-grow-0 overflow-hidden " id="app-chat-contacts">
        <div class="sidebar-header h-px-75 px-5 border-bottom d-flex align-items-center">
          <div class="d-flex align-items-center me-4 me-lg-0">
            
            <h5 class="text-primary mb-0">Client</h5>
          </div>
        </div>
        <div class="sidebar-body ps ps--active-y">
  
         
          <!-- Contacts -->
          <ul class="list-unstyled chat-contact-list py-2" id="contact-list">
            
            <li class="chat-contact-list-item contact-list-item-0 d-none">
              <h6 class="text-muted mb-0">No Contacts Found</h6>
            </li>
         
            @foreach ($driver as $data)
            <li class="chat-contact-list-item "  >
              <a class=" align-items-center chat-contact-list-itemm temp "   id="{{ $data->driver_id }}">               
                <div class="chat-contact-info flex-grow-1 ms-4"> 
                <div class="d-flex justify-content-between"> <h6 class="chat-contact-name text-truncate fw-normal m-0">{{ $data->name }}</h6> 
                
              </button>  </div>
                  <small class="chat-contact-status text-truncate ">{{ str_replace('_', ' ', $data->role) }}</small>
                </div>
              </a>
              <button class="btn primary temp" type="button"  data-toggle="modal" data-target="#exampleModal" id="btn" 
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
              data-zip="{{ $data->zip }}" style="    margin: 0;
    padding: 0px 0px;" >
             
                <i class="mdi mdi-eye eye temp" style="    margin: 0;
    padding: .6rem .6rem;"></i> 
            </button>
            </li> 
            <li>
              <hr class="dropdown-divider" style="border:0px; border-top:1px solid;">
            </li>
            @endforeach       
          </ul>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 434px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 182px;">
       
        </div>
        </div>

      
      </div>
    </div>

    <div class="col app-chat-history  overflow-hidden" id="app-chat-contacts">
      <div class="chat-history-wrapper">
       <br>
      </div>
 
      <div class="sidebar-body" style="height: 70vh;overflow: auto;">

          <table class="table dataTable collapsed chat-contact-list" id="contact-list" style="width: 1193px;">
            <thead>
              <tr class="border-bottom">              
                <th class=" rowspan="1" colspan="1"
                  style="width: 18px;" data-col="1" aria-label=""></th>
                <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 20px;"
                  aria-label="order: activate to sort column ascending">Certificate ID</th>
                <th class=" " tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                  style="width: 134px;" aria-label="date: activate to sort column descending" aria-sort="ascending">Download</th>              
                <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                  style="width: 101px;" aria-label="payment: activate to sort column ascending">View Certificate</th>
                <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                  style="width: 118px;" aria-label="status: activate to sort column ascending">Edit Certificate</th>
                  <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                  style="width: 267px;" aria-label="customers: activate to sort column ascending">Add Certificate</th>
                <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                  style="width: 147px;" aria-label="method: activate to sort column ascending">status</th>
          
              </tr>
            </thead>
           
            <tbody class="tbody">
              {{-- <tr class="odd parent">
              
                <td class="dt-checkboxes-cell"> <i style="font-size: 30px;    color: #252458;}" class="mdi mdi-chevron-down"></i> </td>
                <td><a
                    href="#"><span>#6979</span></a>
                </td>
                <td class="sorting_1"><i class="mdi mdi-download"></i></td>
                <td>
                  <div class="d-flex justify-content-start align-items-center user-name">
                   
                    <div class="d-flex flex-column"><a
                        href="#"
                        class="text-truncate text-heading"><span class="fw-medium">Cristine Easom</span></a><small
                        class="text-truncate">ceasomw@theguardian.com</small></div>
                  </div>
                </td>
                <td>
                  <h6 class="mb-0 w-px-100 d-flex align-items-center" ><i class="mdi mdi-eye"></i>
                    </h6>
                </td>
              
                <td>
                  <div class="d-flex align-items-center text-nowrap"><i class="mdi mdi-pencil-box"></i>
                  </div>
                </td>

                <td><span class="badge px-2 rounded-pill bg-label-success" text-capitalized="">Delivered</span></td>
                <td class="dtr-hidden" style="display: none;">
                  <div><button
                      class="btn btn-sm btn-icon btn-text-secondary text-body waves-effect rounded-pill dropdown-toggle hide-arrow"
                      data-bs-toggle="dropdown"><i class="ri-more-2-line"></i></button>
                    <div class="dropdown-menu dropdown-menu-end m-0"><a
                        href=" https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-1/app/ecommerce/order/details"
                        class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item delete-record">Delete</a>
                    </div>
                  </div>
                </td>
              </tr> --}}

            </tbody>
                       
                     
          </table>    
        </div>
   
   


 



    
      </div>

    </div>
</div>
</div>

      @endsection

      @section('page-scriptt')
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    
<script>
      function toggleDropdown(id) {
    $(`#dropdown-${id}`).toggle();
}




  $(document).ready(function() {



      // When any chat-contact-list-item is clicked
      $('.chat-contact-list-itemm').click(function() {


        $('.chat-contact-list-itemm').removeClass('focus'); // Remove focus from other items
      $(this).addClass('focus'); // Add focus to the clicked item
 


        function generatePolicyTable(policies) {
    let policyRows = '';
    let groupedPolicies = {};

    // Group policies by policy_type_id
    $.each(policies, function(index, policy) {
        if (!groupedPolicies[policy.policy_type_id]) {
            groupedPolicies[policy.policy_type_id] = {
                type_name: policy.policy_type.type_name,
                policies: []
            };
        }
        groupedPolicies[policy.policy_type_id].policies.push(policy);
    });

    // Create table rows for the dropdown
    $.each(groupedPolicies, function(typeId, group) {
        const firstPolicy = group.policies[0]; // Only display the first policy's details
        policyRows += `<tr>
            <td>${typeId}</td>
            <td>${group.type_name}</td>
            <td>${firstPolicy.policy_number}</td>
            <td>${firstPolicy.start_date}</td>
            <td>${firstPolicy.expiry_date}</td>
        </tr>`;
    });

    return policyRows;
}




          // Get the ID from the clicked list item
          var id = $(this).attr('id');

          // Perform AJAX request
         $.ajax({
    url: 'get-certf/' + id,  // Define your Laravel route here
    type: 'GET',
    success: function(response) {
    console.log(response);
    $('.tbody').empty();
    if (response.length==0) {
         var newRow = `<div class="d-flex align-items-center text-nowrap"><a target="_blank" href="cert_1st_step/ ${id}"><i class="mdi mdi-plus-box"></i>Add Certificate </a></div> `;
      $('.tbody').append(newRow);
}
    // Loop through each data item in the response
    $.each(response, function(index, data) {
        // Create a new row with the data
        // alert(data.certificate_policies);


        var newRow = `      
            <tr class="odd parent" style="border-bottom:1px solid #cdc9d1;">              
                <td class="dt-checkboxes-cell"> 
                    <i style="font-size: 30px; color: #252458;" class="mdi mdi-chevron-down" onclick="toggleDropdown(${data.id})"></i>
                </td>
                <td><span>#${data.id}</span></td>
                <td class="sorting_1"><a target="_blank" href="get_pdf/${data.id}"><i class="mdi mdi-download"></i></a></td>
                <td>
                    <h6 class="mb-0 w-px-100 d-flex align-items-center"><a target="_blank" href="view_cert/${data.id}"><i class="mdi mdi-eye"></i></a></h6>
                </td>
                <td>
                    <div class="d-flex align-items-center text-nowrap"><a target="_blank" href="edit_cert/${data.id}"><i class="mdi mdi-pencil-box"></i></a></div>
                </td>
                <td>
                    <div class="d-flex align-items-center text-nowrap"><a target="_blank" href="cert_1st_step/${data.client_user_id}"><i class="mdi mdi-plus-box"></i></a></div>
                </td>
                <td>    <span class="badge px-2 rounded-pill ${        data.status === "0" ? 'bg-label-danger' : 'bg-label-success'
    }" text-capitalized="">        ${data.status === "0" ? 'Inactive' : 'Active'}    </span></td>
            </tr>
            <tr id="dropdown-${data.id}" class="dropdown-content" style="display: none;">
                <td colspan="7">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Policy Type ID</th>
                                <th>Policy Type Name</th>
                                <th>Policy Number</th>
                                <th>Start Date</th>
                                <th>Expiry Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            ${generatePolicyTable(data.certificate_policies)}
                        </tbody>
                    </table>
                </td>
            </tr>
        `;

        // Append the new row to the table body
        $('.tbody').append(newRow);
    });
}

// Function to generate the policy table

});


// Function to toggle the dropdown
// Function to generate the policy table


      });
      
  });
</script>
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
  @endsection
