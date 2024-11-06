@extends('layouts/contentNavbarLayout')
@section('title', ' Vertical Layouts - Forms')
@section('content')

    @php
        $isMenu = false;
        $navbarHideToggle = false;
    @endphp

<style>
  thead, tbody, tfoot, tr, td, th {
      border-style: hidden !important;
    }
  .focus {
    border-radius: 7px;
    background-color: #f1f1f1; /* Highlight color */
    border: 1px solid #add5ff; /* Optional: Add a border */
  }


       .modal {
   display: none;
   position: fixed;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   background: rgba(0, 0, 0, 0.5); /* Overlay background */
   justify-content: center;
   align-items: center;
   opacity: 0;
   transition: opacity 0.3s ease;
   z-index: 1000;
}

/* Modal content styling */
.modal-content {
   background: #fff;
   padding: 20px;
   border-radius: 8px;
   width: 100%;
   text-align: center;
   transform: scale(0.8); /* Start smaller for zoom-in effect */
   transition: transform 0.3s ease;
}

/* Open class to trigger transitions */
.modal.open {
   opacity: 1;
}

.modal.open .modal-content {
   transform: scale(1); /* Scale up to full size */
}

/* Close button */
.close-btn {
   cursor: pointer;
   font-size: 18px;
   margin-top: 10px;
   display: inline-block;
   border-radius:3px;
   background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);"
}
.modal-title{
   font-weight: bold;
}

  </style>


<div class="modal" id="myModal" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"> Endorsements</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route("endors")}}" method="POST" enctype="multipart/form-data">
              @csrf
          @foreach ($endors as $item)
          @if($item->name != "others")
          <div class="form-check mt-3">
            <input class="form-check-input" name="endo_name[]" type="checkbox" value="{{$item->id}}" id="defaultCheck1" />
            <label class="form-check-label" for="defaultCheck1">
              {{$item->name}}
            </label>
          </div>
          @else
          <div class="form-check mt-3">
            <input class="form-check-input" name="endo_name[]" type="checkbox" value="{{$item->id}}" id="showTextboxCheckbox"/>
            <label class="form-check-label" for="defaultCheck1">
              {{$item->name}}
            </label>
          </div>
          <div class="form-floating form-floating-outline mb-3">
            <input type="text" class="hidden form-control" name="other" id="dynamicTextbox" placeholder="example.com"  />
            <label for="OTHER">OTHER</label>
          </div>
          @endif
            @endforeach
            <div class="mb-3">
              <label for="formFileMultiple" class="form-label">Multiple files input example</label>
              <input class="form-control" name="files[]" type="file" id="formFileMultiple" multiple>
            </div>


        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>
















    <div class="row gy-4 ">
        <div class="col-md-12 col-lg-12">
            <div class="row gy-4">
                <!-- Congratulations card -->
                <div class="col-md-3 col-lg-3">
                    <div class="card"
                        style="background: rgb(42,132,254); background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);">
                        <div class="card-body text-center" style="
                        height: 220px;
                    ">
                            <h4 class="mb-1 py-4 text-white">Policy Expiring in a Month !</h4>
                            <h2 class="py-3 text-white card-title" style="font-size: 72px">{{count($records)}}</h2>
                        </div>
                        <div fxlayout="row" fxlayoutalign="start center" class="total_box ng-tns-c246-95"
                        style="flex-direction: row; box-sizing: border-box; display: flex; place-content: center flex-start; align-items: center;">
                        <span class="ng-tns-c246-95">&nbsp;</span><span class="num red-fg ng-tns-c246-95">&nbsp;</span><span
                            class="go-btn ng-tns-c246-95 open-modal-btn" data-modal="expiringPoliciesModal1" tabindex="0">GO ></span>
                    </div>
                    </div>
                </div>
                <!--/ Congratulations card -->
                <!-- Congratulations card -->
                <div class="col-md-3 col-lg-3">
                    <div class="card"
                        style="background: rgb(42,132,254); background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);">
                        <div class="card-body text-center" style="
                        height: 220px;">
                            <h4 class="mb-1 py-4 text-white">Policy Expiring in a Week !</h4>
                            <h2 class="py-3 text-white card-title" style="font-size: 72px">{{count($recordweeks)}}</h2>
                        </div>
                        <div fxlayout="row" fxlayoutalign="start center" class="total_box ng-tns-c246-95"
                        style="flex-direction: row; box-sizing: border-box; display: flex; place-content: center flex-start; align-items: center;">
                        <span class="ng-tns-c246-95">&nbsp;</span><span class="num red-fg ng-tns-c246-95">&nbsp;</span><span
                            class="go-btn ng-tns-c246-95 open-modal-btn" data-modal="expiringPoliciesModal2" tabindex="0">GO ></span>
                    </div>
                    </div>
                </div>
                <!--/ Congratulations card -->


                <!-- Congratulations card -->
                <div class="col-md-3 col-lg-3">
                  <div class="card"
                      style="background: rgb(42,132,254); background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);">
                      <div class="card-body text-center" style="height: 220px;">
                          <h4 class="mb-1 py-4 text-white">Active Carrier/Broker</h4>
                          <h2 class="py-3 text-white card-title" style="font-size: 72px">
                              {{ $activeUserCount }} <!-- Display the active user count -->
                          </h2>
                      </div>
                      <div fxlayout="row" fxlayoutalign="start center" class="total_box ng-tns-c246-95"
                          style="flex-direction: row; box-sizing: border-box; display: flex; place-content: center flex-start; align-items: center;">
                          <span class="ng-tns-c246-95">&nbsp;</span><span class="num red-fg ng-tns-c246-95">&nbsp;</span><span
                              class="go-btn ng-tns-c246-95 open-modal-btn" data-modal="expiringPoliciesModal3" tabindex="0">GO ></span>
                      </div>
                  </div>
              </div>

                <!--/ Congratulations card -->
                <!-- Congratulations card -->
                <div class="col-md-3 col-lg-3">
                    <div class="card"
                        style="background: rgb(42,132,254); background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);">
                        <div class="card-body text-center" style="
                        height: 220px;
                    ">
                            <h4 class="mb-1 py-4 text-white">InActive Carrier/Broker</h4>
                            <h2 class="py-3 text-white card-title" style="font-size: 72px"> {{$inactiveUserCount}} </h2>
                        </div>
                        <div fxlayout="row" fxlayoutalign="start center" class="total_box ng-tns-c246-95"
                        style="flex-direction: row; box-sizing: border-box; display: flex; place-content: center flex-start; align-items: center;">
                        <span class="ng-tns-c246-95">&nbsp;</span><span class="num red-fg ng-tns-c246-95">&nbsp;</span><span
                            class="go-btn ng-tns-c246-95 open-modal-btn" data-modal="expiringPoliciesModal4" tabindex="0">GO ></span>
                    </div>
                    </div>
                </div>
                <!--/ Congratulations card -->
            </div>
        </div>

    </div>



    <div class="modal" id="expiringPoliciesModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
          <div class="modal-content">
              <div class="modal-header justify-content-center align-items-center">
                  <h5 class="modal-title" id="exampleModalLabel">Policies Expiring in a Month</h5>
              </div>
              <div class="modal-body">
                  {{-- @if ($weekExpolicies->isEmpty())
                      <p>No policies expiring within a week.</p>
                  @else --}}
                      <div class="container mt-2 px-2">
                          <div class="table-responsive">
                              <table class="table table-responsive table-borderless">
                                  <thead>
                                      <tr class="bg-light">
                                          <th scope="col" width="15%">Policy <br> ID</th>
                                          <th scope="col" width="20%">Policy <br>Type Name</th>
                                          <th scope="col" width="20%">Policy<br> Number</th>
                                          <th scope="col" width="22%">Policy<br>Start Date</th>
                                          <th scope="col" width="22%">Expiry Date</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($records as $policy)
                                          <tr>
                                              <td>{{ $policy->policy_id }}</td>
                                              <td><span class="ms-1">{{ $policy->type_name }}</span></td>
                                              <td>{{ $policy->policy_number }}</td>
                                              <td>{{ $policy->start_date }}</td>
                                              <td>{{ $policy->expiry_date }}</td>
                                          </tr>
                                    @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  {{-- @endif --}}
              </div>
              <div class="modal-footer" style="margin-bottom: 0;">
                  <button type="button" class="btn btn-secondary close-btn" style="border: none; margin-bottom: 0;" data-bs-dismiss="modal">Close</button>
              </div>

          </div>
      </div>
  </div>

  <div class="modal" id="expiringPoliciesModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header justify-content-center align-items-center">
                <h5 class="modal-title" id="exampleModalLabel">Policies Expiring in a Week</h5>
            </div>
            <div class="modal-body">
                {{-- @if ($weekExpolicies->isEmpty())
                    <p>No policies expiring within a week.</p>
                @else --}}
                    <div class="container mt-2 px-2">
                        <div class="table-responsive">
                            <table class="table table-responsive table-borderless">
                                <thead>
                                    <tr class="bg-light">
                                        <th scope="col" width="15%">Policy <br> ID</th>
                                        <th scope="col" width="20%">Policy <br>Type Name</th>
                                        <th scope="col" width="20%">Policy<br> Number</th>
                                        <th scope="col" width="22%">Policy<br>Start Date</th>
                                        <th scope="col" width="22%">Expiry Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recordweeks as $policy)
                                        <tr>
                                            <td>{{ $policy->policy_id }}</td>
                                            <td><span class="ms-1">{{ $policy->type_name }}</span></td>
                                            <td>{{ $policy->policy_number }}</td>
                                            <td>{{ $policy->start_date }}</td>
                                            <td>{{ $policy->expiry_date }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                {{-- @endif --}}
            </div>
            <div class="modal-footer" style="margin-bottom: 0;">
                <button type="button" class="btn btn-secondary close-btn" style="border: none; margin-bottom: 0;" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>


<div class="modal" id="expiringPoliciesModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header justify-content-center align-items-center">
              <h5 class="modal-title" id="exampleModalLabel">Active Carrier/Broker</h5>
          </div>
          <div class="modal-body">
              <div class="container mt-2 px-2">
                  <div class="table-responsive">
                      <table class="table table-responsive table-borderless">
                          <thead>
                              <tr class="bg-light">
                                  <th scope="col" width="15%">Name</th>
                                  <th scope="col" width="20%">Role</th>
                                  <th scope="col" width="20%">Email</th>
                                  <th scope="col" width="20%">Status</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($activeUsers as $user)
                                  <tr>
                                      <td>{{ $user->name }}</td>
                                <td>      {{ $user->role == "freight_driver" ? 'Broker' : 'Carrier' }}</td>
                                      <td>{{ $user->email }}</td>
                                      <td>{{ $user->status == 1 ? 'Active' : 'Inactive' }}</td>
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <div class="modal-footer" style="margin-bottom: 0;">
              <button type="button" class="btn btn-secondary close-btn" style="border: none; margin-bottom: 0;" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>


<div class="modal" id="expiringPoliciesModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header justify-content-center align-items-center">
              <h5 class="modal-title" id="exampleModalLabel">InActive Carrier/Broker</h5>
          </div>
          <div class="modal-body">
              <div class="container mt-2 px-2">
                  <div class="table-responsive">
                      <table class="table table-responsive table-borderless">
                          <thead>
                              <tr class="bg-light">
                                  <th scope="col" width="15%">Name</th>
                                  <th scope="col" width="20%">Role</th>
                                  <th scope="col" width="20%">Email</th>
                                  <th scope="col" width="20%">Status</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($inactiveUsers as $inuser)
                            <tr>
                                <td>{{ $inuser->name }}</td>
                                <td>
                                    {{ $inuser->role == "freight_driver" ? 'Broker' : 'Carrier' }}
                                </td>
                                <td>{{ $inuser->email }}</td>
                                <td>{{ $inuser->status == 1 ? 'Active' : 'Inactive' }}</td>
                            </tr>
                        @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <div class="modal-footer" style="margin-bottom: 0;">
              <button type="button" class="btn btn-secondary close-btn" style="border: none; margin-bottom: 0;" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>

   </div>
   @endsection
   @push('body-scripts')
   <script>
       document.addEventListener("DOMContentLoaded", function() {
           var openModalBtns = document.querySelectorAll(".open-modal-btn");
           var closeModalBtns = document.querySelectorAll(".close-btn");

           // Function to open the modal with overlay effect
           openModalBtns.forEach(function(btn) {
               btn.addEventListener("click", function() {
                   var modalId = btn.getAttribute("data-modal");
                   var modal = document.getElementById(modalId);

                   // Display the modal and start the opening animation
                   modal.style.display = "flex";
                   setTimeout(function() {
                       modal.classList.add("open");
                   }, 10); // Slight delay to trigger the CSS transitions
               });
           });

           // Function to close the modal with overlay effect
           closeModalBtns.forEach(function(btn) {
               btn.addEventListener("click", function() {
                   var modal = btn.closest(".modal");

                   // Start the closing animation
                   modal.classList.remove("open");
                   setTimeout(function() {
                       modal.style.display = "none"; // Hide the modal after animation
                   }, 300); // Match the transition time in CSS
               });
           });

           // Close the modal when clicking outside the modal content
           window.onclick = function(event) {
               if (event.target.classList.contains("modal")) {
                   var modal = event.target;

                   // Start the closing animation
                   modal.classList.remove("open");
                   setTimeout(function() {
                       modal.style.display = "none"; // Hide the modal after animation
                   }, 300); // Match the transition time in CSS
               }
           };
       });

       </script>
   @endpush
