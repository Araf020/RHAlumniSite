<!DOCTYPE html>
<html>

<head>
    <title>Online Registration</title>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,600,700,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/responsive.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body data-spy="scroll" data-target="#mainmenu">


    <div class="form_area hero_area">
        <div class="container h-100">
            <div class="row h-100 text-center align-items-center">
                <div class="col-lg-12">
                    <div class="hero_txt">
                        <h1>registration </h1>
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
                    <p>*All fields are required if not mentioned otherwise.</p>
                    <p>*The informations will be used to build <strong>RH Alumni Association Database</strong></p>
                    <p>*Download example filled form <a target="_blank"
                            href="https://drive.google.com/file/d/1ouKfbiYt_Or-TbpTrQuOX83s8ahVskRE/view?usp=share_link">FROM
                            HERE</a>.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <form action="{{ route('SaveData') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name <span class="badge badge-danger">required</span></label>
                                    <input type="text" class="form-control" id="name"
                                        placeholder="Enter Your Name" name="name" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="NickName">Nickname <span
                                            class="badge badge-danger">required</span></label>
                                    <input type="text" class="form-control" id="NickName"
                                        placeholder="Enter Your Nickname" name="nick_name" required="">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="department">Department <span class="badge badge-danger">required</span></label>
                            <select class="form-control" id="department" name="department" required="">
                                <option value="">Select Department</option>
                                <option value="EEE">EEE</option>
                                <option value="CSE">CSE</option>
                                <option value="ME">ME</option>
                                <option value="CE">CE</option>
                                <option value="WRE">WRE</option>
                                <option value="IPE">IPE</option>
                                <option value="NAME">NAME</option>
                                <option value="CHE">CHE</option>
                                <option value="ARCH">ARCH</option>
                                <option value="MME">MME</option>
                                <option value="URP">URP</option>
                            </select>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="session">Entrance Batch(optional)</label>
                                    <input type="text" class="form-control" id="session" placeholder="2010"
                                        name="entrance_batch">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="graduation">Graduation Year <span
                                            class="badge badge-danger">required</span></label>
                                    <input type="text" class="form-control" id="graduation" placeholder="1987"
                                        name="graduation_year" required="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="attachment">Attachment <span class="badge badge-danger">required</span></label>
                            <select class="form-control" id="attachment" name="attachment" required="">
                                <option value="">Select</option>
                                <option value="attached">Attached</option>
                                <option value="resident">Resident</option>
                            </select>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group" id="Room" style="display: none;">
                                    <label for="RoomNo">Room No(Required if Resident) <span
                                            class="badge badge-danger">required</span></label>
                                    <input type="text" class="form-control" id="RoomNo" placeholder="1012"
                                        name="room_no">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group" id="Hall_Duration" style="display: none;">
                                    <label for="hall_duration">Hall Life Duration(optional) <span
                                            class="badge badge-danger">required</span></label>
                                    <input type="text" class="form-control" id="hall_duration"
                                        placeholder="1 year" name="hall_duration">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="DOB">Birth Date(optional)</label>
                                <input type="text" class="form-control" placeholder="mm/dd/yy" id="DOB"
                                    name="birthdate">
                            </div>
                            <div class="col">
                                <label for="gender">Gender <span class="badge badge-danger">required</span></label>
                                <select class="form-control" id="gender" name="gender" required="">
                                    <option value="">Select</option>
                                    <option value="male">Male</option>
                                    <!-- <option value="female">Female</option> -->
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="contact_address">Present Address <span
                                    class="badge badge-danger">required</span></label>
                            <input type="text" class="form-control" id="contact_address" name="present_address"
                                required="" placeholder="your current address">
                        </div>

                        <!-- <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="hobby">Hobby(optional)</label>
                                    <input type="text" class="form-control datepicker" placeholder="Your hobby"
                                        id="hobby" name="hobby">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="postcode">PostCode <span
                                            class="badge badge-danger">required</span></label>
                                    <input type="text" class="form-control" id="postcode" name="postcode"
                                        required="" placeholder="1214">
                                </div>
                            </div>
                        </div> -->

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact">Cell Phone No. <span
                                            class="badge badge-danger">required</span></label>
                                    <input type="text" class="form-control" id="contact"
                                        placeholder="0152 222 222" name="mobile_1" required="">
                                    <span id="mobileValidation"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact2">Alternative Phone(optional)</label>
                                    <input type="text" class="form-control" id="contact2"
                                        placeholder="0172 000 000" name="mobile_2">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email address <span
                                    class="badge badge-danger">required</span></label>
                            <input type="email" class="form-control" id="email" placeholder="name@example.com"
                                name="email" required="">
                        </div>


                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="occupation">Occupation <span
                                        class="badge badge-danger">required</span></label>
                                <input type="text" class="form-control" id="occupation" placeholder="Engineer"
                                    name="occupation" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="position">Position <span
                                        class="badge badge-danger">required</span></label>
                                <input type="text" name="position" id="position" class="form-control"
                                    placeholder="CEO" name="position" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="organization">Organization(optional)</label>
                            <input type="text" class="form-control" id="organization"
                                placeholder="name of organization" name="organization">
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="spouse">Spouse Name(optional)</label>
                                    <input type="text" class="form-control" id="spouse"
                                        placeholder="Mrs. XXXX" name="spouse_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label for="t_shirt">Your T-Shirt Size <span
                                        class="badge badge-danger">required</span></label>
                                    <select class="form-control" id="t_shirt" name="t_shirt" required="">
                                        <option value="">Select Size</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                        <option value="XXXL">XXXL</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        
                        

                        <div class="form-group">
                            <label for="image">Image (Max size 1MB)  <span
                                        class="badge badge-danger">required</span></label>
                            <input type="file" class="form-control" id="image" name="image"
                                onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"
                                accept="image/*" required="">
                            <img id="output" height="150px" width="auto" /><br>
                            <span id="imagesize"></span>
                        </div>

                        <hr>


                        <strong>Participation Details</strong>
                        <hr>
                        <p>Participation Fee: <strong>1000 Taka</strong> 
                            <span
                                    id="discount_text">
                            </span>
                        </p>
                        <p>Total amount to pay: <strong><span id="totalamount"></span> Taka</strong> 
                            <span
                                    id="discount_text">
                            </span>
                        </p>

                        <strong>10<sup>th</sup> March 2023</strong>

                        <div class="form-group">
                            {{-- Total: <strong><span id="totalamountonline">1000</span> Taka (Online)(includes 2.5% gateway charge)</strong> <br> --}}
                            <input type="hidden" id="totalamountToPay" name="total_amount" value="1000">
                            <input type="hidden" id="" name="added_by" value="self">
                        </div>
                        <div class="form-row">
                        
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <!-- hidden input for d1la -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="d1da" id="d1da" value="0">
                                        <label for="d1da"  class="form-check-label" >
                                            Driver's Dinner(@300tk)
                                        </label>
                                        <input for="d1da" type="hidden" name="d1da" id = "d1da" value="1">
                                    </div>
                                    <input type="hidden" id="d1la" name="d1la" value="0">
 
                                    <!-- <label for="d1la">Dinner(@300tk/person) <span
                                            class="badge badge-danger">required</span></label>
                                    <select class="form-control" id="d1la" name="d1la" required="">
                                        <option value="">Select Quantity</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select> -->
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                   
                                    
                                    <!-- <select class="form-control" id="d1da" name="d1da" required="">
                                        <option value="0">Select Quantity</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option> -->
                                        <!-- <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option> -->
                                    <!-- </select> -->
                                </div>
                            </div>
                        </div>

                        

                        <div class="form-row">
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="d2dda">Driver's Dinner(@300tk/Box) <span
                                        class="badge badge-danger">required</span></label>
                                    <select class="form-control" id="d2dda" name="driver" required="">
                                        <option value="">Select Quantity</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </div> -->
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="t_shirt">T-Shirt Size <span
                                        class="badge badge-danger">required</span></label>
                                    <select class="form-control" id="t_shirt" name="t_shirt" required="">
                                        <option value="">Select Size</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                        <option value="XXXL">XXXL</option>
                                    </select>
                                </div>
                            </div> -->
                        </div>

                        <br>
                        

                        <h4>Select Payment Method</h4>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="online"
                                    value="online" required="">
                                <label class="form-check-label" for="online">
                                    Online Payment <br>
                                    <span class="text-muted">Pay securely by Credit or Debit card or internet banking
                                        through SSLCommerz Secure Servers. Please note, 2.58% charge will be added for
                                        all VISA/Mastercard and 3.58% charge will be added for AMEX card </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="bank"
                                    value="bank" required="">
                                <label class="form-check-label" for="bank">
                                    Bank Payment
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck" required="">
                                <label class="form-check-label" for="gridCheck">
                                    I agree to <a href="{{ route('tnc') }}" target="_blank">terms and conditions</a>
                                </label>
                            </div>
                        </div>


                        <br>

                        <div class="form-group">
                            <!-- disable the submit button -->

                            <input  type="submit" id="from_submit" value="Pay and Confirm" class="btn sbh_btn" >
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript" src="{{ asset('user/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('user/js/smoothscroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('user/js/waypoint.js') }}"></script>
    <script type="text/javascript" src="{{ asset('user/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('user/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('user/js/main.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // function totalPayable(){var a=($("#passing_year").val()/100)*(1e3+100*$("#d1la").val()+300*$("#d1da").val()+300*$("#d2la").val()+700*$("#d2da").val()+300*$("#d2dda").val());$("input[name='payment_method']:checked").val();$("#totalamount").text(a),$("#totalamountToPay").val(a)}
            // function roundNumber(a,e){if((""+a).includes("e")){var t=(""+a).split("e"),n="";return+t[1]+e>0&&(n="+"),+(Math.round(+t[0]+"e"+n+(+t[1]+e))+"e-"+e)}return+(Math.round(a+"e+"+e)+"e-"+e)}$("#attachment").on("change",function(){"resident"===$(this).val()?$("#Room,#Hall_Duration").show():$("#Room,#Hall_Duration").hide()}),totalPayable(),$("#d1la,#passing_year,#d1da, #d2la, #d2da, #d2dda").on("change",function(){totalPayable()}),$("#image").bind("change",function(){roundNumber(this.files[0].size/1024/1024,2)>2?$("#imagesize").html('<span class="sbh_bg">File size Exceeds 2 MB<br> Please choose a file under 2MB</span>'):$("#imagesize").html('<span class="sbh_bg">Image is ok to be uploaded</span>')});
            //   $("#contact").on("blur",function(){var t=$(this).val(),a=$('meta[name="csrf-token"]').attr("content");$.ajax({url:'',type:"POST",data:{mobile_number:t,_token:a},dataType:"json",success:function(t){"ok"==t.message?($("#from_submit").removeAttr("disabled"),$("#mobileValidation").hide()):($("#from_submit").attr("disabled","disabled"),$("#mobileValidation").html('<span class="sbh_bg">'+t.message+"</span>").show())}})});
            
            
            function totalPayable() {
                var a = checkGraduationYear() / 100 * (1e3 + 300 * $("#d1la").val() + 300 * $("#d1da").val() );
                $("input[name='payment_method']:checked").val(), $("#totalamount").text(a), $("#totalamountToPay")
                    .val(a), console.log(a)
            }
            const checkbox = document.getElementById('d1da');
            const hiddenInput = document.querySelector('input[name="d1da"][type="hidden"]');

            checkbox.addEventListener('change', (event) => {
                if (event.target.checked) {
                    // hiddenInput.value = 1;
                    // change d1da value to 1
                    $("#d1da").val(1);
                } else {
                    // hiddenInput.value = 0;
                    // change d1da value to 0
                    $("#d1da").val(0);
                }
                console.log("checkbox changed");
                console.log(hiddenInput.value);
                // update total amount
                totalPayable();
            });

            function checkGraduationYear() {
                return 100;
                // var a = $("#graduation").val();
                // return console.log(a), a >= 2015 && a <= 2018 ? ($("#discount_text").html(
                //     '<span class="sbh_bg">You have 50% discount</span>'), 50) : a >= 2011 && a <= 2014 ? ($(
                //     "#discount_text").html('<span class="sbh_bg">You have 25% discount</span>'), 75) : ($(
                //     "#discount_text").html(""), 100)
            }

            function roundNumber(a, t) {
                if (("" + a).includes("e")) {
                    var e = ("" + a).split("e"),
                        n = "";
                    return +e[1] + t > 0 && (n = "+"), +(Math.round(+e[0] + "e" + n + (+e[1] + t)) + "e-" + t)
                }
                return +(Math.round(a + "e+" + t) + "e-" + t)
            }
            $("#graduation").on("keyup", function() {
                    totalPayable(), console.log($("#graduation").val())
                }), $("#attachment").on("change", function() {
                    "resident" === $(this).val() ? $("#Room,#Hall_Duration").show() : $("#Room,#Hall_Duration")
                        .hide()
                }), totalPayable(), 
                
                $("#d1la,#d1da, #d2la, #d2da, #d2dda").on("change", function() {
                    totalPayable()
                }),
                $("#d1da").on("change", function() {
                    console.log("d1da changed");
                    // show me the d1da value
                    console.log($("#d1da").val());
                    totalPayable();
                }),


                $("#image").bind("change", function() {
                    if (roundNumber(this.files[0].size / 1024 / 1024, 2) > 1) {

                        $("#imagesize").html(
                            '<span class="sbh_bg">File size Exceeds 1 MB<br> Please choose a file under 1MB</span>'
                        );
                        alert('File size Exceeds 1 MB \nPlease choose a file under 1MB');

                    } else {
                        $("#imagesize").html('<span class="sbh_bg">Image is ok to be uploaded</span>');
                    }
                    // roundNumber(this.files[0].size / 1024 / 1024, 2) > 1 ? $("#imagesize").html(
                    //     '<span class="sbh_bg">File size Exceeds 1 MB<br> Please choose a file under 1MB</span>'
                    // ) : $("#imagesize").html('<span class="sbh_bg">Image is ok to be uploaded</span>')
                }),


                $("#contact").on("blur", function() {
                    var a = $(this).val(),
                        t = $('meta[name="csrf-token"]').attr("content");
                    $.ajax({
                        url: '{{ asset('checkPhoneNo ') }}',
                        type: "POST",
                        data: {
                            mobile_number: a,
                            _token: t
                        },
                        dataType: "json",
                        success: function(a) {
                            "ok" == a.message ? ($("#from_submit").removeAttr("disabled"), $(
                                "#mobileValidation").hide()) : ($("#from_submit").attr(
                                "disabled", "disabled"), $("#mobileValidation").html(
                                '<span class="sbh_bg">' + a.message + "</span>").show())
                        }
                    })
                });

        });
    </script>
    // <script>
        // for driver dinner form
    //     const checkbox = document.getElementById('d1da');
    //         const hiddenInput = document.querySelector('input[name="d1da"][type="hidden"]');

    //         checkbox.addEventListener('change', (event) => {
    //             if (event.target.checked) {
    //                 hiddenInput.value = 1;
    //             } else {
    //                 hiddenInput.value = 0;
    //             }
    //             console.log("checkbox changed");
    //             console.log(hiddenInput.value);
    //             // update total amount
    //             totalPayable();
    //         });
    // </script>

</body>

</html>
