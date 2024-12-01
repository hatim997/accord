@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp
@extends('layouts/contentNavbarLayout')
@section('title', 'Vertical Layouts - Forms')
@section('content')


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="row">
        <div class="col-xl">
            {{-- {{dd($shipperLimt)}} --}}
            @forelse ($shipperLimt as $typeName => $records)
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 text-center" style="font-weight:bold;">{{ $typeName }}</h3>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($records as $item)
                                @if (isset($pdfDetails[$item->policy_limit_id]))
                                    <div class="col-12 mb-1">
                                        <div class="card shadow-sm">
                                            <div class="card-body d-flex">
                                                <div class="col-md-6">
                                                    <h6 style="font-size: 18px;">{{ $item->coverage_item }}: </h6>
                                                </div>
                                                <div class="col-md-6">
                                                    @php
                                                        $amount = (float) $pdfDetails[$item->policy_limit_id];
                                                    @endphp
                                                    @if ($amount > $item->policy_amount)
                                                        <span
                                                            style="color: rgb(0, 151, 0);font-weight:bold; font-size:20px;">{{ $amount }}</span>
                                                    @else
                                                        <span
                                                            style="color: red;font-weight:bold; font-size:20px;">{{ $amount }}</span>
                                                    @endif
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @empty
                <div>
                    
                  
                    <p>Their is no shipper limit , If you want to send notification  
                        <a href="{{ route('req.shipper.limit', ['id' => $user_id]) }}" class="badge bg-label-success rounded-pill">Click Here</a>
                    </p>
                </div>
                @endforelse
        </div>
    </div>

    <style>
        .modal-header {
            font-size: 1.25rem;
        }

        .confirmation-container {
            text-align: center;
            padding: 2rem;
            color: #333;
        }

        .info-text {
            font-size: 1rem;
        }

        .time-placed {
            font-weight: 600;
        }

        .border {
            border: 1px solid #ddd;
        }
      </style>


      @if(session('success'))
      @php
      $successData = session('success');
  @endphp

<div class="modal open" id="expiringPoliciesModal5" tabindex="-1" style="display: flex" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-xl">
  <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header justify-content-center align-items-center bg-primary text-white"
      style="background-color: #2170D8 !important; padding: 1rem 0; height: 4rem;">
     <h5 class="modal-title" style="color: #fff; margin: 0;">
         <i class="bi bi-check-circle-fill me-2"></i> Submission Successful
     </h5>
 </div>


      <!-- Modal Body -->
      <div class="modal-body">
          <div class="confirmation-container text-center p-4">
              <!-- Thank You Message -->
              <h1 class="display-6">Thank You! <span class="emoji">🎉</span></h1>
              <p class="info-text fs-5 mt-2 text-muted">Your request has been successfully submitted!</p>
          </div>
      </div>
  </div>
</div>
</div>

<!-- Styles (Add these to your CSS file) -->

<!-- Include Bootstrap Icons in your project if not already included -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

      @endif

@endsection

@push('body-scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    var openModalBtns = document.querySelectorAll(".open-modal-btn");
    var closeModalBtns = document.querySelectorAll(".close-btn");

    // Function to open the modal with overlay effect
    openModalBtns.forEach(function(btn) {
        btn.addEventListener("click", function() {
            var modalId = btn.getAttribute("data-modal");
            var modal = document.getElementById(modalId);

            // Display the modal and start the opening animation
            modal.style.display = "flex";
            setTimeout(function() {
                modal.classList.add("open");
            }, 10); // Slight delay to trigger the CSS transitions
        });
    });

    // Function to close the modal with overlay effect
    closeModalBtns.forEach(function(btn) {
        btn.addEventListener("click", function() {
            var modal = btn.closest(".modal");

            // Start the closing animation
            modal.classList.remove("open");
            setTimeout(function() {
                modal.style.display = "none"; // Hide the modal after animation
            }, 300); // Match the transition time in CSS
        });
    });

    // Close the modal when clicking outside the modal content
    window.onclick = function(event) {
        if (event.target.classList.contains("modal")) {
            var modal = event.target;

            // Start the closing animation
            modal.classList.remove("open");
            setTimeout(function() {
                modal.style.display = "none"; // Hide the modal after animation
            }, 300); // Match the transition time in CSS
        }
    };
});

</script>
@endpush
