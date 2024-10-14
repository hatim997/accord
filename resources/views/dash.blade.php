@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp
@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - main')
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
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection

@section('content')
    <div class="row gy-4 justify-content-center">
        <div class="col-md-10 col-lg-10">
            <div class="row gy-4">
                <!-- Congratulations card -->
                <div class="col-md-4 col-lg-4">
                    <div class="card"
                        style="background: rgb(42,132,254); background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);">
                       <div class="card-body text-center" style="height: 220px;">
                            <h4 class="mb-1 py-4 text-white">Policy Expiring in a Month !</h4>
                            <h2 class="py-3 text-white card-title" style="font-size: 72px">{{ isset($monthExp) ? $monthExp : 0 }}</h2>
                        </div>
                        <div fxlayout="row" fxlayoutalign="start center" class="total_box ng-tns-c246-95"
                        style="flex-direction: row; box-sizing: border-box; display: flex; place-content: center flex-start; align-items: center;">
                        <span class="ng-tns-c246-95">&nbsp;</span><span class="num red-fg ng-tns-c246-95">&nbsp;</span><span
                            class="go-btn ng-tns-c246-95 open-modal-btn" data-modal="expiringPoliciesModal2" tabindex="0">GO </span>
                    </div>
                    </div>
                </div>
                <!--/ Congratulations card -->
                <!-- Congratulations card -->
                <div class="col-md-4 col-lg-4">
                    <div class="card"
                        style="background: rgb(42,132,254); background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);">
                       <div class="card-body text-center" style="height: 220px;">
                            <h4 class="mb-1 py-4 text-white">Policy Expiring in a Week !</h4>
                            <h2 class="py-3 text-white card-title" style="font-size: 72px">{{ isset($weekExp) ? $weekExp : 0 }}</h2>
                        </div>
                        <div fxlayout="row" fxlayoutalign="start center" class="total_box ng-tns-c246-95"
                        style="flex-direction: row; box-sizing: border-box; display: flex; place-content: center flex-start; align-items: center;">
                        <span class="ng-tns-c246-95">&nbsp;</span><span class="num red-fg ng-tns-c246-95">&nbsp;</span><span
                            class="go-btn ng-tns-c246-95 open-modal-btn" data-modal="expiringPoliciesModal1" tabindex="0">GO </span>
                    </div>
                    </div>
                </div>
                <!--/ Congratulations card -->
                <!-- Congratulations card -->
                <div class="col-md-4 col-lg-4">
                    <div class="card"
                        style="background: rgb(42,132,254); background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);">
                       <div class="card-body text-center" style="height: 220px;">
                            <h4 class="mb-1 py-4 text-white">No of Insureds !</h4>
                            <h2 class="py-3 text-white card-title" style="font-size: 72px">{{ isset($insuredCnt) ? $insuredCnt : 0 }}</h2>
                        </div>
                        <div fxlayout="row" fxlayoutalign="start center" class="total_box ng-tns-c246-95"
                        style="flex-direction: row; box-sizing: border-box; display: flex; place-content: center flex-start; align-items: center;">
                        <span class="ng-tns-c246-95">&nbsp;</span><span class="num red-fg ng-tns-c246-95">&nbsp;</span><a href="{{ route('insur') }}"><span
                            class="go-btn ng-tns-c246-95 " tabindex="0">GO </span></a>
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





        @if($agencyinfo->is_active=="1")
        <div class="col-12">
          <div class="card">
              <div class="table-responsive">
                
                  <table class="table dataTable collapsed chat-contact-list" id="contact-list" >
                      <h4 class="mb-1 py-4 px-4">List of Truckers By Agency</h4>
                      <thead class="table-light">
                          <tr>
                              <th class="text-truncate">Company Name</th>
                              <th class="text-truncate">UsDot #</th>
                              <th class="text-truncate">MC#</th>
                              <th class="text-truncate">Status</th>
                              <th class="text-truncate">view COI</th>
                          </tr>

                      </thead>
                      <tbody>
                       {{-- {{dd($brokersinfo)}} --}}
                          @foreach ($brokersinfo as $bi)
                          @if ($bi->user->role == 'freight_driver')
                              
                      
                          <tr class="parent">
                                  <td>
                                      <div class="d-flex align-items-center">

                                          <div>
                                              <h6 class="mb-0 text-truncate"> {{ $bi->driverDetails->name }}</h6>
                                          </div>
                                      </div>

                                  </td>
                                  <td class="text-truncate">
                                    {{ $bi->driverDetails->usdot }}
                                  </td>
                                  <td> 
                                    {{ $bi->driverDetails->mc_number }}
                                  </td>
                                  <td>
                                    @if($bi->driver->status == "1")
                                      <span class="badge bg-label-success rounded-pill">Active</span>
                                    @else
                                      <span class="badge bg-label-danger rounded-pill">Inactive</span>
                                    @endif
                                  </td>
                                  <td>
                                    <div class="d-flex align-items-start flex-column">
                                    <a target="blank" href="get_pdf/{{$bi->id}}"><span class=""><svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 16 16">
                                      <g fill="#ff4c51"><path d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36c.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05a12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064a.44.44 0 0 1-.06.2a.3.3 0 0 1-.094.124a.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822c.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z"></path><path fillRule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419c.207.075.412.04.58-.03c.318-.13.635-.436.926-.786c.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95c.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416c.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05a11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794c.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538a.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077c-.377.15-.576.47-.651.823c-.073.34-.04.736.046 1.136c.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227a7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787c-.21.326-.275.714-.08 1.103"></path>
                                      </g></svg></span></a>

                                     <p>
                                      &nbsp;pdf
                                      </p> 
                                    </div>
                                  </td>
                              </tr>
                              @endif
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
      <div class="col-12">
          <div class="card">
              <div class="table-responsive">
                
                  <table class="table dataTable collapsed chat-contact-list" id="contact-list" >
                      <h4 class="mb-1 py-4 px-4">List of Brokers By Agency</h4>
                      <thead class="table-light">
                          <tr>
                            <th class="text-truncate">Company Name</th>
                            <th class="text-truncate">UsDot #</th>
                            <th class="text-truncate">MC#</th>
                            <th class="text-truncate">Status</th>
                            <th class="text-truncate">view COI</th>
                          </tr>

                      </thead>
                      <tbody>
                          @foreach ($brokersinfo as $bi)
                          @if ($bi->user->role == 'truck_driver')
                            <tr class="parent">
                                  <td>
                                      <div class="d-flex align-items-center">

                                          <div>
                                              <h6 class="mb-0 text-truncate"> {{ $bi->driverDetails->name }}</h6>
                                          </div>
                                      </div>

                                  </td>
                                  <td class="text-truncate">
                                    {{ $bi->driverDetails->usdot }}
                                  </td>
                                  <td> 
                                    {{ $bi->driverDetails->mc_number }}
                                  </td>
                                  <td>
                                    @if($bi->driverDetails->status == "1")
                                      <span class="badge bg-label-success rounded-pill">Active</span>
                                    @else
                                      <span class="badge bg-label-danger rounded-pill">Inactive</span>
                                    @endif
                                  </td>
                                  <td>
                                    <div class="d-flex align-items-start flex-column">
                                    <a target="blank" href="get_pdf/{{$bi->id}}"><span class=""><svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 16 16">
                                      <g fill="#ff4c51"><path d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36c.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05a12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064a.44.44 0 0 1-.06.2a.3.3 0 0 1-.094.124a.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822c.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z"></path><path fillRule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419c.207.075.412.04.58-.03c.318-.13.635-.436.926-.786c.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95c.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416c.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05a11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794c.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538a.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077c-.377.15-.576.47-.651.823c-.073.34-.04.736.046 1.136c.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227a7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787c-.21.326-.275.714-.08 1.103"></path>
                                      </g></svg></span></a>

                                     <p>
                                      &nbsp;pdf
                                      </p> 
                                    </div>
                                  </td>
                              </tr>
                              @endif
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