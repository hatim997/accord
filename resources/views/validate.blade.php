<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
<head>
    <title>  validate</title>


  
    
    <link rel="stylesheet" href="{{ asset(mix('assets/vendor/fonts/materialdesignicons.css')) }}" />
    <link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/node-waves/node-waves.css')) }}" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/core.css')) }}" />
    <link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/theme-default.css')) }}" />
    
    <link rel="stylesheet" href="{{ asset(mix('assets/css/demo.css')) }}" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')) }}" />
  

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 
</head>
<body>    
<div class="container">  
    <div class=" " style="background-color: transparent">
      <div class="card-header text-center">
        <img src="{{ asset('assets/img/logo.png') }}" alt class="" style="width: 180px">
        <h1 class="h2 text-center"> Email Validation</h1>
      </div>
      <div class="card-body">
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
          </div>
    @endif
    @if($errors->any())
       
                @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
                @endforeach
          
      
    @endif
    <form method="post"  action="{{ route('validation') }}" >
        @csrf
                <div class="row justify-content-center">
                    <div class="col-7">
                  <div class="form-floating form-floating-outline mb-4 text-center">
                    <input type="text" class="form-control" name="code" id="basic-default-fullname" placeholder="PIN CODE" />
                    <label for="basic-default-fullname">PIN CODE</label>
                    <button type="submit" class="btn btn-primary mt-5">Send</button>
                  </div>
                 
                     
                
                </div>
                
                   
            </div>
    </form>
      </div>
    </div>        
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.9/jquery.inputmask.min.js"></script>


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