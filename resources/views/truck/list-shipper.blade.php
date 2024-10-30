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


<div  class="container-xxl flex-grow-1 container-p-y">
  <div class="app-chat card overflow-hidden">
      <div class="row g-0">
  
   



      <div class="col app-chat-history  overflow-hidden" id="app-chat-contacts">
        <div class="chat-history-wrapper">
         <br>
        </div>
   
        <div class="sidebar-body" style="height: 70vh;overflow: auto;">
  
            <table class="table dataTable collapsed chat-contact-list" id="contact-list" style="width: 1193px;">
              <thead>
                <tr class="border-bottom">              
                   
                  <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 20px;"
                    aria-label="order: activate to sort column ascending">User</th>
                  <th class=" " tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                    style="width: 134px;" aria-label="date: activate to sort column descending" aria-sort="ascending">Address</th>              
                  <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                    style="width: 101px;" aria-label="payment: activate to sort column ascending"> Cellphone</th>
                  <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                    style="width: 118px;" aria-label="status: activate to sort column ascending"> Email</th>
                    <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                    style="width: 267px;" aria-label="customers: activate to sort column ascending"> Status</th>
              
            
                </tr>
              </thead>
             
              <tbody class="tbody">
              
                @foreach ($ship as $ships)
                <tr class="parent">
                  <td>
                    <div class="d-flex align-items-center">
                   
                      <div>
                        <h6 class="mb-0 text-truncate"> {{$ships->name}}</h6>
              
                      </div>
                    </div>
      
                  </td>
                  <td class="text-truncate">{{$ships->address}}</td>
                  <td class="text-truncate">{{$ships->cellphone}}</td>
                  <td class="text-truncate">{{$ships->extra_email}}</td>
      <td>
                  <span class="badge bg-label-success rounded-pill">Active</span>
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
      <!--/ Data Tables -->


@endsection
