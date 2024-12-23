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
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Broker Add By Shipper</h4>

<form method="POST" action="{{ route('store.brokers') }}" enctype="multipart/form-data">
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

  <!-- Basic Layout -->
  <div class="position-relative">
    <div class="container authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner py-4">
        <div class="card" id="cardCenter">
          <div class="card-content">
            <!-- Basic Layout -->
            <div class="card-header d-flex justify-content-between align-items-center mb-3">
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
                  <div class="row p-2  bg-white">

                  </div>
                  <div class="row p-3 setup-content " id="step-1">
                    <div class="col-xs-12">
                      <div class="row px-5">
                        <div class="col-md-6">
                          <div class="form-group p-3">
                            <label for="name">Company Name:</label>
                            <input type="text" name="name" class="form-control" id="name" required="">
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-group p-3">
                            <label for="mc_number">Federal Registration No. (MC Number)</label>
                            <input type="number" oninput="this.value=this.value.slice(0,8)" maxlength="8"
                              name="mc_number" class="form-control" id="mc_number" required="" />
                            @error('mc_number') <span class="error">{{ $message }}</span> @enderror
                          </div>
                          <div class="form-group p-3">
                            <label for="tax">US Tax ID / Canadian Business Number</label>
                            <input type="text" name="tax" class="form-control" id="tax" required=""/>
                            @error('tax') <span class="error">{{ $message }}</span> @enderror

                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group p-3">
                            <label for="scac">SCAC Code</label>
                            <input required="" type="text" name="scac" maxlength="4" class="form-control" id="scac">
                            @error('scac') <span class="error">{{ $message }}</span> @enderror

                          </div>
                          <div class="form-group p-3">
                            <label for="usdot">US DOT #</label>
                            <input required="" type="number" name="usdot" oninput="this.value=this.value.slice(0,8)" maxlength="8"
                              class="form-control" id="usdot" />
                            @error('usdot') <span class="error">{{ $message }}</span> @enderror

                          </div>

                          <div class="form-group p-3">
                            <label for="websit">Company Website address:</label>
                            <input required="" type="text" name="websit" class="form-control" id="websit" />
                            @error('websit') <span class="error">{{ $message }}</span> @enderror

                          </div>

                        </div>
                      </div>

                    </div>
                  </div>
                  <div class="row p-2 setup-content " id="step-2">
                    <div class="col-xs-12">
                      <div class="row px-5">

                            <div class="col-md-6">
                              <div class="form-group py-3">
                                <label for="prefix">Prefix</label>
                                <select class="form-select" id="prefix" name="prefix"
                                  aria-label="Default select example">
                                  <option selected>Open this select menu</option>
                                  <option value="1">Mr</option>
                                  <option value="2">Mrs</option>
                                  <option value="3">Ms</option>
                                </select>

                              </div>
                              <div class="form-group py-3">
                                <label for="mname">Middle Name:</label>
                                <input required="" type="text" name="mname" class="form-control" id="mname" />
                                @error('mname') <span class="error">{{ $message }}</span> @enderror
                              </div>
                              <div class="form-group py-3">
                                <label for="suffix">Suffix</label>
                                <input required="" type="text" name="suffix" class="form-control" id="suffix" />
                                @error('suffix') <span class="error">{{ $message }}</span> @enderror
                              </div>
                              <div class="form-group py-3">
                                <label for="salutation">Salutation</label>
                                <input required="" type="text" name="salutation" class="form-control" id="salutation" />
                                @error('salutation') <span class="error">{{ $message }}</span> @enderror
                              </div>

                              <div class="form-group py-3">
                                <label for="email">Email:</label>
                                <input required="" type="email" name="email" class="form-control" id="email" />
                                @error('email') <span class="error">{{ $message }}</span> @enderror
                              </div>

                            </div>
                            <div class="col-md-6">
                              <div class="form-group py-3">
                                <label for="fname">First Name:</label>
                                <input required="" type="text" name="fname" class="form-control" id="fname" />
                                @error('fname') <span class="error">{{ $message }}</span> @enderror
                              </div>

                              <div class="form-group py-3">
                                <label for="lname">Last Name:</label>
                                <input required="" type="text" name="lname" class="form-control" id="lname" />
                                @error('lname') <span class="error">{{ $message }}</span> @enderror
                              </div>

                              <div class="form-group py-3">
                                <label for="title">Title:</label>
                                <input required="" type="text" name="title" class="form-control" id="title" />
                                @error('title') <span class="error">{{ $message }}</span> @enderror
                              </div>

                              <div class="form-group py-3">
                                <label for="cellphone">Phone No:</label>
                                <input required="" type="tel" name="cellphone" class="form-control" id="cellphone" />
                                @error('cellphone') <span class="error">{{ $message }}</span> @enderror
                              </div>
                              <div class="form-group py-3">
                                <label for="fax">Fax No:</label>
                                <input required="" type="tel" name="fax" class="form-control" id="fax" />
                                @error('fax') <span class="error">{{ $message }}</span> @enderror
                              </div>

                          </div>

                            <div class="col-md-12">
                              <div class="form-group py-3">
                                <label for="address">Address:</label>
                                <input required="" type="text" name="address" class="form-control" id="address" />
                                @error('address') <span class="error">{{ $message }}</span> @enderror
                              </div>
                              <div class="form-group py-3">
                                <label for="address2">Address 2</label>
                                <input required="" type="text" name="address2" class="form-control" id="address2" />
                                @error('address2') <span class="error">{{ $message }}</span> @enderror
                              </div>

                            </div>
                            <div class="col-md-6">
                              <div class="form-group py-3">
                                <label for="zip">Zip Code:</label>
                                <input required="" type="number" oninput="this.value=this.value.slice(0,5)" maxlength="5" name="zip"
                                  class="form-control" id="zip" />
                                @error('zip') <span class="error">{{ $message }}</span> @enderror
                              </div>
                              <div class="form-group py-3">
                                <label for="city">City:</label>
                                <input required="" type="text" name="city" class="form-control" id="city" />
                                @error('city') <span class="error">{{ $message }}</span> @enderror
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group py-3">
                                <label for="state">State:</label>
                                <input required="" type="text" name="state" class="form-control" id="state" />
                                @error('state') <span class="error">{{ $message }}</span> @enderror
                              </div>
                              <div class="form-group py-3">
                                <label for="country">Country:</label>
                                <input required="" type="text" name="country" class="form-control" id="country" />
                                @error('country') <span class="error">{{ $message }}</span> @enderror
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <h4>Insurance Agency Add </h4>
                      <div class="row p-2 setup-content " id="step-2">
                        <div class="col-xs-12">
                          <div class="row px-5">
                            <select id="" class="selecter" name="agent_id">
                              <option value="">-Select-</option>
                              @foreach ($agent as $ip)
                                <option
                                  value="{{ $ip->user_id}}">
                                  {{ $ip->name }}
                              </option>
                              @endforeach
                            </select>


                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row setup-content " id="step-3">
                    <div class="col-xs-12">
                      <div class="row px-5">
                        <div class="col-md-6">

                          {{-- <div class="form-group py-3">
                            <label for="password">Upload COI</label>
                            <input type="file" class="form-control" name="imagePath" id="imagePath" placeholder="Choose License" />
                          </div> --}}



                        </div>
                        {{-- <div class="col-md-6">
                          <div class="form-group py-3">
                            <label for="password">PASSWORD</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="********" />
                          </div>
                        </div> --}}

                      </div>
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
<script type="text/javascript">
  $(document).ready(function() {
    $('.selecter').select2();
  });
  </script>
@endpush




@endsection
