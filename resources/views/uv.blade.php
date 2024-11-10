@extends('layouts/contentNavbarLayout')
@section('title', ' Vertical Layouts - Forms')
@section('content')

    @php
        $isMenu = false;
        $navbarHideToggle = false;
    @endphp













<div class="row">
<div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
    <!-- User Card -->
    <div class="card mb-6">
      <div class="card-body pt-12">
        <div class="user-avatar-section">
          <div class=" d-flex align-items-center flex-column">
            <img class="img-fluid rounded mb-4" src="{{ asset('assets/img/logo.png') }}" height="120" width="120" alt="User avatar">
            <div class="user-info text-center">

              @foreach($userviewlist as $item)
                  @if($item->agencies && $item->agencies->isNotEmpty())
                      <h5>{{ $item->agencies[0]->name }}</h5>
                  @endif
                  @if($item->truckers && $item->truckers->isNotEmpty())
                      <h5>{{ $item->truckers[0]->name }}</h5>
                  @endif
                  @if($item->shippers && $item->shippers->isNotEmpty())
                      <h5>{{ $item->shippers[0]->name }}</h5>
                  @endif

              @endforeach

              <span class="badge bg-label-danger rounded-pill">
                @if ($item->role === 'agent')
                Agency
                @elseif($item->role === 'truck_driver')
                    Carrier
                @elseif($item->role === 'shipper')
                    Shipper
                @elseif($item->role === 'freight_driver')
                    Broker
                @else
                    {{ $item->role }} <!-- This will show the role as is for any other role -->
                @endif
              </span>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-around  flex-wrap my-6 gap-0" style="margin:30px 0 ">
          <div class="d-flex align-items-center me-5 gap-4">
            <div class="avatar">
              <div class="avatar-initial bg-label-primary rounded">
                <i class=" mdi mdi-check mdi-24px"></i>
              </div>
            </div>
            <div>
              <h5 class="mb-0">1.23k</h5>
              <span>Task Done</span>
            </div>
          </div>
          <div class="d-flex align-items-center gap-4">
            <div class="avatar">
              <div class="avatar-initial bg-label-primary rounded">
                <i class="mdi mdi-file-document mdi-24px"></i>
              </div>
            </div>
            <div>
              <h5 class="mb-0">568</h5>
              <span>Project Done</span>
            </div>
          </div>
        </div>
        <h5 class="pb-4 border-bottom mb-4">Details</h5>
        <div class="info-container">
          <ul class="list-unstyled mb-6">
            <li class="mb-2">
              <span class="h6">Username:</span>
              <span>{{ $item->name }}</span>
            </li>
            <li class="mb-2">
              <span class="h6">Email:</span>
              <span>{{ $item->email }}</span>
            </li>
            <li class="mb-2">
              <span class="h6">Status:</span>
              @if($item->status == 1)
              <span class="badge bg-label-success rounded-pill">Active</span>
              @else
              <span class="badge bg-label-danger rounded-pill">InActive</span>
              @endif

            </li>
            <li class="mb-2">
              <span class="h6">Role:</span>
              <span class="user-role">
                @if ($item->role === 'agent')
                    Agency
                @elseif($item->role === 'truck_driver')
                    Carrier
                @elseif($item->role === 'shipper')
                    Shipper
                @elseif($item->role === 'freight_driver')
                    Broker
                @else
                    {{ $item->role }} <!-- This will show the role as is for any other role -->
                @endif
            </span>
            </li>
            <li class="mb-2">
              <span class="h6">Tax id:</span>
              <span>dummy</span>
            </li>
            <li class="mb-2">
              <span class="h6">Contact:</span>
              @if ($item->role === 'agent')

              <span>{{ $item->agencies[0]->cellphone }}</span>
              @endif

              @if ($item->role === 'truck_driver')

              <span>{{ $item->truckers[0]->cellphone }}</span>
              @endif
            </li>
            <!-- <li class="mb-2">
              <span class="h6">Languages:</span>
              <span>French</span>
            </li> -->
            <li class="mb-2">
              <span class="h6">State-City-ZipCode:</span>
              @if($item->role === 'agent')
                <span>{{$item->agencies[0]->state}}-{{$item->agencies[0]->city}}-{{$item->agencies[0]->zip}}</span>
              @endif
              @if($item->role === 'truck_driver')
                <span>{{$item->truckers[0]->state}}-{{$item->truckers[0]->city}}-{{$item->truckers[0]->zip}}</span>
              @endif
              @if($item->role === 'shipper')
                <span>{{$item->shippers[0]->state}}-{{$item->shippers[0]->city}}-{{$item->shippers[0]->zip}}</span>
              @endif
              @if($item->role === 'freight_driver' && $item->freights && $item->freights->isNotEmpty())
              <span>{{ $item->freights[0]->state }} - {{ $item->freights[0]->city }} - {{ $item->freights[0]->zip }}</span>
          @endif

            </li>
          </ul>
          <div class="d-flex justify-content-center">
            <a href="{{route('edit_user', $item->id)}}" class="btn btn-primary me-4 waves-effect waves-light" >Edit</a>
            <a href="javascript:;" class="btn btn-outline-danger suspend-user waves-effect">Suspend</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /User Card -->
    <!-- Plan Card -->
<br>

@if ($subscription && $subscription->subscriptionPlan)
<div class="card mb-6 border border-2 border-primary rounded">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-start">
            <span class="badge bg-label-primary rounded-pill">{{ $subscription->subscriptionPlan->name }}</span>
            <div class="d-flex justify-content-center">
                <sub class="h5 pricing-currency mb-auto mt-1 text-primary">$</sub>
                <h1 class="mb-0 text-primary">{{ $subscription->subscriptionPlan->price }}</h1>
                <sub class="h6 pricing-duration mt-auto mb-3 fw-normal">month</sub>
            </div>
        </div>

        <ul class="list-unstyled g-2 my-6">
            <li class="mb-2 d-flex align-items-center"><i class="mdi mdi-check-all mdi-10px text-body me-2"></i><span><strong> Duration</strong>: {{ $subscription->subscriptionPlan->duration }}</span></li>
            <li class="mb-2 d-flex align-items-center"><i class="mdi mdi-check-all mdi-10px text-body me-2"></i><span><strong>Description</strong>: {{ $subscription->subscriptionPlan->description }}</span></li>
            <li class="mb-2 d-flex align-items-center"><i class="mdi mdi-check-all mdi-10px text-body me-2"></i><span><strong>Extra Detail</strong>: {{ $subscription->subscriptionPlan->exdetail }}</span></li>
        </ul>

        <div class="d-flex justify-content-between align-items-center mb-1">
            <span class="h6 mb-0">Days</span>
            <span class="h6 mb-0">{{ round($progressPercentage) }}%</span>
        </div>

        <div class="progress mb-1 rounded" style="height: 6px;">
            <div class="progress-bar rounded" role="progressbar" style="width: {{ round($progressPercentage) }}%;" aria-valuenow="{{ round($progressPercentage) }}" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <small>{{ $daysRemaining }} days remaining</small>
        <div class="d-grid w-100 mt-6">
            <button class="btn btn-primary waves-effect waves-light" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">Upgrade Plan</button>
        </div>
    </div>
</div>
@else
<p class="text-danger">No subscription plan found for this user.</p>
@endif


  </div>

<div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">

    <div class="card mb-6">
        <!-- Notifications -->
        <h5 class="card-header border-bottom mb-0">Notifications</h5>
        <div class="card-body py-4">
          <span class="text-heading fw-medium">Change to notification settings, the user will get the update</span>
        </div>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th class="text-nowrap">Type</th>
                <th class="text-nowrap text-center">Email</th>
                <th class="text-nowrap text-center">Browser</th>
                <th class="text-nowrap text-center">App</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-nowrap text-heading">New for you</td>
                <td>
                  <div class="form-check mb-0 d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" id="defaultCheck1" checked="">
                  </div>
                </td>
                <td>
                  <div class="form-check mb-0 d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" id="defaultCheck2" checked="">
                  </div>
                </td>
                <td>
                  <div class="form-check mb-0 d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" id="defaultCheck3" checked="">
                  </div>
                </td>
              </tr>
              <tr>
                <td class="text-nowrap text-heading">Account activity</td>
                <td>
                  <div class="form-check mb-0 d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" id="defaultCheck4" checked="">
                  </div>
                </td>
                <td>
                  <div class="form-check mb-0 d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" id="defaultCheck5" checked="">
                  </div>
                </td>
                <td>
                  <div class="form-check mb-0 d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" id="defaultCheck6" checked="">
                  </div>
                </td>
              </tr>
              <tr>
                <td class="text-nowrap text-heading">A new browser used to sign in</td>
                <td>
                  <div class="form-check mb-0 d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" id="defaultCheck7" checked="">
                  </div>
                </td>
                <td>
                  <div class="form-check mb-0 d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" id="defaultCheck8" checked="">
                  </div>
                </td>
                <td>
                  <div class="form-check mb-0 d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" id="defaultCheck9">
                  </div>
                </td>
              </tr>
              <tr>
                <td class="text-nowrap text-heading">A new device is linked</td>
                <td>
                  <div class="form-check mb-0 d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" id="defaultCheck10" checked="">
                  </div>
                </td>
                <td>
                  <div class="form-check mb-0 d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" id="defaultCheck11">
                  </div>
                </td>
                <td>
                  <div class="form-check mb-0 d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" id="defaultCheck12">
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="card-body">
          <button type="submit" class="btn btn-primary me-3 waves-effect waves-light">Save changes</button>
          <button type="reset" class="btn btn-outline-secondary waves-effect">Discard</button>
        </div>
        <!-- /Notifications -->
      </div>
</div></div>








@endsection
