<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<head>
    <meta charset="utf-8">
    <title>Barangay Imbatug | Officials</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('backend/assets/images/imbatug logo.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>Imbatug, Baungon, Bukidnon</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Mon - Fri : 09:00 AM - 09:00 PM</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>+012 345 6789</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href="https://www.facebook.com/Imbatug16"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
        <a href="{{ route('barangay.home') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h3 class="m-0 text-primary"><img src="{{ asset('upload/imbatug logo.png') }}" alt="Logo" style="width: 50px; height: auto; margin-right: 10px;">Barangay Imbatug</h3>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('barangay.home') }}" class="nav-item nav-link">Home</a>
                <a href="{{ route('barangay.about') }}" class="nav-item nav-link">About</a>
                <a href="{{ route('barangay.service') }}" class="nav-item nav-link">Service</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                        <a href="{{ route('barangay.features') }}" class="dropdown-item">Features</a>
                        <a href="{{ route('officials') }}" class="dropdown-item active">Officials</a>
                        <a href="{{ route('barangay.appointment') }}" class="dropdown-item">Appointment</a>
                        <a href="{{ route('announcements') }}" class="dropdown-item">Announcements</a>
                        <a href="#" class="dropdown-item">Ordinance</a>
                    </div>
                </div>
                <a href="{{ route('barangay.contact') }}" class="nav-item nav-link">Contact</a>
            </div>
            <a href="{{ route('admin.login') }}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Login<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Barangay Officials</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Officials</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Officials</p>
            <h1>Barangay Officials</h1>
        </div>
        <div class="row g-4">
            
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('upload/A.jpg') }}" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Official A</h5>
                            <p class="text-primary">Barangay Captain</p>
                            <div class="team-social text-center">
                                <a class="btn btn-square" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('upload/B.jpg') }}" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Official B</h5>
                            <p class="text-primary">Barangay Kagawad</p>
                            <div class="team-social text-center">
                                <a class="btn btn-square" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('upload/C.jpg') }}" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Official C</h5>
                            <p class="text-primary">Barangay Secretary</p>
                            <div class="team-social text-center">
                                <a class="btn btn-square" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('upload/D.jpg') }}" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Official D</h5>
                            <p class="text-primary">Barangay Treasurer</p>
                            <div class="team-social text-center">
                                <a class="btn btn-square" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('upload/E.jpg') }}" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Official E</h5>
                            <p class="text-primary">Sangguniang Kabataan Chairperson</p>
                            <div class="team-social text-center">
                                <a class="btn btn-square" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('upload/F.jpg') }}" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Official F</h5>
                            <p class="text-primary">Sangguniang Kabataan Member</p>
                            <div class="team-social text-center">
                                <a class="btn btn-square" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('upload/G.jpg') }}" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Official G</h5>
                            <p class="text-primary">Sangguniang Kabataan Member</p>
                            <div class="team-social text-center">
                                <a class="btn btn-square" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('upload/H.jpg') }}" alt="">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>Official H</h5>
                            <p class="text-primary">Sangguniang Kabataan Member</p>
                            <div class="team-social text-center">
                                <a class="btn btn-square" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
</div>
<!-- Team End -->
        

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Address</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Imbatug, Baungon, Bukidnon</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href="https://www.facebook.com/Imbatug16"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Services</h5>
                    <a class="btn btn-link" href="">Service 1</a>
                    <a class="btn btn-link" href="">Service 2</a>
                    <a class="btn btn-link" href="">Service 3</a>
                    <a class="btn btn-link" href="">Service 4</a>
                    <a class="btn btn-link" href="">Service 5</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="{{ route( 'barangay.about' ) }}">About Us</a>
                    <a class="btn btn-link" href="{{ route( 'barangay.contact' ) }}">Contact Us</a>
                    <a class="btn btn-link" href="{{ route( 'barangay.service' ) }}">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Feedback</h5>
                    <p>Your feedback matters. Help us improve with your insights.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your feedback">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Send</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">BarangayImbatug.org</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="#">USTP - R2 Students</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/"></script>
    <script src="{{ asset('frontend/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>