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
      -------------------------------------------- add Form  start----------------------------------------------------
    ----------------------------------------------------------------------------------------------------------------
    --------------------------------------------------------------------------------------------------------------->




    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

          <form id="AddForm">
        
        <!-- Basic Layout -->
   
          <div class="modal-header">
            <h4 class="modal-title" id="modalCenterTitle">ADD USER </h4>

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
   

    
     
        <div class="row">
            <div class="col-6">
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control" name="username" id="username" placeholder="ACME Inc." />
            <label for="username1">USERNAME</label>
          </div>
        </div>
          <div class="col-6">
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control"name="email" id="email1" placeholder="example.com" required />
            <label for="email1">EMAIL</label>
        </div>
    </div>


    <div class="col-6">
      <div class="form-floating form-floating-outline mb-4">
        <input type="text" class="form-control"name="altemail" id="altemail1" placeholder="Address line1" />
        <label for="altemail1">ALT EMAIL</label>
    </div>
</div> 
 <div class="col-6">
  <div class="form-floating form-floating-outline mb-4">
    <input type="text" class="form-control"name="phone" id="phone1" placeholder="Address line1" />
    <label for="phone1">CONTACT #</label>
</div>
</div>
        <div class="col-6">
        <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control" name="password1" id="password"  placeholder="********" />
            <label for="password1">PASSWORD</label>
        </div>
    </div> 
          <div class="col-6">
          <div class="mb-4">           
            <div class="form-floating form-floating-outline mb-4">
                <select class="form-select" name="role" id="role_id1" aria-label="Default select example">
                <option selected>Open this select  menu</option>
                  <option value="admin">ADMIN</option>
                  <option value="agent">AGENT</option>
                  <option value="truck_driver">TRUCK</option>
                  <option value="shipper">SHIPPER</option>     
                  <option value="freight_driver">FREIGHT</option>                  
                </select>
                <label for="role_id1">ROLE OF USER</label>
              </div>           
          </div>
        </div>
        <div class="col-6">
        
        <div class="form-floating form-floating-outline mb-4">
          <input type="text" class="form-control" name="fullname" id="fullname1" placeholder="ACME Inc." />
          <label for="fullname1"> Name</label>
        </div>
      </div>
        <div class="col-6">
        <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control" name="Addss"id="Addss1"  placeholder="" />
            <label for="Addss1"> Address 1</label>
        </div>
    </div> 
          <div class="col-6">
            <div class="form-floating form-floating-outline mb-4">
              <input type="text" class="form-control" name="Addss2"id="Address21"  placeholder="" />
              <label for="Address21"> Address 1</label>
          </div>
        </div>
        <div class="col-6">
          <div class="form-floating form-floating-outline mb-4">
              <input type="text" class="form-control" name="state"id="state1"  placeholder="" />
              <label for="state1">state</label>
          </div>
      </div> 
            <div class="col-6">
              <div class="form-floating form-floating-outline mb-4">
                <input type="text" class="form-control" name="country"id="country1"  placeholder="" />
                <label for="country1"> country</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating form-floating-outline mb-4">
                <input type="text" class="form-control" name="city"id="city1"  placeholder="" />
                <label for="city1"> city</label>
            </div>
        </div> 
              <div class="col-6">
                <div class="form-floating form-floating-outline mb-4">
                  <input type="text" class="form-control" name="zip"id="zip1"  placeholder="" />
                  <label for="zip1"> zip</label>
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
        <input type="text" class="form-control" name="username" id="username" placeholder="ACME Inc." />
        <label for="username">USERNAME</label>
      </div>
    </div>  <input type="hidden" class="form-control" name="id" id="id" />
      <div class="col-6">
      <div class="form-floating form-floating-outline mb-4">
        <input type="text" class="form-control"name="email" id="email" placeholder="Address line1" />
        <label for="email">EMAIL</label>
    </div>
</div>
<div class="col-6">
  <div class="form-floating form-floating-outline mb-4">
    <input type="text" class="form-control"name="altemail" id="altemail" placeholder="Address line1" />
    <label for="altemail">ALT EMAIL</label>
</div>
</div> 
<div class="col-6">
<div class="form-floating form-floating-outline mb-4">
<input type="text" class="form-control"name="phone" id="phone" placeholder="Address line1" />
<label for="phone">CONTACT #</label>
</div>
</div>
    <div class="col-6">
    <div class="form-floating form-floating-outline mb-4">
        <input type="text" class="form-control" name="password" id="password"  placeholder="********" />
        <label for="password">PASSWORD</label>
    </div>
</div> 
      <div class="col-6">
      <div class="mb-4">           
        <div class="form-floating form-floating-outline mb-4">
            <select class="form-select" name="role" id="role_id" aria-label="Default select example">
              <option selected>Open this select  menu</option>
              <option value="admin">ADMIN</option>
              <option value="agent">AGENT</option>
              <option value="truck_driver">TRUCK</option>
              <option value="shipper">SHIPPER</option>     
              <option value="freight_driver">FREIGHT</option>                  
            </select>
            <label for="role_id">ROLE OF USER</label>
          </div>           
      </div>
    </div>
    <div class="col-6">
      <input type="hidden" class="form-control" name="id" id="id" />
    <div class="form-floating form-floating-outline mb-4">
      <input type="text" class="form-control" name="fullname" id="fulldname" placeholder="ACME Inc." />
      <label for="fulldname"> Name</label>
    </div>
  </div>
    <div class="col-6">
    <div class="form-floating form-floating-outline mb-4">
        <input type="text" class="form-control" name="Adddress"id="Adddress"  placeholder="" />
        <label for="Adddress"> Address 1</label>
    </div>
</div> 
      <div class="col-6">
        <div class="form-floating form-floating-outline mb-4">
          <input type="text" class="form-control" name="Address2"id="Address2"  placeholder="" />
          <label for="Address2"> Address 1</label>
      </div>
    </div>
    <div class="col-6">
      <div class="form-floating form-floating-outline mb-4">
          <input type="text" class="form-control" name="state"id="state"  placeholder="" />
          <label for="state">state</label>
      </div>
  </div> 
        <div class="col-6">
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control" name="country"id="country"  placeholder="" />
            <label for="country"> country</label>
        </div>
      </div>
      <div class="col-6">
        <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control" name="city"id="city"  placeholder="" />
            <label for="city"> city</label>
        </div>
    </div> 
          <div class="col-6">
            <div class="form-floating form-floating-outline mb-4">
              <input type="text" class="form-control" name="zip"id="zip"  placeholder="" />
              <label for="zip"> zip</label>
          </div>
        </div>
           
    
  </div>


  {{-- card end --}}
</div>
<div class="modal-footer">
<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Save changes</button>
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
        <h5 class="mb-0">user list </h5> 
        <div class=" d-flex justify-content-right align-items-center demo-inline-spacing">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
         + ADD 
          </button>          
            <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0);">Another action</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>
                  </ul>
            </div>
      </div>
    </div>

    {{-- @foreach ($users as $user) 
      @foreach($user->freights as $fr)
        {{dd($fr->freight_address)}}
      @endforeach
    @endforeach --}}


      <div class="table-responsive text-nowrap">
        <table class="table table-striped">
         <thead class="table-light">
            <tr>
              <th class="">User</th>
              <th class="">Email</th>
              <th class="">Role</th>
              <th class="">Status</th>
              <th class="">Actions</th>
             
            </tr>
          </thead>
          <tbody> 
             @foreach ($users as $user) 



             @if($user->role_id=="agent")
             @foreach($user->agencies as $ag)
             {{$ag->agency_address}}         
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-sm me-3">
                    <img src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle">
                  </div>
                  <div>
                    <h6 class="mb-0 ">@ {{$user->username}}</h6> 
                </div>   
                </div>              
              </td>
              <td class="">{{$user->email}}</td>        
              <td class=""><i class="mdi mdi-account-outline mdi-24px text-primary me-1"></i>{{$user->role_id}}</td>              
              <td>              <span class="badge bg-label-success rounded-pill">Active</span>            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                <div class="dropdown-menu">                
                  <a class="dropdown-item" onclick="openEditModal({{ $user }})"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                  <a class="dropdown-item" href="javascript:void(0);"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                </div>
              </div>
            </td>
            </tr>
            @endforeach      









            @elseif($user->role_id=='truker')
            @foreach($user->truckers as $fr)
            
       
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-sm me-3">
                    <img src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle">
                  </div>
                  <div>
                    <h6 class="mb-0 ">@ {{$user->username}}</h6>
              
                  </div>
                </div>
              
              </td>
              <td class="">{{$user->email}}</td>

                      <td class=""><i class="mdi mdi-account-outline mdi-24px text-primary me-1"></i>{{$user->role_id}}</td>
                      <td>
              <span class="badge bg-label-success rounded-pill">Active</span>
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                <div class="dropdown-menu">                
                  <a class="dropdown-item" onclick="openEditModal({{ $user }})"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                  <a class="dropdown-item" href="javascript:void(0);"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                </div>
              </div>
            </td>
            </tr>
            @endforeach











            @elseif($user->role_id=='shipper')
            
            @foreach($user->shippers as $fr)
            {{$fr->shipper_address}}
         
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-sm me-3">
                    <img src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle">
                  </div>
                  <div>
                    <h6 class="mb-0 ">@ {{$user->username}}</h6>                  
                  </div>
                </div>              
              </td>
              <td class="">{{$user->email}}</td>   
            <td class=""><i class="mdi mdi-account-outline mdi-24px text-primary me-1"></i>{{$user->role_id}}</td>                
              <td>              <span class="badge bg-label-success rounded-pill">Active</span>            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                <div class="dropdown-menu">                
                  <a class="dropdown-item" onclick="openEditModal({{ $user }})"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                  <a class="dropdown-item" href="javascript:void(0);"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                </div>
              </div>
            </td>
            </tr>
            @endforeach





















            @elseif($user->role_id=='freight')
            
            @foreach($user->freights as $fr)
            {{$fr->freight_address}}
       
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-sm me-3">
                    <img src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle">
                  </div>
                  <div>
                    <h6 class="mb-0 ">@ {{$user->username}}</h6>
                    {{-- <small class="">@amiccoo</small> --}}
                  </div>
                </div>
              
              </td>
              <td class="">{{$user->email}}</td>
                      <td class=""><i class="mdi mdi-account-outline mdi-24px text-primary me-1"></i>{{$user->role_id}}</td>
<td>              <span class="badge bg-label-success rounded-pill">Active</span>            </td>
            <td>  <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                <div class="dropdown-menu">                
                  <a class="dropdown-item" onclick="openEditModal({{ $user }})"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                  <a class="dropdown-item" href="javascript:void(0);"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                </div>
              </div>
            </td>
            </tr>
            @endforeach

            @elseif($user->role_id=='admin')
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-sm me-3">
                    <img src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle">
                  </div>
                  <div>
                    <h6 class="mb-0 ">@ {{$user->username}}</h6>
          
                  </div>
                </div>              
              </td>
              <td class="">{{$user->email}}</td>    
              <td class=""><i class="mdi mdi-chart-donut mdi-24px text-success me-1"></i>{{$user->role_id}}</td>
                           
             <td>
              <span class="badge bg-label-success rounded-pill">Active</span>
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                <div class="dropdown-menu">                
                  <a class="dropdown-item" onclick="openEditModal({{ $user }})"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                  <a class="dropdown-item" href="javascript:void(0);"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                </div>
              </div>
            </td>
            </tr>






            @endif
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
      console.log(data);
    var parsedData = typeof data === 'object' ? data : JSON.parse(data);

    var username = parsedData.username;
    var email = parsedData.email;
    var password = parsedData.password;
    var role_id = parsedData.role_id;
    

    // Access the 'shippers' array and its properties
    var shippersArray = parsedData.shippers || [];
    var firstShipper = shippersArray.length > 0 ? shippersArray[0] : null;
    var shipperAddress = firstShipper ? firstShipper.shipper_address : null;
    var shipperCity = firstShipper ? firstShipper.shipper_city : null;
    var shipperzip = firstShipper ? firstShipper.shipper_zip : null;
    var shipperphone = firstShipper ? firstShipper.shipper_cellphone : null;
    var shipperAltemail = firstShipper ? firstShipper.shipper_extra_email : null;
    var shipperstate = firstShipper ? firstShipper.shipper_state : null;
 
    // Access the 'truckers' array and its properties
    var truckersArray = parsedData.truckers || [];
    var firstTrucker = truckersArray.length > 0 ? truckersArray[0] : null;
    var truckerAddress = firstTrucker ? firstTrucker.trucker_address : null;
    var truckerCity = firstTrucker ? firstTrucker.trucker_city : null;
    var truckerzip = firstTrucker ? firstTrucker.trucker_zip : null;
    var truckerphone = firstTrucker ? firstTrucker.trucker_cellphone : null;
    var truckerAltemail = firstTrucker ? firstTrucker.trucker_extra_email : null;
    var truckerstate = firstTrucker ? firstTrucker.trucker_state : null;
 
    // Access the 'freights' array and its properties
    var freightsArray = parsedData.freights || [];
    var firstFreight = freightsArray.length > 0 ? freightsArray[0] : null;
    var freightAddress = firstFreight ? firstFreight.freight_address : null;
    var freightCity = firstFreight ? firstFreight.freight_city : null;
    var freightzip = firstFreight ? firstFreight.freight_zip : null;
    var freightphone = firstFreight ? firstFreight.freight_cellphone : null;
    var freightAltemail = firstFreight ? firstFreight.freight_extra_email : null;
    var freightstate = firstFreight ? firstFreight.freight_state : null;
    // Handle freights data as needed

    // Access the 'agencies' array and its properties
    var agenciesArray = parsedData.agencies || [];
    var firstAgency = agenciesArray.length > 0 ? agenciesArray[0] : null;
    var agencyAddress = firstAgency ? firstAgency.agency_address : null;
    var agencyCity = firstAgency ? firstAgency.agency_city : null;
    var agencyzip = firstAgency ? firstAgency.agency_zip : null;
    var agencyphone = firstAgency ? firstAgency.agency_cellphone : null;
    var agencyAltemail = firstAgency ? firstAgency.agency_extra_email : null;
    var agencystate = firstAgency ? firstAgency.agency_state : null;
    // Handle agencies data as needed

    // Assign Address and city based on the available data
    var Addrdess = shipperAddress || truckerAddress || freightAddress || agencyAddress;
    var city = shipperCity || truckerCity || freightCity || agencyCity;
    var altemail = shipperAltemail || truckerAltemail || freightAltemail || agencyAltemail;
    var phone = shipperphone || truckerphone || freightphone || agencyphone;
    var state = shipperstate || truckerstate || freightstate || agencystate;
    var zip = shipperzip || truckerzip || freightzip || agencyzip;
    // Populate the edit modal fields with the data
    $('#username').val(username);
    $('#email').val(email);
    $('#altemail').val(altemail);
    $('#phone').val(phone);
    $('#password').val(password);
    $('#role_id').val(role_id);
    $('#Adddress').val(Addrdess);
    // $('#Address2').val(Address2);
    $('#state').val(state);
    $('#city').val(city);
    $('#zip').val(zip);



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
 console.log(formData);

  $.ajax({
    url: '/reg',
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
