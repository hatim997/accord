@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp
@extends('layouts/contentNavbarLayout')
@section('title', ' Certificate - First Step')
@section('content')

    <form method="post" action="{{ route('form2') }}">
        @csrf
        <!-- Basic Layout -->
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif
        @if ($errors->any())

            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endforeach


        @endif



        <div class="row">
            <!---------------------------------------------------------------------------------------------------------------------------
                      --------------------------------------------------------------- PRODUCER  ---------------------------------------------------
                      ----------------------------------------------------------------------->
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Select type of certificate that you will be submitting for Expedited Transport
                            Inc</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-6">
                                <div class="mb-4">
                                    <div class="form-floating form-floating-outline mb-4">
                                        {{-- start loop --}}
                                        @foreach ($policytypes as $pt)
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" value="{{ $pt->id }}"
                                                    id="{{ $pt->id }}" name="policyGroup[]">
                                                <label class="form-check-label" for="{{ $pt->id }}">
                                                    {{ $pt->type_name }}
                                                </label>
                                            </div>
                                        @endforeach
                                        {{-- end loop --}}
                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Continue</button>
    </form>

@endsection
