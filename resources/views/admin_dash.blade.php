@extends('layouts/contentNavbarLayout')
@section('title', ' Vertical Layouts - Forms')
@section('content')
    <Style>
        .green-square {
            width: 10px;
            height: 10px;
            background-color: green;
        }
        .red-square {
            width: 10px;
            height: 10px;
            background-color: red;
        }
    </style>
    </Style>
    @php
        $isMenu = false;
        $navbarHideToggle = false;
    @endphp

    <div class="row gy-4 ">
        <div class="col-md-12 col-lg-12">
            <div class="row gy-4">
                <!-- Congratulations card -->
                <div class="col-md-3 col-lg-3">
                    <div class="card"
                        style="background: rgb(42,132,254); background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);"
                        data-bs-toggle="modal" data-bs-target="#userModal">
                        <div class="card-body text-center" style="height: 220px;">
                            <h4 class="mb-1 py-4 text-white">User Recently Added</h4>
                            <h2 class="py-3 text-white card-title" style="font-size: 72px">{{ $userCount }}</h2>
                        </div>
                        <div fxlayout="row" fxlayoutalign="start center" class="total_box ng-tns-c246-95"
                            style="flex-direction: row; box-sizing: border-box; display: flex; place-content: center flex-start; align-items: center;">
                            <span class="ng-tns-c246-95">&nbsp;</span><span class="num red-fg ng-tns-c246-95">&nbsp;</span><span
                                class="go-btn ng-tns-c246-95" tabindex="0">GO ></span>
                        </div>
                    </div>
                </div>
                <!--/ Congratulations card -->
                <!-- Congratulations card -->
                {{-- <div class="col-md-3 col-lg-3">
                    <div class="card"
                        style="background: rgb(42,132,254); background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);">
                        <div class="card-body text-center" style="
                        height: 220px;
                    ">
                            <h4 class="mb-1 py-4 text-white">Policy Expiring in a Week !</h4>
                            <h2 class="py-3 text-white card-title" style="font-size: 72px">0</h2>
                        </div>
                        <div fxlayout="row" fxlayoutalign="start center" class="total_box ng-tns-c246-95"
                        style="flex-direction: row; box-sizing: border-box; display: flex; place-content: center flex-start; align-items: center;">
                        <span class="ng-tns-c246-95">&nbsp;</span><span class="num red-fg ng-tns-c246-95">&nbsp;</span><span
                            class="go-btn ng-tns-c246-95" tabindex="0">GO ></span>
                    </div>
                    </div>
                </div> --}}
                <!--/ Congratulations card -->


                <!-- Congratulations card -->
                <div class="col-md-3 col-lg-3">
                    <div class="card"
                        style="background: rgb(42,132,254); background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);"
                        data-bs-toggle="modal" data-bs-target="#activeUserModal">
                        <div class="card-body text-center" style="height: 220px;">
                            <h4 class="mb-1 py-4 text-white">No. of Active Users</h4>
                            <h2 class="py-3 text-white card-title" style="font-size: 72px">{{ $activeUserCount }}</h2>
                        </div>
                        <div fxlayout="row" fxlayoutalign="start center" class="total_box ng-tns-c246-95"
                            style="flex-direction: row; box-sizing: border-box; display: flex; place-content: center flex-start; align-items: center;">
                            <span class="ng-tns-c246-95">&nbsp;</span><span class="num red-fg ng-tns-c246-95">&nbsp;</span><span
                                class="go-btn ng-tns-c246-95" tabindex="0">GO ></span>
                        </div>
                    </div>
                </div>
                <!--/ Congratulations card -->
                <!-- Congratulations card -->
                <div class="col-md-3 col-lg-3">
                    <div class="card"
                        style="background: rgb(42,132,254); background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);"
                        data-bs-toggle="modal" data-bs-target="#inactiveUserModal">
                        <div class="card-body text-center" style="height: 220px;">
                            <h4 class="mb-1 py-4 text-white">No. of Inactive Users</h4>
                            <h2 class="py-3 text-white card-title" style="font-size: 72px">{{ $inactiveUserCount }}</h2>
                        </div>
                        <div fxlayout="row" fxlayoutalign="start center" class="total_box ng-tns-c246-95"
                            style="flex-direction: row; box-sizing: border-box; display: flex; place-content: center flex-start; align-items: center;">
                            <span class="ng-tns-c246-95">&nbsp;</span><span class="num red-fg ng-tns-c246-95">&nbsp;</span><span
                                class="go-btn ng-tns-c246-95" tabindex="0">GO ></span>
                        </div>
                    </div>
                </div>
                <!--/ Congratulations card -->
            </div>
        </div>
   

      
        <!--/ Data Tables -->
    </div>

<!-- Modal For Recent Add User -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">User Recently Added In A Week</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Table in Modal -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Remember Token</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Add your data rows here dynamically, e.g., with a loop -->
                        @foreach($recently as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role }}</td>
                            <td>{{ $item->rememberToken }}</td>
                            <td>
                                @if( $item->status == 1)
                                <span class="text-danger">InActive</span>
                                @else
                                <span class="text-success">Active</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        <!-- Additional rows... -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal For Only Active User -->
<div class="modal fade" id="activeUserModal" tabindex="-1" aria-labelledby="activeUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="activeUserModalLabel">No.of Active Users</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Table in Modal -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Remember Token</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Add your data rows here dynamically, e.g., with a loop -->
                        @foreach($activeUser as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role }}</td>
                            <td>{{ $item->rememberToken }}</td>
                            <td>
                                <span class="text-success">{{ $item->status == 0 ? 'Active' : '' }}</span>
                            </td>
                        </tr>
                        @endforeach
                        <!-- Additional rows... -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal For Only InActive User -->
<div class="modal fade" id="inactiveUserModal" tabindex="-1" aria-labelledby="inactiveUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inactiveUserModalLabel">No.of Inactive Users</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Table in Modal -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Remember Token</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Add your data rows here dynamically, e.g., with a loop -->
                        @foreach($inactiveUser as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role }}</td>
                            <td>{{ $item->rememberToken }}</td>
                            <td>
                                <span class="text-danger">{{ $item->status == 1 ? 'InActive' : '' }}</span>
                            </td>
                        </tr>
                        @endforeach
                        <!-- Additional rows... -->
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
