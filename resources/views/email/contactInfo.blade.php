
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Details</title>
	<style type="text/css">
		*{margin:0;padding:0}.text-center{text-align:center!important}a{text-decoration:none!important}.header a:hover,.pl_btn:hover{text-decoration:none}.main-bg,body,html{color:#666;background-color:#f4f4f4;font-family:sans-serif}p{margin-bottom:3px}.col-md-6{width:50%;margin:0 auto}.bg-pl{background-color:#61D2B4}.bg_w{background-color:#fff}.header a{color:#fff;display:block;padding:70px 0}.header h3{font-size:30px;margin:0}.header span{font-weight:100}.welcome_message h2{margin:0;background:#fff;color:#111;padding:30px 0;letter-spacing:2px;font-size:35px;font-weight:400;border-radius:5px 5px 0 0}.credential,.main_message{background:#fff;padding:5px 20px}.main_message p{margin-bottom:3px}.credential p{line-height:1.5;margin:0}.credential p span,.credential p span a{font-weight:600;color:#444 !important}.pl_btn{color:#fff !important;background:#61D2B4;font-weight:600;text-transform:uppercase;font-size:16px;padding:10px 35px;margin:20px auto;display:inline-block;border-radius:2px}.pl_btn:hover{color:#fff}.extra_message{background:#f9f9f9;margin:35px 0;padding:17px 0;}.extra_message a{color:#61D2B4}.main_message.last{border-radius:0 0 5px 5px;padding-bottom:20px}.main_message.last span,.main_message.last a{color:#111 !important;}@media screen and (max-width:576px){.col-12{width:90%;margin:0 auto}}@media screen and (min-width:577px) and (max-width:767px){.col-sm-10{width:80%;margin:0 auto}}@media screen and (min-width:768px){.col-md-6{width:50%;margin:0 auto}}
	</style>
</head>
<body>
<div class="main-bg">
	<p><strong>From:</strong> {{ $data['name'] }}</p>
	<p><strong>Reply to:</strong> {{ $data['email'] }}</p>
	<p><strong>Subject:</strong> {{ $data['subject'] }}</p>
	<p><strong>Message:</strong> {{ $data['message'] }}</p>
</div>
</body>
</html>