@php
    $containerNav = $containerNav ?? 'container-fluid';
    $navbarDetached = $navbarDetached ?? '';

@endphp

<!-- Navbar -->
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
        <li class="nav-item  mx-3">
            openRequests
        </li>
        <li class="nav-item  mx-5  pe-5">
            {{-- <a href="cert_1st_step"> NEW ACCORD Form</a> --}}
        </li>
    </ul>
    <ul class="navbar-nav flex-row align-items-center">
        <li class="nav-item dropdown-notifications navbar-dropdown dropdown ms-5 me-xl-4 ps-5">
            <a class="nav-link  btn btn-text-secondary px-3 mx-3 rounded-pill btn-icon dropdown-toggle hide-arrow waves-effect waves-light"
                href="{{route('notice')}}" >
                {{-- <span class="badge rounded-pill bg-label-primary text-xs">8 New</span> --}}
                @php


                    $noticesExist = \App\Models\Notice::where('status', 1)->exists();
                    @endphp
                <div class="avatar
                                   @if($noticesExist)
                  avatar-away
                  @endif


             ">
                <i class="mdi mdi-bell-outline mdi-24px"></i>
            </div>
            </a>

        </li>
        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link m-5" id="dropdownButton">
                <div class="avatar avatar-online">
                    @php
                    $user = request()->user();
                @endphp
                <div class="flex-grow-1 pt-2 ">
                    <h6 class="mb-0">{{ $user->name }}</h6>
                    <small class="mb-0">{{ $user->rememberToken}}</small>                  
                    <small class="m-0">{{ $user->role }}</small>
                </div>
                </div>
            </a>
            <div class="dropdown-menu py-0" id="dropdownMenu" >
                <div class="dropdown-menu-header border-bottom py-50">
                  <div class="dropdown-header d-flex align-items-center py-2">
                    <h6 class="mb-0 me-auto">Shortcuts</h6>
                    <a href="javascript:void(0)" class="btn btn-text-secondary rounded-pill btn-icon dropdown-shortcuts-add waves-effect waves-light" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add shortcuts" data-bs-original-title="Add shortcuts"><i class="mdi mdi-grid-large mdi-24px text-heading"></i></a>
                  </div>
                </div>
                <div class="dropdown-shortcuts-list scrollable-container">
                  <div class="row row-bordered overflow-visible g-0">
                    <div class="dropdown-shortcuts-item col">
                      <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                        <i class="mdi mdi-account-outline  mdi-26px text-heading"></i>
                      </span>
                      <a href="" class="stretched-link">Security</a>
                      {{-- <small>Appointments</small> --}}
                    </div>
                    <div class="dropdown-shortcuts-item col">
                      <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                        <i class="mdi mdi-format-align-bottom mdi-26px text-heading"></i>
                      </span>
                      <a href="" class="stretched-link"> Billing</a>
                      {{-- <small>Manage Accounts</small> --}}
                    </div>
                  </div>
                  <div class="row row-bordered overflow-visible g-0">
                    <div class="dropdown-shortcuts-item col">
                      <span class="dropdown-shortcuts-icon rounded-circle mb-2">
                        <i class="mdi mdi-monitor mdi-26px text-heading"></i>
                      </span>
                      <a href="" class="stretched-link"> Subscription Plan</a>
                      @php
                      $email = Session::get('plans');
                  @endphp
                  
                  <small>
                      @if($email)
                          {{ $email }}  <!-- Directly output the email -->
                      @else
                          <!-- Optionally add some message or leave empty -->
                          No planss found.
                      @endif
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
        <!--/ User -->
        <li class="nav-item  mx-3">
            <a class="dropdown-item" href="{{ route('logout') }}">
                <i class='mdi mdi-power me-1 mdi-20px'></i>
                <span class="align-middle">Log Out</span>
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
        <li>
            <a href="{{ route('formlist') }}" class="btn btn-light  ">Motor Carrier Insureds</a>
        </li>

        <li>


        </li>
        <li type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">          <a href="{{ route('agent.regs.add.form') }}" class="btn btn-light  ">Add Insured</a></li>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ route('agent.regs.add.form') }}">Add Truckers </a></li>
          <li>
            <hr class="dropdown-divider">
          </li> <li><a class="dropdown-item" href="{{ route('agent.regs.add.brok.form') }}"> Add Freight/Broker </a></li>
          <li>
            <hr class="dropdown-divider">
          </li>  <li><a class="dropdown-item disabled" href="javascript:void(0);">Add Business</a></li>
         
        </ul>


        <li>
            <a class="btn btn-light  ">Company Information</a>
        </li>  
            <li type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">   <a class="btn btn-light" >Insured List </a></li>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('insur') }}"> Truckers List</a></li>
              <li>
                <hr class="dropdown-divider">
              </li> <li><a class="dropdown-item" href="{{ route('insurf') }}"> Freight/Broker List</a></li>
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
            <a class="btn btn-light" href="{{ route('dashuser') }}">Users</a>
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
        <li>
            <a class="btn btn-light" href="{{ route('profile.truck') }}">Company Information</a>
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
             <a class="btn btn-light" href="{{ route('dashw') }}">Dashboard</a>
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

<!-- / Navbar -->
