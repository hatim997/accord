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
                            class="go-btn ng-tns-c246-95" tabindex="0">GO </span>
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
                            class="go-btn ng-tns-c246-95" tabindex="0">GO </span>
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
                            class="go-btn ng-tns-c246-95" tabindex="0">GO </span></a>
                    </div>
                    </div>
                </div>
                <!--/ Congratulations card -->
            </div>
        </div>
        @if($agencyinfo->is_active=="1")
        <div class="col-12">
          <div class="card">
              <div class="table-responsive">
                
                  <table class="table dataTable collapsed chat-contact-list" id="contact-list" >
                      <h4 class="mb-1 py-4 px-4">List of Truckers/Brokers By Agency</h4>
                      <thead class="table-light">
                          <tr>
                              <th class="text-truncate">User</th>
                              <th class="text-truncate">Role</th>
                              <th class="text-truncate">Status</th>
                          </tr>

                      </thead>
                      <tbody>
                          @foreach ($brokersinfo as $bi)
                          <tr class="parent">
                                  <td>
                                      <div class="d-flex align-items-center">

                                          <div>
                                              <h6 class="mb-0 text-truncate"> {{ $bi->driver->name }}</h6>
                                          </div>
                                      </div>

                                  </td>
                                  <td class="text-truncate">
                                    @if($bi->driver->role == "truck_driver")
                                      <h6 class="mb-0 text-truncate"> Trucker </h6>
                                    @else
                                      <h6 class="mb-0 text-truncate"> Freight </h6>
                                    @endif
                                  </td>
                                  <td>
                                    @if($bi->driver->status == "1")
                                      <span class="badge bg-label-success rounded-pill">Active</span>
                                    @else
                                      <span class="badge bg-label-danger rounded-pill">Inactive</span>
                                    @endif
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

    </div>
@endsection
