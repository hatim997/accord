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
<div class="col-12">
  <div class="card">
    <div class="table-responsive">
      <table class="table dataTable collapsed chat-contact-list" id="contact-list" >
        <div class=" d-flex  justify-content-between my-5">

          <h4 class="mb-1 py-1 px-4 ">list of truck</h4>
          <a href="{{ route('add.truck') }}" class="btn btn-primary me-5 rounded-pill">Add More</a>
        </div>
        @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
          <thead class="table-light ">
          <tr>
            <th class="text-truncate">Vehicle Registration Number</th>
            <th class="text-truncate">Vehicle Make</th>
            <th class="text-truncate">Vehicle Model</th>
            <th class="text-truncate">Vehicle Year</th>
            <th class="text-truncate">Vehicle Capacity</th>
            <th class="text-truncate">Vehicle Status</th>
            <th class="text-truncate">Motor Carrier Number</th>
            <th class="text-truncate">License Number </th>
            <th class="text-truncate">License Expiry Date </th>
            <th class="text-truncate"> License Type </th>
            <th class="text-truncate">Years of Experience </th>
            <th class="text-truncate">Delete</th>

          </tr>

        </thead>
        <tbody>
           @foreach ($truck as $trucks)
           <tr class="parent">
            <td><h6 class="mb-0 text-truncate"> {{$trucks->vehicle_registration_number}}</h6> </td>  
            <td class="text-truncate">{{$trucks->vehicle_make}}</td>
            <td class="text-truncate">{{$trucks->vehicle_model}}</td>
            <td class="text-truncate">{{$trucks->vehicle_year}}</td>
            <td class="text-truncate">{{$trucks->vehicle_capacity}}</td>
            <td class="text-truncate">{{$trucks->vehicle_status}}</td>
            <td class="text-truncate">{{$trucks->mc_number}}</td>
            <td class="text-truncate">{{$trucks->license_number}}</td>
            <td class="text-truncate">{{$trucks->license_expiry_date}}</td>
            <td class="text-truncate">{{$trucks->license_type}}</td>
            <td class="text-truncate">{{$trucks->years_of_experience}}</td>
<td>
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
      <!--/ Data Tables -->


@endsection
