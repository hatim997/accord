@extends('layouts/contentNavbarLayout')
@section('title', ' Vertical Layouts - Forms')
@section('content')
    @php
        $isMenu = false;
        $navbarHideToggle = false;
    @endphp
    @push('body-style')
        <link rel="stylesheet" href="{{ asset('assets/css/datatable.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/datatables-Cl.css') }}" />
        <style>
            thead,
            tbody,
            tfoot,
            tr,
            td,
            th {
                border-style: hidden !important;
            }

            .focus {
                border-radius: 7px;
                background-color: #f1f1f1;
                /* Highlight color */
                border: 1px solid #add5ff;
                /* Optional: Add a border */
            }
        </style>
    @endpush


    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="container mt-5 px-2">

            <div class="mb-2 d-flex justify-content-center align-items-center">
                <div class="text-center">
                    <h4 class="mb-0 py-4 px-4 fw-bold">Shippers List</h4>
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
                                {{-- <td>12</td> --}}
                                <td class="text-center"> {{ $ships->name }}</td>
                                <td class="text-center"> {{ $ships->address }}</td>
                                <td class="text-center"> {{ $ships->cellphone }}</td>
                                <td class="text-center"> {{ $ships->extra_email }}</td>
                                <td class="text-center">

                                    <span class="badge bg-label-success rounded-pill">Active</span>


                                </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>

        </div>




    </div>


@endsection
