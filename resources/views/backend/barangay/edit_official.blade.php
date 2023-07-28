@extends('admin.admin_dashboard')
@section('admin')

<!-- jQuery Google CDN via W3schools.com -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<div class="page-content">

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <a href="{{ route('barangay.officials') }}" class="btn btn-inverse-primary" title="Back">Back</a>
    </ol>
  </nav>
  
  <div class="row profile-body">

    <!-- middle wrapper start -->
    <div class="row">
    <div class="col-md-5 grid-margin stretch-card">
      
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Edit barangay official</h6>

            <form method="POST" action="{{ route('update.official') }}" class="forms-sample">
              @csrf

              <input type="hidden" name="id" value="{{ $types->id }}">

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $types->name }}">
                @error('name')
                <span class="text-danger"> {{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">Position</label>
                <select name="position" class="form-select mb-3 form-control @error('position') is-invalid @enderror">
                  <option value="" disabled>Select position</option>
                  <option value="Barangay Captain" {{ $types->position == 'Barangay Captain' ? 'selected' : '' }}>Barangay Captain</option>
                  <option value="Sangguniang Barangay Member" {{ $types->position == 'Sangguniang Barangay Member' ? 'selected' : '' }}>Sangguniang Barangay Member</option>
                  <option value="Sangguniang Kabataan Chairperson" {{ $types->position == 'Sangguniang Kabataan Chairperson' ? 'selected' : '' }}>Sangguniang Kabataan Chairperson</option>
                  <option value="Barangay Treasurer" {{ $types->position == 'Barangay Treasurer' ? 'selected' : '' }}>Barangay Treasurer</option>
                  <option value="Barangay Secretary" {{ $types->position == 'Barangay Secretary' ? 'selected' : '' }}>Barangay Secretary</option>
                </select>
                @error('position')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select mb-3 form-control @error('status') is-invalid @enderror">
                  <option value="" disabled>Select status</option>
                  <option value="Active" {{ $types->status == 'Active' ? 'selected' : '' }}>Active</option>
                  <option value="Inactive" {{ $types->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="term_start" class="form-label">Term Start</label>
                <div class="input-group">
                  <input type="text" id="term_start" name="term_start" class="form-control flatpickr-input active" placeholder="Select date" readonly="readonly" value="{{ $types->term_start }}">
                  <span class="input-group-text input-group-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                      <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                      <line x1="16" y1="2" x2="16" y2="6"></line>
                      <line x1="8" y1="2" x2="8" y2="6"></line>
                      <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                  </span>
                </div>
                @error('term_start')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="term_end" class="form-label">Term End</label>
                <div class="input-group">
                  <input type="text" id="term_end" name="term_end" class="form-control flatpickr-input active" placeholder="Select date" readonly="readonly" value="{{ $types->term_end }}">
                  <span class="input-group-text input-group-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                      <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                      <line x1="16" y1="2" x2="16" y2="6"></line>
                      <line x1="8" y1="2" x2="8" y2="6"></line>
                      <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                  </span>
                </div>
                @error('term_end')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <button type="submit" class="btn btn-primary me-2">Save Changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- middle wrapper end -->

  </div>
</div>

@endsection