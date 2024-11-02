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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM/1N2pVq3U1xTTs3epFk+8bE95aJ6cfOgiTtK" crossorigin="anonymous" />
<style>
thead, tbody, tfoot, tr, td, th {
    border-style: hidden !important;
  }
.focus {
  border-radius: 7px;
  background-color: #f1f1f1; /* Highlight color */
  border: 1px solid #add5ff; /* Optional: Add a border */
}
.btn-primary {
      background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);
      border: none !important;
      border-radius: 10px !important;
      color: white;
      font-weight: bold; /* Bold text */
      }

      input, textarea, button {
      padding: 10px 15px;
      border-radius: 5px;
      margin: 10px 0; /* Space between fields */
      box-sizing: border-box;
      border: 1px solid #ccc;
      font-size: 16px; /* Slightly smaller font */
      transition: border-color 0.3s;
      }
      .form-heading{
      font-weight: bold !important;
      }
</style>
@endpush
<div class="col-12">
  <div class="card">
    <div class="table-responsive">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM/1N2pVq3U1xTTs3epFk+8bE95aJ6cfOgiTtK" crossorigin="anonymous" />


      <div class="container-xxl flex-grow-1 container-p-y">

        <div class="container mt-5 px-2">

            <div class="mb-2 d-flex justify-content-center align-items-center mb-4">
                <div class="text-center justify-content-between">
                    <h4 class="mb-0 py-4 px-4 fw-bold">Truckers List</h4>

                </div>
                <div style="margin-left: auto; margin-right:7%;x">
                  <a href="{{ route('add.truck') }}" type="submit"  id="saveButton" class="btn btn-primary">Add More</a>

              </div>
            </div>



            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM/1N2pVq3U1xTTs3epFk+8bE95aJ6cfOgiTtK" crossorigin="anonymous" />

            <div class="table-responsive">
                <table class="table table-responsive " style="border: 0px">

                    <thead>
                        <tr class="bg-light">

                            {{-- <th scope="col" width="5%">#</th> --}}
                            <th scope="col" width="10%" class="text-center">Vehicle Reg #</th>
                            <th scope="col" width="20%" class="text-center">Vehicle Make</th>
                            <th scope="col" width="20%" class="text-center">Vehicle Model</th>
                            <th scope="col" width="10%" class="text-center">Vehicle Year</th>
                            <th scope="col" width="20%" class="text-center">Vehicle Status</th>
                            <th scope="col" width="10%" class="text-center"><span>Action</span></th>
                        </tr>
                    </thead>
                    <tbody style="background-color: #fff;">
                        <tr>
                          @foreach ($truck as $trucks)
                                {{-- <td>12</td> --}}
                                <td class="text-center">{{$trucks->vehicle_registration_number}}</td>
                                <td class="text-center"> {{$trucks->vehicle_make}}</td>
                                <td class="text-center"> {{$trucks->vehicle_model}}</td>
                                <td class="text-center"> {{$trucks->vehicle_year}}</td>
                                <td class="text-center"> {{$trucks->vehicle_status}}</td>
                                <td class="text-center">
                                  <form action="{{ route('truck.destroy', $trucks->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this truck?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>

                                  </form>
                                </td>


                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>

        </div>




    </div>










    </div>
  </div>
</div>
      <!--/ Data Tables -->


@endsection
