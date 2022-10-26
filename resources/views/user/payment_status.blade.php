<!DOCTYPE html>
<html>
<head>
	<title>Payment Status</title>

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
						<h1>Payment Status</h1>
						<a href="{{ route('index') }}">Home</a> ||
						<a href="{{ route('registerform') }}">Register</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="registration_form mx-auto">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 mx-auto">
					<span class="w-100" id="paymentStatusCheck" style="visibility: hidden;"></span>
			  	  	<form id="payment_status_check">
			  	  	  <div class="form-group">
			  	  	    <label for="payment_credential">Phone number or Application ID</label>
			  	  	    <input type="text"  class="form-control" id="payment_credential" placeholder="Phone number or Application ID" name="payment_credential">
			  	  	  </div>

			  	  	  <div class="form-group mt-2">
			  	  	  	<input type="submit" name="submit" value="submit" class="btn btn-primary sbh_btn">
			  	  	  </div>
			  	  	</form>

			  	  	<div id="user_datas" style="display: none;">
						<p>Name: <strong><span id="name"></span></strong></p>
						<p>Nick Name: <strong><span id="nickName"></span></strong></p>
						<p>Department: <strong><span id="dept"></span></strong></p>
						<p>Exam Session: <strong><span id="exam_session"></span></strong></p>
						<p>Graduation Year: <strong><span id="graduation_year"></span></strong></p>
						<p>Attachment: <strong><span id="attachment"></span></strong></p>
			  	  		<p>Room No: <strong><span id="room_no"></span></strong></p>
			  	  		<p>Hall Duration: <strong><span id="hall_duration"></span></strong></p>
			  	  		<p>DOB: <strong><span id="birthdate"></span></strong></p>
			  	  		<p>Gender: <strong><span id="gender"></span></strong></p>
			  	  		<p>Present Address: <strong><span id="present_address"></span></strong></p>
			  	  		<p>Anniversary Date: <strong><span id="anniversary_date"></span></strong></p>
			  	  		<p>PostCode: <strong><span id="postcode"></span></strong></p>
			  	  		<p>Mobile 1: <strong><span id="mobile_1"></span></strong></p>
			  	  		<p>Mobile 2: <strong><span id="mobile_2"></span></strong></p>
			  	  		<p>Email: <strong><span id="email"></span></strong></p>
			  	  		<p>Occupation: <strong><span id="occupation"></span></strong></p>
			  	  		<p>Position: <strong><span id="position"></span></strong></p>
			  	  		<p>Organization: <strong><span id="organization"></span></strong></p>
			  	  		<p>Spouse Name: <strong><span id="spouse_name"></span></strong></p>
			  	  		<p>Spouse Profession: <strong><span id="spouse_profession"></span></strong></p>
			  	  		<hr>

			  	  		<p>Lunch: <strong><span id="d1la"></span></strong></p>
			  	  		<p>Dinner: <strong><span id="d1da"></span></strong></p>
			  	  		{{-- <p>15th Feb Lunch: <strong><span id="d2la"></span></strong></p>
			  	  		<p>15th Feb Dinner: <strong><span id="d2da"></span></strong></p> --}}
			  	  		<p>Driver's Dinner: <strong><span id="driver"></span></strong></p>
			  	  		<p>Total amount: <strong><span id="total_amount"></span></strong></p>
			  	  		<p>payment Method: <strong><span id="payment_method"></span></strong></p>
			  	  		<p>T Shirt Size: <strong><span id="t_shirt"></span></strong></p>
			  	  		<p><img src="" id="image" height="100" width="auto"></p>



			  	  		<div id="bank_statement" style="display: none;">
			  	  		  <h3>Bank Statement</h3>
			  	  		  <p>Bank Name: <strong><span id="bankname"></span></strong></p>
			  	  		  <p>Bank Branch: <strong><span id="bankBranch"></span></strong></p>
			  	  		  <p>Payment Date: <strong><span id="paymentdate"></span></strong></p>
			  	  		  <p>Scroll No: <strong><span id="scrollNo"></span></strong></p>
			  	  		  <hr>
			  	  		</div>
			  	  	</div>

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
<script type="text/javascript">
$(document).ready(function(){



	$('#payment_status_check').submit(function(e) {
		/* Act on the event */
		e.preventDefault();
		//console.log('ok');

		var email_tran_id = $('#payment_credential').val();
		var _token = $('meta[name="csrf-token"]').attr('content');

		console.log(email_tran_id,_token);
		$.ajax({
	        url: '{{ route('getStatusDataById') }}',
	        type:'POST',
	        data: {email_tran_id:email_tran_id,_token:_token},
	        dataType:'json',
	        success: function(data){
	            //console.log(data);

	            if(data.message){
	            	$('#payment_status_check').trigger("reset");;
	            	$('#paymentStatusCheck')
	            	.css({
	            		visibility: 'visible',
	            	})
	            	.html(data.message)
	            	.show(500);
	            }else{
	            	var order_status = (data.order_status == 'Processing') ? 'Complete' : data.order_status;
	            	$('#payment_status_check').trigger("reset").hide();
	            	$('#paymentStatusCheck')
	            	.css({
	            		visibility: 'visible',
	            	})
	            	.html('Your Application ID is <mark class="bg-white text-black">'+data.order_id+'</mark> <br> Your Payment Status is <mark class="bg-white text-black">'+order_status+'</mark>')
	            	.show(500);

	            	if(data.has_bank_statement != null){
	            	  $('#bank_statement').show();
	            	  $('#bankname').html(data.has_bank_statement.bank_name);
	            	  $('#bankBranch').html(data.has_bank_statement.bank_branch);
	            	  $('#paymentdate').html(data.has_bank_statement.payment_date);
	            	  $('#scrollNo').html(data.has_bank_statement.scroll_no);
	            	}else{
	            	  $('#bank_statement').hide();
	            	  $('#bankname').html('');
	            	  $('#bankBranch').html('');
	            	  $('#paymentdate').html('');
	            	  $('#scrollNo').html('');
	            	}
	            	$('#name').html(data.name);
	            	$('#nickName').html(data.nick_name);
	            	$('#dept').html(data.department);
	            	$('#exam_session').html(data.exam_session);
	            	$('#graduation_year').html(data.graduation_year);
	            	$('#attachment').html(data.attachment);
	            	$('#room_no').html(data.room_no);
	            	$('#hall_duration').html(data.hall_duration);
	            	$('#birthdate').html(data.birthdate);
	            	$('#gender').html(data.gender);
	            	$('#present_address').html(data.present_address);
	            	$('#anniversary_date').html(data.anniversary_date);
	            	$('#postcode').html(data.postcode);
	            	$('#mobile_1').html(data.mobile_1);
	            	$('#mobile_2').html(data.mobile_2);
	            	$('#email').html(data.email);
	            	$('#occupation').html(data.occupation);
	            	$('#position').html(data.position);
	            	$('#organization').html(data.organization);
	            	$('#spouse_name').html(data.spouse_name);
	            	$('#spouse_profession').html(data.spouse_profession);
	            	$('#d1la').html(data.d1la);
	            	$('#d1da').html(data.d1da);
	            	// $('#d2la').html(data.d2la);
	            	// $('#d2da').html(data.d2da);
	            	$('#driver').html(data.driver);
	            	$('#total_amount').html(data.total_amount);
	            	$('#payment_method').html(data.payment_method);
	            	$('#t_shirt').html(data.t_shirt);
	            	$('#image').attr('src','/storage/images/'+data.image);
	            	$('#user_datas').show(500);

	            }

	        }
	    });


	});



});


</script>

</body>
</html>
