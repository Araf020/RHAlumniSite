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
					<span class="sbh_bg p-1 mb-1">For all current residential and attached students of Sher-e-Bangla Hall, registration for the program is free and mandatory.</span>
					<span class="sbh_bg p-1 mb-1">T-shirt and Food coupons are subjected to this registration.</span>
					<span class="sbh_bg p-1 mb-1">Registration deadline is February 8, 2019.</span>
					<span class="sbh_bg p-1 mb-1">If you fail to register from here, then please contact hall office for registration.</span>
					<p>*All fields are required if not mentioned otherwise.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-7 mx-auto">
					<form action="{{ route('currentstndSaveData') }}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}


					<div class="form-group">
					  <label for="name">Name</label>
					  <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" required="">
					</div>


					<div class="form-group">
					  <label for="student_id">Student Id</label>
				        <div class="input-group mb-2">
				          <div class="input-group-prepend">
				            <div class="input-group-text">S20</div>
				          </div>
				          <input type="text" class="form-control" id="student_id" placeholder="1404199" name="student_id" required=""><br>
				          
				        </div>
				        <span id="studentIdValidation"></span>
					</div>

		    		<div class="form-group">
		    		  <label for="phone">Cell Phone No.</label>
		    		  <input type="text" class="form-control" id="phone" placeholder="0152 222 222" name="phone" required="">
		    		  <span id="mobileValidation"></span>
		    		</div>

					<div class="form-group">
						<label for="email">Email address</label>
						<input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" required="">
						<span id="emailValidation"></span>
					</div>


					<div class="form-group">
					  <label for="attachment">Attachment</label>
					  <select class="form-control" id="attachment" name="allotment" required="">
					  	<option value="">Select</option>
					  	<option value="attached">Attached</option>
					  	<option value="resident">Resident</option>
					  </select>
					</div>

					<div class="form-row">
						<div class="col">
							<div class="form-group" id="Room" style="display: none;">
							  <label for="RoomNo">Room No(Current)</label>
							  <input type="text" class="form-control" id="RoomNo" placeholder="1012" name="room_no">
							</div>
						</div>
					</div>

					<div class="form-group">
			  		  	<label for="t_shirt">T Shirt Size</label>
			  		  	<select class="form-control" id="t_shirt" name="t_shirt" required="">
			  		  	  <option value="">Select Tshirt</option>
			  		  	  <option value="S">S (Length: 26", Chest: 18")</option>
			  		  	  <option value="M">M (Length: 27", Chest: 19")</option>
			  		  	  <option value="L">L (Length: 28", Chest: 20")</option>
			  		  	  <option value="XL">XL (Length: 29", Chest: 21")</option>
			  		  	  <option value="XXL">XXL (Length: 30", Chest: 22")</option>
			  		  	  <option value="XXXL">XXXL (Length: 31", Chest: 23")</option>
			  		  	</select>
			  		</div>

				   

					<div class="form-group">
			  		  	<label for="gdinner_status">Will You attend Grand dinner</label>
			  		  	<select class="form-control" id="gdinner_status" name="gdinner_status" required="">
			  		  	  <option value="">Select</option>
			  		  	  <option value="yes">Yes</option>
			  		  	  <option value="no">No</option>
			  		  	</select>
			  		</div>
			  		<span class="sbh_bg p-2 mb-2">
			  			Collect your t-shirt and food cupons from hall office on February 12, 13 2019.
			  		</span>

			  		<table class="table table-bordered">
			  		  <thead>
			  		    <tr>
			  		      <th scope="col">Date</th>
			  		      <th scope="col">Items</th>
			  		    </tr>
			  		  </thead>
			  		  <tbody>
			  		    <tr>
			  		      <td>February 14, 2019</td>
			  		      <td>Snacks(fuchka, jilabee etc)and Dinner and Cofee/Tea</td>
			  		    </tr>
			  		    <tr>
			  		      <td>February 15, 2019</td>
			  		      <td>Breakfast, Lunch, Snacks(fuchka, jilabee etc), Grand dinner, Cofee/Tea</td>
			  		    </tr>
			  		  </tbody>
			  		</table>

				   

					
					<br>
					  <div class="form-group" >
					    <input type="submit" id="from_submit" disabled="" value="Submit" class="btn sbh_btn">
					  </div>

					</form>
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
	

	 var _token=$('meta[name="csrf-token"]').attr("content");$("#attachment").on("change",function(){"resident"===$(this).val()?$("#Room").show():$("#Room").hide()});var stdn_check=!1;var phn_check=!1;var email_check=!1;$("#student_id").on("blur",function(){var student_id=$("#student_id").val();validateStudentId(student_id);BtnSubmit()});$("#email").on("blur",function(){var email=$("#email").val();validateEmail(email);BtnSubmit()});$("#phone").on("blur",function(){var phone=$("#phone").val();if(phone.length==0){return}
if(checkPhoneType(phone)){if(phone.length==11){$("#mobileValidation").html('');validatePhone(phone);BtnSubmit()}else{$("#mobileValidation").html('<span class="sbh_bg">Plase Enter a valid phone number</span>');BtnSubmit()}}else{$("#mobileValidation").html('<span class="sbh_bg">Plase Enter a valid phone number</span>');BtnSubmit()}});function validateStudentId(student_id){$.ajax({url:'{{ route('validateStudentId') }}',type:'POST',dataType:'json',data:{student_id:student_id,_token:_token},success:function(data){var msg='';(data==1)?msg+='<span class="sbh_bg p-1">Student Id already registered or not from SBH</span>':msg+='';(data==1)?stdn_check=!0:stdn_check=!1;$("#studentIdValidation").html(msg);BtnSubmit()}})}
function validateEmail(email){$.ajax({url:'{{ route('validateEmail') }}',type:'POST',dataType:'json',data:{email:email,_token:_token},success:function(data){var msg='';(data==1)?msg+='<span class="sbh_bg">Email already registered</span>':msg+='';(data==1)?email_check=!0:email_check=!1;$("#emailValidation").html(msg);BtnSubmit()}})}
function validatePhone(phone){$.ajax({url:'{{ route('validatePhone') }}',type:'POST',dataType:'json',data:{phone:phone,_token:_token},success:function(data){var msg='';(data==1)?msg+='<span class="sbh_bg">Phone number already taken</span>':msg+='';(data==1)?phn_check=!0:phn_check=!1;$("#mobileValidation").html(msg);BtnSubmit()}})}
function checkPhoneType(phone){var regex=/^\d*$/;if(!regex.test(phone)){return!1}else{return!0}}
function BtnSubmit(){if(phn_check===!0||email_check===!0||stdn_check===!0){$('#from_submit').prop('disabled',!0)}else{$("#from_submit").removeAttr('disabled')}}

	 
});



</script>

</body>
</html>
