@extends('admin.admin_dashboard')
@section('admin')

<!-- jQuery Google CDN via W3schools.com -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/webcam-easy/dist/webcam-easy.min.js"></script>

<style>
    #captureButtonContainer {
    position: absolute;
    bottom: 40px; /* Adjust this value to position the button vertically */
    left: 50%;
    transform: translateX(-50%);
}

</style>

<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
            <li class="breadcrumb-item active" aria-current="page">Resident</li>
        </ol>
    </nav>
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('barangay.residents') }}" class="btn btn-inverse-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Back">Back</a>
        </ol>
    </nav>
    <form id="myForm" method="POST" action="{{ route('store.resident') }}" class="forms-sample" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-md-4">
                <div class="card stretch-card">
                    <div class="card-body">
                        <!-- <div class="d-flex align-items-baseline position-absolute bottom-0 end-0 m-3">
                            <i class="link-icon" data-feather="help-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Hover and click on the image frame to browse the file."></i>
                            </div> -->

                        <div class="d-flex align-items-baseline position-absolute top-0 end-0 m-1">
                            <div class="toggle-camer mb-2">
                                <a type="button" id="toggleCameraButton" class="btn btn-link" data-bs-toggle="tooltip" data-bs-placement="top" title="Toggle camera">
                                <i class="link-icon" data-feather="video"></i>
                                </a>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-center">
    <div class="resident-image add-photo-container" style="width: 300px; height: 300px; overflow: hidden; border-radius: 50%;">
        <div class="d-flex justify-content-center" style="width: 100%; height: 100%; border-radius: 50%; overflow: hidden;">
            <video id="webCam" autoplay playsinline style="object-fit: cover; width: 100%; height: 100%; border-radius: 50%; display: none;"></video>
            <img class="rounded-circle changed-image" id="photoImage" name="photo" src="{{ (!empty($photo)) ? url('upload/residents_images/'.$photo) : url('upload/no_image.png') }}" alt="photo" style="object-fit: cover; width: 100%; height: 100%; border-radius: 50%;" onclick="openFileBrowser()">
            <input type="file" name="photo" id="photoInput" style="display: none;" onchange="displaySelectedImage(this)">
            
        </div>
    </div>
    </div>

    <div class="d-flex justify-content-center" id="captureButtonContainer" style="display: none;">
    <a download id="captureButton" name="photo" class="btn btn-outline-danger rounded-circle capture-button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Capture photo" style="display: none;"><i class="link-icon" data-feather="camera"></i></a>
</div>       

                    </div>
                </div>
            </div>
            
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add Barangay Resident</h6>
                        <div class="d-flex align-items-baseline position-absolute top-0 end-0 m-3">
                        <i class="link-icon" data-feather="help-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="A resident photo is required. Hover and click on the image frame to browse the file."></i>
                            </div>
                        <h5 class="text-muted mb-3"><a>Personal Information</a></h5>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter full name">
                                </div>
                            </div>
                            <!-- Col -->
                            <!-- <div class="col-sm-4">
                                <div class="text-center form-group mb-3">
                                <div class="d-flex align-items-center justify-content-center">
                                <img class="square" name="qr_code" src="{{ (!empty($photo)) ? url('upload/residents_images/'.$photo) : url('upload/no_image.png') }}" alt="qr_code" style="max-width: 50px;">
                                <input type="file" name="qr_code" id="" style="display: none;">
                                </div>
                                </div>
                                </div> -->
                        </div>
                        <!-- Row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">First Name</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="Enter first name">
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Middle Name</label>
                                    <input type="text" name="middle_name" class="form-control" placeholder="Enter middle name">
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" placeholder="Enter last name">
                                </div>
                            </div>
                            <!-- Col -->
                        </div>
                        <!-- Row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Sex</label>
                                    <select name="sex" class="form-select mb-3 form-control">
                                        <option value="" selected disabled>Select sex</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label for="birthdate" class="form-label">Birthdate</label>
                                    <div class="input-group">
                                        <input type="datetime" id="birthdate" name="birthdate" class="form-control flatpickr-input active" placeholder="Select birthdate" readonly="readonly">
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
                            </div>
                            <!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                <label for="moral" class="form-label">
                                    Age <a data-bs-toggle="tooltip" data-bs-placement="top" title="Age will be automatically added if the birthdate is filled." class="text-primary">(?)</a>
                                    </label>
                                    <input type="number" name="age" id="age" class="form-control" readonly>
                                </div>
                            </div>
                            <!-- Col -->
                        </div>
                        <!-- Row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="number" name="phone" class="form-control" placeholder="Enter phone">
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select mb-3 form-control">
                                        <option value="" selected disabled>Select status</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Separated">Separated</option>
                                        <option value="Cohabitation">Cohabitation (live-in)</option>
                                        <option value="Widow/er">Widow/er</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">PWD - Person with Disability</label>
                                    <select name="pwd" class="form-select mb-3 form-control" id="pwd-select">
                                        <option value="" selected disabled>Select answer</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <div id="pwd-details" style="display: none;">
                                        <label class="form-label">Specify Disability</label>
                                        <select name="pwd" id="yes-pwd" class="form-select mb-3 form-control">
                                            <option value="" selected disabled>Select type of disability</option>
                                            <option value="Deaf">Deaf or Hard of Hearing</option>
                                            <option value="Intellectual Disability">Intellectual Disability</option>
                                            <option value="Learning Disability">Learning Disability</option>
                                            <option value="Mental Disability">Mental Disability</option>
                                            <option value="Physical Disability">Physical Disability</option>
                                            <option value="Psychosocial Disability">Psychosocial Disability</option>
                                            <option value="Speech and Language Impairment">Speech and Language Impairment</option>
                                            <option value="Visual Disability">Visual Disability</option>
                                            <option value="Cancer">Cancer (RA11215)</option>
                                            <option value="Rare Disease">Rare Disease (RA10747)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Col -->
                        </div>
                        <!-- Row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Tribe</label>
                                    <select name="tribe" class="form-select mb-3 form-control">
                                        <option value="" selected disabled>Select tribe</option>
                                        <optgroup label="Common Ethnolinguistic Groups in Bukidnon">
                                            <option value="Talaandig">Talaandig</option>
                                            <option value="Higaonon">Higaonon</option>
                                            <option value="Bukidnon">Bukidnon</option>
                                            <option value="Umayamnon">Umayamnon</option>
                                            <option value="Matigsalug">Matigsalug</option>
                                            <option value="Manobo">Manobo</option>
                                            <option value="Tigwahanon">Tigwahanon</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Religion</label>
                                    <select name="religion" class="form-select mb-3 form-control" id="religion-select">
                                        <option value="" selected disabled>Select religion</option>
                                        <option value="Roman Catholicism">Roman Catholic</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    <div class="mb-3 form-group" id="other-religion-input" style="display: none;">
                                        <label class="form-label">Specify Religion</label>
                                        <input type="text" name="religion" id="other-religion" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Citizenship</label>
                                    <input type="text" name="citizenship" class="form-control" value="Filipino" readonly> 
                                </div>
                            </div>
                            <!-- Col -->
                        </div>
                        <!-- Row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Enter full address">
                                </div>
                            </div>
                            <!-- Col -->
                        </div>
                        <!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Educational Attainment</label>
                                    <select name="educational_attainment" class="form-select mb-3 form-control">
                                        <option value="" selected disabled>Select educational attainment</option>
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
                            </div>
                            <!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Occupation</label>
                                    <input type="text" name="occupation" class="form-control" placeholder="Enter occupation">
                                </div>
                            </div>
                            <!-- Col -->
                        </div>
                        <!-- Row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Relation to the HH Head</label>
                                    <input type="number" name="relation_to_the_hh_head" class="form-control" placeholder="Enter number">
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="moral" class="form-label">
                                    Ethical Conduct <a data-bs-toggle="tooltip" data-bs-placement="top" title="Check if this resident has an unsettled case(s)." href="{{ route('barangay.blotter.records') }}" class="text-primary">(?)</a>
                                    </label>
                                    <select name="moral" class="form-select mb-3 form-control">
                                        <option value="" selected disabled>Select </option>
                                        <option value="Good Conduct (No Case)">Good Conduct (No Case)</option>
                                        <option value="Has Unsettled Case">Has Unsettled Case</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label for="moral" class="form-label">
                                    Participation <a data-bs-toggle="tooltip" data-bs-placement="top" title="Check if this resident is participating in a barangay event or meeting." href="{{ route('barangay.attendance.records') }}" class="text-primary">(?)</a>
                                    </label>
                                    <select name="active_participation" class="form-select mb-3 form-control">
                                        <option value="" selected disabled>Select </option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Col -->
                        </div>
                        <!-- Row -->
                        <h5 class="text-muted mb-3"><a>Barangay & Location Information</a></h5>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Region</label>
                                    <input type="text" name="region" class="form-control" value="Region X" readonly> 
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Province</label>
                                    <input type="text" name="province" class="form-control" value="Bukidnon" readonly> 
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Municipality</label>
                                    <input type="text" name="municipality" class="form-control" value="Baungon" readonly> 
                                </div>
                            </div>
                            <!-- Col -->
                        </div>
                        <!-- Row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label for="barangay" class="form-label">Barangay</label>
                                    <div class="input-group">
                                        <input type="text" name="barangay" class="form-control" value="Imbatug" readonly> 
                                    </div>
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Purok</label>
                                    <select name="purok" class="form-select mb-3 form-control">
                                        <option value="" selected disabled>Select purok</option>
                                        <option value="Purok 1">Purok 1</option>
                                        <option value="Purok 2">Purok 2</option>
                                        <option value="Purok 3">Purok 3</option>
                                        <option value="Purok 4">Purok 4</option>
                                        <option value="Purok 5">Purok 5</option>
                                        <option value="Purok 6">Purok 6</option>
                                        <option value="Purok 7">Purok 7</option>
                                        <option value="Purok 8">Purok 8</option>
                                        <option value="Purok 9">Purok 9</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Household No.</label>
                                    <input type="number" name="household_no" class="form-control" placeholder="Enter household number"> 
                                </div>
                            </div>
                            <!-- Col -->
                            <!-- </div>
                                <div class="row">
                                <div class="col-sm-12">
                                                                  <div class="form-group mb-3">
                                                                      <label class="form-label">Signature</label>
                                		<textarea name="signature" class="form-control" rows="3"></textarea> 
                                                                  </div>
                                                              </div> -->
                            <!-- <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">E-Signature</label>
                                <input type="file" name="signature" class="form-control"> 
                                </div>
                                </div> -->
                            <!-- <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label for="birthdate" class="form-label">Date Added</label>
                                    <div class="input-group">
                                        <input type="datetime" id="resident_added" name="date_filed_resident_profile" class="form-control flatpickr-input active" placeholder="Select date added" readonly="readonly">
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
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-8">
                                <div class="e-signature">
                                <div class="d-flex mb-4"> 
                                <img class="square" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.png') }}" alt="profile" style="max-width: 100px;">
                                </div>
                                </div>
                                </div> -->
                        </div>
                        <!-- Row -->
                        <button type="submit" class="btn btn-primary submit">Save</button>
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
                photo: {
                    required : true,
                }, 
                qr_code: {
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
                sex: {
                    required : true,
                },
                birthdate: {
                    required : true,
                },
                age: {
                    required : false,
                },
                phone: {
                    required : false,
                },
                status: {
                    required : false,
                },
                pwd: {
                    required : false,
                },
                tribe: {
                    required : false,
                },
                religion: {
                    required : false,
                }, 
                citizenship: {
                    required : false,
                },
                address: {
                    required : true,
                },
                educational_attainment: {
                    required : false,
                },
                occupation: {
                    required : false,
                },
                relation_to_the_hh_head: {
                    required : false,
                },
                moral: {
                    required : false,
                },
                active_participation: {
                    required : false,
                },
                region: {
                    required : false,
                },
                province: {
                    required : false,
                },
                municipality: {
                    required : false,
                },
                barangay: {
                    required : true,
                },
                purok: {
                    required : true,
                }, 
                household_no: {
                    required : true,
                },
                signature: {
                    required : false,
                },
                date_filed_resident_profile: {
                    required : false,
                },
                
            },
            messages :{
                photo: {
                    required : 'Please select a photo.',
                },
                qr_code: {
                    required : 'Please select a QR Code.',
                }, 
                name: {
                    required : 'Please enter full name.',
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
                sex: {
                    required : 'Please select sex.',
                }, 
                birthdate: {
                    required : 'Please select birthdate.',
                }, 
                age: {
                    required : 'Please enter age.',
                }, 
                phone: {
                    required : 'Please enter phone.',
                }, 
                status: {
                    required : 'Please select status.',
                }, 
                pwd: {
                    required : 'Please select answer.',
                }, 
                tribe: {
                    required : 'Please select tribe.',
                }, 
                religion: {
                    required : 'Please select religion.',
                }, 
                citizenship: {
                    required : 'Please enter citizenship.',
                },
                address: {
                    required : 'Please enter address.',
                },
                educational_attainment: {
                    required : 'Please select educational attainment.',
                },
                occupation: {
                    required : 'Please enter occupation.',
                },
                relation_to_the_hh_head: {
                    required : 'Please enter relation.',
                },
                moral: {
                    required : 'Please select moral.',
                },
                active_participation: {
                    required : 'Please select participation.',
                },
                region: {
                    required : 'Please enter region.',
                },
                province: {
                    required : 'Please enter province.',
                },
                municipality: {
                    required : 'Please enter municipality.',
                },
                barangay: {
                    required : 'Please select barangay.',
                },
                purok: {
                    required : 'Please select purok.',
                },
                household_no: {
                    required : 'Please enter household number.',
                },
                signature: {
                    required : 'Please sign signature.',
                },
                date_filed_resident_profile: {
                    required : 'Please select date added.',
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
<!-- End Validation -->

<!-- Browse File and then preview the selected image -->
<script>
    function openFileBrowser() {
        // Trigger a click event on the hidden file input
        document.getElementById('photoInput').click();
    }
    
    function displaySelectedImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function(e) {
                // Set the src attribute of the image to the selected file's data URL
                document.getElementById('photoImage').src = e.target.result;
            };
    
            // Read the selected file as a data URL
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<!-- End Browse File and then preview the selected image -->

<!-- Set age -->
<script>
    $(document).ready(function() {
        $('#birthdate').on('change', function() {
            // Get the selected birthdate value
            var birthdate = $(this).val();
            
            // Calculate the age
            var today = new Date();
            var birthDate = new Date(birthdate);
            var age = today.getFullYear() - birthDate.getFullYear();
            
            // Set the calculated age in the 'age' input field
            $('#age').val(age);
        });
    });
</script>
<!-- End Set age -->

<!-- Please be specify -->
<script>
    document.getElementById('religion-select').addEventListener('change', function () {
        var select = this;
        var inputDiv = document.getElementById('other-religion-input');
    
        if (select.value === 'Others') {
            inputDiv.style.display = 'block';
        } else {
            inputDiv.style.display = 'none';
        }
    });
</script>
<!-- End Please be specify -->

<!-- Please be specify -->
<script>
    document.getElementById('pwd-select').addEventListener('change', function () {
        var select = this;
        var pwdDetails = document.getElementById('pwd-details');
    
        if (select.value === 'Yes') {
            pwdDetails.style.display = 'block';
        } else {
            pwdDetails.style.display = 'none';
        }
    });
</script>
<!-- End Please be specify -->

<script>
    const webCamElement = document.getElementById("webCam");
    const toggleCameraButton = document.getElementById("toggleCameraButton");
    const photoImage = document.getElementById("photoImage");
    const captureButton = document.getElementById("captureButton");

    let webcam = null;
    let isCameraOn = false;

    // Function to toggle the button text and icon
    function toggleButtonTextAndIcon(isCameraOn) {
        if (isCameraOn) {
            toggleCameraButton.innerHTML = '<i class="link-icon" data-feather="video-off"></i>';
            captureButton.style.display = "block"; // Show the capture button
        } else {
            toggleCameraButton.innerHTML = '<i class="link-icon" data-feather="video"></i>';
            captureButton.style.display = "none"; // Hide the capture button
        }
        feather.replace();
    }

    // Function to toggle the webcam on and off
    function toggleCamera() {
        if (!isCameraOn) {
            // Create a new webcam instance and start it
            webcam = new Webcam(webCamElement, "user");
            webcam.start();
            photoImage.style.display = "none"; // Hide the image when the camera is on
            webCamElement.style.display = "block"; // Show the camera preview
            toggleButtonTextAndIcon(true);
        } else {
            // Stop and remove the webcam instance
            webcam.stop();
            webcam = null;
            photoImage.style.display = "block"; // Show the image when the camera is off
            webCamElement.style.display = "none"; // Hide the camera preview
            toggleButtonTextAndIcon(false);
        }
        isCameraOn = !isCameraOn;
    }

    // Add a click event listener to the toggle camera button
    toggleCameraButton.addEventListener("click", toggleCamera);

    // Function to capture and save the photo
    function captureAndSavePhoto() {
        const canvas = document.createElement("canvas");
        const context = canvas.getContext("2d");
        const video = document.getElementById("webCam");

        // Set the canvas dimensions to match the video frame
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;

        // Draw the current video frame onto the canvas
        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        // Convert the canvas image to a data URL
        const photoDataUrl = canvas.toDataURL("image/jpeg");

        // Display the captured photo in the frame
        photoImage.src = photoDataUrl;

         // Stop the webcam
        toggleCamera(); // This will turn off the webcam

        // Save the photo locally in the specified path
        const photoBlob = dataURItoBlob(photoDataUrl);
        const formData = new FormData();
        formData.append("photo", photoBlob);

        // Make an AJAX request to save the photo locally
        fetch("/public/upload/resident_images", {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    // Photo saved successfully
                    console.log("Photo saved locally.");
                } else {
                    // Handle the error
                    console.error("Error saving photo locally.");
                }
            });

        // Save the photo in the database (assuming you have the necessary route and controller method)
        const photoInput = document.getElementById("photoInput");
        photoInput.files = [photoBlob]; // Set the selected file to the captured photo
        // Submit the form to trigger the Laravel controller method
        document.getElementById("myForm").submit(); // Replace 'yourFormId' with the actual form ID
    }

    // Add a click event listener to the capture button
    captureButton.addEventListener("click", captureAndSavePhoto);

    // Function to convert data URL to Blob
    function dataURItoBlob(dataURI) {
        const byteString = atob(dataURI.split(",")[1]);
        const mimeString = dataURI.split(",")[0].split(":")[1].split(";")[0];
        const ab = new ArrayBuffer(byteString.length);
        const ia = new Uint8Array(ab);
        for (let i = 0; i < byteString.length; i++) {
            ia[i] = byteString.charCodeAt(i);
        }
        return new Blob([ab], { type: mimeString });
    }

    // Add a click event listener to the photo frame for opening the file browser
    photoImage.addEventListener("click", openFileBrowser);

    // Function to open the file browser (keep your existing openFileBrowser() function)
    function openFileBrowser() {
        // Trigger a click event on the hidden file input
        document.getElementById('photoInput').click();
    }
</script>

@endsection