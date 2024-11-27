<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>


  @php
  use Illuminate\Support\Str;
  @endphp
  <!-- Fonts -->


  <link rel="stylesheet" href="{{ asset(mix('assets/vendor/fonts/materialdesignicons.css')) }}" />
  <link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/node-waves/node-waves.css')) }}" />
  <!-- Core CSS -->

  <link rel="stylesheet" href="{{ asset(mix('assets/css/demo.css')) }}" />
  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')) }}" />
  @stack('body-css')

  <link rel="stylesheet" href="{{ asset('assets/css/accord2.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/form.css') }}" />

  <Style>
      body {
            font-family: Arial !important;
        }
    .checkbox-container {
      position: relative;
      display: inline-block;
      cursor: pointer;
      /* line-height: 18px; */
    }

    .checkbox-container lable {
      /* line-height: 18px; */
    }

    table {
      border-spacing: 0px;
    }
    /* .efd{
      height: 500px;
    } */
    .checkbox {
      display: inline-block;
      width: 13px;
      height: 13px;
      border: 1px solid #999;
      border-radius: 0px;
      /* line-height: 18px; */
    }

    #acordPage td,
    #acordPage th {
      margin: 0;
      padding: 0;
    }

    .tr {
      line-height: 18px;
    }

    .check-symbol {

      font-size: 12px;
      /* line-height: 18px; */
      /* text-align: center; */
      color: #4CAF50;
      /* Change color as needed */
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
                              <table cellpadding="0" cellspacing="0" class="ng-tns-c268-42">
                                <tbody class="ng-tns-c268-42">
                                  <tr class="ng-tns-c268-42">
                                    <td colspan="2" valign="middle" class="p-0 ng-tns-c268-42">
                                      <table width="100%" cellpadding="0" cellspacing="0" class="ng-tns-c268-42">
                                        <tr class="ng-tns-c268-42">
                                          <td class="ng-tns-c268-42"><span class="acord_title ng-tns-c268-42"><img
                                                src="{{ asset('assets/img/nlogo.png')}}" width="91" height="39"
                                                class="ng-tns-c268-42 text-center">
                                              &nbsp;&nbsp;
                                              CERTIFICATE OF LIABILITY
                                              INSURANCE </span>
                                          </td>
                                          <td  valign="top" width="150px" class="ng-tns-c268-42"
                                            style="border :1px solid black; text-align: center;">
                                            <span  style="font-size:9px;" >DATE (MM/DD/YYYY)</span>
                                            <div class=""style="font-size:9px; ">
                                              @if(!empty($certificate->date))
                                              {{ date('m-d-Y', strtotime($certificate->date)) }}
                                              @else
                                              {{ date('m-d-Y') }}
                                              @endif
                                            </div>
                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <table cellpadding="0" cellspacing="0" class="tftable ng-tns-c268-42">
                              <tbody class="ng-tns-c268-42">
                                <tr class="ng-tns-c268-42" style="border:1px solid black;">
                                  <td colspan="8" class="ng-tns-c268-42" style="border:1px solid black;">
                                    <div class="acord_title_matter ng-tns-c268-42" style=" padding: 0px 10px; text-align: justify;">THIS
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
                                  <td colspan="8" class="ng-tns-c268-42">
                                    <div class="acord_title_matter ng-tns-c268-42" style=" padding: 0px 10px; text-align: justify;"> IMPORTANT: If the certificate holder is an ADDITIONAL INSURED, the policy(ies) must be endorsed. If SUBROGATION IS WAIVED, subject to the terms and conditions of the policy, certain policies may require an endorsement.
                                       A statement on this certificate does not confer rights to the certificate holder in lieu of such endorsement(s). </div>
                                  </td>
                                </tr>
                                <tr class="ng-tns-c268-42">
                                  <td width="50%" valign="top" class="p-0 ng-tns-c268-42">
                                    <table width="100%" cellpadding="0" cellspacing="0" style="min-height: 10px;"
                                      class="ng-tns-c268-42">
                                      <tbody class="ng-tns-c268-42">
                                        <tr height="7" class="ng-tns-c268-42">
                                          <td width="100%" valign="middle" class="lable_title ng-tns-c268-42">
                                            PRODUCER
                                            <br />
                                            &nbsp;&nbsp;&nbsp;&nbsp; {{ $agent->agencies[0]->name }}<br class="ng-tns-c268-42">
                                            &nbsp;&nbsp;&nbsp;&nbsp; {{ $agent->agencies[0]->address }}<br class="ng-tns-c268-42">
                                            &nbsp;&nbsp;&nbsp;&nbsp; {{ $agent->agencies[0]->city }} {{ $agent->agencies[0]->state }}, {{ $agent->agencies[0]->zip }} <br class="ng-tns-c268-42">
                                          </td>
                                          <td>
                                          </td>
                                          <td>
                                          </td>
                                        </tr></tbody></table></td>
                                  <td width="50%" valign="top" class="p-0 ng-tns-c268-42">
                                    <table width="100%" cellpadding="0" cellspacing="0"
                                      class="agenc_sub_table a_s_t_b ng-tns-c268-42" style="min-height: 10px;">
                                      <tbody class="ng-tns-c268-42">
                                        <tr class="ng-tns-c268-42" style="border:1px solid black; line-height: 2;">
                                          <td class="lable_title tab_fild_set ng-tns-c268-42">
                                            &nbsp;&nbsp; CONTACT NAME:  &nbsp;&nbsp;

                                            {{ $agent->name }}
                                          </td>
                                          <td class="lable_title ng-tns-c268-42">&nbsp;&nbsp; </td>
                                        </tr>
                                        <tr class="ng-tns-c268-42" style="border:1px solid black; line-height: 2;">
                                          <td
                                            class="lable_title ng-tns-c268-42"><span class="ng-tns-c268-42">&nbsp;&nbsp; PHONE (A/C, No, Ext): </span>
                                            {{ $agent->agencies[0]->cellphone }}
                                          </td>

                                          <td class="lable_title ng-tns-c268-42"><span class="ng-tns-c268-42">&nbsp;&nbsp; FAX (A/C, No):</span>
                                            {{ $agent->agencies[0]->fax }}
                                          </td>
                                        </tr>
                                        <tr class="ng-tns-c268-42" style="border:1px solid black; line-height: 2;">
                                          <td   class="lable_title ng-tns-c268-42">
                                            <span class="ng-tns-c268-42">&nbsp;&nbsp; E-MAIL ADDRESS:</span>
                                          </td>
                                          <td class="lable_title ng-tns-c268-42" style="" >
                                            {{ $agent->email }} </td></tr></tbody></table></td></tr>
                                <tr class="ng-tns-c268-42" style="border:1px solid black;">
                                  <td width="50%" valign="top" class="p-0 ng-tns-c268-42">
                                    <table width="100%" cellpadding="0" cellspacing="0" style="min-height:10px;"
                                      class="ng-tns-c268-42">
                                      <tbody class="ng-tns-c268-42">
                                        <tr height="10" class="ng-tns-c268-42">
                                          <td width="100%" valign="middle" class="lable_title ng-tns-c268-42">
                                            INSURED
                                            <br />
                                            &nbsp;&nbsp;&nbsp;&nbsp;  {{ $driver->truckers[0]->name }}<br class="ng-tns-c268-42">
                                            &nbsp;&nbsp;&nbsp;&nbsp; {{ $driver->truckers[0]->address }} <br class="ng-tns-c268-42">
                                            &nbsp;&nbsp;&nbsp;&nbsp; {{ $driver->truckers[0]->city }}
                                            &nbsp;&nbsp;&nbsp;&nbsp; {{ $driver->truckers[0]->state }} ,
                                            &nbsp;&nbsp;&nbsp;&nbsp; {{ $driver->truckers[0]->zip }}
                                            <br class="ng-tns-c268-42">
                                            &nbsp;&nbsp;&nbsp;&nbsp;  {{ $driver->truckers[0]->cellphone }}
                                          </td> <td></td>  <td></td> </tr></tbody></table></td>
                                  <td width="50%" valign="top" class="p-0 ng-tns-c268-42">
                                    <table width="100%" style="" cellpadding="0" cellspacing="0" formgroupname="iaInsurerForm"
                                      class="agenc_sub_table a_s_t_b  ng-untouched ng-pristine ng-valid"
                                      style="min-height:10px;">
                                      <tbody class="">
                                        <tr class="" style="line-height: 2;">
                                          <td colspan="20" class="lable_title text-center" style="border:1px solid black;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;INSURER(S) AFFORDING COVERAGE  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</td>
                                          <td class="lable_title  text-center" style="border:1px solid black;">NAIC #</td>

                                        </tr>
                                        {{-- @php
                                        $arr = ['A', 'B', 'C', 'D', 'E' ,'F'];
                                        $count = 0;
                                        @endphp

                                        @foreach ($certPolicy as $cp)
                                        @foreach ($cp->policyType->certificatePolicies as $scp)
                                        @if ($count < 6)
                                        <tr class="" style="line-height: 2;">
                                          <td colspan="20" class="lable_title  td" style="broder:none">
                                            INSURER {{ $arr[$count] }} :
                                            @if ($scp->insurance_provider_code == $arr[$count])
                                            @if (isset($certPolicy)){{ $scp->insuranceProvider->name }}@endif
                                            @else
                                            @endif
                                          </td>
                                          <td class="lable_title  td" style="border:1px solid black;">
                                            <div class=" ng-tns-c70-50">
                                              @if ($scp->insurance_provider_code == $arr[$count])
                                              @if (isset($certPolicy)){{ $scp->insuranceProvider->naic_number }}@endif
                                              @else
                                              @endif
                                            </div>
                                          </td>
                                      </tr>
                                @php
                                $count++; // Increment the counter
                                @endphp
                                @else
                                @break
                                @endif
                                @endforeach
                                @endforeach --}}
                                @php
                                $policyMatched = false;

                              @endphp
                                @foreach ($insurProviders as $ip)

                            @foreach ($certPolicy as $policy)
                                @if ($policy->insurance_provider_id == $ip->id && $policy->insurance_provider_code == 'A')
                                @if (!$policyMatched)
                                <tr class="" style="line-height: 2;">
                                  <td colspan="20" class="lable_title  td" style="broder:none">
                                    INSURER A :
                                    @if(strlen($ip->name) > 50)
                                      <span style="font-size:5px">
                                        {{  $shortName = $ip->name }}
                                      </span>
                                    @else
                                      <span>
                                        {{  $shortName = $ip->name }}
                                      </span>
                                    @endif
                                    </td>
                                  <td class="lable_title  td" style="border:1px solid black;">
                                    <div class=" ng-tns-c70-50">
                                      {{ $ip->naic_number }}
                                    </div>
                                  </td>
                              </tr>
                              @php
                              $policyMatched = true;
                            @endphp
                          @endif

                              @endif
                              @endforeach
                              @endforeach
                                @if ( $policyMatched == false)
                                <tr class="" style="line-height: 2;">
                                  <td colspan="20" class="lable_title  td" style="broder:none">
                                    INSURER A :

                                    </td>
                                  <td class="lable_title  td" style="border:1px solid black;">
                                    <div class=" ng-tns-c70-50">

                                    </div>
                                  </td>
                              </tr>
                                @endif
                                @php
                                $policyMatched = false;

                              @endphp
                              @foreach ($insurProviders as $ip)

                              @foreach ($certPolicy as $policy)
                              @if ($policy->insurance_provider_id == $ip->id && $policy->insurance_provider_code == 'B')
                              @if (!$policyMatched)
                              <tr class="" style="line-height: 2;">
                                <td colspan="20" class="lable_title  td" style="broder:none">
                                  INSURER B :
                                  @if(strlen($ip->name) > 50)
                                    <span style="font-size:5px">
                                      {{  $shortName = $ip->name }}
                                    </span>
                                  @else
                                    <span>
                                      {{  $shortName = $ip->name }}
                                    </span>
                                  @endif
                                  </td>
                                <td class="lable_title  td" style="border:1px solid black;">
                                  <div class=" ng-tns-c70-50">
                                    {{ $ip->naic_number }}
                                  </div>
                                </td>
                            </tr>
                            @php
                            $policyMatched = true;
                          @endphp
                        @endif
                         @endif
                            @endforeach
                            @endforeach
                        @if ( $policyMatched == false)

                        <tr class="" style="line-height: 2;">
                          <td colspan="20" class="lable_title  td" style="broder:none">
                            INSURER B :

                            </td>
                          <td class="lable_title  td" style="border:1px solid black;">
                            <div class=" ng-tns-c70-50">

                            </div>
                          </td>
                      </tr>
                        @endif
                        @php
                        $policyMatched = false;
                      @endphp
                            @foreach ($insurProviders as $ip)
                            @foreach ($certPolicy as $policy)
                            @if ($policy->insurance_provider_id == $ip->id && $policy->insurance_provider_code == 'C')
                            @if (!$policyMatched)
                            <tr class="" style="line-height: 2;">
                              <td colspan="20" class="lable_title  td" style="broder:none">
                                INSURER C :
                                @if(strlen($ip->name) > 50)
                                  <span style="font-size:7px">
                                    {{  $shortName = $ip->name }}
                                  </span>
                                @else
                                  <span>
                                    {{  $shortName = $ip->name }}
                                  </span>
                                @endif
                                </td>
                              <td class="lable_title  td" style="border:1px solid black;">
                                <div class=" ng-tns-c70-50">
                                  {{ $ip->naic_number }}
                                </div>
                              </td>
                          </tr>
                          @php
                          $policyMatched = true;
                        @endphp
                      @endif
                      @endif
                          @endforeach
                          @endforeach

                          @if ( $policyMatched == false)

                          <tr class="" style="line-height: 2;">
                            <td colspan="20" class="lable_title  td" style="broder:none">
                              INSURER C :

                              </td>
                            <td class="lable_title  td" style="border:1px solid black;">
                              <div class=" ng-tns-c70-50">

                              </div>
                            </td>
                        </tr>
                          @endif
                          @php
                          $policyMatched = false;
                        @endphp
                          @foreach ($insurProviders as $ip)
                          @foreach ($certPolicy as $policy)
                          @if ($policy->insurance_provider_id == $ip->id && $policy->insurance_provider_code == 'D')
                          @if (!$policyMatched)
                          <tr class="" style="line-height: 2;">
                            <td colspan="20" class="lable_title  td" style="broder:none">
                              INSURER D :
                              @if(strlen($ip->name) > 50)
                                <span style="font-size:5px">
                                  {{  $shortName = $ip->name }}
                                </span>
                              @else
                                <span>
                                  {{  $shortName = $ip->name }}
                                </span>
                              @endif
                              </td>
                            <td class="lable_title  td" style="border:1px solid black;">
                              <div class=" ng-tns-c70-50">
                                {{ $ip->naic_number }}
                              </div>
                            </td>
                        </tr>
                        @php
                        $policyMatched = true;
                      @endphp
                    @endif
                    @endif
                        @endforeach
                        @endforeach
                        @if ( $policyMatched == false)
                        <tr class="" style="line-height: 2;">
                          <td colspan="20" class="lable_title  td" style="broder:none">
                            INSURER D :

                            </td>
                          <td class="lable_title  td" style="border:1px solid black;">
                            <div class=" ng-tns-c70-50">

                            </div>
                          </td>
                      </tr>
                        @endif
                        @php
                        $policyMatched = false;
                      @endphp
                        @foreach ($insurProviders as $ip)
                        @foreach ($certPolicy as $policy)
                        @if ($policy->insurance_provider_id == $ip->id && $policy->insurance_provider_code == 'E')
                        @if (!$policyMatched)
                        <tr class="" style="line-height: 2;">
                          <td colspan="20" class="lable_title  td" style="broder:none">
                            INSURER E :
                            @if(strlen($ip->name) > 50)
                            <span style="font-size:5px">
                              {{  $shortName = $ip->name }}
                            </span>
                          @else
                            <span>
                              {{  $shortName = $ip->name }}
                            </span>
                          @endif
                            </td>
                          <td class="lable_title  td" style="border:1px solid black;">
                            <div class=" ng-tns-c70-50">
                              {{ $ip->naic_number }}
                            </div>
                          </td>
                      </tr>
                      @php
                              $policyMatched = true;
                            @endphp
                          @endif
                         @endif
                      @endforeach
                      @endforeach



                      @if ( $policyMatched == false)

                      <tr class="" style="line-height: 2;">
                        <td colspan="20" class="lable_title  td" style="broder:none">
                          INSURER E :

                          </td>
                        <td class="lable_title  td" style="border:1px solid black;">
                          <div class=" ng-tns-c70-50">

                          </div>
                        </td>
                    </tr>
                      @endif
                      @php
                      $policyMatched = false;
                    @endphp
                      @foreach ($insurProviders as $ip)
                      @foreach ($certPolicy as $policy)
                      @if ($policy->insurance_provider_id == $ip->id && $policy->insurance_provider_code == 'F')
                      @if (!$policyMatched)
                      <tr class="" style="line-height: 2;">
                        <td colspan="20" class="lable_title  td" style="broder:none">
                          INSURER F :
                          @if(strlen($ip->name) > 50)
                            <span style="font-size:5px">
                              {{  $shortName = $ip->name }}
                            </span>
                          @else
                            <span>
                              {{  $shortName = $ip->name }}
                            </span>
                          @endif
                          </td>
                        <td class="lable_title  td" style="border:1px solid black;">
                          <div class=" ng-tns-c70-50">
                            {{ $ip->naic_number }}
                          </div>
                        </td>
                    </tr>
                    @php
                    $policyMatched = true;
                  @endphp
                @endif
                    @endif
                              @endforeach
                              @endforeach

                        @if ( $policyMatched == false)

                        <tr class="" style="line-height: 2;">
                          <td colspan="20" class="lable_title  td" style="broder:none">
                            INSURER F :

                            </td>
                          <td class="lable_title  td" style="border:1px solid black;">
                            <div class=" ng-tns-c70-50">

                            </div>
                          </td>
                      </tr>
                        @endif
                              </tbody></table></td></tr></tbody></table>
                            <table width="100%" cellpadding="22" cellspacing="3" class=" ng-tns-c268-42">
                              <tbody class="ng-tns-c268-42">
                                <tr class="ng-tns-c268-42">
                                  <td style="font-size: 12px">
                                    COVERAGES:
                                  </td>
                                  <td style="font-size: 12px">

                                    CERTIFICATE NUMBER:
                                  </td>
                                  <td style="font-size: 12px">

                                    REVISION NUMBER:

                                  </td>
                                </tr>
                              </tbody>
                            </table>

                            <table style="border-spacing: 0px;" width="100%" cellpadding="0" cellspacing="0"
                              class="tftable ng-tns-c268-42">
                              <tbody class="ng-tns-c268-42">
                                <tr class="ng-tns-c268-42">
                                  <td colspan="8" class="ng-tns-c268-42">
                                    <div class="acord_title_matter ng-tns-c268-42" style=" padding: 0px 10px; text-align: justify;"
                                    > THE POLICIES OF INSURANCE
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


                                <tr id="scrollToPolicyHeaderTR" class="ng-tns-c268-42"
                                  style="text-align: center; vertical-align: middle;">
                                  <td width="3%" class="lable_title ng-tns-c268-42">INSR LTR
                                  </td>
                                  <td width="25%" class="lable_title ng-tns-c268-42">
                                    <div class="ng-tns-c268-42">TYPE OF INSURANCE</div>
                                  </td>
                                  <td width="3%" class="lable_title ng-tns-c268-42">
                                    <div class="ng-tns-c268-42">ADDL INSR</div>
                                  </td>
                                  <td width="3%" class="lable_title ng-tns-c268-42">
                                    <div class="ng-tns-c268-42">SUBR WVD</div>
                                  </td>
                                  <td width="25%" class="lable_title ng-tns-c268-42">
                                    <div class="ng-tns-c268-42">POLICY NUMBER
                                    </div>
                                  </td>
                                  <td width="4%" class="lable_title ng-tns-c268-42">
                                    <div class="ng-tns-c268-42">POLICY
                                      EFF DATE
                                      (MM/DD/YYYY)</div>
                                  </td>
                                  <td width="4%" class="lable_title ng-tns-c268-42">
                                    <div class="ng-tns-c268-42">POLICY
                                      EXP DATE
                                      (MM/DD/YYYY)</div>
                                  </td>
                                  <td width="35%" class="lable_title ng-tns-c268-42">
                                    <div class="ng-tns-c268-42">LIMITS</div>
                                  </td>
                                </tr>

                                @foreach ($policytypes->whereIn('id', [1,2,5,9]) as $pt)
                                <tr>
                                  <td>
                                    <div>
                                      <span class="mat-form-field-label-wrapper ng-tns-c70-64">
                                        @if(!empty($certPolicy->where('policy_type_id', $pt->id)->first()))
                                        &nbsp;&nbsp; {{$certPolicy->where('policy_type_id', $pt->id)->first()->insurance_provider_code}}
                                        @endif
                                      </span>
                                    </div>
                                  </td>

                                  <td valign="middle">
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                      <tbody>


                                        @if($pt->type_name == "General Liability")
                                        <tr>
                                          <td>
                                           <b><label>{{ Str::upper($pt->type_name) }}</label></b>
                                          </td>
                                        </tr>
                                        @foreach ($pt->policies as $pp)
                                        @if($pp->policy_title == "COMMERCIAL GENERAL LIABILITY")

                                        <tr>
                                          <td>
                                            <table style="border-spacing: 1px" cellspacing="2">
                                              <tbody>
                                                <tr>
                                                  <td colspan="3" cellspacing="1">
                                                    <div class="checkbox-container">
                                                      @php
                                                      $policyId = 7;
                                                      $isChecked = $certPolicy->where('policy_id', $policyId)->first() ?
                                                      true : false;
                                                      @endphp
                                                      @if ($isChecked)
                                                      <span class="check-symbol"><img
                                                          src="{{ asset('assets/img/checked.png') }}"
                                                          width="14px" /></span>
                                                      @else
                                                      <span class="checkbox"></span>
                                                      @endif
                                                      <label>{{ $pp->where('id', $policyId)->first()->policy_title
                                                        }}</label>
                                                    </div>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td colspan="2">
                                                 <table><tbody><tr><td>
                                                      @php
                                                      $policyId = 8;
                                                      $isChecked = $certPolicy->where('policy_id', $policyId)->first() ?
                                                      true : false;
                                                      @endphp
                                                      @if ($isChecked)
                                                      <span class="checkbox"></span>
                                                      <span class="check-symbol"><img
                                                          src="{{ asset('assets/img/checked.png') }}"
                                                          width="14px" /></span>
                                                      @else
                                                      <span class="checkbox"></span>
                                                      <span class="checkbox"></span>
                                                    </td><td>@endif
                                                      <label>{{ $pp->where('id', $policyId)->first()->policy_title
                                                        }}</label>
                                                   </td></tr></tbody></table>
                                                  </td>
                                                  <td>
                                                    <table><tbody><tr><td >
                                                      @php
                                                      $policyId = 9;
                                                      $isChecked = $certPolicy->where('policy_id', $policyId)->first() ?
                                                      true : false;
                                                      @endphp
                                                      @if ($isChecked)
                                                      <span class="check-symbol"><img
                                                          src="{{ asset('assets/img/checked.png') }}"
                                                          width="14px" /></span>
                                                      @else
                                                      <span class="checkbox"></span>
                                                      @endif
                                                      <label>{{ $pp->where('id', $policyId)->first()->policy_title
                                                        }}</label>
                                                    </td></tr></tbody></table>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td colspan="3"> <span
                                                      class="checkbox"></span>
                                                    <div
                                                      style="border: 0.1px solid #999999;    height: 0px; margin-left: 4px;">
                                                    </div>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td colspan="3" >
                                                     <span class="checkbox"></span>
                                                    <div
                                                      style="border: 0.1px solid #999999; height: 0px; margin-left: 4px;">
                                                    </div>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td colspan="3" valign="top"  style="line-height: 14px"><label>GEN'L AGGREGATE LIMIT APPLIES PER:</label>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="checkbox-container">
                                                      @php
                                                      $policyId = 11;
                                                      $isChecked = $certPolicy->where('policy_id', $policyId)->first() ?
                                                      true : false;
                                                      @endphp
                                                      @if ($isChecked)
                                                      <span class="check-symbol"><img
                                                          src="{{ asset('assets/img/checked.png') }}"
                                                          width="14px" /></span>
                                                      @else<span class="checkbox"></span>
                                                      @endif<label>{{ $pp->where('id', $policyId)->first()->policy_title
                                                        }}</label></div></td><td style="margin-right: 2px" ><table><tbody><tr><td>
                                                    <span class="checkbox"></span> <label>PRO-JECT</label>
                                                  </td></tr></tbody></table></td><td><span class="checkbox"></span><label>LOC</label>
                                                  </td></tr>
                                              </tbody>
                                            </table>
                                          </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                        @endif
                                        @if($pt->type_name == "Auto Liability")
                                        <tr valign="top" cellpadding="1"  style="padding-bottom:13px" ><td valign="top" style="line-height:0 padding-bottom:1px"><label><b>{{ Str::upper($pt->type_name)}}</b></label></td></tr>
                                        @foreach ($pt->policies as $pp)
                                        @if($pp->policy_title == "ANY AUTO")
                                        <tr><td><table style="border-spacing: 0px"><tbody><tr><td valign="bottom">
                                                    @php
                                                    $policyId = 1;
                                                    $isChecked = $certPolicy->where('policy_id',
                                                    $policyId)->first() ? true : false;
                                                    @endphp
                                                    <br style="line-height:0.5" >
                                                    @if ($isChecked)
                                                    <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}" width="12px" /></span>
                                                    @else
                                                    <span class="checkbox"></span>
                                                    @endif<label >{{ $pp->where('id',
                                                      $policyId)->first()->policy_title }}</label>
                                                  </td></tr>
                                                  <tr><td><table style="border-spacing: 0px" ><tbody><tr><td valign="bottom">
                                                    @php
                                                    $policyId = 2;
                                                    $isChecked = $certPolicy->where('policy_id', $policyId)->first() ?
                                                    true : false;
                                                    @endphp
                                                    @if ($isChecked)
                                                    <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}"width="12px" /></span>
                                                    @else
                                                    <span class="checkbox"></span>
                                                    @endif
                                                  </td><td valign="bottom"><label style="line-height: 0;">{{ $pp->where('id',
                                                      $policyId)->first()->policy_title }}</label>
                                                  </td></tr></tbody></table></td>
                                  <td><table><tbody><tr><td>
                                            @php
                                            $policyId = 3;
                                            $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true :
                                            false;
                                            @endphp
                                            @if ($isChecked)
                                            <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}"
                                                width="14px" /></span>
                                            @else
                                            <span class="checkbox"></span>
                                            @endif
                                          </td>
                                          <td ><label style="line-height: 0;">{{ $pp->where('id',
                                              $policyId)->first()->policy_title }}</label>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <table>
                                      <tbody>
                                        <tr>
                                          <td>
                                            @php
                                            $policyId = 4;
                                            $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true :
                                            false;
                                            @endphp
                                            @if ($isChecked)
                                            <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}"
                                                width="14px" /></span>
                                            @else
                                            <span class="checkbox"></span>
                                            @endif
                                          </td>
                                          <td ><label>{{ $pp->where('id',
                                              $policyId)->first()->policy_title }}</label>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                  <td>
                                    <table>
                                      <tbody>
                                        <tr>
                                          <td>
                                            @php
                                            $policyId = 5;
                                            $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true :
                                            false;
                                            @endphp
                                            @if ($isChecked)
                                            <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}"
                                                width="14px" /></span>
                                            @else
                                            <span class="checkbox"></span>
                                            @endif</td><td valign="bottom"><label style="line-height: 0;">{{ $pp->where('id',
                                              $policyId)->first()->policy_title }}</label>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                                <tr>
                                  <td><span class="checkbox"></span></td>
                                  <td><span class="checkbox"></span></td>
                                </tr>
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
                                          $policyId = 18;
                                          $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true :
                                          false;
                                          @endphp
                                          @if ($isChecked)
                                          <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}"
                                              width="14px" /></span>
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
                                          $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true :
                                          false;
                                          @endphp
                                          @if ($isChecked)
                                          <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}"
                                              width="14px" /></span>
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
                                          $policyId = 20;
                                          $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true :
                                          false;
                                          @endphp
                                          @if ($isChecked)
                                          <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}"
                                              width="14px" /></span>
                                          @else
                                          <span class="checkbox"></span>
                                          @endif
                                          <label>{{ $pp->where('id', $policyId)->first()->policy_title }}</label>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="checkbox-container">
                                          @php
                                          $policyId = 21;
                                          $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true :
                                          false;
                                          @endphp
                                          @if ($isChecked)
                                          <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}"
                                              width="14px" /></span>
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
                                          $policyId = 22;
                                          $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true :
                                          false;
                                          @endphp
                                          @if ($isChecked)
                                          <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}"
                                              width="14px" /></span>
                                          @else
                                          <span class="checkbox"></span>
                                          @endif
                                          <label>{{ $pp->where('id', $policyId)->first()->policy_title }}</label>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="checkbox-container">
                                          @php
                                          $policyId = 23;
                                          $isChecked = $certPolicy->where('policy_id', $policyId)->first() ? true :
                                          false;
                                          @endphp
                                          @if ($isChecked)
                                          <span class="check-symbol"><img src="{{ asset('assets/img/checked.png') }}"
                                              width="14px" /></span>
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
                            @if($pt->type_name == "Work Comp Employers Liability")
                            @foreach ($pt->policies as $pp)
                            @if($pp->id == 14)
                            <tr>
                              <td>
                                <b>WORKERS COMPENSATION <br>AND EMPLOYERS' LIABILITY</b>
                              </td>
                              <td> Y/N </td>
                            </tr>
                            <tr>
                              <td style="line-height: 1.1">
                                PROPRIETOR/PARTNER/EXECUTIVE <br> OFFICER/MEMBER EXCLUDED?
                              </td>
                              <td> <span class="checkbox"></span>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <b>(Mandatory in NH)</b>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                If yes, describe under <br>
                                DESCRIPTION OF OPERATIONS below
                              </td>
                            </tr>
                            @endif
                            @endforeach
                            @endif
                            </tbody></table>
                            </td>
                            <td valign="middle" style="text-align: center; vertical-align: middle;">
                              <div>

                                  {{ !empty($certPolicy) ? $certPolicy->where('policy_type_id',
                                  $pt->id)->first()->ADDL_INSR ?? '' : '' }}

                              </div>
                            </td>
                            <td valign="middle" style="text-align: center; vertical-align: middle;">
                              <div>
                                 {{ !empty($certPolicy) ? $certPolicy->where('policy_type_id',
                                  $pt->id)->first()->SUBR_WVD ?? '' : '' }}
                              </div>
                            </td>
                            <td valign="middle" style="text-align: center; vertical-align: middle;">
                              <div>
                                <span>{{ !empty($certPolicy) ? $certPolicy->where('policy_type_id',
                                  $pt->id)->first()->policy_number ?? '' : '' }}</span>
                              </div>
                            </td>
                            <td valign="middle" style="text-align: center; vertical-align: middle;">
                              <div>
                                <span>{{ !empty($certPolicy->where('policy_type_id', $pt->id)->first()->start_date) ?
                                  date('m-d-Y', strtotime($certPolicy->where('policy_type_id',
                                  $pt->id)->first()->start_date)) : '' }}</span>
                              </div>
                            </td>
                            <td valign="middle" style="text-align: center; vertical-align: middle;">
                              <div>
                                <span>{{ !empty($certPolicy->where('policy_type_id', $pt->id)->first()->expiry_date) ?
                                  date('m-d-Y', strtotime($certPolicy->where('policy_type_id',
                                  $pt->id)->first()->expiry_date)) : '' }}</span>
                              </div>
                            </td>
                            <td valign="top">
                              <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody>
                                  @php
                                      $coverageItems13And14 = ''; // Initialize the variable outside the loop
                                  @endphp
                                  @php $additionalRowAdded = false; @endphp
                                  @if(!empty($pt->policyLimits))
                                  @php
                                    $cover1 = $pt->policyLimits->where('id', 13)->first();
                                    $cover2 = $pt->policyLimits->where('id', 14)->first();
                                  @endphp
                                  @foreach ($pt->policyLimits->whereNotIn('id', [13,14,18]) as $pl)
                                  @if($pl->policy_type_id !=6)
                                  <tr style="line-height:2;">
                                    <td style="border:1px solid black; line-height:0.7;">
                                      {{$pl->coverage_item}}
                                    </td>
                                    <td style="border:1px solid black" width="40%">
                                      <div>
                                        <span>&nbsp; $&nbsp;
                                          @if(isset($certPolimit)){{$certPolimit->where('policy_limit_id',
                                          $pl->id)->first()->amount ?? '' }}@endif<span>
                                          </span>
                                      </div>
                                    </td>
                                  </tr>
                                  @else
                                  <tr style="line-height: 2;">
                                    <td style="border:1px solid black; line-height:0.6;">{{ $pl->coverage_item }}</td>
                                    <td style="border:1px solid black" width="40%">
                                      <div>
                                        <span>&nbsp; $&nbsp;
                                          @if(isset($certPolimit)){{$certPolimit->where('policy_limit_id',
                                          $pl->id)->first()->amount ?? '' }}@endif
                                        </span>
                                      </div>
                                    </td>
                                  </tr>
                                  @endif
                                  @endforeach
                                  <tr>
                                    <td style="border:1px solid black"></td>
                                    <td style="border:1px solid black" width="40%">
                                      <div>
                                        <span>&nbsp; $&nbsp; </span>
                                      </div>
                                    </td>
                                  </tr>
                                  @else
                                  <tr>
                                    <td style="border:1px solid black; line-height:0.6;">{{ $pl->coverage_item }}</td>
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
                                </tbody></table>
                            </td>
                            </tr>
                            @endforeach
                            <tr class="ng-tns-c268-42"
                            style="vertical-align: top; line-height:4;">
                            <td  colspan="10">
                              <table style="border-spacing: 0px;" width="100%" cellpadding="0" cellspacing="0"
                              class=" ng-tns-c268-42">
                            <tbody>
                              @php
                                $filteredPolicies = $certPolicy->whereIn('policy_type_id', [3, 4, 6, 7, 8])->unique('policy_type_id');
                              @endphp
                              @if($filteredPolicies->isNotEmpty())
                              @php
                              $loopCount = 0;
                            @endphp

                            {{-- @foreach ($certPolicy->whereIn('policy_type_id', [3, 4, 6, 7, 8])->unique('policy_type_id') as $cp) --}}
                              @php
                                $uniquePolicies = $certPolicy->whereIn('policy_type_id', [3, 4, 6, 7, 8])->unique('policy_type_id');
                                $totalPolicies = $uniquePolicies->count();
                                $fontSize = ($totalPolicies > 2) ? 7 : 9;
                              @endphp
                           @foreach ($uniquePolicies as $cp)

                              @if (!empty($cp))
                                <tr style="line-height:1; font-size:{{ $fontSize }}px;">
                                  <td width="3%" style="border-right: 1px solid black;">
                                    &nbsp;&nbsp;<label>{{ $cp->insurance_provider_code }}</label>
                                  </td>
                                  <td width="24.5%" style="border-right: 1px solid black;">
                                    &nbsp;&nbsp;<label>{{ $cp->policyType->type_name }}</label>
                                  </td>
                                  <td width="3%" style="border-right: 1px solid black;"></td>
                                  <td width="3%" style="border-right: 1px solid black;"></td>
                                  <td width="24.5%" style="border-right: 1px solid black;">
                                    &nbsp;&nbsp;{{ $cp->policy_number }}
                                  </td>
                                  <td valign="middle" style="text-align: center; vertical-align: middle; border-right: 1px solid black;">
                                    {{ date('m-d-Y', strtotime($cp->start_date)) }}
                                  </td>
                                  <td valign="middle" style="text-align: center; vertical-align: middle; border-right: 1px solid black;">
                                    {{ date('m-d-Y', strtotime($cp->expiry_date)) }}
                                  </td>
                                  <td width="28%">
                                    @if ($cp->policyType->id == 3)
                                      &nbsp;&nbsp;LIMIT PER VEHICLE
                                      @foreach ($cp->policyType->certificatePolicyLimits->unique('policy_type_id') as $cptpl)
                                        {{ $cptpl->where('policy_limit_id', 11)->where('certificate_id', $certificate->id)->get()->last()->amount }}
                                      @endforeach
                                    @endif
                                    @if ($cp->policyType->id == 4)
                                      &nbsp;&nbsp;Limit/ Trailer
                                      @foreach ($cp->policyType->certificatePolicyLimits->unique('policy_type_id') as $cptpl)
                                        {{ $cptpl->where('policy_limit_id', 12)->where('certificate_id', $certificate->id)->get()->last()->amount }}
                                      @endforeach
                                    @endif
                                    @if ($cp->policyType->id == 6)
                                      &nbsp;&nbsp;Limit/Ded
                                      @foreach ($cp->policyType->certificatePolicyLimits->unique('policy_type_id') as $cptpl)
                                        {{ $cptpl->where('policy_limit_id', 19)->where('certificate_id', $certificate->id)->get()->last()->amount }} /
                                        {{ $cptpl->where('policy_limit_id', 20)->where('certificate_id', $certificate->id)->get()->last()->amount }}
                                      @endforeach
                                    @endif
                                    @if ($cp->policyType->id == 7)
                                      &nbsp;&nbsp;Limit/Ded
                                      @foreach ($cp->policyType->certificatePolicyLimits->unique('policy_type_id') as $cptpl)
                                        {{ $cptpl->where('policy_limit_id', 21)->where('certificate_id', $certificate->id)->get()->last()->amount }} /
                                        {{ $cptpl->where('policy_limit_id', 22)->where('certificate_id', $certificate->id)->get()->last()->amount }}
                                      @endforeach
                                    @endif
                                    @if ($cp->policyType->id == 8)
                                      &nbsp;&nbsp;Limit/Ded
                                      @foreach ($cp->policyType->certificatePolicyLimits->unique('policy_type_id') as $cptpl)
                                        {{ $cptpl->where('policy_limit_id', 23)->where('certificate_id', $certificate->id)->get()->last()->amount }} /
                                        {{ $cptpl->where('policy_limit_id', 24)->where('certificate_id', $certificate->id)->get()->last()->amount }}
                                      @endforeach
                                    @endif
                                  </td>
                                </tr>
                              @endif
                            @endforeach
                                    @else
                                  <tr style="line-height:1;"><td width="3%" style="border-right: 1px solid black;" >
                                    <td>
                                      <label>
                                          Others
                                      </label>
                                      <br>
                                      <br>
                                      <br>
                                      <br>
                                    </td>
                                  </tr>
                                  @endif
                                </tbody>
                              </table>
                            </td>
                                </tr>


                            <tr class="ng-tns-c268-42">
                              <td colspan="8" style="padding: 0px;" class="ng-tns-c268-42">
                                <div style="font-size: 9px; height:80px;" class="ng-tns-c268-42">
                                  DESCRIPTION OF OPERATIONS / LOCATIONS / VEHICLES (Attach ACORD 101, Additional Remarks
                                  Schedule, if more space is required) <br class="ng-tns-c268-42"> <br class="ng-tns-c268-42">
                                  <lable style="white-space: pre-wrap;">   {{$certificate->descrp}}    </lable></div>

                              </td>
                            </tr>

                            </tbody>
                            </table>

                            <table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 3px;"
                              class="ng-tns-c268-42">
                              <tbody class="ng-tns-c268-42">
                                <tr class="ng-tns-c268-42">
                                  <td style="width: 50%; font-size: 9px; font-weight: bold;" class="ng-tns-c268-42">
                                    CERTIFICATE HOLDER</td>
                                  <td style="width: 50%; font-size: 9px; font-weight: bold;" class="ng-tns-c268-42">
                                    CANCELLATION</td>
                                </tr>
                                <tr class="ng-tns-c268-42">
                                  <td valign="top" colspan="2" class="p-0 ng-tns-c268-42">
                                    <table width="100%" cellpadding="0" cellspacing="0"  style="border-spacing: 0px"
                                      class="tftable ng-tns-c268-42">
                                      <tbody class="ng-tns-c268-42">
                                        <tr class="ng-tns-c268-42">
                                          <td rowspan="2" width="50%" style="white-space: pre-line; ">
                                            {{$certificate->ch}}
                                          </td>
                                          <td class="fot_titel ng-tns-c268-42"> SHOULD ANY OF THE ABOVE DESCRIBED POLICIES BE CANCELLED BEFORE THE EXPIRATION DATE THEREOF, THE ISSUING INSURER WILL ENDEAVOR TO MAIL 30 DAYS WRITTEN NOTICE TO THE CERTIFICATE HOLDER NAMED TO THE LEFT, BUT FAILURE TO DO SO SHALL IMPOSE NO OBLIGATION OR LIABILITY OF ANY KIND UPON THE INSURER, ITS AGENTS OR REPRESENTATIVES.
                                          </td>
                                        </tr>
                                        <tr style="border-spacing: 0px" class="ng-tns-c268-42">
                                          <td  style="border-spacing: 0px" class="fot_titel ng-tns-c268-42">
                                          <table cellpadding="0" cellspacing="0">
                                          <tbody>
                                            <tr class="ng-tns-c268-42">
                                              <td class=" ng-tns-c268-42">
                                            AUTHORIZED
                                            REPRESENTATIVE
                                            </td>
                                              <td class=" ng-tns-c268-42">
                                                @if(!empty($agent->agencies[0]->image_path))
                                            <img src="{{ storage_path('app/' .  $agent->agencies[0]->image_path)}}" width="91" height="39" alt="">
                                            @else

                                            @endif
                                         </td>
                                         <tr class="ng-tns-c268-42">
                                          </tbody>
                                            </table>
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
                        © 1988-{{ date('Y') }} ACORD CORPORATION. All rights reserved.
                      </div>
                      <div class="right_reserveds ng-tns-c268-42" style="font-size: 10px;">
                       ACCOR 25 (2010/05)
                       <div class="right_reservedss ng-tns-c268-42" style="font-size: 10px;">
                        The ACCORD name and logo ar
                        e registered marks of ACCORD
                       </div>
                      </div>

                    </footer>
                  </div>

                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
   <div style="height: 60px"></div>


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



<table width="100%" cellpadding="0" cellspacing="0" class="ng-tns-c268-42">
  <tr class="ng-tns-c268-42">
    <td class="ng-tns-c268-42"><span class="acord_title ng-tns-c268-42"><img
          src="{{ asset('assets/img/nlogo.png')}}" width="91" height="39"
          class="ng-tns-c268-42 text-center">
        &nbsp;&nbsp;
        ADDITIONAL REMARKS SCHEDULE
         </span>
    </td>
    <td  valign="bottom" width="150px" class="ng-tns-c268-42"
      style="float:right;">
      <div class=""style="font-size:9px; ">
    <b> Page <u>2</u> of <u>2</u></b>
      </div>
    </td>
  </tr>
</table>
  <table width="100%" cellpadding="0" cellspacing="0" class="ng-tns-c268-42">
<tr ><td colspan="8" valign="top" class="p-0 ng-tns-c268-42" width="50%" >
  <table width="100%" cellpadding="0" cellspacing="0" class=" agenc_sub_table a_s_t_b">
    <tbody>
      <tr style="border:1px solid black;" class="lable_title" width="100%">

        <td colspan="2"  width="100%"  class="lable_title" style="border-top: 1px solid black"> <label> &nbsp;&nbsp; AGENCY</label>
          <br class="ng-tns-c268-42">  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;{{ $agent->agencies[0]->name }}
        </td>
<td style="border-top: 1px solid black"></td>
      </tr>
      <tr  style="border:1px solid black;" width="100%" class="lable_title">
        <td colspan="2"  width="100%" class="lable_title" style="border-top: 1px solid black"><label> &nbsp;&nbsp; POLICY NUMBER</label>
          <br class="ng-tns-c268-42">  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;{{ $cp->policy_number??'' }}    </td>
        <td style="border-top: 1px solid black"></td>

      </tr>
      <tr style="border:1px solid black; ">
        <td colspan="2"  width="80%"class="lable_title" style="border-right: 1px solid black">  <label> &nbsp;&nbsp; CARRIER</label> <br class="ng-tns-c268-42"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   </td>
        <td class="lable_title" width="20%" style="border-top: 1px solid black"> <label>&nbsp;&nbsp;NAIC CODE</label> <br class="ng-tns-c268-42">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </td>
      </tr>
    </tbody>
  </table>
</td>
<td valign="top" class="p-0 ng-tns-c268-42"  width="50%" >
  <table width="100%" cellpadding="0" cellspacing="0" class=" agenc_sub_table a_s_t_b">
    <tbody>
      <tr style="border:1px solid black;" >
        <td  class="lable_title" colspan="2"><label>&nbsp;&nbsp;NAME INSURED</label>
          <br class="ng-tns-c268-42">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $driver->truckers[0]->name }}<br class="ng-tns-c268-42">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $driver->truckers[0]->address }}<br class="ng-tns-c268-42">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $driver->truckers[0]->city }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $driver->truckers[0]->state }},<br class="ng-tns-c268-42">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $driver->truckers[0]->zip }}<br class="ng-tns-c268-42">
        </td></tr>
      <tr  style="border:1px solid black; ">

        <td class="lable_title" colspan="2"><label>&nbsp;&nbsp; EFFECTIVE DATE:</label>&nbsp;&nbsp;&nbsp;&nbsp;{{  date('m-d-Y', strtotime($cp->start_date)) }}  </td>

      </tr>
    </tbody>
  </table>
</td></tr></table>
<table width="100%" cellpadding="22" cellspacing="3" class=" ng-tns-c268-42">
  <tbody class="ng-tns-c268-42">
    <tr class="ng-tns-c268-42">
      <td style="font-size: 12px">
        ADDITIONAL REMARKS
      </td>

    </tr>
  </tbody>
</table>
<table width="100%" cellpadding="22" cellspacing="3" class="tftable ng-tns-c268-42">
  <tbody class="ng-tns-c268-42">
    <tr class="ng-tns-c268-42">
      <td style="font-size: 9px; ">
     THIS ADDITIONAL REMARKS DORM IS A SCHEDULE TO ACCORD FORM, <br>
    FORM NUMBER <u> 101 </u> FROM TITLE: <u> </u> </td></tr>
    <tr class="ng-tns-c268-42 efd">
      <td valign="top"  style="height:750px; font-size:10px">

        {{$certificate->ars}}

      </td>

    </tr>
  </tbody>
</table>


</div>
  </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<footer>
  <div class="rights_reserved ng-tns-c268-42" style="font-size: 10px;">
    © 1988-{{ date('Y') }} ACORD CORPORATION. All rights reserved.
  </div>
  <div class="right_reserveds ng-tns-c268-42" style="font-size: 10px;">
   ACCOR 25 (2010/05)
   <div class="right_reservedss ng-tns-c268-42" style="font-size: 10px;">
    The ACCORD name and logo are registered marks of ACCORD
   </div>
  </div>

</footer>
</div>
    </div>
  </div>
</body>

</html>
