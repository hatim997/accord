@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp
@extends('layouts/contentNavbarLayout')
@section('title', ' Certificate Form')
@push('body-style')
<link rel="stylesheet" href="{{ asset('assets/css/datatable.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/datatables-Cl.css') }}" />
@endpush

@section('content')

    <div  class="container-xxl flex-grow-1 container-p-y">
        <div class="app-chat card overflow-hidden">
            <div class="row g-0">
    <div class="col app-chat-contacts app-sidebar flex-grow-0 overflow-hidden border-end" id="app-chat-contacts">
        <div class="sidebar-header h-px-75 px-5 border-bottom d-flex align-items-center">
          <div class="d-flex align-items-center me-4 me-lg-0">
            
            <div class="flex-grow-1 input-group input-group-sm input-group-merge rounded-pill">
              <span class="input-group-text" id="basic-addon-search31"><i class="ri-search-line lh-1 ri-20px"></i></span>
              <input type="text" class="form-control chat-search-input" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search31">
            </div>
          </div>
          <i class="ri-close-line ri-20px cursor-pointer position-absolute top-50 end-0 translate-middle fs-4 d-lg-none d-block" data-overlay="" data-bs-toggle="sidebar" data-target="#app-chat-contacts"></i>
        </div>
        <div class="sidebar-body ps ps--active-y">
  
         
          <!-- Contacts -->
          <ul class="list-unstyled chat-contact-list py-2" id="contact-list">
            <li class="chat-contact-list-item chat-contact-list-item-title mt-0">
              <h5 class="text-primary mb-0">Client</h5>
            </li>
            <li class="chat-contact-list-item contact-list-item-0 d-none">
              <h6 class="text-muted mb-0">No Contacts Found</h6>
            </li>
            @foreach ($driver as $data)
            <li class="chat-contact-list-item"  id="{{ $data->driver_id }}">
              <a class="d-flex align-items-center"  >               
                <div class="chat-contact-info flex-grow-1 ms-4">
                  <h6 class="chat-contact-name text-truncate fw-normal m-0">{{ $data->name }}</h6>
                  <small class="chat-contact-status text-truncate">{{ str_replace('_', ' ', $data->role) }}</small>
                </div>
              </a>
            </li>  
            @endforeach       
          </ul>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 434px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 182px;">
       
        </div>
        </div>

      
      </div>
    </div>

    <div class="col app-chat-history">
      <div class="chat-history-wrapper">
        <div class="chat-history-header border-bottom">
          <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex overflow-hidden align-items-center">
              <i class="ri-menu-line ri-24px cursor-pointer d-lg-none d-block me-4" data-bs-toggle="sidebar" data-overlay="" data-target="#app-chat-contacts"></i>
              <div class="flex-shrink-0 avatar avatar-online">
                <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/4.png" alt="Avatar" class="rounded-circle" data-bs-toggle="sidebar" data-overlay="" data-target="#app-chat-sidebar-right">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="sidebar-body ps ps--active-y">
      <div class="card-datatable table-responsive">
       <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
          <div class="card-header d-flex flex-column flex-md-row align-items-start align-items-md-center py-0 pb-5 pb-md-0">
            <div>
              <div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input type="search"
                    class="form-control form-control-sm ms-0" placeholder="Search Order"
                    aria-controls="DataTables_Table_0"></label></div>
            </div>
            <div class="d-flex align-items-md-baseline justify-content-md-end gap-4">
              <div class="dataTables_length my-0" id="DataTables_Table_0_length"><label><select name="DataTables_Table_0_length"
                    aria-controls="DataTables_Table_0" class="form-select form-select-sm">
                    <option value="10">10</option>
                    <option value="40">40</option>
                    <option value="60">60</option>
                    <option value="80">80</option>
                    <option value="100">100</option>
                  </select></label></div>
              <div class="dt-action-buttons pt-0">
                <div class="dt-buttons btn-group flex-wrap">
                  <div class="btn-group"><button
                      class="btn btn-secondary buttons-collection dropdown-toggle btn-outline-secondary waves-effect waves-light"
                      tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog"
                      aria-expanded="false"><span><i class="ri-download-line ri-16px me-2"></i> <span
                          class="d-none d-sm-inline-block">Export</span></span></button></div>
                </div>
              </div>
            </div>
          </div>
          <table class="datatables-order table dataTable no-footer dtr-column collapsed" id="DataTables_Table_0"
            aria-describedby="DataTables_Table_0_info" style="width: 1193px;">
            <thead>
              <tr>              
                <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1"
                  style="width: 18px;" data-col="1" aria-label=""></th>
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 50px;"
                  aria-label="order: activate to sort column ascending">Certificate ID</th>
                <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                  style="width: 134px;" aria-label="date: activate to sort column descending" aria-sort="ascending">Download</th>
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                  style="width: 267px;" aria-label="customers: activate to sort column ascending">customers</th>
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                  style="width: 101px;" aria-label="payment: activate to sort column ascending">View Certificate</th>
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                  style="width: 118px;" aria-label="status: activate to sort column ascending">Edit Certificate</th>
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                  style="width: 147px;" aria-label="method: activate to sort column ascending">status</th>
                <th class="sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 0px; display: none;"
                  aria-label="Actions">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr class="odd parent">
              
                <td class="dt-checkboxes-cell"> <i style="font-size: 30px;    color: #252458;}" class="mdi mdi-chevron-down"></i> </td>
                <td><a
                    href="#"><span>#6979</span></a>
                </td>
                <td class="sorting_1"><i class="mdi mdi-download"></i></td>
                <td>
                  <div class="d-flex justify-content-start align-items-center user-name">
                   
                    <div class="d-flex flex-column"><a
                        href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-1/pages/profile-user"
                        class="text-truncate text-heading"><span class="fw-medium">Cristine Easom</span></a><small
                        class="text-truncate">ceasomw@theguardian.com</small></div>
                  </div>
                </td>
                <td>
                  <h6 class="mb-0 w-px-100 d-flex align-items-center" ><i class="mdi mdi-eye"></i>
                    </h6>
                </td>
              
                <td>
                  <div class="d-flex align-items-center text-nowrap"><i class="mdi mdi-pencil-box"></i>
                  </div>
                </td>

                <td><span class="badge px-2 rounded-pill bg-label-success" text-capitalized="">Delivered</span></td>
                <td class="dtr-hidden" style="display: none;">
                  <div><button
                      class="btn btn-sm btn-icon btn-text-secondary text-body waves-effect rounded-pill dropdown-toggle hide-arrow"
                      data-bs-toggle="dropdown"><i class="ri-more-2-line"></i></button>
                    <div class="dropdown-menu dropdown-menu-end m-0"><a
                        href=" https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-1/app/ecommerce/order/details"
                        class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item delete-record">Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr class="odd parent">
              
                <td class="dt-checkboxes-cell"> <i style="font-size: 30px;    color: #252458;}" class="mdi mdi-chevron-down"></i> </td>
                <td><a
                    href="#"><span>#6979</span></a>
                </td>
                <td class="sorting_1"><i class="mdi mdi-download"></i></td>
                <td>
                  <div class="d-flex justify-content-start align-items-center user-name">
                   
                    <div class="d-flex flex-column"><a
                        href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-1/pages/profile-user"
                        class="text-truncate text-heading"><span class="fw-medium">Cristine Easom</span></a><small
                        class="text-truncate">ceasomw@theguardian.com</small></div>
                  </div>
                </td>
                <td>
                  <h6 class="mb-0 w-px-100 d-flex align-items-center" ><i class="mdi mdi-eye"></i>
                    </h6>
                </td>
              
                <td>
                  <div class="d-flex align-items-center text-nowrap"><i class="mdi mdi-pencil-box"></i>
                  </div>
                </td>

                <td><span class="badge px-2 rounded-pill bg-label-success" text-capitalized="">Delivered</span></td>
                <td class="dtr-hidden" style="display: none;">
                  <div><button
                      class="btn btn-sm btn-icon btn-text-secondary text-body waves-effect rounded-pill dropdown-toggle hide-arrow"
                      data-bs-toggle="dropdown"><i class="ri-more-2-line"></i></button>
                    <div class="dropdown-menu dropdown-menu-end m-0"><a
                        href=" https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-1/app/ecommerce/order/details"
                        class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item delete-record">Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="row mx-1">
            <div class="col-sm-12 col-md-6">
              <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Displaying 1 to 10 of
                100 entries</div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                <ul class="pagination">
                  <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a
                      aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1"
                      class="page-link">Previous</a></li>
                  <li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" role="link"
                      aria-current="page" data-dt-idx="0" tabindex="0" class="page-link">1</a></li>
                  <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link"
                      data-dt-idx="1" tabindex="0" class="page-link">2</a></li>
                  <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link"
                      data-dt-idx="2" tabindex="0" class="page-link">3</a></li>
                  <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link"
                      data-dt-idx="3" tabindex="0" class="page-link">4</a></li>
                  <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link"
                      data-dt-idx="4" tabindex="0" class="page-link">5</a></li>
                  <li class="paginate_button page-item disabled" id="DataTables_Table_0_ellipsis"><a
                      aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="ellipsis" tabindex="-1"
                      class="page-link">…</a></li>
                  <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link"
                      data-dt-idx="9" tabindex="0" class="page-link">10</a></li>
                  <li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#"
                      aria-controls="DataTables_Table_0" role="link" data-dt-idx="next" tabindex="0" class="page-link">Next</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div style="width: 1%;"></div>
          <div style="width: 1%;"></div>
        </div>
        </div>


    </div>


      
    </div>
      </div>

    </div>
</div>
</div>

      @endsection

      @section('page-scriptt')
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    
<script>
  $(document).ready(function() {
      // When any chat-contact-list-item is clicked
      $('.chat-contact-list-item').click(function() {
          // Get the ID from the clicked list item
          var id = $(this).attr('id');

          // Perform AJAX request
          $.ajax({
            url: 'get-certf/' + id,   // Define your Laravel route here
              type: 'GET',           
              success: function(response) {
                  // Handle the response
                  console.log(response);
                  // alert('Data sent successfully! ID: ' + id);
              },
           
          });
      });
  });
</script>
  @endsection
