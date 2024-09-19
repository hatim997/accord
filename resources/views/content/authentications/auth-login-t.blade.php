@extends('layouts/blankLayout')

@section('title', 'Login Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')
<div class="position-relative">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            @if(Session::has('danger'))
            <div class="alert alert-danger alert-dismissible" role="alert">
              {{ Session::get('danger') }}
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
            <!-- Login -->
                        <div class="card" >
                            <!-- Logo -->
                            {{-- <div class="app-brand justify-content-center mt-5">
                                <a href="{{url('/')}}" class="app-brand-link gap-2">
                                    <span
                                        class="app-brand-logo demo">@include('_partials.macros',["height"=>20,"withbg"=>'fill:
                                        #fff;'])</span>
                                    <span
                                        class="app-brand-text demo text-heading fw-semibold">{{config('variables.templateName')}}</span>
                                </a>
                            </div> --}}
                            <!-- /Logo -->

                            <div class="card-body p-0">
                                <div class="row p-0">
                                <div class="col-md-6 rounded-5" style="background-color: #24235b; border-start-start-radius: 10px;border-end-start-radius: 10px;">
                                    <div style="display :flex;flex: 1 1 0%;flex-direction: row;height: 100%;align-content: center;align-items: center;">

                                            <div class="d-flex flex-col align-content-center justify-content-center" >

                                                <a href="{{ route('landing') }}"
                                                <span
                                                class="app-brand-logo2 demo">@include('_partials.macross',["height"=>20,"withbg"=>'fill:
                                                #fff;'])</span>
                                                </a>




                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6" style=" border-start-end-radius: 10px;border-end-end-radius: 10px;">

                                <h4 class="mb-2 pt-4 pb-5 text-center">Carrier Login</h4>

                                <form id="formAuthentication" class="mb-3 py-3 px-4" action="{{url('/logint')}}" method="post">
                                    @csrf
                                    <div class="form-floating form-floating-outline mb-3">
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Enter your email or username" autofocus>
                                        <label for="email">Email or Username</label>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-password-toggle">
                                            <div class="input-group input-group-merge">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="password" id="password" class="form-control"
                                                        name="password"
                                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                        aria-describedby="password" />
                                                    <label for="password">Password</label>
                                                </div>
                                                <span class="input-group-text cursor-pointer"><i
                                                        class="mdi mdi-eye-off-outline"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                                    </div>
                                </form>

                                <p class="text-center">
                                    <span>New on our platform?</span>
                                    <a href="{{url('reg-trucker')}}">
                                        <span>Create an account</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


        <!-- /Login -->
        {{-- <img src="{{asset('assets/img/illustrations/tree-3.png')}}" alt="auth-tree"
            class="authentication-image-object-left d-none d-lg-block">
        <img src="{{asset('assets/img/illustrations/auth-basic-mask-light.png')}}"
            class="authentication-image d-none d-lg-block" alt="triangle-bg">
        <img src="{{asset('assets/img/illustrations/tree.png')}}" alt="auth-tree"
            class="authentication-image-object-right d-none d-lg-block"> --}}
    </div>
</div>
</div>
@endsection
