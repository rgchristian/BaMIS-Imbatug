@extends('admin.admin_dashboard') 
@section('admin')

<!-- jQuery Google CDN via W3schools.com -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<style>
    .edit-photo-container {
        position: relative;
        display: inline-block;
    }

    .resident-image {
        max-width: 300px;
        transition: filter 0.3s;
    }

    .changed-image:hover {
        filter: blur(3px);
    }

    .edit-text-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 25px;
        color: white;
        opacity: 0;
        pointer-events: none; /* Prevent the overlay from blocking clicks */
        transition: opacity 0.3s, transform 0.3s, font-size 0.3s;
    }

    .edit-text-overlay:hover {
        transform: translate(-50%, -55%); /* Lift the overlay slightly on hover */
        font-size: 18px; /* Enlarge the text on hover */
    }

    .edit-photo-container:hover .edit-text-overlay {
        opacity: 1;
    }
</style>



<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('barangay.residents') }}" class="btn btn-inverse-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Back">Back</a>
        </ol>
    </nav>
    
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Resident's Information</h6>
                        <form id="myForm" method="POST" action="{{ route('update.resident') }}" class="forms-sample" enctype="multipart/form-data">
                        
                        @csrf
                        <fieldset>
                            
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <input type="hidden" name="id" value="{{ $types->id }}">
                                
                                <!-- <div class="form-group mb-3">
    <label for="photo" class="form-label">Photo</label>
    <input class="form-control" name="photo" type="file" id="image">
</div> -->

<div class="col-sm-6 mx-auto">
    <div class="mb-3 position-relative">
        <div class="edit-photo-container">
            <a href="#" class="edit-photo-link">
                <img class="wd-500 img-fluid rounded-circle resident-image changed-image" src="{{ asset($types->photo) }}" alt="{{ $types->photo }}" style="max-width: 300px;">
            </a>
            <strong><div class="edit-text-overlay">Upload a new photo <i class="icon-edit edit-icon" data-feather="upload"></i></div></strong>
        </div>
        <input type="file" name="photo" id="photo-input" style="display: none;">
    </div>
</div>
                                
                            </div><!-- Row -->
                            <div class="row">
                            <legend>Personal Information</legend>
                            <div class="form-group mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name', $types->name) }}"> 
                                    </div>
                                <div class="col-sm-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label">First Name</label>
                                        <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $types->first_name) }}"> 
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Middle Name</label>
                                        <input type="text" name="middle_name" class="form-control" value="{{ old('middle_name', $types->middle_name) }}"> 
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $types->last_name) }}"> 
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group mb-3">
                                        <form id="birthdate">
                                        <label for="birthdate" class="form-label">Birthdate</label>
                                        <div class="input-group">
                                            <input type="datetime" id="birthdate" name="birthdate" class="form-control flatpickr-input active" placeholder="Select date" value="{{ old('birthdate', $types->birthdate) }}">
                                            <span class="input-group-text input-group-addon" data-toggle="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                                </svg>
                                            </span>
                                        </div> 
                                        </form>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Birthplace</label>
                                        <input type="text" name="birthplace" class="form-control" value="{{ old('birthplace', $types->birthplace) }}"> 
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Age</label>
                                        <input type="number" name="age" class="form-control @error('age') is-invalid @enderror" value="{{ old('age', $types->age) }}"> 
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        
                                        <label class="form-label">Gender</label>
                                        <select name="gender" class="form-select mb-3 form-control">
                                            <option value="" selected disabled>Select gender </option> 
                                            <option value="Male" {{ old('gender', $types->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('gender', $types->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                        </select> 
                                        
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        
                                        <label class="form-label">Blood Type</label>
                                        <select name="blood_type" class="form-select mb-3 form-control">
                                            <option value="" selected disabled>Select blood type</option>
                                            <option value="A" {{ old('blood_type', $types->blood_type) == 'A' ? 'selected' : '' }}>A</option>
                                            <option value="B" {{ old('blood_type', $types->blood_type) == 'B' ? 'selected' : '' }}>B</option>
                                            <option value="AB" {{ old('blood_type', $types->blood_type) == 'AB' ? 'selected' : '' }}>AB</option>
                                            <option value="O" {{ old('blood_type', $types->blood_type) == 'O' ? 'selected' : '' }}>O</option>
                                        </select> 
                                        
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        
                                        <label class="form-label">Marital Status</label>
                                        <select name="marital_status" class="form-select mb-3 form-control">
                                            <option value="" selected disabled>Select marital status</option>
                                            <option value="Single" {{ old('marital_status', $types->marital_status) == 'Single' ? 'selected' : '' }}>Single</option>
                                            <option value="Married" {{ old('marital_status', $types->marital_status) == 'Married' ? 'selected' : '' }}>Married</option>
                                            <option value="Widowed" {{ old('marital_status', $types->marital_status) == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                            <option value="Divorced" {{ old('marital_status', $types->marital_status) == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                        </select> 
                                        
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                       
                                        <label class="form-label">Civil Status</label>
                                        <select name="civil_status" class="form-select mb-3 form-control">
                                            <option value="" selected disabled>Select civil status</option>
                                            <option value="Single" {{ old('civil_status', $types->civil_status) == 'Single' ? 'selected' : '' }}>Single</option>
                                            <option value="Registered partnership" {{ old('civil_status', $types->civil_status) == 'Registered partnership' ? 'selected' : '' }}>Registered partnership</option>
                                            <option value="Civil union" {{ old('civil_status', $types->civil_status) == 'Civil union' ? 'selected' : '' }}>Civil union</option>
                                            <option value="Domestic partnership" {{ old('civil_status', $types->civil_status) == 'Domestic partnership' ? 'selected' : '' }}>Domestic partnership</option>
                                        </select> 
                                        
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        
                                        <label class="form-label">Higher Educational Attainment</label>
                                        <select name="h_educ_attainment" class="form-select mb-3 form-control">
                                            <option value="" selected disabled>Select higher educational attainment</option>
                                            <option value="Some Elementary" {{ old('h_educ_attainment', $types->h_educ_attainment) == 'Some Elementary' ? 'selected' : '' }}>Some Elementary</option>
                                            <option value="Elementary Graduate" {{ old('h_educ_attainment', $types->h_educ_attainment) == 'Elementary Graduate' ? 'selected' : '' }}>Elementary Graduate</option>
                                            <option value="Some High School" {{ old('h_educ_attainment', $types->h_educ_attainment) == 'Some High School' ? 'selected' : '' }}>Some High School</option>
                                            <option value="High School Graduate" {{ old('h_educ_attainment', $types->h_educ_attainment) == 'High School Graduate' ? 'selected' : '' }}>High School Graduate</option>
                                            <option value="Some College/Vocational" {{ old('h_educ_attainment', $types->h_educ_attainment) == 'Some College/Vocational' ? 'selected' : '' }}>Some College/Vocational</option>
                                            <option value="College Graduate" {{ old('h_educ_attainment', $types->h_educ_attainment) == 'College Graduate' ? 'selected' : '' }}>College Graduate</option>
                                            <option value="Some/Completed Masters Degree" {{ old('h_educ_attainment', $types->h_educ_attainment) == 'Some/Completed Masters Degree' ? 'selected' : '' }}>Some/Completed Masters Degree</option>
                                            <option value="Masters Graduate" {{ old('h_educ_attainment', $types->h_educ_attainment) == 'Masters Graduate' ? 'selected' : '' }}>Masters Graduate</option>
                                            <option value="Vocational/TVET" {{ old('h_educ_attainment', $types->h_educ_attainment) == 'Vocational/TVET' ? 'selected' : '' }}>Vocational/TVET</option>
                                        </select> 
                                        
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        
                                        <label class="form-label">Monthly Income</label>
                                        <select name="monthly_income" class="form-select mb-3 form-control">
                                            <option value="" selected disabled>Select monthly income range</option>
                                            <option value="Unemployed" {{ old('monthly_income', $types->monthly_income) == 'Unemployed' ? 'selected' : '' }}>Unemployed</option>
                                            <option value="Php 20,000 and below" {{ old('monthly_income', $types->monthly_income) == 'Php 20,000 and below' ? 'selected' : '' }}>Php 20,000 and below</option>
                                            <option value="Php 21,000-30,000" {{ old('monthly_income', $types->monthly_income) == 'Php 21,000-30,000' ? 'selected' : '' }}>Php 21,000-30,000</option>
                                            <option value="Php 31,000-40,000" {{ old('monthly_income', $types->monthly_income) == 'Php 31,000-40,000' ? 'selected' : '' }}>Php 31,000-40,000</option>
                                            <option value="Php 41,000-50,000" {{ old('monthly_income', $types->monthly_income) == 'Php 41,000-50,000' ? 'selected' : '' }}>Php 41,000-50,000</option>
                                            <option value="Php 51,000 and above" {{ old('monthly_income', $types->monthly_income) == 'Php 51,000 and above' ? 'selected' : '' }}>Php 51,000 and above</option>
                                        </select> 
                                        
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        
                                        <label class="form-label">Religion</label>
                                        <select name="religion" class="form-select mb-3 form-control" >
                                            <option value="" selected disabled>Select religion</option>
                                            <option value="Roman Catholicism" {{ old('religion', $types->religion) == 'Roman Catholicism' ? 'selected' : '' }}>Roman Catholicism</option>
                                            <option value="Islam" {{ old('religion', $types->religion) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                            <option value="Iglesia ni Cristo" {{ old('religion', $types->religion) == 'Iglesia ni Cristo' ? 'selected' : '' }}>Iglesia ni Cristo</option>
                                            <option value="Philippine Independent Church" {{ old('religion', $types->religion) == 'Philippine Independent Church' ? 'selected' : '' }}>Philippine Independent Church</option>
                                            <option value="Other Christians" {{ old('religion', $types->religion) == 'Other Christians' ? 'selected' : '' }}>Other Christians</option>
                                            <option value="Others" {{ old('religion', $types->religion) == 'Others' ? 'selected' : '' }}>Others</option>
                                        </select> 
                                        
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        
                                        <label class="form-label">Nationality</label>
                                        <select name="nationality" class="form-select mb-3 form-control">
                                            <option value="" selected disabled>Select nationality</option>
                                            <option value="Filipino" {{ old('nationality', $types->nationality) == 'Filipino' ? 'selected' : '' }}>Filipino</option>
                                            <option value="Japanese" {{ old('nationality', $types->nationality) == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                                            <option value="American" {{ old('nationality', $types->nationality) == 'American' ? 'selected' : '' }}>American</option>
                                        </select> 
                                        
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">PhilHealth Number</label>
                                        <input type="number" name="philhealth_no" class="form-control" value="{{ old('philhealth_no', $types->philhealth_no) }}"> 
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Voter's ID</label>
                                        <input type="number" name="votersID" class="form-control" value="{{ old('votersID', $types->votersID) }}"> 
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <legend>Family Information</legend>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Total Household</label>
                                        <input type="number" name="household_no" class="form-control" value="{{ old('household_no', $types->household_no) }}"> 
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        
                                        <label class="form-label">Purok ID</label>
                                        <select name="purokID" class="form-select mb-3 form-control">
                                            <option value="" selected disabled>Select purok ID</option>
                                            <option value="Purok 6" {{ old('purokID', $types->purokID) == 'Purok 6' ? 'selected' : '' }}>Purok 6</option>
                                            <option value="Purok 7" {{ old('purokID', $types->purokID) == 'Purok 7' ? 'selected' : '' }}>Purok 7</option>
                                            <option value="Purok 8" {{ old('purokID', $types->purokID) == 'Purok 8' ? 'selected' : '' }}>Purok 8</option>
                                        </select> 
                                        
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        
                                        <label class="form-label">House Ownership Status</label>
                                        <select name="h_ownership_status" class="form-select mb-3 form-control">
                                            <option value="" selected disabled>Select ownership status</option>
                                            <option value="Owned" {{ old('h_ownership_status', $types->h_ownership_status) == 'Owned' ? 'selected' : '' }}>Owned</option>
                                            <option value="Mortgaged" {{ old('h_ownership_status', $types->h_ownership_status) == 'Mortgaged' ? 'selected' : '' }}>Mortgaged</option>
                                            <option value="Rented" {{ old('h_ownership_status', $types->h_ownership_status) == 'Rented' ? 'selected' : '' }}>Rented</option>
                                            <option value="Co-owned" {{ old('h_ownership_status', $types->h_ownership_status) == 'Co-owned' ? 'selected' : '' }}>Co-owned</option>
                                            <option value="Inherited" {{ old('h_ownership_status', $types->h_ownership_status) == 'Inherited' ? 'selected' : '' }}>Inherited</option>
                                            <option value="Occupied without ownership" {{ old('h_ownership_status', $types->h_ownership_status) == 'Occupied without ownership' ? 'selected' : '' }}>Occupied without ownership</option>
                                        </select> 
                                        
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Length Stay</label>
                                        <input type="number" name="length_stay" class="form-control" value="{{ old('length_stay', $types->length_stay) }}"> 
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">r_head_family</label>
                                        <input type="text" name="r_head_family" class="form-control" value="{{ old('r_head_family', $types->r_head_family) }}"> 
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        
                                        <label class="form-label">Number of disabled person in the household</label>
                                        <select name="abled_person" class="form-select mb-3 form-control">
                                            <option value="" selected disabled>Select number of disabled person in the household</option>
                                            <option value="None" {{ old('abled_person', $types->abled_person) == 'None' ? 'selected' : '' }}>None</option>
                                            <option value="1" {{ old('abled_person', $types->abled_person) == '1' ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('abled_person', $types->abled_person) == '2' ? 'selected' : '' }}>2</option>
                                            <option value="3 or more" {{ old('abled_person', $types->abled_person) == '3 or more' ? 'selected' : '' }}>3 or more</option>
                                        </select> 
                                        
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        </fieldset>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script type="text/javascript">
    $(document).ready(function () {
        $('#image').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>

<!-- Validation -->
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                photo: {
                    required : false,
                }, 
                name: {
                    required : true,
                }, 
                first_name: {
                    required : true,
                }, 
                middle_name: {
                    required : true,
                }, 
                last_name: {
                    required : true,
                }, 
                birthdate: {
                    required : true,
                }, 
                birthplace: {
                    required : true,
                }, 
                age: {
                    required : true,
                }, 
                gender: {
                    required : true,
                }, 
                blood_type: {
                    required : true,
                }, 
                marital_status: {
                    required : true,
                }, 
                civil_status: {
                    required : true,
                }, 
                h_educ_attainment: {
                    required : true,
                }, 
                monthly_income: {
                    required : true,
                }, 
                religion: {
                    required : true,
                }, 
                nationality: {
                    required : true,
                }, 
                philhealth_no: {
                    required : false,
                }, 
                votersID: {
                    required : false,
                }, 
                household_no: {
                    required : true,
                }, 
                purokID: {
                    required : true,
                }, 
                h_ownership_status: {
                    required : true,
                }, 
                length_stay: {
                    required : true,
                }, 
                r_head_family: {
                    required : true,
                }, 
                abled_person: {
                    required : true,
                }, 
                
            },
            messages :{
                // photo: {
                //     required : 'Please select a photo.',
                // }, 
                name: {
                    required : 'Please enter name.',
                },
                first_name: {
                    required : 'Please enter first name.',
                },
                middle_name: {
                    required : 'Please enter middle name.',
                },
                last_name: {
                    required : 'Please enter last name.',
                },
                birthdate: {
                    required : 'Please select birthdate.',
                },
                birthplace: {
                    required : 'Please enter birthplace.',
                },
                age: {
                    required : 'Please enter age.',
                },
                gender: {
                    required : 'Please select gender.',
                },
                blood_type: {
                    required : 'Please select blood type.',
                },
                marital_status: {
                    required : 'Please select marital status.',
                },
                civil_status: {
                    required : 'Please select civil status.',
                },
                h_educ_attainment: {
                    required : 'Please select higher eductaional attainment.',
                },
                monthly_income: {
                    required : 'Please select monthly income.',
                },
                religion: {
                    required : 'Please select religion.',
                },
                nationality: {
                    required : 'Please select nationality.',
                },
                // philhealth_no: {
                //     required : 'This field is required.',
                // },
                // votersID: {
                //     required : 'This field is required.',
                // },
                household_no: {
                    required : 'Please enter household number.',
                },
                purokID: {
                    required : 'Please enter purok.',
                },
                h_ownership_status: {
                    required : 'Please select house ownership status.',
                },
                length_stay: {
                    required : 'Please enter length stay.',
                },
                r_head_family: {
                    required : 'This field is required.',
                },
                abled_person: {
                    required : 'Please select number of disabled person in the household.',
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


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const editLink = document.querySelector(".edit-photo-link");
        const fileInput = document.querySelector("#photo-input");
        const image = document.querySelector(".resident-image");

        editLink.addEventListener("click", function (e) {
            e.preventDefault();
            fileInput.click();
        });

        fileInput.addEventListener("change", function () {
            const file = fileInput.files[0];
            if (file) {
                const imageURL = URL.createObjectURL(file);
                image.src = imageURL;
            }
        });
    });
</script>

@endsection




