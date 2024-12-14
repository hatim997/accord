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
        .focus {
        border-radius: 7px;
        background-color: #f1f1f1; /* Highlight color */
        border: 1px solid #add5ff;
    }

    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Overlay background */
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 1000;
    }

    /* Modal content styling */
    .modal-content {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        width: 100%;
        max-width: 1000px; /* Limit modal width */
        text-align: center;
        transform: scale(0.8);
        transition: transform 0.3s ease;
    }

    /* Open class to trigger transitions */
    .modal.open {
        opacity: 1;
    }

    .modal.open .modal-content {
        transform: scale(1);
    }

    /* Close button */
    .close-btn {
        cursor: pointer;
        font-size: 18px;
        margin-top: 10px;
        display: inline-block;
        border-radius: 3px;
        background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);
        border: none !important;
    }

    .modal-title {
        font-weight: bold;
    }
    </style>
    </Style>
    @php
        $isMenu = false;
        $navbarHideToggle = false;
    @endphp

    <div class="row gy-4 ">
        <div class="col-md-12 col-lg-12">
            <div class="row gy-4 justify-content-center align-item-center">

              <!-- password not set card -->
              <div class="col-md-3 col-lg-3">
                <div class="card open-modal-btn"
                    style="background: rgb(42,132,254); background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);"
                    data-modal="agentclient">
                    <div class="card-body text-center" style="height: 220px;">
                        <h4 class="mb-1 py-4 text-white">Agent Add Client</h4>
                        <h2 class="py-3 text-white card-title" style="font-size: 72px">{{ count($agentclient) }}</h2>
                    </div>
                    <div fxlayout="row" fxlayoutalign="start center" class="total_box ng-tns-c246-95"
                        style="flex-direction: row; box-sizing: border-box; display: flex; place-content: center flex-start; align-items: center;">
                        <span class="ng-tns-c246-95">&nbsp;</span><span class="num red-fg ng-tns-c246-95">&nbsp;</span><span
                            class="go-btn ng-tns-c246-95" tabindex="0">GO ></span>
                    </div>
                </div>
            </div>

                <!-- Congratulations card -->
                <div class="col-md-3 col-lg-3">
                    <div class="card open-modal-btn"
                        style="background: rgb(42,132,254); background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);"
                        data-modal="userModal">
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


                <!-- Congratulations card -->
                <div class="col-md-3 col-lg-3">
                    <div class="card open-modal-btn"
                        style="background: rgb(42,132,254); background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);"
                          data-modal="activeUserModal">
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
                    <div class="card open-modal-btn"
                        style="background: rgb(42,132,254); background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);"
                         data-modal="inactiveUserModal">
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

<div class="modal" id="agentclient" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header justify-content-center align-items-center">
              <h5 class="modal-title" id="exampleModalLabel">Recently Added Users</h5>
          </div>
          <div class="modal-body" style="max-height: 50vh; overflow-y: auto;">
              <div class="container mt-2 px-2">
                  <div class="table-responsive">
                      <table class="table table-borderless">
                          <thead>
                              <tr class="bg-light text-center align-middle">
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Remember Token</th>
                                <th>Status</th>
                                <th>Update Password</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($agentclient as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role }}</td>
                                <td>{{ $item->rememberToken }}</td>
                                <td><span class="text-danger">Pending</span></td>
                                <td>
                                  <a href="{{ route('update.password', $item->id) }}">Set Password</a>
                                </td>
                            </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>

<!-- Modal For Recent Add User -->

<div class="modal" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header justify-content-center align-items-center">
              <h5 class="modal-title" id="exampleModalLabel">Recently Added Users</h5>
          </div>
          <div class="modal-body" style="max-height: 50vh; overflow-y: auto;">
              <div class="container mt-2 px-2">
                  <div class="table-responsive">
                      <table class="table table-borderless">
                          <thead>
                              <tr class="bg-light text-center align-middle">
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Remember Token</th>
                                <th>Status</th>
                              </tr>
                          </thead>
                          <tbody>
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
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>





<!-- Modal For Only Active User -->


<div class="modal" id="activeUserModal" tabindex="-1" aria-labelledby="activeUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header justify-content-center align-items-center">
              <h5 class="modal-title" id="exampleModalLabel">No.of Active Users</h5>
          </div>
          <div class="modal-body" style="max-height: 50vh; overflow-y: auto;">
              <div class="container mt-2 px-2">
                  <div class="table-responsive">
                      <table class="table table-borderless">
                          <thead>
                              <tr class="bg-light text-center align-middle">
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Remember Token</th>
                                <th>Status</th>
                              </tr>
                          </thead>
                          <tbody>
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
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>






<!-- Modal For Only InActive User -->

<div class="modal" id="inactiveUserModal" tabindex="-1" aria-labelledby="inactiveUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header justify-content-center align-items-center">
              <h5 class="modal-title" id="exampleModalLabel">No.of InActive Users</h5>
          </div>
          <div class="modal-body" style="max-height: 50vh; overflow-y: auto;">
              <div class="container mt-2 px-2">
                  <div class="table-responsive">
                      <table class="table table-borderless">
                          <thead>
                              <tr class="bg-light text-center align-middle">
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Remember Token</th>
                                <th>Status</th>
                              </tr>
                          </thead>
                          <tbody>
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
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>






@endsection
@push('body-scripts')

<script>
  document.addEventListener("DOMContentLoaded", function() {
      var openModalBtns = document.querySelectorAll(".open-modal-btn");
      var closeModalBtns = document.querySelectorAll(".close-btn");

      // Open modal
      openModalBtns.forEach(function(btn) {
          btn.addEventListener("click", function() {
              var modalId = btn.getAttribute("data-modal");
              var modal = document.getElementById(modalId);
              modal.style.display = "flex";
              setTimeout(function() {
                  modal.classList.add("open");
              }, 10);
          });
      });

      // Close modal
      closeModalBtns.forEach(function(btn) {
          btn.addEventListener("click", function() {
              var modal = btn.closest(".modal");
              modal.classList.remove("open");
              setTimeout(function() {
                  modal.style.display = "none";
              }, 300);
          });
      });

      // Close modal when clicking outside
      window.onclick = function(event) {
          if (event.target.classList.contains("modal")) {
              var modal = event.target;
              modal.classList.remove("open");
              setTimeout(function() {
                  modal.style.display = "none";
              }, 300);
          }
      };
  });
</script>


@endpush
