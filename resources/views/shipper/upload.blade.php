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
          <form method="post" action="{{route('save.certificate')}}" enctype="multipart/form-data">
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

      </div>
    </div>
  </div>
        <!--/ Data Tables -->
    </div>


@endsection
