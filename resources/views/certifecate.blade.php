@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp
@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - main')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
    <style>
       .disabled-link {
    color: gray;
    pointer-events: none;
    cursor: not-allowed;
    text-decoration: none;
  }
    </style>
@endsection
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
    
        <!-- Data Tables -->
        <div class="col-12">
    <div class="card">
      <div class="table-responsive">
        <table class="table dataTable collapsed chat-contact-list" id="contact-list" style="width: 1193px;">
          <thead>
              <tr>
                  <th>Certificate for driver</th>
                  <th>Certificate for driver</th>
              </tr>
          </thead>
          <tbody class="table-border-bottom-0">

              @foreach ($certificate as $cert)
            <tr class="parent">
                      <td>
                          <a href="{{ route('list_cert', $cert->id) }}" target="blank" class="btn btn-primary">Show Certificate
                              {{ $cert->id }} Details</a>
                      </td>
                      <td>
                        @if ($cert->status == "0")
                        <a href="{{ route('cert-active' , ['id' => $cert->id]) }}" class="badge bg-label-danger rounded-pill">Inactive</a>
                        @else
                        <a href="{{ route('cert-deactive', ['id' => $cert->id]) }}" class="badge bg-label-success rounded-pill">Active</a>                        @endif
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
@endsection
