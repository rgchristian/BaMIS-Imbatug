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
                    <h6 class="card-title">Create Blotter Record</h6>
                    <form id="myForm" method="POST" action="{{ route('store.blotter.record') }}" class="forms-sample">
                        @csrf
                        <legend>Incident's Information</legend>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Incident Type</label>
                                    <input type="text" name="incident_type" placeholder="Enter incident type" class="form-control">
                                    
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Incident Status</label>
                                    <select name="incident_status" class="form-select mb-3 form-control">
                                        <option value="" selected disabled>Select status</option>
                                        <option value="New">New</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Ongoing">Ongoing</option>
                                        <option value="Finished">Finished</option>
                                    </select>
                            
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Incident Date</label>
                                    <div class="input-group">
                                        <input type="datetime" id="incident_date" name="incident_date" placeholder="Select date" readonly="readonly" class="form-control flatpickr-input active">
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
                                    <label class="form-label">Date Recorded</label>
                                    <div class="input-group">
                                        <input type="datetime" id="incident_date_recorded" name="incident_date_recorded" placeholder="Select date" readonly="readonly" class="form-control flatpickr-input active">
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
                            <legend>Resident's Information</legend>
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Resident Name</label>
                                    <input type="text" name="resident_name" placeholder="Enter resident name" class="form-control">
                                    
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Resident Address</label>
                                    <input type="text" name="resident_address" placeholder="Enter resident address" class="form-control">
                                    
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Resident Phone</label>
                                    <input type="number" name="resident_phone" placeholder="Enter resident phone" class="form-control">
                                    
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Resident Age</label>
                                    <input type="number" name="resident_age" placeholder="Enter resident age" class="form-control">
                                    
                                </div>
                            </div><!-- Col -->
                            <legend>Complainant's Information</legend>
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Complainant Name</label>
                                    <input type="text" name="complainant_name" placeholder="Enter complainant name" class="form-control">
                                    
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Complainant Address</label>
                                    <input type="text" name="complainant_address" placeholder="Enter complainant address" class="form-control">
                                    
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Complainant Phone</label>
                                    <input type="number" name="complainant_phone" placeholder="Enter complainant phone" class="form-control">
                                    
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Complainant Age</label>
                                    <input type="number" name="complainant_age" placeholder="Enter complainant age" class="form-control">
                                    
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-12">
    							<div class="mb-3 form-group">
        							<label class="form-label">List of Mediators</label>
        							<textarea name="list_mediators" placeholder="Enter names of mediators" rows="6" class="form-control"></textarea>
   								</div>
						</div><!-- Col -->
                        </div><!-- Row -->
                        <button type="submit" class="btn btn-primary submit" data-bs-toggle="tooltip" data-bs-placement="right" title="Save">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Validation -->
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                incident_type: {
                    required : true,
                }, 
                incident_status: {
                    required : true,
                },
                incident_date: {
                    required : true,
                },
                incident_date_recorded: {
                    required : true,
                },
                resident_name: {
                    required : true,
                },
                resident_address: {
                    required : true,
                },
                resident_phone: {
                    required : true,
                },
                resident_age: {
                    required : true,
                },
                complainant_name: {
                    required : true,
                },
                complainant_address: {
                    required : true,
                },
                complainant_phone: {
                    required : true,
                },
                complainant_age: {
                    required : true,
                },
                list_mediators: {
                    required : true,
                },
                
                
            },
            messages :{
                incident_type: {
                    required : 'Please enter incident type.',
                },
                incident_status: {
                    required : 'Please select incident status.',
                },
                incident_date: {
                    required : 'Please enter incident date.',
                },
                incident_date_recorded: {
                    required : 'Please enter incident date recorded.',
                },
                resident_name: {
                    required : 'Please enter resident name.',
                },
                resident_address: {
                    required : 'Please enter resident address.',
                },
                resident_phone: {
                    required : 'Please enter resident phone.',
                },
                resident_age: {
                    required : 'Please enter resident age.',
                },
                complainant_name: {
                    required : 'Please enter complainant name.',
                },
                complainant_address: {
                    required : 'Please enter complainant address.',
                },
                complainant_phone: {
                    required : 'Please enter complainant phone.',
                },
                complainant_age: {
                    required : 'Please enter complainant age.',
                },
                list_mediators: {
                    required : 'Please enter mediators names.',
                },
                

            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>

@endsection
