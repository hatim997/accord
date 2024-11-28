@php
$isMenu = false;
$navbarHideToggle = false;
@endphp
@extends('layouts/contentNavbarLayout')
@section('title', ' Vertical Layouts - Forms')
@section('content')

<style>
  .disabled-link {
      color: gray;
      pointer-events: none;
      cursor: not-allowed;
      text-decoration: none;
  }
  .card .table{
    text-align: center;
  }

  .custom-button {
      display: inline-flex;
      align-items: center;
      padding: 10px 15px;
      border-radius: 30px;
      color: black !important;
      font-weight: bold;
      text-decoration: none;
      transition: background-color 0.3s, transform 0.2s;
      border: none;
      font-size: 16px;
      position: relative;
  }

  .custom-name {
      color: black !important;
      font-weight: bold;
      text-decoration: none;
      border: none;
      font-size: 16px;

  }



  .custom-button i {
      margin-right: 5px;
  }

  .custom-button:hover {
      background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);
      transition: .2s;
      color: #fff !important;
      transform: translateY(-2px);
  }

  .custom-button:active {
      background-color: #004494; /* Even darker on active */
      transform: translateY(0);
  }

  .custom-button:focus {
      outline: none;
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5); /* Bootstrap primary focus */
  }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="row gy-4 justify-content-center">
  <div class="col-md-10 col-lg-10">
      <div class="row gy-4">
          <!-- Data Tables -->
          <div class="col-12">
              <div class="card">
                  <div class="table-responsive">
                      <table class="table ">
                          <thead>
                              <tr style="background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);">
                                  <th>Shipper Name</th>
                                  <th>File Name</th>

                              </tr>
                          </thead>
                          <tbody class="table-border-bottom-0 ">
                            @foreach ($shipper_certificates as $sc)
                                  <tr>
                                      <td>
                                          <a class="custom-name" >
                                            {{$sc->user_shipper->name}}
                                          </a>
                                      </td>

                                      <td>
                                          <a href="{{route('admin.view.certificate',$sc->path) }}" class="custom-button rounded-pill" target="_blank">
                                            <i class="fa-solid fa-eye"></i>&nbsp;
                                              View Certificate {{ $sc->id }}
                                          </a>
                                          <a href="{{route('get.value',$sc->path) }}" class="custom-button rounded-pill" target="_blank">
                                            <i class="fa-solid fa-eye"></i>&nbsp;
                                              Get Value  {{ $sc->id }}
                                          </a>
                                      </td>
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <!--/ Data Tables -->
      </div>
  </div>
</div>





    </div>
    <!--/ Striped Rows -->
  </div>
</div>
@endsection

@section('page-scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


@endsection
@push('body-scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
      // Select only the download buttons
      const downloadButtons = document.querySelectorAll('.custom-button.rounded-pill');


      downloadButtons.forEach(button => {
          button.addEventListener('mouseenter', function() {
              const icon = this.querySelector('i.fa-download');
              if (icon) {
                  icon.classList.add('fa-bounce');
              }
          });

          button.addEventListener('mouseleave', function() {
              const icon = this.querySelector('i.fa-download');
              if (icon) {
                  icon.classList.remove('fa-bounce');
              }
          });
      });


  });
</script>
@endpush
