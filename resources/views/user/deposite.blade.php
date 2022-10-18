<!DOCTYPE html>
<html>
<head>
	<title>Deposit</title>

	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,600,700,900" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('user/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('user/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('user/css/style.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('user/css/responsive.min.css')}}">
</head>
<body data-spy="scroll" data-target="#mainmenu">


	<div class="form_area hero_area">
		<div class="container h-100">
			<div class="row h-100 text-center align-items-center">
				<div class="col-lg-12">
					<div class="hero_txt">
						<h1>Bank Deposit</h1>
						<a href="{{ route('index') }}">Home</a> ||
						<a href="{{ route('payment_status') }}">Check Payment Status</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="registration_form mx-auto">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 mx-auto">
					<h1>Payment Information</h1>    
					<p>Please Pay total  <strong>{{ $data->total_amount }} Taka</strong> To<br> <strong>Sonali Bank BUET Branch</strong><br> Account No: <strong>4404034068519</strong> <br> Your Application ID is <strong>{{ $data->order_id }}</strong>.<br>
					After Paying please update your bank statement by submitting bank payment info in the home page. <br>You will receive an email after successfull verification of your payment.</p>
					<p>
						For any query please contact <strong>+880 1641 002 002</strong>
					</p>
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


	    $('body').scroll(function() {
	        //console.log($('body').pageYOffset);
	        if ($(this).scrollTop() >= 150) {        // If page is scrolled more than 50px
	            //$('#return-to-top').fadeIn(200);   // Fade in the arrow
	            $(".nav_area").addClass("nav_fixed");
	        } else {
	            //$('#return-to-top').fadeOut(200);   // Else fade out the arrow
	            $(".nav_area").removeClass("nav_fixed");
	        }
	    });
	    // $('#return-to-top').click(function() {      // When arrow is clicked
	    //     $('body,html').animate({
	    //         scrollTop : 0                       // Scroll to top of body
	    //     }, 500);
	    // });

	    $('#attachment').on('change',function(){
	    	if ($(this).val() === 'resident') {
	    		$('#Room,#Hall_Duration').show();
	    	}else{
	    		$('#Room,#Hall_Duration').hide();
	    	}
	    });

	    function totalPayable(){
	    	var day_1_dinner = $('#d1da').val();
	    	var day_2_lunch = $('#d2la').val();
	    	var day_2_dinner = $('#d2da').val();
	    	var day_2_driver_dinner = $('#d2dda').val();

	    	var basePrice = 1000;
	    	var day_1_din_unit = 300;
	    	var day_2_lun_unit = 300;
	    	var day_2_din_unit = 700;
	    	var day_2_driver_dinner_unit = 300;

	    	var total_price = basePrice + (day_1_dinner*day_1_din_unit) + (day_2_lunch*day_2_lun_unit) + (day_2_dinner*day_2_din_unit) + (day_2_driver_dinner*day_2_driver_dinner_unit);
	    	var payment_method = $("input[name='payment_method']:checked").val();

	    	// if(payment_method == 'online'){
	    	// 	total_price = total_price*1.025;
	    	// }


	    	$('#totalamount').text(total_price);
	    	$('#totalamountonline').text(roundNumber(total_price*1.025,2));
	    	$('#totalamountToPay').val(total_price);


	    	//console.log(day_1_dinner,day_2_lunch,day_2_dinner,total_price);
	    }

	    totalPayable();

	    $('#d1da, #d2la, #d2da, #d2dda').on('change',function(){
	    	totalPayable();
	    });

	    $('input[name=payment_method]').change(function(){
		    var paymentMethod = $('input[name=payment_method]:checked').val();
		    //console.log(paymentMethod);

		    switch (paymentMethod) {
		    	case 'online':
		    		$('#bankPayment').hide();
		    		$('#cashPayment').hide();
		    		$('#onlinePayment').show();
		    		break;
		    	case 'bank':
		    		$('#cashPayment').hide();
		    		$('#onlinePayment').hide();
		    		$('#bankPayment').show();
		    		break;
		    	case 'cash':
		    		$('#bankPayment').hide();
		    		$('#onlinePayment').hide();
		    		$('#cashPayment').show();
		    		break;
		    	default:
		    		// statements_def
		    		break;
		    }
	    });

	    function roundNumber(num, scale) {
	      if(!("" + num).includes("e")) {
	        return +(Math.round(num + "e+" + scale)  + "e-" + scale);
	      } else {
	        var arr = ("" + num).split("e");
	        var sig = ""
	        if(+arr[1] + scale > 0) {
	          sig = "+";
	        }
	        return +(Math.round(+arr[0] + "e" + sig + (+arr[1] + scale)) + "e-" + scale);
	      }
	    }

	    $('#image').bind('change', function() {
            //alert('This file size is: ' + this.files[0].size/1024/1024 + "MB");
            var fileSize = roundNumber(this.files[0].size/1024/1024,2);
            if(fileSize > 2){
	            $('#imagesize').html('File size Exceeds 2 MB<br> Please choose a file under 2MB');
	        }
        });

	    //image show 



});


</script>

</body>
</html>
