@php
$isMenu = false;
$navbarHideToggle = false;
@endphp
@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')


@section('content')
<div class="row gy-4">
 
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">policy list </h5> <small class="text-muted float-end">USER INFO</small>
        <div class=" d-flex justify-content-right align-items-center demo-inline-spacing">
            <button type="button" class="btn btn-primary btn-lg waves-effect waves-light" style="margin-right: 8%">
              <span class="tf-icons mdi mdi-checkbox-marked-circle-outline me-1"></span>Manage Complaince 
            </button>
            <button type="button" class="btn  btn-lg rounded-pill btn-outline-primary waves-effect" style="margin-right: 8%">
              <span class="tf-icons mdi mdi-plus me-1"></span>new Policy
            </button>
            <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0);">Another action</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>
                  </ul>
            </div>
      </div>
    </div>
         </div>
  <!-- Data Tables -->
  <div class="col-12">
    <div class="card">
      <div class="table-responsive">
        <table class="table">
          <thead class="table-light">
            <tr>
              <th class="text-truncate">truker</th>
              <th class="text-truncate">name</th>
              <th class="text-truncate">form #</th>
              <th class="text-truncate">print</th>
              <th class="text-truncate">Status</th>
              <th class="text-truncate">action</th>
            </tr>
          </thead>
          <tbody>
            {{-- {{ dd($insurance_data) ;}} --}}
            @foreach ($insurance_data as $data)

            <tr>
              <td>
                <div class="d-flex align-items-center">
                 <div>
                    <small class="text-truncate">{{$data->cname}}</small>
                  </div>
                </div>
              </td>
              <td class="text-truncate">{{$data->Iname}}</td>
             <td class="text-truncate">{{$data->POLICY_NUMBER}}</td>
              <td class="text-truncate">  
                <a href="{{ route('agent.pdf', ['id' => $data->id]) }}" class="btn btn-lg rounded-pill btn-outline-primary waves-effect" style="margin-right: 8%">
                <span class="tf-icons mdi mdi-printer me-1"></span> </a>
              </td>
              <td><span class="badge bg-label-warning rounded-pill">Pending</span></td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                  <div class="dropdown-menu">                
                    <a class="dropdown-item" onclick="openEditModal({{ $data->id }})"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                    <a class="dropdown-item" href="javascript:void(0);"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                  </div>
                </div>
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
