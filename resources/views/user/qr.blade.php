<!DOCTYPE html>
<html>
<head>
	<title>Online Registration</title>

	<meta charset="utf-8">

</head>
<body data-spy="scroll" data-target="#mainmenu">

{{-- 	<div class="visible-print text-center">
	    {!! QrCode::size(500)->generate('Xatta Trone'); !!}
	    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(250)->generate('SBH43858E5C')) !!} ">
	    {!! base64_encode(QrCode::format('png')->size(250)->generate('SBH43858E5C')) !!}
	</div> --}}

	{{ $data}}
	<img src="storage/qrcodes/KpOWttd3nn.png">
	<img src="{{URL::asset('/storage/qrcodes/KpOWttd3nn.png')}}">
	{{-- QrCode::generate('Make me into a QrCode!', '../public/qrcodes/qrcode.svg'); --}}

	{{-- {!! QrCode::generate('Make me into a QrCode!') !!} --}}
	{{-- <img src="/storage/qrcodes/qr.svg" height="500" width="auto"> --}}
	{{-- {{ url('/') }} --}}





</body>
</html>
