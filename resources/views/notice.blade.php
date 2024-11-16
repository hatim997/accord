@php
$isMenu = false;
$navbarHideToggle = false;
@endphp

@extends('layouts/contentNavbarLayout')
@section('title', 'Vertical Layouts - Notifications')

@section('content')

<div class="row">
    <div class="col-xl">
        <div class="card">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                Notifications
                <form action="{{ route('notice.markAllAsRead') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" style="background: none; border:none; text-decoration:underline; font-size:15px;">
                        Mark All as Read
                    </button>
                </form>
            </h5>
            <div class="card-body">
                {{-- Unread Notifications --}}
                <h6 class="text-uppercase fw-bold text-primary">Unread Notifications</h6>
                @forelse ($notice->where('status', 0) as $n)
                    <a href="{{ route('notice.update', $n->id) }}" class="text-decoration-none">
                        <div class="alert alert-primary mb-1 text-center fw-normal fs-5 text-uppercase" role="alert">
                            {{ $n->name }}
                            <span class="badge bg-success ms-2">New</span>
                        </div>
                    </a>
                @empty
                    <div class="alert alert-warning text-center fw-normal fs-5 text-uppercase" role="alert">
                        No unread notifications.
                    </div>
                @endforelse

                <hr>

                {{-- Read Notifications --}}
                <h6 class="text-uppercase fw-bold text-secondary">Read Notifications</h6>
                @forelse ($notice->where('status', 1) as $n)
                    <a href="{{ route('notice.update', $n->id) }}" class="text-decoration-none">
                        <div class="alert alert-dark mb-1 text-center fw-normal fs-5 text-uppercase" role="alert">
                            {{ $n->name }}
                        </div>
                    </a>
                @empty
                    <div class="alert alert-light text-center fw-normal fs-5 text-uppercase" role="alert">
                        No read notifications.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

@endsection
