@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp
@extends('layouts/contentNavbarLayout')
@section('title', ' Certificate Form')
@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">INSURANCE/</span>INTERMODAL INTERCHANGE CERTIFICATE OF INSURANCE
    </h4>

    <div class="row">
        <div class="col-sm-2">
            <a href="{{ route('view_cert', $certificate->id) }}" class="btn btn-primary">View Certificate</a>
        </div>
        <div class="col-sm-1">
            <a href="{{ route('get_pdf', $certificate->id) }}" class="btn btn-primary rounded-pill">  <i class="mdi mdi-arrow-down-bold mdi-24px lh-0"></i></a>
        </div>

        <div class="col-sm-3">
            <a href="{{ route('edit_cert', $certificate->id) }}" class="btn btn-primary rounded-pill">  <i class="mdi mdi-pencil-box mdi-24px lh-0"></i> Edit Certificate</a>
        </div>
        <div class="col-sm-3">
            {{-- <a href="{{ route('view_cert', $certificate->id) }}" class="btn btn-light waves-effect waves-light" style="background-color:#3b235b  !important">PDF Certificate</a> --}}
        </div>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Policy</th>
                        <th>Insurance Provider Code</th>
                        <th>Policy Number</th>
                        <th>Issue Date</th>
                        <th>Start Date</th>
                        <th>Expiry Date</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    @foreach ($certPolicy as $cp)
                        <tr>
                            <td>{{ $cp->policy->policy_title }}</td>
                            <td>{{ $cp->insurance_provider_code }}</td>
                            <td>{{ $cp->policy_number }}</td>
                            <td>{{ $cp->issue_date }}</td>
                            <td>{{ $cp->start_date }}</td>
                            <td>{{ $cp->expiry_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    </div>

@endsection
