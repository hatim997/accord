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
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Shipper Added By Carrier</h4>
{{-- <p>Please fill out the following information and press the submit button to request a certificate of insurance. Your request will be processed and sent to you as soon as possible. Certificates will only be issued upon verification of coverage.</p> --}}


<form method="POST" action="{{ route('reg.add') }}">

  @csrf


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
  <input type="hidden" name="role" value="shipper">
  <!-- Basic Layout -->
<div class="position-relative">
<div class="container authentication-wrapper authentication-basic container-p-y" >
<div class="authentication-inner py-4">
  <div class="card" id="cardCenter" >
    <div style="background-image: url('assets/img/logo.png'); background-repeat: no-repeat; position:absolute; background-size:cover;display:block;  opacity: 0.05;
    width: 100%;height: 100%;top: 0;left: 0;right: 0;bottom: 0;"> </div>
      <div class="card-content">



        <div class="card-header d-flex justify-content-between align-items-center mb-3">
          <!-- Logo on the left -->
          <div class="app-brand" style="margin-right: auto; margin-left:7%;">
              <a href="{{url('/')}}" class="app-brand-link gap-2 d-flex align-items-center">
                  <span class="app-brand-logo demo">@include('_partials.macros', ["height"=>20, "withbg"=>'fill:#fff;'])</span>
                  <span class="app-brand-text demo text-heading fw-semibold">{{config('variables.templateName')}}</span>
              </a>
          </div>

          <!-- Register title in the center -->
          <h4 class="card-title mb-0 form-heading" id="cardCenterTitle" style="text-align: center;">Register Shipper</h4>

          <!-- Save changes button on the right -->
          <div style="margin-left: auto; margin-right:7%;x">
              <button type="submit" id="saveButton" class="btn btn-primary">Save changes</button>
          </div>
      </div>

        <div class="card-body">
  <div class="row">
    <div class="col-4">
      <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" name="username" id="username" placeholder="ACME Inc." />
        <label for="username1">USERNAME</label>
      </div>
    </div>
    <div class="col-4">
      <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" name="email" id="email1" placeholder="example.com" required />
        <label for="email1">EMAIL</label>
      </div>
    </div>

    <div class="col-4">
      <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" name="altemail" id="altemail1" placeholder="Address line1" />
        <label for="altemail1">ALT EMAIL</label>
      </div>
    </div>
    <div class="col-4">
      <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" name="phone" id="phone1" placeholder="Address line1" />
        <label for="phone1">CONTACT #</label>
      </div>
    </div>
    <div class="col-4">
      <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" name="password1" id="password" placeholder="********" />
        <label for="password1">PASSWORD</label>
      </div>
    </div>
    <div class="col-4">
      <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" name="fullname" id="fullname1" placeholder="ACME Inc." />
        <label for="fullname1">Company Name</label>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" name="Addss" id="Addss1" placeholder="" />
        <label for="Addss1"> Address 1</label>
      </div>
    </div>
    <div class="col-6">
      <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" name="Addss2" id="Address21" placeholder="" />
        <label for="Address21"> Address 2</label>
      </div>
    </div>

    <div class="col-6">
      <div class="form-floating form-floating-outline mb-3">
          <select class="form-control" name="country" id="country" aria-label="Country" aria-describedby="country" placeholder="">
              <option value="">Select a Country</option>
              <option value="USA">United States</option>
              <option value="Canada">Canada</option>
          </select>
          <label for="country">Country</label>
      </div>
  </div>

  <div class="col-6">
    <div class="form-floating form-floating-outline mb-3">
        <select class="form-control" name="state" id="state" aria-label="State" aria-describedby="state" placeholder="">
            <option value="">Select a State</option>
        </select>
        <label for="state">State</label>
    </div>
</div>

    <div class="col-4">
      <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" name="city" id="city1" placeholder="" />
        <label for="city1"> city</label>
      </div>
    </div>

    {{-- <div class="col-4">
      <div class="form-floating form-floating-outline mb-3">
          <select class="form-control" name="state" id="state1" aria-label="State" aria-describedby="state1" placeholder="">
              <option value="">Select a State</option>
              <!-- The states will be dynamically populated here -->
          </select>
          <label for="state1">State</label>
      </div>
  </div> --}}


    <div class="col-4">
      <div class="form-floating form-floating-outline mb-3">
        <input type="text" class="form-control" name="zip" id="zip1" placeholder="" />
        <label for="zip1"> zip code</label>
      </div>
    </div>


  </div>
</div>
</div>
</div>
  {{-- card end --}}






</div>
</form>



@push('body-scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
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

      const countrySelect = document.getElementById('country');
      const stateSelect = document.getElementById('state');

      countrySelect.addEventListener('change', function () {
          const country = this.value;

          // Clear the state dropdown
          stateSelect.innerHTML = `<option value="">Select a State</option>`;

          if (states[country]) {
              states[country].forEach(state => {
                  const option = document.createElement('option');
                  option.value = state.value;
                  option.textContent = state.name;
                  stateSelect.appendChild(option);
              });
          }
      });
  });
</script>

@endpush
@endsection
