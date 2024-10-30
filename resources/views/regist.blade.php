
  {{-- <form method="POST" action="{{ route('register') }}">
      @csrf --}}

      <!-- Name -->
      <form id="AddForm">
        
        <!-- Basic Layout -->
   
          
    
   

    
     
        <div class="row">
            <div class="col-6">
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control" name="username" id="username" placeholder="ACME Inc." />
            <label for="username1">USERNAME</label>
          </div>
        </div>
          <div class="col-6">
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control"name="email" id="email1" placeholder="example.com" required />
            <label for="email1">EMAIL</label>
        </div>
    </div>


    <div class="col-6">
      <div class="form-floating form-floating-outline mb-4">
        <input type="text" class="form-control"name="altemail" id="altemail1" placeholder="Address line1" />
        <label for="altemail1">ALT EMAIL</label>
    </div>
</div> 
 <div class="col-6">
  <div class="form-floating form-floating-outline mb-4">
    <input type="text" class="form-control"name="phone" id="phone1" placeholder="Address line1" />
    <label for="phone1">CONTACT #</label>
</div>
</div>
        <div class="col-6">
        <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control" name="password1" id="password"  placeholder="********" />
            <label for="password1">PASSWORD</label>
        </div>
    </div> 
          <div class="col-6">
          <div class="mb-4">           
            <div class="form-floating form-floating-outline mb-4">
                <select class="form-select" name="role" id="role_id1" aria-label="Default select example">
                <option selected>Open this select  menu</option>
                  <option value="admin">ADMIN</option>
                  <option value="agent">AGENT</option>
                  <option value="truck_driver">TRUCK</option>
                  <option value="shipper">SHIPPER</option>     
                  <option value="freight_driver">FREIGHT</option>                  
                </select>
                <label for="role_id1">ROLE OF USER</label>
              </div>           
          </div>
        </div>
        <div class="col-6">
        
        <div class="form-floating form-floating-outline mb-4">
          <input type="text" class="form-control" name="fullname" id="fullname1" placeholder="ACME Inc." />
          <label for="fullname1"> NAME</label>
        </div>
      </div>
        <div class="col-6">
        <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control" name="Addss"id="Addss1"  placeholder="" />
            <label for="Addss1"> ADDRESS 1</label>
        </div>
    </div> 
          <div class="col-6">
            <div class="form-floating form-floating-outline mb-4">
              <input type="text" class="form-control" name="Addss2"id="Address21"  placeholder="" />
              <label for="Address21"> ADDRESS 2</label>
          </div>
        </div>
        <div class="col-6">
          <div class="form-floating form-floating-outline mb-4">
              <input type="text" class="form-control" name="state"id="state1"  placeholder="" />
              <label for="state1">STATE</label>
          </div>
      </div> 
            <div class="col-6">
              <div class="form-floating form-floating-outline mb-4">
                <input type="text" class="form-control" name="country"id="country1"  placeholder="" />
                <label for="country1"> COUNTRY</label>
            </div>
          </div>
          <div class="col-6">
            <div class="form-floating form-floating-outline mb-4">
                <input type="text" class="form-control" name="city"id="city1"  placeholder="" />
                <label for="city1"> CITY</label>
            </div>
        </div> 
              <div class="col-6">
                <div class="form-floating form-floating-outline mb-4">
                  <input type="text" class="form-control" name="zip"id="zip1"  placeholder="" />
                  <label for="zip1"> ZIP</label>
              </div>
            </div>
                 
        
      </div>     {{-- card end --}}
  </div> <div class="flex items-center justify-end mt-4">
          <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
              {{ __('Already registered?') }}
          </a>        
      </div>
 
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="saveButton" class="btn btn-primary">Save changes</button>
  
  </form>
  <script>
    $('#saveButton').click(function(e) {
    
      var form = document.getElementById('AddForm');
          var formData = new FormData(form);
    
         
    
    // Display the string in an alert
    
    // alert(formData);
     console.log(formData);
    
      $.ajax({
        url: '/reg',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,  // Important! Don't process the data
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            // Check if response contains the expected message
            if (response && response.message !== undefined) {
                alert(response.message);
                // Additional logic after a successful save
                location.reload();
                $('#modalCenter').modal('hide');
            }
            else{
              console.log(response.error);
            }
        },
        error: function(error) {
            console.error('Error saving data:', error);
        }
      });
      $('#modalCenter').modal('hide');
    });
    
    
    
    
    </script>
</x-guest-layout>
