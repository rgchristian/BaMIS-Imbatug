@extends('admin.admin_dashboard')
@section('admin')

<!-- jQuery Google CDN via W3schools.com -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">

<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add</li>
						<li class="breadcrumb-item active" aria-current="page">Barangay Official</li>
					</ol>
				</nav>

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('barangay.officials') }}" class="btn btn-inverse-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Back">Back</a>
        </ol>
    </nav>
    <form id="myForm" method="POST" action="{{ route('store.official') }}" class="forms-sample" enctype="multipart/form-data">
                        @csrf

    <div class="row">

    <div class="col-md-4">
                <div class="card stretch-card">
                    <div class="card-body">

                        <div class="d-flex align-items-baseline position-absolute top-0 end-0 m-1">
                            <div class="toggle-camer mb-2">
                                <a type="button" id="accesscamera" data-toggle="modal" data-target="#photoModal" class="btn btn-link" data-bs-toggle="tooltip" data-bs-placement="top" title="Open camera">
                                <i class="link-icon" data-feather="video"></i>
                                </a>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-center">
    <div class="official-image add-photo-container" style="width: 300px; height: 300px; overflow: hidden; border-radius: 50%;">
        <div class="d-flex justify-content-center" style="width: 100%; height: 100%; border-radius: 50%; overflow: hidden;">
            <video id="webCam" autoplay playsinline style="object-fit: cover; width: 100%; height: 100%; border-radius: 50%; display: none;"></video>
            <img class="rounded-circle changed-image" id="photoImage" name="photo" src="{{ (!empty($photo)) ? url('upload/official_images/'.$photo) : url('upload/no_image.png') }}" alt="photo" style="object-fit: cover; width: 100%; height: 100%; border-radius: 50%;" onclick="openFileBrowser()">
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
                    <h6 class="card-title">Add Barangay Official</h6>
                    
                        <h5 class="text-muted mb-3"><a>Barangay Official Information</a></h5>
                        <div class="row">
    <div class="col-sm-12">
        <div class="form-group mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter full name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div><!-- Col -->
</div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Position</label>
                                    <select name="position" class="form-select mb-3 form-control">
                                        <option value="" selected disabled>Select position</option>
                                        <option value="Barangay Captain">Barangay Captain</option>
                                        <option value="Barangay Kagawad">Barangay Kagawad</option>
                                        <option value="Barangay Secretary">Barangay Secretary</option>
                                        <option value="Barangay Treasurer">Barangay Treasurer</option>
                                        <option value="Sangguniang Barangay Member">Sangguniang Barangay Member</option>
                                        <option value="Sangguniang Kabataan Chairperson">Sangguniang Kabataan Chairperson</option>
                                    </select>
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select mb-3 form-control">
                                        <option value="" selected disabled>Select status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                        <option value="Resigned">Resigned</option>
                                        <option value="Suspended">Suspended</option>
                                        <option value="Elected">Elected</option>
                                        <option value="Appointed">Appointed</option>
                                    </select>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3 form-group">
                                    <label for="term_start" class="form-label">Term Start</label>
                                    <div class="input-group">
                                        <input type="text" id="term_start" name="term_start" class="form-control flatpickr-input active" placeholder="Select date" readonly="readonly">
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
                                        <input type="text" id="term_end" name="term_end" class="form-control flatpickr-input active" placeholder="Select date" readonly="readonly">
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
                        </div><!-- Row -->
                        </div>
                        <button type="submit" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Save">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#myForm').validate({
            rules: {
                photo: {
                    required: true,
                },
                name: {
                    required: true,
                },
                position: {
                    required: true,
                },
                status: {
                    required: true,
                },
                term_start: {
                    required: true,
                },
                term_end: {
                    required: true,
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
                }
            },
            messages: {
                name: {
                    required: 'Please select a photo.',
                },
                name: {
                    required: 'Please enter name.',
                },
                position: {
                    required: 'Please select position.',
                },
                status: {
                    required: 'Please select status.',
                },
                term_start: {
                    required: 'Please enter starting term.',
                },
                term_end: {
                    required: 'Please enter ending term.',
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
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>


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
