@php
$isMenu = false;
$navbarHideToggle = false;
@endphp
@extends('layouts/contentNavbarLayout')
@section('title', ' Vertical Layouts - Forms')
@section('content')

  <form method="post" {{ route('form.user') }} action="reg" >
    @csrf
<!-- Basic Layout -->
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



<div class="row"> 
    <!---------------------------------------------------------------------------------------------------------------------------
      --------------------------------------------------------------- PRODUCER  ---------------------------------------------------
      ----------------------------------------------------------------------->
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">PRODUCER</h5> <small class="text-muted float-end">USER INFO</small>
      </div>
      <div class="card-body">
        <div class="row">
            <div class="col-6">
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control" name="username" id="basic-default-fullname" placeholder="ACME Inc." />
            <label for="basic-default-fullname">USERNAME</label>
          </div>
        </div>
          <div class="col-6">
          <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control"name="email" id="basic-default-company" placeholder="Address line1" />
            <label for="basic-default-company">EMAIL</label>
        </div>
    </div>
        <div class="col-6">
        <div class="form-floating form-floating-outline mb-4">
            <input type="text" class="form-control" name="password"id="basic-default-company"  placeholder="********" />
            <label for="basic-default-company">PASSWORD</label>
        </div>
    </div> 
          <div class="col-6">
          <div class="mb-4">           
            <div class="form-floating form-floating-outline mb-4">
                <select class="form-select" name="role_id" id="exampleFormControlSelect1" aria-label="Default select example">
                  <option value="Aircraft Liability">Aircraft Liability</option>
                  <option value="Automobile Liability">Automobile Liability</option>
                  <option value="Bailee Liability">Bailee Liability</option>
                  <option value="Boiler & Machinery / Equipment Breakdown">Boiler & Machinery / Equipment Breakdown</option>
                  <option value="Cargo">Cargo</option>
                  <option value="Commercial General Liability">Commercial General Liability</option>
                  <option value="Contingent Automobile Liability">Contingent Automobile Liability</option>
                  <option value="Contingent Cargo">Contingent Cargo</option>
                  <option value="Crime">Crime</option>
                  <option value="Cyber">Cyber</option>
                  <option value="DentistProfessionalLiability">Dentist Professional Liability</option>
                  <option value="DirectorsAndOfficersLiability">Directors & Officers Liability</option>
                  <option value="Drone">Drone</option>
                  <option value="EOCyber">E&O / Cyber</option>
                  <option value="EOPollution">E&O / Pollution</option>
                  <option value="EducatorsLegalLiability">Educator's Legal Liability</option>
                  <option value="EmploymentPracticesLiability">Employment Practices Liability</option>
                  <option value="EnvironmentalLiability">Environmental Liability</option>
                  <option value="ExcessLiability">Excess Liability</option>
                  <option value="ExcessSportsAccident">Excess Sports Accident</option>
                  <option value="Facility">Facility</option>
                  <option value="GarageLiability">Garage Liability</option>
                  <option value="GaragekeepersCoverage">Garagekeeper's Coverage</option>
                  <option value="InlandMarine">Inland Marine</option>
                  <option value="OnHook">On Hook</option>
                  <option value="PhysicalDamage">Physical Damage</option>
                  <option value="Pollution">Pollution</option>
                  <option value="ProductLiability">Product Liability</option>
                  <option value="ProfessionalLiability">Professional Liability</option>
                  <option value="Property">Property</option>
                  <option value="PublicOfficialsLiability">Public Officials Liability</option>
                  <option value="ReeferBreakdown">Reefer Breakdown</option>
                  <option value="SexualAbuseAndMolestation">Sexual Abuse and Molestation</option>
                  <option value="StatutoryBond">Statutory Bond</option>
                  <option value="TrailerInterchange">Trailer Interchange</option>
                  <option value="UmbrellaLiability">Umbrella Liability</option>
                  <option value="WorkersCompensationAndEmployersLiability">Workers Compensation and Employers' Liability</option>
                  <option value="Installation">Installation</option>
                  <option value="LimitedServiceAndRepair">Limited Service & Repair</option>
                  <option value="LiquorLiability">Liquor Liability</option>
                  <option value="MarineCargo">Marine Cargo</option>
                  <option value="MediaLiability">Media Liability</option>
                  <option value="MotorTruckCargo">Motor Truck Cargo</option>
                  <option value="NonOwnedTrailer">Non-Owned Trailer</option>
                  <option value="OccupationalAccident">Occupational Accident</option>
              
                </select>
                <label for="exampleFormControlSelect1">ROLE OF USER</label>
              </div>           
          </div>
        </div>
        
      </div>
          
         
                
      </div>    
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Send</button> 
    </form>

@endsection
