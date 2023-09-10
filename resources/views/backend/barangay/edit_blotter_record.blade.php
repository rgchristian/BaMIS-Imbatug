@extends('admin.admin_dashboard')
@section('admin')

<!-- jQuery Google CDN via W3schools.com -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('barangay.blotter.records') }}" class="btn btn-inverse-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Back">Back</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Blotter Record</h6>
                    <form method="POST" action="{{ route('update.blotter.record') }}" class="forms-sample">
                        @csrf

                        <input type="hidden" name="id" value="{{ $types->id }}">
            
                        <legend>Incident's Information</legend>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="mb-3">
                                    <label class="form-label">Incident Type</label>
                                    <input type="text" name="incident_type" placeholder="Enter incident type" class="form-control @error('incident_type') is-invalid @enderror" value = "{{ $types->incident_type }}">
                                    @error('incident_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Incident Status</label>
                                    <select name="incident_status" class="form-control @error('incident_status') is-invalid @enderror" value = "{{ $types->incident_status }}">
                                        <option value="" selected disabled>Select status</option>
                                        <option value="New" {{ old('incident_status', $types->incident_status) === 'New' ? 'selected' : '' }}>New</option>
                                        <option value="Pending" {{ old('incident_status', $types->incident_status) === 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Ongoing" {{ old('incident_status', $types->incident_status) === 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                                        <option value="Finished" {{ old('incident_status', $types->incident_status) === 'Finished' ? 'selected' : '' }}>Finished</option>
                                    </select>
                                    @error('incident_status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Incident Date</label>
                                    <div class="input-group">
                                        <input type="datetime" id="incident_date" name="incident_date" placeholder="Select date" readonly="readonly" class="form-control flatpickr-input active @error('incident_date') is-invalid @enderror" value = "{{ $types->incident_date }}">
                                        <span class="input-group-text input-group-addon" data-toggle="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                            </svg>
                                        </span>
                                    </div>
                                    @error('incident_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Date Recorded</label>
                                    <div class="input-group">
                                        <input type="datetime" id="incident_date_recorded" name="incident_date_recorded" placeholder="Select date" readonly="readonly" class="form-control flatpickr-input active @error('incident_date_recorded') is-invalid @enderror" value = "{{ $types->incident_date_recorded }}">
                                        <span class="input-group-text input-group-addon" data-toggle="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                            </svg>
                                        </span>
                                    </div>
                                    @error('incident_date_recorded')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <legend>Resident's Information</legend>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Resident Name</label>
                                    <input type="text" name="resident_name" placeholder="Enter resident name" class="form-control @error('resident_name') is-invalid @enderror" value = "{{ $types->resident_name }}">
                                    @error('resident_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Resident Address</label>
                                    <input type="text" name="resident_address" placeholder="Enter resident address" class="form-control @error('resident_address') is-invalid @enderror" value = "{{ $types->resident_address }}">
                                    @error('resident_address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Resident Phone</label>
                                    <input type="text" name="resident_phone" placeholder="Enter resident phone" class="form-control @error('resident_phone') is-invalid @enderror" value = "{{ $types->resident_phone }}">
                                    @error('resident_phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Resident Age</label>
                                    <input type="text" name="resident_age" placeholder="Enter resident age" class="form-control @error('resident_age') is-invalid @enderror" value = "{{ $types->resident_age }}">
                                    @error('resident_age')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <legend>Complainant's Information</legend>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Complainant Name</label>
                                    <input type="text" name="complainant_name" placeholder="Enter complainant name" class="form-control @error('complainant_name') is-invalid @enderror" value = "{{ $types->complainant_name }}">
                                    @error('complainant_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Complainant Address</label>
                                    <input type="text" name="complainant_address" placeholder="Enter complainant address" class="form-control @error('complainant_address') is-invalid @enderror" value = "{{ $types->complainant_address }}">
                                    @error('complainant_address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Complainant Phone</label>
                                    <input type="text" name="complainant_phone" placeholder="Enter complainant phone" class="form-control @error('complainant_phone') is-invalid @enderror" value = "{{ $types->complainant_phone }}">
                                    @error('complainant_phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Complainant Age</label>
                                    <input type="text" name="complainant_age" placeholder="Enter complainant age" class="form-control @error('complainant_age') is-invalid @enderror" value = "{{ $types->complainant_age }}">
                                    @error('complainant_age')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
    							<div class="mb-3">
        							<label class="form-label">List of Mediators</label>
        							<textarea name="list_mediators" placeholder="Enter mediators names" rows="6" class="form-control @error('list_mediators') is-invalid @enderror">{{ old('list_mediators', $types->list_mediators) }}</textarea>
        							@error('list_mediators')
            							<span class="text-danger">{{ $message }}</span>
        							@enderror
   								</div>
						</div><!-- Col -->
                        </div><!-- Row -->
                        <button type="submit" class="btn btn-primary submit" data-bs-toggle="tooltip" data-bs-placement="right" title="Save changes">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
