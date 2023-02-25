<!DOCTYPE html>
<html>
<head>
	<title>Executive Committee </title>

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
						<h1>Your registration is successful!</h1>
						<a href="{{ route('index') }}">Home</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="registration_form mx-auto">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 mx-auto">
					<p>
						The Payment System is yet to be integrated. You can Pay manually.
					</p>
					<!-- <p class="text-danger">
						Our aim is to ensure accessibility to the website at all times, however, we reserve the right to terminate the website at any time and without notice. You accept that service interruption may occur in order to allow for website improvements, scheduled maintenance, introduction of new facilities or services or may also be due to outside factors beyond our control.
					</p>
					<p>
						<h3>Security Of Data</h3>

						The security of your data is important to us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Data, we cannot guarantee its absolute security.
					</p>
					<p>
						<h3>Changes To This Privacy Policy</h3>

						We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.

						We will let you know via email and/or a prominent notice on our Service, prior to the change becoming effective and update the “effective date” at the top of this Privacy Policy.

						You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.
					</p> -->
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
