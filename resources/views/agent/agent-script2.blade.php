 @push('body-scripts')
     <script type="text/javascript">
         function validateInput(event) {
             var inputValue = event.target.value.toUpperCase();
             var insuranceInputs = {
                 'A': 'insurA',
                 'B': 'insurB',
                 'C': 'insurC',
                 'D': 'insurD',
                 'E': 'insurE'
             };

             // Check if the corresponding insurance input has value
             var correspondingInputName = insuranceInputs[inputValue];
             console.log(correspondingInputName);

             if (correspondingInputName) {
                 var input = document.getElementById(correspondingInputName);
                 console.log(input);

                 if (input.options.length == 0) {
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
             }
         }
         $(document).ready(function() {
             var path = "{{ route('insurSearch') }}";


             $('#insurA').select2({
                 ajax: {
                     url: path,
                     dataType: 'json',
                     delay: 250,
                     processResults: function(data) {
                         return {
                             results: $.map(data, function(item) {
                                 return {
                                     text: item.name,
                                     id: item.id,
                                     naic: item.naic_number,
                                     best_rate: item.best_rating_number,
                                 }
                             })
                         };
                     },
                     cache: true
                 }
             }).on('select2:select', function(event) {
                 // This is how I got ahold of the data
                 var contact = event.params.data;
                 $('#naic_a').val(contact.naic);
                 $('#br_a').val(contact.best_rate);
                 // contact.suggestions ...
                 // contact.organization_id ...
             });

             $('#insurB').select2({
                 ajax: {
                     url: path,
                     dataType: 'json',
                     delay: 250,
                     processResults: function(data) {
                         return {
                             results: $.map(data, function(item) {
                                 return {
                                     text: item.name,
                                     id: item.id,
                                     naic: item.naic_number,
                                     best_rate: item.best_rating_number,
                                 }
                             })
                         };
                     },
                     cache: true
                 }
             }).on('select2:select', function(event) {
                 // This is how I got ahold of the data
                 var contact = event.params.data;
                 $('#naic_b').val(contact.naic);
                 $('#br_b').val(contact.best_rate);
                 // contact.suggestions ...
                 // contact.organization_id ...
             });

             $('#insurC').select2({
                 ajax: {
                     url: path,
                     dataType: 'json',
                     delay: 250,
                     processResults: function(data) {
                         return {
                             results: $.map(data, function(item) {
                                 return {
                                     text: item.name,
                                     id: item.id,
                                     naic: item.naic_number,
                                     best_rate: item.best_rating_number,
                                 }
                             })
                         };
                     },
                     cache: true
                 }
             }).on('select2:select', function(event) {
                 // This is how I got ahold of the data
                 var contact = event.params.data;
                 $('#naic_c').val(contact.naic);
                 $('#br_c').val(contact.best_rate);
                 // contact.suggestions ...
                 // contact.organization_id ...
             });

             $('#insurD').select2({
                 ajax: {
                     url: path,
                     dataType: 'json',
                     delay: 250,
                     processResults: function(data) {
                         return {
                             results: $.map(data, function(item) {
                                 return {
                                     text: item.name,
                                     id: item.id,
                                     naic: item.naic_number,
                                     best_rate: item.best_rating_number,
                                 }
                             })
                         };
                     },
                     cache: true
                 }
             }).on('select2:select', function(event) {
                 // This is how I got ahold of the data
                 var contact = event.params.data;
                 $('#naic_d').val(contact.naic);
                 $('#br_d').val(contact.best_rate);
                 // contact.suggestions ...
                 // contact.organization_id ...
             });

             $('#insurE').select2({
                 ajax: {
                     url: path,
                     dataType: 'json',
                     delay: 250,
                     processResults: function(data) {
                         return {
                             results: $.map(data, function(item) {
                                 return {
                                     text: item.name,
                                     id: item.id,
                                     naic: item.naic_number,
                                     best_rate: item.best_rating_number,
                                 }
                             })
                         };
                     },
                     cache: true
                 }
             }).on('select2:select', function(event) {
                 // This is how I got ahold of the data
                 var contact = event.params.data;
                 $('#naic_e').val(contact.naic);
                 $('#br_e').val(contact.best_rate);
                 // contact.suggestions ...
                 // contact.organization_id ...
             });
         });
     </script>
 @endpush
