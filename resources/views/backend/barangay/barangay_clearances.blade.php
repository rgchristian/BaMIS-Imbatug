@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Forms</li>
            <li class="breadcrumb-item active" aria-current="page">Clearances</li>
        </ol>
    </nav>

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="" class="btn btn-inverse-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Create barangay clearance">Create</a>
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
          <div class="dropdown mb-2 position-absolute top-0 end-0 m-3">
                        <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal icon-lg text-muted pb-3px"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye icon-sm me-2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> <span class="">View</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 icon-sm me-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg> <span class="">Edit</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash icon-sm me-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg> <span class="">Delete</span></a>
                            <!-- <a class="dropdown-item d-flex align-items-center" href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer icon-sm me-2"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg> <span class="">Print</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download icon-sm me-2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg> <span class="">Download</span></a> -->
                        </div>
                    </div>
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