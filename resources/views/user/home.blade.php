<!DOCTYPE html>
<html>

<head>
    <title>RH Reunion 2023</title>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,600,700,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/lightbox.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/responsive.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    <div id="overlay_search" class="overlay_search hidden">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-md-6">
                    <span class="close_btn"><i class="fa fa-times"></i></span>
                    <div id="submissionStatus" class="text-lg-center text-white">
                        Fill this form only after you have registerd and paid the amount in the bank
                    </div>

                    <form id="bank_submit">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="order_id">Phone number or Application ID</label>
                                <input type="text" class="form-control" id="order_id"
                                    placeholder="Phone number or Application ID" name="order_id" required="">
                            </div>
                            <div class="col-lg-6">
                                <label for="bank_branch">Branch</label>
                                <input type="text" class="form-control" id="bank_branch" placeholder="Branch Name"
                                    required="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="payment_date">Payment Date</label>
                                <input type="text" class="form-control" id="payment_date" placeholder="dd/mm/yy"
                                    required="">
                            </div>
                            <div class="col-lg-6">
                                <label for="scroll_no">Scroll No</label>
                                <input type="text" class="form-control" id="scroll_no" placeholder="Scroll No">
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <input type="submit" name="submit" value="submit" class="btn btn-primary sbh_btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg nav_area fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">RH</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07"
                aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse mainmenu" id="navbarsExample07">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('ec') }}">EC<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#schedule">Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tnc') }}">Terms & Conditions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link callout sbh_btn" href="{{ route('payment_status') }}">Payment Status</a>
                    </li>{{--
            <li class="nav-item">
              <a class="nav-link callout sbh_btn" href="{{ route('currentstnd') }}" >Current Batch Reg.</a>
            </li> --}}
                </ul>
            </div>
        </div>
    </nav>



    <div class="hero_area h-100" id="home">
        <div class="container h-100">
            <div class="row h-100 text-center align-items-center">
                <div class="col-lg-12">
                    <div class="hero_txt">
                        <h1>reunion 2023<span>Dr. M A Rashid Hall(BUET)</span></h1>
                        <span class="date">10th March 2023</span>
                        <br>
                        <a href="{{ route('registerform') }}" class="sbh_btn hero_btn main_hero_btn mb-3">Alumni
                            REGISTRATION</a>
                        {{-- <a href="{{ route('currentstnd') }}" class="sbh_btn hero_btn main_hero_btn mb-3">Current Student Registration</a> <br> --}}
                        <a href="#" id="search" class="sbh_btn sbh_sec_btn hero_btn">Bank Payment Verify</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="about_section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-9 text-center mx-auto">
                    <div class="row">
                        <div class="col-12 text-center">
                            <p style="background-color: #ff2d55;color: #fff; padding: 10px 25px;">To register manually
                                during off days, please contact these numbers.</p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p>Mr. Iftekhar </p>
                                    <p>016xx xxx xxx</p>
                                </div>
                                <div class="col-sm-6">
                                    <p>Mr.  Iftekhar</p>
                                    <!-- <p>01728309913</p> -->
                                    <p>017xxxxxxx</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="countdown_section text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_heading">
                        <h2><span>Become a part of</span> This Great Event</h2>
                    </div>
                </div>
                <div class="col-12">
                    <div id="clock" class="clock">
                        <div class="wrapper">
                            <span class="time">100</span>
                            <br>days
                        </div>
                        <span class="slash">/</span>
                        <div class="wrapper">
                            <span class="time">23</span>
                            <br>hours
                        </div>
                        <span class="slash">/</span>
                        <div class="wrapper">
                            <span class="time">56</span>
                            <br>minutes
                        </div>
                        <span class="slash">/</span>
                        <div class="wrapper">
                            <span class="time">50</span>
                            <br>seconds
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="event_details" id="schedule">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_heading black">
                        <h2><span></span>Program Schedule</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="event_card">

                        <ul class="list-group">
                            <li class="list-group-item header_date">09 March 2023</li>
                            <li class="list-group-item ">
                                <span class="title">Reunion souvenir & cupon distribution, Spot registration</span> at
                                <span>Hall Compound</span>
                                <span class="time float-right">2:30 pm - 3:30 pm</span>
                            </li>
                            <li class="list-group-item ">
                                <span class="title">Annual General Meeting</span> at
                                <span>Hall Compound</span>
                                <span class="time float-right">3:31 pm - 4:30 pm</span>
                            </li>
                            
                            <li class="list-group-item ">
                                <span class="title">Cake, Tea time, Sports event & Hall visit</span> at
                                <span>Hall Compound</span>
                                <span class="time float-right">04:31 am - 6:00 pm</span>
                            </li>
                            <li class="list-group-item ">
                                <span class="title">Recitation of The Holy Quran, Reminiscence, Welcome Remarks </span> at
                                <span>Hall Compound</span>
                                <span class="time float-right">06:00 pm - 07:30 pm</span>
                            </li>
                            
                            
                            <li class="list-group-item ">
                                <span class="title">Dinner</span> at
                                <span>Hall Compound</span>
                                <span class="time float-right">07:31 pm - 9:00 pm</span>
                            </li>
                            <li class="list-group-item ">
                                <span class="title">Cultural function</span> at
                                <span>Gymnasium</span>
                                <span class="time float-right">09:00 pm - 10:30 pm</span>
                            </li>
                            
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="gallery_section" id="gallery">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_heading black">
                        <h2> Gallery</h2>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-xs-10 col-sm-12 col-md-6 col-lg-4 single_image"
                            style="background-image: url({{ asset('user/img/sbh/1.jpg') }});">
                        </div>
                        <div class="col-xs-10 col-sm-12 col-md-6 col-lg-4 single_image"
                            style="background-image: url({{ asset('user/img/sbh/2.jpg') }});">
                        </div>
                        <div class="col-xs-10 col-sm-12 col-md-6 col-lg-4 single_image"
                            style="background-image: url({{ asset('user/img/sbh/3.jpg') }});">
                        </div>
                        <div class="col-xs-10 col-sm-12 col-md-6 col-lg-4 single_image"
                            style="background-image: url({{ asset('user/img/sbh/4.jpg') }});">
                        </div>
                        <div class="col-xs-10 col-sm-12 col-md-6 col-lg-4 single_image"
                            style="background-image: url({{ asset('user/img/sbh/5.jpg') }});">
                        </div>
                        <div class="col-xs-10 col-sm-12 col-md-6 col-lg-4 single_image"
                            style="background-image: url({{ asset('user/img/sbh/6.jpg') }});">
                        </div>
                        <div class="col-xs-10 col-sm-12 col-md-6 col-lg-4 single_image"
                            style="background-image: url({{ asset('user/img/sbh/7.jpg') }});">
                        </div>
                        <div class="col-xs-10 col-sm-12 col-md-6 col-lg-4 single_image"
                            style="background-image: url({{ asset('user/img/sbh/8.jpg') }});">
                        </div>
                        <div class="col-xs-10 col-sm-12 col-md-6 col-lg-4 single_image"
                            style="background-image: url({{ asset('user/img/sbh/9.jpg') }});">
                        </div>
                        <div class="col-xs-10 col-sm-12 col-md-6 col-lg-4 single_image"
                            style="background-image: url({{ asset('user/img/sbh/10.jpg') }});">
                        </div>
                        <div class="col-xs-10 col-sm-12 col-md-6 col-lg-4 single_image"
                            style="background-image: url({{ asset('user/img/sbh/11.jpg') }});">
                        </div>
                        <div class="col-xs-10 col-sm-12 col-md-6 col-lg-4 single_image"
                            style="background-image: url({{ asset('user/img/sbh/12.jpg') }});">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact_section" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="left_content">
                        <h2>Get in Touch</h2>
                        <ul>
                            <li><i class="fas fa-phone"></i>+880 16xx xxx xxx</li>
                            <li><i class="fas fa-at"></i>rh.reunion2023@gmail.com</li>
                            <li><i class="fas fa-home"></i>Dr. M A Rashid Hall, BUET, Dhaka - 1000</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7">
                    <form class="contact_form" action="#" method="POST" id="contactForm">
                        {{ csrf_field() }}
                        <input type="text" name="name" id="name" placeholder="Your name" required>
                        <span id="nameError" class="label label-danger"></span>
                        <input type="text" name="email" id="email" placeholder="Your email" required>
                        <span id="emailError" class="label label-danger"></span>
                        <input type="text" name="subject" id="subject" placeholder="Subject" required>
                        <textarea placeholder="Message" id="message" name="message" required></textarea>
                        <span id="messageError" class="label label-danger"></span>
                        <input type="submit" name="submit" id="submit" value="Send Message" class="sbh_btn"
                            >
                    </form>
                    <div id="messageStatus"></div>
                </div>
                <div class="mb-5"></div>
                <div class="col-12 text-center text-muted mini_footer">
                    &copy; all rights reserved RH-2023 
                    || Developed BY <a target="_blank"
                        href="https://www.linkedin.com/in/md-arafat-hossain-138a5a206/">Arafat Hossain</a>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('user/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('user/js/waypoint.js') }}"></script>
    <script type="text/javascript" src="{{ asset('user/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('user/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('user/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('user/js/jquery.countdown.min.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('user/js/lightbox.min.js')}}"></script> --}}
    <script type="text/javascript" src="{{ asset('user/js/main.js') }}"></script>
    <script type="text/javascript">
        //year/month/day
        $("#clock").countdown("2023/03/10 00:00:00").on("update.countdown", function(s) {
            $(this).html(s.strftime(
                '<div class="wrapper"><span class="time">%-D</span><br>day%!D</div><span class="slash">/</span><div class="wrapper"><span class="time">%H</span><br>hours</div><span class="slash">/</span><div class="wrapper"><span class="time">%M</span><br>minutes</div><span class="slash">/</span><div class="wrapper"><span class="time">%S</span><br>seconds</div>'
                ))
        });
        $("body").scroll(function() {
            $(this).scrollTop() >= 150 ? $(".nav_area").addClass("nav_fixed") : $(".nav_area").removeClass(
                "nav_fixed")
        });
        $("#search").on("click", function(e) {
            e.preventDefault(), $(".overlay_search").removeClass("hidden").addClass("visible")
        }), $(".close_btn, window").on("click", function() {
            $(".overlay_search").removeClass("visible").addClass("hidden")
        });
        $('#bank_submit').submit(function(e) {
            e.preventDefault();
            var email_tran_id = $("#order_id").val(),
                bank_name = "Sonali Bank",
                bank_branch = $("#bank_branch").val(),
                payment_date = $("#payment_date").val(),
                scroll_no = $("#scroll_no").val(),
                _token = $('meta[name="csrf-token"]').attr("content");
            $.ajax({
                url: '{{ route('updateFormStatus') }}',
                type: "POST",
                data: {
                    email_tran_id: email_tran_id,
                    bank_name: bank_name,
                    payment_date: payment_date,
                    bank_branch: bank_branch,
                    scroll_no: scroll_no,
                    _token: _token
                },
                dataType: "json",
                success: function(a) {
                    $("#bank_submit").trigger("reset"), a.message ? $("#submissionStatus").css({
                        visibility: "visible"
                    }).html(a.message) : $("#submissionStatus").hide()
                }
            });
        });

        function checkContact() {
            $("#name").on("keyup", function() {
                "" == $(this).val() ? ($("#nameError").text("Name can not be empty"), $("input[type='submit']")
                    .attr("disabled", "disabled")) : ($("#nameError").text("ok"), $("input[type='submit']")
                    .removeAttr("disabled"))
            }), $("#email").on("keyup", function() {
                var t = $(this).val();
                /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(t) ? "" == $(this).val() ? (
                    $("#emailError").text("Email can not be empty"), $("input[type='submit']").attr("disabled",
                        "disabled")) : ($("#emailError").text("ok"), $("input[type='submit']").removeAttr(
                    "disabled")) : ($("#emailError").text("Invalid Email"), $("input[type='submit']").attr(
                    "disabled", "disabled"))
            })
        }
        checkContact();
        $("#submit").on("click", function(e) {
            e.preventDefault();
            var t = $("#name").val(),
                a = $("#email").val(),
                n = $("#subject").val(),
                s = $("#message").val(),
                c = $('meta[name="csrf-token"]').attr("content");
            $.ajax({
                url: '{{ asset('saveContactSubmission') }}',
                type: "POST",
                data: {
                    _token: c,
                    name: t,
                    email: a,
                    subject: n,
                    message: s
                },
                dataType: "json",
                beforeSend: function() {
                    $("#submit").val("Sending")
                },
                success: function(e) {
                    console.log(e), 0 != e && ($("#contactForm").each(function() {
                        this.reset(), $("#nameError").hide(), $("#emailError").hide()
                    }), $("#contactForm").hide(500), $("#messageStatus").text(
                        "Message sent successfully").show(500))
                },
                error: function(e) {
                    console.log("could not post the data")
                    console.log(e)
                    // what to do if error

                }
                
            })
        });
    </script>

</body>

</html>



