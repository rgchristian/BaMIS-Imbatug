@extends('admin.admin_dashboard')
@section('admin')

<!-- jQuery Google CDN via W3schools.com -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">

<nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Forms</li>
            <li class="breadcrumb-item active" aria-current="page">Barangay Clearance</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Barangay Clearance</h6>
                    <form>
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter name">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Enter address">
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Age</label>
                                    <input type="number" name="age" class="form-control" placeholder="Enter age">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Amount</label>
                                    <select name="amount" class="form-select mb-3 form-control">
                                        <option value="" selected disabled>Select amount</option>
										<option value="Free">Free</option>
                                        <option value="₱50">₱50</option>
                                        <option value="₱100">₱100</option>
                                        <option value="₱150">₱150</option>
                                    </select>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Date</label>
                                    <div class="input-group">
                                        <input type="datetime" id="barangay_clearance" name="date_issued"
                                            class="form-control flatpickr-input active" placeholder="Select date"
                                            readonly="readonly">
                                        <span class="input-group-text input-group-addon" data-toggle="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-calendar">
                                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="e_signature" class="form-label">Signature</label>
                                    <input type="file" class="form-control" id="" name="e_signature">
                                </div>
								</div><!-- Col -->
							<div class="col-sm-6">
                                <div class="mb-3">
								<label for="attendance_record" class="form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="View barangay attendance records">
    								<a href="{{ route('barangay.attendance.records') }}" class="text-primary">Attendance</a>
								</label>
                                    <select name="attendance_record" class="form-select mb-3 form-control">
                                        <option value="" selected disabled>Select status</option>
                                        <option value="Present">Present</option>
                                        <option value="Absent">Absent</option>
                                    </select>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label for="purpose" class="form-label">Purpose</label>
                                    <textarea class="form-control" name="purpose" id="exampleFormControlTextarea1" rows="3"
                                        placeholder="Enter purpose"></textarea>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                    </form>
                    <button type="button" class="btn btn-primary submit" data-bs-toggle="tooltip"
                        data-bs-placement="right" title="Generate clearance">Generate Clearance</button>
                </div>
            </div>
        </div>

        <!-- Second card with 'img src' -->
        <div class="col-md-6 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Barangay Clearance Previewer</h6>
                    <!-- 'img src' goes here -->
                    <img src="{{ asset('upload/barangay clearance.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
