@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp
@extends('layouts/contentNavbarLayout')
@section('title', ' Certificate - First Step')
@section('content')

    <form method="post" action="{{ route('shipper.limit') }}">
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
                                             
                                            <h4 class="form-check-label" for="{{ $pt->id }}">
                                                {{ $pt->type_name }}
                                            </h4>
                                        </div>
                                        <table width="100%" cellpadding="0" cellspacing="0"
                                        border="0" class="agenc_sub_table ng-tns-c268-42">
                                        <tbody class="ng-tns-c268-42">
                                            @foreach ($pt->policyLimits as $pl)
                                            <tr class="ng-tns-c268-42">
                                                <td width="50%"
                                                    class="lable_title_normal ng-tns-c268-42">
                                                    {{ $pl->coverage_item }}</td>
                                                <td class="ng-tns-c268-42">
                                                    <mat-form-field appearance="outline"
                                                        class="mat-form-field dolinpu input_c_r ng-tns-c268-42 ng-tns-c70-70 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float mat-form-field-should-float ng-untouched ng-pristine ng-valid ng-star-inserted"
                                                        style="">
                                                        <div
                                                            class="mat-form-field-wrapper ng-tns-c70-70">
                                                            <div
                                                                class="mat-form-field-flex ng-tns-c70-70">
                                                                <div
                                                                    class="mat-form-field-outline ng-tns-c70-70 ng-star-inserted">
                                                                    <div class="mat-form-field-outline-start ng-tns-c70-70"
                                                                        style="width: 0px;">
                                                                    </div>
                                                                    <div class="mat-form-field-outline-gap ng-tns-c70-70"
                                                                        style="width: 0px;">
                                                                    </div>
                                                                    <div
                                                                        class="mat-form-field-outline-end ng-tns-c70-70">
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-70 ng-star-inserted">
                                                                    <div class="mat-form-field-outline-start ng-tns-c70-70"
                                                                        style="width: 0px;">
                                                                    </div>
                                                                    <div class="mat-form-field-outline-gap ng-tns-c70-70"
                                                                        style="width: 0px;">
                                                                    </div>
                                                                    <div
                                                                        class="mat-form-field-outline-end ng-tns-c70-70">
                                                                    </div>
                                                                </div>
                                                               
                                                                <div
                                                                    class="mat-form-field-infix ng-tns-c70-70 mb-4">
                                                                    <input type="number" class="form-control" id="{{ $pl->coverage_item }}"
                                                                        name="main_policy_coverage[{{ str_replace(' ', '_', $pt->id) }}][{{ $pl->id }}]"
                                                                        placeholder=""
                                                                        value="@if (isset(  $certPolimit ) ){{$certPolimit->where('policy_limit_id', $pl->id)->first()->amount??0 }}@endif"
                                                                        aria-invalid="false"
                                                                        aria-required="true"><span
                                                                        class="mat-form-field-label-wrapper ng-tns-c70-70"></span>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="mat-form-field-subscript-wrapper ng-tns-c70-70">
                                                                <div class="mat-form-field-hint-wrapper ng-tns-c70-70 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                    style="opacity: 1; transform: translateY(0%);">
                                                                    <div
                                                                        class="mat-form-field-hint-spacer ng-tns-c70-70">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </mat-form-field>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>



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
