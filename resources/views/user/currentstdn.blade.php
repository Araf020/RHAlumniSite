<!DOCTYPE html>
<html>
<head>
	<title>Current Students Registration</title>

	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,600,700,900" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('user/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('user/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('user/css/style.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('user/css/responsive.min.css')}}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body data-spy="scroll" data-target="#mainmenu">


	<div class="form_area hero_area">
		<div class="container h-100">
			<div class="row h-100 text-center align-items-center">
				<div class="col-lg-12">
					<div class="hero_txt">
						<h1>Current Students Registration </h1>
						<a href="{{ route('index') }}">Home</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="registration_form mx-auto">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 mx-auto">
					<h2>Registration has been closed</h2>
					<h4>Residential students who have not registered yet are asked to contact hall office.</h4>
				</div>
			</div>
		</div>
	</div>



<script type="text/javascript" src="{{asset('user/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('user/js/smoothscroll.js')}}"></script>
<script type="text/javascript" src="{{asset('user/js/waypoint.js')}}"></script>
<script type="text/javascript" src="{{asset('user/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('user/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('user/js/main.js')}}"></script>

</body>
</html>
