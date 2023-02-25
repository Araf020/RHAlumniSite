<!DOCTYPE html>
<html>
<head>
	<title>SEnd mail</title>

	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,600,700,900" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('user/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('user/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('user/css/style.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('user/css/responsive.min.css')}}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <p>Send mail</p>
    <form action="{{ route('sendmail') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Enter name">
        <input type="email" name="email" placeholder="Enter email">
        <input type="text" name="subject" placeholder="Enter subject">
        <textarea name="message" placeholder="Enter message"></textarea>
        <button type="submit">Send</button>
    </form>
    
</body>
</html>
