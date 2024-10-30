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
  background-color: #f1f1f1; /* Highlight color */
  border: 1px solid #add5ff; /* Optional: Add a border */
}
</style>
@endpush
@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-2.1.0/datatables.min.js"></script>
   
    <script>
   $('#example').DataTable();
   $('#examplem').DataTable();
   $('#exampleb').DataTable();
   $('#examples').DataTable();
    </script>
@endsection
@section('content')
<div class="card">
    <div class="table-responsive">
      <table class="table dataTable collapsed chat-contact-list" id="contact-list" >
        <thead class="table-light">
          <tr>
            <th class="text-truncate">Campany name</th>
            <th class="text-truncate">Naic Number</th>
          

          </tr>     
        </thead>
        <tbody>
           @foreach ($certificate as $user)
        
           <tr class="parent">
             <td>
               <div class="d-flex align-items-center">
               
                 <div>
                   <h6 class="mb-0 text-truncate">{{$user->name}}</h6>
                   {{-- <small class="text-truncate">@amiccoo</small> --}}
                 </div>
               </div>
            
             </td>
             <td class="text-truncate">{{$user->naic_number}}</td>           
                      
           </tr>
               
          



          @endforeach
        </tbody>
      </table>
    </div>
  </div>@endsection