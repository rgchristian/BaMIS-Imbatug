<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>Barangay Imbatug</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

  <!-- core:css -->
	<link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">
	<!-- endinject -->

	<!-- Plugin css for calendar page -->
	<link rel="stylesheet" href="{{ asset('backend/assets/vendors/fullcalendar/main.min.css') }}">
	<!-- End plugin css for calendar page -->

  <!-- Flatpickr -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
	<!-- End plugin css for this page -->

	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.css') }}">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{ asset('backend/assets/css/demo2/style.css') }}">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" />

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
</head>

<style>
  .status-badge {
    padding: 5px 10px;
    border-radius: 4px;
    font-size: 12px;
    font-weight: 500;
    text-transform: uppercase;
  }

  /* #5864dc, #198754, #DC3545, #aeb9cc, #FFC107, #198754 */
  .status-badge.badge-success {
    background-color: #4CAF50; 
	  color: white;
  }

  .status-badge.badge-danger {
    background-color: #F32013; 
	  color: white;
  }

  .status-badge.badge-info {
    background-color: #FAD02E; 
	  color: white;
  }

  .status-badge.badge-warning {
    background-color: #6056F5; 
	  color: white;
  }

  .status-badge.badge-primary {
    background-color: #F762C6; 
	  color: white;
  }

  .status-badge.badge-secondary {
    background-color: #FFA900; 
	  color: white;
  }

  .dark-title {
    color: #333; /* Replace this with your desired dark color code */
  }

  .status-new {
    background-color: #FF5733;
    color: #ffffff;
  }

  .status-pending {
    background-color: #FFC300;
    color: #ffffff;
  }

  .status-ongoing {
    background-color: #3498DB;
    color: #ffffff;
  }

  .status-finished {
    background-color: #4CAF50;
    color: #ffffff;
  }

</style>



<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
        @include('admin.body.sidebar')
	
		<div class="page-wrapper">
					
			<!-- partial:partials/_navbar.html -->
			@include('admin.body.header')
			<!-- partial -->

			@yield('admin')

			<!-- partial:partials/_footer.html -->
			@include('admin.body.footer')
			<!-- partial -->
		
		</div>
	</div>

	<!-- core:js -->
	<script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
	<!-- endinject -->

  <!-- Plugin js for calendar page -->
	<script src="{{ asset('backend/assets/vendors/moment/moment.min.js') }}"></script>
	<script src="{{ asset('backend/assets/vendors/fullcalendar/main.min.js') }}"></script>
	<!-- End plugin js for calendar page -->

  <!-- Custom js for calendar page -->
	<script src="{{ asset('backend/assets/js/fullcalendar.js') }}"></script>
	<!-- End custom js for calendar page -->

	<!-- Plugin js for calendar page -->
  <script src="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
	<!-- End plugin js for calendar page -->

	<!-- inject:js -->
	<script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/template.js') }}"></script>
	<!-- endinject -->

	<!-- Custom js for dashboard page -->
  <script src="{{ asset('backend/assets/js/dashboard-dark.js') }}"></script>
	<!-- End custom js for dashboard page -->

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="{{ asset('backend/assets/js/code/code.js') }}"></script>
  <script src="{{ asset('backend/assets/js/code/validate.min.js') }}"></script>

	<!-- Plugin js for data tables page -->
	<script src="{{ asset('backend/assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  	<script src="{{ asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
	<!-- End plugin js for data tables page -->

	<!-- Custom js for data tables page -->
	<script src="{{ asset('backend/assets/js/data-table.js')}}"></script>
	<!-- End custom js for data tables page -->

	<!-- Flatpickr -->
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

	<script>
    // Initialize flatpickr
    flatpickr("#term_start", {
        dateFormat: "Y-m-d",
        
    });

    flatpickr("#term_end", {
        dateFormat: "Y-m-d",
        
    });
	
    flatpickr("#birthdate", {
        dateFormat: "Y-m-d",
        
    });

    flatpickr("#resident_added", {
        dateFormat: "Y-m-d",
        
    });

    flatpickr("#attendance_date", {
        dateFormat: "Y-m-d H:i",
        enableTime: true,
        
    });

    flatpickr("#incident_date", {
        dateFormat: "Y-m-d H:i",
        enableTime: true,
        
    });

    flatpickr("#incident_date_recorded", {
        dateFormat: "Y-m-d H:i",
        enableTime: true,
        
    });

    flatpickr("#barangay_certificate", {
        dateFormat: "Y-m-d H:i",
        enableTime: true,
        
    });

    flatpickr("#barangay_clearance", {
        dateFormat: "Y-m-d H:i",
        enableTime: true,
        
    });

    flatpickr("#settlement_schedule", {
        dateFormat: "Y-m-d H:i",
        enableTime: true,
        
    });

    flatpickr("#announcement_date_time", {
        dateFormat: "Y-m-d H:i",
        enableTime: true,
        
    });

    flatpickr("#announcement_date_time_created", {
        dateFormat: "Y-m-d H:i",
        enableTime: true,
        
    });

    

	</script>

  

</body>
</html>    