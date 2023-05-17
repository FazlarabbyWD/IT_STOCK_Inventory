<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
    @include('includes.css')


	<title>Rukada - Responsive Bootstrap 5 Admin Template</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
        @include('includes.sidebar')
		<!--end sidebar wrapper -->
		<!--start header -->
		@include('includes.header')
		<!--end header -->
		<!--start page wrapper -->
		@include('includes.body')
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		@include('includes.footer')
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	@include('includes.switcher')
	<!--end switcher-->
	<!-- Bootstrap JS -->
	@include('includes.js')
</body>

</html>
