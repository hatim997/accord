@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp
@extends('layouts/contentNavbarLayout')
@section('title', 'Vertical Layouts - Forms')
@section('content')


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="row">
        <div class="col-xl">
            @foreach ($shipperLimt as $typeName => $records)
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h3 class="mb-0 text-center" style="font-weight:bold;">{{ $typeName }}</h3>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($records as $item)
                                @if (isset($pdfDetails[$item->policy_limit_id]))
                                    <div class="col-12 mb-1">
                                        <div class="card shadow-sm">
                                            <div class="card-body d-flex">
                                               <div  class="col-md-6" > <h6 style="font-size: 18px;" >{{ $item->coverage_item }}: </h6></div>
<div class="col-md-6">
                                                  @php
                                                  $amount = (float)$pdfDetails[$item->policy_limit_id];
                                              @endphp
                                              @if ($amount > $item->policy_amount)
                                                  <span style="color: rgb(0, 151, 0);font-weight:bold; font-size:20px;">{{ $amount }}</span>
                                              @else
                                                  <span style="color: red;font-weight:bold; font-size:20px;">{{ $amount }}</span>
                                              @endif
                                            </div>


                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
