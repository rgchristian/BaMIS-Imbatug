@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Services</li>
            <li class="breadcrumb-item active" aria-current="page">Clearances</li>
        </ol>
    </nav>

    <!-- <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
    <div class="card-body"> -->

    <!-- Content -->
  <div class="row row-cols-1 row-cols-md-2 g-4">

    <div class="col">
      <div class="card d-flex justify-content-center align-items-center">
      <a href="{{ route('barangay.clearance') }}" class="card-link">
        <img src="{{ asset('upload/Certificate_icon-modified.png') }}" class="rounded" alt="certificate" style="width: 200px; height: auto; padding-top: 30px;">
        <div class="card-body">
            <h5 class="card-title">Barangay Clearance</h5>
          </a>
          <p class="card-text">The clearance serves as proof of identity and residency, ensuring that the applicant is a bona fide resident of the barangay they claim to be from.</p>
        </div>
      </div>
    </div>
    
    <!-- <div class="col">
      <div class="card d-flex justify-content-center align-items-center">
      <a href="#" class="card-link">
        <img src="{{ asset('upload/Certificate_icon-modified.png') }}" class="rounded" alt="certificate" style="width: 200px; height: auto; padding-top: 30px;">
        <div class="card-body">
            <h5 class="card-title">Barangay Certificate</h5>
          </a>
          <p class="card-text">One the Philippine government issued identification documents needed for many important business, job, or personal transactions.</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card d-flex justify-content-center align-items-center">
      <a href="#" class="card-link">
        <img src="{{ asset('upload/Certificate_icon-modified (1).png') }}" class="rounded" alt="certificate" style="width: 200px; height: auto; padding-top: 30px;">
        <div class="card-body">
            <h5 class="card-title">Barangay Certificate</h5>
          </a>
          <p class="card-text">One the Philippine government issued identification documents needed for many important business, job, or personal transactions.</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card d-flex justify-content-center align-items-center">
      <a href="#" class="card-link">
        <img src="{{ asset('upload/Certificate_icon-modified.png') }}" class="rounded" alt="certificate" style="width: 200px; height: auto; padding-top: 30px;">
        <div class="card-body">
            <h5 class="card-title">Barangay Certificate</h5>
          </a>
          <p class="card-text">One the Philippine government issued identification documents needed for many important business, job, or personal transactions.</p>
        </div>
      </div>
    </div> -->
    
  </div>
  
    <!-- End Content -->

<!-- 
    </div>
    </div>
    </div>
    </div> -->

</div>

@endsection