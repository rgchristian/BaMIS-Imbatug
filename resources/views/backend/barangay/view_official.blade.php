@extends('admin.admin_dashboard')
@section('admin')

<!-- jQuery Google CDN via W3schools.com -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">

<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">View</li>
						<li class="breadcrumb-item active" aria-current="page">Barangay Official</li>
					</ol>
				</nav>

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('barangay.officials') }}" class="btn btn-inverse-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Back">Back</a>
        </ol>
    </nav>
    

                        <input type="hidden" name="id" value="{{ $view_official->id }}">

    <div class="row">

    <div class="col-md-4">
                <div class="card stretch-card">
                    <div class="card-body">

                        
                        
                        <div class="d-flex justify-content-center">
    <div class="official-image add-photo-container" style="width: 300px; height: 300px; overflow: hidden; border-radius: 50%;">
        <div class="d-flex justify-content-center" style="width: 100%; height: 100%; border-radius: 50%; overflow: hidden;">
            <video id="webCam" autoplay playsinline style="object-fit: cover; width: 100%; height: 100%; border-radius: 50%; display: none;"></video>
            <img class="rounded-circle changed-image" id="photoImage" name="photo" src="{{ asset($view_official->photo) }}" alt="{{ $view_official->photo }}" style="object-fit: cover; width: 100%; height: 100%; border-radius: 50%;" onclick="openFileBrowser()" readonly>
            <input type="file" name="photo" id="photoInput" style="display: none;" onchange="displaySelectedImage(this)">
            
        </div>
    </div>
    </div>

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



        <div class="col-md-8 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">View Barangay Official</h6>
                    
                        <h5 class="text-muted mb-3"><a>Barangay Official Information</a></h5>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $view_official->name }}" readonly>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Position</label>
                                    <select name="position" class="form-select mb-3 form-control" readonly>
                                        <option value="" selected disabled>Select position</option>
                                        <option value="Barangay Captain" disabled {{ $view_official->position == 'Barangay Captain' ? 'selected' : '' }}>Barangay Captain</option>
                                        <option value="Barangay Kagawad" disabled {{ $view_official->position == 'Barangay Kagawad' ? 'selected' : '' }}>Barangay Kagawad</option>
                                        <option value="Barangay Secretary" disabled {{ $view_official->position == 'Barangay Secretary' ? 'selected' : '' }}>Barangay Secretary</option>
                                        <option value="Barangay Treasurer" disabled {{ $view_official->position == 'Barangay Treasurer' ? 'selected' : '' }}>Barangay Treasurer</option>
                                        <option value="Sangguniang Barangay Member" disabled {{ $view_official->position == 'Sangguniang Barangay Member' ? 'selected' : '' }}>Sangguniang Barangay Member</option>
                                        <option value="Sangguniang Kabataan Chairperson" disabled {{ $view_official->position == 'Sangguniang Kabataan Chairperson' ? 'selected' : '' }}>Sangguniang Kabataan Chairperson</option>
                                    </select>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select mb-3 form-control" readonly>
                                        <option value="" selected disabled>Select status</option>
                                        <option value="Active" disabled {{ $view_official->status == 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="Inactive" disabled {{ $view_official->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                        <option value="Resigned" disabled {{ $view_official->status == 'Resigned' ? 'selected' : '' }}>Resigned</option>
                                        <option value="Suspended" disabled {{ $view_official->status == 'Suspended' ? 'selected' : '' }}>Suspended</option>
                                        <option value="Elected" disabled {{ $view_official->status == 'Elected' ? 'selected' : '' }}>Elected</option>
                                        <option value="Appointed" disabled {{ $view_official->status == 'Appointed' ? 'selected' : '' }}>Appointed</option>
                                    </select>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label for="term_start" class="form-label">Term Start</label>
                                    <div class="input-group">
                                        <input type="text" id="term_start" name="term_start" class="form-control flatpickr-input active" placeholder="Select date" value="{{ old('term_start', $view_official->term_start) }}" readonly disabled>
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
                                    <label for="term_end" class="form-label">Term End</label>
                                    <div class="input-group">
                                        <input type="text" id="term_end" name="term_end" class="form-control flatpickr-input active" placeholder="Select date" value="{{ old('term_end', $view_official->term_end) }}" readonly disabled>
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
                            
                            
                        <h5 class="text-muted mb-3"><a>Social Media Account</a></h5>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Facebook</label>
                                    <input type="text" name="fb_url" class="form-control" value="{{ $view_official->fb_url }}" readonly>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">X</label>
                                    <input type="text" name="twitter_url" class="form-control" value="{{ $view_official->twitter_url }}" readonly>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Instagram</label>
                                    <input type="text" name="ig_url" class="form-control" value="{{ $view_official->ig_url }}" readonly>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                            

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
                                    <select name="purok" class="form-select mb-3 form-control" readonly>
                                        <option value="" selected disabled>Select purok</option>
                                        <option value="Purok 1" disabled {{ $view_official->purok == 'Purok 1' ? 'selected' : '' }}>Purok 1</option>
                                        <option value="Purok 2" disabled {{ $view_official->purok == 'Purok 2' ? 'selected' : '' }}>Purok 2</option>
                                        <option value="Purok 3" disabled {{ $view_official->purok == 'Purok 3' ? 'selected' : '' }}>Purok 3</option>
                                        <option value="Purok 4" disabled {{ $view_official->purok == 'Purok 4' ? 'selected' : '' }}>Purok 4</option>
                                        <option value="Purok 5" disabled {{ $view_official->purok == 'Purok 5' ? 'selected' : '' }}>Purok 5</option>
                                        <option value="Purok 6" disabled {{ $view_official->purok == 'Purok 6' ? 'selected' : '' }}>Purok 6</option>
                                        <option value="Purok 7" disabled {{ $view_official->purok == 'Purok 7' ? 'selected' : '' }}>Purok 7</option>
                                        <option value="Purok 8" disabled {{ $view_official->purok == 'Purok 8' ? 'selected' : '' }}>Purok 8</option>
                                        <option value="Purok 9" disabled {{ $view_official->purok == 'Purok 9' ? 'selected' : '' }}>Purok 9</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Col -->
                        </div><!-- Row -->
                       
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
