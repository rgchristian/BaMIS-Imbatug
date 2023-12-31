@extends('admin.admin_dashboard')
@section('admin')

<!-- jQuery Google CDN via W3schools.com -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">

<nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
            <li class="breadcrumb-item active" aria-current="page">Attendance Record</li>
        </ol>
    </nav>

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('barangay.attendance.records') }}" class="btn btn-inverse-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Back">Back</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Create Attendance Record</h6>
                    <h5 class="text-muted mb-3"><a>Event Information</a></h5>
                    <form id="myForm" method="POST" action="{{ route('store.attendance.record') }}" class="forms-sample">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Event Name</label>
                                    <input type="text" name="event_name" class="form-control" placeholder="Enter event name">
                                </div>

                                </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Host Name</label>
                                    <input type="text" name="host_name" class="form-control" placeholder="Enter host name">
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label for="attendance_record_date_time_created" class="form-label">Attendance Record Date & Time Created</label>
                                    <div class="input-group">
                                        <input type="text" id="attendance_date_created" name="attendance_record_date_time_created" class="form-control flatpickr-input active" placeholder="Select date and time" readonly="readonly">
                                        <span class="input-group-text input-group-addon" data-toggle="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label for="event_date_time" class="form-label">Event Date & Time</label>
                                    <div class="input-group">
                                        <input type="text" id="attendance_date" name="event_date_time" class="form-control flatpickr-input active" placeholder="Select date and time" readonly="readonly">
                                        <span class="input-group-text input-group-addon" data-toggle="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
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
                            <div class="col-sm-12">
                                <div class="mb-3 form-group">
                                    <label for="event_location" class="form-label">Event Location</label>
                                    <input type="text" name="event_location" class="form-control" placeholder="Enter event location">
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">Event Details</label>
                                    <textarea name="event_details" placeholder="Enter event details" rows="6" class="form-control"></textarea>
                                </div>
                            
                            </div><!-- Col -->
                        </div><!-- Row -->

                        <h5 class="text-muted mb-3"><a>Event Attendees</a></h5>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3 form-group">
                                    <label for="list_attendees" class="form-label">List of Attendees</label>
                                    <textarea name="list_attendees" placeholder="Enter names of attendees" rows="6" class="form-control"></textarea>
                                </div>
                            </div><!-- Col -->
                            </div><!-- Row -->
                        
                        <button type="submit" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Save">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#myForm').validate({
            rules: {
                event_name: {
                    required: true,
                },
                host_name: {
                    required: true,
                },
                event_details: {
                    required: true,
                },
                event_location: {
                    required: true,
                },
                event_date_time: {
                    required: true,
                },
                list_attendees: {
                    required: true,
                },
                attendance_record_date_time_created: {
                    required: true,
                }
            },
            messages: {
                event_name: {
                    required: 'Please enter event name.',
                },
                host_name: {
                    required: 'Please enter host name.',
                },
                event_details: {
                    required: 'Please enter event details.',
                },
                event_location: {
                    required: 'Please enter event location.',
                },
                event_date_time: {
                    required: 'Please select date and time.',
                },
                list_attendees: {
                    required: 'Please enter list of attendees.',
                },
                attendance_record_date_time_created: {
                    required: 'Please select date and time.'
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>

@endsection