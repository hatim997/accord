@extends('layouts/contentNavbarLayout')
@section('title', ' Vertical Layouts - Forms')
@section('content')

    @php
        $isMenu = false;
        $navbarHideToggle = false;
    @endphp
    @push('body-style')
        <style>
            .dataTables_wrapper .dataTables_paginate .paginate_button.current,
            .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
                background: rgba(5, 120, 228, 0.388) !important;
                color: #fff !important;

                border-radius: 20px;
                border: none;

            }

            .dataTables_wrapper .dataTables_paginate .paginate_button.current,
            .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
                background: rgb(5, 121, 228) !important;
                color: #fff !important;
                border-radius: 20px;
                border: none;

            }

            #DataTables_Table_0 thead th {
                /* background-color: #0a6d9a !important; */
                color: #fff !important;
                border-bottom: 2px solid #ddd;
            }

            /* Custom Table Row Styling */
            #DataTables_Table_0 tbody tr {
                background-color: #fff !important;
                height: 60px;
                border-bottom: 1px solid #E6E5E8;
            }

            #DataTables_Table_0 tbody tr:hover {
                background-color: #e0f2ff;
            }

            /* Other Custom Styles */
            #DataTables_Table_0 {
                font-size: 14px;
                color: #333;
            }

            .div.dataTables_wrapper div.dataTables_filter {
                display: flex;
                align-items: center;
                gap: 10px;
                padding: 10px;
                background-color: #f7f7f7;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                margin-bottom: 10px;
            }

            .div.dataTables_wrapper div.dataTables_filter label {
                font-weight: 600;
                color: #333;
            }

            .div.dataTables_wrapper div.dataTables_filter input {
                padding: 8px 12px;
                width: 100%;
                max-width: 250px;
                border: 1px solid #ddd;
                border-radius: 5px;
                transition: border-color 0.3s ease;
            }

            .div.dataTables_wrapper div.dataTables_filter input:focus {
                outline: none;
                border-color: #057ae4;
                box-shadow: 0 0 5px blue;
            }

            .dataTables_wrapper {
                background: none !important;
                border: none !important;
            }
        </style>
    @endpush
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
    <div class="card container mb-5">

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

        <div class="card">

            <div class="table-responsive text-nowrap">
                <table class="table" id="DataTables_Table_0">
                    <thead style="background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);">
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
                                                    @if ($item->agencies->isNotEmpty())
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
                                </td>
                                <td><span class="user-rememberToken">{{ $item->rememberToken }}</span></td>
                                <td>
                                    @if ($item->status == 1)
                                        <span class="badge rounded-pill bg-label-success me-1">Active</span>
                                    @else
                                        <span class="badge rounded-pill bg-label-warning me-1">InActive</span>
                                    @endif
                                </td>
                                <td class="  text-center"><i class="mdi mdi-security mdi-24px text-danger"></i></td>
                                <td>
                                    <div class="d-flex align-items-center gap-50">
                                      <button
                                            class="btn btn-sm btn-icon edit-record btn-text-secondary rounded-pill waves-effect"
                                            data-id="{{ $item->id }}" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvasAddUser"><i class="mdi mdi-eye"></i>
                                      </button>
                                            <button
                                            class="btn btn-sm btn-icon delete-record btn-text-secondary rounded-pill waves-effect"
                                            data-id="257"><i class="mdi mdi-delete"></i></button><button
                                            class="btn btn-sm btn-icon btn-text-secondary rounded-pill waves-effect dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <title>dots-vertical</title>
                                                <path
                                                    d="M12,16A2,2 0 0,1 14,18A2,2 0 0,1 12,20A2,2 0 0,1 10,18A2,2 0 0,1 12,16M12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12A2,2 0 0,1 12,10M12,4A2,2 0 0,1 14,6A2,2 0 0,1 12,8A2,2 0 0,1 10,6A2,2 0 0,1 12,4Z" />
                                            </svg></button>
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
        </div>





        <!-- Offcanvas to add new user -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser"
            aria-labelledby="offcanvasAddUserLabel">
            <div class="offcanvas-header border-bottom">
                <h5 id="offcanvasAddUserLabel" class="offcanvas-title">User Details</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0 h-100">
                <div class="user-details">

         <div class="mb-4">
                        <strong>Company Name:</strong>
                        <p id="user-fullname" class="user-info"></p>
                    </div>
                    <div class="mb-4">
                      <strong>Prefix:</strong>
                      <p id="user-prefix" class="user-info"></p>
                  </div>
                  <div class="mb-4">
                      <strong>Name:</strong>
                      <p id="user-name" class="user-info"></p>
                  </div>
                  <div class="mb-4">
                      <strong>Middle Name:</strong>
                      <p id="user-mname" class="user-info"></p>
                  </div>
                  <div class="mb-4">
                      <strong>Last Name:</strong>
                      <p id="user-lname" class="user-info"></p>
                  </div>
                  <div class="mb-4">
                      <strong>Title:</strong>
                      <p id="user-title" class="user-info"></p>
                  </div>
                  <div class="mb-4">
                      <strong>Salutation:</strong>
                      <p id="user-salutation" class="user-info"></p>
                  </div>
                  <div class="mb-4">
                      <strong>Suffix:</strong>
                      <p id="user-suffix" class="user-info"></p>
                  </div>
                  <div class="mb-4">
                      <strong>Tax:</strong>
                      <p id="user-tax" class="user-info"></p>
                  </div>
                  <div class="mb-4">
                      <strong>Website:</strong>
                      <p id="user-website" class="user-info"></p>
                  </div>
                  <div class="mb-4">
                      <strong>SCAC:</strong>
                      <p id="user-scac" class="user-info"></p>
                  </div>
                  <div class="mb-4">
                      <strong>USDOT:</strong>
                      <p id="user-usdot" class="user-info"></p>
                  </div>
                           <div class="mb-4">
                    <strong>Extra Email:</strong>
                    <p id="user-extra_email" class="user-info"></p>
                </div>
                <div class="mb-4">
                  <strong>Extra Email:</strong>
                  <p id="user-ialn" class="user-info"></p>
              </div>

                <div class="mb-4">
                  <strong>Fax:</strong>
                  <p id="user-fax" class="user-info"></p>
              </div>
                  <div class="mb-4">
                      <strong>Address:</strong>
                      <p id="user-address" class="user-info"></p>
                  </div>

                  <div class="mb-4">
                      <strong>Address 2:</strong>
                      <p id="user-address2" class="user-info"></p>
                  </div>
                  <div class="mb-4">
                      <strong>State:</strong>
                      <p id="user-state" class="user-info"></p>
                  </div>
                  <div class="mb-4">
                      <strong>City:</strong>
                      <p id="user-city" class="user-info"></p>
                  </div>
                  <div class="mb-4">
                      <strong>ZIP Code:</strong>
                      <p id="user-zip" class="user-info"></p>
                  </div>
                  <div class="mb-4">
                      <strong>Cellphone:</strong>
                      <p id="user-cellphone" class="user-info"></p>
                  </div>
                    <div class="mb-4">
                        <strong>Email:</strong>
                        <p id="user-email" class="user-info"></p>
                    </div>
                    <div class="mb-4">
                        <strong>Contact:</strong>
                        <p id="user-contact" class="user-info"></p>
                    </div>
                    <div class="mb-4">
                        <strong>User Role:</strong>
                        <p id="user-role" class="user-info"></p>
                    </div>
                </div>
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
                "order": [
                    [1, 'asc']
                ],
                "columnDefs": [{
                    "orderable": false,
                    "targets": [0, 8]
                }],
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

                table.column(6).search(selectedStatus ? '^' + selectedStatus + '$' : '', true, false)
            .draw();
            });
        });
    </script>


<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".edit-record").forEach(button => {
        button.addEventListener("click", function () {
            let userId = this.getAttribute("data-id");

            // Get user data from $userlist
            let userData = @json($usersWithPlans).find(user => user.id == userId);
            console.log(userData);

            if (userData) {
                // Populate display fields
                if (userData.role == 'agent') {
                    document.getElementById("user-fullname").textContent = userData.agencies[0]?.name || "N/A";
                    document.getElementById("user-address").textContent = userData.agencies[0]?.address || "N/A";
                    document.getElementById("user-address2").textContent = userData.agencies[0]?.address2 || "N/A";
                    document.getElementById("user-city").textContent = userData.agencies[0]?.city || "N/A";
                    document.getElementById("user-state").textContent = userData.agencies[0]?.state || "N/A";
                    document.getElementById("user-zip").textContent = userData.agencies[0]?.zip || "N/A";
                    document.getElementById("user-cellphone").textContent = userData.agencies[0]?.cellphone || "N/A";
                    document.getElementById("user-extra_email").textContent = userData.agencies[0]?.extra_email || "N/A";
                    document.getElementById("user-fax").textContent = userData.agencies[0]?.fax || "N/A";
                    document.getElementById("user-lname").textContent = userData.agencies[0]?.lname || "N/A";
                    document.getElementById("user-mname").textContent = userData.agencies[0]?.mname || "N/A";
                    document.getElementById("user-ialn").textContent = userData.agencies[0]?.ialn || "N/A";
                    document.getElementById("user-prefix").textContent = userData.agencies[0]?.prefix || "N/A";
                    document.getElementById("user-suffix").textContent = userData.agencies[0]?.suffix || "N/A";
                    document.getElementById("user-title").textContent = userData.agencies[0]?.title || "N/A";
                    document.getElementById("user-website").textContent = userData.agencies[0]?.website || "N/A";

                  } else if (userData.role == 'shipper') {
                    document.getElementById("user-fullname").textContent = userData.shippers[0]?.name || "N/A";
                    document.getElementById("user-address").textContent = userData.shippers[0]?.address || "N/A";
                    document.getElementById("user-address2").textContent = userData.shippers[0]?.address2 || "N/A";
                    document.getElementById("user-city").textContent = userData.shippers[0]?.city || "N/A";
                    document.getElementById("user-state").textContent = userData.shippers[0]?.state || "N/A";
                    document.getElementById("user-zip").textContent = userData.shippers[0]?.zip || "N/A";
                    document.getElementById("user-cellphone").textContent = userData.shippers[0]?.cellphone || "N/A";
                    document.getElementById("user-extra_email").textContent = userData.shippers[0]?.extra_email || "N/A";
                    document.getElementById("user-fax").textContent = userData.shippers[0]?.fax || "N/A";
                    document.getElementById("user-lname").textContent = userData.shippers[0]?.lname || "N/A";
                    document.getElementById("user-mname").textContent = userData.shippers[0]?.mname || "N/A";
                    document.getElementById("user-ialn").textContent = userData.shippers[0]?.ialn || "N/A";
                    document.getElementById("user-prefix").textContent = userData.shippers[0]?.prefix || "N/A";
                    document.getElementById("user-suffix").textContent = userData.shippers[0]?.suffix || "N/A";
                    document.getElementById("user-title").textContent = userData.shippers[0]?.title || "N/A";
                    document.getElementById("user-website").textContent = userData.shippers[0]?.website || "N/A";

                } else if (userData.role == 'truck_driver') {
                   document.getElementById("user-prefix").textContent = userData.truckers[0]?.prefix || "N/A";
                  document.getElementById("user-name").textContent = userData.truckers[0]?.name || "N/A";
                  document.getElementById("user-mname").textContent = userData.truckers[0]?.mname || "N/A";
                  document.getElementById("user-lname").textContent = userData.truckers[0]?.lname || "N/A";
                  document.getElementById("user-title").textContent = userData.truckers[0]?.title || "N/A";
                  document.getElementById("user-salutation").textContent = userData.truckers[0]?.salutation || "N/A";
                  document.getElementById("user-suffix").textContent = userData.truckers[0]?.suffix || "N/A";
                  document.getElementById("user-tax").textContent = userData.truckers[0]?.tax || "N/A";
                  document.getElementById("user-website").textContent = userData.truckers[0]?.website || "N/A";
                  document.getElementById("user-scac").textContent = userData.truckers[0]?.scac || "N/A";
                  document.getElementById("user-usdot").textContent = userData.truckers[0]?.usdot || "N/A";
                  document.getElementById("user-address").textContent = userData.truckers[0]?.address || "N/A";
                  document.getElementById("user-address2").textContent = userData.truckers[0]?.address2 || "N/A";
                  document.getElementById("user-state").textContent = userData.truckers[0]?.state || "N/A";
                  document.getElementById("user-city").textContent = userData.truckers[0]?.city || "N/A";
                  document.getElementById("user-zip").textContent = userData.truckers[0]?.zip || "N/A";
                  document.getElementById("user-cellphone").textContent = userData.truckers[0]?.cellphone || "N/A";
                  document.getElementById("user-fax").textContent = userData.truckers[0]?.fax || "N/A";
                } else if (userData.role == 'freight_driver') {
                    document.getElementById("user-fullname").textContent = userData.freights[0]?.name || "N/A";
                    document.getElementById("user-address").textContent = userData.freights[0]?.address || "N/A";
                    document.getElementById("user-address2").textContent = userData.freights[0]?.address2 || "N/A";
                    document.getElementById("user-city").textContent = userData.freights[0]?.city || "N/A";
                    document.getElementById("user-state").textContent = userData.freights[0]?.state || "N/A";
                    document.getElementById("user-zip").textContent = userData.freights[0]?.zip || "N/A";
                    document.getElementById("user-cellphone").textContent = userData.freights[0]?.cellphone || "N/A";
                    document.getElementById("user-extra_email").textContent = userData.freights[0]?.extra_email || "N/A";
                    document.getElementById("user-fax").textContent = userData.freights[0]?.fax || "N/A";
                    document.getElementById("user-lname").textContent = userData.freights[0]?.lname || "N/A";
                    document.getElementById("user-mname").textContent = userData.freights[0]?.mname || "N/A";
                    document.getElementById("user-ialn").textContent = userData.freights[0]?.ialn || "N/A";
                    document.getElementById("user-prefix").textContent = userData.freights[0]?.prefix || "N/A";
                    document.getElementById("user-suffix").textContent = userData.freights[0]?.suffix || "N/A";
                    document.getElementById("user-title").textContent = userData.freights[0]?.title || "N/A";
                    document.getElementById("user-website").textContent = userData.freights[0]?.website || "N/A";
                }
                document.getElementById("user-email").textContent = userData.email || "N/A";
                document.getElementById("user-contact").textContent = userData.contact || "N/A";
                // document.getElementById("user-company").textContent = userData.company || "N/A";
                document.getElementById("user-role").textContent = userData.role || "N/A";
            }
        });
    });
});
</script>


@endpush
