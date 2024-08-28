@extends('layouts/contentNavbarLayout')
@section('title', ' Vertical Layouts - Forms')
@section('content')
    <Style>
        .green-square {
            width: 10px;
            height: 10px;
            background-color: green;
        }
        .hidden {
            display: none;
        }
        .red-square {
            width: 10px;
            height: 10px;
            background-color: red;
        }
        .modal {
  display: none; 
  position: fixed; 
  z-index: 1; 
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto; 
  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0,0.4); 
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto; 
  padding: 20px;
  border: 1px solid #888;
  width: 80%; 
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
    </Style>
    @php
        $isMenu = false;
        $navbarHideToggle = false;
    @endphp




<div class="modal" id="myModal" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"> Endorsements</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route("endors")}}" method="POST" enctype="multipart/form-data">
              @csrf
          @foreach ($endors as $item)
          @if($item->name != "others")
          <div class="form-check mt-3">
            <input class="form-check-input" name="endo_name[]" type="checkbox" value="{{$item->id}}" id="defaultCheck1" />
            <label class="form-check-label" for="defaultCheck1">
              {{$item->name}}
            </label>
          </div> 
          @else  
          <div class="form-check mt-3">
            <input class="form-check-input" name="endo_name[]" type="checkbox" value="{{$item->id}}" id="showTextboxCheckbox"/>
            <label class="form-check-label" for="defaultCheck1">
              {{$item->name}}
            </label>
          </div> 
          <div class="form-floating form-floating-outline mb-3">
            <input type="text" class="hidden form-control" name="other" id="dynamicTextbox" placeholder="example.com"  />
            <label for="OTHER">OTHER</label>
          </div>
          @endif
            @endforeach
            <div class="mb-3">
              <label for="formFileMultiple" class="form-label">Multiple files input example</label>
              <input class="form-control" name="files[]" type="file" id="formFileMultiple" multiple>
            </div>

        
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>
















    <div class="row gy-4 ">
        <div class="col-md-12 col-lg-12">
            <div class="row gy-4">
                <!-- Congratulations card -->
                <div class="col-md-3 col-lg-3">
                    <div class="card"
                        style="background: rgb(42,132,254); background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);">
                        <div class="card-body text-center" style="
                        height: 220px;
                    ">
                            <h4 class="mb-1 py-4 text-white">Policy Expiring in a Month !</h4>
                            <h2 class="py-3 text-white card-title" style="font-size: 72px">0</h2>
                        </div>
                        <div fxlayout="row" fxlayoutalign="start center" class="total_box ng-tns-c246-95"
                        style="flex-direction: row; box-sizing: border-box; display: flex; place-content: center flex-start; align-items: center;">
                        <span class="ng-tns-c246-95">&nbsp;</span><span class="num red-fg ng-tns-c246-95">&nbsp;</span><span
                            class="go-btn ng-tns-c246-95" tabindex="0">GO ></span>
                    </div>
                    </div>
                </div>
                <!--/ Congratulations card -->
                <!-- Congratulations card -->
                <div class="col-md-3 col-lg-3">
                    <div class="card"
                        style="background: rgb(42,132,254); background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);">
                        <div class="card-body text-center" style="
                        height: 220px;
                    ">
                            <h4 class="mb-1 py-4 text-white">Policy Expiring in a Week !</h4>
                            <h2 class="py-3 text-white card-title" style="font-size: 72px">0</h2>
                        </div>
                        <div fxlayout="row" fxlayoutalign="start center" class="total_box ng-tns-c246-95"
                        style="flex-direction: row; box-sizing: border-box; display: flex; place-content: center flex-start; align-items: center;">
                        <span class="ng-tns-c246-95">&nbsp;</span><span class="num red-fg ng-tns-c246-95">&nbsp;</span><span
                            class="go-btn ng-tns-c246-95" tabindex="0">GO ></span>
                    </div>
                    </div>
                </div>
                <!--/ Congratulations card -->


                <!-- Congratulations card -->
                <div class="col-md-3 col-lg-3">
                    <div class="card"
                        style="background: rgb(42,132,254); background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);">
                        <div class="card-body text-center" style="height: 220px;">
                            <h4 class="mb-1 py-4 text-white">No.of Active Cargo</h4>
                            <h2 class="py-3 text-white card-title" style="font-size: 72px">0</h2>
                        </div>
                       <div fxlayout="row" fxlayoutalign="start center" class="total_box ng-tns-c246-95"
                            style="flex-direction: row; box-sizing: border-box; display: flex; place-content: center flex-start; align-items: center;">
                            <span class="ng-tns-c246-95">&nbsp;</span><span class="num red-fg ng-tns-c246-95">&nbsp;</span><span
                                class="go-btn ng-tns-c246-95" tabindex="0">GO ></span>
                        </div>

                    </div>
                </div>
                <!--/ Congratulations card -->
                <!-- Congratulations card -->
                <div class="col-md-3 col-lg-3">
                    <div class="card"
                        style="background: rgb(42,132,254); background: linear-gradient(180deg, rgba(42,132,254,1) 0%, rgba(54,197,255,1) 100%);">
                        <div class="card-body text-center" style="
                        height: 220px;
                    ">
                            <h4 class="mb-1 py-4 text-white">No.of InActive Cargo</h4>
                            <h2 class="py-3 text-white card-title" style="font-size: 72px">0</h2>
                        </div>
                        <div fxlayout="row" fxlayoutalign="start center" class="total_box ng-tns-c246-95"
                        style="flex-direction: row; box-sizing: border-box; display: flex; place-content: center flex-start; align-items: center;">
                        <span class="ng-tns-c246-95">&nbsp;</span><span class="num red-fg ng-tns-c246-95">&nbsp;</span><span
                            class="go-btn ng-tns-c246-95" tabindex="0">GO ></span>
                    </div>
                    </div>
                </div>
                <!--/ Congratulations card -->
            </div>
        </div>

    </div>
    @push('body-scripts')
    <script>
      document.getElementById('showTextboxCheckbox').addEventListener('change', function () {
            var dynamicTextbox = document.getElementById('dynamicTextbox');
            if (this.checked) {
                dynamicTextbox.classList.remove('hidden');
            } else {
                dynamicTextbox.classList.add('hidden');
            }
        });


    window.onload = function() {
    var modal = document.getElementById("myModal");
    var span = document.getElementsByClassName("close")[0];
    
    // Show the modal
    modal.style.display = "block";

    // Close the modal when the "close" button is clicked
    span.onclick = function() {
      modal.style.display = "none";
    }

    // Prevent closing when clicking outside the modal
    window.onclick = function(event) {
      if (event.target === modal) {
        event.stopPropagation(); // Prevent the modal from closing
      }
    }
  }
      </script>
 @endpush

@endsection
