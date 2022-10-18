@extends('admin.app')
@section('extra_css')

@endsection


@section('main_content')

<section class="content-header">
  <h1>
    Update
    <small id="js_status">Refresh the page</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">


  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Update</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('reg.update',$data->id) }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{method_field('PATCH')}}
          <div class="box-body">

            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" value="{{ $data->name }}" required="">
            </div>


            <div class="form-group">
              <label for="nick_name">Nick Name</label>
              <input type="text" class="form-control" name="nick_name" id="nick_name" value="{{ $data->nick_name }}" placeholder="Enter Nick Name" required="">
            </div>

            <div class="form-group">
              <label for="department">Department</label>
              <select class="form-control" id="department" name="department" required="">
              <option value="">Select Department</option>
              <option {{($data->department == 'EEE' ? 'selected' : '')}} value="EEE">EEE</option>
              <option {{($data->department == 'CSE' ? 'selected' : '')}} value="CSE">CSE</option>
              <option {{($data->department == 'ME' ? 'selected' : '')}} value="ME">ME</option>
              <option {{($data->department == 'CE' ? 'selected' : '')}} value="CE">CE</option>
              <option {{($data->department == 'WRE' ? 'selected' : '')}} value="WRE">WRE</option>
              <option {{($data->department == 'IPE' ? 'selected' : '')}} value="IPE">IPE</option>
              <option {{($data->department == 'NAME' ? 'selected' : '')}} value="NAME">NAME</option>
              <option {{($data->department == 'CHE' ? 'selected' : '')}} value="CHE">CHE</option>
              <option {{($data->department == 'ARCH' ? 'selected' : '')}} value="ARCH">ARCH</option>
              <option {{($data->department == 'MME' ? 'selected' : '')}} value="MME">MME</option>
              <option {{($data->department == 'URP' ? 'selected' : '')}} value="URP">URP</option>
              </select>
            </div>

            <div class="form-group">
              <label for="exam_session">Exam Session(optional)</label>
              <input type="text" name="exam_session" value="{{ $data->exam_session }}" class="form-control" id="exam_session" placeholder="Enter exam session">
            </div>

            <div class="form-group">
              <label for="graduation_year">Graduation Year</label>
              <input type="text" name="graduation_year" value="{{ $data->graduation_year }}" class="form-control" id="graduation_year" placeholder="Enter exam session">
            </div>

            <div class="form-group">
              <label for="attachment">Attachment</label>
              <select class="form-control" id="attachment" name="attachment" required="">
                <option value="">Select</option>
                <option {{($data->attachment == 'attached' ? 'selected' : '')}} value="attached">Attached</option>
                <option {{($data->attachment == 'resident' ? 'selected' : '')}} value="resident">Resident</option>
              </select>
            </div>

            <div class="row">
              <div class="col-xs-6" id="Room" >
                  <label for="RoomNo">Room No(Required if Resident)</label>
                  <input type="text" value="{{ $data->room_no }}" class="form-control" id="RoomNo" placeholder="1012" name="room_no">
              </div>
              <div class="col-xs-6" id="Hall_Duration" >
                <label for="hall_duration">Hall Life Duration(optional)</label>
                <input type="text" value="{{ $data->hall_duration }}" class="form-control" id="hall_duration" placeholder="1 year" name="hall_duration">
              </div>
            </div>


            <div class="row">
              <div class="col-xs-6">
                    <label for="DOB">Birth Date(optional)</label>
                    <input type="text" value="{{ $data->birthdate }}" class="form-control" placeholder="mm/dd/yy" id="DOB" name="birthdate">
              </div>
              <div class="col-xs-6">
                  <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender" required="">
                  <option value="">Select</option>
                  <option {{($data->gender == 'male' ? 'selected' : '')}} value="male">Male</option>
                  <option {{($data->gender == 'female' ? 'selected' : '')}} value="female">Female</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="contact_address">Current Address</label>
              <input type="text" value="{{ $data->present_address }}" class="form-control" id="contact_address" name="present_address" required="" placeholder="your current address">
            </div>


            <div class="row">
              <div class="col-xs-6">
                    <label for="hobby">Hobby(optional)</label>
                    <input type="text" value="{{ $data->hobby }}" class="form-control" placeholder="Your hobby" id="hobby" name="hobby">
              </div>
              <div class="col-xs-6">
                <label for="gender">PostCode</label>
                <input type="text" class="form-control" value="{{ $data->postcode }}" id="postcode" name="postcode" required="" placeholder="1214">
              </div>
            </div>

            <div class="row">
              <div class="col-xs-6">
                    <label for="contact">Cell Phone No.</label>
                    <input type="text" value="{{ $data->mobile_1 }}" id="contact" class="form-control" id="contact" placeholder="+880 XXXX XXX XXX" name="mobile_1" required="">
                    <span id="mobileValidation"></span>
              </div>
              <div class="col-xs-6">
                <label for="contact2">Alternative Phone(optional)</label>
                <input type="text" value="{{ $data->mobile_2 }}" class="form-control" id="contact2" placeholder="+880 XXXX XXX XXX" name="mobile_2">
              </div>
            </div>


            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" value="{{ $data->email }}" class="form-control" id="email" placeholder="Email address" required="" name="email">
            </div>


            <div class="row">
              <div class="col-xs-6">
                  <label for="occupation">Occupation</label>
                <input type="text" value="{{ $data->occupation }}" class="form-control" id="occupation" placeholder="Engineer" name="occupation" required="">
              </div>
              <div class="col-xs-6">
                <label for="position">Position</label>
              <input type="text" name="position" value="{{ $data->position }}" id="position" class="form-control" placeholder="CEO" name="position" required="">
              </div>
            </div>

            <div class="form-group">
              <label for="organization">Organization(optional)</label>
              <input type="text" value="{{ $data->organization }}" class="form-control" id="organization" placeholder="name of organization" name="organization">
            </div>

            <div class="row">
              <div class="col-xs-6">
                 <label for="spouse">Spouse Name(optional)</label>
                  <input type="text" value="{{ $data->spouse_name }}" class="form-control" id="spouse" placeholder="Mrs. XXXX" name="spouse_name">
              </div>
              <div class="col-xs-6">
                <label for="spouse_profession">Spouse Profession(optional)</label>
                  <input type="text" class="form-control" value="{{ $data->spouse_profession }}" id="spouse_profession" placeholder=" Teacher" name="spouse_profession">
              </div>
            </div>



            <div class="form-group">
              <label for="image">Image (Max size 2MB)</label>
              <input type="file" class="form-control" id="image" name="image" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" accept="image/*">
              <img id="output" height="150px" width="auto" src="/storage/images/{{ $data->image }}" /><br>
              <span id="imagesize"></span>
            </div>

            <strong>Participation Details</strong>
            <hr>
            <p><strong>Registration:</strong> 1000/-</p>

            <strong>14<sup>th</sup> February 2019 (Day 01)</strong>

            <div class="form-group">
                <label for="d1la">Lunch(@100tk/person)</label>
                <select class="form-control" id="d1la" name="d1la" required="">
                  <option value="">Select Quantity</option>
                  <option {{($data->d1la == 0 ? 'selected' : '')}} value="0">0</option>
                  <option {{($data->d1la == 1 ? 'selected' : '')}} value="1">1</option>
                  <option {{($data->d1la == 2 ? 'selected' : '')}} value="2">2</option>
                  <option {{($data->d1la == 3 ? 'selected' : '')}} value="3">3</option>
                  <option {{($data->d1la == 4 ? 'selected' : '')}} value="4">4</option>
                  <option {{($data->d1la == 5 ? 'selected' : '')}} value="5">5</option>
                  <option {{($data->d1la == 6 ? 'selected' : '')}} value="6">6</option>
                  <option {{($data->d1la == 7 ? 'selected' : '')}} value="7">7</option>
                  <option {{($data->d1la == 8 ? 'selected' : '')}} value="8">8</option>
                  <option {{($data->d1la == 9 ? 'selected' : '')}} value="9">9</option>
                  <option {{($data->d1la == 10 ? 'selected' : '')}} value="10">10</option>
                </select>
            </div>

            <div class="form-group">
                <label for="d1da">Dinner(@300tk/Box)</label>
                <select class="form-control" id="d1da" name="d1da" required="">
                  <option value="">Select Quantity</option>
                  <option {{($data->d1da == 0 ? 'selected' : '')}} value="0">0</option>
                  <option {{($data->d1da == 1 ? 'selected' : '')}} value="1">1</option>
                  <option {{($data->d1da == 2 ? 'selected' : '')}} value="2">2</option>
                  <option {{($data->d1da == 3 ? 'selected' : '')}} value="3">3</option>
                  <option {{($data->d1da == 4 ? 'selected' : '')}} value="4">4</option>
                  <option {{($data->d1da == 5 ? 'selected' : '')}} value="5">5</option>
                  <option {{($data->d1da == 6 ? 'selected' : '')}} value="6">6</option>
                  <option {{($data->d1da == 7 ? 'selected' : '')}} value="7">7</option>
                  <option {{($data->d1da == 8 ? 'selected' : '')}} value="8">8</option>
                  <option {{($data->d1da == 9 ? 'selected' : '')}} value="9">9</option>
                  <option {{($data->d1da == 10 ? 'selected' : '')}} value="10">10</option>
                </select>
            </div>

            <strong>15<sup>th</sup>February 2019 (Day 02)</strong>
              
                <div class="form-group">
                  <label for="d2la">Lunch(@300tk/Box)</label>
                  <select class="form-control" id="d2la" name="d2la" required="">
                    <option value="">Select Quantity</option>
                    <option {{($data->d2la == 0 ? 'selected' : '')}} value="0">0</option>
                    <option {{($data->d2la == 1 ? 'selected' : '')}} value="1">1</option>
                    <option {{($data->d2la == 2 ? 'selected' : '')}} value="2">2</option>
                    <option {{($data->d2la == 3 ? 'selected' : '')}} value="3">3</option>
                    <option {{($data->d2la == 4 ? 'selected' : '')}} value="4">4</option>
                    <option {{($data->d2la == 5 ? 'selected' : '')}} value="5">5</option>
                    <option {{($data->d2la == 6 ? 'selected' : '')}} value="6">6</option>
                    <option {{($data->d2la == 7 ? 'selected' : '')}} value="7">7</option>
                    <option {{($data->d2la == 8 ? 'selected' : '')}} value="8">8</option>
                    <option {{($data->d2la == 9 ? 'selected' : '')}} value="9">9</option>
                    <option {{($data->d2la == 10 ? 'selected' : '')}} value="10">10</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="d2da">Grand Dinner(@700tk/Person)</label>
                  <select class="form-control" id="d2da" name="d2da" required="">
                    <option value="" >Select Quantity</option>
                    <option {{($data->d2da == 0 ? 'selected' : '')}} value="0">0</option>
                    <option {{($data->d2da == 1 ? 'selected' : '')}} value="1">1</option>
                    <option {{($data->d2da == 2 ? 'selected' : '')}} value="2">2</option>
                    <option {{($data->d2da == 3 ? 'selected' : '')}} value="3">3</option>
                    <option {{($data->d2da == 4 ? 'selected' : '')}} value="4">4</option>
                    <option {{($data->d2da == 5 ? 'selected' : '')}} value="5">5</option>
                    <option {{($data->d2da == 6 ? 'selected' : '')}} value="6">6</option>
                    <option {{($data->d2da == 7 ? 'selected' : '')}} value="7">7</option>
                    <option {{($data->d2da == 8 ? 'selected' : '')}} value="8">8</option>
                    <option {{($data->d2da == 9 ? 'selected' : '')}} value="9">9</option>
                    <option {{($data->d2da == 10 ? 'selected' : '')}} value="10">10</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="d2dda">Driver's Dinner(@300tk/Box)</label>
                  <select class="form-control" id="d2dda" name="driver" required="">
                    <option value="" >Select Quantity</option>
                    <option {{($data->driver == 0 ? 'selected' : '')}} value="0">0</option>
                    <option {{($data->driver == 1 ? 'selected' : '')}} value="1">1</option>
                    <option {{($data->driver == 2 ? 'selected' : '')}} value="2">2</option>
                    <option {{($data->driver == 3 ? 'selected' : '')}} value="3">3</option>
                    <option {{($data->driver == 4 ? 'selected' : '')}} value="4">4</option>
                    <option {{($data->driver == 5 ? 'selected' : '')}} value="5">5</option>
                    <option {{($data->driver == 6 ? 'selected' : '')}} value="6">6</option>
                    <option {{($data->driver == 7 ? 'selected' : '')}} value="7">7</option>
                    <option {{($data->driver == 8 ? 'selected' : '')}} value="8">8</option>
                    <option {{($data->driver == 9 ? 'selected' : '')}} value="9">9</option>
                    <option {{($data->driver == 10 ? 'selected' : '')}} value="10">10</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="t_shirt">T-Shirt Size</label>
                  <select class="form-control" id="t_shirt" name="t_shirt" required="">
                    <option value="" >Select Size</option>
                    <option {{($data->t_shirt == 'S' ? 'selected' : '')}} value="S">S</option>
                    <option {{($data->t_shirt == 'M' ? 'selected' : '')}} value="M">M</option>
                    <option {{($data->t_shirt == 'L' ? 'selected' : '')}} value="L">L</option>
                    <option {{($data->t_shirt == 'XL' ? 'selected' : '')}} value="XL">XL</option>
                    <option {{($data->t_shirt == 'XXL' ? 'selected' : '')}} value="XXL">XXL</option>
                    <option {{($data->t_shirt == 'XXXL' ? 'selected' : '')}} value="XXXL">XXXL</option>
                  </select>
                </div>

                <div class="form-group">
                  Total: <strong><span id="totalamount">1000</span> Taka</strong> <br>
                  {{-- Total: <strong><span id="totalamountonline">1000</span> Taka(Online)(includes 2.5% gateway charge)</strong> <br> --}}
                  <input type="hidden" id="totalamountToPay" readonly="" name="total_amount" value="{{ $data->total_amount }}">
                  <input type="hidden" id="" name="added_by" value="{{ Auth::user()->name }}">
                </div>

                <div class="form-group">
                  <label for="payment_method">Payment Method</label>
                  <input type="text" readonly="" value="{{ $data->payment_method }}" class="form-control" id="payment_method" placeholder="Email address" required="" name="payment_method">
                </div>
                
                {{-- <h4>Select Payment Method</h4> --}}

                <!-- radio -->
{{--                 <div class="form-group">

                  <div class="radio">
                    <label for="online">
                      <input type="radio" name="payment_method" id="online" value="online" {{ ($data->payment_method == 'online') ? 'checked' : '' }}>
                      Online
                    </label>
                  </div>

                  <div class="radio">
                    <label for="bank">
                      <input type="radio" name="payment_method" id="bank" value="bank" {{ ($data->payment_method == 'bank') ? 'checked' : '' }}>
                      Bank
                    </label>
                  </div>

                  <div class="radio">
                    <label for="cash">
                      <input type="radio" name="payment_method" id="cash" value="cash" {{ ($data->payment_method == 'cash') ? 'checked' : '' }}>
                      Cash
                    </label>
                  </div>

                </div> --}}
                
                
                  <div class="form-group">
                      <label for="order_status">Order Status</label>
                      <select class="form-control" id="order_status" name="order_status" required="">
                        <option value="">Select</option>
                        <option {{($data->order_status == 'Processing' ? 'selected' : '')}} value="Processing">Processing</option>
                        <option {{($data->order_status == 'Pending' ? 'selected' : '')}} value="Pending">Pending</option>
                        <option {{($data->order_status == 'Failed' ? 'selected' : '')}} value="Failed">Failed</option>
                        <option {{($data->order_status == 'Complete' ? 'selected' : '')}} value="Complete">Complete</option>
                      </select>
                  </div>
                




          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" id="from_submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.box -->

    </div>
    <!--/.col (left) -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->





@endsection

@section('extra_js')

<script>

  $(document).ready(function(){

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
           //  total_price = total_price*1.025;
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

        $('#js_status').text('JS loaded properly');

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
                        $('#mobileValidation').html('<mark class="bg-danger text-black">'+data.message+'</mark>').show();
                      }

                    
                  }
              });
        });



  });


</script>


@endsection