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

              <form action="{{ route('client.password.update', $data) }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $data }}" />

                <div class="form-group">
                    <label for="password" class="required">Password:</label>
                    <input type="password" name="password" class="form-control" id="password" required />
                    @error('password')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-2">

                  <button type="submit" class="btn btn-primary">Update Password</button>
                </div>
            </form>
            </div>
        </div>



        <!--/ Data Tables -->
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
