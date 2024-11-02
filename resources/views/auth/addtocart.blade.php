@php
$isMenu = false;
$navbarHideToggle = false;
@endphp
{{-- @extends('layouts/contentNavbarLayout') --}}
@extends('layouts/commonMaster' )
@push('body-style')
<link rel="stylesheet" href="{{ asset('assets/css/invoice_style.css') }}">
@endpush
@section('layoutContent')
{{-- <form method="POST" action="{{ route('register') }}">
  @csrf --}}

  <!-- Name -->
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
            <p class="mb-1">Office 149, 450 South Brand Brooklyn</p>
            <p class="mb-1">San Diego County, CA 91905, USA</p>
            <p class="mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p>
          </div>
          <div>
            <h5 class="mb-6 text-nowrap">Invoice #86423</h5>
            <div class="mb-1">
              <span>Date Issues:</span>
              <span>April 25, 2021</span>
            </div>
            <div>
              <span>Date Due:</span>
              <span>May 25, 2021</span>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body px-0">
        <div class="d-flex justify-content-between flex-wrap row-gap-2">
          <div class="my-1">
            <h6>Invoice To:</h6>
            <p class="mb-1">Thomas shelby</p>
            <p class="mb-1">Shelby Company Limited</p>
            <p class="mb-1">Small Heath, B10 0HF, UK</p>
            <p class="mb-1">718-986-6062</p>
            <p class="mb-0">peakyFBlinders@gmail.com</p>
          </div>
          <div class="my-1">
            <h6>Bill To:</h6>
            <table>
              <tbody>
                <tr>
                  <td class="pe-4">Total Due:</td>
                  <td>$12,110.55</td>
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
            <tr>
              <th>Item</th>
              <th>Description</th>
              <th>Cost</th>
              <th>Qty</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-nowrap text-heading">Vuexy Admin Template</td>
              <td class="text-nowrap">HTML Admin Template</td>
              <td>$32</td>
              <td>1</td>
              <td>$32.00</td>
            </tr>
            <tr>
              <td class="text-nowrap text-heading">Frest Admin Template</td>
              <td class="text-nowrap">Angular Admin Template</td>
              <td>$22</td>
              <td>1</td>
              <td>$22.00</td>
            </tr>
            <tr>
              <td class="text-nowrap text-heading">Apex Admin Template</td>
              <td class="text-nowrap">HTML Admin Template</td>
              <td>$17</td>
              <td>2</td>
              <td>$34.00</td>
            </tr>
            <tr class="border-bottom">
              <td class="text-nowrap text-heading">Robust Admin Template</td>
              <td class="text-nowrap">React Admin Template</td>
              <td>$66</td>
              <td>1</td>
              <td>$66.00</td>
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
                <p class="fw-medium text-heading mb-1">$154.25</p>
                <p class="fw-medium text-heading mb-1">$00.00</p>
                <p class="fw-medium text-heading mb-2 border-bottom pb-2">$50.00</p>
                <p class="fw-medium text-heading mb-0">$204.25</p>
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
            <span>It was a pleasure working with you and your team. We hope you will keep us in mind for future freelance projects. Thank You!</span>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
</div>
</div>
  @endsection
