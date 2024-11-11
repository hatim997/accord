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
      .card .table{
        text-align: center;
      }

      .custom-button {
          display: inline-flex;
          align-items: center;
          padding: 10px 15px;
          border-radius: 30px;
          color: black !important;
          font-weight: bold;
          text-decoration: none;
          transition: background-color 0.3s, transform 0.2s;
          border: none;
          font-size: 16px;
          position: relative;
      }

      .custom-name {
          color: black !important;
          font-weight: bold;
          text-decoration: none;
          border: none;
          font-size: 16px;

      }



      .custom-button i {
          margin-right: 5px;
      }

      .custom-button:hover {
          background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);
          transition: .2s;
          color: #fff !important;
          transform: translateY(-2px);
      }

      .custom-button:active {
          background-color: #004494; /* Even darker on active */
          transform: translateY(0);
      }

      .custom-button:focus {
          outline: none;
          box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5); /* Bootstrap primary focus */
      }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@push('body-style')
<link rel="stylesheet" href="{{ asset('assets/css/datatable.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/datatables-Cl.css') }}" />

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
                      <table class="table ">
                          <thead>
                              <tr style="background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);">
                                <th>Certificate for Drivers</th>
                                  <th>Certificate for Drivers</th>

                              </tr>
                          </thead>
                          <tbody class="table-border-bottom-0 ">
                              @foreach ($certificate as $cert)
                                  <tr>

                                      <td>
                                          <a href="{{ route('freght_cert', $cert->id) }}" target="blank" class="custom-button eye-c">
                                              <i class="fas fa-eye"></i> &nbsp;Show Certificate
                                          </a>
                                      </td>
                                      <td>
                                        @if ($cert->status == "0")
                                        <a href="{{ route('cert-active' , ['id' => $cert->id]) }}" class="badge rounded-pill bg-label-warning me-1">Inactive</a>
                                        @else
                                        <a href="{{ route('cert-deactive', ['id' => $cert->id]) }}" class="badge rounded-pill bg-label-success me-1">Active</a>
                                                    @endif
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
  </div>
</div>





  </div>
        <!--/ Data Tables -->
    </div>
@endsection

@push('body-scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {

      const eyeButtons = document.querySelectorAll('.custom-button.eye-c');



      eyeButtons.forEach(button => {
          button.addEventListener('mouseenter', function() {
              const icon = this.querySelector('i.fa-eye');
              if (icon) {
                  icon.classList.add('fa-fade');
              }
          });

          button.addEventListener('mouseleave', function() {
              const icon = this.querySelector('i.fa-eye');
              if (icon) {
                  icon.classList.remove('fa-fade');
              }
          });
      });
  });
</script>
@endpush
