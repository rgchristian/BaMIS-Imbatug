@extends('admin.admin_dashboard')
@section('admin')

<!-- jQuery Google CDN via W3schools.com -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<style>
  .profile-image {
    width: 100px; /* Desired width */
    height: 100px; /* Desired height */
    object-fit: cover; /* This ensures the image covers the entire container without distorting the aspect ratio */
    border-radius: 50%; /* To make it a circle, assuming the image is already a square */
    display: flex; /* Use flexbox for centering */
    justify-content: center; /* Horizontally center the image */
    align-items: center; /* Vertically center the image */
    margin: 0 auto; /* To center the container itself (optional if it's already centered in its parent) */
  }

  .profile-preview {
    width: 80px; /* Desired width */
    height: 80px; /* Desired height */
    object-fit: cover; /* This ensures the image covers the entire container without distorting the aspect ratio */
    border-radius: 50%; /* To make it a circle, assuming the image is already a square */
  }

</style>

<div class="page-content">

<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Admin</li>
						<li class="breadcrumb-item active" aria-current="page">Change Password</li>
					</ol>
				</nav>



    <!-- Content -->

        

  <div class="row profile-body">
  
    <!-- left wrapper start -->
    <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
            <div class="card rounded">
              <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-2">
  <div class="profile-image">
    <img class="profile-image" 
         src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.png') }}" 
         alt="profile">
  </div>
</div>
                
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Username</label>
                  <p class="text-muted">{{ $profileData->username }}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Name</label>
                  <p class="text-muted">{{ $profileData->name }}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Email</label>
                  <p class="text-muted">{{ $profileData->email }}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone</label>
                  <p class="text-muted">{{ $profileData->phone }}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Address</label>
                  <p class="text-muted">{{ $profileData->address }}</p>
                </div>
                
              </div>
            </div>
          </div>
          <!-- left wrapper end -->

    <!-- middle wrapper start -->
    <div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Change Admin Password</h6>

            <form id="myForm" method="POST" action="{{ route('admin.update.password') }}" class="forms-sample">
                @csrf
                
              

                <h5 class="text-muted mb-3"><a>Barangay Admin Password</a></h5>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group mb-3">
                            <label class="form-label">Old Password</label>
                            <input type="password" name="old_password" class="form-control" id="old_password" autocomplete="off">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" name="new_password" class="form-control" id="new_password" autocomplete="off">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3 form-group">
                            <label for="term_start" class="form-label">Confirm New Password</label>
                            <div class="input-group">
                                <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation" autocomplete="off">
                            </div>
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->

                <button type="submit" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Save">Save</button>
            </form>
        </div>
    </div>
</div>

    <!-- middle wrapper end -->
    <!-- right wrapper start -->

    <!-- right wrapper end -->
  </div>

  <!-- End Content -->
</div>



<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                old_password: {
                    required : true,
                }, 
                new_password: {
                    required : true,
                }, 
                new_password_confirmation: {
                    required : true,
                }, 
            },
            messages :{
                old_password: {
                    required : 'Please enter old password.',
                }, 
                new_password: {
                    required : 'Please enter new password.',
                }, 
                new_password_confirmation: {
                    required : 'Please re-type new password.',
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
