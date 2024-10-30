 <!-- Basic Layout -->
 <div class="row">
     @foreach ($policytypes as $pt)
         <div class="card mb-4">
             <div class="card-body">
                 <div class="card-header d-flex justify-content-between align-items-center">
                     <input type="text" class="" oninput="validateInput(event)" id="IAC"
                         name="insurance_provider_code[{{ $pt->id }}]" size="1" maxlength="1"
                         oninput="this.value = this.value.toUpperCase();" style="width: 25px;" />

                         
                     <h5 class="mb-0">{{ $pt->type_name }}</h5>
                     <small class="text-muted float-end">CONTACT</small>
                 </div>
                 <div class="row">
                     <div class="col-4">
                         <div class="form-floating form-floating-outline mb-4">
                             <input type="text" class="form-control" id="basic-default-company"
                                 name="main_policy_polnum[{{ $pt->id }}]" placeholder="EXP116564305-33" />
                             <label for="basic-default-company">POLICY NUMBER </label>
                         </div>
                     </div>
                     <div class="col-4">
                         <div class="form-floating form-floating-outline mb-4">
                             <input type="date" class="form-control" id="html5-date-input"
                                 name="main_policy_eff_date[{{ $pt->id }}]" placeholder="A++ 04-1" />
                             <label for="basic-default-company">POLICY EFFECTIV DATE </label>
                         </div>
                     </div>
                     <div class="col-4">
                         <div class="form-floating form-floating-outline mb-4">
                             <input type="date" class="form-control" id="html5-date-input"
                                 name="main_policy_exp_date[{{ $pt->id }}]" placeholder="A++ 04-1" />
                             <label for="basic-default-company">POLICY EXPIRATION DATE </label>
                         </div>
                     </div>
                     <div class="col-6">
                         @foreach ($pt->policies as $pp)
                             {{-- @if ($pp->policy_title == 'DEDUCTIBLE')
                                 <div class="form-check form-check-inline mt-3">
                                     <label class="form-check-label" for="{{ $pp->policy_title }}">
                                         {{ $pp->policy_title }}
                                     </label>
                                     <input class="form-check-input" type="checkbox" value="{{ $pp->id }}"
                                         name="main_policy_subpol[{{ $pt->type_name }}][{{ $pp->id }}]"
                                         id="policy_{{ $pt->id }}" />
                                 </div>
                                 <div class="form-check form-check-inline mt-3">
                                     <input type="text" class="form-control" id="{{ $pp->policy_title }}"
                                         name="policy_deductible_{{ $pt->id }}[{{ $pp->id }}]"
                                         placeholder="$" />
                                 </div>
                             @elseif ($pp->policy_title == 'RETENTION')
                                 <br>
                                 <div class="form-check form-check-inline mt-3">
                                     <label class="form-check-label" for="{{ $pp->policy_title }}">
                                         {{ $pp->policy_title }}
                                     </label>
                                     <input class="form-check-input" type="checkbox" value="{{ $pp->id }}"
                                         name="main_policy_sub[{{ $pt->id }}][{{ $pp->id }}]"
                                         id="policy_{{ $pt->id }}" />
                                 </div>
                                 <div class="form-check form-check-inline mt-3">
                                     <input type="text" class="form-control" id="{{ $pp->policy_title }}"
                                         name="policy_retention_{{ $pt->id }}[{{ $pp->id }}]"
                                         placeholder="$" />
                                 </div>
                             @elseif (preg_match('/\bDED\b/', $pp->policy_title))
                                 <div class="form-check form-check-inline mt-3">
                                     <label class="form-check-label" for="{{ $pp->policy_title }}">
                                         {{ $pp->policy_title }}
                                     </label>
                                     <input class="form-check-input" type="checkbox" value="{{ $pp->id }}"
                                         name="main_policy_sub[{{ $pt->id }}][{{ $pp->id }}]"
                                         id="policy_{{ $pt->id }}" />
                                 </div>
                                 <div class="form-check form-check-inline mt-3">
                                     <input type="text" class="form-control" id="policy_{{ $pt->id }}"
                                         name="policy_retention_{{ $pt->id }}" placeholder="$" />
                                 </div>
                             @else
                                 <div class="form-check mt-3">
                                     <input class="form-check-input" type="checkbox" value="{{ $pp->id }}"
                                         name="main_policy_sub[{{ $pt->id }}][{{ $pp->id }}]"
                                         id="{{ $pp->policy_title }}" />
                                     <label class="form-check-label" for="{{ $pp->policy_title }}">
                                         {{ $pp->policy_title }}
                                     </label>
                                 </div>
                             @endif --}}
                             <div class="form-check mt-3">
                                 <input class="form-check-input" type="checkbox" value="{{ $pp->id }}"
                                     name="main_policy_sub[{{ str_replace(' ', '_', $pt->id) }}][{{ $pp->id }}]"
                                     id="{{ $pp->policy_title }}" />
                                 <label class="form-check-label" for="{{ $pp->policy_title }}">
                                     {{ $pp->policy_title }}
                                 </label>
                             </div>
                         @endforeach
                     </div>
                     <div class="col-6">
                         @foreach ($pt->policyLimits as $pl)
                             <div class="form-floating form-floating-outline mb-4">
                                 <input type="text" class="form-control" id="{{ $pl->coverage_item }}"
                                     name="main_policy_coverage[{{ str_replace(' ', '_', $pt->id) }}][{{ $pl->id }}]"
                                     placeholder="" />
                                 <label for="basic-default-company">{{ $pl->coverage_item }}</label>
                             </div>
                         @endforeach
                     </div>
                 </div>

             </div>

         </div><!-- Basic card-body -->
     @endforeach

     <div class="card mb-4">
         <div class="card-body">
             <div class="row">
                 <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top: 9px;">
                     <tbody>
                         <tr>
                             <td style="width: 50%; font-size: 15px; font-weight: bold;">
                                 CERTIFICATE HOLDER</td>
                             <td style="width: 50%; font-size: 15px; font-weight: bold;">
                                 CANCELLATION</td>
                         </tr>
                         <tr>
                             <td valign="top" colspan="2" class="p-0">
                                 <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                     class="tftable m-t-b-10">
                                     <tbody>
                                         <tr>
                                             <td rowspan="2" width="50%" class="ct_holder"> President <br> The
                                                 Intermodal Association of North America <br>
                                                 11785 Beltsville Drive <br> Suite 1100<br> Calverton, MD 20705-4048<br>
                                             </td>
                                             <td class="fot_titel"> SHOULD ANY OF THE ABOVE
                                                 DESCRIBED POLICIES BE CANCELLED BEFORE THE EXPIRATION DATE THEREOF,
                                                 NOTICE WILL BE DELIVERED IN ACCORDANCE WITH THE POLICY PROVISIONS.
                                             </td>
                                         </tr>
                                         <tr>
                                             <td class="fot_titel">AUTHORIZED REPRESENTATIVE
                                                 <textarea disabled cols="38" rows="3" readonly="readonly" style="vertical-align: middle; margin-left: 10px;"></textarea>
                                             </td>
                                         </tr>
                                     </tbody>
                                 </table>
                             </td>
                         </tr>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
 {{-- <div class="form-check mt-3">
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
     </div> --}}


 </div><!-- Basic card -->
