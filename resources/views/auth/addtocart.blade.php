@php
$isMenu = false;
$navbarHideToggle = false;
@endphp

@extends('layouts/commonMaster')
@push('body-style')
<link rel="stylesheet" href="{{ asset('assets/css/invoice_style.css') }}">
@endpush

@section('layoutContent')

<div class="container authentication-wrapper authentication-basic container-p-y">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row invoice-preview">
            <div class="col-xl-12 col-md-8 col-12 mb-md-0 mb-6">
                <div class="card invoice-preview-card p-sm-12 p-6">
                    <div class="card-body invoice-preview-header rounded p-6 text-heading">
                        <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column">
                            <div class="mb-xl-0 mb-6">
                                <div class="d-flex svg-illustration align-items-center gap-3 mb-6">
                                    <img src="assets/img/Logo.png" alt="Masco" width="59" height="50" />
                                    <span class="mb-0 app-brand-text fw-semibold">Accord</span>
                                </div>
                            </div>
                            <div>
                              @if(session('success'))
                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  {{ session('success') }}
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                          @endif

                          @if(session('success'))
                          <script>
                              window.onload = function() {
                                  alert("{{ session('success') }}");
                              };
                          </script>
                      @endif
                                <h5 class="mb-6 text-nowrap">Invoice #{{ $invoiceNumber }}</h5>
                                <div class="mb-1">
                                    <span>Date Issued:</span>
                                    <span>{{ now()->format('F d, Y') }}</span>
                                </div>
                                <div>
                                    <span>Date Due:</span>
                                    <span>{{ now()->addMonth()->format('F d, Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="d-flex justify-content-between flex-wrap row-gap-2">
                            <div class="my-1">
                                <h6>Invoice To:</h6>
                                @foreach ($data as $item)
                                    <p class="mb-1">{{ $item->name }}</p>
                                    <p class="mb-1">{{ $item->address }}</p>
                                    <p class="mb-1">{{ $item->address2 }}</p>
                                    <p class="mb-1">{{ $item->city }}, {{ $item->state }}, {{ $item->zip }}</p>
                                    <p class="mb-0">{{ $item->cellphone }}</p>
                                @endforeach
                            </div>
                            <div class="my-1">
                                <h6>Bill To:</h6>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="pe-4">Total Due:</td>
                                            <td>${{ number_format($subs_idd->price, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-4">Bank name:</td>
                                            <td>American Bank</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-4">Country:</td>
                                            <td>United States</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-4">IBAN:</td>
                                            <td>ETD95476213874685</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-4">SWIFT code:</td>
                                            <td>BR91905</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive border rounded border-bottom-0">
                        <table class="table m-0">
                            <thead>
                                <tr style="color: black">
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th>Cost</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-nowrap text-heading">{{ $subs_idd->name }}</td>
                                    <td class="text-nowrap">{{ $subs_idd->description }}</td>
                                    <td>${{ number_format($subs_idd->price, 2) }}</td>
                                    <td>1</td> <!-- Assuming qty is 1 for subscription plan -->
                                    <td>${{ number_format($subs_idd->price, 2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table m-0 table-borderless">
                            <tbody>
                                <tr>
                                    <td class="align-top pe-6 ps-0 py-6">
                                        <p class="mb-1">
                                            <span class="me-2 h6">Salesperson:</span>
                                            <span>Alfie Solomons</span>
                                        </p>
                                        <span>Thanks for your business</span>
                                    </td>
                                    <td class="px-0 py-6 w-px-100">
                                        <p class="mb-1">Subtotal:</p>
                                        <p class="mb-1">Discount:</p>
                                        <p class="mb-2 border-bottom pb-2">Tax:</p>
                                        <p class="mb-0">Total:</p>
                                    </td>
                                    <td class="text-end px-0 py-6 w-px-100">
                                        <p class="fw-medium text-heading mb-1">${{ number_format($subs_idd->price, 2) }}</p>
                                        <p class="fw-medium text-heading mb-1">$0.00</p>
                                        <p class="fw-medium text-heading mb-2 border-bottom pb-2">$0.00</p>
                                        <p class="fw-medium text-heading mb-0">${{ number_format($subs_idd->price + 0, 2) }}</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr class="mt-0 mb-6">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12">
                                <span class="fw-medium text-heading">Note:</span>
                                <span>It was a pleasure working with you and your team. We hope you will keep us in mind for future projects. Thank You!</span>
                            </div>
                        </div>
                    </div>
                    <!-- Add Pay Now Button -->
                    <div class="text-end mb-4">
                        <form action="{{ route('pay.now') }}" method="POST">
                            @csrf
                            <input type="hidden" name="invoice" value="{{ $invoiceNumber }}">
                            <input type="hidden" name="sub_id" value="{{ $subs_idd->id }}">
                            <input type="hidden" name="price" value="{{ $subs_idd->price }}">
                            <button type="submit" class="btn btn-primary">Pay Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
