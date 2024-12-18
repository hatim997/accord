<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
<head>
    <title>Laravel Livewire Example</title>
    @livewireStyles

  
    
    <link rel="stylesheet" href="{{ asset(mix('assets/vendor/fonts/materialdesignicons.css')) }}" />
    <link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/node-waves/node-waves.css')) }}" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/core.css')) }}" />
    <link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/theme-default.css')) }}" />
    
    <link rel="stylesheet" href="{{ asset(mix('assets/css/demo.css')) }}" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')) }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link href="{{ asset('wizard.css') }}" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        var $j = jQuery.noConflict();
    </script>
    <style>

      canvas {
          touch-action: none; /* Prevent touch-based scrolling on touch devices */
      }
        </style>
</head>
<body>    
<div class="container">  
    <div class=" " style="background-color: transparent">
      <div class="card-header text-center">
        <img src="{{ asset('assets/img/logo.png') }}" alt class="" style="width: 180px">
        <h1 class="h2 text-center"> Insurance Agent - Registration </h1>
      </div>
      <div class="card-body">
        <livewire:wizard />
      </div>
    </div>        
</div>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.9/jquery.inputmask.min.js"></script>

<script>

    document.getElementById('togglePassword').addEventListener('click', function () {
        var passwordField = document.getElementById('passwordConfirmation');
        var toggleIcon = this.querySelector('i');
        
        // Toggle the password field type
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleIcon.classList.remove('mdi-eye-off-outline');
            toggleIcon.classList.add('mdi-eye-outline');
        } else {
            passwordField.type = 'password';
            toggleIcon.classList.remove('mdi-eye-outline');
            toggleIcon.classList.add('mdi-eye-off-outline');
        }
    });
    document.getElementById('togglePasswordd').addEventListener('click', function () {
        var passwordField = document.getElementById('passwordConfirmatiodn');
        var toggleIcon = this.querySelector('i');
        
        // Toggle the password field type
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleIcon.classList.remove('mdi-eye-off-outline');
            toggleIcon.classList.add('mdi-eye-outline');
        } else {
            passwordField.type = 'password';
            toggleIcon.classList.remove('mdi-eye-outline');
            toggleIcon.classList.add('mdi-eye-off-outline');
        }
    });

document.getElementById('customCloseButton').addEventListener('click', function() {
    // Assuming you are using Bootstrap's modal and the modal has an ID of 'exampleModal'
    $('#exampleModal').modal('hide'); // jQuery way to hide the modal
    
    // If you prefer to do it with vanilla JavaScript:
    // document.getElementById('exampleModal').classList.remove('show');
    // document.getElementById('exampleModal').style.display = 'none';
    // document.body.classList.remove('modal-open');
    // document.querySelector('.modal-backdrop').remove();
});
function formatPhoneNumber(phoneNumber) {
  // Remove non-numeric characters
  const cleanedNumber = phoneNumber.replace(/\D/g, '');

  // Handle invalid input (optional)
  if (cleanedNumber.length < 10) {
    return phoneNumber; // Or display an error message
  }

  // Format based on US phone number format
  const areaCode = cleanedNumber.slice(0, 3);
  const firstThreeDigits = cleanedNumber.slice(3, 6);
  const lastFourDigits = cleanedNumber.slice(6);

  return `(${areaCode}) ${firstThreeDigits}-${lastFourDigits}`;
}
const phoneInputs = document.querySelectorAll('#phone');

phoneInputs.forEach(function(input) {
  input.addEventListener('input', function() {
    const formattedNumber = formatPhoneNumber(this.value);
    this.value = formattedNumber; // Update input field with formatted value
  });
});
</script>
@livewireScripts  
  @yield('page-scripts')
<script src="{{ asset(mix('assets/vendor/libs/popper/popper.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/bootstrap.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/node-waves/node-waves.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/menu.js')) }}"></script>
@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->


@stack('scripts')
</body> 
</html>