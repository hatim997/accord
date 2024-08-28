@extends('layouts/contentNavbarLayout')
@section('title', ' Vertical Layouts - Forms')
@section('content')
@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp



    <div class="row gy-4 justify-content-center">
        <div class="col-md-10 col-lg-10">
          @php
          $user = request()->user();
      @endphp
          <form method="post" action="{{route('upload')}}" enctype="multipart/form-data">
            @csrf
            <div class="row gy-4 my-5 pb-5">
              <div class="col-10">
                   <div class="mb-3">
                    <input class="form-control" type="hidden"  value="{{ $user->id }}" name="user_id">
          <input class="form-control" type="file" name="file">
        </div>
      </div>
        <div class="col-2">
        <button type="submit" class="btn btn-primary" >
          + ADD
           </button>
          </div>
            </div>
        </form>


        <!-- Data Tables -->
        <div class="col-12">

    <div class="card">
      <div class="table-responsive">
        <table class="table">
          <thead class="table-light">
            <tr>
              <th class="text-truncate">User</th>
              <th class="text-truncate">Uploads</th>
              <th class="text-truncate">Action</th>

            </tr>
          </thead>
          <tbody>
             @foreach ($users as $user)

             <tr>
               <td>
                 <div class="d-flex align-items-center">

                   <div>
                     <h6 class="mb-0 text-truncate">{{$user->path}}</h6>
                     {{-- <small class="text-truncate">@amiccoo</small> --}}
                   </div>
                 </div>

               </td>

               <td> <span class="badge bg-label-success rounded-pill">Active</span></td>
               <td>
                 <div class="dropdown">
                   <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                   <div class="dropdown-menu">
                     <a class="dropdown-item"  href=""><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
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
