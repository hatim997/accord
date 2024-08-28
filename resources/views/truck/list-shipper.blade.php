@extends('layouts/contentNavbarLayout')
@section('title', ' Vertical Layouts - Forms')
@section('content')
@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp

<div class="col-12">
  <div class="card">
    <div class="table-responsive">
      <table class="table">
        <h4 class="mb-1 py-4 px-4">list of Shipper</h4>
        <thead class="table-light">
          <tr>
            <th class="text-truncate">User</th>
            <th class="text-truncate">Address</th>
            <th class="text-truncate">Cellphone</th>
            <th class="text-truncate">Email</th>
            <th class="text-truncate">Status</th>

          </tr>

        </thead>
        <tbody>
           @foreach ($ship as $ships)
          <tr>
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
      <!--/ Data Tables -->


@endsection
