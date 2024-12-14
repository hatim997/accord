@php
    $containerNav = $containerNav ?? 'container-fluid';
    $navbarDetached = $navbarDetached ?? '';
@endphp
<style>
  .mdi-20px.mdi-set, .mdi-20px.mdi:before {
  font-size: 20px;
  color: red;
  font-weight: bold;
  border-radius: 25px;
}


/* Modal Dialog */
.modal-dialog {
  max-width: 100%;
}

.section-pricing {
  padding: 20px;
  background: #f9f9f9;
}

.pricing-bg {
  background-color: #f2f2f7;
  padding: 30px;
  border-radius: 8px;
}

.section-title {
  font-size: 1.8rem;
  color: #333;
}

.section-subtitle {
  font-size: 1rem;
  color: #666;
  margin-top: 10px;
}

/* Toggle Button */
.toggle-wrapper {
  display: inline-flex;
  align-items: center;
  cursor: pointer;
  margin: 0 10px;
}

.toggle-input {
  display: none;
}

.toggle-slider {
  width: 60px;
  height: 30px;
  background: #ddd;
  border-radius: 30px;
  position: relative;
  transition: background 0.3s;
}

.toggle-slider::before {
  content: "";
  position: absolute;
  width: 26px;
  height: 26px;
  border-radius: 50%;
  background: #4a3aff;
  top: 2px;
  left: 2px;
  transition: transform 0.3s;
}

.toggle-input:checked + .toggle-slider {
  background: #4a3aff;
}

.toggle-input:checked + .toggle-slider::before {
  transform: translateX(30px);
}

/* Pricing Item */
/* Increase Modal Width */
.modal-dialog.modal-lg {
  display: flex;
  align-items: center;
  justify-content: center;
}

/* Reduce padding around modal content */
.modal-content {
  padding: 15px; /* Reduced padding */
  gap: 15px;
}

/* Adjust Modal Header and Footer */
.modal-header {
  padding: 10px 15px; /* Reduced padding */
  border: none;
}

/* Section Pricing Styling with Less Padding */
.section-pricing {
  padding: 15px;
}

.section-title {
  font-size: 1.8rem;
  color: #333;
}

.section-subtitle {
  font-size: 1rem;
  color: #666;
}

/* Pricing List with Reduced Padding */
.pricing-list {
  display: grid;
  grid-template-columns: 1fr; /* Stacks all items vertically by default */
  gap: 15px; /* Smaller gap between items */
}

@media (min-width: 768px) {
  /* Medium screens: two items per row */
  .pricing-list {
    grid-template-columns: 1fr 1fr;
  }
}

@media (min-width: 992px) {
  /* Large screens: three items per row */
  .pricing-list {
    grid-template-columns: 1fr 1fr 1fr;
  }
}

/* Pricing Item Styling */
.pricing-item {
  border: 1px solid #ddd;
  background: #fff;
  border-radius: 8px;
  padding: 15px; /* Reduced padding */
  text-align: center;
  transition: box-shadow 0.3s;
}

.pricing-item:hover {
  box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
}

.pricing-title {
  font-size: 1.2rem;
  color: #333;
}

.pricing-amount {
  font-size: 2rem;
  font-weight: bold;
  color: #4a3aff;
}

.pricing-description {
  font-size: 0.9rem;
  color: #666;
}

.pricing-features {
  margin: 0;
  padding: 0;
  list-style: none;
}

.feature-item {
  font-size: 0.9rem;
  color: #555;
  display: flex;
  align-items: center;
  gap: 10px;
}

.feature-item i {
  color: #4a3aff;
}

/* Button Styling */
.btn-primary {
  background-color: #4a3aff;
  border: none;
}

.btn-primary:hover {
  background-color: #3a2be0;
}


</style>
@if (isset($navbarDetached) && $navbarDetached == 'navbar-detached')
    <nav class="layout-navbar {{ $containerNav }} navbar navbar-expand-xl {{ $navbarDetached }} align-items-center bg-navbar-theme"
        id="layout-navbar">
@endif
@if (isset($navbarDetached) && $navbarDetached == '')
    <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
        <div class="{{ $containerNav }}">
@endif

<!--  Brand demo (display only for navbar-full and hide on below xl) -->
@if (isset($navbarFull))
    <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
        <a href="{{ url('/') }}" class="app-brand-link gap-2">
            <span class="app-brand-logo demo">
                @include('_partials.macros', ['height' => 40])
            </span>
            <span class="app-brand-text demo menu-text fw-semibold ms-1">{{ config('variables.templateName') }}</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
        </a>
    </div>
@endif
<!-- ! Not required for layout-without-menu -->
@if (!isset($navbarHideToggle))
    <div
        class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0{{ isset($menuHorizontal) ? ' d-xl-none ' : '' }} {{ isset($contentNavbar) ? ' d-xl-none ' : '' }}">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="mdi mdi-menu mdi-24px"></i>
        </a>
    </div>
@endif

<div class="navbar-nav-right d-flex align-items-center  justify-content-between" id="navbar-collapse">
    <div class="app-brand-logo  ">
        @include('_partials.macros', ['height' => 20])
    </div>
    <ul class="navbar-nav flex-row align-items-center  ">

        <!-- Place this tag where you want the button to render. -->
        <li class="nav-item  mx-3">
           <a href="{{ route('insur') }}"> Client</a>
        </li>
        <li class="nav-item  mx-3">
            Pending Approvals
        </li>
        @php
            $userId = auth()->user()->id;
            $noticesExist = \App\Models\Openrequest::where('status', 1)
                            ->where('to', $userId)
                            ->orderBy('id', 'desc')
                            ->get();

            @endphp
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
          <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
            Open Requests
            <!-- Show the dot if there are open requests -->
            @if(!$noticesExist->isEmpty())
              <span class="dot-indicator"></span> <!-- This will be the notification dot -->
            @endif
          </a>
          <ul class="dropdown-menu dropdown-menu-end mt-3 py-2">


            @if ($noticesExist->isEmpty())
              <li>No notices found.</li>
            @else
              @foreach ($noticesExist as $request)
                <li>
                  <a class="dropdown-item mark-read" href="javascript:void(0);" data-id="{{ $request->id }}">
                    <i class="mdi mdi-alert-outline me-1 mdi-20px"></i>
                    <span class="align-middle">Notice: {{ $request->titel}}</span>
                  </a>
                </li>
                <li>
                  <div class="dropdown-divider my-1"></div>
                </li>
              @endforeach
            @endif
          </ul>
        </li>

        <li class="nav-item  mx-5  pe-5">
            {{-- <a href="cert_1st_step"> NEW ACCORD Form</a> --}}
        </li>
    </ul>
    <ul class="navbar-nav flex-row align-items-center">
      @php
      // Check if there are unread notifications for the logged-in user or for user_id = 1 (admin)
      $unreadNotices = \App\Models\Notice::where('status', 0)
          ->where(function ($query) {
              $query->where('to', Auth::user()->id)
                    ->orWhere('to', 1); // Including admin (user_id = 1)
          })
          ->exists();
  @endphp
<style>
  .icon-button {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    color: #64748B !important;
    /* background: #dddddd; */
    border: none;
    outline: none;
    border-radius: 50%;
  }

  .icon-button:hover {
    cursor: pointer;
  }

  .icon-button:active {
    /* background: #cccccc; */
  }

  .icon-button__badge {
    position: absolute;
    top: 10px;
    border: 1px solid #fff;
    right: 11px;
    width: 12px;
    height: 12px;
    background: #F43F5E;
    color: #ffffff;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    font-size: 12px;
    font-weight: bold;
  }
</style>

<li class="nav-item dropdown-notifications navbar-dropdown dropdown ms-5 me-xl-4 ps-5">
  <a
    class="nav-link icon-button dropdown-toggle hide-arrow waves-effect waves-light"
    href="{{ route('notice') }}"
  >
    <!-- Notification Icon -->
    <i class="mdi mdi-bell mdi-24px"></i>

    <!-- Badge (Displayed only if there are unread notices) -->
    @if($unreadNotices)
      <span class="icon-button__badge"></span>
    @endif
  </a>
</li>




        <!-- User -->
        @php
       $user = request()->user();
        @endphp


        <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link m-5" id="dropdownButton">
                <div class="avatar">
                    @php
                    $user = request()->user();
                  @endphp
                <div class="flex-grow-1">
                  <small class="m-0" style="color: #EB6D40 !important; font-weight:bold;">{{ $user->role }}</small>
                  <small class="mb-0" style="color: #727272 !important; font-weight:bold;">{{ $user->rememberToken}}</small>
                    <h6 class="mb-0" style="color: #000 !important; font-weight:bold;">{{ $user->name }}</h6>



                </div>
                </div>
            </a>
            @if ($user->role == "agent" || $user->role == "truck_driver" || $user->role == "shipper" || $user->role == "freight_driver" )
            <div class="dropdown-menu py-0" id="dropdownMenu" >
                <div class="dropdown-menu-header border-bottom py-50">
                  <div class="dropdown-header d-flex align-items-center py-2">
                    <h6 class="mb-0 me-auto">Shortcuts</h6>
                     {{-- <a href="https://insur.dboss.pk/wp/pricing/" class="btn btn-primary"> Upgrade </a> --}}
                     <a href="#" class="btn btn-primary" data-bs-toggle="modal" id="Upgrade" data-bs-target="#upgradeModal">Upgrade</a>
                  </div>
                </div>
                <div class="dropdown-shortcuts-list scrollable-container">
                  <div class="row row-bordered overflow-visible g-0 mt-3">
                    <div class="dropdown-shortcuts-item col ">
                      <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                        <i class="mdi mdi-account-outline  mdi-26px text-heading"></i>
                      </span>
                      @if ($user->role == "agent")
                      <a href="{{ route('profile.agency')}}" class="stretched-link">User info </a>
                      @elseif ($user->role == "truck_driver")
                      <a href="{{ route('profile.truck')}}" class="stretched-link">User info </a>
                      @elseif ($user->role == "shipper")
                      <a href="{{ route('profile.shipper')}}" class="stretched-link">User info </a>
                      @elseif ($user->role == "freight_driver")
                      <a href="{{ route('profile.freight')}}" class="stretched-link">User info </a>
                      @else
                      <a href="" class="stretched-link">User info </a>
                      @endif
                    </div>

                    <div class="dropdown-shortcuts-item col">
                      <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                        <i class="mdi mdi-format-align-bottom mdi-26px text-heading"></i>
                      </span>


  <a href="{{ route('billing.agency')}}" class="stretched-link"> Billing</a>




                    </div>
                  </div>
                  <div class="row row-bordered overflow-visible g-0 mt-3">
                    <div class="dropdown-shortcuts-item col">
                      <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                        <i class="mdi mdi-monitor mdi-26px text-heading"></i>
                      </span>


            <a href="{{ route('plan.agency', ['id' => Auth::user()->id]) }}" class="stretched-link"> Subscription Plan</a>



                  </small>
                    </div>
                    <div class="dropdown-shortcuts-item col">
                      <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                        <i class="mdi mdi-clipboard-account mdi-26px text-heading"></i>
                      </span>
                      <a href="" class="stretched-link">Role Management</a>
                      <small>Permission</small>
                    </div>
                  </div>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px; height: 412px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 287px;"></div></div></div>
              </div>

        </li>


@endif



        <!--/ User -->
        <li class="nav-item  mx-3">
            <a class="dropdown-item" href="{{ route('logout') }}">
                <i class='mdi mdi-power me-1 mdi-20px'></i>
                <span class="align-middle " style="font-weight: bold" >Log Out</span>
            </a>
        </li>
    </ul>
</div>

@if (!isset($navbarDetached))
    </div>
@endif
</nav>

<div class="container-fluid bg-black" style="
margin-top: 1.7rem;
">
    <!-- Search -->
    <ul class="navbar-nav   flex-row align-items-center ms-1" style="    justify-content: center;
}">
        @if ($user->role == "agent")
        <li>
            <a href="{{ route('dash') }}" class="btn btn-light  ">Dashboard</a>
        </li>
        <li type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">          <a href="{{ route('agent.regs.add.form') }}" class="btn btn-light  ">Add Insured</a></li>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ route('agent.regs.add.form') }}">Add Carrier </a></li>
          <li>
            <hr class="dropdown-divider">
          </li> <li><a class="dropdown-item" href="{{ route('agent.regs.add.brok.form') }}"> Add Broker </a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item disabled" href="javascript:void(0);">Add Business</a></li>

        </ul>
            <li type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">   <a class="btn btn-light" >Insured List </a></li>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('insur') }}"> Carrier List</a></li>
              <li>
                <hr class="dropdown-divider">
              </li> <li><a class="dropdown-item" href="{{ route('insurf') }}"> Broker List</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>  <li><a class="dropdown-item disabled" href="javascript:void(0);">Add Business</a></li>
            </ul>


          </li>

        @elseif ($user->role == "admin")
        <li>
            <a class="btn btn-light" href="{{ route('dashs') }}">Dashboard</a>
         </li>
        <li>
            <a class="btn btn-light" href="{{ route('sub') }}" >Subscription Plans</a>
        </li>
        <li>
            {{-- <a class="btn btn-light" href="{{ route('dashuser') }}">Users</a> --}}
            <a class="btn btn-light" href="{{ route('user.list') }}">Users</a>
        </li>
        <li>
            <a class="btn btn-light" href="{{ route('dash_cert') }}">Certificate</a>
        </li>
        <li>
          <a class="btn btn-light" href="{{ route('a2t') }}">Assign Driver To Agent</a>
        </li>
        <li>
          <a class="btn btn-light" href="{{ route('shipper_cert') }}"> Shipper Certificate</a>
        </li>
        <li>
            <a class="btn btn-light" href="{{ route('getagency') }}">Agency</a>
          </li>
          {{-- <li type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">   <a class="btn btn-light" >user DUMMY </a></li> --}}
          <ul class="dropdown-menu">
            {{--<li><a class="dropdown-item" href="{{ route('user.view') }}"> user profile DUMMY</a></li>--}}
            {{-- <li>
              <hr class="dropdown-divider">
            </li> --}}
            {{-- <li><a class="dropdown-item" href="{{ route('user.list') }}">  user lIST DUMMY</a></li> --}}
            </ul>


        </li>

        @elseif ($user->role == "truck_driver")

       <li><a class="btn btn-light" href="{{ route('dashw') }}">Dashboard</a>
        </li>
         @if($user->status == "1")
        <li>
            <a class="btn btn-light" href="{{ route('list.ship') }}">Shipper list</a>
        </li>
        <li>
            <a class="btn btn-light" href="{{ route('add.ship') }}">Add shipper</a>
        </li>
        <li>
            <a class="btn btn-light" href="{{ route('add.agnt') }}">Add Agency</a>
        </li>
        <li>
            <a class="btn btn-light" href="{{ route('truck_cert') }}">Print Certificates</a>
        </li>
        <li>
          <a class="btn btn-light" href="{{ route('add.driver') }}">Add Carrier</a>
        </li>
        <li>
          <a href="{{ route('add.broker') }}" class="btn btn-light  ">Add Broker</a>
        </li>
        @endif
        <li>
          <a class="btn btn-light" href="{{ route('lists.truck') }}">List Carrier</a>

      </li>


        @elseif ($user->role == "shipper")
        <li>
            <a class="btn btn-light" href="{{ route('sdash') }}">Dashboard</a>
        </li>
        <li>
            <a class="btn btn-light" href="{{ route('agent.regs.add.brok.forms') }}">Add Broker</a>
        </li>
        <li>
            <a class="btn btn-light" href="{{ route('add.drivers') }}">Add Carrier</a>
        </li>
        <li>
          <a class="btn btn-light" href="{{ route('upload.certificate') }}">Upload Certificates</a>
        </li>
        <li>
          <a class="btn btn-light" href="{{ route('list.certificate') }}">Certificate List</a>
        </li>
        <li>
            <a class="btn btn-light" href="{{ route('shipper.fromdrop2') }}">Shipper Limits</a>
          </li>

        @elseif ($user->role == "freight_driver")

        <li>
             <a class="btn btn-light" href="{{ route('fportals') }}">Dashboard</a>
         </li>
            @if($user->status == "1")
              <li>
                <a class="btn btn-light" href="{{ route('add.driver') }}">Add Carrier</a>
              </li>
              <li>
                <a class="btn btn-light" href="{{ route('add.shipper') }}">Add Shipper</a>
              </li>
              <li>
                <a class="btn btn-light" href="{{ route('truck_cert') }}">Print Certificates</a>
            </li>
            @endif
        @endif

    </ul>
    <!-- /Search -->
</div>
@php
$data = App\Models\Subscription_plan::where('id', '!=', 1)->get();

    $userId = auth()->user()->id;
    $subscriptionPlans = App\Models\Subscription_plan::all(); // Assuming this retrieves all subscription plans
@endphp
@php

    $userRole = auth()->user()->role;
@endphp

<!-- Upgrade Modal -->
<div class="modal fade" id="upgradeModal" tabindex="-1" aria-labelledby="upgradeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="upgradeModalLabel">Upgrade Pricing</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <section class="section-pricing">
          <div class="pricing-bg">
            <div class="container-default">
              <div class="section-header text-center mb-4">
                <h2 class="section-title">Choose the Right Pricing Plan</h2>
                <p class="section-subtitle">Find the plan that best suits your needs</p>
              </div>

              <div class="pricing-list grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($data as $item)
                    <!-- Show plan only if it's available for the current user's role -->
                    @if(in_array($userRole, explode(',', $item->role)))
                        <div class="pricing-item p-4 rounded shadow">
                          <div class="pricing-content text-center">
                            <h3 class="pricing-title">{{ $item->name }}</h3>
                            <p class="pricing-amount">${{ $item->price }} {{ $item->duration }}</p>
                            <p class="pricing-description">{{ $item->exdetail }}</p>
                            <hr class="my-4">
                            <ul class="pricing-features list-unstyled">
                              @php
                                $features = explode(",", $item->description);
                              @endphp
                              @foreach($features as $feature)
                                <li class="feature-item">
                                  <i class="fa-solid fa-star"></i> {{ $feature }}
                                </li>
                              @endforeach
                            </ul>
                            <form method="POST" action="{{ route('add_to_cart') }}">
                              @csrf
                              <input type="hidden" name="sub_id" value="{{ $item->id }}">
                              <input type="hidden" name="upgrade_id" value="{{ $item->upgrade_id }}"> <!-- Pass the upgrade ID here -->
                              <button type="submit" class="btn btn-success w-100 mt-3">Purchase Now</button>
                            </form>
                          </div>
                        </div>
                    @endif
                @endforeach
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>


<!-- / Navbar -->
@push('body-scripts')
<script>
$(document).ready(function() {
  $('#Upgrade').click(function() {
      $('#upgradeModal').css('opacity', '1');
  });
});
</script>
@endpush
