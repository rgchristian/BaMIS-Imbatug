@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
          </div>
          <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
              <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
              <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
            </div>
            <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
              <i class="btn-icon-prepend" data-feather="printer"></i>
              Print
            </button>
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
              <i class="btn-icon-prepend" data-feather="download-cloud"></i>
              Download
            </button>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">

            <div class="col-md-4 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-baseline">
        <h6 class="card-title mb-0">Total Population</h6>
        <div class="dropdown mb-2">
          <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6 col-md-12 col-xl-7">
          <!-- Move the image here (on the left) -->
          <h3 class="mb-2">{{ $residentsCount }}</h3>
          <!-- <p class="text-success">
              <span>+3.3%</span>
              <i data-feather="arrow-up" class="icon-sm mb-1"></i>
            </p> -->
          <div class="mt-md-3 mt-xl-0"></div>
        </div>
        <div class="col-6 col-md-12 col-xl-5">
          <!-- Swap the positions of the image and h3 -->
          <img src="{{ asset('upload/total_population_1.png') }}" alt="Population Icon" class="img-fluid" width="70" height="70">
          <div class="d-flex align-items-baseline">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

              <div class="col-md-4 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-baseline">
        <h6 class="card-title mb-0">Male</h6>
        <div class="dropdown mb-2">
          <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6 col-md-12 col-xl-7">
          <!-- Move the image here (on the left) -->
          <h3 class="mb-2">{{ $maleResidentsCount }}</h3>
          <!-- <p class="text-success">
              <span>+3.3%</span>
              <i data-feather="arrow-up" class="icon-sm mb-1"></i>
            </p> -->
          <div class="mt-md-3 mt-xl-0"></div>
        </div>
        <div class="col-6 col-md-12 col-xl-5">
          <!-- Swap the positions of the image and h3 -->
          <img src="{{ asset('upload/male_icon_1.png') }}" alt="Male Icon" class="img-fluid" width="70" height="70">
          <div class="d-flex align-items-baseline">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="col-md-4 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-baseline">
        <h6 class="card-title mb-0">Female</h6>
        <div class="dropdown mb-2">
          <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6 col-md-12 col-xl-7">
          <!-- Move the image here (on the left) -->
          <h3 class="mb-2">{{ $femaleResidentsCount }}</h3>
          <!-- <p class="text-success">
              <span>+3.3%</span>
              <i data-feather="arrow-up" class="icon-sm mb-1"></i>
            </p> -->
          <div class="mt-md-3 mt-xl-0"></div>
        </div>
        <div class="col-6 col-md-12 col-xl-5">
          <!-- Swap the positions of the image and h3 -->
          <img src="{{ asset('upload/female_icon_1.png') }}" alt="Female Icon" class="img-fluid" width="70" height="70">
          <div class="d-flex align-items-baseline">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-md-4 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-baseline">
        <h6 class="card-title mb-0">Persons With Disability (PWD)</h6>
        <div class="dropdown mb-2">
          <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6 col-md-12 col-xl-7">
          <!-- Move the image here (on the left) -->
          <h3 class="mb-2">{{ $pwdResidentsCount }}</h3>
          <!-- <p class="text-success">
              <span>+3.3%</span>
              <i data-feather="arrow-up" class="icon-sm mb-1"></i>
            </p> -->
          <div class="mt-md-3 mt-xl-0"></div>
        </div>
        <div class="col-6 col-md-12 col-xl-5">
          <!-- Swap the positions of the image and h3 -->
          <img src="{{ asset('upload/pwd_icon_1.png') }}" alt="PWD Icon" class="img-fluid" width="70" height="70">
          <div class="d-flex align-items-baseline">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
              
<div class="col-md-4 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-baseline">
        <h6 class="card-title mb-0">Solo Parent</h6>
        <div class="dropdown mb-2">
          <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6 col-md-12 col-xl-7">
          <!-- Move the image here (on the left) -->
          <h3 class="mb-2">{{ $widowResidentsCount }}</h3>
          <!-- <p class="text-success">
              <span>+3.3%</span>
              <i data-feather="arrow-up" class="icon-sm mb-1"></i>
            </p> -->
          <div class="mt-md-3 mt-xl-0"></div>
        </div>
        <div class="col-6 col-md-12 col-xl-5">
          <!-- Swap the positions of the image and h3 -->
          <img src="{{ asset('upload/solo_parent_1.png') }}" alt="Solo Parent Icon" class="img-fluid" width="70" height="70">
          <div class="d-flex align-items-baseline">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Household</h6>
                      <div class="dropdown mb-2">
                        <a type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                          <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-6 col-md-12 col-xl-7">
          <!-- Move the image here (on the left) -->
          <h3 class="mb-2">{{ $householdResidentsCount }}</h3>
          <!-- <p class="text-success">
              <span>+3.3%</span>
              <i data-feather="arrow-up" class="icon-sm mb-1"></i>
            </p> -->
                          <div class="mt-md-3 mt-xl-0">

                          </div>
                      </div>
                      <div class="col-6 col-md-12 col-xl-5">
                      <img src="{{ asset('upload/household_1.png') }}" alt="Household Icon" class="img-fluid" width="70" height="70">
                      <div class="d-flex align-items-baseline">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          
          <div class="col-md-4 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-baseline">
        <h6 class="card-title mb-0">Purok</h6>
        <div class="dropdown mb-2">
          <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6 col-md-12 col-xl-7">
          <!-- Move the image here (on the left) -->
          <h3 class="mb-2">9</h3>
          <!-- <p class="text-success">
              <span>+3.3%</span>
              <i data-feather="arrow-up" class="icon-sm mb-1"></i>
            </p> -->
          <div class="mt-md-3 mt-xl-0"></div>
        </div>
        <div class="col-6 col-md-12 col-xl-5">
          <!-- Swap the positions of the image and h3 -->
          <img src="{{ asset('upload/purok_1.png') }}" alt="Purok Icon" class="img-fluid" width="70" height="70">
          <div class="d-flex align-items-baseline">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-md-4 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-baseline">
        <h6 class="card-title mb-0">Registered Voters</h6>
        <div class="dropdown mb-2">
          <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6 col-md-12 col-xl-7">
          <!-- Move the image here (on the left) -->
          <h3 class="mb-2">{{ $voterResidentsCount }}</h3>
          <!-- <p class="text-success">
              <span>+3.3%</span>
              <i data-feather="arrow-up" class="icon-sm mb-1"></i>
            </p> -->
          <div class="mt-md-3 mt-xl-0"></div>
        </div>
        <div class="col-6 col-md-12 col-xl-5">
          <!-- Swap the positions of the image and h3 -->
          <img src="{{ asset('upload/ballot_1.png') }}" alt="Ballot Icon" class="img-fluid" width="70" height="70">
          <div class="d-flex align-items-baseline">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

        </div> <!-- row -->

        <div class="row">
          <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                  <h6 class="card-title mb-0">Revenues</h6>
                  <div class="dropdown">
                    <a type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                      <a class="dropdown-item d-flex align-items-center" href="{{ route('barangay.revenues') }}"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                      <!-- <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a> -->
                    </div>
                  </div>
                </div>
                <div class="row align-items-start">
                  <div class="col-md-7">
                    <p class="text-muted tx-13 mb-3 mb-md-0">Revenue is the income that a business has from its normal business activities, usually from the sale of goods and services to customers.</p>
                  </div>
                  <div class="col-md-5 d-flex justify-content-md-end">
                    <div class="btn-group mb-3 mb-md-0" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-outline-primary">Today</button>
                      <button type="button" class="btn btn-outline-primary d-none d-md-block">Week</button>
                      <button type="button" class="btn btn-primary">Month</button>
                      <button type="button" class="btn btn-outline-primary">Year</button>
                    </div>
                  </div>
                </div>
                <div id="revenueChart" ></div>
              </div>
            </div>
          </div>
        </div> <!-- row -->

        <div class="row">
          <div class="col-lg-7 col-xl-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">Attendance Records</h6>
                  <div class="dropdown mb-2">
                    <a type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                    </div>
                  </div>
                </div>
                <p class="text-muted">Sales are activities related to selling or the number of goods or services sold in a given time period.</p>
                <div id="monthlySalesChart"></div>
              </div> 
            </div>
          </div>
          
          <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0">Accomplished</h6>
                  <div class="dropdown mb-2">
                    <a type="button" id="dropdownMenuButton5" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                    </div>
                  </div>
                </div>
                <div id="storageChart"></div>
                <div class="row mb-3">
                  <div class="col-6 d-flex justify-content-end">
                    <div>
                      <label class="d-flex align-items-center justify-content-end tx-10 text-uppercase fw-bolder">Total storage <span class="p-1 ms-1 rounded-circle bg-secondary"></span></label>
                      <h5 class="fw-bolder mb-0 text-end">8TB</h5>
                    </div>
                  </div>
                  <div class="col-6">
                    <div>
                      <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span class="p-1 me-1 rounded-circle bg-primary"></span> Used storage</label>
                      <h5 class="fw-bolder mb-0">~5TB</h5>
                    </div>
                  </div>
                </div>
                <div class="d-grid">
                  <button class="btn btn-primary">Upgrade storage</button>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- row -->

        <div class="row">
          <div class="col-lg-5 col-xl-4 grid-margin grid-margin-xl-0">
            <div class="card">
              <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">Announcements</h6>
                  <div class="dropdown mb-2">
                    <a type="button" id="dropdownMenuButton6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
                      <a class="dropdown-item d-flex align-items-center" href="{{ route('barangay.announcements') }}"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="{{ route('barangay.announcements') }}"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="{{ route('barangay.announcements') }}"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                    </div>
                  </div>
                </div>
                <div class="d-flex flex-column">
                @foreach ($dashboard_announcements as $key => $dash_announcement)
                  <a href="#" class="d-flex align-items-center {{ $key === count($dashboard_announcements) - 1 ? '' : 'border-bottom pb-3 mb-3' }}">
                    <div class="me-3">
                      <img src="{{ asset($dash_announcement->announcement_photo) }}" alt="{{ $dash_announcement->announcement_name }}" class="wd-30 ht-30 rounded-circle" alt="user">
                    </div>
                    <div class="w-100">
                      <div class="d-flex justify-content-between">
                        <h6 class="text-body mb-2">{{ $dash_announcement->announcement_host_name}}</h6>
                        <p class="text-muted tx-12">{{ date('Y-m-d H:i', strtotime($dash_announcement->announcement_date_time_created)) }}</p>
                      </div>
                      <p class="text-muted tx-13">{{ $dash_announcement->announcement_details}}</p>
                    </div>
                  </a>
                @endforeach
                </div>
              </div>
            </div>
          </div>



          <div class="col-lg-7 col-xl-8 stretch-card">
            <div class="card">
              <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">Blotter Records</h6>
                  <div class="dropdown mb-2">
                    <a type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                      <a class="dropdown-item d-flex align-items-center" href="{{ route('barangay.blotter.records') }}"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="{{ route('barangay.blotter.records') }}"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="{{ route('barangay.blotter.records') }}"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                      <!-- <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                      <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a> -->
                    </div>
                  </div>
                </div>

                <div class="table-responsive">
                <table class="table table-hover mb-0 table">
    <thead>
        <tr>
            <th class="pt-0" style="text-align: center;">ID</th>
            <th class="pt-0" style="text-align: center;">Incident Type</th>
            <th class="pt-0" style="text-align: center;">Status</th>
            <th class="pt-0" style="text-align: center;">Incident Date</th>
            <th class="pt-0" style="text-align: center;">Settlement Schedule</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dashboard_blotter_records as $key => $dash_blott)
        <tr>
            <td style="text-align: center;">{{ $key+1 }}</td>
            <td style="text-align: center;">{{ $dash_blott->incident_type }}</td>
            <td style="text-align: center;">
            @php
                        $statusClass = '';
                        switch($dash_blott->incident_status) {
                        case 'New':
                            $statusClass = 'status-new';
                            break;
                        case 'Pending':
                            $statusClass = 'status-pending';
                            break;
                        case 'Ongoing':
                            $statusClass = 'status-ongoing';
                            break;
                        case 'Finished':
                            $statusClass = 'status-finished';
                            break;
                        }
                      @endphp
    <span class="status-badge {{ $statusClass }}">{{ $dash_blott->incident_status }}</span>
            </td>
            <td style="text-align: center;">{{ date('Y-m-d H:i', strtotime($dash_blott->incident_date)) }}</td>
            <td style="text-align: center;">{{ date('Y-m-d H:i', strtotime($dash_blott->settlement_schedule)) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
                </div>
                
              </div> 
            </div>
          </div>
        </div> <!-- row -->

			</div>

@endsection