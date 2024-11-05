@extends('layouts/contentNavbarLayout')
@section('title', ' Vertical Layouts - Forms')
@section('content')
    <style></style>
    @php
        $isMenu = false;
        $navbarHideToggle = false;
    @endphp

    <div class="row g-6 mb-6 " style="padding-bottom: 20px">
        <div class="col-sm-6 col-xl-3">
            <div class="card" id="recentSubsUsersCard">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="me-1">
                            <p class="text-heading mb-1">Recently Users</p>
                            <div class="d-flex align-items-center">
                                <h4 class="mb-1 me-2">{{ $currentWeekUsers->count() }}</h4>
                                <p class="text-success mb-1">({{ $percentageChange }}%)</p>
                            </div>
                            <small class="mb-0">Total Users</small>
                        </div>
                        <div class="avatar">
                            <div class="avatar-initial bg-label-primary rounded-3">
                                <div class="mdi mdi-account ri-26px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card" data-bs-toggle="modal" data-bs-target="#verifiedUsersModal">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="me-1">
                            <p class="text-heading mb-1">Verified Users</p>
                            <div class="d-flex align-items-center">
                                <h4 class="mb-1 me-1">{{ $currentMonthUsers->count() }}</h4>
                                <p class="text-success mb-1">({{ $monthPercentageChange }}%)</p>
                            </div>
                            <small class="mb-0">Recent analytics</small>
                        </div>
                        <div class="avatar">
                            <div class="avatar-initial bg-label-success rounded-3">
                                <div class="mdi mdi-account ri-26px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card" data-bs-toggle="modal" data-bs-target="#dataModal">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="me-1">
                            <p class="text-heading mb-1">Paid Users</p>
                            <div class="d-flex align-items-center">
                                <h4 class="mb-1 me-1">{{ count($Paidresult) }}</h4>
                                <p class="text-danger mb-1">({{ $currentMonthPercentage }}%)</p>
                            </div>
                            <small class="mb-0">Recent analytics</small>
                        </div>
                        <div class="avatar">
                            <div class="avatar-initial bg-label-danger rounded-3">
                                <div class="mdi mdi-account ri-26px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card" data-bs-toggle="modal" data-bs-target="#verifiedUsersModalInactive">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="me-1">
                            <p class="text-heading mb-1">Verification Pending</p>
                            <div class="d-flex align-items-center">
                                <h4 class="mb-1 me-1">{{ $currentMonthUsersIn->count() }}</h4>
                                <p class="text-success mb-1">(+{{ $monthPercentageChangeIn }}%)</p>
                            </div>
                            <small class="mb-0">Recent analytics</small>
                        </div>
                        <div class="avatar">
                            <div class="avatar-initial bg-label-success rounded-3">
                                <div class="mdi mdi-account ri-26px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Users List Table -->
    <div class="card">
        <!-- <div class="card-header pb-0">
                    <h5 class="card-title mb-0">Search Filter</h5>
                </div> -->

        <div class="row mt-5">
            <div class="col-md-6">
                <div class="form-floating form-floating-outline mb-4">
                    <select class="form-select" id="roleSelect" name="role">
                      <option value="">Select Role</option>
                      <option value="Broker">Broker</option>
                      <option value="shipper">Shipper</option>
                      <option value="Agency">Agent</option>
                      <option value="Carrier">Carrier</option>
                    </select>
                    <label for="roleSelect">Select Role</label>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating form-floating-outline mb-4">
                    <select class="form-select" id="select3" name="status">
                        <option value="">Select Status</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                    <label for="select3">Select Status</label>
                </div>
            </div>
        </div>


        <div class="card-datatable table-responsive">
                <table class="datatables-users table dataTable no-footer dtr-column" id="DataTables_Table_0">
                    <thead>
                      <tr>
                        <th style="display:none;"></th>
                        <th>Id</th>
                        <th>User</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Remember Token</th>
                        <th>Status</th>
                        <th class="text-center">Verified</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        {{-- {{dd($userlist)}} --}}
                        @foreach ($usersWithPlans as $key => $item)
                            {{-- {{$item->subscription[0]->start_date}} --}}
                            <tr class="odd">
                                <td class="  control" tabindex="0" style="display: none;"></td>
                                <td><span>{{ $key + 1 }}</span></td>
                                <td class="sorting_1">
                                    <div class="d-flex justify-content-start align-items-center user-name">
                                        <!-- <div class="avatar-wrapper">
                                                <div class="avatar avatar-sm me-3"><span
                                                    class="avatar-initial rounded-circle bg-label-info">V</span>
                                                </div>
                                            </div> -->
                                        <div class="avatar-wrapper">
                                            <div class="avatar avatar-sm me-3">
                                                <span class="avatar-initial rounded-circle bg-label-info">
                                                    <?php
                                                    if ($item->agencies->isNotEmpty()) {
                                                        $fullName = $item->agencies[0]->name;
                                                    } elseif ($item->truckers->isNotEmpty()) {
                                                        $fullName = $item->truckers[0]->name;
                                                    } else {
                                                        $fullName = $item->name;
                                                    }

                                                    $initials = '';

                                                    if (!empty($fullName)) {
                                                        $words = explode(' ', $fullName);

                                                        foreach ($words as $word) {
                                                            $initials .= strtoupper(substr($word, 0, 1));
                                                        }
                                                    }

                                                    echo $initials;
                                                    ?>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-column">
                                          <a href="" class="text-truncate text-heading">
                                              <span class="fw-medium">
                                                  @if($item->agencies->isNotEmpty())
                                                      {{ $item->agencies[0]->name }}
                                                  @elseif($item->truckers->isNotEmpty())
                                                      {{ $item->truckers[0]->name }}
                                                  @else
                                                      {{ $item->name }}
                                                  @endif
                                              </span>
                                          </a>
                                      </div>
                                    </div>
                                </td>
                                <td><span class="user-email">{{ $item->email }}</span></td>
                                <td>
                                  <span class="user-role">
                                    @if($item->role === 'agent')
                                        Agency
                                    @elseif($item->role === 'truck_driver')
                                        Broker
                                    @elseif($item->role === 'shipper')
                                        Shipper
                                    @elseif($item->role === 'freight_driver')
                                        Carrier
                                    @else
                                        {{ $item->role }} <!-- This will show the role as is for any other role -->
                                    @endif
                                </span>
                                </td>
                                <td><span class="user-rememberToken">{{ $item->rememberToken }}</span></td>
                                <td>
                                    @if ($item->status == 1)
                                        <span class="text-success">Active</span>
                                    @else
                                        <span class="text-danger">InActive</span>
                                    @endif
                                </td>
                                <td class="  text-center"><i class="mdi mdi-security mdi-24px text-danger"></i></td>
                                <td>
                                    <div class="d-flex align-items-center gap-50"><button
                                            class="btn btn-sm btn-icon edit-record btn-text-secondary rounded-pill waves-effect"
                                            data-id="257" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvasAddUser"><i class="mdi mdi-eye"></i></button><button
                                            class="btn btn-sm btn-icon delete-record btn-text-secondary rounded-pill waves-effect"
                                            data-id="257"><i class="mdi mdi-delete"></i></button><button
                                            class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="mdi mdi-apps"></i></button>
                                        <div class="dropdown-menu dropdown-menu-end m-0">
                                            <a href="{{ route('user.view', $item->id) }}" class="dropdown-item">View</a>
                                            <a href="javascript:;" class="dropdown-item">Suspend</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

        </div>
        {{-- <div class="card-datatable table-responsive">
          <div class="dataTables_wrapper dt-bootstrap5 no-footer">
              <div class="card-header d-flex justify-content-between align-items-center rounded-0">
                  <div class="search-box">
                      <label>
                          <input type="search" class="form-control form-control-sm" placeholder="Search" aria-controls="DataTables_Table_0">
                      </label>
                  </div>
                  <div class="d-flex align-items-center">
                      <div class="dataTables_length me-3">
                          <label>
                              <select name="DataTables_Table_0_length" class="form-select form-select-sm">
                                  <option value="7">7</option>
                                  <option value="10">10</option>
                                  <option value="20">20</option>
                                  <option value="50">50</option>
                                  <option value="70">70</option>
                                  <option value="100">100</option>
                              </select>
                          </label>
                      </div>
                  </div>
              </div>

              <table class="table dataTable" id="DataTables_Table_0" style="width: 100%;">
                  <thead>
                      <tr>
                          <th style="display: none;"></th>
                          <th>Id</th>
                          <th>User</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Remember Token</th>
                          <th>Status</th>
                          <th class="text-center">Verified</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($userlist as $key => $item)
                      <tr>
                          <td style="display: none;"></td>
                          <td><span>{{ $key + 1 }}</span></td>
                          <td class="sorting_1">
                              <div class="d-flex align-items-center">
                                  <div class="avatar avatar-sm me-3">
                                      <span class="avatar-initial rounded-circle bg-label-info">
                                          <?php
                                          $fullName = $item->name;
                                          $initials = '';
                                          if (!empty($fullName)) {
                                              $words = explode(' ', $fullName);
                                              foreach ($words as $word) {
                                                  $initials .= strtoupper(substr($word, 0, 1));
                                              }
                                          }
                                          echo $initials;
                                          ?>
                                      </span>
                                  </div>
                                  <div><a href="" class="text-truncate text-heading"><span class="fw-medium">{{ $item->name }}</span></a></div>
                              </div>
                          </td>
                          <td>{{ $item->email }}</td>
                          <td>{{ $item->role }}</td>
                          <td>{{ $item->rememberToken }}</td>
                          <td>
                              @if ($item->status == 1)
                              <span class="text-success">Active</span>
                              @else
                              <span class="text-danger">Inactive</span>
                              @endif
                          </td>
                          <td class="text-center"><i class="mdi mdi-security mdi-24px text-danger"></i></td>
                          <td>
                              <div class="d-flex align-items-center gap-2">
                                  <button class="btn btn-sm btn-icon edit-record btn-text-secondary rounded-pill" data-id="257" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"><i class="mdi mdi-eye"></i></button>
                                  <button class="btn btn-sm btn-icon delete-record btn-text-secondary rounded-pill" data-id="257"><i class="mdi mdi-delete"></i></button>
                                  <div class="dropdown">
                                      <button class="btn btn-sm btn-icon btn-text-secondary rounded-pill dropdown-toggle" data-bs-toggle="dropdown">
                                          <i class="mdi mdi-apps"></i>
                                      </button>
                                      <div class="dropdown-menu dropdown-menu-end">
                                          <a href="{{ route('user.view', $item->id) }}" class="dropdown-item">View</a>
                                          <a href="javascript:;" class="dropdown-item">Suspend</a>
                                      </div>
                                  </div>
                              </div>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>

              <div class="row align-items-center mt-3">
                  <div class="col-md-6">
                      <div class="dataTables_info" id="DataTables_Table_0_info">Displaying 1 to 5 of 5 entries</div>
                  </div>
                  <div class="col-md-6">
                      <div class="dataTables_paginate paging_simple_numbers">
                          <ul class="pagination justify-content-end">
                              <li class="page-item previous disabled"><a class="page-link" href="#">Previous</a></li>
                              <li class="page-item active"><a class="page-link" href="#">1</a></li>
                              <li class="page-item next disabled"><a class="page-link" href="#">Next</a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div> --}}


        <!-- Offcanvas to add new user -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser"
            aria-labelledby="offcanvasAddUserLabel">
            <div class="offcanvas-header border-bottom">
                <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add User</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0 h-100">
                <form class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNewUserForm"
                    novalidate="novalidate">
                    <input type="hidden" name="id" id="user_id">
                    <div class="form-floating form-floating-outline mb-5 fv-plugins-icon-container">
                        <input type="text" class="form-control" id="add-user-fullname" placeholder="John Doe"
                            name="name" aria-label="John Doe">
                        <label for="add-user-fullname">Full Name</label>
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <div class="form-floating form-floating-outline mb-5 fv-plugins-icon-container">
                        <input type="text" id="add-user-email" class="form-control"
                            placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="email">
                        <label for="add-user-email">Email</label>
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <div class="form-floating form-floating-outline mb-5 fv-plugins-icon-container">
                        <input type="text" id="add-user-contact" class="form-control phone-mask"
                            placeholder="+1 (609) 988-44-11" aria-label="john.doe@example.com" name="userContact">
                        <label for="add-user-contact">Contact</label>
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <div class="form-floating form-floating-outline mb-5 fv-plugins-icon-container">
                        <input type="text" id="add-user-company" name="company" class="form-control"
                            placeholder="Web Developer" aria-label="jdoe1">
                        <label for="add-user-company">Company</label>
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <div class="form-floating form-floating-outline mb-5 form-floating-select2">
                        <div class="position-relative"><select id="country"
                                class="select2 form-select select2-hidden-accessible" data-select2-id="country"
                                tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="2">Select</option>
                                <option value="Australia">Australia</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Brazil">Brazil</option>
                                <option value="Canada">Canada</option>
                                <option value="China">China</option>
                                <option value="France">France</option>
                                <option value="Germany">Germany</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Japan">Japan</option>
                                <option value="Korea">Korea, Republic of</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Russia">Russian Federation</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                            </select><span class="select2 select2-container select2-container--default" dir="ltr"
                                data-select2-id="1" style="width: 360px;"><span class="selection"><span
                                        class="select2-selection select2-selection--single" role="combobox"
                                        aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false"
                                        aria-labelledby="select2-country-container"><span
                                            class="select2-selection__rendered" id="select2-country-container"
                                            role="textbox" aria-readonly="true"><span
                                                class="select2-selection__placeholder">Select Country</span></span><span
                                            class="select2-selection__arrow" role="presentation"><b
                                                role="presentation"></b></span></span></span><span
                                    class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                        <label for="country">Country</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-5">
                        <select id="user-role" class="form-select">
                            <option value="subscriber">Subscriber</option>
                            <option value="editor">Editor</option>
                            <option value="maintainer">Maintainer</option>
                            <option value="author">Author</option>
                            <option value="admin">Admin</option>
                        </select>
                        <label for="user-role">User Role</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-5">
                        <select id="user-plan" class="form-select">
                            <option value="basic">Basic</option>
                            <option value="enterprise">Enterprise</option>
                            <option value="company">Company</option>
                            <option value="team">Team</option>
                        </select>
                        <label for="user-plan">Select Plan</label>
                    </div>
                    <button type="submit"
                        class="btn btn-primary me-sm-3 me-1 data-submit waves-effect waves-light">Submit</button>
                    <button type="reset" class="btn btn-outline-secondary waves-effect"
                        data-bs-dismiss="offcanvas">Cancel</button>
                    <input type="hidden">
                </form>
            </div>
        </div>
    </div>



    <!-- Recently User List -->
    <div class="modal fade" id="recentSubsUsersModal" tabindex="-1" aria-labelledby="recentUsersModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="recentUsersModalLabel">Recently Subscribed Users</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subscriptions</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($currentWeekUsers as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>Free</td>
                                    <td>
                                        @foreach ($user->subscription as $subscription)
                                            Subscribed on: {{ $subscription->start_date }}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($user->subscription as $subscription)
                                            Subscribed on: {{ $subscription->end_date }}
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Verified User List -->
    <div class="modal fade" id="verifiedUsersModal" tabindex="-1" aria-labelledby="verifiedUsersModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verifiedUsersModalLabel">Verified Users Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th
                                        style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden; max-width: 150px;">
                                        Name</th>
                                    <th
                                        style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden; max-width: 150px;">
                                        Email</th>
                                    <th
                                        style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden; max-width: 150px;">
                                        Subscriptions</th>
                                    <th
                                        style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden; max-width: 150px;">
                                        Start Date</th>
                                    <th
                                        style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden; max-width: 150px;">
                                        End Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($currentMonthUsers as $user)
                                    <tr>
                                        <td
                                            style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden; max-width: 150px;">
                                            {{ $user->name }}</td>
                                        <td
                                            style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden; max-width: 150px;">
                                            {{ $user->email }}</td>
                                        <td
                                            style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden; max-width: 150px;">
                                            Free</td>
                                        <td
                                            style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden; max-width: 150px;">
                                            @foreach ($user->subscription as $subscription)
                                                {{ $subscription->start_date ?? '' }}
                                            @endforeach
                                        </td>
                                        <td
                                            style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden; max-width: 150px;">
                                            @foreach ($user->subscription as $subscription)
                                                {{ $subscription->end_date ?? '' }}
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Verified User List Inactive -->
    <div class="modal fade" id="verifiedUsersModalInactive" tabindex="-1" aria-labelledby="verifiedUsersModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verifiedUsersModalLabel">Verification Pending</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subscriptions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($currentMonthUsersIn as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <ul class="list-unstyled">
                                            @foreach ($user->subscription as $subscription)
                                                <li>Subscribed on: {{ $subscription->created_at->format('d M Y') }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Paid Users List -->
    <div class="modal fade" id="dataModal" tabindex="-1" aria-labelledby="dataModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dataModalLabel">Paid User Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Plan Name</th>
                                <th>Amount</th>
                                <th>Billing Email</th>
                                <th>Date</th>
                                <!-- Add other headers as needed -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Paidresult as $result)
                                <tr>
                                    <td>{{ $result->order_item_name }}</td>
                                    <td>{{ number_format($result->total_amount, 2) }}</td>
                                    <td>{{ $result->billing_email }}</td>
                                    <td>{{ \Carbon\Carbon::parse($result->date_created_gmt)->format('F j, Y, g:i A') }}
                                    </td>
                                    <!-- Add other fields as needed -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>





  @endsection
  @push('body-scripts')
  <script>
    document.getElementById('recentSubsUsersCard').addEventListener('click', function() {
        var recentUsersModal = new bootstrap.Modal(document.getElementById('recentSubsUsersModal'));
        recentUsersModal.show();
    });
</script>
  <script>
  $(document).ready(function() {
      // Initialize DataTable
      var table = $('#DataTables_Table_0').DataTable({
          "pageLength": 7,
          "lengthMenu": [7, 10, 20, 50, 70, 100],
          "order": [[1, 'asc']],
          "columnDefs": [
              { "orderable": false, "targets": [0, 8] }
          ],
          "language": {
              "search": "Search",
              "paginate": {
                  "previous": "Previous",
                  "next": "Next"
              },
              "info": "Displaying _START_ to _END_ of _TOTAL_ entries",
              "lengthMenu": "Show _MENU_ entries"
          }
      });

      $('#roleSelect').on('change', function() {
          var selectedRole = $(this).val(); // Get selected role
          // Apply filter to the "Role" column with case-insensitive matching
          table.column(4).search(selectedRole, false, false).draw();
      });

      $('#select3').on('change', function() {
          var selectedStatus = $(this).val(); // Get selected status

          table.column(6).search(selectedStatus ? '^' + selectedStatus + '$' : '', true, false).draw();
      });
  });
</script>


  @endpush

