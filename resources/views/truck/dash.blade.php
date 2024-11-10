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

   .focus {
     border-radius: 7px;
     background-color: #f1f1f1; /* Highlight color */
     border: 1px solid #add5ff; /* Optional: Add a border */
   }
/* Modal overlay */
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
          <!-- Congratulations card -->
<div class="col-md-3 col-lg-3">
    <div class="card" style="background: rgb(42,132,254); background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);">
        <div class="card-body text-center" style="height: 220px;">
            <h4 class="mb-1 py-4 text-white">No. of Active Shippers</h4>
            <h2 class="py-3 text-white card-title" style="font-size: 72px">{{ $activeShippersCount }}</h2>
        </div>
        <div fxlayout="row" fxlayoutalign="start center" class="total_box ng-tns-c246-95"
             style="flex-direction: row; box-sizing: border-box; display: flex; place-content: center flex-start; align-items: center;">
            <span class="ng-tns-c246-95">&nbsp;</span><span class="num red-fg ng-tns-c246-95">&nbsp;</span><span
                class="go-btn ng-tns-c246-95 open-modal-btn" tabindex="0" data-modal="expiringPoliciesModal3" >GO ></span>
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
                            <h2 class="py-3 text-white card-title" style="font-size: 72px">{{ $inactiveShippersCount }}</h2>
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

<div class="modal" id="expiringPoliciesModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header justify-content-center align-items-center">
                  <h5 class="modal-title" id="exampleModalLabel">Policies Expiring in a Week</h5>

                </div>
                <div class="modal-body">
                    @if($weekExpolicies->isEmpty())
                    <p>No policies expiring within a week.</p>
                  @else
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
                                @foreach($weekExpolicies as $policy)
                                <tr >
                                    <td>{{ $policy->policy_type_id }}</td>
                                    <td>{{ $policy->names }}</td>
                                    <td>{{ $policy->policy_number }}</td>
                                    <td>{{ $policy->start_date }}</td>
                                    <td>{{ $policy->expiry_date }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>

                </div>
                  @endif
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary close-btn" style="border: none" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>


          <div class="modal" id="expiringPoliciesModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header justify-content-center align-items-center">
                  <h5 class="modal-title text-center" id="exampleModalLabel">Policies Expiring in a Month</h5>

                </div>
                <div class="modal-body">
                  @if($monthExpolicies->isEmpty())
                    <p>No policies expiring within a Month.</p>
                  @else

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
                                @foreach($monthExpolicies as $policy)
                                <tr >
                                    <td>{{ $policy->policy_type_id }}</td>
                                    <td>{{ $policy->names }}</td>
                                    <td>{{ $policy->policy_number }}</td>
                                    <td>{{ $policy->start_date }}</td>
                                    <td>{{ $policy->expiry_date }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>

                </div>



                  @endif
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary close-btn" style="border: none" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>


          <div class="modal" id="expiringPoliciesModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header justify-content-center align-items-center">
                  <h5 class="modal-title" id="exampleModalLabel">List of Active Shippers</h5>

                </div>
                <div class="modal-body">
                    @if($activeShippers->isEmpty())
                    <p>No active shippers available.</p>
                @else
                  <div class="container mt-2 px-2">


                    <div class="table-responsive">
                        <table class="table table-responsive table-borderless">

                            <thead>
                                <tr class="bg-light">
                                    <th scope="col" width="25%">Name</th>
                                    <th scope="col" width="25%">Email</th>
                                    <th scope="col" width="25%">Remember Token</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($activeShippers as $shipper)
                                <tr>
                                    <td>{{ $shipper->name }}</td>
                                    <td>{{ $shipper->email }}</td>
                                    <td>{{ $shipper->remember_token }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>

                </div>



                  @endif
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary close-btn" style="border: none" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>


          <div class="modal" id="expiringPoliciesModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header justify-content-center align-items-center">
                  <h5 class="modal-title" id="exampleModalLabel">List of Inactive Shippers</h5>

                </div>
                <div class="modal-body">
                    @if($inactiveShippers->isEmpty())
                    <p>No active shippers available.</p>
                @else

                  <div class="container mt-2 px-2">


                    <div class="table-responsive">
                        <table class="table table-responsive table-borderless">

                            <thead>
                                <tr class="bg-light">
                                    <th scope="col" width="25%">Name</th>
                                    <th scope="col" width="25%">Email</th>
                                    <th scope="col" width="25%">Remember Token</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inactiveShippers as $shipper)
                                <tr>
                                    <td>{{ $shipper->name }}</td>
                                    <td>{{ $shipper->email }}</td>
                                    <td>{{ $shipper->remember_token }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>

                </div>



                  @endif
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary close-btn" style="border: none" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>



          @if(session('success'))
          @php
          $successData = session('success');
      @endphp

          <div class="modal open" id="expiringPoliciesModal5" tabindex="-1" style="display: flex" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header justify-content-center align-items-center">
                  {{-- <h5 class="modal-title" id="exampleModalLabel">List of Inactive Shippers</h5> --}}

                </div>
                <div class="modal-body">

                  <div class="confirmation-container">
                    <h1>Thank You! <span class="emoji"></span></h1>
              
                    <p class="info-text">Your request has been successfully submitted!</p>



                    @if($successData['orderTime'])
                        <p class="time-placed">
                            <span class="clock-icon">🕒</span> Time placed: {{ $successData['orderTime'] }}
                        </p>
                    @else
                        <p class="time-placed">Order time not available.</p>
                    @endif


                    @if($successData['to'] && $successData['from'] && $successData['titel'] && $successData['status'])
                    <p class="info-text">
                        Request Details:
                        <br>
                        <strong>To:</strong> {{ $successData['to'] }} <br>
                        <strong>From:</strong> {{ $successData['from'] }} <br>
                        <strong>Title:</strong> {{ $successData['titel'] }} <br>
                        <strong>Status:</strong> {{ $successData['status'] }} <br>
                        <strong>Order Time:</strong> {{ $successData['orderTime'] }}
                    </p>
                @else
                    <p class="info-text">
                        Request details are not available.
                    </p>
                @endif





                </div>




                </div>

              </div>
            </div>
          </div>
          @endif


        @if($driverInfo->is_active==1)



        <div class="container mt-5 px-2">


            <div class="mb-2 d-flex justify-content-center align-items-center mt-5">
                <div class="text-center">
                    <h4 class="mb-0 py-4 px-4 fw-bold">List of Coverages</h4>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-responsive table-borderless">

                    <thead>
                        <tr class="bg-light">



                            @if (isset($policies))
                            @foreach ($policies as $p)
                            <th scope="col" width="5">{{ shout($p->type_name) }}</th>
                            @endforeach
                        @endif
                        </tr>
                    </thead>
                    <tbody>

                        @if (isset($certificatePolicies))
                        @foreach ($policies as $p)
                            @if ($certificatePolicies->pluck('policy_type_id')->contains($p->id))
                                <td>
                                    <div class="green-square"></div>
                                </td>
                            @else
                            <td>
                              <a href="{{ route('opnrqet', ['id' => $p->id]) }}" class="open-modal-btn">
                                  <div class="red-square"></div>
                              </a>
                          </td>

                                <div class="modal" id="expiringPoliciesModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                      <div class="modal-content">
                                        <div class="modal-header justify-content-center align-items-center">
                                          <h5 class="modal-title" id="exampleModalLabel">List of Inactive Shippers</h5>

                                        </div>
                                        <div class="modal-body">

                                                we sent requst to Admin make {{$p->type_name}}


                                        </div>

                                      </div>
                                    </div>
                                  </div>




                            @endif
                        @endforeach
                    @else
                        <td style="color: grey;">No Data Available</td>
                    @endif





                    </tbody>
                </table>

            </div>

        </div>



        <div class="container mt-5 px-2">

            <div class="mb-2 d-flex justify-content-center align-items-center">
                <div class="text-center">
                    <h4 class="mb-0 py-4 px-4 fw-bold">Broker List</h4>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-responsive " style="border: 0px">

                    <thead>
                        <tr class="bg-light">

                            {{-- <th scope="col" width="5%">#</th> --}}
                            <th scope="col" width="20%" class="text-center">User</th>
                            <th scope="col" width="30%" class="text-center">Address</th>
                            <th scope="col" width="20%" class="text-center">Cellphone</th>
                            <th scope="col" width="20%" class="text-center">Email</th>
                            <th scope="col" width="10%" class="text-center"><span>Status</span></th>
                        </tr>
                    </thead>
                    <tbody style="background-color: #fff;">
                        <tr>
                            @foreach ($ship as $ships)

                                    <td class="text-center">{{ $ships->name }}</td>
                                    <td class="text-center">{{ $ships->address }}</td>
                                    <td class="text-center">{{ $ships->cellphone }}</td>
                                    <td class="text-center">{{ $ships->extra_email }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-label-success rounded-pill">Active</span>
                                    </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

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
