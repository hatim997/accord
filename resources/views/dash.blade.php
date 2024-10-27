@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp
@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - main')
@push('body-style')
    <link rel="stylesheet" href="{{ asset('assets/css/datatable.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/datatables-Cl.css') }}" />
    <style>
        thead,
        tbody,
        tfoot,
        tr,
        td,
        th {
            border-style: hidden !important;
            border: none !important;
        }

        .focus {
            border-radius: 7px;
            background-color: #f1f1f1;
            /* Highlight color */
            border: 1px solid #add5ff;
            /* Optional: Add a border */
        }

        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            /* Semi-transparent black overlay */
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease-out, display 0s 0.3s;
            /* Delay removing display until fade-out finishes */
        }

        /* Show the modal */
        .modal.open {
            display: flex;
            /* Switch to flex layout */
            opacity: 1;
            transition: opacity 0.3s ease-in;
            /* Fade-in effect */
        }

        /* Content scaling */
        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            transform: scale(0.8);
            /* Start small for animation */
            transition: transform 0.3s ease-out;
        }

        /* When the modal is open, scale content to full size */
        .modal.open .modal-content {
            transform: scale(1);
        }
    </style>
@endpush
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection

@section('content')
    <div class="row gy-4 justify-content-center " id="content">
        <div class="col-md-10 col-lg-10">
            <div class="row gy-4">
                <!-- Congratulations card -->
                <div class="col-md-4 col-lg-4">
                    <div class="card"
                        style="background: rgb(42,132,254); background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);">
                        <div class="card-body text-center" style="height: 220px;">
                            <h4 class="mb-1 py-4 text-white">Policy Expiring in a Month !</h4>
                            <h2 class="py-3 text-white card-title" style="font-size: 72px">
                                {{ isset($monthExp) ? $monthExp : 0 }}</h2>
                        </div>
                        <div fxlayout="row" fxlayoutalign="start center" class="total_box ng-tns-c246-95"
                            style="flex-direction: row; box-sizing: border-box; display: flex; place-content: center flex-start; align-items: center;">
                            <span class="ng-tns-c246-95">&nbsp;</span><span
                                class="num red-fg ng-tns-c246-95">&nbsp;</span><span
                                class="go-btn ng-tns-c246-95 open-modal-btn" data-modal="expiringPoliciesModal2"
                                tabindex="0">GO </span>
                        </div>
                    </div>
                </div>
                <!--/ Congratulations card -->
                <!-- Congratulations card -->
                <div class="col-md-4 col-lg-4">
                    <div class="card"
                        style="background: rgb(42,132,254); background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);">
                        <div class="card-body text-center" style="height: 220px;">
                            <h4 class="mb-1 py-4 text-white">Policy Expiring in a Week !</h4>
                            <h2 class="py-3 text-white card-title" style="font-size: 72px">
                                {{ isset($weekExp) ? $weekExp : 0 }}</h2>
                        </div>
                        <div fxlayout="row" fxlayoutalign="start center" class="total_box ng-tns-c246-95"
                            style="flex-direction: row; box-sizing: border-box; display: flex; place-content: center flex-start; align-items: center;">
                            <span class="ng-tns-c246-95">&nbsp;</span><span
                                class="num red-fg ng-tns-c246-95">&nbsp;</span><span
                                class="go-btn ng-tns-c246-95 open-modal-btn" data-modal="expiringPoliciesModal1"
                                tabindex="0">GO </span>
                        </div>
                    </div>
                </div>
                <!--/ Congratulations card -->
                <!-- Congratulations card -->
                <div class="col-md-4 col-lg-4">
                    <div class="card"
                        style="background: rgb(42,132,254); background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);">
                        <div class="card-body text-center" style="height: 220px;">
                            <h4 class="mb-1 py-4 text-white">No of Insureds !</h4>
                            <h2 class="py-3 text-white card-title" style="font-size: 72px">
                                {{ isset($insuredCnt) ? $insuredCnt : 0 }}</h2>
                        </div>
                        <div fxlayout="row" fxlayoutalign="start center" class="total_box ng-tns-c246-95"
                            style="flex-direction: row; box-sizing: border-box; display: flex; place-content: center flex-start; align-items: center;">
                            <span class="ng-tns-c246-95">&nbsp;</span><span
                                class="num red-fg ng-tns-c246-95">&nbsp;</span><a href="{{ route('insur') }}"><span
                                    class="go-btn ng-tns-c246-95 " tabindex="0">GO </span></a>
                        </div>
                    </div>
                </div>
                <!--/ Congratulations card -->
            </div>
        </div>



        <div class="modal" id="expiringPoliciesModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Policies Expiring in a Week</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if ($weekExpolicies->isEmpty())
                            <p>No policies expiring within a week.</p>
                        @else
                            <div class="container mt-5 px-2">


                                <div class="table-responsive">
                                    <table class="table table-responsive table-borderless">

                                        <thead>
                                            <tr class="bg-light">


                                                <th scope="col" width="15%">Policy <br> ID</th>
                                                <th scope="col" width="20%">Policy <br>Type Name</th>
                                                <th scope="col" width="20%">Policy<br> Number</th>
                                                <th scope="col" width="22%">Policy<br>Start Date</th>
                                                <th scope="col" width="22%">Expiry Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($monthExpolicies as $policy)
                                                <tr>

                                                    <td>{{ $policy->policy_type_id }}</td>
                                                    <td><span class="ms-1">{{ $policy->names }}</span></td>
                                                    <td>{{ $policy->policy_number }}</td>
                                                    <td>{{ $policy->start_date }}</td>
                                                    <td>{{ $policy->expiry_date }}</td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>

                            </div>

                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary "
                            style="border:none;border-radius:3px;background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal" id="expiringPoliciesModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Policies Expiring in a Month</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if ($monthExpolicies->isEmpty())
                            <p>No policies expiring within a Month.</p>
                        @else
                            <div class="container mt-5 px-2">


                                <div class="table-responsive">
                                    <table class="table table-responsive table-borderless">

                                        <thead>
                                            <tr class="bg-light">


                                                <th scope="col" width="15%">Policy <br> ID</th>
                                                <th scope="col" width="20%">Policy <br>Type Name</th>
                                                <th scope="col" width="20%">Policy<br> Number</th>
                                                <th scope="col" width="22%">Policy<br>Start Date</th>
                                                <th scope="col" width="22%">Expiry Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($monthExpolicies as $policy)
                                                <tr>

                                                    <td>{{ $policy->policy_type_id }}</td>
                                                    <td><span class="ms-1">{{ $policy->names }}</span></td>
                                                    <td>{{ $policy->policy_number }}</td>
                                                    <td>{{ $policy->start_date }}</td>
                                                    <td>{{ $policy->expiry_date }}</td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>

                            </div>




                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-btn"
                            style="border:none;border-radius:3px;background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        @if ($agencyinfo->is_active == '1')
            <div class="container mt-5 px-2">

                <div class="mb-2 d-flex justify-content-between align-items-center">
                    <div class="position-relative">

                        <h4 class="mb-0 py-4 px-4 fw-bold">Carrier List</h4>
                    </div>




                </div>

                <div class="table-responsive">
                    <table class="table table-responsive " style="border: 0px">

                        <thead>
                            <tr class="bg-light">

                                {{-- <th scope="col" width="5%">#</th> --}}
                                <th scope="col" width="20%" class="text-center">Company Names</th>
                                <th scope="col" width="10%" class="text-center">UsDot #</th>
                                <th scope="col" width="20%" class="text-center">MC#</th>
                                <th scope="col" width="20%" class="text-center">Status</th>
                                <th scope="col" width="20%" class="text-center"><span>view COI</span></th>
                            </tr>
                        </thead>
                        <tbody style="background-color: #fff;">
                            <tr>
                                @foreach ($brokersinfo as $bi)
                                    @if ($bi->user->role == 'freight_driver')
                                        {{-- <td>12</td> --}}
                                        <td class="text-center">{{ $bi->driver->name }}</td>
                                        <td class="text-center"><i class="fa fa-check-circle-o green"></i><span
                                                class="ms-1"> {{ $bi->driver->usdot }}</span></td>
                                        <td class="text-center"> {{ $bi->driver->mc_number }}</td>
                                        <td class="text-center">
                                            @if ($bi->driver->status == '1')
                                                <span class="badge bg-label-success rounded-pill">Active</span>
                                            @else
                                                <span class="badge bg-label-danger rounded-pill">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="text-end text-center"><span class="fw-bolder">
                                                <div class="d-flex text-center justify-content-center flex-row">
                                                    <a target="blank" href="get_pdf/{{ $bi->id }}"
                                                        class="text-center"><span class="text-center">
                                                          <svg
                                                                xmlns="http://www.w3.org/2000/svg" class="text-center"
                                                                width="2em" height="2em" viewBox="0 0 16 16">

                                                                <defs>
                                                                    <linearGradient id="a" x1="625.787"
                                                                        y1="825.641" x2="632.847" y2="812.848"
                                                                        gradientTransform="translate(-610.232 -803.285) rotate(0.063)"
                                                                        gradientUnits="userSpaceOnUse">
                                                                        <stop offset="0" stop-color="#ffffff" />
                                                                        <stop offset="1" stop-color="#e1e1e1" />
                                                                    </linearGradient>
                                                                    <linearGradient id="b" x1="634.081"
                                                                        y1="810.251" x2="635.169" y2="809.248"
                                                                        gradientTransform="translate(-610.524 -802.52)"
                                                                        gradientUnits="userSpaceOnUse">
                                                                        <stop offset="0" stop-color="#ffffff" />
                                                                        <stop offset="1" stop-color="#c8c8c8" />
                                                                    </linearGradient>
                                                                    <linearGradient id="c" x1="14.019"
                                                                        y1="-116.816" x2="10.665" y2="-106.493"
                                                                        gradientTransform="matrix(1, 0, 0, -1, 0.04, -103.785)"
                                                                        gradientUnits="userSpaceOnUse">
                                                                        <stop offset="0.127" stop-color="#8a0000" />
                                                                        <stop offset="0.244" stop-color="#900000"
                                                                            stop-opacity="0.999" />
                                                                        <stop offset="0.398" stop-color="#a00000"
                                                                            stop-opacity="0.999" />
                                                                        <stop offset="0.573" stop-color="#bc0000"
                                                                            stop-opacity="0.998" />
                                                                        <stop offset="0.761" stop-color="#e20000"
                                                                            stop-opacity="0.997" />
                                                                        <stop offset="0.867" stop-color="#fa0000"
                                                                            stop-opacity="0.996" />
                                                                    </linearGradient>
                                                                    <linearGradient id="d" x1="14.16"
                                                                        y1="-117.225" x2="10.541" y2="-106.084"
                                                                        gradientTransform="matrix(1, 0, 0, -1, 0.04, -103.785)"
                                                                        gradientUnits="userSpaceOnUse">
                                                                        <stop offset="0.315" stop-color="#5e0000" />
                                                                        <stop offset="0.444" stop-color="#830000"
                                                                            stop-opacity="0.999" />
                                                                        <stop offset="0.618" stop-color="#ae0000"
                                                                            stop-opacity="0.998" />
                                                                        <stop offset="0.775" stop-color="#cd0000"
                                                                            stop-opacity="0.997" />
                                                                        <stop offset="0.908" stop-color="#e00000"
                                                                            stop-opacity="0.996" />
                                                                        <stop offset="1" stop-color="#e70000"
                                                                            stop-opacity="0.996" />
                                                                    </linearGradient>
                                                                </defs>
                                                                <title>file_type_pdf</title>
                                                                <image width="490" height="641"
                                                                    transform="translate(8.426 2.792) scale(0.042)"
                                                                    xlink:href="data:image/png;base64,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gA4INgB0QLABoAOCDQAdEGwA6IBgA0AHBBsAOiDYANABwQaADgg2AHRAsAGgA4INAB0QbADogGADQAcEGwA6INgA0AHBBoAOCDYAdECwAaADgg0AHRBsAOiAYANABwQbADog2ADQAcEGgA4INgB0QLABoAOCDQAdEGwA6IBgA0AHBBsAOiDYANABwQaADgg2AHRAsAGgA4INAB0QbADogGADQAcEGwA6INgA0AHBBoAOCDYAdECwAaADgg0AHRBsAOiAYANABwQbADog2ADQAcEGgA4INgB0QLABoAOCDQAdEGwA6IBgA0AHBBsAOiDYANABwQaADgg2AHRAsAGgA4INAB0QbADogGADQAcEGwA6INgA0AHBBoAOCDYAdECwAaADgg0AHRBsAOiAYANABwQbADog2ADQAcEGgA4INgB0QLABoAOCDQAdEGwA6IBgA0AHBBsAOiDYANABwQaADgg2AHRAsAGgA4INAB0QbADogGADQAcEGwA6INgA0AHBBoAOCDYAdECwAaADgg0AHRBsAOiAYANABwQbADog2ADQAcEGgA4INgB0QLABoAOCDQAdEGwA6IBgA0AHBBsAOiDYANABwQaADgg2AHRAsAGgA4INAB0QbADogGADQAcEGwA6INgA0AHBBoAOCDYAdECwAaADgg0AHRBsAOiAYANABwQbADog2ADQAcEGgA4INgB0QLABoAOCDQAdEGwA6IBgA0AHBBsAOiDYANABwQaADgg2AHRAsAGgA4INAB0QbADogGADQAcEGwA6INgA0AHBBoAOCDYAdECwAaADgg0AHRBsAOiAYANABwQbADog2ADQAcEGgA4INgB0QLABoAOCDQAdEGwA6IBgA0AHBBsAOiDYANABwQaADgg2AHRAsAGgA4INAB0QbADogGADQAcEGwA6INgA0AHBBoAOCDYAdECwAaADgg0AHRBsAOiAYANABwQbADog2ADQAcEGgA4INgB0QLABoAOCDQAdEGwA6IBgA0AHBBsAOiDYANABwQaADgg2AHRAsAGgA4INAB0QbADogGADQAcEGwA6INgA0AHBBoAOCDYAdECwAaADgg0AHRBsAOiAYANABwQbADog2ADQAcEGgA4INgB0QLABoAOCDQAdEGwA6IBgA0AHBBsAOiDYANABwQaADgg2AHRAsAGgA4INAB0QbADogGADQAcE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"
                                                                    style="opacity:0.75;isolation:isolate" />
                                                                <path
                                                                    d="M9.064,3.162h11.6A31.459,31.459,0,0,1,28.188,10.7V28.542H9.064Z"
                                                                    style="fill:url(#a)" />
                                                                <path
                                                                    d="M9.064,3.162h11.6A31.459,31.459,0,0,1,28.188,10.7V28.542H9.064Z"
                                                                    style="fill:none;stroke:#c8c8c8;stroke-width:0.5px" />
                                                                <image width="213" height="212"
                                                                    transform="translate(20.01 2.5) scale(0.041 0.042)"
                                                                    xlink:href="data:image/png;base64,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"
                                                                    style="opacity:0.75;isolation:isolate" />
                                                                <path
                                                                    d="M20.662,3.162A31.807,31.807,0,0,1,28.188,10.7a6.765,6.765,0,0,0-5.332-2.03A6.025,6.025,0,0,0,20.662,3.162Z"
                                                                    style="fill:url(#b)" />
                                                                <path
                                                                    d="M20.662,3.162A31.807,31.807,0,0,1,28.188,10.7a6.765,6.765,0,0,0-5.332-2.03A6.025,6.025,0,0,0,20.662,3.162Z"
                                                                    style="fill:none;stroke:#c8c8c8;stroke-width:0.5px" />
                                                                <rect x="5.339" y="6.496" width="14.1" height="2.7"
                                                                    style="fill:none;stroke:#c8c8c8;stroke-width:4px" />
                                                                <path
                                                                    d="M15.819,19.855c.466-.914,1-1.943,1.42-2.977h0l.168-.408c-.554-2.108-.886-3.8-.589-4.894h0a.755.755,0,0,1,.763-.458h0l.215,0h.039c.484-.007.711.608.737.847h0a3.847,3.847,0,0,1-.141,1.072h0a2.639,2.639,0,0,0-.161-1.091h0c-.2-.439-.391-.7-.562-.743h0a.54.54,0,0,0-.2.407h0a5.874,5.874,0,0,0-.077.939h0a10.511,10.511,0,0,0,.433,2.729h0c.054-.156.1-.306.14-.447h0c.059-.222.433-1.691.433-1.691h0s-.094,1.956-.226,2.547h0c-.028.125-.059.249-.092.375h0a8.586,8.586,0,0,0,2.145,3.351h0a6.7,6.7,0,0,0,1.24.852h0a16.9,16.9,0,0,1,2.517-.189h0a3.153,3.153,0,0,1,1.938.433h0a.738.738,0,0,1,.213.484h0a1.446,1.446,0,0,1-.041.282h0c.01-.051.01-.3-.755-.546h0a8.91,8.91,0,0,0-3.086-.043h0c1.566.766,3.093,1.147,3.576.919h0a1.015,1.015,0,0,0,.262-.254h0a2.727,2.727,0,0,1-.146.484h0a.764.764,0,0,1-.377.258h0c-.764.2-2.752-.268-4.485-1.258h0a36.619,36.619,0,0,0-5.768,1.371h0c-1.675,2.936-2.935,4.284-3.959,3.771h0l-.377-.189a.436.436,0,0,1-.141-.474h0c.119-.584.852-1.465,2.324-2.344h0c.158-.1.864-.469.864-.469h0s-.523.506-.645.605h0c-1.175.963-2.042,2.174-2.021,2.644h0l0,.041c1-.142,2.495-2.174,4.419-5.939m.61.312c-.321.605-.636,1.166-.926,1.682h0a24.582,24.582,0,0,1,4.975-1.408h0c-.221-.153-.435-.314-.637-.485h0a8.531,8.531,0,0,1-2.1-2.729h0a23.388,23.388,0,0,1-1.317,2.94"
                                                                    style="fill:#f91d0a" />
                                                                <image width="445" height="171"
                                                                    transform="translate(3.157 4.439) scale(0.042 0.041)"
                                                                    xlink:href="data:image/png;base64,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"
                                                                    style="opacity:0.30000000000000004;isolation:isolate" />
                                                                <rect x="3.75" y="4.968" width="17.264" height="5.803"
                                                                    style="fill:url(#c)" />
                                                                <path
                                                                    d="M21.343,11.119H3.437V4.62H21.343ZM20.7,5.264H4.081v5.209H20.7Z"
                                                                    style="fill:url(#d)" />
                                                                <path
                                                                    d="M8.262,5.819H9.518a1.1,1.1,0,0,1,.859.331,1.338,1.338,0,0,1,.3.937,1.351,1.351,0,0,1-.3.942,1.1,1.1,0,0,1-.859.328h-.5V9.706H8.262V5.819m.757.726V7.631h.419a.423.423,0,0,0,.34-.141.611.611,0,0,0,.12-.4.6.6,0,0,0-.12-.4.422.422,0,0,0-.34-.141H9.019m2.949.031V8.949h.271a.853.853,0,0,0,.708-.3,1.382,1.382,0,0,0,.246-.885,1.375,1.375,0,0,0-.244-.88.858.858,0,0,0-.71-.3h-.271m-.757-.758h.8A2.9,2.9,0,0,1,13,5.947a1.283,1.283,0,0,1,.562.427,1.779,1.779,0,0,1,.307.607,2.783,2.783,0,0,1,.1.779,2.831,2.831,0,0,1-.1.786,1.779,1.779,0,0,1-.307.607,1.313,1.313,0,0,1-.566.43,2.965,2.965,0,0,1-.991.125h-.8V5.819m3.342,0H16.6v.758H15.31V7.3h1.209v.758H15.31V9.706h-.757V5.819"
                                                                    style="fill:#fff9f9" />

                                                            </svg></span></a>

                                                </div>
                                            </span></td>
                            </tr>
        @endif
        @endforeach

        </tbody>
        </table>

    </div>

    </div>

    <div class="container mt-5 px-2">

        <div class="mb-2 d-flex justify-content-between align-items-center">
            <div class="position-relative">

                <h4 class="mb-0 py-4 px-4 fw-bold">Brocker List</h4>
            </div>




        </div>

        <div class="table-responsive">
            <table class="table table-responsive " style="border: 0px">

                <thead>
                    <tr class="bg-light">

                        {{-- <th scope="col" width="5%">#</th> --}}
                        <th scope="col" width="20%" class="text-center">Company Names</th>
                        <th scope="col" width="10%" class="text-center">UsDot #</th>
                        <th scope="col" width="20%" class="text-center">MC#</th>
                        <th scope="col" width="20%" class="text-center">Status</th>
                        <th scope="col" width="20%" class="text-center"><span>view COI</span></th>
                    </tr>
                </thead>
                <tbody style="background-color: #fff;">
                    <tr>
                        @foreach ($brokersinfo as $bi)
                            @if ($bi->user->role == 'truck_driver')
                                {{-- <td>12</td> --}}
                                <td class="text-center">{{ $bi->driver->name }}</td>
                                <td class="text-center"><i class="fa fa-check-circle-o green"></i><span class="ms-1">
                                        {{ $bi->driver->usdot }}</span></td>
                                <td class="text-center"> {{ $bi->driver->mc_number }}</td>
                                <td class="text-center">
                                    @if ($bi->driver->status == '1')
                                        <span class="badge bg-label-success rounded-pill">Active</span>
                                    @else
                                        <span class="badge bg-label-danger rounded-pill">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-end text-center"><span class="fw-bolder">
                                        <div class="d-flex text-center justify-content-center flex-row">
                                            <a target="blank" href="get_pdf/{{ $bi->id }}"
                                                class="text-center"><span class="text-center"> <svg
                                                  xmlns="http://www.w3.org/2000/svg" class="text-center"
                                                  width="2em" height="2em" viewBox="0 0 16 16">

                                                  <defs>
                                                      <linearGradient id="a" x1="625.787"
                                                          y1="825.641" x2="632.847" y2="812.848"
                                                          gradientTransform="translate(-610.232 -803.285) rotate(0.063)"
                                                          gradientUnits="userSpaceOnUse">
                                                          <stop offset="0" stop-color="#ffffff" />
                                                          <stop offset="1" stop-color="#e1e1e1" />
                                                      </linearGradient>
                                                      <linearGradient id="b" x1="634.081"
                                                          y1="810.251" x2="635.169" y2="809.248"
                                                          gradientTransform="translate(-610.524 -802.52)"
                                                          gradientUnits="userSpaceOnUse">
                                                          <stop offset="0" stop-color="#ffffff" />
                                                          <stop offset="1" stop-color="#c8c8c8" />
                                                      </linearGradient>
                                                      <linearGradient id="c" x1="14.019"
                                                          y1="-116.816" x2="10.665" y2="-106.493"
                                                          gradientTransform="matrix(1, 0, 0, -1, 0.04, -103.785)"
                                                          gradientUnits="userSpaceOnUse">
                                                          <stop offset="0.127" stop-color="#8a0000" />
                                                          <stop offset="0.244" stop-color="#900000"
                                                              stop-opacity="0.999" />
                                                          <stop offset="0.398" stop-color="#a00000"
                                                              stop-opacity="0.999" />
                                                          <stop offset="0.573" stop-color="#bc0000"
                                                              stop-opacity="0.998" />
                                                          <stop offset="0.761" stop-color="#e20000"
                                                              stop-opacity="0.997" />
                                                          <stop offset="0.867" stop-color="#fa0000"
                                                              stop-opacity="0.996" />
                                                      </linearGradient>
                                                      <linearGradient id="d" x1="14.16"
                                                          y1="-117.225" x2="10.541" y2="-106.084"
                                                          gradientTransform="matrix(1, 0, 0, -1, 0.04, -103.785)"
                                                          gradientUnits="userSpaceOnUse">
                                                          <stop offset="0.315" stop-color="#5e0000" />
                                                          <stop offset="0.444" stop-color="#830000"
                                                              stop-opacity="0.999" />
                                                          <stop offset="0.618" stop-color="#ae0000"
                                                              stop-opacity="0.998" />
                                                          <stop offset="0.775" stop-color="#cd0000"
                                                              stop-opacity="0.997" />
                                                          <stop offset="0.908" stop-color="#e00000"
                                                              stop-opacity="0.996" />
                                                          <stop offset="1" stop-color="#e70000"
                                                              stop-opacity="0.996" />
                                                      </linearGradient>
                                                  </defs>
                                                  <title>file_type_pdf</title>
                                                  <image width="490" height="641"
                                                      transform="translate(8.426 2.792) scale(0.042)"
                                                      xlink:href="data:image/png;base64,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gA4INgB0QLABoAOCDQAdEGwA6IBgA0AHBBsAOiDYANABwQaADgg2AHRAsAGgA4INAB0QbADogGADQAcEGwA6INgA0AHBBoAOCDYAdECwAaADgg0AHRBsAOiAYANABwQbADog2ADQAcEGgA4INgB0QLABoAOCDQAdEGwA6IBgA0AHBBsAOiDYANABwQaADgg2AHRAsAGgA4INAB0QbADogGADQAcEGwA6INgA0AHBBoAOCDYAdECwAaADgg0AHRBsAOiAYANABwQbADog2ADQAcEGgA4INgB0QLABoAOCDQAdEGwA6IBgA0AHBBsAOiDYANABwQaADgg2AHRAsAGgA4INAB0QbADogGADQAcEGwA6INgA0AHBBoAOCDYAdECwAaADgg0AHRBsAOiAYANABwQbADog2ADQAcEGgA4INgB0QLABoAOCDQAdEGwA6IBgA0AHBBsAOiDYANABwQaADgg2AHRAsAGgA4INAB0QbADogGADQAcEGwA6INgA0AHBBoAOCDYAdECwAaADgg0AHRBsAOiAYANABwQbADog2ADQAcEGgA4INgB0QLABoAOCDQAdEGwA6IBgA0AHBBsAOiDYANABwQaADgg2AHRAsAGgA4INAB0QbADogGADQAcEGwA6INgA0AHBBoAOCDYAdECwAaADgg0AHRBsAOiAYANABwQbADog2ADQAcEGgA4INgB0QLABoAOCDQAdEGwA6IBgA0AHBBsAOiDYANABwQaADgg2AHRAsAGgA4INAB0QbADogGADQAcEGwA6INgA0AHBBoAOCDYAdECwAaADgg0AHRBsAOiAYANABwQbADog2ADQAcEGgA4INgB0QLABoAOCDQAdEGwA6IBgA0AHBBsAOiDYANABwQaADgg2AHRAsAGgA4INAB0QbADogGADQAcEGwA6INgA0AHBBoAOCDYAdECwAaADgg0AHRBsAOiAYANABwQbADog2ADQAcEGgA4INgB0QLABoAOCDQAdEGwA6IBgA0AHBBsAOiDYANABwQaADgg2AHRAsAGgA4INAB0QbADogGADQAcEGwA6INgA0AHBBoAOCDYAdECwAaADgg0AHRBsAOiAYANABwQbADog2ADQAcEGgA4INgB0QLABoAOCDQAdEGwA6IBgA0AHBBsAOiDYANABwQaADgg2AHRAsAGgA4INAB0QbADogGADQAcE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"
                                                      style="opacity:0.75;isolation:isolate" />
                                                  <path
                                                      d="M9.064,3.162h11.6A31.459,31.459,0,0,1,28.188,10.7V28.542H9.064Z"
                                                      style="fill:url(#a)" />
                                                  <path
                                                      d="M9.064,3.162h11.6A31.459,31.459,0,0,1,28.188,10.7V28.542H9.064Z"
                                                      style="fill:none;stroke:#c8c8c8;stroke-width:0.5px" />
                                                  <image width="213" height="212"
                                                      transform="translate(20.01 2.5) scale(0.041 0.042)"
                                                      xlink:href="data:image/png;base64,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"
                                                      style="opacity:0.75;isolation:isolate" />
                                                  <path
                                                      d="M20.662,3.162A31.807,31.807,0,0,1,28.188,10.7a6.765,6.765,0,0,0-5.332-2.03A6.025,6.025,0,0,0,20.662,3.162Z"
                                                      style="fill:url(#b)" />
                                                  <path
                                                      d="M20.662,3.162A31.807,31.807,0,0,1,28.188,10.7a6.765,6.765,0,0,0-5.332-2.03A6.025,6.025,0,0,0,20.662,3.162Z"
                                                      style="fill:none;stroke:#c8c8c8;stroke-width:0.5px" />
                                                  <rect x="5.339" y="6.496" width="14.1" height="2.7"
                                                      style="fill:none;stroke:#c8c8c8;stroke-width:4px" />
                                                  <path
                                                      d="M15.819,19.855c.466-.914,1-1.943,1.42-2.977h0l.168-.408c-.554-2.108-.886-3.8-.589-4.894h0a.755.755,0,0,1,.763-.458h0l.215,0h.039c.484-.007.711.608.737.847h0a3.847,3.847,0,0,1-.141,1.072h0a2.639,2.639,0,0,0-.161-1.091h0c-.2-.439-.391-.7-.562-.743h0a.54.54,0,0,0-.2.407h0a5.874,5.874,0,0,0-.077.939h0a10.511,10.511,0,0,0,.433,2.729h0c.054-.156.1-.306.14-.447h0c.059-.222.433-1.691.433-1.691h0s-.094,1.956-.226,2.547h0c-.028.125-.059.249-.092.375h0a8.586,8.586,0,0,0,2.145,3.351h0a6.7,6.7,0,0,0,1.24.852h0a16.9,16.9,0,0,1,2.517-.189h0a3.153,3.153,0,0,1,1.938.433h0a.738.738,0,0,1,.213.484h0a1.446,1.446,0,0,1-.041.282h0c.01-.051.01-.3-.755-.546h0a8.91,8.91,0,0,0-3.086-.043h0c1.566.766,3.093,1.147,3.576.919h0a1.015,1.015,0,0,0,.262-.254h0a2.727,2.727,0,0,1-.146.484h0a.764.764,0,0,1-.377.258h0c-.764.2-2.752-.268-4.485-1.258h0a36.619,36.619,0,0,0-5.768,1.371h0c-1.675,2.936-2.935,4.284-3.959,3.771h0l-.377-.189a.436.436,0,0,1-.141-.474h0c.119-.584.852-1.465,2.324-2.344h0c.158-.1.864-.469.864-.469h0s-.523.506-.645.605h0c-1.175.963-2.042,2.174-2.021,2.644h0l0,.041c1-.142,2.495-2.174,4.419-5.939m.61.312c-.321.605-.636,1.166-.926,1.682h0a24.582,24.582,0,0,1,4.975-1.408h0c-.221-.153-.435-.314-.637-.485h0a8.531,8.531,0,0,1-2.1-2.729h0a23.388,23.388,0,0,1-1.317,2.94"
                                                      style="fill:#f91d0a" />
                                                  <image width="445" height="171"
                                                      transform="translate(3.157 4.439) scale(0.042 0.041)"
                                                      xlink:href="data:image/png;base64,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"
                                                      style="opacity:0.30000000000000004;isolation:isolate" />
                                                  <rect x="3.75" y="4.968" width="17.264" height="5.803"
                                                      style="fill:url(#c)" />
                                                  <path
                                                      d="M21.343,11.119H3.437V4.62H21.343ZM20.7,5.264H4.081v5.209H20.7Z"
                                                      style="fill:url(#d)" />
                                                  <path
                                                      d="M8.262,5.819H9.518a1.1,1.1,0,0,1,.859.331,1.338,1.338,0,0,1,.3.937,1.351,1.351,0,0,1-.3.942,1.1,1.1,0,0,1-.859.328h-.5V9.706H8.262V5.819m.757.726V7.631h.419a.423.423,0,0,0,.34-.141.611.611,0,0,0,.12-.4.6.6,0,0,0-.12-.4.422.422,0,0,0-.34-.141H9.019m2.949.031V8.949h.271a.853.853,0,0,0,.708-.3,1.382,1.382,0,0,0,.246-.885,1.375,1.375,0,0,0-.244-.88.858.858,0,0,0-.71-.3h-.271m-.757-.758h.8A2.9,2.9,0,0,1,13,5.947a1.283,1.283,0,0,1,.562.427,1.779,1.779,0,0,1,.307.607,2.783,2.783,0,0,1,.1.779,2.831,2.831,0,0,1-.1.786,1.779,1.779,0,0,1-.307.607,1.313,1.313,0,0,1-.566.43,2.965,2.965,0,0,1-.991.125h-.8V5.819m3.342,0H16.6v.758H15.31V7.3h1.209v.758H15.31V9.706h-.757V5.819"
                                                      style="fill:#fff9f9" />

                                              </svg></span></a>

                                            <p style="margin: 0px" class="text-center">
                                                &nbsp;
                                            </p>
                                        </div>
                                    </span></td>
                    </tr>
                    @endif
                    @endforeach

                </tbody>
            </table>

        </div>

    </div>
@else
    <div class="bg-danger text-white">
        You are seeing this is because Admin is Processing your request, Please have Patience.
    </div>
    @endif



    </div>
@endsection
@push('body-scripts')
    <script>
        var openModalBtns = document.querySelectorAll(".open-modal-btn");
        var closeModalBtns = document.querySelectorAll(".close-btn");

<<<<<<< HEAD
        // Function to open the modal with overlay effect
        openModalBtns.forEach(function(btn) {
            btn.addEventListener("click", function() {
                var modalId = btn.getAttribute("data-modal");
                var modal = document.getElementById(modalId);

=======
  // Function to open the modal with overlay effect
  openModalBtns.forEach(function(btn) {
      btn.addEventListener("click", function() {
          var modalId = btn.getAttribute("data-modal");
          var modal = document.getElementById(modalId);
          

          // Display the modal and start the opening animation
          modal.style.display = "flex";
         
>>>>>>> dc010c0e50ee1a66c9821d96beb70033b7aae1c3

                // Display the modal and start the opening animation
                modal.style.display = "flex";


                setTimeout(function() {
                    modal.classList.add("open");
                }, 10); // Slight delay to trigger the CSS transitions
            });
        });

        // Function to close the modal with overlay effect
        closeModalBtns.forEach(function(btn) {
            btn.addEventListener("click", function() {
                var modalId = btn.getAttribute("data-modal");
                var modal = document.getElementById(modalId);

                // Start the closing animation
                modal.classList.remove("open");
                setTimeout(function() {
                    modal.style.display = "none"; // Hide the modal after animation
                }, 300); // Match the transition time in CSS
            });
        });

        // Close the modal when clicking outside the modal content
        window.onclick = function(event) {
            if (event.target.classList.contains("modal")) {
                var modal = event.target;

                // Start the closing animation
                modal.classList.remove("open");
                setTimeout(function() {
                    modal.style.display = "none"; // Hide the modal after animation
                }, 300); // Match the transition time in CSS
            }
        };
    </script>
@endpush
