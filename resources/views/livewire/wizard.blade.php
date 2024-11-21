<div class="container">


    @if (session()->has('message'))

    <div class="modal" id="exampleModal"  tabindex="-1" role="dialog" style="display: block;">
        <div class="modal-dialog" role="document">
          <div class="modal-content" style="background-color: #a7ffa0;">
            <div class="modal-header">
              <h5 class="modal-title">Registration Successful!</h5>
              <button type="button" class="close" id="customCloseButton" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="color: black; text-align: center">
            {{!! session('message') !!}}

            <a class="btn btn-primary" href="{{route('auth-login-basic')}} ">Okay</a>
         </div>
       </div>
      </div>
    </div>
@endif
    <div class="row p-2  bg-white">
        <div class="row stepwizard ">
            <div class="stepwizard-row setup-panel d-flex flex-row  justify-content-between">
                <div class="stepwizard-step d-flex flex-row  align-items-center ">
                    <a href="#step-1" type="button"
                        class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }}">1</a>
                    <button class="btn " {{ $currentStep !=2 ? 'btn-default' : 'btn-primary' }}> Step 1 </button>
                </div>
                <div class="stepwizard-step d-flex flex-row align-items-center">
                    <a href="#step-2" type="button"
                        class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">2</a>
                    <button class="btn " {{ $currentStep !=1 ? 'btn-default' : 'btn-primary' }}> Step 2 </button>
                </div>
                <div class="stepwizard-step d-flex flex-row align-items-center">
                    <a href="#step-3" type="button"
                        class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}"
                        disabled="disabled">3</a>
                    <button class="btn " {{ $currentStep !=2 ? 'btn-default' : 'btn-primary' }}> Step 3 </button>
                </div>
                <div class="stepwizard-step d-flex flex-row align-items-center">
                    <a href="#step-4" type="button"
                        class="btn btn-circle {{ $currentStep != 4 ? 'btn-default' : 'btn-primary' }}"
                        disabled="disabled">4</a>
                    <button class="btn " {{ $currentStep !=3 ? 'btn-default' : 'btn-primary' }}> Step 4 </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-3 setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
        <div class="col-xs-12">
            <div class="row px-5">
                <div class="col-md-6">
                    <div class="form-group py-3">
                        <label for="exampleFormControlSelect1">Prefix</label>
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">Mr</option>
                            <option value="2">Mrs</option>
                            <option value="3">Ms</option>
                        </select>
                    </div>
                    <div class="form-group py-3">
                        <label for="description" class="required">First Name:</label>
                        <input type="text" wire:model="fname" class="form-control" id="productAmount" />
                        @error('fname') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group py-3">
                        <label for="description">Middle Name:</label>
                        <input type="text" wire:model="mname" class="form-control" id="productAmount" />
                        @error('mname') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group py-3">
                        <label for="description"class="required">Last Name:</label>
                        <input type="text" wire:model="lname" class="form-control" id="productAmount" />
                        @error('lname') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group p-3">
                        <label for="title" class="required">Company Name:</label>
                        <input type="text" wire:model="name" class="form-control" id="taskTitle">
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group p-3">
                        <label for="description" class="required">
                            Insurance Agency License Number</label>
                        <input type="text" wire:model="ialn" class="form-control" id="productAmount" />
                        @error('ialn') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group py-3">
                        <label for="description" class="required">Suffix</label>
                        <input type="text" wire:model="suffix" class="form-control" id="productAmount" />
                        @error('suffix') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group py-3">
                        <label for="description"class="required">Title:</label>
                        <input type="text" wire:model="title" class="form-control" id="productAmount" />
                        @error('title') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>


            </div>
            <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                type="button">Next</button>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
        <div class="col-xs-12">
            <div class="row px-5">

                <div class="col-md-4">
                    <div class="form-group py-3">
                        <label for="description" class="required">Address 1:</label>
                        <input type="text" wire:model="address" class="form-control" id="productAmount" />
                        @error('address') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group py-3">
                        <label for="description" class="required">City:</label>
                        <input type="text" wire:model="city" class="form-control" id="productAmount" />
                        @error('city') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group py-3">
                        <label for="description" class="required">Phone No:</label>
                        <input type="text" wire:model="phone" class="form-control" id="phone" />
                        @error('phone') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group p-3">
                        <label for="description" >Company Website address:</label>
                        <input type="text" wire:model="websit" class="form-control" id="productAmount" />
                        @error('websit') <span class="error">{{ $message }}</span> @enderror

                    </div>

                </div>
                <div class="col-md-4">
                    <div class="form-group py-3">
                        <label for="description">Address 2</label>
                        <input type="text" wire:model="address2" class="form-control" id="productAmount" />
                        @error('address2') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group py-3">
                        <label for="description"class="required">State:</label>
                         @error('state') <span class="error">{{ $message }}</span> @enderror
                         <select class="form-control" id="productAmount"  wire:model="state" >

                            <option value='AL'>Alabama</option>
                            <option value='AK'>Alaska</option>
                            <option value='AZ'>Arizona</option>
                            <option value='AR'>Arkansas</option>
                            <option value='CA'>California</option>

                            <option value='CO'>Colorado</option>
                            <option value='CT'>Connecticut</option>
                            <option value='DE'>Delaware</option>
                            <option value='DC'>District of Columbia</option>
                            <option value='FL'>Florida</option>

                            <option value='GA'>Georgia</option>
                            <option value='HI'>Hawaii</option>
                            <option value='ID'>Idaho</option>
                            <option value='IL'>Illinois</option>
                            <option value='IN'>Indiana</option>

                            <option value='IA'>Iowa</option>
                            <option value='KS'>Kansas</option>
                            <option value='KY'>Kentucky</option>
                            <option value='LA'>Louisiana</option>
                            <option value='ME'>Maine</option>

                            <option value='MD'>Maryland</option>
                            <option value='MA'>Massachusetts</option>
                            <option value='MI'>Michigan</option>
                            <option value='MN'>Minnesota</option>
                            <option value='MS'>Mississippi</option>

                            <option value='MO'>Missouri</option>
                            <option value='MT'>Montana</option>
                            <option value='NE'>Nebraska</option>
                            <option value='NV'>Nevada</option>
                            <option value='NH'>New Hampshire</option>

                            <option value='NJ'>New Jersey</option>
                            <option value='NM'>New Mexico</option>
                            <option value='NY'>New York</option>
                            <option value='NC'>North Carolina</option>
                            <option value='ND'>North Dakota</option>

                            <option value='OH'>Ohio</option>
                            <option value='OK'>Oklahoma</option>
                            <option value='OR'>Oregon</option>
                            <option value='PA'>Pennsylvania</option>
                            <option value='RI'>Rhode Island</option>

                            <option value='SC'>South Carolina</option>
                            <option value='SD'>South Dakota</option>
                            <option value='TN'>Tennessee</option>
                            <option value='TX'>Texas</option>
                            <option value='UT'>Utah</option>

                            <option value='VT'>Vermont</option>
                            <option value='VA'>Virginia</option>
                            <option value='WA'>Washington</option>
                            <option value='WV'>West Virginia</option>
                            <option value='WI'>Wisconsin</option>

                            <option value='WY'>Wyoming</option>
                            </select>

                    </div>
                    <div class="form-group py-3">
                        <label for="description">Fax No:</label>
                        <input type="text" wire:model="fax" class="form-control" id="phone" />
                        @error('fax') <span class="error">{{ $message }}</span> @enderror
                    </div>

                </div>


                <div class="col-md-4">
                    <div class="form-group py-3">
                        <label for="description"class="required">Zip Code:</label>
                        <input type="number" oninput="this.value=this.value.slice(0,5)" maxlength="5" wire:model="zip"
                            class="form-control" id="productAmount" />
                        @error('zip') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group py-3">
                        <label for="description">Country:</label>
                        <input type="text" wire:model="country" class="form-control" id="productAmount" />
                        @error('country') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group py-3">
                        <label for="description"class="required">Email:</label>
                        <input type="email" wire:model="email" class="form-control" id="productAmount" />
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>

                </div>
            </div>
            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(1)">Back</button>
            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                wire:click="secondStepSubmit">Next</button>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
        <div class="col-xs-12">
            <div class="row justify-content-center">
                <div class="col-xs-6  col-md-6">
                    <div class="form-group my-5">

                        <label class="form-label required" for="basic-default-password42">Password</label>
                        <div class="input-group">
                            <input type="password" wire:model="password" class="form-control" id="passwordConfirmation" />
                            <span class="input-group-text cursor-pointer" id="togglePassword"><i class="mdi mdi-eye-off-outline"></i></span>

                            @error('password') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <label class="form-label required" for="basic-default-password42">Password</label>
                        <div class="input-group">
                            <input type="password" wire:model="password_confirmation" id="passwordConfirmatiodn" class="form-control" />
                            <span class="input-group-text cursor-pointer" id="togglePasswordd"><i class="mdi mdi-eye-off-outline"></i></span>
                            @error('password') <span class="error">{{ $message }}</span> @enderror
                        </div>

                    </div>
                </div>
            </div>
            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(2)">Back</button>
            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                wire:click="thirdStepSubmit">Next</button>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 4 ? 'displayNone' : '' }}" id="step-4">
        <div class="col-xs-12">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <table class="">

                        <tr>
                            <th style="width:50%"> Prefix</th>
                            <th style=" text-align: right;">-</th>
                        </tr>
                        <tr>
                            <td>First Name: </td>
                            <td style=" text-align: right;">{{$fname}}</td>
                        </tr>
                        <tr>
                            <td>Middel Name: </td>
                            <td style=" text-align: right;">{{$mname}}</td>
                        </tr>
                        <tr>
                            <td>Last Name: </td>
                            <td style=" text-align: right;">{{$lname}}</td>
                        <tr>
                            <td>Suffix </td>
                            <td style=" text-align: right;">{{$suffix}}</td>
                        </tr>
                        <tr>
                            <td>Title </td>
                            <td style=" text-align: right;">{{$title}}</td>
                        </tr>
                        <tr>
                            <th style="width:70%">Company Name:</th>
                            <th style=" text-align: right;">{{$name}}</th>
                        </tr>
                        <tr>


                        </tr>
                        <tr>
                            <td>US Tax ID / Canadian Business Number</td>
                            <td style=" text-align: right;">{{$ialn}}</td>
                        </tr>
                        <tr>

                        <tr>

                        </tr>

                    </table>
                </div>

                <div class="col-md-6">
                    <table class=" ">


                        <tr>
                            <td>Email </td>
                            <td style=" text-align: right;">{{$email}}</td>
                        </tr>

                        <tr>
                            <td>Phone No: </td>
                            <td style=" text-align: right;">{{$phone}}</td>
                        </tr>

                        <tr>
                            <td>Fax No: </td>
                            <td style=" text-align: right;">{{$fax}}</td>
                        </tr>
                        <tr>
                            <td>Address: </td>
                            <td style=" text-align: right;">{{$address}}</td>
                        </tr>
                        <tr>
                            <td>Address2: </td>
                            <td style=" text-align: right;">{{$address2}}</td>
                        </tr>

                        <tr>
                            <td>Zip Code: </td>
                            <td style=" text-align: right;">{{$zip}}</td>
                        </tr>
                        <tr>
                            <td>State: </td>
                            <td style=" text-align: right;">{{$state}}</td>
                        </tr>
                        <tr>
                            <td>Country: </td>
                            <td style=" text-align: right;">{{$country}}</td>
                        </tr>
                        <tr>
                            <td> Company Website address:</td>
                            <td style=" text-align: right;">{{$websit}}</td>
                        </tr>
                    </table>
                </div>

            </div>
            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(3)">Back</button>
            <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="forthStepSubmit"
                type="button">Next!</button>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 5 ? 'displayNone' : '' }}" id="step-5">
        <div class="col-xs-12">
            <div class="row justify-content-center" style="height: 80vh">
                <h4 style="font-weight: 600;  " class="text-center"> Accept the terms & conditions of the COI 360
                    electronically as below</h4>
                <h6>Accept the terms & conditions below:</h6>

                <div class="px-3">
                    <div class="form-check mb-5">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" />
                        <label class="form-check-label required" for="defaultCheck2">
                            I accept the terms and conditions of the COI 360 and submit the following signature page as
                            confirmation of my agreement to this Addendum.
                        </label>
                    </div>
                    <div class="row py-5" style="background: #f4f4f5; border-radius: 20px; margin:0rem 3rem;">
                        <div class="col-md-6 text-center">
                            <h3> Draw your eSignature here </h3>
                    </div>
                    <div class="col-md-6 text-center">
                        <h3>Your signature shows here </h3>
                </div>
                            <div class="col-md-6 text-center">

                 <canvas id="signature-pad" class="" 
                        style="border: 1px dotted #9b9b9bcc; width: 200px; height: 100px; border-radius: 15px; background:#fff;" 
                        width="200" 
                        height="100">
                    </canvas> </div>  
                    <div class="col-md-6 text-center" style="display: flex; justify-content: center;"> 
                    <div id="showimage"  width="200" 
                    height="100" style="border: 1px dotted #9b9b9bcc; width: 200px; height: 100px; border-radius: 15px;"></div> </div>
                 
                        
                        <div class="col-md-12 text-center" style="
                        display: flex;
                        justify-content: center;
                        flex-direction: row;
                        align-items: center;
                    ">
                            <button class="btn" id="clear"><i class="mdi mdi-refresh"></i>
                            </button> <button class="btn btn-primary d-grid  waves-effect waves-light" id="save">Upload</button> </div>  
                        <input type="hidden" wire:model="image" class="form-control" id="inputGroupFile01"
                            aria-describedby="defaultFormControlHelp">
                        @error('image') <span class="error">{{ $message }}</span> @enderror
                       
                    </div>
                </div>
                <button class="btn btn-success btn-lg pull-right" wire:click="fithStepSubmit"
                    type="button">Finish!</button>
                    <div wire:loading>
                       <p class="text-danger">
                           Processing Submition...
                        </p>
                    </div>
                     <script>
document.addEventListener('DOMContentLoaded', () => {
    const canvas = document.getElementById('signature-pad');
    const signaturePad = new SignaturePad(canvas);

    // Save and show signature as an image
    document.getElementById('save').addEventListener('click', () => {
        if (signaturePad.isEmpty()) {
            alert('Please provide a signature first.');
            return;
        }

        const imageData = canvas.toDataURL('image/png');
        const hiddenInput = document.getElementById('inputGroupFile01');
        hiddenInput.value = imageData;
        @this.set('image', imageData); 
        // Set the base64 image data to the hidden input field
       // Set the value of the hidden input
    //    Livewire.emit('fithStepSubmit', imageData);
        // Create an image element for preview (optional)
        const img = document.createElement('img');
        img.src = imageData; // Set the Base64 image as the source
        img.alt = 'Signature';
        img.style.maxWidth = '100%'; // Ensure responsive sizing
        img.style.height = 'auto';
       
        // Append the image to the container with ID "showimage"
        const showImageContainer = document.getElementById('showimage');
        showImageContainer.innerHTML = ''; // Clear any existing content
        showImageContainer.appendChild(img); // Append the new image
    });

    // Clear the signature pad
    document.getElementById('clear').addEventListener('click', () => {
        signaturePad.clear(); // Clears the canvas
        document.getElementById('showimage').innerHTML = ''; // Clears the image preview

        // Clear the hidden input value
        const hiddenInput = document.getElementById('inputGroupFile01');
        hiddenInput.value = ''; // Clear the hidden input value
    });
});




    // document.addEventListener('DOMContentLoaded', () => {
    //     const canvas = document.getElementById('signature-pad');
    //     const signaturePad = new SignaturePad(canvas);

    //     // Save and show signature as an image
    //     document.getElementById('save').addEventListener('click', () => {
    //         if (signaturePad.isEmpty()) {
    //             alert('Please provide a signature first.');
    //             return;
    //         }

    //         const imageData = canvas.toDataURL('image/png');

    //         // Create an image element
    //         const img = document.createElement('img');
    //         img.src = imageData; // Set the Base64 image as the source
    //         img.alt = 'Signature';
    //         img.style.maxWidth = '100%'; // Ensure responsive sizing
    //         img.style.height = 'auto';

    //         // Append the image to the container with ID "showimage"
    //         const showImageContainer = document.getElementById('showimage');
    //         showImageContainer.innerHTML = ''; // Clear any existing content
    //         showImageContainer.appendChild(img); // Append the new image
    //     });

    //     // Clear the signature pad
    //     document.getElementById('clear').addEventListener('click', () => {
    //         signaturePad.clear(); // Clears the canvas
    //         document.getElementById('showimage').innerHTML = ''; // Clears the image preview
    //     });
    // }); 


                      
                    </script>
            </div>
        </div>
    </div>
