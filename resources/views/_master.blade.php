<!DOCTYPE html>
<html lang="en" class="fullscreen-bg">
<head>
	<title>Admin - @yield('title')</title>
	@section('meta')
		<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  	<meta name="theme-color" content="#2B0446">
	  	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
	  	<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
	@show

	@section('style')
	@show
</head>	
<body class="home-bg">

	@include('components.navbar')

	@yield('containt')

	@section('script')
	@show

</body>
</html>	