

 <div class="row">
     <div class="col-5">
         <div class="card mb-4">
             <div class="card-header d-flex justify-content-between align-items-center">
                 <h5 class="mb-0">INSURED</h5> <small class="text-muted float-end">Default label</small>
             </div>
             <div class="card-body">

                 <div class="form-floating form-floating-outline mb-4">
                     <input type="text" class="form-control" id="basic-default-fullname" placeholder="ACME Inc."
                         value="{{ $driver->name }}" readonly />
                     <label for="basic-default-fullname">Company</label>
                 </div>
                 <div class="form-floating form-floating-outline mb-4">
                     <input type="text" class="form-control" id="basic-default-company2" placeholder="Address line1"
                         value="{{ $driver->name }}" readonly />
                     <label for="basic-default-company2">Address</label>
                 </div>
                 <div class="row">
                     <div class="col-4">
                         <div class="mb-4">
                             <div class="form-floating form-floating-outline">
                                 <input type="text" id="basic-default-email" class="form-control"
                                     placeholder="Westlake Village" value="{{ $driver->truckers[0]->city }}" readonly />
                                 <label for="basic-default-email">City </label>
                             </div>
                         </div>
                     </div>
                     <div class="col-4">
                         <div class="form-floating form-floating-outline mb-4">
                             <input type="text" id="basic-default-phone" class="form-control" placeholder="6583"
                                 value="{{ $driver->truckers[0]->zip }}" readonly />
                             <label for="basic-default-phone">Zip code</label>
                         </div>
                     </div>
                     <div class="col-4">
                         <div class="form-floating form-floating-outline mb-4">
                             <input type="text" id="basic-default-phone" class="form-control" placeholder="CA"
                                 value="{{ $driver->truckers[0]->state }}" readonly />
                             <label for="basic-default-phone">State</label>
                         </div>
                     </div>
                 </div>
                 <div class="form-floating form-floating-outline mb-4">
                     <input type="text" id="basic-default-phone" class="form-control phone-mask"
                         placeholder="658 799 8941" value="{{ $driver->truckers[0]->contact_info }}" readonly />
                     <label for="basic-default-phone">Phone No</label>
                 </div>
             </div>
         </div>
     </div>
