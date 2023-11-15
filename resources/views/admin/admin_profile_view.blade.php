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
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
					</ol>
				</nav>

        <div class="row profile-body">
        
          <!-- left wrapper start -->
          <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
            <div class="card rounded">
              <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-2">
  <div class="profile-image">
    <img class="profile-image" 
         src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.png') }}" 
         alt="">
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
          
          <div class="col-md-8 stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Update Admin Profile</h6>

            <form method="POST" action="{{ route('admin.profile.store') }}" class="forms-sample" enctype="multipart/form-data">
                @csrf
                
                

                <h5 class="text-muted mb-3"><a>Barangay Admin Information</a></h5>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->username }}">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->name }}">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3 form-group">
                            <label for="term_start" class="form-label">Phone</label>
                            <div class="input-group">
                                <input type="number" name="phone" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->phone }}">
                            </div>
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-6">
                        <div class="mb-3 form-group">
                            <label for="term_end" class="form-label">Email</label>
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->email }}">
                            </div>
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
                
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="exampleInputEmail1" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->address }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="exampleInputEmail1" class="form-label">Photo</label>
                        <input class="form-control" name="photo" type="file" id="image">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="exampleInputEmail1" class="form-label"></label>
                        <img id="showImage" class="profile-preview" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.png') }}" alt="profile">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Save">Save</button>
            </form>
        </div>
    </div>
</div>


          <!-- right wrapper start -->
          
          <!-- right wrapper end -->
        </div>

			</div>

      

      <!-- Script to preview selected image as new photo -->
      <script type="text/javascript">
        $(document).ready(function(){
          $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
              $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
          });
        });

      </script>

@endsection