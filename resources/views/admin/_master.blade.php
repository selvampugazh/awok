<!DOCTYPE html>
<html lang="en" class="fullscreen-bg">
<head>
	<title>Admin - @yield('title')</title>
	@section('meta')
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <!-- Tell the browser to be responsive to screen width -->
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <meta name="description" content="">
	    <meta name="author" content="">
	@show

	@section('style')
	    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/images/favicon.png') }}">
	    <!-- Bootstrap Core CSS -->
	    <link href="{{ asset('admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	    <!-- Custom CSS -->
	    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
	    <!-- You can change the theme colors from here -->
	    <link href="{{ asset('admin/css/colors/blue.css') }}" id="theme" rel="stylesheet">
	    {{-- Select 2 css --}}
	    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/select2.min.css') }}">
	    {{-- Datatables css --}}
	    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}">

	    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/custom.css') }}">
 
		<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/dropify.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('admin/fonts/dropify.ttf') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('admin/fonts/dropify.woff') }}">

		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css">
	@show
</head>	

<body class="fix-header card-no-border">
	<div id="main-wrapper">
		@include('admin.header')
		@include('admin.side-navbar')
	</div>
    <div class="page-wrapper">
	    <!-- Container fluid  -->
	    <div class="container-fluid">
			@yield('content')
	    </div>
	    <footer class="footer text-center">
            © 2020 Admin
        </footer>
    </div>		

	@section('script')
		<!-- All Jquery -->
	    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
	    <!-- Bootstrap tether Core JavaScript -->
	    <script src="{{ asset('admin/plugins/bootstrap/js/tether.min.js') }}"></script>
	    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	    <!-- Style switcher -->
	    <script src="{{ asset('admin/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>

	    <!-- slimscrollbar scrollbar JavaScript -->
	    <script src="{{ asset('admin/js/jquery.slimscroll.js') }}"></script>
	    <!--Wave Effects -->
	    <script src="{{ asset('admin/js/waves.js') }}"></script>
	    <!--Menu sidebar -->
	    <script src="{{ asset('admin/js/sidebarmenu.js') }}"></script>
	    <!--stickey kit -->
	    <script src="{{ asset('admin/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
	    <!--Custom JavaScript -->
	    <script src="{{ asset('admin/js/custom.min.js') }}"></script>
		{{-- select 2 js --}}
	    <script src="{{ asset('admin/js/select2.min.js') }}"></script>

		<script src="{{ asset('admin/js/dropify.min.js') }}"></script>

	    <script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>
		 <!-- Include this after the sweet alert js file -->
		@include('sweet::alert')

		<script src="{{ asset('DataTables/datatables.min.js') }}"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

		{!! Toastr::message() !!}

	@show

</body>
</html>	
