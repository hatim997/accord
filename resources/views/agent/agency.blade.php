@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp
@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - main')
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
    <link href="https://cdn.datatables.net/v/dt/dt-2.1.0/datatables.min.css" rel="stylesheet">
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
            background-color: #f1f1f1;
            border: 1px solid #add5ff;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
            .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
                background: rgba(5, 120, 228, 0.388) !important;
                color: #fff !important;

                border-radius: 20px;
                border: none;

            }

            .dataTables_wrapper .dataTables_paginate .paginate_button.current,
            .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
                background: rgb(5, 121, 228) !important;
                color: #fff !important;
                border-radius: 20px;
                border: none;

            }

            #DataTables_Table_0 thead th {
                /* background-color: #0a6d9a !important; */
                color: #fff !important;
                border-bottom: 2px solid #ddd;
            }

            /* Custom Table Row Styling */
            #DataTables_Table_0 tbody tr {
                background-color: #fff !important;
                height: 60px;
                border-bottom: 1px solid #E6E5E8;
            }

            #DataTables_Table_0 tbody tr:hover {
                background-color: #e0f2ff;
            }

            /* Other Custom Styles */
            #DataTables_Table_0 {
                font-size: 14px;
                color: #333;
            }

            .div.dataTables_wrapper div.dataTables_filter {
                display: flex;
                align-items: center;
                gap: 10px;
                padding: 10px;
                background-color: #f7f7f7;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                margin-bottom: 10px;
            }

            .div.dataTables_wrapper div.dataTables_filter label {
                font-weight: 600;
                color: #333;
            }

            .div.dataTables_wrapper div.dataTables_filter input {
                padding: 8px 12px;
                width: 100%;
                max-width: 250px;
                border: 1px solid #ddd;
                border-radius: 5px;
                transition: border-color 0.3s ease;
            }

            .div.dataTables_wrapper div.dataTables_filter input:focus {
                outline: none;
                border-color: #057ae4;
                box-shadow: 0 0 5px blue;
            }

            .dataTables_wrapper {
                background: none !important;
                border: none !important;
            }


tr{
  height: 1px !important;
}
.card{

}
    </style>
@endpush

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-2.1.0/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#contact-list').DataTable();  // Initialize DataTable on your specific table
        });
    </script>
@endsection

@section('content')
<div class="row gy-4 justify-content-center" >
      <div class="row gy-4 card" style="background: #FFFFFF;">
          <!-- Data Tables -->
          <div class="col-12">
              <div class="card " style="box-shadow: none !important;">
                  <div class="table-responsive ">
                      <table class="table" id="contact-list"> <!-- Use this ID here -->
                          <thead>
                              <tr style="background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);">
                                  <th>Company Name</th>
                                  <th>Naic Number</th>
                              </tr>
                          </thead>
                          <tbody class="table-border-bottom-0">
                            @foreach ($certificate as $user)
                                  <tr>
                                      <td style="border-left: 1px solid #E6E5E8;">
                                          <a target="blank" class="custom-button eye-c">
                                            {{$user->name}}
                                          </a>
                                      </td>
                                      <td>
                                        <a target="blank" class="custom-button eye-c">
                                          {{$user->naic_number}}
                                        </a>
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
@endsection
