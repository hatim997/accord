<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />


  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset(mix('assets/vendor/fonts/materialdesignicons.css')) }}" />
  <link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/node-waves/node-waves.css')) }}" />
  <!-- Core CSS -->

  <link rel="stylesheet" href="{{ asset(mix('assets/css/demo.css')) }}" />
  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')) }}" />
  @stack('body-css')

  <link rel="stylesheet" href="{{ asset('assets/css/accord.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/form.css') }}" />

  <Style>
    .checkbox-container {
        position: relative;
        display: inline-block;
        cursor: pointer;
        line-height: 5px;
    }

    .checkbox-container lable {
      line-height: 5px;
    }

    .checkbox {
        display: inline-block;
        width: 7px;
        height: 7px;
        border: 1px solid #999;
        border-radius: 0px;
        line-height: 5px;
    }
    #acordPage td, #acordPage th {
    margin: 0;
    padding: 0;}

    .tr {
      line-height: 9px;
    }
    .check-symbol {
        display: inline-block;
        font-size: 25px;
        line-height: 5px;
        text-align: center;
        color: #4CAF50; /* Change color as needed */
    }
  </Style>
</head>

<body>

  <div id="contentToPdf">
    <div class="container">

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
              class="widget-group tableBox pt-0 ng-tns-c268-42 ng-trigger ng-trigger-animateStagger">
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
                          <form novalidate="" name="acordForm" style="width: 100% !important;"
                            class="ng-tns-c268-42 ng-untouched ng-pristine ng-invalid" id="form">
                            <div id="accord_container" class="ng-tns-c268-42">
                              <table  cellpadding="0" cellspacing="0" class="tftable ng-tns-c268-42">
                                <tbody class="ng-tns-c268-42">
                                  <tr class="ng-tns-c268-42">
                                    <td colspan="2" valign="middle" class="p-0 ng-tns-c268-42">
                                      <table width="100%" cellpadding="0" cellspacing="0"
                                        class="ng-tns-c268-42">
                                        <tr class="ng-tns-c268-42">
                                          <td class="ng-tns-c268-42"><span class="acord_title ng-tns-c268-42"><img
                                                src="{{ asset('assets/img/nlogo.png')}}" width="91" height="39"
                                                class="ng-tns-c268-42 text-center">
                                              &nbsp;&nbsp;&nbsp;

                                              CERTIFICATE OF LIABILITY
                                              INSURANCE</span>
                                          </td>
                                          <td width="120px" class="date_top ng-tns-c268-42">
                                              <div class="mat-form-field-subscript-wrapper ng-tns-c70-48"
                                              style="text-align: center; position: relative; top:10px; float: left; ">
                                                  {{ date('Y-m-d', strtotime($certificate->created_at)) }}
                                              </div>
                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <table  cellpadding="0" cellspacing="0" class="tftable ng-tns-c268-42">
                              <tbody class="ng-tns-c268-42">
                                  <tr class="ng-tns-c268-42">
                                    <td colspan="2" class="ng-tns-c268-42">
                                      <div class="acord_title_matter ng-tns-c268-42">THIS
                                        CERTIFICATE IS
                                        ISSUED AS A MATTER OF INFORMATION ONLY AND CONFERS
                                        NO RIGHTS
                                        UPON THE CERTIFICATE HOLDER. THIS CERTIFICATE DOES
                                        NOT
                                        AFFIRMATIVELY OR NEGATIVELY AMEND, EXTEND OR ALTER
                                        THE COVERAGE
                                        AFFORDED BY THE POLICIES BELOW. THIS CERTIFICATE OF
                                        INSURANCE
                                        DOES NOT CONSTITUTE A CONTRACT BETWEEN THE ISSUING
                                        INSURER(S),
                                        AUTHORIZED REPRESENTATIVE OR PRODUCER, AND THE
                                        CERTIFICATE
                                        HOLDER. 
                                      
                                      </div>
                                    </td>
                                  </tr>
                                  <tr class="ng-tns-c268-42">
                                    <td width="35%" valign="top" class="p-0 ng-tns-c268-42">
                                      <table width="100%" cellpadding="0" cellspacing="0"  style="min-height: 90px;"
                                        class="ng-tns-c268-42">
                                        <tbody class="ng-tns-c268-42">
                                          <tr height="30" class="ng-tns-c268-42">
                                            <td width="100" valign="middle" class="lable_title ng-tns-c268-42">
                                              PRODUCER

                                              {{ $agent->agencies[0]->agency_name }}<br class="ng-tns-c268-42">
                                              {{ $agent->agencies[0]->agency_address }}<br class="ng-tns-c268-42">
                                              {{ $agent->agencies[0]->agency_city }}
                                              {{ $agent->agencies[0]->agency_state }}
                                              ,
                                              {{ $agent->agencies[0]->agency_zip }} <br class="ng-tns-c268-42">
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                    <td width="65%" valign="top" class="p-0 ng-tns-c268-42">
                                      <table width="100%" cellpadding="0" cellspacing="0"
                                        class="agenc_sub_table a_s_t_b ng-tns-c268-42" style="min-height: 90px;">
                                        <tbody class="ng-tns-c268-42">
                                          <tr class="ng-tns-c268-42">
                                            <td  style="border:1px solid black"class="lable_title tab_fild_set ng-tns-c268-42">
                                              CONTACT NAME:</td>
                                            <td style="border:1px solid black" colspan="3" class="ng-tns-c268-42">
                                              {{ $agent->name }}
                                            </td>
                                          </tr>
                                          <tr class="ng-tns-c268-42">
                                            <td style="border:1px solid black" width="22%" class="lable_title ng-tns-c268-42"><span
                                                class="ng-tns-c268-42">PHONE</span>
                                              (A/C, No,
                                              Ext): </td>
                                            <td style="border:1px solid black"class="ng-tns-c268-42">{{ $agent->agencies[0]->agency_cellphone }}</td>
                                            <td style="border:1px solid black"width="26%" class="lable_title tab_fild_set ng-tns-c268-42">
                                              <span class="ng-tns-c268-42">FAX (A/C,
                                                No):</span>
                                            </td>
                                            <td style="border:1px solid black" width="26%" class="tab_fild_set ng-tns-c268-42">
                                              {{ $agent->agencies[0]->agency_fax }}
                                            </td>
                                          </tr>
                                          <tr class="ng-tns-c268-42">
                                            <td style="border:1px solid black" width="22%" class="lable_title ng-tns-c268-42"><span
                                                class="ng-tns-c268-42">E-MAIL</span>
                                              ADDRESS:
                                            </td>
                                            <td style="border:1px solid black" width="26%" class="ng-tns-c268-42">
                                              {{ $agent->agencies[0]->agency_extra_email }} </td>
                                            <td style="border:1px solid black" width="25%" class="lable_title ng-tns-c268-42"><span
                                                class="ng-tns-c268-42">PRODUCER</span>
                                              CUSTOMER
                                              ID #: </td>
                                            <td style="border:1px solid black" width="25%" class="ng-tns-c268-42">
                                              {{ $agent->agencies[0]->producer_customer_number }}</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                  </tr>
                                  <tr class="ng-tns-c268-42">
                                    <td width="35%" valign="top" class="p-0 ng-tns-c268-42">
                                      <table width="100%" cellpadding="0" cellspacing="0"  style="min-height:100px;"
                                        class="ng-tns-c268-42">
                                        <tbody class="ng-tns-c268-42">
                                          <tr height="10" class="ng-tns-c268-42">
                                            <td width="100" valign="middle" class="lable_title ng-tns-c268-42">
                                              INSURED
                                              <br />
                                              {{ $driver->name }}<br class="ng-tns-c268-42">
                                              {{ $driver->truckers[0]->address }} <br class="ng-tns-c268-42">
                                              {{ $driver->truckers[0]->city }}
                                              {{ $driver->truckers[0]->state }} <br class="ng-tns-c268-42"> ,
                                              {{ $driver->truckers[0]->zip }}
                                              <br class="ng-tns-c268-42">
                                              {{ $driver->truckers[0]->contact_info }} ,
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                    <td width="65%" valign="top" class="p-0 ng-tns-c268-42">
                                      <table width="100%" cellpadding="0" cellspacing="0"
                                        formgroupname="iaInsurerForm"
                                        class="agenc_sub_table a_s_t_b ng-tns-c268-42 ng-untouched ng-pristine ng-valid"
                                        style="min-height:100px;">
                                        <tbody class="ng-tns-c268-42">
                                          <tr class="ng-tns-c268-42">
                                            <td width="18%" class="w-120 tab_fild_set ng-tns-c268-42 td">
                                            </td>
                                            <td width="35%"  class="lable_title ng-tns-c268-42 td">
                                              INSURER(S)
                                              AFFORDING COVERAGE</td>
                                            <td width="20%"  class="lable_title tab_fild_set ng-tns-c268-42 td">
                                              NAIC #
                                            </td>
                                          </tr>

                                          @php
                                          $arr = ['A', 'B', 'C', 'D', 'E'];
                                          $count = 0;
                                      @endphp

                                      @foreach ($certPolicy as $cp)
                                          @foreach ($cp->policyType->certificatePolicies as $scp)
                                              @if ($count < 5)
                                                      <tr class="ng-tns-c268-42">
                                                          <td class="lable_title ng-tns-c268-42 td">
                                                              INSURER {{ $arr[$count] }} :
                                                          </td>
                                                          @if ($scp->insurance_provider_code == $arr[$count])
                                                          <td class="ng-tns-c268-42 td">
                                                              <div class="mat-form-field-infix ng-tns-c70-49">
                                                                  @if (isset($certPolicy)){{ $scp->insuranceProvider->name }}@endif
                                                              </div>
                                                          </td>
                                                          <td class="opd_td ng-tns-c268-42 td">
                                                              <div class="mat-form-field-infix ng-tns-c70-50">
                                                                  @if (isset($certPolicy)){{ $scp->insuranceProvider->naic_number }}@endif
                                                              </div>
                                                          </td>
                                                          @else
                                                          <td class="ng-tns-c268-42 td">
                                                            <div class="mat-form-field-infix ng-tns-c70-49"></div>
                                                          </td>
                                                          <td class="opd_td ng-tns-c268-42 td">
                                                            <div class="mat-form-field-infix ng-tns-c70-49"></div>
                                                          </td>
                                                          @endif
                                                      </tr>
                                                      @php
                                                          $count++; // Increment the counter
                                                      @endphp
                                              @else
                                                  @break {{-- Break out of the loop if the counter reaches 5 --}}
                                              @endif
                                          @endforeach
                                      @endforeach


                                        </tbody>
                                      </table>
                                    </td>
                                  </tr>
                              </tbody>
                            </table>
                            <div class=" ng-tns-c268-42"     style="  display: flex; justify-content:space-between;">
                              <span class="agenc_sub_titel ng-tns-c268-42" 
                              >COVERAGES      </span> 
                                
                                <span class="agenc_sub_titel  ng-tns-c268-42"
                               >CERTIFICATE NUMBER</span>  

                                <span class="agenc_sub_titel  ng-tns-c268-42"
                              >REVISION NUMBER</span>  
                              <div class="clearfix ng-tns-c268-42"></div>
                            </div>

                            <table  style="border-spacing: 0px;" width="100%" cellpadding="0" cellspacing="0"
                              class="tftable ng-tns-c268-42">
                              <tbody class="ng-tns-c268-42">
                                <tr class="ng-tns-c268-42">
                                  <td colspan="8" class="ng-tns-c268-42">
                                    <div style="font-family: Arial; font-size: 11px; margin: 2px;"
                                      class="ng-tns-c268-42"> THE POLICIES OF INSURANCE
                                      LISTED BELOW
                                      HAVE BEEN ISSUED TO THE INSURED NAMED ABOVE FOR THE
                                      POLICY
                                      PERIOD INDICATED. NOTWITHSTANDING THIS CERTIFICATE
                                      MAY BE ISSUED
                                      OR MAY PERTAIN, THE INSURANCE AFFORDED BY THE
                                      POLICIES DESCRIBED
                                      HEREIN IS SUBJECT TO ALL THE TERMS, EXCLUSIONS AND
                                      CONDITIONS OF
                                      SUCH POLICIES. AGGREGATE LIMITS SHOWN MAY HAVE BEEN
                                      REDUCED BY
                                      PAID CLAIMS. </div>
                                  </td>
                                </tr>
                                <tr id="scrollToPolicyHeaderTR" class="ng-tns-c268-42">
                                  <td width="3%" class="lable_title ng-tns-c268-42">INSR LTR
                                  </td>
                                  <td width="25%" class="lable_title ng-tns-c268-42">
                                    <div  class="ng-tns-c268-42">TYPE OF INSURANCE</div>
                                  </td>
                                  <td width="3%" class="lable_title ng-tns-c268-42">
                                    <div  class="ng-tns-c268-42">ADDL INSR</div>
                                  </td>
                                  <td width="3%" class="lable_title ng-tns-c268-42">
                                    <div  class="ng-tns-c268-42">SUBR WVD</div>
                                  </td>
                                  <td width="10%" class="lable_title ng-tns-c268-42">
                                    <div  class="ng-tns-c268-42">POLICY NUMBER
                                    </div>
                                  </td>
                                  <td width="10%" class="lable_title ng-tns-c268-42">
                                    <div  class="ng-tns-c268-42">POLICY
                                      EFF<br class="ng-tns-c268-42">DATE
                                      (MM/DD/YYYY)</div>
                                  </td>
                                  <td width="10%" class="lable_title ng-tns-c268-42">
                                    <div  class="ng-tns-c268-42">POLICY
                                      EXP<br class="ng-tns-c268-42">DATE
                                      (MM/DD/YYYY)</div>
                                  </td>
                                  <td width="28%" class="lable_title ng-tns-c268-42">
                                    <div  class="ng-tns-c268-42">LIMITS</div>
                                  </td>
                                </tr>

                                @foreach ($policytypes->whereIn('id', [1,2,6,10]) as $pt)
                                <tr>
                                    <td>
                                        <div>
                                            <span class="mat-form-field-label-wrapper ng-tns-c70-64"></span>
                                        </div>
                                    </td>

                                    <td valign="middle">
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        {{$pt->type_name}}
                                                    </td>
                                                </tr>

                                                @if($pt->type_name == "General Liability")
                                                @foreach ($pt->policies as $pp)
                                                @if($pp->policy_title == "COMMERCIAL GENERAL LIABILITY")
                                                <tr>
                                                    <td>
                                                      <table style="border-spacing: 0px">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                      <div class="checkbox-container">
                                                                          @php
                                                                              $policyId = 7;
                                                                              $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true : false;
                                                                          @endphp
                                                                          @if ($isChecked)
                                                                              <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}" width="15px" /></span>
                                                                          @else
                                                                              <span class="checkbox"></span>
                                                                          @endif
                                                                          <label>{{ $pp->where('id', $policyId)->first()->policy_title }}</label>
                                                                      </div>
                                                                    </td>
                                                                </tr>
                                                              
                                                                <tr>
                                                                  <td>
                                                                    <div class="checkbox-container">
                                                                        @php
                                                                            $policyId = 8;
                                                                            $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true : false;
                                                                        @endphp
                                                                        @if ($isChecked)
                                                                            <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}" width="15px" /></span>
                                                                        @else
                                                                            <span class="checkbox"></span>
                                                                        @endif
                                                                        <label>{{ $pp->where('id', $policyId)->first()->policy_title }}</label>
                                                                    </div>
                                                                  </td>
                                                                  <td>
                                                                    <div class="checkbox-container">
                                                                        @php
                                                                            $policyId = 9;
                                                                            $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true : false;
                                                                        @endphp
                                                                        @if ($isChecked)
                                                                            <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}" width="15px" /></span>
                                                                        @else
                                                                            <span class="checkbox"></span>
                                                                        @endif
                                                                        <label>{{ $pp->where('id', $policyId)->first()->policy_title }}</label>
                                                                    </div>
                                                                  </td>
                                                                </tr>
                                                              
                                                                <tr>
                                                                 <td> <span class="checkbox"></span>  <div style="border: 0.1px solid #999999; margin-left: 20px;"></div></td>
                                                                </tr>
                                                                <tr>
                                                                  <td> <span class="checkbox"></span>  <div style="border: 0.1px solid #999999; margin-left: 20px; "></div></td>
                                                                 </tr>
                                                                 <tr>
                                                                  <td>   <label>GEN'L AGGREGATE LIMIT APPLIES PER:</label></td>
                                                                 </tr>
                                                                <tr>
                                                                    {{-- <td>
                                                                      <div class="checkbox-container">
                                                                          @php
                                                                              $policyId = 10;
                                                                              $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true : false;
                                                                          @endphp
                                                                          @if ($isChecked)
                                                                              <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}" width="15px" /></span>
                                                                          @else
                                                                              <span class="checkbox"></span>
                                                                          @endif
                                                                          <label>{{ $pp->where('id', $policyId)->first()->policy_title }}</label>
                                                                      </div>
                                                                    </td> --}}
                                                                    
                                                                    
                                                                    <td>
                                                                        <div class="checkbox-container">
                                                                            @php
                                                                                $policyId = 11;
                                                                                $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true : false;
                                                                            @endphp
                                                                            @if ($isChecked)
                                                                                <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}" width="15px" /></span>
                                                                            @else
                                                                                <span class="checkbox"></span>
                                                                            @endif
                                                                            <label>{{ $pp->where('id', $policyId)->first()->policy_title }}</label>
                                                                        </div>
                                                                    </td>
                                                                    <td> <span class="checkbox"></span>  <label>PRO-JECT</label>
                                                                    </td>
                                                                    <td> <span class="checkbox"></span>  <label>LOC</label>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                                @endif

                                                @if($pt->type_name == "Auto Liability")
                                                @foreach ($pt->policies as $pp)
                                                @if($pp->policy_title == "ANY AUTO")
                                                <tr>
                                                    <td>
                                                        <table style="border-spacing: 0px">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                      <div class="checkbox-container">
                                                                          @php
                                                                              $policyId = 1;
                                                                              $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true : false;
                                                                          @endphp
                                                                          @if ($isChecked)
                                                                              <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}" width="15px" /></span>
                                                                          @else
                                                                              <span class="checkbox"></span>
                                                                          @endif
                                                                          <label>{{ $pp->where('id', $policyId)->first()->policy_title }}</label>
                                                                      </div>
                                                                    </td>
                                                                 
                                                                </tr>
                                                                <tr>
                                                                  <td>
                                                                    <div class="checkbox-container">
                                                                        @php
                                                                            $policyId = 2;
                                                                            $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true : false;
                                                                        @endphp
                                                                        @if ($isChecked)
                                                                            <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}" width="15px" /></span>
                                                                        @else
                                                                            <span class="checkbox"></span>
                                                                        @endif
                                                                        <label>{{ $pp->where('id', $policyId)->first()->policy_title }}</label>
                                                                    </div>
                                                                  </td>
                                                                    <td>
                                                                      <div class="checkbox-container">
                                                                          @php
                                                                              $policyId = 3;
                                                                              $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true : false;
                                                                          @endphp
                                                                          @if ($isChecked)
                                                                              <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}" width="15px" /></span>
                                                                          @else
                                                                              <span class="checkbox"></span>
                                                                          @endif
                                                                          <label>{{ $pp->where('id', $policyId)->first()->policy_title }}</label>
                                                                      </div>
                                                                    </td>
                                                                   
                                                                </tr>
                                                                <tr>
                                                                  <td>
                                                                    <div class="checkbox-container">
                                                                        @php
                                                                            $policyId = 4;
                                                                            $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true : false;
                                                                        @endphp
                                                                        @if ($isChecked)
                                                                            <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}" width="15px" /></span>
                                                                        @else
                                                                            <span class="checkbox"></span>
                                                                        @endif
                                                                        <label>{{ $pp->where('id', $policyId)->first()->policy_title }}</label>
                                                                    </div>
                                                                  </td>
                                                                  <td>
                                                                    <div class="checkbox-container">
                                                                        @php
                                                                            $policyId = 5;
                                                                            $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true : false;
                                                                        @endphp
                                                                        @if ($isChecked)
                                                                            <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}" width="15px" /></span>
                                                                        @else
                                                                            <span class="checkbox"></span>
                                                                        @endif
                                                                        <label>{{ $pp->where('id', $policyId)->first()->policy_title }}</label>
                                                                    </div>
                                                                  </td>
                                                                </tr>
                                                                <tr>
                                                                  <td>
                                                                    <span class="checkbox"></span>

                                                                </td>
                                                                <td>
                                                                  <span class="checkbox"></span>
                                                                  
                                                              </td>
                                                              </tr> 
                                                                {{-- <tr>
                                                                  <td>
                                                                    <div class="checkbox-container">
                                                                        @php
                                                                            $policyId = 6;
                                                                            $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true : false;
                                                                        @endphp
                                                                        @if ($isChecked)
                                                                            <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}" width="15px" /></span>
                                                                        @else
                                                                            <span class="checkbox"></span>
                                                                        @endif
                                                                        <label>{{ $pp->where('id', $policyId)->first()->policy_title }}</label>
                                                                    </div>
                                                                  </td>
                                                              </tr> --}}
                                                       
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                                @endif

                                                @if($pt->type_name == "Umbrella")
                                                @foreach ($pt->policies as $pp)
                                                @if($pp->policy_title == "UMBRELLA LIAB")
                                                <tr>
                                                    <td>
                                                        <table style="border-spacing: 0px">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                      <div class="checkbox-container">
                                                                          @php
                                                                              $policyId = 14;
                                                                              $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true : false;
                                                                          @endphp
                                                                          @if ($isChecked)
                                                                              <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}" width="15px" /></span>
                                                                          @else
                                                                              <span class="checkbox"></span>
                                                                          @endif
                                                                          <label>{{ $pp->where('id', $policyId)->first()->policy_title }}</label>
                                                                      </div>
                                                                    </td>
                                                                    <td>
                                                                      <div class="checkbox-container">
                                                                          @php
                                                                              $policyId = 15;
                                                                              $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true : false;
                                                                          @endphp
                                                                          @if ($isChecked)
                                                                              <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}" width="15px" /></span>
                                                                          @else
                                                                              <span class="checkbox"></span>
                                                                          @endif
                                                                          <label>{{ $pp->where('id', $policyId)->first()->policy_title }}</label>
                                                                      </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                   
                                                                    <td>
                                                                      <div class="checkbox-container">
                                                                          @php
                                                                              $policyId = 16;
                                                                              $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true : false;
                                                                          @endphp
                                                                          @if ($isChecked)
                                                                              <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}" width="15px" /></span>
                                                                          @else
                                                                              <span class="checkbox"></span>
                                                                          @endif
                                                                          <label>{{ $pp->where('id', $policyId)->first()->policy_title }}</label>
                                                                      </div>
                                                                    </td>
                                                                    <td>
                                                                      <div class="checkbox-container">
                                                                          @php
                                                                              $policyId = 17;
                                                                              $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true : false;
                                                                          @endphp
                                                                          @if ($isChecked)
                                                                              <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}" width="15px" /></span>
                                                                          @else
                                                                              <span class="checkbox"></span>
                                                                          @endif
                                                                          <label>{{ $pp->where('id', $policyId)->first()->policy_title }}</label>
                                                                      </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                               
                                                                  <td>
                                                                    <div class="checkbox-container">
                                                                        @php
                                                                            $policyId = 18;
                                                                            $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true : false;
                                                                        @endphp
                                                                        @if ($isChecked)
                                                                            <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}" width="15px" /></span>
                                                                        @else
                                                                            <span class="checkbox"></span>
                                                                        @endif
                                                                        <label>{{ $pp->where('id', $policyId)->first()->policy_title }}</label>
                                                                    </div>
                                                                  </td>
                                                              
                                                                <td>
                                                                  <div class="checkbox-container">
                                                                      @php
                                                                          $policyId = 19;
                                                                          $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true : false;
                                                                      @endphp
                                                                      @if ($isChecked)
                                                                          <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}" width="15px" /></span>
                                                                      @else
                                                                          <span class="checkbox"></span>
                                                                      @endif
                                                                      <label>{{ $pp->where('id', $policyId)->first()->policy_title }}</label>
                                                                         <label> &nbsp;&nbsp;&nbsp;&nbsp; <b>$0</b> &nbsp;</label>
                                                                  </div>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                                @endif

                                                {{-- Remaining Policies --}}
                                                  @if($pt->type_name == "Employers Liability")
                                                  @foreach ($pt->policies as $pp)
                                                  @if($pp->id == 20)
                                                  <tr>
                                                  <td >
                                                
                                                    <b>WORKERS COMPENSATION <br>AND EMPLOYERS' LIABILITY
                                                   </b>
                                                
                                                  </td>
                                                  <td> Y/N
                                                  </td>

                                                </tr>
                                                  <tr>
                                                  <td >
                                                
                                                    PROPRIETOR/PARTNER/EXECUTIVE <br> OFFICER/MEMBER EXCLUDED?
                                                
                                                  </td>
                                                  <td >   <span class="checkbox"></span>
                                                  </td>
                                                      {{-- <td>
                                                        {{ $pp->where('id', 20)->first()->policy_title }}
                                                      </td> --}}
                                                  </tr>
                                                  <tr>
                                                    <td >
                                                
                                                     <b>(Mandatory in NH)</b>
                                                  
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td >
                                                
                                                      If yes, describe under <br>
                                                      DESCRIPTION OF OPERATIONS below
                                                  
                                                    </td>
                                                  </tr>



                                                  @endif
                                                  @endforeach
                                                  @endif
                                               







                                            </tbody>
                                        </table>
                                    </td>

                                    <td>
                                        <div>
                                            <span class="mat-form-field-label-wrapper ng-tns-c70-64">SADSAD</span>
                                        </div>
                                    </td>

                                    <td>
                                        <div>
                                            <span class="mat-form-field-label-wrapper ng-tns-c70-64">DSAD</span>
                                        </div>
                                    </td>

                                    <td valign="middle">
                                        <div>
                                            <span>{{ !empty($certPolicy) ? $certPolicy->where('policy_type_id', $pt->id)->first()->policy_number ?? '' : '' }}</span>
                                        </div>
                                    </td>
                                    <td valign="middle">
                                        <div>
                                            <span>{{ !empty($certPolicy->where('policy_type_id', $pt->id)->first()->start_date) ? date('Y-m-d', strtotime($certPolicy->where('policy_type_id', $pt->id)->first()->start_date)) : '' }}</span>
                                        </div>
                                    </td>
                                    <td valign="middle">
                                        <div>
                                            <span>{{ !empty($certPolicy->where('policy_type_id', $pt->id)->first()->expiry_date) ? date('Y-m-d', strtotime($certPolicy->where('policy_type_id', $pt->id)->first()->expiry_date)) : '' }}</span>
                                        </div>
                                    </td>
                                    <td valign="top">
                                        <table width="100%"  cellpadding="0" cellspacing="0">
                                            <tbody>
                                              @if(!empty($pt->policyLimits))
                                                  @foreach ($pt->policyLimits as $pl)
                                                  @if($pl->policy_type_id !=6)
                                                      <tr >
                                                          <td style="border:1px solid black">{{ $pl->coverage_item }}</td>
                                                          <td style="border:1px solid black" width="30%">
                                                              <div>
                                                                  <span>$&nbsp; @if(isset($certPolimit)){{number_format($certPolimit->where('policy_limit_id', $pl->id)->first()->amount ?? 0, 2, '.', ',') }}@endif<span>
                                                                  </span>
                                                              </div>
                                                          </td>
                                                      </tr>
                                                    @else
                                                    <tr >
                                                      <td style="border:1px solid black">{{ $pl->coverage_item }}</td>
                                                      <td style="border:1px solid black" width="30%">
                                                          <div>
                                                              <span>$&nbsp; @if(isset($certPolimit)){{number_format($certPolimit->where('policy_limit_id', $pl->id)->first()->amount ?? 0, 2, '.', ',') }}@endif
                                                              </span>
                                                          </div>
                                                      </td>
                                                  </tr>
                                                    @endif
                                                  @endforeach
                                              @else
                                                  <tr >
                                                    <td style="border:1px solid black">{{ $pl->coverage_item }}</td>
                                                    <td style="border:1px solid black" width="20%">
                                                        <div>
                                                            <span>$&nbsp;
                                                                <span>
                                                                  N/A
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </td>
                                                </tr>
                                              @endif
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                @endforeach
                                <tr id="scrollToPolicyHeaderTR" class="ng-tns-c268-42" style="height: 120px; ">
                                  <td width="3%" class="lable_title ng-tns-c268-42">

                                  </td>
                                  <td width="25%" class="lable_title ng-tns-c268-42">
                                    <div  class="ng-tns-c268-42"><b>OTHERS</b></div>
                                  </td>
                                  <td width="3%" class="lable_title ng-tns-c268-42">
                                    <div  class="ng-tns-c268-42"> </div>
                                  </td>
                                  <td width="3%" class="lable_title ng-tns-c268-42">
                                    <div  class="ng-tns-c268-42"></div>
                                  </td>
                                  <td width="10%" class="lable_title ng-tns-c268-42">
                                    <div  class="ng-tns-c268-42">
                                    </div>
                                  </td>
                                  <td width="10%" class="lable_title ng-tns-c268-42">
                                    <div  class="ng-tns-c268-42">
                                      <br class="ng-tns-c268-42"></div>
                                  </td>
                                  <td width="10%" class="lable_title ng-tns-c268-42">
                                    <div  class="ng-tns-c268-42"><br class="ng-tns-c268-42"></div>
                                  </td>
                                  <td width="28%" class="lable_title ng-tns-c268-42">
                                    <div  class="ng-tns-c268-42"></div>
                                  </td>
                                </tr>



                                <tr class="ng-tns-c268-42">
                                  <td colspan="8" style="padding: 10px;" class="ng-tns-c268-42">
                                    <div style="font-size: 11px; height:30px;" class="ng-tns-c268-42">
                                      DESCRIPTION OF OPERATIONS / LOCATIONS / VEHICLES  (Attach ACORD 101, Additional Remarks Schedule, if more space is required) </div>

                                  </td>
                                </tr>

                              </tbody>
                            </table>

                            <table width="100%" cellpadding="0" cellspacing="0"  style="margin-top: 9px;"
                              class="ng-tns-c268-42">
                              <tbody class="ng-tns-c268-42">
                                <tr class="ng-tns-c268-42">
                                  <td style="width: 50%; font-size: 12px; font-weight: bold;" class="ng-tns-c268-42">
                                    CERTIFICATE HOLDER</td>
                                  <td style="width: 50%; font-size: 12px; font-weight: bold;" class="ng-tns-c268-42">
                                    CANCELLATION</td>
                                </tr>
                                <tr class="ng-tns-c268-42">
                                  <td valign="top" colspan="2" class="p-0 ng-tns-c268-42">
                                    <table width="100%" cellpadding="0" cellspacing="0"
                                      class="tftable m-t-b-10 ng-tns-c268-42">
                                      <tbody class="ng-tns-c268-42">
                                        <tr class="ng-tns-c268-42">
                                          <td rowspan="2" width="50%">
                                            President <br />
                                            The Acme
                                            Association of North America <br /> 11785
                                            Beltsville Drive
                                            <br /> Suite
                                            1100<br />
                                            Calverton, MD
                                            20705-4048
                                          </td>
                                          <td class="fot_titel ng-tns-c268-42"> SHOULD
                                            ANY OF THE
                                            ABOVE DESCRIBED POLICIES BE CANCELLED
                                            BEFORE THE
                                            EXPIRATION DATE THEREOF, NOTICE WILL BE
                                            DELIVERED IN
                                            ACCORDANCE WITH THE POLICY PROVISIONS.
                                          </td>
                                        </tr>
                                        <tr class="ng-tns-c268-42">
                                          <td class="fot_titel ng-tns-c268-42">
                                            AUTHORIZED
                                            REPRESENTATIVE <div class="ng-tns-c268-42"> <br /></div>
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
                    <footer>
                      <div class="rights_reserved ng-tns-c268-42" style="font-size: 10px;">
                        © 1988-{{ date('Y') }} ACORD CORPORATION.  All rights reserved.
                      </div>
                    </footer>
                  </div>

                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

</body>

<script type="text/javascript">
  $(function() {

  var $form = $( "#form" );
  var $input = $form.find( ':input[type="number"]');

  $input.on( "keyup", function( event ) {


    // When user select text in the document, also abort.
    var selection = window.getSelection().toString();
    if ( selection !== '' ) {
      return;
    }

    // When the arrow keys are pressed, abort.
    if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
      return;
    }


    var $this = $( this );

    // Get the value.
    var input = $this.val();

    var input = input.replace(/[\D\s\._\-]+/g, "");
        input = input ? parseInt( input, 10 ) : 0;

        $this.val( function() {
          return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
        } );
  } );

  /**
   * ==================================
   * When Form Submitted
   * ==================================
   */
  $form.on( "submit", function( event ) {

    var $this = $( this );
    var arr = $this.serializeArray();

    for (var i = 0; i < arr.length; i++) {
        arr[i].value = arr[i].value.replace(/[($)\s\._\-]+/g, ''); // Sanitize the values.
    };

    console.log( arr );

    event.preventDefault();
  });

});
</script>


</html>
