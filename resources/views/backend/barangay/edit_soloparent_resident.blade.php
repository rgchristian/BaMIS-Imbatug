@extends('admin.admin_dashboard')
@section('admin')

<!-- jQuery Google CDN via W3schools.com -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
            <li class="breadcrumb-item active" aria-current="page">Solo Parent</li>
            <li class="breadcrumb-item active" aria-current="page">Resident</li>
        </ol>
    </nav>
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('total.soloparent.residents') }}" class="btn btn-inverse-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Back">Back</a>
        </ol>
    </nav>
    <form id="myForm" method="POST" action="{{ route('update.soloparent.resident', ['id' => $edit_soloparent_resident->id]) }}" class="forms-sample" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $edit_soloparent_resident->id }}">

        <div class="row">

            <div class="col-md-4">
                <div class="card stretch-card">
                    <div class="card-body">
                        <!-- <div class="d-flex align-items-baseline position-absolute bottom-0 end-0 m-3">
                            <i class="link-icon" data-feather="help-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Hover and click on the image frame to browse the file."></i>
                            </div> -->

                        <div class="d-flex align-items-baseline position-absolute top-0 end-0 m-1">
                            <div class="toggle-camer mb-2">
                                <a type="button" id="accesscamera" data-toggle="modal" data-target="#photoModal" class="btn btn-link" data-bs-toggle="tooltip" data-bs-placement="top" title="Open camera">
                                <i class="link-icon" data-feather="video"></i>
                                </a>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-center">
    <div class="resident-image add-photo-container" style="width: 300px; height: 300px; overflow: hidden; border-radius: 50%;">
        <div class="d-flex justify-content-center" style="width: 100%; height: 100%; border-radius: 50%; overflow: hidden;">
            <video id="webCam" autoplay playsinline style="object-fit: cover; width: 100%; height: 100%; border-radius: 50%; display: none;"></video>
            <img class="rounded-circle changed-image" id="photoImage" name="photo" src="{{ asset($edit_soloparent_resident->photo) }}" alt="{{ $edit_soloparent_resident->photo }}" style="object-fit: cover; width: 100%; height: 100%; border-radius: 50%;" onclick="openFileBrowser()">
            <input type="file" name="photo" id="photoInput" style="display: none;" onchange="displaySelectedImage(this)">
            
        </div>
    </div>
    </div>

    <!-- <div class="d-flex justify-content-center" id="captureButtonContainer" style="display: none;">
    <a download id="captureButton" name="photo" class="btn btn-outline-danger rounded-circle capture-button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Capture photo" style="display: none;"><i class="link-icon" data-feather="camera"></i></a>
</div>        -->

                    </div>
                </div>
            </div>

            <!--Modal-->
    <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Take Photo</h5>
                    <button type="button" id="closeWebcam" class="btn btn-danger close" data-bs-toggle="tooltip" data-bs-placement="top" title="Close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <div id="my_camera" class="d-block mx-auto rounded overflow-hidden"></div>
                    </div>
                    <div id="results" class="d-none"></div>
                    <form method="post" id=""> 
                        <input type="hidden" id="photoStore" name="photoStore" value="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info mx-auto text-white rounded-circle" id="takephoto"><i class="link-icon" data-feather="camera" data-bs-toggle="tooltip" data-bs-placement="top" title="Capture photo"></i></button>
                    <button type="button" class="btn btn-danger mx-auto text-white d-none" id="retakephoto"><i class="link-icon" data-feather="arrow-left" data-bs-toggle="tooltip" data-bs-placement="top" title="Retake photo"></i></button>
                    <button type="submit" class="btn btn-success mx-auto text-white d-none" id="uploadphoto" form=""><i class="link-icon" data-feather="download" data-bs-toggle="tooltip" data-bs-placement="top" title="Upload photo"></i></button>
                </div>
            </div>
        </div>
    </div>
            
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Barangay Resident</h6>
                        <div class="d-flex align-items-baseline position-absolute top-0 end-0 m-3">
                        <i class="link-icon" data-feather="help-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="A resident photo is required. Hover and click on the image frame to browse the file."></i>
                            </div>
                        <h5 class="text-muted mb-3"><a>Personal Information</a></h5>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $edit_soloparent_resident->name }}">
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
                                    <input type="text" name="first_name" class="form-control" value="{{ $edit_soloparent_resident->first_name }}">
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Middle Name</label>
                                    <input type="text" name="middle_name" class="form-control" value="{{ $edit_soloparent_resident->middle_name }}">
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" value="{{ $edit_soloparent_resident->last_name }}">
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
                                        <option value="Male" {{ $edit_soloparent_resident->sex == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ $edit_soloparent_resident->sex == 'Female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label for="birthdate" class="form-label">Birthdate</label>
                                    <div class="input-group">
                                        <input type="datetime" id="birthdate" name="birthdate" class="form-control flatpickr-input active" placeholder="Select birthdate" value="{{ old('birthdate', $edit_soloparent_resident->birthdate) }}">
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
                                <label for="age" class="form-label">
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
                                    <input type="number" name="phone" class="form-control" value="{{ $edit_soloparent_resident->phone }}">
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select mb-3 form-control">
                                        <option value="" selected disabled>Select status</option>
                                        <option value="Single" {{ $edit_soloparent_resident->status == 'Single' ? 'selected' : '' }}>Single</option>
                                        <option value="Married" {{ $edit_soloparent_resident->status == 'Married' ? 'selected' : '' }}>Married</option>
                                        <option value="Separated" {{ $edit_soloparent_resident->status == 'Separated' ? 'selected' : '' }}>Separated</option>
                                        <option value="Cohabitation" {{ $edit_soloparent_resident->status == 'Cohabitation' ? 'selected' : '' }}>Cohabitation</option>
                                        <option value="Widow/er" {{ $edit_soloparent_resident->status == 'Widow/er' ? 'selected' : '' }}>Widow/er</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">PWD - Person with Disability</label>
                                    <select name="" class="form-select mb-3 form-control" id="pwd-select">
                                        <option value="" selected disabled>Select answer</option>
                                        <option value="Yes" {{ $edit_soloparent_resident->pwd == 'Yes' ? 'selected' : '' }}>Yes</option>
                                        <option value="No" {{ $edit_soloparent_resident->pwd == 'No' ? 'selected' : '' }}>No</option>
                                    </select>
                                    <div id="pwd-details" style="display: none;">
                                        <label class="form-label">Specify Disability</label>
                                        <select name="pwd" id="yes-pwd" class="form-select mb-3 form-control">
                                            <option value="" selected disabled>Select type of disability</option>
                                            <option value="Deaf or Hard of Hearing" {{ $edit_soloparent_resident->pwd == 'Deaf or Hard of Hearing' ? 'selected' : '' }}>Deaf or Hard of Hearing</option>
                                            <option value="Intellectual Disability" {{ $edit_soloparent_resident->pwd == 'Intellectual Disability' ? 'selected' : '' }}>Intellectual Disability</option>
                                            <option value="Learning Disability" {{ $edit_soloparent_resident->pwd == 'Learning Disability' ? 'selected' : '' }}>Learning Disability</option>
                                            <option value="Mental Disability" {{ $edit_soloparent_resident->pwd == 'Mental Disability' ? 'selected' : '' }}>Mental Disability</option>
                                            <option value="Physical Disability" {{ $edit_soloparent_resident->pwd == 'Physical Disability' ? 'selected' : '' }}>Physical Disability</option>
                                            <option value="Psychosocial Disability" {{ $edit_soloparent_resident->pwd == 'Psychosocial Disability' ? 'selected' : '' }}>Psychosocial Disability</option>
                                            <option value="Speech and Language Impairment" {{ $edit_soloparent_resident->pwd == 'Speech and Language Impairment' ? 'selected' : '' }}>Speech and Language Impairment</option>
                                            <option value="Visual Disability" {{ $edit_soloparent_resident->pwd == 'Visual Disability' ? 'selected' : '' }}>Visual Disability</option>
                                            <option value="Cancer" {{ $edit_soloparent_resident->pwd == 'Cancer (RA11215)' ? 'selected' : '' }}>Cancer (RA11215)</option>
                                            <option value="Rare Disease" {{ $edit_soloparent_resident->pwd == 'Rare Disease (RA10747)' ? 'selected' : '' }}>Rare Disease (RA10747)</option>
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
                                        <option value="Talaandig" {{ $edit_soloparent_resident->tribe == 'Talaandig' ? 'selected' : '' }}>Talaandig</option>
                                        <option value="Higaonon" {{ $edit_soloparent_resident->tribe == 'Higaonon' ? 'selected' : '' }}>Higaonon</option>
                                        <option value="Bukidnon" {{ $edit_soloparent_resident->tribe == 'Bukidnon' ? 'selected' : '' }}>Bukidnon</option>
                                        <option value="Umayamnon" {{ $edit_soloparent_resident->tribe == 'Umayamnon' ? 'selected' : '' }}>Umayamnon</option>
                                        <option value="Matigsalug" {{ $edit_soloparent_resident->tribe == 'Matigsalug' ? 'selected' : '' }}>Matigsalug</option>
                                        <option value="Manobo" {{ $edit_soloparent_resident->tribe == 'Manobo' ? 'selected' : '' }}>Manobo</option>
                                        <option value="Tigwahanon" {{ $edit_soloparent_resident->tribe == 'Tigwahanon' ? 'selected' : '' }}>Tigwahanon</option>
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
                                        <option value="Roman Catholicism" {{ $edit_soloparent_resident->religion == 'Roman Catholic' ? 'selected' : '' }}>Roman Catholic</option>
                                        <option value="Islam" {{ $edit_soloparent_resident->religion == 'Islam' ? 'selected' : '' }}>Islam</option>
                                        <option value="Iglesia ni Cristo" {{ $edit_soloparent_resident->religion == 'Iglesia ni Cristo' ? 'selected' : '' }}>Iglesia ni Cristo</option>
                                        <option value="Others" {{ $edit_soloparent_resident->religion == 'Others' ? 'selected' : '' }}>Others</option>
                                    </select>
                                    <div class="mb-3 form-group" id="other-religion-input" style="display: none;">
                                        <label class="form-label">Specify Religion</label>
                                        <input type="text" name="religion" id="other-religion" class="form-control" value="{{ $edit_soloparent_resident->religion }}">
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
                                    <input type="text" name="address" class="form-control" value="{{ $edit_soloparent_resident->address }}">
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
                                        <option value="Some Elementary" {{ $edit_soloparent_resident->educational_attainment == 'Some Elementary' ? 'selected' : '' }}>Some Elementary</option>
                                        <option value="Elementary Graduate" {{ $edit_soloparent_resident->educational_attainment == 'Elementary Graduate' ? 'selected' : '' }}>Elementary Graduate</option>
                                        <option value="Some High School" {{ $edit_soloparent_resident->educational_attainment == 'Some High School' ? 'selected' : '' }}>Some High School</option>
                                        <option value="High School Graduate" {{ $edit_soloparent_resident->educational_attainment == 'High School Graduate' ? 'selected' : '' }}>High School Graduate</option>
                                        <option value="Some College/Vocational" {{ $edit_soloparent_resident->educational_attainment == 'Some College/Vocational' ? 'selected' : '' }}>Some College/Vocational</option>
                                        <option value="College Graduate" {{ $edit_soloparent_resident->educational_attainment == 'College Graduate' ? 'selected' : '' }}>College Graduate</option>
                                        <option value="Some/Completed Masters Degree" {{ $edit_soloparent_resident->educational_attainment == 'Some/Completed Masters Degree' ? 'selected' : '' }}>Some/Completed Masters Degree</option>
                                        <option value="Masters Graduate" {{ $edit_soloparent_resident->educational_attainment == 'Masters Graduate' ? 'selected' : '' }}>Masters Graduate</option>
                                        <option value="Vocational/TVET" {{ $edit_soloparent_resident->educational_attainment == 'Vocational/TVET' ? 'selected' : '' }}>Vocational/TVET</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Occupation</label>
                                    <input type="text" name="occupation" class="form-control" value="{{ $edit_soloparent_resident->occupation }}">
                                </div>
                            </div>
                            <!-- Col -->
                        </div>
                        <!-- Row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Relation to the HH Head</label>
                                    <input type="number" name="relation_to_the_hh_head" class="form-control" value="{{ $edit_soloparent_resident->relation_to_the_hh_head }}">
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
                                        <option value="Good Conduct (No Case)" {{ $edit_soloparent_resident->moral == 'Good Conduct (No Case)' ? 'selected' : '' }}>Good Conduct (No Case)</option>
                                        <option value="Has Unsettled Case" {{ $edit_soloparent_resident->moral == 'Has Unsettled Case' ? 'selected' : '' }}>Has Unsettled Case</option>
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
                                        <option value="Active" {{ $edit_soloparent_resident->active_participation == 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Inactive" {{ $edit_soloparent_resident->active_participation == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Col -->
                            </div>
                            <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                <label for="moral" class="form-label">
                                    Registered Voter
                                    </label>
                                    <select name="registered_voter" class="form-select mb-3 form-control">
                                        <option value="" selected disabled>Select </option>
                                        <option value="Yes" {{ $edit_soloparent_resident->registered_voter == 'Yes' ? 'selected' : '' }}>Yes</option>
                                        <option value="No" {{ $edit_soloparent_resident->registered_voter == 'No' ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                <label for="moral" class="form-label">
                                    House Representative <a data-bs-toggle="tooltip" data-bs-placement="top" title="A household representative is someone who will be participating the barangay meeting(s)." href="#" class="text-primary">(?)</a>
                                    </label>
                                    <select name="household_representative" class="form-select mb-3 form-control">
                                        <option value="" selected disabled>Select </option>
                                        <option value="Yes" {{ $edit_soloparent_resident->household_representative == 'Yes' ? 'selected' : '' }}>Yes</option>
                                        <option value="No" {{ $edit_soloparent_resident->household_representative == 'No' ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                            </div><!-- Col -->
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
                                        <option value="Purok 1" {{ $edit_soloparent_resident->purok == 'Purok 1' ? 'selected' : '' }}>Purok 1</option>
                                        <option value="Purok 2" {{ $edit_soloparent_resident->purok == 'Purok 2' ? 'selected' : '' }}>Purok 2</option>
                                        <option value="Purok 3" {{ $edit_soloparent_resident->purok == 'Purok 3' ? 'selected' : '' }}>Purok 3</option>
                                        <option value="Purok 4" {{ $edit_soloparent_resident->purok == 'Purok 4' ? 'selected' : '' }}>Purok 4</option>
                                        <option value="Purok 5" {{ $edit_soloparent_resident->purok == 'Purok 5' ? 'selected' : '' }}>Purok 5</option>
                                        <option value="Purok 6" {{ $edit_soloparent_resident->purok == 'Purok 6' ? 'selected' : '' }}>Purok 6</option>
                                        <option value="Purok 7" {{ $edit_soloparent_resident->purok == 'Purok 7' ? 'selected' : '' }}>Purok 7</option>
                                        <option value="Purok 8" {{ $edit_soloparent_resident->purok == 'Purok 8' ? 'selected' : '' }}>Purok 8</option>
                                        <option value="Purok 9" {{ $edit_soloparent_resident->purok == 'Purok 9' ? 'selected' : '' }}>Purok 9</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Household No.</label>
                                    <input type="number" name="household_no" class="form-control" value="{{ $edit_soloparent_resident->household_no }}"> 
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
                        <button type="submit" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Save Changes">Save Changes</button>
    </form>
    </div>
    </div>
    </div>
    </div>
</div>


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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
    Webcam.set({
        width: 320,
        height: 240,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    $('#accesscamera').on('click', function() {
        Webcam.reset();
        Webcam.on('error', function() {
            $('#photoModal').modal('hide');
            swal({
                title: 'Warning',
                text: 'Please give permission to access your webcam',
                icon: 'warning'
            });
        });
        Webcam.attach('#my_camera');
    });

    // Event handler for the close button
    $('#closeWebcam').on('click', function() {
        Webcam.reset(); // Stop the webcam capture
        $('#photoModal').modal('hide');
    });

    $('#takephoto').on('click', take_snapshot);

    $('#retakephoto').on('click', function() {
        $('#my_camera').addClass('d-block');
        $('#my_camera').removeClass('d-none');

        $('#results').addClass('d-none');

        $('#takephoto').addClass('d-block');
        $('#takephoto').removeClass('d-none');

        $('#retakephoto').addClass('d-none');
        $('#retakephoto').removeClass('d-block');

        $('#uploadphoto').addClass('d-none');
        $('#uploadphoto').removeClass('d-block');
    });

    $('#photoForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'photoUpload.php',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(data) {
                if(data == 'success') {
                    Webcam.reset();

                    $('#my_camera').addClass('d-block');
                    $('#my_camera').removeClass('d-none');

                    $('#results').addClass('d-none');

                    $('#takephoto').addClass('d-block');
                    $('#takephoto').removeClass('d-none');

                    $('#retakephoto').addClass('d-none');
                    $('#retakephoto').removeClass('d-block');

                    $('#uploadphoto').addClass('d-none');
                    $('#uploadphoto').removeClass('d-block');

                    $('#photoModal').modal('hide');

                    swal({
                        title: 'Success',
                        text: 'Photo uploaded successfully',
                        icon: 'success',
                        buttons: false,
                        closeOnClickOutside: false,
                        closeOnEsc: false,
                        timer: 2000
                    })
                }
                else {
                    swal({
                        title: 'Error',
                        text: 'Something went wrong',
                        icon: 'error'
                    })
                }
            }
        })
    })
})

function take_snapshot()
{
    //take snapshot and get image data
    Webcam.snap(function(data_uri) {
        //display result image
        $('#results').html('<img src="' + data_uri + '" class="d-block mx-auto rounded"/>');

        var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
        $('#photoStore').val(raw_image_data);
    });

    $('#my_camera').removeClass('d-block');
    $('#my_camera').addClass('d-none');

    $('#results').removeClass('d-none');

    $('#takephoto').removeClass('d-block');
    $('#takephoto').addClass('d-none');

    $('#retakephoto').removeClass('d-none');
    $('#retakephoto').addClass('d-block');

    $('#uploadphoto').removeClass('d-none');
    $('#uploadphoto').addClass('d-block');
}
</script>

<script src="{{ asset('plugin/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('plugin/webcamjs/webcam.min.js') }}"></script>

@endsection