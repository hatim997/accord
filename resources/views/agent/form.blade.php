@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp@extends('layouts/contentNavbarLayout')
@section('title', ' Vertical Layouts - Forms')
@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">INSURANCE/</span>INTERMODAL INTERCHANGE CERTIFICATE OF INSURANCE
    </h4>
    <p>THIS CERTIFICATE IS ISSUED AS A MATTER OF INFORMATION ONLY AND CONFERS NO RIGHTS UPON THE CERTIFICATE HOLDER. THIS
        CERTIFICATE DOES NOT AFFIRMATIVELY OR NEGATIVELY AMEND, EXTEND OR ALTER THE COVERAGE AFFORDED BY THE POLICIES
        BELOW. THIS CERTIFICATE OF INSURANCE DOES NOT CONSTITUTE A CONTRACT BETWEEN THE ISSUING INSURER(S), AUTHORIZED
        REPRESENTATIVE OR PRODUCER, AND THE CERTIFICATE HOLDER.</p>
    <form method="post" {{ route('form.insert') }} action="save">
        @csrf
        <!-- Basic Layout -->
        <div class="row">
            <!---------------------------------------------------------------------------------------------------------------------------
              --------------------------------------------------------------- PRODUCER  ---------------------------------------------------
              ----------------------------------------------------------------------->
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">PRODUCER</h5> <small class="text-muted float-end">PRODUCER INFO</small>
                    </div>
                    <div class="card-body">

                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" name="Cname" id="basic-default-fullname"
                                placeholder="ACME Inc." />
                            <label for="basic-default-fullname">Company</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control"name="Cadd1" id="basic-default-company2"
                                placeholder="Address line1" />
                            <label for="basic-default-company2">Address</label>
                            <input type="text" class="form-control" name="Cadd2"id="basic-default-company"
                                placeholder="Address line 2" />
                            <label for="basic-default-company">Address</label>
                            <input type="hidden" class="form-control" name="id_isu_data_fk"id="basic-default-company"
                                placeholder="Address line 2" />
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-4">
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" id="basic-default-email" name="Ccity" class="form-control"
                                            placeholder="Westlake Village" />
                                        <label for="basic-default-email">City </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" id="basic-default-phone" name="Czip"class="form-control "
                                        placeholder="6583" />
                                    <label for="basic-default-phone">Zip code</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" id="basic-default-phone" name="Cstate" class="form-control "
                                        placeholder="CA" />
                                    <label for="basic-default-phone">State</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" id="basic-default-phone" name="Cphone" class="form-control phone-mask"
                                placeholder="658 799 8941" />
                            <label for="basic-default-phone">Phone No</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" id="basic-default-phone" name="Cphone2" class="form-control phone-mask"
                                placeholder="658 799 8941" />
                            <label for="basic-default-phone">Alt Phone No</label>
                        </div>


                    </div>
                </div>
            </div>


            <!---------------------------------------------------------------------------------------------------------------------------
              --------------------------------------------------------------- CONTACT info   ---------------------------------------------------
              ----------------------------------------------------------------------->

            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">CONTACT</h5> <small class="text-muted float-end">CONTACT</small>
                    </div>
                    <div class="card-body">

                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" name="Conname"id="basic-default-fullname"
                                placeholder="John Doe" />
                            <label for="basic-default-fullname">Contact Name</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" name="phone" id="basic-default-company"
                                placeholder="23443666785" />
                            <label for="basic-default-company">Phone No</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" name="fax"id="basic-default-company"
                                placeholder="434652342342" />
                            <label for="basic-default-company">Fax No</label>
                        </div>
                        <div class="mb-4">
                            <div class="input-group input-group-merge">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="basic-default-email" name="email" class="form-control"
                                        placeholder="john.doe" aria-label="john.doe"
                                        aria-describedby="basic-default-email2" />
                                    <label for="basic-default-email">Email</label>
                                </div>
                                <span class="input-group-text" id="basic-default-email2">@example.com</span>
                            </div>
                            <div class="form-text"> You can use letters, numbers & periods </div>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" id="basic-default-phone" name="PC_ids"class="form-control phone-mask"
                                placeholder="658" />
                            <label for="basic-default-phone">Producer Customer Ids</label>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!---------------------------------------------------------------------------------------------------------------------------
              --------------------------------------------------------------- INSURED info   ---------------------------------------------------
              ----------------------------------------------------------------------->

        <div class="row">
            <div class="col-5">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">INSURED</h5> <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">

                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" name="Iname"id="basic-default-fullname"
                                placeholder="ACME Inc." />
                            <label for="basic-default-fullname">Company</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" name="Iadd1"id="basic-default-company2"
                                placeholder="Address line1" />
                            <label for="basic-default-company2">Address</label>
                            <input type="text" class="form-control" name="Iadd2"id="basic-default-company"
                                placeholder="Address line 2" />
                            <label for="basic-default-company">Address</label>

                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-4">
                                    <div class="form-floating form-floating-outline">
                                        <input type="text" id="basic-default-email" name="Iacity"
                                            class="form-control" placeholder="Westlake Village" />
                                        <label for="basic-default-email">City </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" id="basic-default-phone" name="Izip" class="form-control"
                                        placeholder="6583" />
                                    <label for="basic-default-phone">Zip code</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" id="basic-default-phone" name="Istate" class="form-control"
                                        placeholder="CA" />
                                    <label for="basic-default-phone">State</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" id="basic-default-phone" name="IPhone"class="form-control phone-mask"
                                placeholder="658 799 8941" />
                            <label for="basic-default-phone">Phone No</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" id="basic-default-phone" name="IPhone2"
                                class="form-control phone-mask" placeholder="658 799 8941" />
                            <label for="basic-default-phone">Alt Phone No</label>
                        </div>


                    </div>
                </div>
            </div>
            <!---------------------------------------------------------------------------------------------------------------------------
              --------------------------------------------------------------- INSURER(S) AFFORDING COVERAGE   ---------------------------------------------------
              ----------------------------------------------------------------------->

            <div class="col-7">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">INSURER(S) AFFORDING COVERAGE</h5> <small
                            class="text-muted float-end">CONTACT</small>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-fullname"
                                        name="insur_a" placeholder="Navigators Insurance Company " />
                                    <label for="basic-default-fullname">INSURER A</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" name="naic_a" id="basic-default-company"
                                        placeholder="29424" />
                                    <label for="basic-default-company">NAIC #</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" name="br_a"id="basic-default-company"
                                        placeholder="A++ 04-1" />
                                    <label for="basic-default-company">Best Rating </label>
                                </div>
                            </div>
                        </div>
                        <!--------------------------------------------------------------bbbbbb------------------------------------------------------------->

                        <div class="row">
                            <div class="col-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-fullname"
                                        name="insur_b" placeholder="Navigators Insurance Company " />
                                    <label for="basic-default-fullname">INSURER B</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-company"
                                        name="naic_b"placeholder="29424" />
                                    <label for="basic-default-company">NAIC #</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-company" name="br_b"
                                        placeholder="A++ 04-1" />
                                    <label for="basic-default-company">Best Rating </label>
                                </div>
                            </div>
                        </div>
                        <!--------------------------------------------------------------ccccccc------------------------------------------------------------->

                        <div class="row">
                            <div class="col-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-fullname"
                                        name="insur_c"placeholder="Navigators Insurance Company " />
                                    <label for="basic-default-fullname">INSURER C</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-company"
                                        name="naic_c"placeholder="29424" />
                                    <label for="basic-default-company">NAIC #</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-company" name="br_c"
                                        placeholder="A++ 04-1" />
                                    <label for="basic-default-company">Best Rating </label>
                                </div>
                            </div>
                        </div>
                        <!--------------------------------------------------------------dddddd------------------------------------------------------------->

                        <div class="row">
                            <div class="col-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-fullname"
                                        name="insur_d"placeholder="Navigators Insurance Company " />
                                    <label for="basic-default-fullname">INSURER D</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-company"
                                        name="naic_d"placeholder="29424" />
                                    <label for="basic-default-company">NAIC #</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-company" name="br_d"
                                        placeholder="A++ 04-1" />
                                    <label for="basic-default-company">Best Rating </label>
                                </div>
                            </div>
                        </div>
                        <!--------------------------------------------------------------eeeeee------------------------------------------------------------->

                        <div class="row">
                            <div class="col-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-fullname"
                                        name="insur_e" placeholder="Navigators Insurance Company " />
                                    <label for="basic-default-fullname">INSURER E</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-company" name="naic_e"
                                        placeholder="29424" />
                                    <label for="basic-default-company">NAIC #</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="basic-default-company" name="br_e"
                                        placeholder="A++ 04-1" />
                                    <label for="basic-default-company">Best Rating </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>


        <h4 class="py-3 mb-4">TYPE OF INSURANCE <span class="text-muted fw-light">INSURANCE/</span>COVERAGES</h4>
        <p>POLICIES. AGGREGATE LIMITS SHOWN MAY HAVE BEEN REDUCED BY PAID CLAIMS.
            MAY PERTAIN, THE INSURANCE AFFORDED BY THE POLICIES DESCRIBED HEREIN IS SUBJECT TO ALL THE TERMS, EXCLUSIONS AND
            CONDITIONS OF SUCH
            ANY REQUIREMENT, TERM OR CONDITION OF ANY CONTRACT OR OTHER DOCUMENT WITH RESPECT TO WHICH THIS CERTIFICATE MAY
            BE ISSUED OR
            THE POLICIES OF INSURANCE LISTED BELOW HAVE BEEN ISSUED TO THE INSURED NAMED ABOVE FOR THE POLICY PERIOD
            INDICATED. NOTWITHSTANDING</p>
        <!-- Basic Layout -->
        <div class="row">

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">GENERAL LIABILITY</h5> <small class="text-muted float-end">CONTACT</small>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="gl_pol_num"
                                    placeholder="EXP116564305-33" />
                                <label for="basic-default-company">POLICY NUMBER </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="date" class="form-control" id="html5-date-input" name="gl_pol_eff_date"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">POLICY EFFECTIV DATE </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="date" class="form-control" id="html5-date-input" name="gl_pol_exp_date"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">POLICY EXPIRATION DATE </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="1"
                                    name="COMMERCIAL_GENERAL_LIABILITY" id="defaultCheck1" />
                                <label class="form-check-label" for="defaultCheck1">
                                    COMMERCIAL GENERAL LIABILITY
                                </label>
                            </div>

                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="1" name="CLAIMS_MADE"
                                    id="defaultCheck1" />
                                <label class="form-check-label" for="defaultCheck1">
                                    CLAIMS-MADE
                                </label>
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="1" name="gl_OCCUR"
                                    id="defaultCheck1" />
                                <label class="form-check-label" for="defaultCheck1">
                                    OCCUR
                                </label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <label class="form-check-label" for="defaultCheck1">
                                    DEDUCTIBLE
                                </label>
                                <input class="form-check-input" type="checkbox" value="1" name="gl_DEDUCTIBLE"
                                    id="defaultCheck1" />
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input type="text" class="form-control" id="basic-default-company"
                                    name="gl_DEDUCTIBLE_unit" placeholder="" />
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="1" name="gl_agg"
                                    id="defaultCheck1" />
                                <label class="form-check-label" for="defaultCheck1">
                                    GEN'L AGGREGATE LIMIT APPLIES PER
                                </label>
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="1" name="gl_policy"
                                    id="defaultCheck1" />
                                <label class="form-check-label" for="defaultCheck1">
                                    POLICY
                                </label>
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company"
                                    name="EACH_CCURRENCE" placeholder="A++ 04-1" />
                                <label for="basic-default-company">EACH OCCURRENCE </label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="gl_PREMISES"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">PREMISES (Ea occurence) $ DAMAGE TO RENTED </label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="gl_MED_EXP"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">MED EXP (Any one person) </label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company"
                                    name="gl_ADV_INJURY" placeholder="A++ 04-1" />
                                <label for="basic-default-company">PERSONAL & ADV INJURY </label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="gl_ga"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">GENERAL AGGREGATE </label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="gl_COMP_OP"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">PRODUCTS - COMP/OP AGG </label>
                            </div>
                        </div>
                    </div>

                </div>

            </div><!-- Basic card-body -->

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">AUTOMOBILE LIABILITY</h5> <small class="text-muted float-end">CONTACT</small>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="al_pol_num"
                                    placeholder="EXP116564305-33" />
                                <label for="basic-default-company">POLICY NUMBER </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="html5-date-input" name="al_pol_eff_date"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">POLICY EFFECTIV DATE </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="date" class="form-control" id="html5-date-input" name="al_pol_exp_date"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">POLICY EXPIRATION DATE </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="1" name="al_ANY_UTO"
                                    id="defaultCheck1" />
                                <label class="form-check-label" for="defaultCheck1">
                                    ANY AUTO
                                </label>
                            </div>

                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="1" name="al_oao"
                                    id="defaultCheck1" />
                                <label class="form-check-label" for="defaultCheck1">
                                    OWNED AUTOS ONLY
                                </label>
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="1" name="al_sau"
                                    id="defaultCheck1" />
                                <label class="form-check-label" for="defaultCheck1">
                                    SCHEDULED AUTOS
                                </label>
                            </div>

                            <div class="form-check form-check-inline mt-3">
                                <label class="form-check-label" for="defaultCheck1">
                                    DEDUCTIBLE
                                </label>
                                <input class="form-check-input" type="checkbox" value="1" name="al_DEDUCTIBLE_unit"
                                    id="defaultCheck1" />
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input type="text" class="form-control" id="basic-default-company"
                                    name="al_DEDUCTIBLE" placeholder="" />
                            </div>


                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="1" name="al_ha"
                                    id="defaultCheck1" />
                                <label class="form-check-label" for="defaultCheck1">
                                    HIRED AUTOS
                                </label>
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="1" name="al_moa"
                                    id="defaultCheck1" />
                                <label class="form-check-label" for="defaultCheck1">
                                    NON-OWNED AUTOS
                                </label>
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="al_moa2"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">NON-OWNED AUTOS </label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="al_bi"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">BODILY INJURY (Per person) </label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="al_bi_aci"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">BODILY INJURY (Per accident) </label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="al_prodamg"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">PROPERTY DAMAGE (Per accident) </label>
                            </div>
                        </div>
                    </div>

                </div>

            </div><!-- Basic card-body -->

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">CARGO</h5> <small class="text-muted float-end">CONTACT</small>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="c_pol_num"
                                    placeholder="EXP116564305-33" />
                                <label for="basic-default-company">POLICY NUMBER </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="date" class="form-control" id="html5-date-input" name="c_pol_eff_date"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">POLICY EFFECTIV DATE </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="date" class="form-control" id="html5-date-input" name="c_pol_exp_date"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">POLICY EXPIRATION DATE </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check form-check-inline mt-3">
                                <label class="form-check-label" for="defaultCheck1">
                                    PER VEHICLE DED
                                </label>
                                {{-- <input class="form-check-input" type="checkbox" value="1" name="c_VEHICLE_DED_unit" id="defaultCheck1" />                                           --}}
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input type="text" class="form-control" id="basic-default-company"
                                    name="c_VEHICLE_DED" placeholder="" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="c_limit_per"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">LIMIT PER VEHICLE </label>
                            </div>
                        </div>
                    </div>

                </div>

            </div><!-- Basic card-body -->

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">TRAILER INTERCHANGE
                        PHYSICAL DAMAGE</h5> <small class="text-muted float-end">CONTACT</small>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="fd_pol_num"
                                    placeholder="EXP116564305-33" />
                                <label for="basic-default-company">POLICY NUMBER </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="date" class="form-control" id="html5-date-input" name="fd_pol_eff_date"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">POLICY EFFECTIV DATE </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="date" class="form-control"id="html5-date-input" name="fd_pol_exp_date"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">POLICY EXPIRATION DATE </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check form-check-inline mt-3">
                                <label class="form-check-label" for="defaultCheck1">
                                    PER TRAILER DED
                                </label>
                                {{-- <input class="form-check-input" type="checkbox" value="1" name="fd_fdt_unit" id="defaultCheck1" />                                           --}}
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input type="text" class="form-control" id="basic-default-company" name="fd_fdt"
                                    placeholder="" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="fd_lpt"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">LIMIT PER TRAILER </label>
                            </div>
                        </div>
                    </div>

                </div>

            </div><!-- Basic card-body -->

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{-- <h5 class="mb-0">AUTOMOBILE LIABILITY</h5> <small class="text-muted float-end">CONTACT</small> --}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="one_pol_num"
                                    placeholder="EXP116564305-33" />
                                <label for="basic-default-company">POLICY NUMBER </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="date" class="form-control" id="html5-date-input" name="one_pol_eff_date"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">POLICY EFFECTIV DATE </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="date" class="form-control" id="html5-date-input" name="one_pol_exp_date"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">POLICY EXPIRATION DATE </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="1" name="UMBRELLA_LIAB"
                                    id="defaultCheck1" />
                                <label class="form-check-label" for="defaultCheck1">
                                    UMBRELLA LIAB
                                </label>
                            </div>

                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="1" name="CLAIM_MADE"
                                    id="defaultCheck1" />
                                <label class="form-check-label" for="defaultCheck1">
                                    CLAIM MADE
                                </label>
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="1" name="EXCESS_LIAB"
                                    id="defaultCheck1" />
                                <label class="form-check-label" for="defaultCheck1">
                                    EXCESS LIAB
                                </label>
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="1" name="1_OCCUR"
                                    id="defaultCheck1" />
                                <label class="form-check-label" for="defaultCheck1">
                                    OCCUR
                                </label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <label class="form-check-label" for="defaultCheck1">
                                    DEDUCTIBLE
                                </label>
                                <input class="form-check-input" type="checkbox" value="1" name="DEDUCTIBLE_unit_1"
                                    id="defaultCheck1" />
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input type="text" class="form-control" id="basic-default-company"
                                    name="DEDUCTIBLE_1" placeholder="" />
                            </div>
                            <br>

                            <div class="form-check form-check-inline mt-3">
                                <label class="form-check-label" for="defaultCheck1">
                                    RETENTION
                                </label>
                                <input class="form-check-input" type="checkbox" value="1" name="RETENTION_unit_1"
                                    id="defaultCheck1" />
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input type="text" class="form-control" id="basic-default-company" name="RETENTION_1"
                                    placeholder="" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company"
                                    name="EACH_OCCURRENCE" placeholder="A++ 04-1" />
                                <label for="basic-default-company">EACH OCCURRENCE </label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="AGGREGATE"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">AGGREGATE </label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="empty1"
                                    placeholder="A++ 04-1" />
                                {{-- <label for="basic-default-company">BODILY INJURY (Per accident)  </label> --}}
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="empty2"
                                    placeholder="A++ 04-1" />
                                {{-- <label for="basic-default-company">PROPERTY DAMAGE (Per accident)  </label> --}}
                            </div>
                        </div>
                    </div>

                </div>

            </div><!-- Basic card-body -->

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">WORKERS COMPENSATION
                        AND EMPLOYERS' LIABILITY</h5> <small class="text-muted float-end">CONTACT</small>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="wc_pol_num"
                                    placeholder="EXP116564305-33" />
                                <label for="basic-default-company">POLICY NUMBER </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="date" class="form-control" id="html5-date-input" name="wc_pol_eff_date"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">POLICY EFFECTIV DATE </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="date" class="form-control"id="html5-date-input" name="wc_pol_exp_date"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">POLICY EXPIRATION DATE </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check form-check-inline mt-3">
                                <label class="form-check-label" for="defaultCheck1">
                                    ANY PROPRIETOR/PARTNER/EXECUTIVE/OFFICER/MEMBER EXCLUDED?
                                </label>
                                <input class="form-check-input" type="checkbox" value="yes" name="qusetion"
                                    id="defaultCheck1" />
                            </div>


                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="If_yes"
                                    placeholder="A++ 04-1" />
                                <label class="form-check-label" for="basic-default-company">If yes, describe under
                                    SPECIAL PROVISIONS below </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="1" name="wc_sta_lim"
                                    id="defaultCheck1" />
                                <label class="form-check-label" for="defaultCheck1">
                                    WC STATUTORY LIMITS
                                </label>
                            </div>

                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="1" name="wc_other"
                                    id="defaultCheck1" />
                                <label class="form-check-label" for="defaultCheck1">
                                    OTHER
                                </label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="wc_elea"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">E.L. EACH ACCIDENT </label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="wc_eldeae"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">E.L. DISEASE - EA EMPLOYEE </label>
                            </div>
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="wc_eldpl"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">E.L. DISEASE - POLICY LIMIT </label>
                            </div>

                        </div>
                    </div>

                </div>

            </div><!-- Basic card-body -->
            <div class="card mb-4">

                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="pol_num1"
                                    placeholder="EXP116564305-33" />
                                <label for="basic-default-company">POLICY NUMBER </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="date" class="form-control" id="html5-date-input" name="pol_eff_date1"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">POLICY EFFECTIV DATE </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="date" class="form-control" id="html5-date-input" name="pol_exp_date1"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">POLICY EXPIRATION DATE </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="type_insura"
                                    placeholder="EXP116564305-33" />
                                <label for="basic-default-company">TYPE OF INSURANC </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company"
                                    name="DISEASE_POLICY_LIMIT" placeholder="A++ 04-1" />
                                <label for="basic-default-company">E.L. DISEASE - POLICY LIMIT </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company"
                                    name="limt_pr_tril" placeholder="A++ 04-1" />
                                <label for="basic-default-company">LIMIT PER TRAILER </label>
                            </div>
                        </div>
                    </div>

                </div>

            </div><!-- Basic card-body -->
            <div class="card mb-4">

                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company" name="pol_num2"
                                    placeholder="EXP116564305-33" />
                                <label for="basic-default-company">POLICY NUMBER </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="date" class="form-control" id="html5-date-input" name="pol_eff_date2"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">POLICY EFFECTIV DATE </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="date" class="form-control" id="html5-date-input" name="pol_exp_date2"
                                    placeholder="A++ 04-1" />
                                <label for="basic-default-company">POLICY EXPIRATION DATE </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company"
                                    name="type_insura2" placeholder="EXP116564305-33" />
                                <label for="basic-default-company">TYPE OF INSURANC </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company"
                                    name="DISEASE_POLICY_LIMIT2" placeholder="A++ 04-1" />
                                <label for="basic-default-company">E.L. DISEASE - POLICY LIMIT </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company"
                                    name="limt_pr_tril2" placeholder="A++ 04-1" />
                                <label for="basic-default-company">LIMIT PER TRAILER </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Basic card-body -->
            <div class="card mb-4">

                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company"
                                    name="CERTIFICATE_HOLDER" placeholder="" />
                                <label for="basic-default-company">CERTIFICATE HOLDER </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="basic-default-company"
                                    name="REPRESENTATIVE" placeholder="" />
                                <label for="basic-default-company">AUTHORIZED REPRESENTATIVE</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" value="1" name="checkbox" id="defaultCheck1"
                    required />
                <label class="form-check-label" for="defaultCheck1">
                    DESCRIPTION OF OPERATIONS / VEHICLES / EXCLUSIONS ADDED BY ENDORSEMENT / SPECIAL PROVISIONS (Attach
                    ACORD 101, Additional Remarks Schedule, if more space is required)
                    The Truckers Uniform Intermodal Interchange Endorsement (Form UIIE-1 or CA 23-17 equivalent) is part of
                    the auto policy(ies). The attached list of providers are additional insureds in
                    regards to the auto liability. Those providers with (*) are additional insureds on the general liability
                    and those with (**) are additional insureds on trailer interchange coverage.

                </label>
            </div>


        </div><!-- Basic card -->

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">ADDITIONAL REMARKS SCHEDULE</h5> <small class="text-muted float-end">Page 2 of
                    4</small>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company"
                                name="AGENCY_CUSTOMER_ID" placeholder="" />
                            <label for="basic-default-company">AGENCY CUSTOMER ID </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company" name="loc"
                                placeholder="" />
                            <label for="basic-default-company">LOC#</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="date" class="form-control" id="html5-date-input" name="EFFECTIVE_DATE"
                                placeholder="" />
                            <label for="basic-default-company">EFFECTIVE DATE </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company" name="AGENCY_n"
                                placeholder="" />
                            <label for="basic-default-company">AGENCY</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company"
                                name="NAMEDINSURED" placeholder="" />
                            <label for="basic-default-company">NAMED INSURED </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company"
                                name="POLICY_NUMBER" placeholder="" />
                            <label for="basic-default-company">POLICY NUMBER </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company" name="CARRIER"
                                placeholder="" />
                            <label for="basic-default-company">CARRIER</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company" name="NAIC_CODE"
                                placeholder="" />
                            <label for="basic-default-company">NAIC CODE</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company" name="addre"
                                placeholder="" />
                            <label for="basic-default-company">Address</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company" name="FORM_NUMBER"
                                placeholder="" />
                            <label for="basic-default-company">FORM NUMBER</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company" name="FORM_TITLE"
                                placeholder="" />
                            <label for="basic-default-company">FORM TITLE</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating form-floating-outline mb-4">
                            <textarea class="form-control h-px-100" name="additional" id="exampleFormControlTextarea1"
                                placeholder="Comments here..."></textarea>
                            <label for="basic-default-company">Additional Insurance Policies</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">ADDITIONAL REMARKS SCHEDULE</h5> <small class="text-muted float-end">Page 3 of
                    4</small>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company"
                                name="AGENCY_CUSTOMER_ID2" placeholder="" />
                            <label for="basic-default-company">AGENCY CUSTOMER ID </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company" name="loc2"
                                placeholder="" />
                            <label for="basic-default-company">LOC#</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="date" class="form-control" id="html5-date-input" name="EFFECTIVE_DATE2"
                                placeholder="" />
                            <label for="basic-default-company">EFFECTIVE DATE </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company" name="AGENCY_n2"
                                placeholder="" />
                            <label for="basic-default-company">AGENCY</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company"
                                name="NAMEDINSURED2" placeholder="" />
                            <label for="basic-default-company">NAMED INSURED </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company"
                                name="POLICY_NUMBER2" placeholder="" />
                            <label for="basic-default-company">POLICY NUMBER </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company" name="CARRIER2"
                                placeholder="" />
                            <label for="basic-default-company">CARRIER</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company" name="NAIC_CODE2"
                                placeholder="" />
                            <label for="basic-default-company">NAIC CODE</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company" name="addre2"
                                placeholder="" />
                            <label for="basic-default-company">Address</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company"
                                name="FORM_NUMBER2" placeholder="" />
                            <label for="basic-default-company">FORM NUMBER</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company" name="FORM_TITLE2"
                                placeholder="" />
                            <label for="basic-default-company">FORM TITLE</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating form-floating-outline mb-4">
                            <textarea class="form-control h-px-100" name="additional2" id="exampleFormControlTextarea1"
                                placeholder="Comments here..."></textarea>
                            <label for="basic-default-company">Additional Insurance Policies</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">ADDITIONAL REMARKS SCHEDULE</h5> <small class="text-muted float-end">Page 4 of
                    4</small>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company"
                                name="AGENCY_CUSTOMER_ID3" placeholder="" />
                            <label for="basic-default-company">AGENCY CUSTOMER ID </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company" name="loc3"
                                placeholder="" />
                            <label for="basic-default-company">LOC#</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="date" class="form-control" id="html5-date-input" name="EFFECTIVE_DATE3"
                                placeholder="" />
                            <label for="basic-default-company">EFFECTIVE DATE </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company" name="AGENCY_n3"
                                placeholder="" />
                            <label for="basic-default-company">AGENCY</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company"
                                name="NAMEDINSURED3" placeholder="" />
                            <label for="basic-default-company">NAMED INSURED </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company"
                                name="POLICY_NUMBER3" placeholder="" />
                            <label for="basic-default-company">POLICY NUMBER </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company" name="CARRIER3"
                                placeholder="" />
                            <label for="basic-default-company">CARRIER</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company" name="NAIC_CODE3"
                                placeholder="" />
                            <label for="basic-default-company">NAIC CODE</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company" name="addre3"
                                placeholder="" />
                            <label for="basic-default-company">Address</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company"
                                name="FORM_NUMBER3" placeholder="" />
                            <label for="basic-default-company">FORM NUMBER</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating form-floating-outline mb-4">
                            <input type="text" class="form-control" id="basic-default-company" name="FORM_TITLE3"
                                placeholder="" />
                            <label for="basic-default-company">FORM TITLE</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating form-floating-outline mb-4">
                            <textarea class="form-control h-px-100" name="additional3" id="exampleFormControlTextarea1"
                                placeholder="Comments here..."></textarea>
                            <label for="basic-default-company">Additional Insurance Policies</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <button type="submit" class="btn btn-primary">Send</button>
    </form>

@endsection
