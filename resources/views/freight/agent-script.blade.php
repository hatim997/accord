 @push('body-scripts')




     <script type="text/javascript">$(document).ready(function() {
        // Handle dropdown change
        $('#shipplist').change(function() {
            if ($(this).val() === 'add-new') {
                $('#addNewModal').show();
            }
        });
    
        // Handle modal close
        $('.close').click(function() {
            $('#addNewModal').hide();
        });
    
        // Handle form submission
        $('#addNewDriverForm').submit(function(event) {
            event.preventDefault();
            CName
            // Get form data
            var name = $('#driverName').val();
            var email = $('#naicNumber').val();
            var cname = $('#CName').val();
            // AJAX request to add new driver
            $.ajax({
                url: "{{ route('short.shipper') }}", //
                type: 'POST',
                data: {
                    name: name,
                    email: email,
                    Cname: cname,
                    _token: $('input[name="_token"]').val()  // CSRF token for Laravel
                },
                success: function(data) {
                    console.log(data); 
    if (data.success) {
        // Add the new driver to the dropdown
        $('#shipplist').append(
            $('<option>', {
                value: data.newDriverId,
                text: data.newDriverName  // Use data.newDriverName instead of newDriverName
            })
        );
        
        // Optionally, set the new driver as selected
        $('#shipplist').val(data.newDriverId);
        
        // Close the modal
        $('#addNewModal').hide();
        
        // Reset the form
        $('#addNewDriverForm')[0].reset();
    } else {
        alert('Error adding driver');
    }
},
                error: function(xhr) {
        if (xhr.status === 422) {  // 422 is Laravel's validation error status code
            var errors = xhr.responseJSON.errors;  // Get errors from response
            // Clear previous errors
            // alert(errors);
            // Loop through each error and display it
            $.each(errors, function(key, value) {
                // Assuming you have spans with IDs like 'driverName-error', 'naicNumber-error', etc.
                alert(value[0]);
                  $('#' + key + '-error').html(value[0]);  // Display the first error message
            });
        } else {
            alert('An unexpected error occurred. Please try again.');
        }
    }
            });
        });
    });











// $(document).ready(function () {
//     $(":input").not("[name=ch],[name=btnsub],[name=cert_id],[name=_token]")
//         .prop("disabled", true);
// });

  $(document).ready(function() {
    $('.selecter').select2();
  });
    // Get all checkboxes
    var checkboxes = document.querySelectorAll('.abcd');
    // Add event listener to each checkbox
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            validateCheckboxes();
        });
    });
    // Add event listener to the button


    function validateCheckboxes() {
        var atLeastOneChecked = false;

        // Check if at least one checkbox is checked
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                atLeastOneChecked = true;
            }
        });

        // Update the hidden input with the validation status
        document.getElementById('checkboxValidation').value = atLeastOneChecked ? 'true' : 'false';
    }

    $('.toupper').keyup(function() {
        this.value = this.value.toLocaleUpperCase();
    });

function validateInput(event) {
    var inputValue = event.target.value.toUpperCase();
    var insuranceInputs = {
        'A': 'insurA',
        'B': 'insurB',
        'C': 'insurC',
        'D': 'insurD',
        'E': 'insurE',
         'F': 'insurF'
    };

    // Check if the corresponding insurance input has value
    var correspondingInputName = insuranceInputs[inputValue];
    if (correspondingInputName !== undefined) {
        var input = document.getElementById(correspondingInputName);
        //console.log(correspondingInputName);
        if (input.value.trim() === '') {
            const swalWithBootstrapButtons = Swal.mixin({
                         customClass: {
                             confirmButton: "btn btn-danger"
                         },
                         buttonsStyling: false
                     });
                     swalWithBootstrapButtons.fire({
                         title: 'Error!',
                         text: 'Error: Please fill out the corresponding insurance input before proceeding.',
                         icon: 'error',
                         confirmButtonText: 'OK'
                     });
                     event.target.value = ''; // Clear the input value
        }
    } else {
      const swalWithBootstrapButtons = Swal.mixin({
                         customClass: {
                             confirmButton: "btn btn-danger"
                         },
                         buttonsStyling: false
                     });
                     swalWithBootstrapButtons.fire({
                         title: 'Error!',
                         text: 'Error: Please Select the Insurance from Range A, B, C, D, E,F',
                         icon: 'error',
                         confirmButtonText: 'OK'
                     });
                     event.target.value = '';
    }
}

  $(document).ready(function() {
      var path = "{{ route('insurSearch') }}";

    $('#insurA').on('change',function(){
        $('#naic_a').val($(this).find(':selected').data('naic'));

        $('#br_a').val($(this).find(':selected').data("brn"));
        $('#insurance_provider_id_A').val(this.value);
    });

    $('#insurB').on('change',function(){
        $('#naic_b').val($(this).find(':selected').data('naic'));

        $('#br_b').val($(this).find(':selected').data("brn"));
        $('#insurance_provider_id_B').val(this.value);
    });

    $('#insurC').on('change',function(){
        $('#naic_c').val($(this).find(':selected').data('naic'));

        $('#br_c').val($(this).find(':selected').data("brn"));
        $('#insurance_provider_id_C').val(this.value);
    });

    $('#insurD').on('change',function(){
        $('#naic_d').val($(this).find(':selected').data('naic'));

        $('#br_d').val($(this).find(':selected').data("brn"));
        $('#insurance_provider_id_D').val(this.value);
    });

    $('#insurE').on('change',function(){
        $('#naic_e').val($(this).find(':selected').data('naic'));

        $('#br_e').val($(this).find(':selected').data("brn"));
        $('#insurance_provider_id_E').val(this.value);
    });

    $('#insurF').on('change',function(){
        $('#naic_f').val($(this).find(':selected').data('naic'));

        $('#br_f').val($(this).find(':selected').data("brn"));
        $('#insurance_provider_id_F').val(this.value);
    });
  });

  $('input[type="number"]').each((i, ele) => {
    let clone = $(ele).clone(false);
    clone.attr('type', 'text');
    let ele1 = $(ele);
    
    let originalValue = ele1.val();
    let formattedValue = originalValue ? Number(originalValue).toLocaleString('en') : '';

    clone.val(formattedValue);
    $(ele).after(clone);
    $(ele).hide();

    clone.mouseenter(() => {
        ele1.show();
        clone.hide();
    });

    setInterval(() => {
        let currentVal = ele1.val();
        let newFormattedValue = currentVal ? Number(currentVal).toLocaleString('en') : '';
        if (clone.val() != newFormattedValue) {
            clone.val(newFormattedValue);
        }
    }, 10);

    $(ele).mouseleave((event) => {
        if ($(ele).is(':focus')) {
            event.preventDefault();
        } else {
            $(clone).show();
            $(ele1).hide();
        }
    });

    $(ele).focusout(() => {
        $(clone).show();
        $(ele1).hide();
    });
});


function validateDates() {
        var startDates = document.querySelectorAll('#startDate');
        var expirationDates = document.querySelectorAll('#endDate');

        // Iterate through each pair of dates
        for (var i = 0; i < startDates.length; i++) {
            var startDate = new Date(startDates[i].value);
            var expirationDate = new Date(expirationDates[i].value);

            if (expirationDate <= startDate) {
                alert('Policy expiration date must be after start date for entry ');
                // Optionally, handle the validation error (e.g., disable a button)
                return false;
            }
        }
        return true;
    }

</script>
 @endpush
