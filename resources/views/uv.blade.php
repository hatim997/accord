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
              @foreach($userviewlist->truckers as $item)
              <h5>{{$item->name}}</h5>
              @endforeach
              <span class="badge bg-label-danger rounded-pill">{{$userviewlist->role}}</span>
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
              <span>{{$userviewlist->name}}</span>
            </li>
            <li class="mb-2">
              <span class="h6">Email:</span>
              <span>{{$userviewlist->email}}</span>
            </li>
            <li class="mb-2">
              <span class="h6">Status:</span>
              @if($userviewlist->status == 0)
              <span class="badge bg-label-success rounded-pill">Active</span>
              @else
              <span class="badge bg-label-danger rounded-pill">InActive</span>
              @endif
              
            </li>
            <li class="mb-2">
              <span class="h6">Role:</span>
              <span>{{$userviewlist->role}}</span>
            </li>
            <li class="mb-2">
              <span class="h6">Tax id:</span>
              @foreach($userviewlist->truckers as $item)
              <span>{{$item->tax}}</span>
              @endforeach
            </li>
            <li class="mb-2">
              <span class="h6">Contact:</span>
              @foreach($userviewlist->truckers as $item)
              <span>{{$item->fax}}</span>
              @endforeach
            </li>
            <!-- <li class="mb-2">
              <span class="h6">Languages:</span>
              <span>French</span>
            </li> -->
            <li class="mb-2">
              <span class="h6">State-City-ZipCode:</span>
              @foreach($userviewlist->truckers as $item)
              <span>{{$item->state}}-{{$item->city}}-{{$item->zip}}</span>
              @endforeach
            </li>
          </ul>
          <div class="d-flex justify-content-center">
            <a href="javascript:;" class="btn btn-primary me-4 waves-effect waves-light" data-bs-target="#editUser" data-bs-toggle="modal">Edit</a>
            <a href="javascript:;" class="btn btn-outline-danger suspend-user waves-effect">Suspend</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /User Card -->
    <!-- Plan Card -->
<br>
    <div class=" card mb-6 border border-2 border-primary rounded">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-start">
          <span class="badge bg-label-primary rounded-pill">Standard</span>
          <div class="d-flex justify-content-center">
            <sub class="h5 pricing-currency mb-auto mt-1 text-primary">$</sub>
            <h1 class="mb-0 text-primary">99</h1>
            <sub class="h6 pricing-duration mt-auto mb-3 fw-normal">month</sub>
          </div>
        </div>
        
        <ul class="list-unstyled g-2 my-6">
          <li class="mb-2 d-flex align-items-center"><i class="mdi mdi-check-all mdi-10px text-body me-2"></i><span>10 Users</span></li>
          <li class="mb-2 d-flex align-items-center"><i class="mdi mdi-check-all mdi-10px text-body me-2"></i><span>Up to 10 GB storage</span></li>
          <li class="mb-2 d-flex align-items-center"><i class="mdi mdi-check-all mdi-10px text-body me-2"></i><span>Basic Support</span></li>
        </ul>
        <div class="d-flex justify-content-between align-items-center mb-1">
          <span class="h6 mb-0">Days</span>
          <span class="h6 mb-0">65%</span>
        </div>
        <div class="progress mb-1 rounded" style="height: 6px;">
          <div class="progress-bar rounded" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <small>4 days remaining</small>
        <div class="d-grid w-100 mt-6">
          <button class="btn btn-primary waves-effect waves-light" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">Upgrade Plan</button>
        </div>
      </div>
    </div>
    <!-- /Plan Card -->
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
