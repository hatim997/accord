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
        <table class="table">
          <thead>
              <tr>
                  <th>Certificate for driver</th>
              </tr>
          </thead>
          <tbody class="table-border-bottom-0">

              @foreach ($certificate as $cert)
                  <tr>
                      <td>
                          <a href="{{ route('freght_cert', $cert->id) }}" target="blank" class="btn btn-primary">Show Certificate
                              {{ $cert->id }} Details</a>
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
