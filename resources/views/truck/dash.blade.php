@extends('layouts/contentNavbarLayout')
@section('title', ' Vertical Layouts - Forms')
@section('content')
    <Style>
        .green-square {
            width: 10px;
            height: 10px;
            background-color: green;
        }
        .red-square {
            width: 10px;
            height: 10px;
            background-color: red;
        }
    </style>
   @push('body-style')
   <link rel="stylesheet" href="{{ asset('assets/css/datatable.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/css/datatables-Cl.css') }}" />
   <style>
   thead, tbody, tfoot, tr, td, th {
       border-style: hidden !important;
     }
   .focus {
     border-radius: 7px;
     background-color: #f1f1f1; /* Highlight color */
     border: 1px solid #add5ff; /* Optional: Add a border */
   }
   </style>
   @endpush
    @php
        $isMenu = false;
        $navbarHideToggle = false;
    @endphp

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
                            <h2 class="py-3 text-white card-title" style="font-size: 72px">{{ isset($monthExp) ? $monthExp : 0 }}</h2>
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
                        <div class="card-body text-center" style="
                        height: 220px;
                    ">
                            <h4 class="mb-1 py-4 text-white">Policy Expiring in a Week !</h4>
                            <h2 class="py-3 text-white card-title" style="font-size: 72px">{{ isset($weekExp) ? $weekExp : 0 }}</h2>
                        </div>
                        <div fxlayout="row" fxlayoutalign="start center" class="total_box ng-tns-c246-95"
                        style="flex-direction: row; box-sizing: border-box; display: flex; place-content: center flex-start; align-items: center;">
                        <span class="ng-tns-c246-95">&nbsp;</span><span class="num red-fg ng-tns-c246-95">&nbsp;</span><span
                            class="go-btn ng-tns-c246-95  open-modal-btn" data-modal="expiringPoliciesModal1"  tabindex="0">GO ></span>
                    </div>
                    </div>
                </div>
                <!--/ Congratulations card -->


                <!-- Congratulations card -->
                <div class="col-md-3 col-lg-3">
                    <div class="card"
                        style="background: rgb(42,132,254); background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);">
                        <div class="card-body text-center" style="height: 220px;">
                            <h4 class="mb-1 py-4 text-white">No.of Active Shippers</h4>
                            <h2 class="py-3 text-white card-title" style="font-size: 72px">0</h2>
                        </div>
                       <div fxlayout="row" fxlayoutalign="start center" class="total_box ng-tns-c246-95"
                            style="flex-direction: row; box-sizing: border-box; display: flex; place-content: center flex-start; align-items: center;">
                            <span class="ng-tns-c246-95">&nbsp;</span><span class="num red-fg ng-tns-c246-95">&nbsp;</span><span
                                class="go-btn ng-tns-c246-95" tabindex="0">GO ></span>
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
                            <h4 class="mb-1 py-4 text-white">No.of InActive Shippers</h4>
                            <h2 class="py-3 text-white card-title" style="font-size: 72px">0</h2>
                        </div>
                        <div fxlayout="row" fxlayoutalign="start center" class="total_box ng-tns-c246-95"
                        style="flex-direction: row; box-sizing: border-box; display: flex; place-content: center flex-start; align-items: center;">
                        <span class="ng-tns-c246-95">&nbsp;</span><span class="num red-fg ng-tns-c246-95">&nbsp;</span><span
                            class="go-btn ng-tns-c246-95" tabindex="0">GO ></span>
                    </div>
                    </div>
                </div>
                <!--/ Congratulations card -->
            </div>
        </div>

<div class="modal" id="expiringPoliciesModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Policies Expiring in a Week</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  @if($weekExpolicies->isEmpty())
                    <p>No policies expiring within a week.</p>
                  @else
                  <table class="table dataTable collapsed chat-contact-list" id="contact-list" >
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
                    @foreach($weekExpolicies as $policy)
                        <tr class="parent"> 
                            <td>{{ $policy->policy_type_id }}</td>
                            <td>{{ $policy->names }}</td>
                            <td>{{ $policy->policy_number }}</td>
                            <td>{{ $policy->start_date }}</td>
                            <td>{{ $policy->expiry_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                  @endif
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>


          <div class="modal" id="expiringPoliciesModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Policies Expiring in a Month</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  @if($monthExpolicies->isEmpty())
                    <p>No policies expiring within a Month.</p>
                  @else
                  <table class="table dataTable collapsed chat-contact-list" id="contact-list" >
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
                    @foreach($monthExpolicies as $policy)
                        <tr class="parent"> 
                            <td>{{ $policy->policy_type_id }}</td>
                            <td>{{ $policy->names }}</td>
                            <td>{{ $policy->policy_number }}</td>
                            <td>{{ $policy->start_date }}</td>
                            <td>{{ $policy->expiry_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                  @endif
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>




        @if($driverInfo->is_active==1)
        <!-- Data Tables -->
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table" id="contact-list" >
                        <h4 class="mb-1 py-4 px-4">list of Coverages</h4>
                        <thead class="">
                            <tr>
                                <th class="text-truncate">User</th>


                            </tr>

                        </thead>
                        <tbody>
                            <tr class="">
                                @if (isset($policies))
                                    @foreach ($policies as $p)
                                        <td>{{ shout($p->type_name) }}</td>
                                    @endforeach
                                @endif
                            </tr>
                            <tr class="">
                                @if (isset($certificatePolicies))
                                    @foreach ($policies as $p)
                                        @if ($certificatePolicies->pluck('policy_type_id')->contains($p->id))
                                            <td>
                                                <div class="green-square"></div>
                                            </td>
                                        @else
                                            <td>
                                                <div class="red-square"></div>
                                            </td>
                                        @endif
                                    @endforeach
                                @else
                                    <td style="color: grey;">No Data Available</td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ Data Tables -->

        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                  
                    <table class="table " id="contact-list" >
                        <h4 class="mb-1 py-4 px-4">list of Shippers</h4>
                        <thead class="">
                            <tr>
                                <th class="text-truncate">User</th>
                                <th class="text-truncate">Address</th>
                                <th class="text-truncate">Cellphone</th>
                                <th class="text-truncate">Email</th>
                                <th class="text-truncate">Status</th>

                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($ship as $ships)
                                <tr class="">
                                    <td>
                                        <div class="d-flex align-items-center">

                                            <div>
                                                <h6 class="mb-0"> {{ $ships->name }}</h6>

                                            </div>
                                        </div>

                                    </td>
                                    <td >{{ $ships->address }}</td>
                                    <td >{{ $ships->cellphone }}</td>
                                    <td >{{ $ships->extra_email }}</td>
                                    <td>
                                        <span class="badge bg-label-success rounded-pill">Active</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @else
          <div class="bg-danger text-white">
            You are seeing this is because Admin is Processing your request, Please have Patience.
          </div>
        @endif
        <!--/ Data Tables -->
    </div>
@endsection
@push('body-scripts')
<script>
  var openModalBtns = document.querySelectorAll(".open-modal-btn");
var closeModalBtns = document.querySelectorAll(".close-btn");

// Open the modal when a button is clicked
openModalBtns.forEach(function(btn) {
    btn.addEventListener("click", function() {
        var modalId = btn.getAttribute("data-modal");
        var modal = document.getElementById(modalId);
        modal.style.display = "flex"; // Show the modal
    });
});

// Close the modal when the close button is clicked
closeModalBtns.forEach(function(btn) {
    btn.addEventListener("click", function() {
        var modalId = btn.getAttribute("data-modal");
        var modal = document.getElementById(modalId);
        modal.style.display = "none"; // Hide the modal
    });
});

// Close the modal when clicking outside the modal content
window.onclick = function(event) {
    if (event.target.classList.contains("modal")) {
        event.target.style.display = "none"; // Hide the modal
    }
};
    

    // Close modal when clicking outside the modal content
 
</script>
@endpush