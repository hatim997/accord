@extends('layouts/contentNavbarLayout')
@section('title', ' Vertical Layouts - Forms')
@section('content')
@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp

    <div class="row gy-4 justify-content-center">
        <div class="col-md-10 col-lg-10">

        <!-- Data Tables -->
        <div class="col-12">
            <div class="card">
              <div class="table-responsive">
                <table class="table">
                  <thead class="table-light">
                    <tr>
                      <th class="text-truncate">Uploaded Certificate from Shipper</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(!empty($shipper_certs ))
                      @foreach ($shipper_certs as $cert)
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">

                            <div>
                              <h6 class="mb-0 text-truncate">
                                <a href="{{route('download.certificate',$cert->path) }}"> Download {{ $cert->id }}  </a>
                              </h6>
                            </div>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <!--/ Data Tables -->
    </div>
@endsection
