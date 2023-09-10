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
                                    <img class="wd-500 img-fluid rounded-circle resident-image" src="{{ asset($types->photo) }}" alt="{{ $types->photo }}" style="max-width: 300px;">
                                    </div>
                                    </div>
                                </div><!-- Col -->
                                
                            </div><!-- Row -->
                            <div class="row">
                            <legend>Personal Information</legend>
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">First Name</label>
                                        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ $types->first_name }}" readonly> @error('first_name') <span class="text-danger"> {{ $message }}</span> @enderror
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Middle Name</label>
                                        <input type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" value="{{ $types->middle_name }}" readonly> @error('middle_name') <span class="text-danger"> {{ $message }}</span> @enderror
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ $types->last_name }}" readonly> @error('last_name') <span class="text-danger"> {{ $message }}</span> @enderror
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <form id="birthdate">
                                        <label for="birthdate" class="form-label">Birthdate</label>
                                        <div class="input-group">
                                            <input type="datetime" id="birthdate" name="birthdate" class="form-control flatpickr-input active" placeholder="Select date" value="{{ $types->birthdate }}" readonly disabled>
                                            <span class="input-group-text input-group-addon" data-toggle="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                                </svg>
                                            </span>
                                        </div> @error('birthdate') <span class="text-danger">{{ $message }}</span> @enderror
                                        </form>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Birthplace</label>
                                        <input type="text" name="birthplace" class="form-control @error('birthplace') is-invalid @enderror" value="{{ $types->birthplace }}" readonly> @error('birthplace') <span class="text-danger"> {{ $message }}</span> @enderror
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Age</label>
                                        <input type="number" name="age" class="form-control @error('age') is-invalid @enderror" value="{{ $types->age }}" readonly> @error('age') <span class="text-danger"> {{ $message }}</span> @enderror
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        
                                        <label class="form-label">Gender</label>
                                        <select name="gender" class="form-select mb-3 form-control @error('gender') is-invalid @enderror" readonly>
                                            <option value="" selected disabled>Select gender </option> 
                                            <option value="Male" disabled {{ $types->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" disabled {{ $types->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                        </select> @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                                        
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        
                                        <label class="form-label">Blood Type</label>
                                        <select name="blood_type" class="form-select mb-3 form-control @error('blood_type') is-invalid @enderror" readonly>
                                            <option value="" selected disabled>Select blood type</option>
                                            <option value="A" disabled {{ $types->blood_type == 'A' ? 'selected' : '' }}>A</option>
                                            <option value="B" disabled {{ $types->blood_type == 'B' ? 'selected' : '' }}>B</option>
                                            <option value="AB" disabled {{ $types->blood_type == 'AB' ? 'selected' : '' }}>AB</option>
                                            <option value="O" disabled {{ $types->blood_type == 'O' ? 'selected' : '' }}>O</option>
                                        </select> @error('blood_type') <span class="text-danger">{{ $message }}</span> @enderror
                                        
                                    </div>
                                </div><!-- Col -->


                                </div><!-- Row -->
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Phone</label>
                                                <input type="number" name="phone" class="form-control" value="{{ old('phone', $types->phone) }}" readonly> 
                                            </div>
                                        </div><!-- Col -->

                                        <div class="col-sm-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" value="{{ old('email', $types->email) }}" readonly> 
                                            </div>
                                        </div><!-- Col -->


                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        
                                        <label class="form-label">Marital Status</label>
                                        <select name="marital_status" class="form-select mb-3 form-control @error('marital_status') is-invalid @enderror" readonly>
                                            <option value="" selected disabled>Select marital status</option>
                                            <option value="Single" disabled {{ $types->marital_status == 'Single' ? 'selected' : '' }}>Single</option>
                                            <option value="Married" disabled {{ $types->marital_status == 'Married' ? 'selected' : '' }}>Married</option>
                                            <option value="Widowed" disabled {{ $types->marital_status == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                            <option value="Divorced" disabled {{ $types->marital_status == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                        </select> @error('marital_status') <span class="text-danger">{{ $message }}</span> @enderror
                                        
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        
                                        <label class="form-label">Civil Status</label>
                                        <select name="civil_status" class="form-select mb-3 form-control @error('civil_status') is-invalid @enderror" readonly>
                                            <option value="" selected disabled>Select civil status</option>
                                            <option value="Single" disabled {{ $types->civil_status == 'Single' ? 'selected' : '' }}>Single</option>
                                            <option value="Registered partnership" disabled {{ $types->civil_status == 'Registered partnership' ? 'selected' : '' }}>Registered partnership</option>
                                            <option value="Civil union" disabled {{ $types->civil_status == 'Civil union' ? 'selected' : '' }}>Civil union</option>
                                            <option value="Domestic partnership" disabled {{ $types->civil_status == 'Domestic partnership' ? 'selected' : '' }}>Domestic partnership</option>
                                        </select> @error('civil_status') <span class="text-danger">{{ $message }}</span> @enderror
                                        
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        
                                        <label class="form-label">Higher Educational Attainment</label>
                                        <select name="h_educ_attainment" class="form-select mb-3 form-control @error('h_educ_attainment') is-invalid @enderror" readonly>
                                            <option value="" selected disabled>Select higher educational attainment</option>
                                            <option value="Some Elementary" disabled {{ $types->h_educ_attainment == 'Some Elementary' ? 'selected' : '' }}>Some Elementary</option>
                                            <option value="Elementary Graduate" disabled {{ $types->h_educ_attainment == 'Elementary Graduate' ? 'selected' : '' }}>Elementary Graduate</option>
                                            <option value="Some High School" disabled {{ $types->h_educ_attainment == 'Some High School' ? 'selected' : '' }}>Some High School</option>
                                            <option value="High School Graduate" disabled {{ $types->h_educ_attainment == 'High School Graduate' ? 'selected' : '' }}>High School Graduate</option>
                                            <option value="Some College/Vocational" disabled {{ $types->h_educ_attainment == 'Some College/Vocational' ? 'selected' : '' }}>Some College/Vocational</option>
                                            <option value="College Graduate" disabled {{ $types->h_educ_attainment == 'College Graduate' ? 'selected' : '' }}>College Graduate</option>
                                            <option value="Some/Completed Masters Degree" disabled {{ $types->h_educ_attainment == 'Some/Completed Masters Degree' ? 'selected' : '' }}>Some/Completed Masters Degree</option>
                                            <option value="Masters Graduate" disabled {{ $types->h_educ_attainment == 'Masters Graduate' ? 'selected' : '' }}>Masters Graduate</option>
                                            <option value="Vocational/TVET" disabled {{ $types->h_educ_attainment == 'Vocational/TVET' ? 'selected' : '' }}>Vocational/TVET</option>
                                        </select> @error('h_educ_attainment') <span class="text-danger">{{ $message }}</span> @enderror
                                        
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        
                                        <label class="form-label">Monthly Income</label>
                                        <select name="monthly_income" class="form-select mb-3 form-control @error('monthly_income') is-invalid @enderror" readonly>
                                            <option value="" selected disabled>Select monthly income range</option>
                                            <option value="Unemployed" disabled {{ $types->monthly_income == 'Unemployed' ? 'selected' : '' }}>Unemployed</option>
                                            <option value="Php 20,000 and below" disabled {{ $types->monthly_income == 'Php 20,000 and below' ? 'selected' : '' }}>Php 20,000 and below</option>
                                            <option value="Php 21,000-30,000" disabled {{ $types->monthly_income == 'Php 21,000-30,000' ? 'selected' : '' }}>Php 21,000-30,000</option>
                                            <option value="Php 31,000-40,000" disabled {{ $types->monthly_income == 'Php 31,000-40,000' ? 'selected' : '' }}>Php 31,000-40,000</option>
                                            <option value="Php 41,000-50,000" disabled {{ $types->monthly_income == 'Php 41,000-50,000' ? 'selected' : '' }}>Php 41,000-50,000</option>
                                            <option value="Php 51,000 and above" disabled {{ $types->monthly_income == 'Php 51,000 and above' ? 'selected' : '' }}>Php 51,000 and above</option>
                                        </select> @error('monthly_income') <span class="text-danger">{{ $message }}</span> @enderror
                                       
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        
                                        <label class="form-label">Religion</label>
                                        <select name="religion" class="form-select mb-3 form-control @error('religion') is-invalid @enderror" readonly>
                                            <option value="" selected disabled>Select religion</option>
                                            <option value="Roman Catholicism" disabled {{ $types->religion == 'Roman Catholicism' ? 'selected' : '' }}>Roman Catholicism</option>
                                            <option value="Islam" disabled {{ $types->religion == 'Islam' ? 'selected' : '' }}>Islam</option>
                                            <option value="Iglesia ni Cristo" disabled {{ $types->religion == 'Iglesia ni Cristo' ? 'selected' : '' }}>Iglesia ni Cristo</option>
                                            <option value="Philippine Independent Church" disabled {{ $types->religion == 'Philippine Independent Church' ? 'selected' : '' }}>Philippine Independent Church</option>
                                            <option value="Other Christians" disabled {{ $types->religion == 'Other Christians' ? 'selected' : '' }}>Other Christians</option>
                                            <option value="Others" disabled {{ $types->religion == 'Others' ? 'selected' : '' }}>Others</option>
                                        </select> @error('religion') <span class="text-danger">{{ $message }}</span> @enderror
                                        
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        
                                        <label class="form-label">Nationality</label>
                                        <select name="nationality" class="form-select mb-3 form-control @error('nationality') is-invalid @enderror" readonly>
                                            <option value="" selected disabled>Select nationality</option>
                                            <option value="Filipino" disabled {{ $types->nationality == 'Filipino' ? 'selected' : '' }}>Filipino</option>
                                            <option value="Japanese" disabled {{ $types->nationality == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                                            <option value="American" disabled {{ $types->nationality == 'American' ? 'selected' : '' }}>American</option>
                                        </select> @error('nationality') <span class="text-danger">{{ $message }}</span> @enderror
                                        
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">PhilHealth Number</label>
                                        <input type="number" name="philhealth_no" class="form-control @error('philhealth_no') is-invalid @enderror" value="{{ $types->philhealth_no }}" readonly> @error('philhealth_no') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Voter's ID</label>
                                        <input type="number" name="votersID" class="form-control @error('votersID') is-invalid @enderror" value="{{ $types->votersID }}"readonly> @error('votersID') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <legend>Family Information</legend>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Total Household</label>
                                        <input type="number" name="household_no" class="form-control @error('household_no') is-invalid @enderror" value="{{ $types->household_no }}" readonly> @error('household_no') <span class="text-danger"> {{ $message }}</span> @enderror
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        
                                        <label class="form-label">Purok ID</label>
                                        <select name="purokID" class="form-select mb-3 form-control @error('purokID') is-invalid @enderror" readonly>
                                            <option value="" selected disabled>Select purok ID</option>
                                            <option value="Purok 6" disabled {{ $types->purokID == 'Purok 6' ? 'selected' : '' }}>Purok 6</option>
                                            <option value="Purok 7" disabled {{ $types->purokID == 'Purok 7' ? 'selected' : '' }}>Purok 7</option>
                                            <option value="Purok 8" disabled {{ $types->purokID == 'Purok 8' ? 'selected' : '' }}>Purok 8</option>
                                        </select> @error('purokID') <span class="text-danger">{{ $message }}</span> @enderror
                                        
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        
                                        <label class="form-label">House Ownership Status</label>
                                        <select name="h_ownership_status" class="form-select mb-3 form-control @error('h_ownership_status') is-invalid @enderror" readonly>
                                            <option value="" selected disabled>Select ownership status</option>
                                            <option value="Owned" disabled {{ $types->h_ownership_status == 'Owned' ? 'selected' : '' }}>Owned</option>
                                            <option value="Mortgaged" disabled {{ $types->h_ownership_status == 'Mortgaged"' ? 'selected' : '' }}>Mortgaged</option>
                                            <option value="Rented" disabled {{ $types->h_ownership_status == 'Rented' ? 'selected' : '' }}>Rented</option>
                                            <option value="Co-owned" disabled {{ $types->h_ownership_status == 'Co-owned' ? 'selected' : '' }}>Co-owned</option>
                                            <option value="Inherited" disabled {{ $types->h_ownership_status == 'Inherited' ? 'selected' : '' }}>Inherited</option>
                                            <option value="Occupied without ownership" disabled {{ $types->h_ownership_status == 'Occupied without ownership' ? 'selected' : '' }}>Occupied without ownership</option>
                                        </select> @error('h_ownership_status') <span class="text-danger">{{ $message }}</span> @enderror
                                        
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Length Stay</label>
                                        <input type="number" name="length_stay" class="form-control @error('length_stay') is-invalid @enderror" value="{{ $types->length_stay }}" readonly> @error('length_stay') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">r_head_family</label>
                                        <input type="text" name="r_head_family" class="form-control @error('r_head_family') is-invalid @enderror" value="{{ $types->r_head_family }}" readonly> @error('r_head_family') <span class="text-danger"> {{ $message }}</span> @enderror
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        
                                        <label class="form-label">Number of disabled person in the household</label>
                                        <select name="abled_person" class="form-select mb-3 form-control @error('abled_person') is-invalid @enderror" readonly>
                                            <option value="" selected disabled>Select number of disabled person in the household</option>
                                            <option value="None" disabled {{ $types->abled_person == 'None' ? 'selected' : '' }}>None</option>
                                            <option value="1" disabled {{ $types->abled_person == '1' ? 'selected' : '' }}>1</option>
                                            <option value="2" disabled {{ $types->abled_person == '2' ? 'selected' : '' }}>2</option>
                                            <option value="3 or more" disabled {{ $types->abled_person == '3 or more' ? 'selected' : '' }}>3 or more</option>
                                        </select> @error('abled_person') <span class="text-danger">{{ $message }}</span> @enderror
                                        
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