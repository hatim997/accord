@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp
@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - main')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">

    <link href="https://cdn.datatables.net/v/dt/dt-2.1.0/datatables.min.css" rel="stylesheet">

    <style>
       .disabled-link {
    color: gray;
    pointer-events: none;
    cursor: not-allowed;
    text-decoration: none;
  }
    </style>
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-2.1.0/datatables.min.js"></script>
   
    <script>
   $('#example').DataTable();
   $('#examplem').DataTable();
   $('#exampleb').DataTable();
   $('#examples').DataTable();
    </script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection

@section('content')
    <div class="row gy-4 justify-content-center">
        <div class="col-md-10 col-lg-10">
            <div class="row gy-4">
    
        <!-- Data Tables -->
        <div class="col-12">
      
        
      @if(Session::has('success'))
      <div class="alert alert-warning alert-dismissible" role="alert">
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



          <div class="demo-inline-spacing mt-3">
            <div class="list-group list-group-horizontal-md text-md-center">
              <a class="list-group-item list-group-item-action active" id="home-list-item" data-bs-toggle="list" href="#agent">Agent Users</a>
              <a class="list-group-item list-group-item-action" id="profile-list-item" data-bs-toggle="list" href="#Motor_Carrire">Motor Carrier</a>
              <a class="list-group-item list-group-item-action" id="messages-list-item"  data-bs-toggle="list" href="#Broker">Broker </a>
              <a class="list-group-item list-group-item-action" id="settings-list-item" data-bs-toggle="list" href="#Shipper">Shipper</a>
            </div>
            <div class="tab-content px-0 mt-0">
              <div class="tab-pane fade show active" id="agent">
                <div class="card">
                  <div class="table-responsive">
                    <table id="example" class="table" >
                      <thead class="table-light">
                        <tr>
                          <th class="text-truncate">Users</th>
                          <th class="text-truncate">Email</th>                        
                          <th class="text-truncate">Status</th>
                          <th class="text-truncate">Action</th>
            
                        </tr>     
                      </thead>
                      <tbody>
                         @foreach ($users as $user)
                         @if ($user->role == "agent" )
                         <tr>
                           <td>
                             <div class="d-flex align-items-center">
                             
                               <div>
                                 <h6 class="mb-0 text-truncate">{{$user->name}}</h6>
                                 {{-- <small class="text-truncate">@amiccoo</small> --}}
                               </div>
                             </div>
                          
                           </td>
                           <td class="text-truncate">{{$user->email}}</td>           
                       
                           <td> 
                            @if ($user->status == '0')
                            <a href="{{ route('deactive', ['id' => $user->id]) }}" class="badge bg-label-success rounded-pill">Active</a>
                            @else
                            <a href="{{ route('active' , ['id' => $user->id]) }}" class="badge bg-label-danger rounded-pill">Inactive</a>
                            @endif
                          </td>  
                           <td>
                             <div class="dropdown">
                               <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                               <div class="dropdown-menu">                
                                 <a class="dropdown-item"  href="{{route('edit_user', $user->id)}}"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                                                  <a class="dropdown-item" href="{{route('delete_user', $user->id)}}"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>

                               </div>
                             </div>
                           </td>            
                         </tr>
                             
                         @endif
            
            
            
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="Motor_Carrire">
                <div class="card">
                  <div class="table-responsive">
                    <table id="examplem" class="table" >
                      <thead class="table-light">
                        <tr>
                          <th class="text-truncate">Userd</th>
                          <th class="text-truncate">Email</th>
                         
                          <th class="text-truncate">Status</th>
                          <th class="text-truncate">Action</th>
            
                        </tr>     
                      </thead>
                      <tbody>
                         @foreach ($users as $user)
                         @if ($user->role == "truck_driver" )
                         <tr>
                           <td>
                             <div class="d-flex align-items-center">
                             
                               <div>
                                 <h6 class="mb-0 text-truncate">{{$user->name}}</h6>
                                 {{-- <small class="text-truncate">@amiccoo</small> --}}
                               </div>
                             </div>
                          
                           </td>
                           <td class="text-truncate">{{$user->email}}</td> 
                          <td> 
                            @if ($user->status == '0')
                            <a href="{{ route('deactive', ['id' => $user->id]) }}" class="badge bg-label-success rounded-pill">Active</a>
                            @else
                            <a href="{{ route('active' , ['id' => $user->id]) }}" class="badge bg-label-danger rounded-pill">Inactive</a>
                            @endif
                          </td>  
                           <td>
                             <div class="dropdown">
                               <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                               <div class="dropdown-menu">                
                                 <a class="dropdown-item"  href="{{route('edit_user', $user->id)}}"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                                                  <a class="dropdown-item" href="{{route('delete_user', $user->id)}}"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>

                               </div>
                             </div>
                           </td>            
                         </tr>
                             
                         @endif
            
            
            
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>            
              <div class="tab-pane fade" id="Broker">
                <div class="card">
                  <div class="table-responsive">
                    <table id="exampleb" class="table" >
                      <thead class="table-light">
                        <tr>
                          <th class="text-truncate">Usere</th>
                          <th class="text-truncate">Email</th>
                          <th class="text-truncate">Status</th>
                          <th class="text-truncate">Action</th>
            
                        </tr>     
                      </thead>
                      <tbody>
                         @foreach ($users as $user)
                         @if ($user->role == "freight_driver" )
                         <tr>
                           <td>
                             <div class="d-flex align-items-center">
                             
                               <div>
                                 <h6 class="mb-0 text-truncate">{{$user->name}}</h6>
                                 {{-- <small class="text-truncate">@amiccoo</small> --}}
                               </div>
                             </div>
                          
                           </td>
                           <td class="text-truncate">{{$user->email}}</td>           
                           <td> 
                            @if ($user->status == '0')
                            <a href="{{ route('deactive', ['id' => $user->id]) }}" class="badge bg-label-success rounded-pill">Active</a>
                            @else
                            <a href="{{ route('active' , ['id' => $user->id]) }}" class="badge bg-label-danger rounded-pill">Inactive</a>
                            @endif
                          </td>  
                           <td>
                             <div class="dropdown">
                               <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                               <div class="dropdown-menu">                
                                 <a class="dropdown-item"  href="{{route('edit_user', $user->id)}}"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                 <a class="dropdown-item" href="{{route('delete_user', $user->id)}}"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                               </div>
                             </div>
                           </td>            
                         </tr>
                             
                         @endif
            
            
            
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="Shipper">
                <div class="card">
                  <div class="table-responsive">
                    <table id="examples" class="table" >
                      <thead class="table-light">
                        <tr>
                          <th class="text-truncate">User</th>
                          <th class="text-truncate">Email</th>
                          <th class="text-truncate">Status</th>
                          <th class="text-truncate">Action</th>
            
                        </tr>     
                      </thead>
                      <tbody>
                         @foreach ($users as $user)
                         @if ($user->role == "shipper" )
                         <tr>
                           <td>
                             <div class="d-flex align-items-center">
                             
                               <div>
                                 <h6 class="mb-0 text-truncate">{{$user->name}}</h6>
                                 {{-- <small class="text-truncate">@amiccoo</small> --}}
                               </div>
                             </div>
                          
                           </td>
                           <td class="text-truncate">{{$user->email}}</td>           
                           <td> 
                            @if ($user->status == '0')
                            <a href="{{ route('deactive', ['id' => $user->id]) }}" class="badge bg-label-success rounded-pill">Active</a>
                            @else
                            <a href="{{ route('active' , ['id' => $user->id]) }}" class="badge bg-label-danger rounded-pill">Inactive</a>
                            @endif
                          </td>  
                           <td>
                             <div class="dropdown">
                               <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                               <div class="dropdown-menu">                
                                 <a class="dropdown-item"  href="{{route('edit_user', $user->id)}}"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                 <a class="dropdown-item"  href="{{route('shipperlimits', $user->id)}}"><i class="mdi mdi-ship-wheel me-1"></i> Shipperlimit</a>
                                                                  <a class="dropdown-item" href="{{route('delete_user', $user->id)}}"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>

                               </div>
                             </div>
                           </td>            
                         </tr>
                             
                         @endif
            
            
            
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>



  
  </div> 
        <!--/ Data Tables -->
    </div>
@endsection
