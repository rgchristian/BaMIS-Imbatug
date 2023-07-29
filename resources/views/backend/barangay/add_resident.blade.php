@extends('admin.admin_dashboard') 
@section('admin')

<!-- jQuery Google CDN via W3schools.com -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('barangay.residents') }}" class="btn btn-inverse-primary" title="Back">Back</a>
        </ol>
    </nav>
    <div class="row profile-body">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add barangay resident</h6>
                        <form id="myForm" method="POST" action="{{ route('store.resident') }}" class="forms-sample" enctype="multipart/form-data"> @csrf <fieldset>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-3">
                                                <label for="photo" class="form-label">Photo</label>
                                                <input class="form-control" name="photo" type="file" id="image">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label"></label>
                                                <img id="showImage" class="wd-300 rounded-circle" src="{{ (!empty($photo)) ? url('upload/residents_images/'.$photo) : url('upload/user_cactus_jack.png') }}" alt="profile" style="float: left; margin-left: 430px; margin-bottom: 20px; margin-top: 20px;">
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    <div class="row">
                                        <legend>Personal Information</legend>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter name"> 
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label">First Name</label>
                                                <input type="text" name="first_name" class="form-control" placeholder="Enter first name"> 
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Middle Name</label>
                                                <input type="text" name="middle_name" class="form-control" placeholder="Enter middle name"> 
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" name="last_name" class="form-control" placeholder="Enter last name"> 
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group mb-3">
                                                <label for="birthdate" class="form-label">Birthdate</label>
                                                <div class="input-group">
                                                    <input type="datetime" id="birthdate" name="birthdate" class="form-control flatpickr-input active" placeholder="Select date" readonly="readonly">
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
                                        <div class="col-sm-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Birthplace</label>
                                                <input type="text" name="birthplace" class="form-control" placeholder="Enter birthplace"> 
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Age</label>
                                                <input type="number" name="age" class="form-control" placeholder="Enter age"> 
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Gender</label>
                                                <select name="gender" class="form-select mb-3 form-control">
                                                    <option value="" selected disabled>Select gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select> 
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Blood Type</label>
                                                <select name="blood_type" class="form-select mb-3 form-control">
                                                    <option value="" selected disabled>Select blood type</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="AB">AB</option>
                                                    <option value="O">O</option>
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
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Widowed">Widowed</option>
                                                    <option value="Divorced">Divorced</option>
                                                </select> 
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Civil Status</label>
                                                <select name="civil_status" class="form-select mb-3 form-control">
                                                    <option value="" selected disabled>Select civil status</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Registered partnership">Registered partnership</option>
                                                    <option value="Civil union">Civil union</option>
                                                    <option value="Domestic partnership">Domestic partnership</option>
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
                                                    <option value="Some Elementary">Some Elementary</option>
                                                    <option value="Elementary Graduate">Elementary Graduate</option>
                                                    <option value="Some High School">Some High School</option>
                                                    <option value="High School Graduate">High School Graduate</option>
                                                    <option value="Some College/Vocational">Some College/Vocational</option>
                                                    <option value="College Graduate">College Graduate</option>
                                                    <option value="Some/Completed Masters Degree">Some/Completed Masters Degree</option>
                                                    <option value="Masters Graduate">Masters Graduate</option>
                                                    <option value="Vocational/TVET">Vocational/TVET</option>
                                                </select> 
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Monthly Income</label>
                                                <select name="monthly_income" class="form-select mb-3 form-control">
                                                    <option value="" selected disabled>Select monthly income range</option>
                                                    <option value="Unemployed">Unemployed</option>
                                                    <option value="Php 20,000 and below">Php 20,000 and below</option>
                                                    <option value="Php 21,000-30,000">Php 21,000-30,000</option>
                                                    <option value="Php 31,000-40,000">Php 31,000-40,000</option>
                                                    <option value="Php 41,000-50,000">Php 41,000-50,000</option>
                                                    <option value="Php 51,000 and above">Php 51,000 and above</option>
                                                    <option value="Prefer not to say">Prefer not to say</option>
                                                </select> 
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Religion</label>
                                                <select name="religion" class="form-select mb-3 form-control">
                                                    <option value="" selected disabled>Select religion</option>
                                                    <option value="Roman Catholicism">Roman Catholicism</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                                                    <option value="Philippine Independent Church">Philippine Independent Church</option>
                                                    <option value="Other Christians">Other Christians</option>
                                                    <option value="Others">Others</option>
                                                </select> 
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Nationality</label>
                                                <select name="nationality" class="form-select mb-3 form-control">
                                                    <option value="" selected disabled>Select nationality</option>
                                                    <option value="Filipino">Filipino</option>
                                                    <option value="Japanese">Japanese</option>
                                                    <option value="American">American</option>
                                                </select> 
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">PhilHealth Number</label>
                                                <input type="number" name="philhealth_no" class="form-control" placeholder="Enter PhilHealth number"> 
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Voter's ID</label>
                                                <input type="number" name="votersID" class="form-control" placeholder="Enter voter's ID"> 
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    <legend>Family Information</legend>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Total Household</label>
                                                <input type="number" name="household_no" class="form-control" placeholder="Enter total household"> 
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Purok ID</label>
                                                <select name="purokID" class="form-select mb-3 form-control">
                                                    <option value="" selected disabled>Select purok ID</option>
                                                    <option value="Purok 6">Purok 6</option>
                                                    <option value="Purok 7">Purok 7</option>
                                                    <option value="Purok 8">Purok 8</option>
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
                                                    <option value="Owned">Owned</option>
                                                    <option value="Mortgaged">Mortgaged</option>
                                                    <option value="Rented">Rented</option>
                                                    <option value="Co-owned">Co-owned</option>
                                                    <option value="Inherited">Inherited</option>
                                                    <option value="Occupied without ownership">Occupied without ownership</option>
                                                </select> 
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Length Stay</label>
                                                <input type="number" name="length_stay" class="form-control" placeholder="Enter length stay"> 
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">r_head_family</label>
                                                <input type="text" name="r_head_family" class="form-control" placeholder="Enter r_head_family"> 
                                            </div>
                                        </div><!-- Col -->
                                        <div class="col-sm-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Number of disabled person in the household</label>
                                                <select name="abled_person" class="form-select mb-3 form-control">
                                                    <option value="" selected disabled>Select number of disabled person in the household</option>
                                                    <option value="None">None</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3 or more">3 or more</option>
                                                </select> 
                                            </div>
                                        </div><!-- Col -->
                                    </div><!-- Row -->
                                    <div class="row">
                                        <div class="col-sm-6">
                            </fieldset>
                            <button type="submit" class="btn btn-primary me-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script to preview selected image as new photo -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var img = new Image();
                img.src = e.target.result;
                img.onload = function() {
                    var canvas = document.createElement('canvas');
                    var ctx = canvas.getContext('2d');
                    // Set the canvas dimensions to 800x800
                    canvas.width = 730;
                    canvas.height = 730;
                    // Calculate the position to center the image
                    var offsetX = (730 - img.width) / 2;
                    var offsetY = (730 - img.height) / 2;
                    // Draw the image on the canvas at the center
                    ctx.drawImage(img, offsetX, offsetY, img.width, img.height);
                    // Convert the canvas to data URL and set it as the source
                    $('#showImage').attr('src', canvas.toDataURL('image/jpeg'));
                };
            };
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
                    required : true,
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
                photo: {
                    required : 'Please select a photo.',
                }, 
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
          
@endsection