@php
$isMenu = false;
$navbarHideToggle = false;
@endphp
@extends('layouts/contentNavbarLayout')
@section('title', ' Vertical Layouts - Forms')
@section('content')

      <div class="table-responsive text-nowrap">
        <table class="table table-striped">
         <thead class="table-light">
            <tr>
              <th class="">Shipper Name</th>
              <th class="">File Name</th>
            </tr>
          </thead>
          <tbody>
             @foreach ($shipper_certificates as $sc)
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <div>
                    <h6 class="mb-0 "> {{$sc->user_shipper->name}}</h6>
                  </div>
                </div>
              </td>
              <td>
                <div class="d-flex align-items-center">
                  <div>
                    <h6 class="mb-0 ">
                      <a href="{{route('admin.download.certificate',$sc->path) }}"> Download {{ $sc->id }}  </a>
                    </h6>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <!--/ Striped Rows -->
  </div>
</div>
@endsection

@section('page-scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


@endsection
