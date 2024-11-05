@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp
@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - main')



@section('content')



    <div class="row gy-4 justify-content-center " id="content">
        <div class="col-md-10 col-lg-10">
            <div class="row gy-4">
                <!-- Congratulations card -->
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            </div>
        </div>

@endsection

