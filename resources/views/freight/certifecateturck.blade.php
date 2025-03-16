@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - main')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM/1N2pVq3U1xTTs3epFk+8bE95aJ6cfOgiTtK" crossorigin="anonymous" />
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
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
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
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table ">
                                <thead>
                                    <tr style="background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);">
                                        <th>Certificate Holders</th>
                                        <th>View / Edit COI</th>                                        
                                        <th>View / Download Certificate</th>
                                        <th>Send Email</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0 ">
                                    @foreach ($certificate as $cert)
                                        <tr>
                                            <td>
                                                <a class="custom-name" >
                                                    @if ($cert->ch)
                                                        {{$cert->name}}
                                                    @else
                                                      New Certificate Holder
                                                    @endif
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('freght_cert', $cert->id) }}" target="blank" class="custom-button eye-c">
                                                    <i class="fas fa-eye"></i> &nbsp;Show Certificate
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('get_pdf', $cert->id) }}" class="custom-button rounded-pill">
                                                    <i class="fa-solid fa-eye"></i>&nbsp;
                                                    view 
                                                </a>
                                                <a href="{{ route('get_pdf', $cert->id) }}" class="custom-button rounded-pill">
                                                    <i class="fa-solid fa-download"></i>&nbsp;
                                                    Download
                                                </a>
                                            </td>
                                            <td>
                                                <button type="button"    data-id="{{$cert->id}}"  data-bs-toggle="modal" data-bs-target="#exampleModal"  class="custom-button eye-c">
                                                    <i class="fas fa-envelope"></i> &nbsp;Send Mail
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm" style="width: 40rem">
                                                                <div class="modal-content">  <form action="{{route('mail')}}" method="POST"   >
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" id="recipient-id" name="ids">
                                            <div class="mb-3">
                                                <label for="emailTo" class="form-label">To</label>
                                                <input type="email" name="email" class="form-control" id="emailTo" placeholder="Recipient's email" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="emailSubject" class="form-label">Subject</label>
                                                <input type="text" name="sub" class="form-control" id="emailSubject" placeholder="Email subject" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="emailMessage" class="form-label">Message</label>
                                                <textarea class="form-control" name="texted" id="emailMessage" rows="3" placeholder="Your message" required></textarea>
                                            </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>







                    </div>
                </div>
                <!--/ Data Tables -->
            </div>
        </div>
    </div>
@endsection

@push('body-scripts')
<script>

    const exampleModal = document.getElementById('exampleModal');
    exampleModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        const button = event.relatedTarget;
        // Extract `data-id` value
        const recipientId = button.getAttribute('data-id');
        
        // Insert `id` into the modal (e.g., into an input field or span)
        const modalInput = exampleModal.querySelector('#recipient-id');
        modalInput.value = recipientId;
    });


  document.addEventListener('DOMContentLoaded', function () {
      // Select only the download buttons
      const downloadButtons = document.querySelectorAll('.custom-button.rounded-pill');
      const eyeButtons = document.querySelectorAll('.custom-button.eye-c');

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

      eyeButtons.forEach(button => {
          button.addEventListener('mouseenter', function() {
              const icon = this.querySelector('i.fa-eye');
              if (icon) {
                  icon.classList.add('fa-fade');
              }
          });

          button.addEventListener('mouseleave', function() {
              const icon = this.querySelector('i.fa-eye');
              if (icon) {
                  icon.classList.remove('fa-fade');
              }
          });
      });
  });
</script>
@endpush
