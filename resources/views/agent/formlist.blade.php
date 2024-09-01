@php
    $isMenu = false;
    $navbarHideToggle = false;
@endphp
@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')


@section('content')
    <div class="row gy-4">
        <!-- Data Tables -->
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">

                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th class="text-truncate">Name</th>
                                <th class="text-truncate">Role</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            {{-- {{ dd($driver) ;}} --}}
                            @foreach ($driver->agents as $data)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('main_cert', $data->id) }}"
                                                class="btn btn-primary">{{ $data->name }}</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="btn btn-success">{{ str_replace('_', ' ', $data->role) }}</span>
                                        </div>
                                    </td>
                                    

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ Data Tables -->
    </div>
@endsection
