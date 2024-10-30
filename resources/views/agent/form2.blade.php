@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp
@extends('layouts/contentNavbarLayout')
@section('title', ' Certificate Form')
@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">INSURANCE/</span>CERTIFICATE OF LIABILITY
        INSURANCE</span></td>
    </h4>
    <p>THIS CERTIFICATE IS ISSUED AS A MATTER OF INFORMATION ONLY AND CONFERS NO RIGHTS UPON THE CERTIFICATE HOLDER. THIS
        CERTIFICATE DOES NOT AFFIRMATIVELY OR NEGATIVELY AMEND, EXTEND OR ALTER THE COVERAGE AFFORDED BY THE POLICIES
        BELOW. THIS CERTIFICATE OF INSURANCE DOES NOT CONSTITUTE A CONTRACT BETWEEN THE ISSUING INSURER(S), AUTHORIZED
        REPRESENTATIVE OR PRODUCER, AND THE CERTIFICATE HOLDER.</p>
    <form method="post" action="{{ route('save_cert') }}">
        @csrf
        <!-- Basic Layout -->

        <div class="row">

            <!--------------- PRODUCER -------------->
            @include('agent.producer')

            <!----------- PRODUCER CONTACT info -------------->
            @include('agent.producer-contact')

            <!----------- INSURED info -------------->
            @include('agent.insured')

            <!----------- INSURER(S) AFFORDING COVERAGE -------------->
            @include('agent.insurance_company')

        </div>


        <h4 class="py-3 mb-4">TYPE OF INSURANCE <span class="text-muted fw-light">INSURANCE/</span>COVERAGES</h4>
        <p>POLICIES. AGGREGATE LIMITS SHOWN MAY HAVE BEEN REDUCED BY PAID CLAIMS.
            MAY PERTAIN, THE INSURANCE AFFORDED BY THE POLICIES DESCRIBED HEREIN IS SUBJECT TO ALL THE TERMS, EXCLUSIONS AND
            CONDITIONS OF SUCH
            ANY REQUIREMENT, TERM OR CONDITION OF ANY CONTRACT OR OTHER DOCUMENT WITH RESPECT TO WHICH THIS CERTIFICATE MAY
            BE ISSUED OR
            THE POLICIES OF INSURANCE LISTED BELOW HAVE BEEN ISSUED TO THE INSURED NAMED ABOVE FOR THE POLICY PERIOD
            INDICATED. NOTWITHSTANDING</p>

        @include('agent.agent-policy')

        <button type="submit" class="btn btn-primary">Generate</button>
    </form>

    @include('agent.agent-script')

@endsection
