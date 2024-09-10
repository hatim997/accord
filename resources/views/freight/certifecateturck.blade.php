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
                <th>Certificate Holders</th>
                  <th>Certificate for drivers</th>
                  <th> Download Certificate </th>
              </tr>
          </thead>
          <tbody class="table-border-bottom-0">

              @foreach ($certificate as $cert)
                  <tr>
                    <td>
                        <a href=""  class="btn btn-primary"> @if ($cert->ch)
                            {{$cert->name}}
                        @else
                            New Certificate Holder
                        @endif </a>
                    </td>
                      <td>
                          <a href="{{ route('freght_cert', $cert->id) }}" target="blank" class="btn btn-primary">Show Certificate
                                {Edit Certificate}</a>
                      </td>
                    
                    <td>
                        <a href="{{ route('get_pdf', $cert->id) }}" class="btn btn-primary rounded-pill">  <i class="mdi mdi-arrow-down-bold mdi-24px lh-0"></i></a>
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
