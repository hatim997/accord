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
            <div class="modal-body" style="color: black">
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
                <a href="#step-1" type="button" class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }}">1</a>
                <button class="btn " {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}> Step 1 </button>
            </div>
            <div class="stepwizard-step d-flex flex-row align-items-center">
                <a href="#step-2" type="button" class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">2</a>
                <button class="btn " {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}> Step 2 </button>
            </div>
            <div class="stepwizard-step d-flex flex-row align-items-center">
                <a href="#step-3" type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}" disabled="disabled">3</a>
                <button class="btn " {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}> Step 3 </button>
            </div>
        </div>
    </div>
</div>
        <div class="row p-3 setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1" >
            <div class="col-xs-12">
                <div class="row px-5">
                <div class="col-md-6">             
                    <div class="form-group p-3">
                        <label class="form-label required"for="title">Company Name:</label>
                        <input type="text" wire:model="name" class="form-control" id="taskTitle">
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group p-3">
                        <label class="form-label required"for="description">Federal Registration No. (MC Number)</label>
                        <input type="number" oninput="this.value=this.value.slice(0,8)"  maxlength="8"  wire:model="mc_number" class="form-control" id="productAmount"/>
                        @error('mc_number') <span class="error">{{ $message }}</span> @enderror
                    </div>      
                    <div class="form-group p-3">
                        <label class="form-label required"for="description">US Tax ID / Canadian Business Number</label>
                        <input type="text"  class="form-control" id="productAmount"/>
                        {{-- @error('description') <span class="error">{{ $message }}</span> @enderror --}}
                    </div>      
                    </div>
                    
                    <div class="col-md-6">
                   
      
                        <div class="form-group p-3">
                            <label class="form-label required"for="title">SCAC Code</label>
                            <input type="text"  maxlength="4" class="form-control" id="taskTitle">
                            {{-- @error('name') <span class="error">{{ $message }}</span> @enderror --}}
                        </div>
                        <div class="form-group p-3">
                            <label class="form-label required"for="description">US DOT #</label>
                            <input type="number" oninput="this.value=this.value.slice(0,8)"  maxlength="8"  class="form-control" id="productAmount"/>
                            {{-- @error('amount') <span class="error">{{ $message }}</span> @enderror --}}
                        </div>
          
                        <div class="form-group p-3">
                            <label for="description">Company Website address:</label>
                            <input type="text"  class="form-control" id="productAmount"/>
                            {{-- @error('description') <span class="error">{{ $message }}</span> @enderror --}}
                        </div>
          
                        </div>
                    </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit" type="button" >Next</button>
            </div>
        </div>
        <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> Step 2</h3>
      
                    <div class="form-group">
                        <label for="description">Product Status</label><br/>
                        <label class="radio-inline"><input type="radio" wire:model="status" value="1" {{{ $status == '1' ? "checked" : "" }}}> Active</label>
                        <label class="radio-inline"><input type="radio" wire:model="status" value="0" {{{ $status == '0' ? "checked" : "" }}}> DeActive</label>
                        @error('status') <span class="error">{{ $message }}</span> @enderror
                    </div>
      
                    <div class="form-group">
                        <label for="description">Product Stock</label>
                        <input type="text" wire:model="stock" class="form-control" id="productAmount"/>
                        @error('stock') <span class="error">{{ $message }}</span> @enderror
                    </div>
      
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="secondStepSubmit">Next</button>
                    <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(1)">Back</button>
                </div>
            </div>
        </div>
        <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> Step 3</h3>
      
                    <table class="table">
                        <tr>
                            <td>Product Name:</td>
                            <td><strong>{{$name}}</strong></td>
                        </tr>
                        <tr>
                            <td>Product Amount:</td>
                            <td><strong></strong></td>
                        </tr>
                        <tr>
                            <td>Product status:</td>
                            <td><strong>{{$status ? 'Active' : 'DeActive'}}</strong></td>
                        </tr>
                        <tr>
                            <td>Product Description:</td>
                            <td><strong>{{$description}}</strong></td>
                        </tr>
                        <tr>
                            <td>Product Stock:</td>
                            <td><strong>{{$stock}}</strong></td>
                        </tr>
                    </table>
      
                    <button class="btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">Finish!</button>
                    <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(2)">Back</button>
                </div>
            </div>
        </div>
    </div>
