@extends('admin.admin_dashboard')
@section('admin')

<!-- jQuery Google CDN via W3schools.com -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('barangay.attendance.records') }}" class="btn btn-inverse-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Back">Back</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Attendance Record</h6>
                    <form id="myForm" method="POST" action="{{ route('update.attendance.record') }}" class="forms-sample">
                        @csrf

                        <input type="hidden" name="id" value="{{ $attendance->id }}">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Event Name</label>
                                    <input type="text" name="event_name" class="form-control" value="{{ $attendance->event_name }}">
                                </div>

                                </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Host Name</label>
                                    <input type="text" name="host_name" class="form-control" value="{{ $attendance->host_name }}">
                                </div>


                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">Event Details</label>
                                    <textarea name="event_details" rows="6" class="form-control">{{ old('event_details', $attendance->event_details) }}</textarea>
                                </div>
                            
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label for="event_location" class="form-label">Event Location</label>
                                    <input type="text" name="event_location" class="form-control" value="{{ $attendance->event_location }}">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label for="event_date_time" class="form-label">Event Date & Time</label>
                                    <div class="input-group">
                                        <input type="text" id="attendance_date" name="event_date_time" class="form-control flatpickr-input active" value="{{ $attendance->event_date_time }}" readonly="readonly">
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
                                    <label for="list_attendees" class="form-label">List of Attendees</label>
                                    <textarea name="list_attendees" rows="6" class="form-control">{{ old('list_attendees', $attendance->list_attendees) }}</textarea>
                                </div>
                            </div><!-- Col -->
                            </div><!-- Row -->
                        
                        <button type="submit" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Save changes">Save Changes</button>
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
                    required: 'Please enter date and time.',
                },
                list_attendees: {
                    required: 'Please enter list of attendees.',
                },
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