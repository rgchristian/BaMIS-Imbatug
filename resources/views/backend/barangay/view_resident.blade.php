@extends('admin.admin_dashboard') 
@section('admin')

<!-- jQuery Google CDN via W3schools.com -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

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
                        <h6 class="card-title">Resident's Information</h6>
                        <fieldset>
                            <div class="row">
                            <div class="col-sm-12 text-center">
                                    <input type="file" id="image" style="display: none;">

                                <div class="col-sm-6 mx-auto">
                                    <div class="mb-3">
                                    <img class="wd-500 img-fluid rounded-circle resident-image" src="{{ asset($residents->photo) }}" alt="{{ $residents->photo }}" style="max-width: 300px;">
                                    </div>
                                    </div>
                                </div><!-- Col -->
                                
                            </div><!-- Row -->
                            <div class="row">
                            <legend>Personal Information</legend>
                            <div class="form-group mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $residents->name }}" readonly> 
                                    </div>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">First Name</label>
                                        <input type="text" name="first_name" class="form-control" value="{{ $residents->first_name }}" readonly>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Middle Name</label>
                                        <input type="text" name="middle_name" class="form-control" value="{{ $residents->middle_name }}" readonly> 
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" value="{{ $residents->last_name }}" readonly> 
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <form id="birthdate">
                                        <label for="birthdate" class="form-label">Birthdate</label>
                                        <div class="input-group">
                                            <input type="datetime" id="birthdate" name="birthdate" class="form-control flatpickr-input active" placeholder="Select date" value="{{ $residents->birthdate }}" readonly disabled>
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
                                    <div class="mb-3">
                                        <label class="form-label">Birthplace</label>
                                        <input type="text" name="birthplace" class="form-control" value="{{ $residents->birthplace }}" readonly> 
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Age</label>
                                        <input type="number" name="age" class="form-control" value="{{ $residents->age }}" readonly> 
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        
                                        <label class="form-label">Gender</label>
                                        <select name="gender" class="form-select mb-3 form-control" readonly>
                                            <option value="" selected disabled>Select gender </option> 
                                            <option value="Male" disabled {{ $residents->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" disabled {{ $residents->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                        </select> 
                                        
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        
                                        <label class="form-label">Blood Type</label>
                                        <select name="blood_type" class="form-select mb-3 form-control" readonly>
                                            <option value="" selected disabled>Select blood type</option>
                                            <option value="A" disabled {{ $residents->blood_type == 'A' ? 'selected' : '' }}>A</option>
                                            <option value="B" disabled {{ $residents->blood_type == 'B' ? 'selected' : '' }}>B</option>
                                            <option value="AB" disabled {{ $residents->blood_type == 'AB' ? 'selected' : '' }}>AB</option>
                                            <option value="O" disabled {{ $residents->blood_type == 'O' ? 'selected' : '' }}>O</option>
                                        </select> 
                                        
                                    </div>
                                </div><!-- Col -->


                                </div><!-- Row -->
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Phone</label>
                                                <input type="number" name="phone" class="form-control" value="{{ old('phone', $residents->phone) }}" readonly> 
                                            </div>
                                        </div><!-- Col -->

                                        <div class="col-sm-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" value="{{ old('email', $residents->email) }}" readonly> 
                                            </div>
                                        </div><!-- Col -->


                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        
                                        <label class="form-label">Marital Status</label>
                                        <select name="marital_status" class="form-select mb-3 form-control" readonly>
                                            <option value="" selected disabled>Select marital status</option>
                                            <option value="Single" disabled {{ $residents->marital_status == 'Single' ? 'selected' : '' }}>Single</option>
                                            <option value="Married" disabled {{ $residents->marital_status == 'Married' ? 'selected' : '' }}>Married</option>
                                            <option value="Widowed" disabled {{ $residents->marital_status == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                            <option value="Divorced" disabled {{ $residents->marital_status == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                        </select> 
                                        
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        
                                        <label class="form-label">Civil Status</label>
                                        <select name="civil_status" class="form-select mb-3 form-control" readonly>
                                            <option value="" selected disabled>Select civil status</option>
                                            <option value="Single" disabled {{ $residents->civil_status == 'Single' ? 'selected' : '' }}>Single</option>
                                            <option value="Registered partnership" disabled {{ $residents->civil_status == 'Registered partnership' ? 'selected' : '' }}>Registered partnership</option>
                                            <option value="Civil union" disabled {{ $residents->civil_status == 'Civil union' ? 'selected' : '' }}>Civil union</option>
                                            <option value="Domestic partnership" disabled {{ $residents->civil_status == 'Domestic partnership' ? 'selected' : '' }}>Domestic partnership</option>
                                        </select> 
                                        
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        
                                        <label class="form-label">Higher Educational Attainment</label>
                                        <select name="h_educ_attainment" class="form-select mb-3 form-control" readonly>
                                            <option value="" selected disabled>Select higher educational attainment</option>
                                            <option value="Some Elementary" disabled {{ $residents->h_educ_attainment == 'Some Elementary' ? 'selected' : '' }}>Some Elementary</option>
                                            <option value="Elementary Graduate" disabled {{ $residents->h_educ_attainment == 'Elementary Graduate' ? 'selected' : '' }}>Elementary Graduate</option>
                                            <option value="Some High School" disabled {{ $residents->h_educ_attainment == 'Some High School' ? 'selected' : '' }}>Some High School</option>
                                            <option value="High School Graduate" disabled {{ $residents->h_educ_attainment == 'High School Graduate' ? 'selected' : '' }}>High School Graduate</option>
                                            <option value="Some College/Vocational" disabled {{ $residents->h_educ_attainment == 'Some College/Vocational' ? 'selected' : '' }}>Some College/Vocational</option>
                                            <option value="College Graduate" disabled {{ $residents->h_educ_attainment == 'College Graduate' ? 'selected' : '' }}>College Graduate</option>
                                            <option value="Some/Completed Masters Degree" disabled {{ $residents->h_educ_attainment == 'Some/Completed Masters Degree' ? 'selected' : '' }}>Some/Completed Masters Degree</option>
                                            <option value="Masters Graduate" disabled {{ $residents->h_educ_attainment == 'Masters Graduate' ? 'selected' : '' }}>Masters Graduate</option>
                                            <option value="Vocational/TVET" disabled {{ $residents->h_educ_attainment == 'Vocational/TVET' ? 'selected' : '' }}>Vocational/TVET</option>
                                        </select> 
                                        
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        
                                        <label class="form-label">Monthly Income</label>
                                        <select name="monthly_income" class="form-select mb-3 form-control" readonly>
                                            <option value="" selected disabled>Select monthly income range</option>
                                            <option value="Unemployed" disabled {{ $residents->monthly_income == 'Unemployed' ? 'selected' : '' }}>Unemployed</option>
                                            <option value="Php 20,000 and below" disabled {{ $residents->monthly_income == 'Php 20,000 and below' ? 'selected' : '' }}>Php 20,000 and below</option>
                                            <option value="Php 21,000-30,000" disabled {{ $residents->monthly_income == 'Php 21,000-30,000' ? 'selected' : '' }}>Php 21,000-30,000</option>
                                            <option value="Php 31,000-40,000" disabled {{ $residents->monthly_income == 'Php 31,000-40,000' ? 'selected' : '' }}>Php 31,000-40,000</option>
                                            <option value="Php 41,000-50,000" disabled {{ $residents->monthly_income == 'Php 41,000-50,000' ? 'selected' : '' }}>Php 41,000-50,000</option>
                                            <option value="Php 51,000 and above" disabled {{ $residents->monthly_income == 'Php 51,000 and above' ? 'selected' : '' }}>Php 51,000 and above</option>
                                        </select> 
                                       
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        
                                        <label class="form-label">Religion</label>
                                        <select name="religion" class="form-select mb-3 form-control" readonly>
                                            <option value="" selected disabled>Select religion</option>
                                            <option value="Roman Catholicism" disabled {{ $residents->religion == 'Roman Catholicism' ? 'selected' : '' }}>Roman Catholicism</option>
                                            <option value="Islam" disabled {{ $residents->religion == 'Islam' ? 'selected' : '' }}>Islam</option>
                                            <option value="Iglesia ni Cristo" disabled {{ $residents->religion == 'Iglesia ni Cristo' ? 'selected' : '' }}>Iglesia ni Cristo</option>
                                            <option value="Philippine Independent Church" disabled {{ $residents->religion == 'Philippine Independent Church' ? 'selected' : '' }}>Philippine Independent Church</option>
                                            <option value="Other Christians" disabled {{ $residents->religion == 'Other Christians' ? 'selected' : '' }}>Other Christians</option>
                                            <option value="Others" disabled {{ $residents->religion == 'Others' ? 'selected' : '' }}>Others</option>
                                        </select> 
                                        
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        
                                        <label class="form-label">Nationality</label>
                                        <select name="nationality" class="form-select mb-3 form-control" readonly>
                                            <option value="" selected disabled>Select nationality</option>
                                            <option value="Filipino" disabled {{ $residents->nationality == 'Filipino' ? 'selected' : '' }}>Filipino</option>
                                            <option value="Japanese" disabled {{ $residents->nationality == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                                            <option value="American" disabled {{ $residents->nationality == 'American' ? 'selected' : '' }}>American</option>
                                        </select> 
                                        
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">PhilHealth Number</label>
                                        <input type="number" name="philhealth_no" class="form-control" value="{{ $residents->philhealth_no }}" readonly> 
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Voter's ID</label>
                                        <input type="number" name="votersID" class="form-control" value="{{ $residents->votersID }}"readonly> 
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <legend>Family Information</legend>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Total Household</label>
                                        <input type="number" name="household_no" class="form-control" value="{{ $residents->household_no }}" readonly> 
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        
                                        <label class="form-label">Purok ID</label>
                                        <select name="purokID" class="form-select mb-3 form-control" readonly>
                                            <option value="" selected disabled>Select purok ID</option>
                                            <option value="Purok 6" disabled {{ $residents->purokID == 'Purok 6' ? 'selected' : '' }}>Purok 6</option>
                                            <option value="Purok 7" disabled {{ $residents->purokID == 'Purok 7' ? 'selected' : '' }}>Purok 7</option>
                                            <option value="Purok 8" disabled {{ $residents->purokID == 'Purok 8' ? 'selected' : '' }}>Purok 8</option>
                                        </select> 
                                        
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        
                                        <label class="form-label">House Ownership Status</label>
                                        <select name="h_ownership_status" class="form-select mb-3 form-control" readonly>
                                            <option value="" selected disabled>Select ownership status</option>
                                            <option value="Owned" disabled {{ $residents->h_ownership_status == 'Owned' ? 'selected' : '' }}>Owned</option>
                                            <option value="Mortgaged" disabled {{ $residents->h_ownership_status == 'Mortgaged"' ? 'selected' : '' }}>Mortgaged</option>
                                            <option value="Rented" disabled {{ $residents->h_ownership_status == 'Rented' ? 'selected' : '' }}>Rented</option>
                                            <option value="Co-owned" disabled {{ $residents->h_ownership_status == 'Co-owned' ? 'selected' : '' }}>Co-owned</option>
                                            <option value="Inherited" disabled {{ $residents->h_ownership_status == 'Inherited' ? 'selected' : '' }}>Inherited</option>
                                            <option value="Occupied without ownership" disabled {{ $residents->h_ownership_status == 'Occupied without ownership' ? 'selected' : '' }}>Occupied without ownership</option>
                                        </select> 
                                        
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Length Stay</label>
                                        <input type="number" name="length_stay" class="form-control" value="{{ $residents->length_stay }}" readonly> 
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">r_head_family</label>
                                        <input type="text" name="r_head_family" class="form-control" value="{{ $residents->r_head_family }}" readonly> 
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        
                                        <label class="form-label">Number of disabled person in the household</label>
                                        <select name="abled_person" class="form-select mb-3 form-control" readonly>
                                            <option value="" selected disabled>Select number of disabled person in the household</option>
                                            <option value="None" disabled {{ $residents->abled_person == 'None' ? 'selected' : '' }}>None</option>
                                            <option value="1" disabled {{ $residents->abled_person == '1' ? 'selected' : '' }}>1</option>
                                            <option value="2" disabled {{ $residents->abled_person == '2' ? 'selected' : '' }}>2</option>
                                            <option value="3 or more" disabled {{ $residents->abled_person == '3 or more' ? 'selected' : '' }}>3 or more</option>
                                        </select> 
                                        
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                        </fieldset>
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

          // Set the canvas dimensions to 730x730
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




@endsection