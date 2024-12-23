{{-- @php
$isMenu = false;
$navbarHideToggle = false;
@endphp --}}
@extends('layouts/guest')
{{-- @section('title', ' Certificate Form') --}}

@push('body-css')
    <link rel="stylesheet" href="{{ asset('assets/css/form.css') }}" />
@endpush
<style>
  td{
    padding-left: 15px;
    padding-top: 10px;
    margin-bottom:8px;
  }
    .label-title {
        font-weight: bold;
        font-size: 16px;
        color: #333;
        padding: 10px;
        background-color: #f9f9f9;
    }

    .label-title-normal {
        font-size: 14px;
        color: #555;
        padding: 10px;
        background-color: #ffffff;
    }

    .insured-info {
        line-height: 1.5;
    }

    .insured-name {
        font-size: 16px;
        font-weight: bold;
    }

    .insured-address,
    .insured-city-state-zip,
    .insured-cellphone {
        font-size: 14px;
    }

    .insured-cellphone {
        font-style: italic;
        /* Optional: to differentiate the cellphone number */
    }

    .agency-info {
        line-height: 1.5;
    }

    .agency-name {
        font-size: 16px;
        font-weight: bold;
    }

    .agency-address,
    .agency-city-state-zip {
        font-size: 14px;
    }

    .agency-sub-table {
        border-collapse: collapse;
        width: 100%;
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }


    .tab-field-set {
        padding: 12px 8px;
        color: #555;
    }

    .contact-name {
        font-size: 16px;
        font-weight: bold;
        color: #333;
    }

    .ng-tns-c268-42 {
        line-height: 1.5;
    }
</style>
@section('content')
    <form method="post" action="{{ route('save_cert') }}" id="form">
        @csrf
        <div id="acordPage" fxlayout="row" class="page-layout simple right-sidebar ng-tns-c268-42"
            style="flex-direction: row; box-sizing: border-box; display: flex;">

            <div fuseperfectscrollbar="" class="center ng-tns-c268-42 ps"
                style="flex-direction: column; box-sizing: border-box; display: flex;">
                <div class="ps__rail-x" style="left: 0px; top: 0px;">
                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps__rail-y" style="top: 0px; left: 0px; height: 1357px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                </div>
                <div fxlayout="column" fxlayoutalign="space-between" class="header ng-tns-c268-42"
                    style="flex-direction: column; box-sizing: border-box; display: flex; place-content: stretch space-between; align-items: stretch;">
                    <div fxlayout="row wrap" fxflex="100%" fxflex.xs="100%" fxflex.sm="100%"
                        class="widget-group tableBox pt-0 ng-tns-c268-42 ng-trigger ng-trigger-animateStagger"
                        style="flex-flow: wrap; box-sizing: border-box; display: flex; flex: 1 1 100%; max-height: 100%;">
                        <div fxlayout="row" fxflex="100%" fxflex.xs="100%" fxflex.sm="100%"
                            class="widget ng-tns-c268-42 ng-trigger ng-trigger-animate"
                            style="flex-direction: row; box-sizing: border-box; display: flex; flex: 1 1 100%; max-width: 100%;">
                            <div class="fuse-widget-front ng-tns-c268-42">
                                <div fxlayout="row wrap" fxlayoutalign="start"
                                    class="ng-tns-c268-42 ng-trigger ng-trigger-slideIn ng-star-inserted"
                                    style="flex-flow: wrap; box-sizing: border-box; display: flex; place-content: stretch flex-start; align-items: stretch;">
                                    <div fxlayout="column" fxflex="100" fxflex.gt-xs="100" fxflex.gt-md="100"
                                        class="widget p-lr-24 ng-tns-c268-42 ng-trigger ng-trigger-animate"
                                        style="flex-direction: column; box-sizing: border-box; display: flex; flex: 1 1 100%; max-width: 100%;">
                                        <div class="widget-front box m-0 bn_n ng-tns-c268-42">
                                            <div fxlayout="row" fxlayoutalign="start" class="p-10 ng-tns-c268-42"
                                                style="flex-direction: row; box-sizing: border-box; display: flex; place-content: stretch flex-start; align-items: stretch;">
                                                <div novalidate="" name="acordForm" style="width: 100% !important;"
                                                    class="ng-tns-c268-42 ng-untouched ng-pristine ng-invalid">
                                                    <div id="accord_container" class="ng-tns-c268-42">
                                                        <table border="0" cellpadding="0" cellspacing="0"
                                                            class="tftable ng-tns-c268-42">
                                                            <tbody class="ng-tns-c268-42">
                                                                <tr class="ng-tns-c268-42">
                                                                    <td colspan="2" valign="middle"
                                                                        class="p-0 ng-tns-c268-42">
                                                                        <table width="100%" cellpadding="0"
                                                                            cellspacing="0" border="0"
                                                                            class="ng-tns-c268-42">
                                                                            <tr class="ng-tns-c268-42"
                                                                                style="display: flex; justify-content: center; align-items: center;">
                                                                                <td class="ng-tns-c268-42"
                                                                                    style="text-align: center;">
                                                                                    <span
                                                                                        class="acord_title ng-tns-c268-42"><img
                                                                                            src="{{ asset('assets/img/nlogo.png') }}"
                                                                                            width="91" height="39"
                                                                                            class="ng-tns-c268-42">
                                                                                        &nbsp;&nbsp;CERTIFICATE OF LIABILITY
                                                                                        INSURANCE</span>
                                                                                </td></span>
                                                                    </td>
                                                                    <td width="120px" class="date_top ng-tns-c268-42"
                                                                        style="text-align: right; padding-right: 10px;">
                                                                        <div class="mat-form-field-subscript-wrapper ng-tns-c70-48"
                                                                            style="position: relative; top: 10px; font-size: 12px;">
                                                                            {{ isset($certificate->created_at) ? date('m-d-Y', strtotime($certificate->created_at)) : '' }}
                                                                        </div>
                                                                    </td>

                                                                </tr>
                                                        </table>
                                                        </td>
                                                        </tr>
                                                      <tr class="ng-tns-c268-42" style="background-color: #f9f9f9;">
                                                          <td colspan="2" class="ng-tns-c268-42">
                                                              <div class="acord_title_matter ng-tns-c268-42"
                                                                   style="text-align: center; font-family: 'Arial', sans-serif; font-size: 11px; line-height: 1.5; color: #333;   border-radius: 5px;">
                                                                  THIS CERTIFICATE IS ISSUED AS A MATTER OF INFORMATION ONLY AND CONFERS
                                                                  NO RIGHTS UPON THE CERTIFICATE HOLDER. THIS CERTIFICATE DOES NOT
                                                                  AFFIRMATIVELY OR NEGATIVELY AMEND, EXTEND OR ALTER THE COVERAGE
                                                                  AFFORDED BY THE POLICIES BELOW. THIS CERTIFICATE OF INSURANCE
                                                                  DOES NOT CONSTITUTE A CONTRACT BETWEEN THE ISSUING INSURER(S),
                                                                  AUTHORIZED REPRESENTATIVE OR PRODUCER, AND THE CERTIFICATE HOLDER.
                                                              </div>
                                                          </td>
                                                      </tr>



                                                        <tr class="ng-tns-c268-42">
                                                            <td width="35%" valign="top" class="p-0 ng-tns-c268-42">
                                                                <table width="100%" cellpadding="0" cellspacing="0"
                                                                    border="0" style="min-height: 150px;"
                                                                    class="ng-tns-c268-42">
                                                                    <tbody class="ng-tns-c268-42">
                                                                        <tr height="123" class="ng-tns-c268-42">
                                                                            <td width="150" valign="middle"
                                                                                class="label-title ng-tns-c268-42">
                                                                                <strong>PRODUCER</strong>
                                                                            </td>
                                                                            <td valign="middle"
                                                                                class="label-title-normal ng-tns-c268-42">
                                                                                <div class="agency-info">
                                                                                    <span
                                                                                        class="agency-name">{{ $agent->agencies[0]->name }}</span><br
                                                                                        class="ng-tns-c268-42">
                                                                                    <span
                                                                                        class="agency-address">{{ $agent->agencies[0]->address }}</span><br
                                                                                        class="ng-tns-c268-42">
                                                                                    <span
                                                                                        class="agency-city-state-zip">{{ $agent->agencies[0]->city }},
                                                                                        {{ $agent->agencies[0]->state }}
                                                                                        {{ $agent->agencies[0]->zip }}</span>
                                                                                </div>
                                                                            </td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            {{-- <tr class="ng-tns-c268-42">
                                                              <td width="35%" valign="top" class="p-0 ng-tns-c268-42">
                                                                  <table width="100%" cellpadding="0" cellspacing="0"
                                                                      border="0" style="min-height: 150px;"
                                                                      class="ng-tns-c268-42">
                                                                      <tbody class="ng-tns-c268-42">
                                                                        <tr height="123" class="ng-tns-c268-42">
                                                                          <td width="150" valign="middle" class="label-title ng-tns-c268-42">
                                                                              <strong>PRODUCER</strong>
                                                                          </td>
                                                                          <td valign="middle" class="label-title-normal ng-tns-c268-42">
                                                                              <div class="agency-info">
                                                                                  <span class="agency-name">{{ $agent->agencies[0]->name }}</span><br class="ng-tns-c268-42">
                                                                                  <span class="agency-address">{{ $agent->agencies[0]->address }}</span><br class="ng-tns-c268-42">
                                                                                  <span class="agency-city-state-zip">{{ $agent->agencies[0]->city }}, {{ $agent->agencies[0]->state }} {{ $agent->agencies[0]->zip }}</span>
                                                                              </div>
                                                                          </td>
                                                                      </tr> --}}


                                                            <td width="65%" valign="top" class="p-0 ng-tns-c268-42">
                                                                <table width="100%" cellpadding="0" cellspacing="0"
                                                                    border="0" style="min-height: 150px;"
                                                                    class="ng-tns-c268-42">
                                                                    <tbody class="ng-tns-c268-42">
                                                                        <tr class="ng-tns-c268-42">
                                                                            <td class="label-title ng-tns-c268-42">
                                                                                <strong>CONTACT NAME:</strong>
                                                                            </td>
                                                                            <td class="ng-tns-c268-42">
                                                                                <span
                                                                                    class="contact-name">{{ $agent->name }}</span>
                                                                            </td>
                                                                            <td width="26%"
                                                                                class="label-title  ng-tns-c268-42">
                                                                                <strong>FAX (A/C, No):</strong>
                                                                            </td>
                                                                            <td width="26%"
                                                                                class="tab-field-set ng-tns-c268-42">
                                                                                {{ $agent->agencies[0]->fax }}</td>
                                                                        </tr>
                                                                        <tr class="ng-tns-c268-42">
                                                                            <td width="22%"
                                                                                class="label-title ng-tns-c268-42">
                                                                                <strong>PHONE</strong> (A/C, No, Ext):
                                                                            </td>
                                                                            <td class="ng-tns-c268-42">
                                                                                {{ $agent->agencies[0]->cellphone }}</td>

                                                                            <td width="25%"
                                                                                class="label-title ng-tns-c268-42">
                                                                                <strong>PRODUCER</strong> CUSTOMER ID #:
                                                                            </td>
                                                                            <td width="25%" class="ng-tns-c268-42">
                                                                                {{ $agent->agencies[0]->producer_customer_number }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="ng-tns-c268-42">
                                                                            <td width="22%"
                                                                                class="label-title ng-tns-c268-42">
                                                                                <strong>E-MAIL</strong> ADDRESS:
                                                                            </td>
                                                                            <td width="26%" class="ng-tns-c268-42">
                                                                                {{ $agent->email }}</td>

                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>


                                                        </tr>
                                                        <tr class="ng-tns-c268-42">
                                                            <td width="35%" valign="top" class="p-0 ng-tns-c268-42">
                                                                <table width="100%" cellpadding="0" cellspacing="0"
                                                                    border="0" style="min-height: 205px;"
                                                                    class="ng-tns-c268-42">
                                                                    <tbody class="ng-tns-c268-42">
                                                                        <tr height="173" class="ng-tns-c268-42">
                                                                            <td width="150" valign="middle"
                                                                                class="label-title ng-tns-c268-42">
                                                                                <strong>INSURED</strong>
                                                                            </td>
                                                                            <td valign="middle"
                                                                                class="label-title-normal pt-30 ng-tns-c268-42">
                                                                                <div class="insured-info">
                                                                                    <span
                                                                                        class="insured-name">{{ $driver->truckers[0]->name }}</span><br
                                                                                        class="ng-tns-c268-42">
                                                                                    <span
                                                                                        class="insured-address">{{ $driver->truckers[0]->address }}</span><br
                                                                                        class="ng-tns-c268-42">
                                                                                    <span
                                                                                        class="insured-city-state-zip">{{ $driver->truckers[0]->city }},
                                                                                        {{ $driver->truckers[0]->state }}
                                                                                        {{ $driver->truckers[0]->zip }}</span><br
                                                                                        class="ng-tns-c268-42">
                                                                                    {{-- <span class="insured-cellphone">Cell:
                                                                                        {{ $driver->truckers[0]->cellphone }}</span> --}}
                                                                                </div>
                                                                            </td>
                                                                        </tr>


                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td width="65%" valign="top" class="p-0 ng-tns-c268-42">
                                                                <table width="100%" cellpadding="0" cellspacing="0"
                                                                    border="0" formgroupname="iaInsurerForm"
                                                                    class="agenc_sub_table a_s_t_b"
                                                                    style="min-height: 205px; border-collapse: collapse; width: 100%; font-family: Arial, sans-serif; color: #333;">
                                                                    <tbody class="ng-tns-c268-42">
                                                                        <tr class="ng-tns-c268-42 " >
                                                                            <td width="22%"
                                                                                class="w-120 tab_fild_set ng-tns-c268-42">
                                                                            </td>
                                                                            <td width="26%" align="center"
                                                                                class="lable_title ng-tns-c268-42">
                                                                                INSURER(S)
                                                                                AFFORDING COVERAGE</td>
                                                                            <td width="26%" align="center"
                                                                                class="lable_title tab_fild_set ng-tns-c268-42">
                                                                                NAIC
                                                                                #</td>
                                                                            <td width="26%" align="center"
                                                                                class="lable_title tab_fild_set ng-tns-c268-42">
                                                                                BEST
                                                                                RATING</td>
                                                                        </tr>
                                                                        <tr class="ng-tns-c268-42">
                                                                          <td
                                                                              class="lable_title ng-tns-c268-42"
                                                                              style="padding-left: 15px; text-align: left;"
                                                                          >
                                                                              INSURER A :
                                                                          </td>
                                                                            <td class="ng-tns-c268-42" >
                                                                                <mat-form-field appearance="outline"
                                                                                    class="mat-form-field full-width-text ng-tns-c268-42 ng-tns-c70-49 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-valid ng-star-inserted"
                                                                                    style="">
                                                                                    <div
                                                                                        class="mat-form-field-wrapper ng-tns-c70-49">
                                                                                        <div
                                                                                            class="mat-form-field-flex ng-tns-c70-49">
                                                                                            <div
                                                                                                class="mat-form-field-outline ng-tns-c70-49 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-49"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-49"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-49">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-49 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-49"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-49"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-49">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-infix ng-tns-c70-49" style=" background-color : #FFFFFF ;">

                                                                                                @php
                                                                                                    $values = '';
                                                                                                @endphp
                                                                                                <select id="insurA"
                                                                                                    class="selecter">
                                                                                                    <option value="">
                                                                                                        -Select-</option>
                                                                                                    @foreach ($insurProviders as $ip)
                                                                                                        @php
                                                                                                            $isSelected = false;
                                                                                                        @endphp

                                                                                                        @foreach ($certPolicy as $policy)
                                                                                                            @if ($policy->insurance_provider_id == $ip->id && $policy->insurance_provider_code == 'A')
                                                                                                                @php
                                                                                                                    $isSelected = true;
                                                                                                                    break;
                                                                                                                @endphp
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                        <option
                                                                                                            {{ $isSelected ? 'selected' : '' }}
                                                                                                            data-naic="{{ $ip->naic_number }}"
                                                                                                            data-brn="{{ $ip->best_rating_number }}"
                                                                                                            value="{{ $ip->id }}">
                                                                                                            @php
                                                                                                                $values =
                                                                                                                    $ip->id;
                                                                                                            @endphp
                                                                                                            {{ $ip->name }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                                <input type="hidden"
                                                                                                    id="insurance_provider_id_A"
                                                                                                    name="insurance_provider_id[]"
                                                                                                    value="" />
                                                                                                <div id="insurerAList">
                                                                                                </div>
                                                                                                <mat-autocomplete
                                                                                                    panelwidth="auto"
                                                                                                    class="mat-autocomplete ng-tns-c70-49">
                                                                                                </mat-autocomplete><span
                                                                                                    class="mat-form-field-label-wrapper ng-tns-c70-49"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-subscript-wrapper ng-tns-c70-49">
                                                                                            <div class="mat-form-field-hint-wrapper ng-tns-c70-49 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                                style="opacity: 1; transform: translateY(0%);">
                                                                                                <div
                                                                                                    class="mat-form-field-hint-spacer ng-tns-c70-49">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </mat-form-field>
                                                                            </td>
                                                                            <td class="opd_td ng-tns-c268-42" >
                                                                                <mat-form-field appearance="outline"
                                                                                    class="mat-form-field full-width-text ng-tns-c268-42 ng-tns-c70-50 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-valid ng-star-inserted"
                                                                                    style="">
                                                                                    <div
                                                                                        class="mat-form-field-wrapper ng-tns-c70-50">
                                                                                        <div
                                                                                            class="mat-form-field-flex ng-tns-c70-50">
                                                                                            <div
                                                                                                class="mat-form-field-outline ng-tns-c70-50 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-50"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-50"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-50">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-50 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-50"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-50"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-50">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-infix ng-tns-c70-50" >
                                                                                                <input matinput=""
                                                                                                    placeholder="Enter Insurer A Details"
                                                                                                    formcontrolname="insNaicNoA"
                                                                                                    value="@if (isset($certPolicy)) {{ $certPolicy->first()->insuranceProvider->naic_number }} @endif"
                                                                                                    class="mat-input-element mat-form-field-autofill-control mat-autocomplete-trigger ng-tns-c70-50 ng-untouched ng-pristine ng-valid cdk-text-field-autofill-monitored"
                                                                                                    id="naic_a"
                                                                                                    data-placeholder="Enter Insurer A Details"
                                                                                                    aria-autocomplete="list"
                                                                                                    aria-expanded="false"
                                                                                                    aria-haspopup="listbox"
                                                                                                    readonly>
                                                                                                <mat-autocomplete
                                                                                                    panelwidth="auto"
                                                                                                    class="mat-autocomplete ng-tns-c70-50">
                                                                                                </mat-autocomplete><span
                                                                                                    class="mat-form-field-label-wrapper ng-tns-c70-50"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-subscript-wrapper ng-tns-c70-50">
                                                                                            <div class="mat-form-field-hint-wrapper ng-tns-c70-50 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                                style="opacity: 1; transform: translateY(0%);">
                                                                                                <div
                                                                                                    class="mat-form-field-hint-spacer ng-tns-c70-50">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </mat-form-field>
                                                                            </td>
                                                                            <td class="ng-tns-c268-42">
                                                                                <mat-form-field appearance="outline"
                                                                                    class="mat-form-field full-width-text ng-tns-c268-42 ng-tns-c70-51 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-valid ng-star-inserted"
                                                                                    style="">
                                                                                    <div
                                                                                        class="mat-form-field-wrapper ng-tns-c70-51">
                                                                                        <div
                                                                                            class="mat-form-field-flex ng-tns-c70-51">
                                                                                            <div
                                                                                                class="mat-form-field-outline ng-tns-c70-51 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-51"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-51"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-51">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-51 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-51"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-51"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-51">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-infix ng-tns-c70-51">
                                                                                                <input autocomplete="off"
                                                                                                    matinput=""
                                                                                                    formcontrolname="insBestRatingA"
                                                                                                    readonly="true"
                                                                                                    value=""
                                                                                                    class="mat-input-element mat-form-field-autofill-control ng-tns-c70-51 ng-untouched ng-pristine ng-valid cdk-text-field-autofill-monitored"
                                                                                                    id="br_a"
                                                                                                    aria-invalid="false"
                                                                                                    aria-required="false"
                                                                                                    readonly><span
                                                                                                    class="mat-form-field-label-wrapper ng-tns-c70-51"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-subscript-wrapper ng-tns-c70-51">
                                                                                            <div class="mat-form-field-hint-wrapper ng-tns-c70-51 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                                style="opacity: 1; transform: translateY(0%);">
                                                                                                <div
                                                                                                    class="mat-form-field-hint-spacer ng-tns-c70-51">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </mat-form-field>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="ng-tns-c268-42">
                                                                          <td
                                                                              class="lable_title ng-tns-c268-42"
                                                                              style="padding-left: 15px; text-align: left;"
                                                                          >
                                                                              INSURER B :
                                                                          </td>
                                                                            <td class="ng-tns-c268-42">
                                                                                <mat-form-field appearance="outline"
                                                                                    class="mat-form-field full-width-text ng-tns-c268-42 ng-tns-c70-52 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-valid ng-star-inserted"
                                                                                    style="">
                                                                                    <div
                                                                                        class="mat-form-field-wrapper ng-tns-c70-52">
                                                                                        <div
                                                                                            class="mat-form-field-flex ng-tns-c70-52">
                                                                                            <div
                                                                                                class="mat-form-field-outline ng-tns-c70-52 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-52"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-52"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-52">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-52 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-52"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-52"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-52">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-infix ng-tns-c70-52" style=" background-color : #FFFFFF ;">
                                                                                                {{-- <input
                                                                                                placeholder="Enter Insurer B Details"
                                                                                                value="@if (isset($certPolicy) && null !== $certPolicy->skip(1)->take(1)->first()){{ $certPolicy->skip(1)->take(1)->first()->insuranceProvider->name }} @endif"
                                                                                                class="js-example-basic-single form-control mat-input-element mat-form-field-autofill-control mat-autocomplete-trigger ng-tns-c70-49 ng-untouched ng-pristine ng-valid cdk-text-field-autofill-monitored"
                                                                                                id="insurB"
                                                                                                data-placeholder="Enter Insurer B Details"> --}}
                                                                                                @php
                                                                                                    $values = '';
                                                                                                @endphp
                                                                                                <select id="insurB"
                                                                                                    class="selecter">
                                                                                                    <option value="">
                                                                                                        -Select-</option>
                                                                                                    @foreach ($insurProviders as $ip)
                                                                                                        @php
                                                                                                            $isSelected = false;
                                                                                                        @endphp

                                                                                                        @foreach ($certPolicy as $policy)
                                                                                                            @if ($policy->insurance_provider_id == $ip->id && $policy->insurance_provider_code == 'B')
                                                                                                                @php
                                                                                                                    $isSelected = true;
                                                                                                                    break;
                                                                                                                @endphp
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                        <option
                                                                                                            {{ $isSelected ? 'selected' : '' }}
                                                                                                            data-naic="{{ $ip->naic_number }}"
                                                                                                            data-brn="{{ $ip->best_rating_number }}"
                                                                                                            value="{{ $ip->id }}">
                                                                                                            @php
                                                                                                                $values =
                                                                                                                    $ip->id;
                                                                                                            @endphp
                                                                                                            {{ $ip->name }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                                <input type="hidden"
                                                                                                    id="insurance_provider_id_B"
                                                                                                    name="insurance_provider_id[]"
                                                                                                    value="" />
                                                                                                <div id="insurerBList">
                                                                                                </div>
                                                                                                <mat-autocomplete
                                                                                                    panelwidth="auto"
                                                                                                    class="mat-autocomplete ng-tns-c70-52">
                                                                                                </mat-autocomplete><span
                                                                                                    class="mat-form-field-label-wrapper ng-tns-c70-52"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-subscript-wrapper ng-tns-c70-52">
                                                                                            <div class="mat-form-field-hint-wrapper ng-tns-c70-52 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                                style="opacity: 1; transform: translateY(0%);">
                                                                                                <div
                                                                                                    class="mat-form-field-hint-spacer ng-tns-c70-52">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </mat-form-field>
                                                                            </td>
                                                                            <td class="ng-tns-c268-42">
                                                                                <mat-form-field appearance="outline"
                                                                                    class="mat-form-field full-width-text ng-tns-c268-42 ng-tns-c70-53 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-valid ng-star-inserted"
                                                                                    style="">
                                                                                    <div
                                                                                        class="mat-form-field-wrapper ng-tns-c70-53">
                                                                                        <div
                                                                                            class="mat-form-field-flex ng-tns-c70-53">
                                                                                            <div
                                                                                                class="mat-form-field-outline ng-tns-c70-53 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-53"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-53"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-53">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-53 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-53"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-53"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-53">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-infix ng-tns-c70-53">
                                                                                                <input matinput=""
                                                                                                    placeholder="Enter Insurer B Details"
                                                                                                    formcontrolname="insNaicNoB"
                                                                                                    @foreach ($insurProviders as $ip)

                                                                                                    @foreach ($certPolicy as $policy)
                                                                                                    @if ($policy->insurance_provider_id == $ip->id && $policy->insurance_provider_code == 'B')

                                                                                                    value="{{ $ip->naic_number }}"
                                                                                                    @endif @endforeach
                                                                                                    @endforeach
                                                                                                class="mat-input-element mat-form-field-autofill-control mat-autocomplete-trigger ng-tns-c70-50 ng-untouched ng-pristine ng-valid cdk-text-field-autofill-monitored"
                                                                                                id="naic_b"
                                                                                                data-placeholder="Enter Insurer B Details"
                                                                                                aria-autocomplete="list"
                                                                                                aria-expanded="false"
                                                                                                aria-haspopup="listbox"
                                                                                                readonly>
                                                                                                <mat-autocomplete
                                                                                                    panelwidth="auto"
                                                                                                    class="mat-autocomplete ng-tns-c70-53">
                                                                                                </mat-autocomplete><span
                                                                                                    class="mat-form-field-label-wrapper ng-tns-c70-53"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-subscript-wrapper ng-tns-c70-53">
                                                                                            <div class="mat-form-field-hint-wrapper ng-tns-c70-53 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                                style="opacity: 1; transform: translateY(0%);">
                                                                                                <div
                                                                                                    class="mat-form-field-hint-spacer ng-tns-c70-53">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </mat-form-field>
                                                                            </td>
                                                                            <td class="ng-tns-c268-42">
                                                                                <mat-form-field appearance="outline"
                                                                                    class="mat-form-field full-width-text ng-tns-c268-42 ng-tns-c70-54 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-valid ng-star-inserted"
                                                                                    style="">
                                                                                    <div
                                                                                        class="mat-form-field-wrapper ng-tns-c70-54">
                                                                                        <div
                                                                                            class="mat-form-field-flex ng-tns-c70-54">
                                                                                            <div
                                                                                                class="mat-form-field-outline ng-tns-c70-54 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-54"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-54"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-54">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-54 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-54"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-54"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-54">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-infix ng-tns-c70-54">
                                                                                                <input autocomplete="off"
                                                                                                    matinput=""
                                                                                                    formcontrolname="insBestRatingB"
                                                                                                    readonly="true"
                                                                                                    value=""
                                                                                                    class="mat-input-element mat-form-field-autofill-control ng-tns-c70-51 ng-untouched ng-pristine ng-valid cdk-text-field-autofill-monitored"
                                                                                                    id="br_b"
                                                                                                    aria-invalid="false"
                                                                                                    aria-required="false"
                                                                                                    readonly><span
                                                                                                    class="mat-form-field-label-wrapper ng-tns-c70-54"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-subscript-wrapper ng-tns-c70-54">
                                                                                            <div class="mat-form-field-hint-wrapper ng-tns-c70-54 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                                style="opacity: 1; transform: translateY(0%);">
                                                                                                <div
                                                                                                    class="mat-form-field-hint-spacer ng-tns-c70-54">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </mat-form-field>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="ng-tns-c268-42">
                                                                          <td
                                                                              class="lable_title ng-tns-c268-42"
                                                                              style="padding-left: 15px; text-align: left;"
                                                                          >
                                                                              INSURER C :
                                                                          </td>
                                                                            <td class="ng-tns-c268-42">
                                                                                <mat-form-field appearance="outline"
                                                                                    class="mat-form-field full-width-text ng-tns-c268-42 ng-tns-c70-55 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-valid ng-star-inserted"
                                                                                    style="">
                                                                                    <div
                                                                                        class="mat-form-field-wrapper ng-tns-c70-55">
                                                                                        <div
                                                                                            class="mat-form-field-flex ng-tns-c70-55">
                                                                                            <div
                                                                                                class="mat-form-field-outline ng-tns-c70-55 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-55"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-55"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-55">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-55 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-55"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-55"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-55">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-infix ng-tns-c70-55" style=" background-color : #FFFFFF ;">
                                                                                                {{-- <input
                                                                                                placeholder="Enter Insurer C Details"
                                                                                                value="@if (isset($certPolicy) && null !== $certPolicy->skip(2)->take(1)->first()){{ $certPolicy->skip(2)->take(1)->first()->insuranceProvider->name }} @endif"
                                                                                                class="js-example-basic-single form-control mat-input-element mat-form-field-autofill-control mat-autocomplete-trigger ng-tns-c70-49 ng-untouched ng-pristine ng-valid cdk-text-field-autofill-monitored"
                                                                                                id="insurC"
                                                                                                data-placeholder="Enter Insurer C Details"> --}}
                                                                                                <select id="insurC"
                                                                                                    class="selecter">
                                                                                                    <option value="">
                                                                                                        -Select-</option>
                                                                                                    @foreach ($insurProviders as $ip)
                                                                                                        @php
                                                                                                            $isSelected = false;
                                                                                                        @endphp

                                                                                                        @foreach ($certPolicy as $policy)
                                                                                                            @if ($policy->insurance_provider_id == $ip->id && $policy->insurance_provider_code == 'C')
                                                                                                                @php
                                                                                                                    $isSelected = true;
                                                                                                                    break;
                                                                                                                @endphp
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                        <option
                                                                                                            {{ $isSelected ? 'selected' : '' }}
                                                                                                            data-naic="{{ $ip->naic_number }}"
                                                                                                            data-brn="{{ $ip->best_rating_number }}"
                                                                                                            value="{{ $ip->id }}">
                                                                                                            {{ $ip->name }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                                <input type="hidden"
                                                                                                    id="insurance_provider_id_C"
                                                                                                    name="insurance_provider_id[]"
                                                                                                    value="" />
                                                                                                <div id="insurerCList">
                                                                                                </div>
                                                                                                <mat-autocomplete
                                                                                                    panelwidth="auto"
                                                                                                    class="mat-autocomplete ng-tns-c70-55">
                                                                                                </mat-autocomplete><span
                                                                                                    class="mat-form-field-label-wrapper ng-tns-c70-55"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-subscript-wrapper ng-tns-c70-55">
                                                                                            <div class="mat-form-field-hint-wrapper ng-tns-c70-55 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                                style="opacity: 1; transform: translateY(0%);">
                                                                                                <div
                                                                                                    class="mat-form-field-hint-spacer ng-tns-c70-55">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </mat-form-field>
                                                                            </td>
                                                                            <td class="ng-tns-c268-42">
                                                                                <mat-form-field appearance="outline"
                                                                                    class="mat-form-field full-width-text ng-tns-c268-42 ng-tns-c70-56 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-valid ng-star-inserted"
                                                                                    style="">
                                                                                    <div
                                                                                        class="mat-form-field-wrapper ng-tns-c70-56">
                                                                                        <div
                                                                                            class="mat-form-field-flex ng-tns-c70-56">
                                                                                            <div
                                                                                                class="mat-form-field-outline ng-tns-c70-56 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-56"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-56"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-56">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-56 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-56"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-56"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-56">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-infix ng-tns-c70-56">
                                                                                                <input matinput=""
                                                                                                    placeholder="Enter Insurer C Details"
                                                                                                    formcontrolname="insNaicNoC"
                                                                                                    @foreach ($insurProviders as $ip)

                                                                                                    @foreach ($certPolicy as $policy)
                                                                                                    @if ($policy->insurance_provider_id == $ip->id && $policy->insurance_provider_code == 'C')

                                                                                                    value="{{ $ip->naic_number }}"
                                                                                                    @endif @endforeach
                                                                                                    @endforeach
                                                                                                class="mat-input-element mat-form-field-autofill-control mat-autocomplete-trigger ng-tns-c70-50 ng-untouched ng-pristine ng-valid cdk-text-field-autofill-monitored"
                                                                                                id="naic_c"
                                                                                                data-placeholder="Enter Insurer C Details"
                                                                                                aria-autocomplete="list"
                                                                                                aria-expanded="false"
                                                                                                aria-haspopup="listbox"
                                                                                                readonly>
                                                                                                <mat-autocomplete
                                                                                                    panelwidth="auto"
                                                                                                    class="mat-autocomplete ng-tns-c70-56">
                                                                                                </mat-autocomplete><span
                                                                                                    class="mat-form-field-label-wrapper ng-tns-c70-56"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-subscript-wrapper ng-tns-c70-56">
                                                                                            <div class="mat-form-field-hint-wrapper ng-tns-c70-56 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                                style="opacity: 1; transform: translateY(0%);">
                                                                                                <div
                                                                                                    class="mat-form-field-hint-spacer ng-tns-c70-56">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </mat-form-field>
                                                                            </td>
                                                                            <td class="ng-tns-c268-42">
                                                                                <mat-form-field appearance="outline"
                                                                                    class="mat-form-field full-width-text ng-tns-c268-42 ng-tns-c70-57 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-valid ng-star-inserted"
                                                                                    style="">
                                                                                    <div
                                                                                        class="mat-form-field-wrapper ng-tns-c70-57">
                                                                                        <div
                                                                                            class="mat-form-field-flex ng-tns-c70-57">
                                                                                            <div
                                                                                                class="mat-form-field-outline ng-tns-c70-57 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-57"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-57"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-57">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-57 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-57"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-57"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-57">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-infix ng-tns-c70-57">
                                                                                                <input autocomplete="off"
                                                                                                    matinput=""
                                                                                                    formcontrolname="insBestRatingC"
                                                                                                    readonly="true"
                                                                                                    value=""
                                                                                                    class="mat-input-element mat-form-field-autofill-control ng-tns-c70-51 ng-untouched ng-pristine ng-valid cdk-text-field-autofill-monitored"
                                                                                                    id="br_c"
                                                                                                    aria-invalid="false"
                                                                                                    aria-required="false"
                                                                                                    readonly><span
                                                                                                    class="mat-form-field-label-wrapper ng-tns-c70-54"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-subscript-wrapper ng-tns-c70-57">
                                                                                            <div class="mat-form-field-hint-wrapper ng-tns-c70-57 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                                style="opacity: 1; transform: translateY(0%);">
                                                                                                <div
                                                                                                    class="mat-form-field-hint-spacer ng-tns-c70-57">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </mat-form-field>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="ng-tns-c268-42">
                                                                          <td
                                                                              class="lable_title ng-tns-c268-42"
                                                                              style="padding-left: 15px; text-align: left;"
                                                                          >
                                                                              INSURER D :
                                                                          </td>
                                                                            <td class="ng-tns-c268-42">
                                                                                <mat-form-field appearance="outline"
                                                                                    class="mat-form-field full-width-text ng-tns-c268-42 ng-tns-c70-58 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-valid ng-star-inserted"
                                                                                    style="">
                                                                                    <div
                                                                                        class="mat-form-field-wrapper ng-tns-c70-58">
                                                                                        <div
                                                                                            class="mat-form-field-flex ng-tns-c70-58">
                                                                                            <div
                                                                                                class="mat-form-field-outline ng-tns-c70-58 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-58"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-58"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-58">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-58 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-58"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-58"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-58">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-infix ng-tns-c70-58" style=" background-color : #FFFFFF ;">
                                                                                                {{-- <input
                                                                                                    placeholder="Enter Insurer D Details"
                                                                                                    value="@if (isset($certPolicy) && null !== $certPolicy->skip(3)->take(1)->first()){{ $certPolicy->skip(3)->take(1)->first()->insuranceProvider->name }} @endif"
                                                                                                    class="js-example-basic-single form-control mat-input-element mat-form-field-autofill-control mat-autocomplete-trigger ng-tns-c70-49 ng-untouched ng-pristine ng-valid cdk-text-field-autofill-monitored"
                                                                                                    id="insurD"
                                                                                                    data-placeholder="Enter Insurer D Details"> --}}
                                                                                                <select id="insurD"
                                                                                                    class="selecter">
                                                                                                    <option value="">
                                                                                                        -Select-</option>
                                                                                                    @foreach ($insurProviders as $ip)
                                                                                                        @php
                                                                                                            $isSelected = false;
                                                                                                        @endphp

                                                                                                        @foreach ($certPolicy as $policy)
                                                                                                            @if ($policy->insurance_provider_id == $ip->id && $policy->insurance_provider_code == 'D')
                                                                                                                @php
                                                                                                                    $isSelected = true;
                                                                                                                    break;
                                                                                                                @endphp
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                        <option
                                                                                                            {{ $isSelected ? 'selected' : '' }}
                                                                                                            data-naic="{{ $ip->naic_number }}"
                                                                                                            data-brn="{{ $ip->best_rating_number }}"
                                                                                                            value="{{ $ip->id }}">
                                                                                                            {{ $ip->name }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                                <input type="hidden"
                                                                                                    id="insurance_provider_id_D"
                                                                                                    name="insurance_provider_id[]"
                                                                                                    value="" />
                                                                                                <div id="insurerDList">
                                                                                                </div></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-subscript-wrapper ng-tns-c70-58">
                                                                                            <div class="mat-form-field-hint-wrapper ng-tns-c70-58 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                                style="opacity: 1; transform: translateY(0%);">
                                                                                                <div
                                                                                                    class="mat-form-field-hint-spacer ng-tns-c70-58">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </mat-form-field>
                                                                            </td>
                                                                            <td class="ng-tns-c268-42">
                                                                                <mat-form-field appearance="outline"
                                                                                    class="mat-form-field full-width-text ng-tns-c268-42 ng-tns-c70-59 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-valid ng-star-inserted"
                                                                                    style="">
                                                                                    <div
                                                                                        class="mat-form-field-wrapper ng-tns-c70-59">
                                                                                        <div
                                                                                            class="mat-form-field-flex ng-tns-c70-59">
                                                                                            <div
                                                                                                class="mat-form-field-outline ng-tns-c70-59 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-59"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-59"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-59">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-59 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-59"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-59"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-59">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-infix ng-tns-c70-59">
                                                                                                <input matinput=""
                                                                                                    placeholder="Enter Insurer D Details"
                                                                                                    formcontrolname="insNaicNoD"
                                                                                                    @foreach ($insurProviders as $ip)

                                                                                                    @foreach ($certPolicy as $policy)
                                                                                                    @if ($policy->insurance_provider_id == $ip->id && $policy->insurance_provider_code == 'D')

                                                                                                    value="{{ $ip->naic_number }}"
                                                                                                    @endif @endforeach
                                                                                                    @endforeach
                                                                                                class="mat-input-element mat-form-field-autofill-control mat-autocomplete-trigger ng-tns-c70-50 ng-untouched ng-pristine ng-valid cdk-text-field-autofill-monitored"
                                                                                                id="naic_d"
                                                                                                data-placeholder="Enter Insurer D Details"
                                                                                                aria-autocomplete="list"
                                                                                                aria-expanded="false"
                                                                                                aria-haspopup="listbox"
                                                                                                readonly>
                                                                                                <mat-autocomplete
                                                                                                    panelwidth="auto"
                                                                                                    class="mat-autocomplete ng-tns-c70-59">
                                                                                                </mat-autocomplete><span
                                                                                                    class="mat-form-field-label-wrapper ng-tns-c70-59"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-subscript-wrapper ng-tns-c70-59">
                                                                                            <div class="mat-form-field-hint-wrapper ng-tns-c70-59 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                                style="opacity: 1; transform: translateY(0%);">
                                                                                                <div
                                                                                                    class="mat-form-field-hint-spacer ng-tns-c70-59">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </mat-form-field>
                                                                            </td>
                                                                            <td class="ng-tns-c268-42">
                                                                                <mat-form-field appearance="outline"
                                                                                    class="mat-form-field full-width-text ng-tns-c268-42 ng-tns-c70-60 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-valid ng-star-inserted"
                                                                                    style="">
                                                                                    <div
                                                                                        class="mat-form-field-wrapper ng-tns-c70-60">
                                                                                        <div
                                                                                            class="mat-form-field-flex ng-tns-c70-60">
                                                                                            <div
                                                                                                class="mat-form-field-outline ng-tns-c70-60 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-60"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-60"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-60">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-60 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-60"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-60"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-60">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-infix ng-tns-c70-60">
                                                                                                <input autocomplete="off"
                                                                                                    matinput=""
                                                                                                    formcontrolname="insBestRatingD"
                                                                                                    readonly="true"
                                                                                                    value=""
                                                                                                    class="mat-input-element mat-form-field-autofill-control ng-tns-c70-51 ng-untouched ng-pristine ng-valid cdk-text-field-autofill-monitored"
                                                                                                    id="br_d"
                                                                                                    aria-invalid="false"
                                                                                                    aria-required="false"
                                                                                                    readonly><span
                                                                                                    class="mat-form-field-label-wrapper ng-tns-c70-54"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-subscript-wrapper ng-tns-c70-60">
                                                                                            <div class="mat-form-field-hint-wrapper ng-tns-c70-60 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                                style="opacity: 1; transform: translateY(0%);">
                                                                                                <div
                                                                                                    class="mat-form-field-hint-spacer ng-tns-c70-60">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </mat-form-field>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="ng-tns-c268-42">
                                                                          <td
                                                                              class="lable_title ng-tns-c268-42"
                                                                              style="padding-left: 15px; text-align: left;"
                                                                          >
                                                                              INSURER E :
                                                                          </td>
                                                                            <td class="ng-tns-c268-42">
                                                                                <mat-form-field appearance="outline"
                                                                                    class="mat-form-field full-width-text ng-tns-c268-42 ng-tns-c70-61 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-valid ng-star-inserted"
                                                                                    style="">
                                                                                    <div
                                                                                        class="mat-form-field-wrapper ng-tns-c70-61">
                                                                                        <div
                                                                                            class="mat-form-field-flex ng-tns-c70-61">
                                                                                            <div
                                                                                                class="mat-form-field-outline ng-tns-c70-61 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-61"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-61"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-61">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-61 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-61"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-61"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-61">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-infix ng-tns-c70-61" style=" background-color : #FFFFFF ;">
                                                                                                {{-- <input
                                                                                                    placeholder="Enter Insurer E  Details"
                                                                                                    value="@if (isset($certPolicy) && null !== $certPolicy->skip(4)->take(1)->first()){{ $certPolicy->skip(4)->take(1)->first()->insuranceProvider->name }} @endif"
                                                                                                    class="js-example-basic-single form-control mat-input-element mat-form-field-autofill-control mat-autocomplete-trigger ng-tns-c70-49 ng-untouched ng-pristine ng-valid cdk-text-field-autofill-monitored"
                                                                                                    id="insurE"
                                                                                                    data-placeholder="Enter Insurer E Details"> --}}
                                                                                                <select id="insurE"
                                                                                                    class="selecter">
                                                                                                    <option value="">
                                                                                                        -Select-</option>
                                                                                                    @foreach ($insurProviders as $ip)
                                                                                                        @php
                                                                                                            $isSelected = false;
                                                                                                        @endphp

                                                                                                        @foreach ($certPolicy as $policy)
                                                                                                            @if ($policy->insurance_provider_id == $ip->id && $policy->insurance_provider_code == 'E')
                                                                                                                @php
                                                                                                                    $isSelected = true;
                                                                                                                    break;
                                                                                                                @endphp
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                        <option
                                                                                                            {{ $isSelected ? 'selected' : '' }}
                                                                                                            data-naic="{{ $ip->naic_number }}"
                                                                                                            data-brn="{{ $ip->best_rating_number }}"
                                                                                                            value="{{ $ip->id }}">
                                                                                                            {{ $ip->name }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                                <input type="hidden"
                                                                                                    id="insurance_provider_id_E"
                                                                                                    name="insurance_provider_id[]"
                                                                                                    value="" />
                                                                                                <div id="insurerEList">
                                                                                                </div>
                                                                                                <mat-autocomplete
                                                                                                    panelwidth="auto"
                                                                                                    class="mat-autocomplete ng-tns-c70-61">
                                                                                                </mat-autocomplete><span
                                                                                                    class="mat-form-field-label-wrapper ng-tns-c70-61"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-subscript-wrapper ng-tns-c70-61">
                                                                                            <div class="mat-form-field-hint-wrapper ng-tns-c70-61 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                                style="opacity: 1; transform: translateY(0%);">
                                                                                                <div
                                                                                                    class="mat-form-field-hint-spacer ng-tns-c70-61">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </mat-form-field>
                                                                            </td>
                                                                            <td class="ng-tns-c268-42">
                                                                                <mat-form-field appearance="outline"
                                                                                    class="mat-form-field full-width-text ng-tns-c268-42 ng-tns-c70-62 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-valid ng-star-inserted"
                                                                                    style="">
                                                                                    <div
                                                                                        class="mat-form-field-wrapper ng-tns-c70-62">
                                                                                        <div
                                                                                            class="mat-form-field-flex ng-tns-c70-62">
                                                                                            <div
                                                                                                class="mat-form-field-outline ng-tns-c70-62 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-62"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-62"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-62">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-62 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-62"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-62"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-62">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-infix ng-tns-c70-62">
                                                                                                <input matinput=""
                                                                                                    placeholder="Enter Insurer E Details"
                                                                                                    formcontrolname="insNaicNoE"
                                                                                                    @foreach ($insurProviders as $ip)

                                                                                                    @foreach ($certPolicy as $policy)
                                                                                                    @if ($policy->insurance_provider_id == $ip->id && $policy->insurance_provider_code == 'E')

                                                                                                    value="{{ $ip->naic_number }}"
                                                                                                    @endif @endforeach
                                                                                                    @endforeach
                                                                                                class="mat-input-element mat-form-field-autofill-control mat-autocomplete-trigger ng-tns-c70-50 ng-untouched ng-pristine ng-valid cdk-text-field-autofill-monitored"
                                                                                                id="naic_e"
                                                                                                data-placeholder="Enter Insurer E Details"
                                                                                                aria-autocomplete="list"
                                                                                                aria-expanded="false"
                                                                                                aria-haspopup="listbox"
                                                                                                readonly>
                                                                                                <mat-autocomplete
                                                                                                    panelwidth="auto"
                                                                                                    class="mat-autocomplete ng-tns-c70-62">
                                                                                                </mat-autocomplete><span
                                                                                                    class="mat-form-field-label-wrapper ng-tns-c70-62"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-subscript-wrapper ng-tns-c70-62">
                                                                                            <div class="mat-form-field-hint-wrapper ng-tns-c70-62 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                                style="opacity: 1; transform: translateY(0%);">
                                                                                                <div
                                                                                                    class="mat-form-field-hint-spacer ng-tns-c70-62">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </mat-form-field>
                                                                            </td>
                                                                            <td class="ng-tns-c268-42">
                                                                                <mat-form-field appearance="outline"
                                                                                    class="mat-form-field full-width-text ng-tns-c268-42 ng-tns-c70-63 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-valid ng-star-inserted"
                                                                                    style="">
                                                                                    <div
                                                                                        class="mat-form-field-wrapper ng-tns-c70-63">
                                                                                        <div
                                                                                            class="mat-form-field-flex ng-tns-c70-63">
                                                                                            <div
                                                                                                class="mat-form-field-outline ng-tns-c70-63 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-63"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-63"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-63">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-63 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-63"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-63"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-63">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-infix ng-tns-c70-63">
                                                                                                <input autocomplete="off"
                                                                                                    matinput=""
                                                                                                    formcontrolname="insBestRatingE"
                                                                                                    readonly="true"
                                                                                                    value=""
                                                                                                    class="mat-input-element mat-form-field-autofill-control ng-tns-c70-51 ng-untouched ng-pristine ng-valid cdk-text-field-autofill-monitored"
                                                                                                    id="br_e"
                                                                                                    aria-invalid="false"
                                                                                                    aria-required="false"
                                                                                                    readonly><span
                                                                                                    class="mat-form-field-label-wrapper ng-tns-c70-54">
                                                                                                    <span
                                                                                                        class="mat-form-field-label-wrapper ng-tns-c70-63"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-subscript-wrapper ng-tns-c70-63">
                                                                                            <div class="mat-form-field-hint-wrapper ng-tns-c70-63 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                                style="opacity: 1; transform: translateY(0%);">
                                                                                                <div
                                                                                                    class="mat-form-field-hint-spacer ng-tns-c70-63">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </mat-form-field>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="ng-tns-c268-42">
                                                                          <td
                                                                              class="lable_title ng-tns-c268-42"
                                                                              style="padding-left: 15px; text-align: left;"
                                                                          >
                                                                              INSURER F :
                                                                          </td>
                                                                            <td class="ng-tns-c268-42">
                                                                                <mat-form-field appearance="outline"
                                                                                    class="mat-form-field full-width-text ng-tns-c268-42 ng-tns-c70-52 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-valid ng-star-inserted"
                                                                                    style="">
                                                                                    <div
                                                                                        class="mat-form-field-wrapper ng-tns-c70-52">
                                                                                        <div
                                                                                            class="mat-form-field-flex ng-tns-c70-52">
                                                                                            <div
                                                                                                class="mat-form-field-outline ng-tns-c70-52 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-52"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-52"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-52">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-52 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-52"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-52"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-52">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-infix ng-tns-c70-52" style=" background-color : #FFFFFF ;">
                                                                                                {{-- <input
                                                                                                placeholder="Enter Insurer F Details"
                                                                                                value="@if (isset($certPolicy) && null !== $certPolicy->skip(1)->take(1)->first()){{ $certPolicy->skip(1)->take(1)->first()->insuranceProvider->name }} @endif"
                                                                                                class="js-example-basic-single form-control mat-input-element mat-form-field-autofill-control mat-autocomplete-trigger ng-tns-c70-49 ng-untouched ng-pristine ng-valid cdk-text-field-autofill-monitored"
                                                                                                id="insurF"
                                                                                                data-placeholder="Enter Insurer F Details"> --}}
                                                                                                <select id="insurF"
                                                                                                    class="selecter">
                                                                                                    <option value="">
                                                                                                        -Select-</option>
                                                                                                    @foreach ($insurProviders as $ip)
                                                                                                        @php
                                                                                                            $isSelected = false;
                                                                                                        @endphp

                                                                                                        @foreach ($certPolicy as $policy)
                                                                                                            @if ($policy->insurance_provider_id == $ip->id && $policy->insurance_provider_code == 'F')
                                                                                                                @php
                                                                                                                    $isSelected = true;
                                                                                                                    break;
                                                                                                                @endphp
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                        <option
                                                                                                            {{ $isSelected ? 'selected' : '' }}
                                                                                                            data-naic="{{ $ip->naic_number }}"
                                                                                                            data-brn="{{ $ip->best_rating_number }}"
                                                                                                            value="{{ $ip->id }}">
                                                                                                            {{ $ip->name }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                                <input type="hidden"
                                                                                                    id="insurance_provider_id_F"
                                                                                                    name="insurance_provider_id[]"
                                                                                                    value="" />
                                                                                                <div id="insurerFList">
                                                                                                </div>
                                                                                                <mat-autocomplete
                                                                                                    panelwidth="auto"
                                                                                                    class="mat-autocomplete ng-tns-c70-52">
                                                                                                </mat-autocomplete><span
                                                                                                    class="mat-form-field-label-wrapper ng-tns-c70-52"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-subscript-wrapper ng-tns-c70-52">
                                                                                            <div class="mat-form-field-hint-wrapper ng-tns-c70-52 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                                style="opacity: 1; transform: translateY(0%);">
                                                                                                <div
                                                                                                    class="mat-form-field-hint-spacer ng-tns-c70-52">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </mat-form-field>
                                                                            </td>
                                                                            <td class="ng-tns-c268-42">
                                                                                <mat-form-field appearance="outline"
                                                                                    class="mat-form-field full-width-text ng-tns-c268-42 ng-tns-c70-53 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-valid ng-star-inserted"
                                                                                    style="">
                                                                                    <div
                                                                                        class="mat-form-field-wrapper ng-tns-c70-53">
                                                                                        <div
                                                                                            class="mat-form-field-flex ng-tns-c70-53">
                                                                                            <div
                                                                                                class="mat-form-field-outline ng-tns-c70-53 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-53"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-53"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-53">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-53 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-53"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-53"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-53">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-infix ng-tns-c70-53">
                                                                                                <input matinput=""
                                                                                                    placeholder="Enter Insurer F Details"
                                                                                                    formcontrolname="insNaicNoF"
                                                                                                    @foreach ($insurProviders as $ip)

                                                                                                    @foreach ($certPolicy as $policy)
                                                                                                    @if ($policy->insurance_provider_id == $ip->id && $policy->insurance_provider_code == 'F')

                                                                                                    value="{{ $ip->naic_number }}"
                                                                                                    @endif @endforeach
                                                                                                    @endforeach
                                                                                                class="mat-input-element mat-form-field-autofill-control mat-autocomplete-trigger ng-tns-c70-50 ng-untouched ng-pristine ng-valid cdk-text-field-autofill-monitored"
                                                                                                id="naic_f"
                                                                                                data-placeholder="Enter Insurer F Details"
                                                                                                aria-autocomplete="list"
                                                                                                aria-expanded="false"
                                                                                                aria-haspopup="listbox"
                                                                                                readonly>
                                                                                                <mat-autocomplete
                                                                                                    panelwidth="auto"
                                                                                                    class="mat-autocomplete ng-tns-c70-53">
                                                                                                </mat-autocomplete><span
                                                                                                    class="mat-form-field-label-wrapper ng-tns-c70-53"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-subscript-wrapper ng-tns-c70-53">
                                                                                            <div class="mat-form-field-hint-wrapper ng-tns-c70-53 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                                style="opacity: 1; transform: translateY(0%);">
                                                                                                <div
                                                                                                    class="mat-form-field-hint-spacer ng-tns-c70-53">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </mat-form-field>
                                                                            </td>
                                                                            <td class="ng-tns-c268-42">
                                                                                <mat-form-field appearance="outline"
                                                                                    class="mat-form-field full-width-text ng-tns-c268-42 ng-tns-c70-54 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-valid ng-star-inserted"
                                                                                    style="">
                                                                                    <div
                                                                                        class="mat-form-field-wrapper ng-tns-c70-54">
                                                                                        <div
                                                                                            class="mat-form-field-flex ng-tns-c70-54">
                                                                                            <div
                                                                                                class="mat-form-field-outline ng-tns-c70-54 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-54"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-54"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-54">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-54 ng-star-inserted">
                                                                                                <div class="mat-form-field-outline-start ng-tns-c70-54"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div class="mat-form-field-outline-gap ng-tns-c70-54"
                                                                                                    style="width: 0px;">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="mat-form-field-outline-end ng-tns-c70-54">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="mat-form-field-infix ng-tns-c70-54">
                                                                                                <input autocomplete="off"
                                                                                                    matinput=""
                                                                                                    formcontrolname="insBestRatingF"
                                                                                                    readonly="true"
                                                                                                    value=""
                                                                                                    class="mat-input-element mat-form-field-autofill-control ng-tns-c70-51 ng-untouched ng-pristine ng-valid cdk-text-field-autofill-monitored"
                                                                                                    id="br_f"
                                                                                                    aria-invalid="false"
                                                                                                    aria-required="false"
                                                                                                    readonly><span
                                                                                                    class="mat-form-field-label-wrapper ng-tns-c70-54"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-subscript-wrapper ng-tns-c70-54">
                                                                                            <div class="mat-form-field-hint-wrapper ng-tns-c70-54 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                                style="opacity: 1; transform: translateY(0%);">
                                                                                                <div
                                                                                                    class="mat-form-field-hint-spacer ng-tns-c70-54">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </mat-form-field>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                        </table>
                                                        <div class="p-t-b-10 ng-tns-c268-42"><span
                                                          class="agenc_sub_titel ng-tns-c268-42"
                                                          style="display: block; text-align: center; width: 100%;"
                                                      >
                                                          COVERAGES
                                                      </span>

                                                            <div style="float: right;" class="ng-tns-c268-42"><span
                                                                    style="font-family: Arial; font-size: 12px; font-weight: bold; margin-right: 10px;"
                                                                    class="ng-tns-c268-42">Currency</span><span
                                                                    style="font-family: Arial; font-size: 12px;"
                                                                    class="ng-tns-c268-42"><select
                                                                        formcontrolname="currency" id="currency"
                                                                        class="drop_box ng-tns-c268-42 ng-untouched ng-pristine ng-valid">
                                                                        <option value="CND" class="ng-tns-c268-42">
                                                                            Canadian
                                                                            Dollar</option>
                                                                        <option value="MEX" class="ng-tns-c268-42">
                                                                            Mexican
                                                                            Dollar</option>
                                                                        <option value="USD" selected="selected"
                                                                            class="ng-tns-c268-42">US
                                                                            Dollar</option>
                                                                    </select></span></div>
                                                            <div class="clearfix ng-tns-c268-42"></div>
                                                        </div>
                                                        <table border="1" width="100%" cellpadding="0"
                                                            cellspacing="0" class="tftable ng-tns-c268-42">
                                                            <tbody class="ng-tns-c268-42">
                                                                <tr class="ng-tns-c268-42">
                                                                    <td colspan="8" class="ng-tns-c268-42">
                                                                        <div style="text-align: center; font-family: 'Arial', sans-serif;font-weight:bold; font-size: 11px; line-height: 1.5; color: #333;   border-radius: 5px;"
                                                                            class="ng-tns-c268-42"> THE POLICIES OF
                                                                            INSURANCE
                                                                            LISTED BELOW
                                                                            HAVE BEEN ISSUED TO THE INSURED NAMED ABOVE FOR
                                                                            THE
                                                                            POLICY
                                                                            PERIOD INDICATED. NOTWITHSTANDING THIS
                                                                            CERTIFICATE
                                                                            MAY BE ISSUED
                                                                            OR MAY PERTAIN, THE INSURANCE AFFORDED BY THE
                                                                            POLICIES DESCRIBED
                                                                            HEREIN IS SUBJECT TO ALL THE TERMS, EXCLUSIONS
                                                                            AND
                                                                            CONDITIONS OF
                                                                            SUCH POLICIES. AGGREGATE LIMITS SHOWN MAY HAVE
                                                                            BEEN
                                                                            REDUCED BY
                                                                            PAID CLAIMS. </div>
                                                                    </td>
                                                                </tr>
                                                                <tr id="scrollToPolicyHeaderTR" class="ng-tns-c268-42" style="font-size: 20px; text-align: center; margin-top:25%;">

                                                                  <td width="3%" class="lable_title ng-tns-c268-42">
                                                                    <div align="center" class="ng-tns-c268-42" style="font-size: 10px;">
                                                                      INSR LTR
                                                                    </div>
                                                                </td>
                                                                <td width="3%" class="lable_title ng-tns-c268-42">
                                                                  <div align="center" class="ng-tns-c268-42" style="font-size: 10px;">
                                                                    ADDL INSR
                                                                  </div>
                                                              </td>
                                                                  <td width="3%" class="lable_title ng-tns-c268-42">
                                                                    <div align="center" class="ng-tns-c268-42" style="font-size: 10px;">
                                                                      ADDL INSR
                                                                    </div>
                                                                </td>
                                                                  <td width="20%" class="lable_title ng-tns-c268-42">
                                                                      <div align="center" class="ng-tns-c268-42" style="font-size: 10px;">
                                                                          TYPE OF INSURANCE
                                                                      </div>
                                                                  </td>
                                                                  <td width="20%" class="lable_title ng-tns-c268-42">
                                                                      <div align="center" class="ng-tns-c268-42" style="font-size: 10px;">
                                                                          POLICY NUMBER
                                                                      </div>
                                                                  </td>
                                                                  <td width="10%" class="lable_title ng-tns-c268-42">
                                                                      <div align="center" class="ng-tns-c268-42" style="font-size: 10px;">
                                                                          POLICY EFFECTIVE<br class="ng-tns-c268-42">DATE (MM/DD/YYYY)
                                                                      </div>
                                                                  </td>
                                                                  <td width="10%" class="lable_title ng-tns-c268-42">
                                                                      <div align="center" class="ng-tns-c268-42" style="font-size: 10px;">
                                                                          POLICY EXPIRATION<br class="ng-tns-c268-42">DATE (MM/DD/YYYY)
                                                                      </div>
                                                                  </td>
                                                                  <td width="28%" class="lable_title ng-tns-c268-42">
                                                                      <div align="center" class="ng-tns-c268-42" style="font-size: 10px;">
                                                                          LIMITS
                                                                      </div>
                                                                  </td>
                                                              </tr>

                                                                {{-- this start of  GENERAL LIABILITY --}}
                                                                @foreach ($policytypes as $pt)
                                                                    <tr class="ng-tns-c268-42 ng-trigger ng-trigger-slideUpDown ng-star-inserted"
                                                                        style="">
                                                                        <td colspan="7"
                                                                            class="chkb_lable_title ng-tns-c268-42">
                                                                            <mat-checkbox
                                                                                class="mat-checkbox ng-tns-c268-42 mat-accent mat-checkbox-checked"
                                                                                id="mat-checkbox-28">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    value="{{ $pt->id }}"
                                                                                    name="" />
                                                                            </mat-checkbox> <span style="font-size: 10px; !important">{{ $pt->type_name }}</span>
                                                                        </td>
                                                                    </tr>
                                                                    {{-- this start of table  GENERAL LIABILITY --}}
                                                                    <tr formgroupname="iaGeneralDetForm"
                                                                        id="GeneralPolicyRow"
                                                                        class="ng-tns-c268-42 ng-trigger ng-trigger-slideUpDown ng-untouched ng-pristine ng-invalid ng-star-inserted"
                                                                        style="">
                                                                        <td align="center" class="ng-tns-c268-42">
                                                                            <mat-form-field appearance="outline"
                                                                                class="mat-form-field width-40 input_c_r ng-tns-c268-42 ng-tns-c70-64 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-invalid ng-star-inserted"
                                                                                style="">
                                                                                <div
                                                                                    class="mat-form-field-wrapper ng-tns-c70-64">
                                                                                    <div
                                                                                        class="mat-form-field-flex ng-tns-c70-64">
                                                                                        <div
                                                                                            class="mat-form-field-outline ng-tns-c70-64 ng-star-inserted">
                                                                                            <div class="mat-form-field-outline-start ng-tns-c70-64"
                                                                                                style="width: 0px;"></div>
                                                                                            <div class="mat-form-field-outline-gap ng-tns-c70-64"
                                                                                                style="width: 0px;"></div>
                                                                                            <div
                                                                                                class="mat-form-field-outline-end ng-tns-c70-64">
                                                                                                @if (isset($certPolicy))
                                                                                                    {{ $certPolicy->where('policy_type_id', $pt->id)->first()->insurance_provider_code }}
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-64 ng-star-inserted">
                                                                                            <div class="mat-form-field-outline-start ng-tns-c70-64"
                                                                                                style="width: 0px;"></div>
                                                                                            <div class="mat-form-field-outline-gap ng-tns-c70-64"
                                                                                                style="width: 0px;"></div>

                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-infix ng-tns-c70-64">
                                                                                            <input autocomplete="off"
                                                                                                oninput="validateInput(event)"
                                                                                                formcontrolname="insrLtrGL"
                                                                                                name="insurance_provider_code[{{ $pt->id }}]"
                                                                                                maxlength="1"
                                                                                                minlength="1"
                                                                                                value="@if (!empty($certPolicy->where('policy_type_id', $pt->id)->first())) {{ $certPolicy->where('policy_type_id', $pt->id)->first()->insurance_provider_code }} @endif"
                                                                                                oninput="this.value = this.value.toUpperCase()"
                                                                                                class="toupper mat-input-element mat-form-field-autofill-control ng-tns-c70-64 ng-untouched ng-pristine ng-invalid cdk-text-field-autofill-monitored"
                                                                                                required=""
                                                                                                id="mat-input-20"><span
                                                                                                class="mat-form-field-label-wrapper ng-tns-c70-64"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="mat-form-field-subscript-wrapper ng-tns-c70-64">
                                                                                        <div class="mat-form-field-hint-wrapper ng-tns-c70-64 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                            style="opacity: 1; transform: translateY(0%);">
                                                                                            <div
                                                                                                class="mat-form-field-hint-spacer ng-tns-c70-64">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </mat-form-field>
                                                                        </td>
                                                                        <td align="center" class="ng-tns-c268-42">
                                                                            <mat-form-field appearance="outline"
                                                                                class="mat-form-field width-40 input_c_r ng-tns-c268-42 ng-tns-c70-65 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float mat-form-field-disabled ng-star-inserted"
                                                                                style="">
                                                                                <div
                                                                                    class="mat-form-field-wrapper ng-tns-c70-65">
                                                                                    <div
                                                                                        class="mat-form-field-flex ng-tns-c70-65">
                                                                                        <div
                                                                                            class="mat-form-field-outline ng-tns-c70-65 ng-star-inserted">
                                                                                            <div class="mat-form-field-outline-start ng-tns-c70-65"
                                                                                                style="width: 0px;"></div>
                                                                                            <div class="mat-form-field-outline-gap ng-tns-c70-65"
                                                                                                style="width: 0px;"></div>
                                                                                            <div
                                                                                                class="mat-form-field-outline-end ng-tns-c70-65">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-65 ng-star-inserted">
                                                                                            <div class="mat-form-field-outline-start ng-tns-c70-65"
                                                                                                style="width: 0px;"></div>
                                                                                            <div class="mat-form-field-outline-gap ng-tns-c70-65"
                                                                                                style="width: 0px;"></div>
                                                                                            <div
                                                                                                class="mat-form-field-outline-end ng-tns-c70-65">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-infix ng-tns-c70-65">
                                                                                            <input autocomplete="off"
                                                                                                matinput=""
                                                                                                value="@if (!empty($certPolicy->where('policy_type_id', $pt->id)->first())) {{ $certPolicy->where('policy_type_id', $pt->id)->first()->ADDL_INSR }} @endif"
                                                                                                disabled=""
                                                                                                class="mat-input-element mat-form-field-autofill-control ng-tns-c70-65 cdk-text-field-autofill-monitored"
                                                                                                id="mat-input-21"
                                                                                                aria-invalid="false"
                                                                                                aria-required="false"><span
                                                                                                class="mat-form-field-label-wrapper ng-tns-c70-65"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="mat-form-field-subscript-wrapper ng-tns-c70-65">
                                                                                        <div class="mat-form-field-hint-wrapper ng-tns-c70-65 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                            style="opacity: 1; transform: translateY(0%);">
                                                                                            <div
                                                                                                class="mat-form-field-hint-spacer ng-tns-c70-65">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </mat-form-field>
                                                                        </td>
                                                                        <td align="center" class="ng-tns-c268-42">
                                                                            <mat-form-field appearance="outline"
                                                                                class="mat-form-field width-40 input_c_r ng-tns-c268-42 ng-tns-c70-65 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float mat-form-field-disabled ng-star-inserted"
                                                                                style="">
                                                                                <div
                                                                                    class="mat-form-field-wrapper ng-tns-c70-65">
                                                                                    <div
                                                                                        class="mat-form-field-flex ng-tns-c70-65">
                                                                                        <div
                                                                                            class="mat-form-field-outline ng-tns-c70-65 ng-star-inserted">
                                                                                            <div class="mat-form-field-outline-start ng-tns-c70-65"
                                                                                                style="width: 0px;"></div>
                                                                                            <div class="mat-form-field-outline-gap ng-tns-c70-65"
                                                                                                style="width: 0px;"></div>
                                                                                            <div
                                                                                                class="mat-form-field-outline-end ng-tns-c70-65">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-65 ng-star-inserted">
                                                                                            <div class="mat-form-field-outline-start ng-tns-c70-65"
                                                                                                style="width: 0px;"></div>
                                                                                            <div class="mat-form-field-outline-gap ng-tns-c70-65"
                                                                                                style="width: 0px;"></div>
                                                                                            <div
                                                                                                class="mat-form-field-outline-end ng-tns-c70-65">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-infix ng-tns-c70-65">
                                                                                            <input autocomplete="off"
                                                                                                matinput=""
                                                                                                value="@if (!empty($certPolicy->where('policy_type_id', $pt->id)->first())) {{ $certPolicy->where('policy_type_id', $pt->id)->first()->SUBR_WVD }} @endif"
                                                                                                disabled=""
                                                                                                class="mat-input-element mat-form-field-autofill-control ng-tns-c70-65 cdk-text-field-autofill-monitored"
                                                                                                id="mat-input-21"
                                                                                                aria-invalid="false"
                                                                                                aria-required="false"><span
                                                                                                class="mat-form-field-label-wrapper ng-tns-c70-65"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="mat-form-field-subscript-wrapper ng-tns-c70-65">
                                                                                        <div class="mat-form-field-hint-wrapper ng-tns-c70-65 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                            style="opacity: 1; transform: translateY(0%);">
                                                                                            <div
                                                                                                class="mat-form-field-hint-spacer ng-tns-c70-65">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </mat-form-field>
                                                                        </td>
                                                                        <td valign="top" class="p-0 ng-tns-c268-42">
                                                                            <table width="100%" cellpadding="0"
                                                                                cellspacing="0" border="0"
                                                                                class="agenc_sub_table ng-tns-c268-42">
                                                                                <tbody class="ng-tns-c268-42">
                                                                                    <tr height="30"
                                                                                        class="ng-tns-c268-42">
                                                                                        <td colspan="4"
                                                                                            class="lable_title ng-tns-c268-42" style="margin-left:3%;">
                                                                                            {{ $pt->type_name }}</td>
                                                                                    </tr>
                                                                                    @foreach ($pt->policies as $pp)
                                                                                        <tr class="ng-tns-c268-42">
                                                                                            <td
                                                                                                class="text-center ng-tns-c268-42">
                                                                                                <mat-checkbox
                                                                                                    formcontrolname="glLiability"
                                                                                                    class="mat-checkbox ng-tns-c268-42 mat-accent ng-untouched ng-pristine ng-valid"
                                                                                                    id="mat-checkbox-29">
                                                                                                    <input
                                                                                                        class="form-check-input abcd"
                                                                                                        type="checkbox"
                                                                                                        value="{{ $pp->id }}"
                                                                                                        name="main_policy_sub[{{ str_replace(' ', '_', $pt->id) }}][{{ $pp->id }}]"
                                                                                                        id="{{ $pp->policy_title }}"
                                                                                                        @if (isset($certPolicy)) {{ $certPolicy->where('policy_id', $pp->id)->first() ? 'checked' : '' }} @endif />
                                                                                                    <input type="hidden"
                                                                                                        id="checkboxValidation"
                                                                                                        value="false">
                                                                                                </mat-checkbox>
                                                                                            </td>
                                                                                            <td colspan="3"
                                                                                                class="lable_title_normal ng-tns-c268-42">
                                                                                                <span
                                                                                                    class="ng-tns-c268-42">
                                                                                                    {{ $pp->policy_title }}</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach

                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                        <td valign="top" class="p-0 ng-tns-c268-42">
                                                                            <table width="100%" cellpadding="0"
                                                                                cellspacing="0" border="0"
                                                                                class="agenc_sub_table ng-tns-c268-42">
                                                                                <tbody class="ng-tns-c268-42">
                                                                                    <tr class="ng-tns-c268-42">
                                                                                        <td align="center"
                                                                                            class="ng-tns-c268-42">
                                                                                            <mat-form-field
                                                                                                appearance="outline"
                                                                                                class="mat-form-field input_c_r w-95p ng-tns-c268-42 ng-tns-c70-67 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-invalid ng-star-inserted"
                                                                                                style="">
                                                                                                <div
                                                                                                    class="mat-form-field-wrapper ng-tns-c70-67">
                                                                                                    <div
                                                                                                        class="mat-form-field-flex ng-tns-c70-67">
                                                                                                        <div
                                                                                                            class="mat-form-field-outline ng-tns-c70-67 ng-star-inserted">
                                                                                                            <div class="mat-form-field-outline-start ng-tns-c70-67"
                                                                                                                style="width: 0px;">
                                                                                                            </div>
                                                                                                            <div class="mat-form-field-outline-gap ng-tns-c70-67"
                                                                                                                style="width: 0px;">
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="mat-form-field-outline-end ng-tns-c70-67">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-67 ng-star-inserted">
                                                                                                            <div class="mat-form-field-outline-start ng-tns-c70-67"
                                                                                                                style="width: 0px;">
                                                                                                            </div>
                                                                                                            <div class="mat-form-field-outline-gap ng-tns-c70-67"
                                                                                                                style="width: 0px;">
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="mat-form-field-outline-end ng-tns-c70-67">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="mat-form-field-infix ng-tns-c70-67" style="font-weight: bold; text-align: center;">
                                                                                                          <input
                                                                                                              style="font-weight: bold !important;  text-align: center; "
                                                                                                              autocomplete="off"
                                                                                                              matinput=""
                                                                                                              formcontrolname="policyNumberGL"
                                                                                                              maxlength="20"
                                                                                                              name="main_policy_polnum[{{ $pt->id }}]"
                                                                                                              value="@if (isset($certPolicy)) {{ $certPolicy->where('policy_type_id', $pt->id)->first()->policy_number }} @endif"
                                                                                                              oninput="this.value = this.value.toUpperCase()"
                                                                                                              class="mat-input-element mat-form-field-autofill-control ng-tns-c70-67 ng-untouched ng-pristine ng-invalid cdk-text-field-autofill-monitored"
                                                                                                              required=""
                                                                                                              align="center"
                                                                                                              id="mat-input-23"
                                                                                                              aria-required="true">
                                                                                                          <span class="mat-form-field-label-wrapper ng-tns-c70-67"></span>
                                                                                                      </div>

                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="mat-form-field-subscript-wrapper ng-tns-c70-67">
                                                                                                        <div class="mat-form-field-hint-wrapper ng-tns-c70-67 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                                            style="opacity: 1; transform: translateY(0%);">
                                                                                                            <div
                                                                                                                class="mat-form-field-hint-spacer ng-tns-c70-67">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </mat-form-field>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr class="ng-tns-c268-42">
                                                                                      <td class="lable_title_large ng-tns-c268-42" style="text-align: center; padding: 5px;">
                                                                                        <div style="margin-top: 5px; margin-bottom: 5px; padding-left: 5px;" align="center" class="ng-tns-c268-42">
                                                                                            Is This Policy Through A Risk Retention Insurance Company?
                                                                                        </div>
                                                                                        <mat-slide-toggle
                                                                                        formcontrolname="rrgFlagGL"
                                                                                        class="mat-slide-toggle ng-tns-c268-42 mat-accent ng-untouched ng-pristine ng-valid"
                                                                                        id="mat-slide-toggle-10"
                                                                                        style="display: inline-block; text-align: center;">
                                                                                        <label class="mat-slide-toggle-label" for="mat-slide-toggle-10-input">
                                                                                            <span class="mat-slide-toggle-bar">
                                                                                                <input type="checkbox" role="switch" class="mat-slide-toggle-input cdk-visually-hidden" id="mat-slide-toggle-10-input" tabindex="0" aria-checked="false">
                                                                                                <span class="mat-slide-toggle-thumb-container">
                                                                                                    <span class="mat-slide-toggle-thumb"></span>
                                                                                                    <span mat-ripple="" class="mat-ripple mat-slide-toggle-ripple mat-focus-indicator">
                                                                                                        <span class="mat-ripple-element mat-slide-toggle-persistent-ripple"></span>
                                                                                                    </span>
                                                                                                </span>
                                                                                            </span>
                                                                                            <span align="center" class="mat-slide-toggle-content" style="text-align: center; display: inline-block; font-weight: bold;">
                                                                                                <span style="display: none;">&nbsp;</span>No
                                                                                            </span>
                                                                                        </label>
                                                                                    </mat-slide-toggle>

                                                                                    </td>

                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                        <td valign="middle" align="center"
                                                                            class="ng-tns-c268-42">
                                                                            <mat-form-field appearance="outline"
                                                                                class="mat-form-field input_c_r w-120 ng-tns-c268-42 ng-tns-c70-68 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-invalid ng-star-inserted"
                                                                                style="">
                                                                                <div
                                                                                    class="mat-form-field-wrapper ng-tns-c70-68">
                                                                                    <div
                                                                                        class="mat-form-field-flex ng-tns-c70-68">
                                                                                        <div
                                                                                            class="mat-form-field-outline ng-tns-c70-68 ng-star-inserted">
                                                                                            <div class="mat-form-field-outline-start ng-tns-c70-68"
                                                                                                style="width: 0px;"></div>
                                                                                            <div class="mat-form-field-outline-gap ng-tns-c70-68"
                                                                                                style="width: 0px;"></div>
                                                                                            <div
                                                                                                class="mat-form-field-outline-end ng-tns-c70-68">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-68 ng-star-inserted">
                                                                                            <div class="mat-form-field-outline-start ng-tns-c70-68"
                                                                                                style="width: 0px;"></div>
                                                                                            <div class="mat-form-field-outline-gap ng-tns-c70-68"
                                                                                                style="width: 0px;"></div>
                                                                                            <div
                                                                                                class="mat-form-field-outline-end ng-tns-c70-68">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-infix ng-tns-c70-68">
                                                                                            <input
                                                                                                @if ($r == 1) type="text"
                                                                                @else
                                                                                type="date" @endif
                                                                                                name="main_policy_eff_date[{{ $pt->id }}]"
                                                                                                class="mat-input-element mat-form-field-autofill-control mat-datepicker-input l_h_23 ng-tns-c70-68 ng-untouched ng-pristine ng-invalid cdk-text-field-autofill-monitored"
                                                                                                value="@if (isset($certPolicy)) {{ date('m-d-Y', strtotime($certPolicy->where('policy_type_id', $pt->id)->first()->start_date)) }} @endif">
                                                                                            <mat-datepicker
                                                                                                class="ng-tns-c70-68">
                                                                                            </mat-datepicker><span
                                                                                                class="mat-form-field-label-wrapper ng-tns-c70-68"></span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-suffix ng-tns-c70-68 ng-star-inserted">
                                                                                            <mat-datepicker-toggle
                                                                                                matsuffix=""
                                                                                                class="mat-datepicker-toggle ng-tns-c70-68"
                                                                                                data-mat-calendar="mat-datepicker-1">
                                                                                                <button mat-icon-button=""
                                                                                                    type="button"
                                                                                                    class="mat-focus-indicator mat-icon-button mat-button-base"
                                                                                                    aria-haspopup="dialog"
                                                                                                    aria-label="Open calendar"
                                                                                                    tabindex="0"><span
                                                                                                        matripple=""
                                                                                                        class="mat-ripple mat-button-ripple mat-button-ripple-round"></span><span
                                                                                                        class="mat-button-focus-overlay"></span></button>
                                                                                            </mat-datepicker-toggle>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="mat-form-field-subscript-wrapper ng-tns-c70-68">
                                                                                        <div class="mat-form-field-hint-wrapper ng-tns-c70-68 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                            style="opacity: 1; transform: translateY(0%);">
                                                                                            <div
                                                                                                class="mat-form-field-hint-spacer ng-tns-c70-68">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </mat-form-field>
                                                                        </td>
                                                                        <td valign="middle" align="center"
                                                                            class="ng-tns-c268-42">
                                                                            <mat-form-field appearance="outline"
                                                                                class="mat-form-field input_c_r w-120 ng-tns-c268-42 ng-tns-c70-69 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-invalid ng-star-inserted"
                                                                                style="">
                                                                                <div
                                                                                    class="mat-form-field-wrapper ng-tns-c70-69">
                                                                                    <div
                                                                                        class="mat-form-field-flex ng-tns-c70-69">
                                                                                        <div
                                                                                            class="mat-form-field-outline ng-tns-c70-69 ng-star-inserted">
                                                                                            <div class="mat-form-field-outline-start ng-tns-c70-69"
                                                                                                style="width: 0px;"></div>
                                                                                            <div class="mat-form-field-outline-gap ng-tns-c70-69"
                                                                                                style="width: 0px;"></div>
                                                                                            <div
                                                                                                class="mat-form-field-outline-end ng-tns-c70-69">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-69 ng-star-inserted">
                                                                                            <div class="mat-form-field-outline-start ng-tns-c70-69"
                                                                                                style="width: 0px;"></div>
                                                                                            <div class="mat-form-field-outline-gap ng-tns-c70-69"
                                                                                                style="width: 0px;"></div>
                                                                                            <div
                                                                                                class="mat-form-field-outline-end ng-tns-c70-69">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-infix ng-tns-c70-69">
                                                                                            <input
                                                                                                @if ($r == 1) type="text"
                                                                                @else
                                                                                type="date" @endif
                                                                                                name="main_policy_exp_date[{{ $pt->id }}]"
                                                                                                class="mat-input-element mat-form-field-autofill-control mat-datepicker-input l_h_23 ng-tns-c70-69 ng-untouched ng-pristine ng-invalid cdk-text-field-autofill-monitored"
                                                                                                value="@if (isset($certPolicy)) {{ date('m-d-Y', strtotime($certPolicy->where('policy_type_id', $pt->id)->first()->expiry_date)) }} @endif">
                                                                                            <mat-datepicker
                                                                                                class="ng-tns-c70-69">
                                                                                            </mat-datepicker><span
                                                                                                class="mat-form-field-label-wrapper ng-tns-c70-69"></span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-suffix ng-tns-c70-69 ng-star-inserted">
                                                                                            <mat-datepicker-toggle
                                                                                                matsuffix=""
                                                                                                class="mat-datepicker-toggle ng-tns-c70-69"
                                                                                                data-mat-calendar="mat-datepicker-2">
                                                                                                <button mat-icon-button=""
                                                                                                    type="button"
                                                                                                    class="mat-focus-indicator mat-icon-button mat-button-base"
                                                                                                    aria-haspopup="dialog"
                                                                                                    aria-label="Open calendar"
                                                                                                    tabindex="0"><span
                                                                                                        matripple=""
                                                                                                        class="mat-ripple mat-button-ripple mat-button-ripple-round"></span><span
                                                                                                        class="mat-button-focus-overlay"></span></button>
                                                                                            </mat-datepicker-toggle>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="mat-form-field-subscript-wrapper ng-tns-c70-69">
                                                                                        <div class="mat-form-field-hint-wrapper ng-tns-c70-69 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                            style="opacity: 1; transform: translateY(0%);">
                                                                                            <div
                                                                                                class="mat-form-field-hint-spacer ng-tns-c70-69">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </mat-form-field>
                                                                        </td>
                                                                        <td valign="top" class="p-0 ng-tns-c268-42">
                                                                            <table width="100%" cellpadding="0"
                                                                                cellspacing="0" border="0"
                                                                                class="agenc_sub_table ng-tns-c268-42">
                                                                                <tbody class="ng-tns-c268-42">
                                                                                    @foreach ($pt->policyLimits as $pl)
                                                                                        <tr class="ng-tns-c268-42">
                                                                                            <td width="50%"
                                                                                                class="lable_title_normal ng-tns-c268-42">
                                                                                                {{ $pl->coverage_item }}
                                                                                            </td>
                                                                                            <td class="ng-tns-c268-42">
                                                                                                <mat-form-field
                                                                                                    appearance="outline"
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
                                                                                                                class="mat-form-field-prefix ng-tns-c70-70 ng-star-inserted">
                                                                                                                <span
                                                                                                                    matprefix=""
                                                                                                                    class="ng-tns-c70-70">$&nbsp;</span>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="mat-form-field-infix ng-tns-c70-70">
                                                                                                                <input
                                                                                                                    type="number"
                                                                                                                    class="form-control"
                                                                                                                    id="{{ $pl->coverage_item }}"
                                                                                                                    name="main_policy_coverage[{{ str_replace(' ', '_', $pt->id) }}][{{ $pl->id }}]"
                                                                                                                    placeholder=""
                                                                                                                    value="@if(isset($certPolimit)){{ $certPolimit->where('policy_limit_id',$pl->id)->first()->amount ?? 0 }}@endif"
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
                                                                        </td>
                                                                    </tr>

                                                                @endforeach

                                                                @foreach ($allpolicytypes as $pt)
                                                                    <tr class="ng-tns-c268-42 ng-trigger ng-trigger-slideUpDown ng-star-inserted"
                                                                        style="">
                                                                        <td colspan="7"
                                                                            class="chkb_lable_title ng-tns-c268-42">
                                                                            <mat-checkbox
                                                                                class="mat-checkbox ng-tns-c268-42 mat-accent mat-checkbox-checked"
                                                                                id="mat-checkbox-28">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    value="{{ $pt->id }}" disabled
                                                                                    name="" />
                                                                            </mat-checkbox><span style="font-size:10px;"> {{ $pt->type_name }}</span>
                                                                        </td>
                                                                    </tr>
                                                                    {{-- this start of table  GENERAL LIABILITY --}}
                                                                    <tr formgroupname="iaGeneralDetForm"
                                                                        id="GeneralPolicyRow"
                                                                        class="ng-tns-c268-42 ng-trigger ng-trigger-slideUpDown ng-untouched ng-pristine ng-invalid ng-star-inserted"
                                                                        style="">
                                                                        <td align="center" class="ng-tns-c268-42">
                                                                            <mat-form-field appearance="outline"
                                                                                class="mat-form-field width-40 input_c_r ng-tns-c268-42 ng-tns-c70-64 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-invalid ng-star-inserted"
                                                                                style="">
                                                                                <div
                                                                                    class="mat-form-field-wrapper ng-tns-c70-64">
                                                                                    <div
                                                                                        class="mat-form-field-flex ng-tns-c70-64">
                                                                                        <div
                                                                                            class="mat-form-field-outline ng-tns-c70-64 ng-star-inserted">
                                                                                            <div class="mat-form-field-outline-start ng-tns-c70-64"
                                                                                                style="width: 0px;"></div>
                                                                                            <div class="mat-form-field-outline-gap ng-tns-c70-64"
                                                                                                style="width: 0px;"></div>
                                                                                            <div
                                                                                                class="mat-form-field-outline-end ng-tns-c70-64">
                                                                                                {{-- @if (isset($certPolicy)){{ $certPolicy->where('policy_type_id', $pt->id)->first()->insurance_provider_code }}@endif --}}
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-64 ng-star-inserted">
                                                                                            <div class="mat-form-field-outline-start ng-tns-c70-64"
                                                                                                style="width: 0px;"></div>
                                                                                            <div class="mat-form-field-outline-gap ng-tns-c70-64"
                                                                                                style="width: 0px;"></div>

                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-infix ng-tns-c70-64">
                                                                                            <input autocomplete="off"
                                                                                                oninput="validateInput(event)"
                                                                                                disabled
                                                                                                formcontrolname="insrLtrGL"
                                                                                                name="insurance_provider_code[{{ $pt->id }}]"
                                                                                                maxlength="1"
                                                                                                minlength="1"
                                                                                                value="@if (!empty($certPolicy->where('policy_type_id', $pt->id)->first())) {{ $certPolicy->where('policy_type_id', $pt->id)->first()->insurance_provider_code }} @endif"
                                                                                                class="mat-input-element mat-form-field-autofill-control ng-tns-c70-64 ng-untouched ng-pristine ng-invalid cdk-text-field-autofill-monitored"
                                                                                                required=""
                                                                                                id="mat-input-20"><span
                                                                                                class="mat-form-field-label-wrapper ng-tns-c70-64"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="mat-form-field-subscript-wrapper ng-tns-c70-64">
                                                                                        <div class="mat-form-field-hint-wrapper ng-tns-c70-64 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                            style="opacity: 1; transform: translateY(0%);">
                                                                                            <div
                                                                                                class="mat-form-field-hint-spacer ng-tns-c70-64">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </mat-form-field>
                                                                        </td>
                                                                        <td align="center" class="ng-tns-c268-42">
                                                                            <mat-form-field appearance="outline"
                                                                                class="mat-form-field width-40 input_c_r ng-tns-c268-42 ng-tns-c70-65 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float mat-form-field-disabled ng-star-inserted"
                                                                                style="">
                                                                                <div
                                                                                    class="mat-form-field-wrapper ng-tns-c70-65">
                                                                                    <div
                                                                                        class="mat-form-field-flex ng-tns-c70-65">
                                                                                        <div
                                                                                            class="mat-form-field-outline ng-tns-c70-65 ng-star-inserted">
                                                                                            <div class="mat-form-field-outline-start ng-tns-c70-65"
                                                                                                style="width: 0px;"></div>
                                                                                            <div class="mat-form-field-outline-gap ng-tns-c70-65"
                                                                                                style="width: 0px;"></div>
                                                                                            <div
                                                                                                class="mat-form-field-outline-end ng-tns-c70-65">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-65 ng-star-inserted">
                                                                                            <div class="mat-form-field-outline-start ng-tns-c70-65"
                                                                                                style="width: 0px;"></div>
                                                                                            <div class="mat-form-field-outline-gap ng-tns-c70-65"
                                                                                                style="width: 0px;"></div>
                                                                                            <div
                                                                                                class="mat-form-field-outline-end ng-tns-c70-65">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-infix ng-tns-c70-65">
                                                                                            <input autocomplete="off"
                                                                                                matinput=""
                                                                                                value=""
                                                                                                disabled=""
                                                                                                class="mat-input-element mat-form-field-autofill-control ng-tns-c70-65 cdk-text-field-autofill-monitored"
                                                                                                id="mat-input-21"
                                                                                                aria-invalid="false"
                                                                                                aria-required="false"><span
                                                                                                class="mat-form-field-label-wrapper ng-tns-c70-65"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="mat-form-field-subscript-wrapper ng-tns-c70-65">
                                                                                        <div class="mat-form-field-hint-wrapper ng-tns-c70-65 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                            style="opacity: 1; transform: translateY(0%);">
                                                                                            <div
                                                                                                class="mat-form-field-hint-spacer ng-tns-c70-65">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </mat-form-field>
                                                                        </td>
                                                                        <td align="center" class="ng-tns-c268-42">
                                                                            <mat-form-field appearance="outline"
                                                                                class="mat-form-field width-40 input_c_r ng-tns-c268-42 ng-tns-c70-65 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float mat-form-field-disabled ng-star-inserted"
                                                                                style="">
                                                                                <div
                                                                                    class="mat-form-field-wrapper ng-tns-c70-65">
                                                                                    <div
                                                                                        class="mat-form-field-flex ng-tns-c70-65">
                                                                                        <div
                                                                                            class="mat-form-field-outline ng-tns-c70-65 ng-star-inserted">
                                                                                            <div class="mat-form-field-outline-start ng-tns-c70-65"
                                                                                                style="width: 0px;"></div>
                                                                                            <div class="mat-form-field-outline-gap ng-tns-c70-65"
                                                                                                style="width: 0px;"></div>
                                                                                            <div
                                                                                                class="mat-form-field-outline-end ng-tns-c70-65">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-65 ng-star-inserted">
                                                                                            <div class="mat-form-field-outline-start ng-tns-c70-65"
                                                                                                style="width: 0px;"></div>
                                                                                            <div class="mat-form-field-outline-gap ng-tns-c70-65"
                                                                                                style="width: 0px;"></div>
                                                                                            <div
                                                                                                class="mat-form-field-outline-end ng-tns-c70-65">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-infix ng-tns-c70-65">
                                                                                            <input autocomplete="off"
                                                                                                matinput=""
                                                                                                value=""
                                                                                                disabled=""
                                                                                                class="mat-input-element mat-form-field-autofill-control ng-tns-c70-65 cdk-text-field-autofill-monitored"
                                                                                                id="mat-input-21"
                                                                                                aria-invalid="false"
                                                                                                aria-required="false"><span
                                                                                                class="mat-form-field-label-wrapper ng-tns-c70-65"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="mat-form-field-subscript-wrapper ng-tns-c70-65">
                                                                                        <div class="mat-form-field-hint-wrapper ng-tns-c70-65 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                            style="opacity: 1; transform: translateY(0%);">
                                                                                            <div
                                                                                                class="mat-form-field-hint-spacer ng-tns-c70-65">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </mat-form-field>
                                                                        </td>
                                                                        <td valign="top" class="p-0 ng-tns-c268-42">
                                                                            <table width="100%" cellpadding="0"
                                                                                cellspacing="0" border="0"
                                                                                class="agenc_sub_table ng-tns-c268-42">
                                                                                <tbody class="ng-tns-c268-42">
                                                                                    <tr height="30"
                                                                                        class="ng-tns-c268-42">
                                                                                        <td colspan="4"
                                                                                            class="lable_title ng-tns-c268-42">
                                                                                            {{ $pt->type_name }}</td>
                                                                                    </tr>
                                                                                    @foreach ($pt->policies as $pp)
                                                                                        <tr class="ng-tns-c268-42">
                                                                                            <td
                                                                                                class="text-center ng-tns-c268-42">
                                                                                                <mat-checkbox
                                                                                                    formcontrolname="glLiability"
                                                                                                    class="mat-checkbox ng-tns-c268-42 mat-accent ng-untouched ng-pristine ng-valid"
                                                                                                    id="mat-checkbox-29">
                                                                                                    <input
                                                                                                        class="form-check-input abcd"
                                                                                                        type="checkbox"
                                                                                                        value="{{ $pp->id }}"
                                                                                                        name="main_policy_sub[{{ str_replace(' ', '_', $pt->id) }}][{{ $pp->id }}]"
                                                                                                        id="{{ $pp->policy_title }}"
                                                                                                        @if (isset($certPolicy)) {{ $certPolicy->where('policy_id', $pp->id)->first() ? 'checked' : '' }} @endif
                                                                                                        disabled />
                                                                                                    <input type="hidden"
                                                                                                        id="checkboxValidation"
                                                                                                        value="false">
                                                                                                </mat-checkbox>
                                                                                            </td>
                                                                                            <td colspan="3"
                                                                                                class="lable_title_normal ng-tns-c268-42">
                                                                                                <span
                                                                                                    class="ng-tns-c268-42">
                                                                                                    {{ $pp->policy_title }}</span>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach

                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                        <td valign="top" class="p-0 ng-tns-c268-42">
                                                                            <table width="100%" cellpadding="0"
                                                                                cellspacing="0" border="0"
                                                                                class="agenc_sub_table ng-tns-c268-42">
                                                                                <tbody class="ng-tns-c268-42">
                                                                                    <tr class="ng-tns-c268-42">
                                                                                        <td align="center"
                                                                                            class="ng-tns-c268-42">
                                                                                            <mat-form-field
                                                                                                appearance="outline"
                                                                                                class="mat-form-field input_c_r w-95p ng-tns-c268-42 ng-tns-c70-67 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-invalid ng-star-inserted"
                                                                                                style="">
                                                                                                <div
                                                                                                    class="mat-form-field-wrapper ng-tns-c70-67">
                                                                                                    <div
                                                                                                        class="mat-form-field-flex ng-tns-c70-67">
                                                                                                        <div
                                                                                                            class="mat-form-field-outline ng-tns-c70-67 ng-star-inserted">
                                                                                                            <div class="mat-form-field-outline-start ng-tns-c70-67"
                                                                                                                style="width: 0px;">
                                                                                                            </div>
                                                                                                            <div class="mat-form-field-outline-gap ng-tns-c70-67"
                                                                                                                style="width: 0px;">
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="mat-form-field-outline-end ng-tns-c70-67">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-67 ng-star-inserted">
                                                                                                            <div class="mat-form-field-outline-start ng-tns-c70-67"
                                                                                                                style="width: 0px;">
                                                                                                            </div>
                                                                                                            <div class="mat-form-field-outline-gap ng-tns-c70-67"
                                                                                                                style="width: 0px;">
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="mat-form-field-outline-end ng-tns-c70-67">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="mat-form-field-infix ng-tns-c70-67">
                                                                                                            <input disabled
                                                                                                                autocomplete="off"
                                                                                                                matinput=""
                                                                                                                formcontrolname="policyNumberGL"
                                                                                                                maxlength="20"
                                                                                                                name="main_policy_polnum[{{ $pt->id }}]"
                                                                                                                value=""
                                                                                                                oninput="this.value = this.value.toUpperCase()"
                                                                                                                class="mat-input-element mat-form-field-autofill-control ng-tns-c70-67 ng-untouched ng-pristine ng-invalid cdk-text-field-autofill-monitored"
                                                                                                                required=""
                                                                                                                id="mat-input-23"
                                                                                                                aria-required="true"><span
                                                                                                                class="mat-form-field-label-wrapper ng-tns-c70-67"></span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="mat-form-field-subscript-wrapper ng-tns-c70-67">
                                                                                                        <div class="mat-form-field-hint-wrapper ng-tns-c70-67 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                                            style="opacity: 1; transform: translateY(0%);">
                                                                                                            <div
                                                                                                                class="mat-form-field-hint-spacer ng-tns-c70-67">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </mat-form-field>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr class="ng-tns-c268-42">
                                                                                        <td
                                                                                            class="lable_title_large ng-tns-c268-42">
                                                                                            <div style="margin-top: 5px; margin-bottom: 5px; padding-left: 5px;"
                                                                                                class="ng-tns-c268-42"> Is
                                                                                                This
                                                                                                Policy Through A
                                                                                                Risk Retention Insurance
                                                                                                Company?&nbsp; </div>
                                                                                            <mat-slide-toggle
                                                                                                formcontrolname="rrgFlagGL"
                                                                                                class="mat-slide-toggle ng-tns-c268-42 mat-accent ng-untouched ng-pristine ng-valid"
                                                                                                id="mat-slide-toggle-10"><label
                                                                                                    class="mat-slide-toggle-label"
                                                                                                    for="mat-slide-toggle-10-input"><span
                                                                                                        class="mat-slide-toggle-bar"><input
                                                                                                            type="checkbox"
                                                                                                            role="switch"
                                                                                                            class="mat-slide-toggle-input cdk-visually-hidden"
                                                                                                            id="mat-slide-toggle-10-input"
                                                                                                            tabindex="0"
                                                                                                            aria-checked="false"><span
                                                                                                            class="mat-slide-toggle-thumb-container"><span
                                                                                                                class="mat-slide-toggle-thumb"></span><span
                                                                                                                mat-ripple=""
                                                                                                                class="mat-ripple mat-slide-toggle-ripple mat-focus-indicator"><span
                                                                                                                    class="mat-ripple-element mat-slide-toggle-persistent-ripple"></span></span></span></span><span
                                                                                                        class="mat-slide-toggle-content"><span
                                                                                                            style="display: none;">&nbsp;</span>No</span></label>
                                                                                            </mat-slide-toggle>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                        <td valign="middle" align="center"
                                                                            class="ng-tns-c268-42">
                                                                            <mat-form-field appearance="outline"
                                                                                class="mat-form-field input_c_r w-120 ng-tns-c268-42 ng-tns-c70-68 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-invalid ng-star-inserted"
                                                                                style="">
                                                                                <div
                                                                                    class="mat-form-field-wrapper ng-tns-c70-68">
                                                                                    <div
                                                                                        class="mat-form-field-flex ng-tns-c70-68">
                                                                                        <div
                                                                                            class="mat-form-field-outline ng-tns-c70-68 ng-star-inserted">
                                                                                            <div class="mat-form-field-outline-start ng-tns-c70-68"
                                                                                                style="width: 0px;"></div>
                                                                                            <div class="mat-form-field-outline-gap ng-tns-c70-68"
                                                                                                style="width: 0px;"></div>
                                                                                            <div
                                                                                                class="mat-form-field-outline-end ng-tns-c70-68">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-68 ng-star-inserted">
                                                                                            <div class="mat-form-field-outline-start ng-tns-c70-68"
                                                                                                style="width: 0px;"></div>
                                                                                            <div class="mat-form-field-outline-gap ng-tns-c70-68"
                                                                                                style="width: 0px;"></div>
                                                                                            <div
                                                                                                class="mat-form-field-outline-end ng-tns-c70-68">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-infix ng-tns-c70-68">
                                                                                            <input disabled
                                                                                                @if ($r == 1) type="text"
                                                                                @else
                                                                                type="date" @endif
                                                                                                name="main_policy_eff_date[{{ $pt->id }}]"
                                                                                                class="mat-input-element mat-form-field-autofill-control mat-datepicker-input l_h_23 ng-tns-c70-68 ng-untouched ng-pristine ng-invalid cdk-text-field-autofill-monitored"
                                                                                                value="">
                                                                                            <mat-datepicker
                                                                                                class="ng-tns-c70-68">
                                                                                            </mat-datepicker><span
                                                                                                class="mat-form-field-label-wrapper ng-tns-c70-68"></span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-suffix ng-tns-c70-68 ng-star-inserted">
                                                                                            <mat-datepicker-toggle
                                                                                                matsuffix=""
                                                                                                class="mat-datepicker-toggle ng-tns-c70-68"
                                                                                                data-mat-calendar="mat-datepicker-1">
                                                                                                <button mat-icon-button=""
                                                                                                    type="button"
                                                                                                    class="mat-focus-indicator mat-icon-button mat-button-base"
                                                                                                    aria-haspopup="dialog"
                                                                                                    aria-label="Open calendar"
                                                                                                    tabindex="0"><span
                                                                                                        matripple=""
                                                                                                        class="mat-ripple mat-button-ripple mat-button-ripple-round"></span><span
                                                                                                        class="mat-button-focus-overlay"></span></button>
                                                                                            </mat-datepicker-toggle>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="mat-form-field-subscript-wrapper ng-tns-c70-68">
                                                                                        <div class="mat-form-field-hint-wrapper ng-tns-c70-68 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                            style="opacity: 1; transform: translateY(0%);">
                                                                                            <div
                                                                                                class="mat-form-field-hint-spacer ng-tns-c70-68">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </mat-form-field>
                                                                        </td>
                                                                        <td valign="middle" align="center"
                                                                            class="ng-tns-c268-42">
                                                                            <mat-form-field appearance="outline"
                                                                                class="mat-form-field input_c_r w-120 ng-tns-c268-42 ng-tns-c70-69 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-can-float ng-untouched ng-pristine ng-invalid ng-star-inserted"
                                                                                style="">
                                                                                <div
                                                                                    class="mat-form-field-wrapper ng-tns-c70-69">
                                                                                    <div
                                                                                        class="mat-form-field-flex ng-tns-c70-69">
                                                                                        <div
                                                                                            class="mat-form-field-outline ng-tns-c70-69 ng-star-inserted">
                                                                                            <div class="mat-form-field-outline-start ng-tns-c70-69"
                                                                                                style="width: 0px;"></div>
                                                                                            <div class="mat-form-field-outline-gap ng-tns-c70-69"
                                                                                                style="width: 0px;"></div>
                                                                                            <div
                                                                                                class="mat-form-field-outline-end ng-tns-c70-69">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-outline mat-form-field-outline-thick ng-tns-c70-69 ng-star-inserted">
                                                                                            <div class="mat-form-field-outline-start ng-tns-c70-69"
                                                                                                style="width: 0px;"></div>
                                                                                            <div class="mat-form-field-outline-gap ng-tns-c70-69"
                                                                                                style="width: 0px;"></div>
                                                                                            <div
                                                                                                class="mat-form-field-outline-end ng-tns-c70-69">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-infix ng-tns-c70-69">
                                                                                            <input disabled
                                                                                                @if ($r == 1) type="text"
                                                                                @else
                                                                                type="date" @endif
                                                                                                name="main_policy_exp_date[{{ $pt->id }}]"
                                                                                                class="mat-input-element mat-form-field-autofill-control mat-datepicker-input l_h_23 ng-tns-c70-69 ng-untouched ng-pristine ng-invalid cdk-text-field-autofill-monitored"
                                                                                                value="">
                                                                                            <mat-datepicker
                                                                                                class="ng-tns-c70-69">
                                                                                            </mat-datepicker><span
                                                                                                class="mat-form-field-label-wrapper ng-tns-c70-69"></span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="mat-form-field-suffix ng-tns-c70-69 ng-star-inserted">
                                                                                            <mat-datepicker-toggle
                                                                                                matsuffix=""
                                                                                                class="mat-datepicker-toggle ng-tns-c70-69"
                                                                                                data-mat-calendar="mat-datepicker-2">
                                                                                                <button disabled
                                                                                                    mat-icon-button=""
                                                                                                    type="button"
                                                                                                    class="mat-focus-indicator mat-icon-button mat-button-base"
                                                                                                    aria-haspopup="dialog"
                                                                                                    aria-label="Open calendar"
                                                                                                    tabindex="0"><span
                                                                                                        matripple=""
                                                                                                        class="mat-ripple mat-button-ripple mat-button-ripple-round"></span><span
                                                                                                        class="mat-button-focus-overlay"></span></button>
                                                                                            </mat-datepicker-toggle>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="mat-form-field-subscript-wrapper ng-tns-c70-69">
                                                                                        <div class="mat-form-field-hint-wrapper ng-tns-c70-69 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                            style="opacity: 1; transform: translateY(0%);">
                                                                                            <div
                                                                                                class="mat-form-field-hint-spacer ng-tns-c70-69">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </mat-form-field>
                                                                        </td>
                                                                        <td valign="top" class="p-0 ng-tns-c268-42">
                                                                            <table width="100%" cellpadding="0"
                                                                                cellspacing="0" border="0"
                                                                                class="agenc_sub_table ng-tns-c268-42">
                                                                                <tbody class="ng-tns-c268-42">
                                                                                    @foreach ($pt->policyLimits as $pl)
                                                                                        <tr class="ng-tns-c268-42">
                                                                                            <td width="50%"
                                                                                                class="lable_title_normal ng-tns-c268-42">
                                                                                                {{ $pl->coverage_item }}
                                                                                            </td>
                                                                                            <td class="ng-tns-c268-42">
                                                                                                <mat-form-field
                                                                                                    appearance="outline"
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
                                                                                                                class="mat-form-field-prefix ng-tns-c70-70 ng-star-inserted">
                                                                                                                <span
                                                                                                                    matprefix=""
                                                                                                                    class="ng-tns-c70-70">$&nbsp;</span>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="mat-form-field-infix ng-tns-c70-70">
                                                                                                                <input
                                                                                                                    disabled
                                                                                                                    type="number"
                                                                                                                    class="form-control"
                                                                                                                    id="{{ $pl->coverage_item }}"
                                                                                                                    name="main_policy_coverage[{{ str_replace(' ', '_', $pt->id) }}][{{ $pl->id }}]"
                                                                                                                    placeholder=""
                                                                                                                    value="@if(isset($certPolimit)){{$certPolimit->where('policy_limit_id', $pl->id)->first()->amount ?? 0}}@endif"
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
                                                                        </td>
                                                                    </tr>
                                                                @endforeach

                                                                @if (!empty($policytypes->where('id', 10)->all()))
                                                                    <tr
                                                                        class="ng-tns-c268-42 ng-trigger ng-trigger-slideUpDown ng-star-inserted">
                                                                        <td colspan="7"
                                                                            class="chkb_lable_title ng-tns-c268-42">
                                                                            <table>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Apply Umbrella Liability to:
                                                                                        </td>
                                                                                        @foreach ($policytypes->where('id', '!=', 10) as $pt)
                                                                                            <td>
                                                                                                <mat-checkbox
                                                                                                    class="mat-checkbox ng-tns-c268-42 mat-accent mat-checkbox-checked"
                                                                                                    id="mat-checkbox-28">
                                                                                                    <input
                                                                                                        class="form-check-input"
                                                                                                        name="umbrella_checkbox[{{ $pt->id }}]"
                                                                                                        type="checkbox"
                                                                                                        value="{{ $pt->id }}"
                                                                                                        @if (!empty($pt->certificateUmbrellas->first()->policy_type_id)) {{ $pt->certificateUmbrellas->first()->policy_type_id == $pt->id ? 'checked' : '' }} @endif />
                                                                                                </mat-checkbox>
                                                                                                {{ $pt->type_name }}
                                                                                            </td>
                                                                                        @endforeach
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                @endif

                                                                <tr class="ng-tns-c268-42">
                                                                    <td colspan="7" style="padding: 10px;"
                                                                        class="ng-tns-c268-42">
                                                                        <div style="font-size: 11px;"
                                                                            class="ng-tns-c268-42">
                                                                            DESCRIPTION OF
                                                                            OPERATIONS / VEHICLES / EXCLUSIONS ADDED BY
                                                                            ENDORSEMENT /
                                                                            SPECIAL PROVISIONS (Attach <a
                                                                                href="javascript:void(0);"
                                                                                id="acordBox"
                                                                                class="ng-tns-c268-42">ACORD 101</a>,
                                                                            Additional Remarks Schedule, if more space is
                                                                            required)

                                                                            <div
                                                                                class="form-floating form-floating-outline mb-4">
                                                                                <textarea class="form-control h-px-100" name="descrp"
                                                                                    style="background-color: rgb(201 196 196 / 15%) !important;width: 100%;height: 90px;color: #000000;"
                                                                                    placeholder="Comments here...">
@if (!empty($certificate->descrp))
{{ $certificate->descrp }}
@endif
</textarea>

                                                                            </div>
                                                                        </div>
                                                                        <table width="100%" cellpadding="0"
                                                                            cellspacing="0" border="0"
                                                                            class="ng-tns-c268-42">
                                                                            <tbody class="ng-tns-c268-42">
                                                                                <tr class="ng-tns-c268-42">
                                                                                    <td class="ng-tns-c268-42">
                                                                                        <br /><br /><br />
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                        <table width="100%" cellpadding="0" cellspacing="0"
                                                            border="0" style="margin-top: 9px;"
                                                            class="ng-tns-c268-42">
                                                            <tbody class="ng-tns-c268-42">
                                                                <tr class="ng-tns-c268-42">
                                                                    <td style="width: 50%; font-size: 15px; font-weight: bold;"
                                                                        class="ng-tns-c268-42">CERTIFICATE HOLDER</td>
                                                                    <td style="width: 50%; font-size: 15px; font-weight: bold;"
                                                                        class="ng-tns-c268-42">CANCELLATION</td>
                                                                </tr>
                                                                <tr class="ng-tns-c268-42">
                                                                    <td valign="top" colspan="2"
                                                                        class="p-0 ng-tns-c268-42">
                                                                        <table width="100%" cellpadding="0"
                                                                            cellspacing="0" border="0"
                                                                            class="tftable m-t-b-10 ng-tns-c268-42">
                                                                            <tbody class="ng-tns-c268-42">
                                                                                <tr class="ng-tns-c268-42">
                                                                                    <td rowspan="2" width="50%"
                                                                                        class="ct_holder ng-tns-c268-42">

                                                                                        <textarea class="form-control h-px-100" required name="ch"
                                                                                            style="background-color: rgb(201 196 196 / 15%) !important;width: 100%;height: 90px;color: #000000;"
                                                                                            placeholder="Comments here...">
@if (!empty($certificate->ch))
{{ $certificate->ch }}
@endif
</textarea>


                                                                                    </td>
                                                                                    <td class="fot_titel ng-tns-c268-42" style="font-size: 12px;">
                                                                                        SHOULD
                                                                                        ANY OF THE
                                                                                        ABOVE DESCRIBED POLICIES BE
                                                                                        CANCELLED
                                                                                        BEFORE THE
                                                                                        EXPIRATION DATE THEREOF, NOTICE WILL
                                                                                        BE
                                                                                        DELIVERED IN
                                                                                        ACCORDANCE WITH THE POLICY
                                                                                        PROVISIONS.
                                                                                    </td>
                                                                                </tr>
                                                                                <tr class="ng-tns-c268-42">
                                                                                    <td class="fot_titel ng-tns-c268-42" style="font-size: 10px;">
                                                                                        AUTHORIZED
                                                                                        REPRESENTATIVE

                                                                                        @if (!empty($agent->agencies[0]->image_path))
                                                                                            <img src="{{ '/../../storage/app/' . $agent->agencies[0]->image_path }}"
                                                                                                width="91"
                                                                                                height="39"
                                                                                                alt="">
                                                                                        @else
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
    </form>
    </div>
    </div>
    <div class="rights_reserved ng-tns-c268-42">2006 -2024 ACORD CORPORATION. All rights
        reserved.</div>
        <div class="form-floating form-floating-outline mb-4" style="text-align: center;">
          <h3 style="font-weight: 600; font-size: 1.75rem; color: #333;">Additional Remarks Schedule</h3>
      </div>

      <div class="form-floating form-floating-outline mb-4" style="display: flex; justify-content: center;">
          <textarea class="form-control h-px-100" name="ars"
              style="background-color: rgba(0, 0, 0, 0.05) !important; width: 80%; max-width: 600px; height: 200px; color: #333; font-size: 1rem; border-radius: 8px; border: 1px solid #ccc; padding: 12px; text-align: center;"
              placeholder="Comments here...">
              @if (!empty($certificate->ars))
                  {{ $certificate->ars }}
              @endif
          </textarea>
      </div>

      <div fxlayout="row" fxlayoutalign="center center" class="acord-button-row ng-tns-c268-42"
          style="display: flex; justify-content: center; align-items: center; padding-top: 15px;">

          <a mat-flat-button="" href="{{ route('formlist') }}" color="warn"
              class="mat-focus-indicator action-button mat-flat-button mat-button-base mat-warn"
              style="font-weight: 600; background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%); border-radius: 25px; padding: 10px 20px; color: #fff; transition: background-color 0.3s ease;">
              <span class="mat-button-wrapper">Close</span>
          </a>
      </div>


    </div>
    </div>
    </div>
    </div>

    </div>
    </div>
    </div>
    </form>
    @include('agent.agent-script')

@endsection
