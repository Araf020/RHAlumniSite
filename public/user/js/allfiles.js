// Home page 


		    					//year/month/day
		$('#clock').countdown('2019/02/14 12:00:00').on('update.countdown', function(event) {
	  		var $this = $(this).html(event.strftime(''
					+ '<div class="wrapper"><span class="time">%-D</span><br>day%!D</div><span class="slash">/</span>'
					+ '<div class="wrapper"><span class="time">%H</span><br>hours</div><span class="slash">/</span>'
					+ '<div class="wrapper"><span class="time">%M</span><br>minutes</div><span class="slash">/</span>'
					+ '<div class="wrapper"><span class="time">%S</span><br>seconds</div>'));	
		});

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

	    $('#search').on('click', function(e) {
    		e.preventDefault();
    		//console.log('cliked');
    		$('.overlay_search').removeClass('hidden').addClass('visible');
    	});

    	$('.close_btn, window').on('click', function() {
    		$('.overlay_search').removeClass('visible').addClass('hidden');
    	});

    	$('#bank_submit').submit(function(e) {
    		/* Act on the event */
    		e.preventDefault();
    		//console.log('ok');

    		var email_tran_id = $('#order_id').val();
    		var bank_name = 'Sonali Bank';
    		var bank_branch = $('#bank_branch').val();
    		var payment_date = $('#payment_date').val();
    		var scroll_no = $('#scroll_no').val();
    		var _token = $('meta[name="csrf-token"]').attr('content');

    		console.log(email_tran_id,bank_branch,payment_date,scroll_no,_token);

			$.ajax({
		        url: '{{ route('updateFormStatus') }}',
		        type:'POST',
		        data: {email_tran_id:email_tran_id,bank_name:bank_name,payment_date:payment_date,bank_branch:bank_branch,scroll_no:scroll_no,_token:_token},
		        dataType:'json',
		        success: function(data){
		            //console.log(data);
		            $('#bank_submit').trigger("reset");
		            if(data.message){
		            	$('#submissionStatus')
		            	.css({
		            		visibility: 'visible',
		            	})
		            	.html(data.message);
		            }else{
		            	$('#submissionStatus').hide();
		            }
		          
		        }
		    });
    	});

    	checkContact();
    	function checkContact(){
    		$("#name").on('keyup',function(){
    			if($(this).val() == ""){
    				$("#nameError").text('Name can not be empty');
    				$("input[type='submit']").attr('disabled', 'disabled');
    			}else{
    				$("#nameError").text('ok');
    				$("input[type='submit']").removeAttr('disabled');
    			}
    		});
    		$("#email").on('keyup',function(){
    			//console.log($(this).val());
    			var email = $(this).val();
    			var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    			if(!filter.test(email)){
    				$('#emailError').text('Invalid Email');
    				$("input[type='submit']").attr('disabled', 'disabled');
    			}else if($(this).val() == ""){
    				//console.log($(this).val());
    				$('#emailError').text('Email can not be empty');
    				$("input[type='submit']").attr('disabled', 'disabled');
    			}else{
    				$('#emailError').text('ok');
    				$("input[type='submit']").removeAttr('disabled');
    			}
    		});
    	}

    	$('#submit').on('click', function(e) {
    	  e.preventDefault();
    	  var name = $("#name").val();
    	  var email = $("#email").val();
    	  var subject = $("#subject").val();
    	  var message = $("#message").val();
    	  var _token = $('meta[name="csrf-token"]').attr('content');
    	  // console.log(name);

    	  $.ajax({
    	    url: '{{ route('saveContactSubmission') }}',
    	    type: 'POST',
    	    data: {_token:_token,name:name,email:email,subject:subject,message:message},
    	    dataType:'json',
    	    beforeSend: function(){
    	    	$("#submit").val('Sending');
    	    },
    	    success: function(data){
    	      console.log(data);
    	      if(data != 0){
    	      	$( '#contactForm' ).each(function(){
    	      	    this.reset();
    	      	    $('#nameError').hide();
    	      	    $('#emailError').hide();
    	      	});
    	      	$("#contactForm").hide(500);
    	      	$("#messageStatus").text('Message sent successfully').show(500);


    	      }
    	      
    	    }
    	  });
    	  
    	});


// Register Page


	    
	    $('#attachment').on('change',function(){
	    	if ($(this).val() === 'resident') {
	    		$('#Room,#Hall_Duration').show();
	    	}else{
	    		$('#Room,#Hall_Duration').hide();
	    	}
	    });

	    function totalPayable(){
	    	var day_1_lunch = $('#d1la').val();
	    	var day_1_dinner = $('#d1da').val();
	    	var day_2_lunch = $('#d2la').val();
	    	var day_2_dinner = $('#d2da').val();
	    	var day_2_driver_dinner = $('#d2dda').val();

	    	var basePrice = 1000;
	    	var day_1_lun_unit = 100;
	    	var day_1_din_unit = 300;
	    	var day_2_lun_unit = 300;
	    	var day_2_din_unit = 700;
	    	var day_2_driver_dinner_unit = 300;

	    	var total_price = basePrice + (day_1_lunch*day_1_lun_unit) + (day_1_dinner*day_1_din_unit) + (day_2_lunch*day_2_lun_unit) + (day_2_dinner*day_2_din_unit) + (day_2_driver_dinner*day_2_driver_dinner_unit);
	    	var payment_method = $("input[name='payment_method']:checked").val();

	    	// if(payment_method == 'online'){
	    	// 	total_price = total_price*1.025;
	    	// }


	    	$('#totalamount').text(total_price);
	    	//$('#totalamountonline').text(roundNumber(total_price*1.025,2));
	    	$('#totalamountToPay').val(total_price);


	    	//console.log(day_1_dinner,day_2_lunch,day_2_dinner,total_price);
	    }

	    totalPayable();

	    $('#d1la,#d1da, #d2la, #d2da, #d2dda').on('change',function(){
	    	totalPayable();
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
	            $('#imagesize').html('<span class="sbh_bg">File size Exceeds 2 MB<br> Please choose a file under 2MB</span>');
	        }else{
	        	$('#imagesize').html('<span class="sbh_bg">Image is ok to be uploaded</span>');
	        }
        });

        $('#contact').on('blur',function(){
        	var mobile_number = $(this).val();
        	var _token = $('meta[name="csrf-token"]').attr('content');
        	console.log(mobile_number,_token);
        		$.ajax({
        	        url: '{{ route('checkPhoneNo') }}',
        	        type:'POST',
        	        data: {mobile_number:mobile_number,_token:_token},
        	        dataType:'json',
        	        success: function(data){
        	            console.log(data);

        	            if(data.message == 'ok'){
        	            	$('#from_submit').removeAttr('disabled');
        	            	$('#mobileValidation').hide();
        	            }else{
        	            	$('#from_submit').attr('disabled', 'disabled');
        	            	$('#mobileValidation').html('<span class="sbh_bg">'+data.message+'</span>').show();
        	            }

        	          
        	        }
        	    });
        });