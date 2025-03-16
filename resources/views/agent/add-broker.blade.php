@extends('layouts/contentNavbarLayout')
@section('title', ' Vertical Layouts - Forms')
@section('content')
@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp
<style>
  .btn-primary {
background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);
border: none !important;
border-radius: 10px !important;
color: white;
font-weight: bold; /* Bold text */
}

input, textarea, button {
padding: 10px 15px;
border-radius: 5px;
margin: 10px 0; /* Space between fields */
box-sizing: border-box;
border: 1px solid #ccc;
font-size: 16px; /* Slightly smaller font */
transition: border-color 0.3s;
}
.form-heading{
font-weight: bold !important;
}

</style>
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Broker Add By Agent</h4>

<form method="POST" action="{{ route('agent.regs.store') }}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="role" value="freight_driver" />

  @if(Session::has('success'))
  <div class="alert alert-success alert-dismissible" role="alert">
    {{ Session::get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
  </div>
  @endif
  @if($errors->any())
  @foreach($errors->all() as $error)
  <div class="alert alert-danger alert-dismissible" role="alert">
    {{ $error }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
  </div>
  @endforeach
  @endif

  <!-- Basic Layout -->
  <div class="position-relative">
    <div class="container authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner py-4">
        <div class="card" id="cardCenter">
          <div class="card-content">
            <!-- Basic Layout -->
            <div class="card-header d-flex justify-content-between align-items-center">
              <!-- Logo on the left -->
              <div class="app-brand" style="margin-right: auto; margin-left:7%;">
                  <a href="{{url('/')}}" class="app-brand-link gap-2 d-flex align-items-center">
                      <span class="app-brand-logo demo">@include('_partials.macros', ["height"=>20, "withbg"=>'fill:#fff;'])</span>
                      <span class="app-brand-text demo text-heading fw-semibold">{{config('variables.templateName')}}</span>
                  </a>
              </div>

              <!-- Register title in the center -->
              <h4 class="card-title mb-0 form-heading" id="cardCenterTitle" style="text-align: center;">Register Broker</h4>

              <!-- Save changes button on the right -->
              <div style="margin-left: auto; margin-right:7%;x">
                  <button type="submit" id="saveButton" class="btn btn-primary">Save changes</button>
              </div>
          </div>

            <div class="card-body">
              <div class="row">
                <div class="container">

                  @if(!empty($successMessage))
                  <div class="alert alert-success">
                    {{ $successMessage }}
                  </div>
                  @endif

                  <div class="row py-3 setup-content " id="step-1">
                    <div class="col-xs-12">
                      <div class="row px-5">
                        <div class="col-md-6">
                          <div class="form-group py-3">
                            <label for="name " class="required">Company Name:</label>
                            <input type="text" name="name" class="form-control" id="name">
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-group py-3">
                            <label for="mc_number"  class="required">Federal Registration No. (MC Number)</label>
                            <input type="number" oninput="this.value=this.value.slice(0,8)" maxlength="8"
                              name="mc_number" class="form-control" id="mc_number" />
                            @error('mc_number') <span class="error">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-group py-3">
                            <label for="tax"  class="">US Tax ID / Canadian Business Number</label>
                            <input type="text" name="tax" class="form-control" id="tax" />
                            @error('tax') <span class="error">{{ $message }}</span> @enderror

                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group py-3">
                            <label for="fname" class="required">First Name:</label>
                            <input type="text" name="fname" class="form-control" id="fname" />
                            @error('fname') <span class="error">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-group py-3">
                            <label for="lname" class="required">Last Name:</label>
                            <input type="text" name="lname" class="form-control" id="lname" />
                            @error('lname') <span class="error">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-group py-3">
                            <label for="email" class="required">Email:</label>
                            <input type="email" name="email" class="form-control" id="email" />
                            @error('email') <span class="error">{{ $message }}</span> @enderror
                          </div>
                     

                        </div>
                    

                            <div class="col-md-6">
                              <div class="form-group py-3">
                                <label for="address" class="required">Address 1:</label>
                                <input type="text" name="address" class="form-control" id="address" />
                                @error('address') <span class="error">{{ $message }}</span> @enderror
                              </div>
                              {{-- <div class="form-group py-3">
                                <label for="prefix">Prefix</label>
                                <select class="form-select" id="prefix" name="prefix"
                                  aria-label="Default select example">
                                  <option selected>Open this select menu</option>
                                  <option value="1">Mr</option>
                                  <option value="2">Mrs</option>
                                  <option value="3">Ms</option>
                                </select>
                              </div> --}}

                              {{-- <div class="form-group py-3">
                                <label for="mname">Middle Name:</label>
                                <input type="text" name="mname" class="form-control" id="mname" />
                                @error('mname') <span class="error">{{ $message }}</span> @enderror
                              </div>
                              <div class="form-group py-3">
                                <label for="suffix" class="required">Suffix</label>
                                <input type="text" name="suffix" class="form-control" id="suffix" />
                                @error('suffix') <span class="error">{{ $message }}</span> @enderror
                              </div>
                              <div class="form-group py-3">
                                <label for="salutation" class="required">Salutation</label>
                                <input type="text" name="salutation" class="form-control" id="salutation" />
                                @error('salutation') <span class="error">{{ $message }}</span> @enderror
                              </div> --}}

                            </div>
                        

                            <div class="col-md-6">

                              <div class="form-group py-3">
                                <label for="address2">Address 2:</label>
                                <input type="text" name="address2" class="form-control" id="address2" />
                                @error('address2') <span class="error">{{ $message }}</span> @enderror
                              </div>

                            </div>
                            <div class="col-md-6">
                              <div class="form-group py-3">
                                <label for="country">Country:</label>
                                <select name="country" class="form-control" id="country">
                                    <option value="">Select a Country</option>
                                    <option value="USA">United States</option>
                                    <option value="Canada">Canada</option>
                                </select>
                                @error('country')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                              <div class="form-group py-3">
                                <label for="city" class="required">City:</label>
                                <input type="text" name="city" class="form-control" id="city" />
                                @error('city') <span class="error">{{ $message }}</span> @enderror
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group py-3">
                                <label for="state" class="required">State:</label>
                                <select class="form-control" id="state" name="state">
                                    <option value="">Select a State</option>
                                </select>
                                @error('state')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                              <div class="form-group py-3">
                                <label for="zip" class="required">Zip Code:</label>
                                <input type="number" oninput="this.value=this.value.slice(0,5)" maxlength="5" name="zip"
                                  class="form-control" id="zip" />
                                @error('zip') <span class="error">{{ $message }}</span> @enderror
                              </div>
                            </div>



                

                  

                        <div class="col-md-6">
                          <div class="form-group py-3">
                            <label for="extra_email">ALT EMAIL</label>
                            <input type="text" class="form-control" name="extra_email" id="extra_email" placeholder="Extra Email" />
                          </div>

                          {{-- <div class="form-group py-3">
                            <label for="password">Upload License</label>
                            <input type="file" class="form-control" name="imagePath" id="imagePath" placeholder="Choose License" />
                          </div> --}}

                        </div>
                        
              </div>

            </div>
          </div>
        </div>
        {{-- card end --}}

        {{-- <button type="submit" id="saveButton" class="btn btn-primary">Save changes</button> --}}
      </div>
</form>


@endsection
@push('body-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
      var cleave = new Cleave('#cellphone', {
          phone: true,
          phoneRegionCode: 'US'
      });
  });
</script>
<script>
  const states = {
      USA: [
          { value: 'AL', name: 'Alabama' },
          { value: 'AK', name: 'Alaska' },
          { value: 'AZ', name: 'Arizona' },
          { value: 'AR', name: 'Arkansas' },
          { value: 'CA', name: 'California' },
          { value: 'CO', name: 'Colorado' },
          { value: 'CT', name: 'Connecticut' },
          { value: 'DE', name: 'Delaware' },
          { value: 'DC', name: 'District of Columbia' },
          { value: 'FL', name: 'Florida' },
          { value: 'GA', name: 'Georgia' },
          { value: 'HI', name: 'Hawaii' },
          { value: 'ID', name: 'Idaho' },
          { value: 'IL', name: 'Illinois' },
          { value: 'IN', name: 'Indiana' },
          { value: 'IA', name: 'Iowa' },
          { value: 'KS', name: 'Kansas' },
          { value: 'KY', name: 'Kentucky' },
          { value: 'LA', name: 'Louisiana' },
          { value: 'ME', name: 'Maine' },
          { value: 'MD', name: 'Maryland' },
          { value: 'MA', name: 'Massachusetts' },
          { value: 'MI', name: 'Michigan' },
          { value: 'MN', name: 'Minnesota' },
          { value: 'MS', name: 'Mississippi' },
          { value: 'MO', name: 'Missouri' },
          { value: 'MT', name: 'Montana' },
          { value: 'NE', name: 'Nebraska' },
          { value: 'NV', name: 'Nevada' },
          { value: 'NH', name: 'New Hampshire' },
          { value: 'NJ', name: 'New Jersey' },
          { value: 'NM', name: 'New Mexico' },
          { value: 'NY', name: 'New York' },
          { value: 'NC', name: 'North Carolina' },
          { value: 'ND', name: 'North Dakota' },
          { value: 'OH', name: 'Ohio' },
          { value: 'OK', name: 'Oklahoma' },
          { value: 'OR', name: 'Oregon' },
          { value: 'PA', name: 'Pennsylvania' },
          { value: 'RI', name: 'Rhode Island' },
          { value: 'SC', name: 'South Carolina' },
          { value: 'SD', name: 'South Dakota' },
          { value: 'TN', name: 'Tennessee' },
          { value: 'TX', name: 'Texas' },
          { value: 'UT', name: 'Utah' },
          { value: 'VT', name: 'Vermont' },
          { value: 'VA', name: 'Virginia' },
          { value: 'WA', name: 'Washington' },
          { value: 'WV', name: 'West Virginia' },
          { value: 'WI', name: 'Wisconsin' },
          { value: 'WY', name: 'Wyoming' },
      ],
      Canada: [
          { value: 'AB', name: 'Alberta' },
          { value: 'BC', name: 'British Columbia' },
          { value: 'MB', name: 'Manitoba' },
          { value: 'NB', name: 'New Brunswick' },
          { value: 'NL', name: 'Newfoundland and Labrador' },
          { value: 'NS', name: 'Nova Scotia' },
          { value: 'ON', name: 'Ontario' },
          { value: 'PE', name: 'Prince Edward Island' },
          { value: 'QC', name: 'Quebec' },
          { value: 'SK', name: 'Saskatchewan' },
          { value: 'NT', name: 'Northwest Territories' },
          { value: 'NU', name: 'Nunavut' },
          { value: 'YT', name: 'Yukon' },
      ],
  };

  document.getElementById('country').addEventListener('change', function () {
      const country = this.value;
      const stateSelect = document.getElementById('state');

      // Clear the state options
      stateSelect.innerHTML = `<option value="">Select a State</option>`;

      // Populate the states based on the selected country
      if (states[country]) {
          states[country].forEach(state => {
              const option = document.createElement('option');
              option.value = state.value;
              option.textContent = state.name;
              stateSelect.appendChild(option);
          });
      }
  });
</script>

@endpush
