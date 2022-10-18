@extends('admin.home')


@section('extra_css')



@endsection


@section('main_content')

  <!-- Begin Page Header-->
  <div class="row">
      <div class="page-header">
        <div class="d-flex align-items-center">
            <h2 class="page-header-title">Forms Basic</h2>
            <div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Components</a></li>
                <li class="breadcrumb-item active">Forms Basic</li>
            </ul>
            </div>
        </div>
      </div>
  </div>
  <!-- End Page Header -->
  <div class="row flex-row">
      <div class="col-12">
          <!-- Form -->
          <div class="widget has-shadow">
              <div class="widget-header bordered no-actions d-flex align-items-center">
                  <h4>All Elements</h4>
              </div>
              <div class="widget-body">
                  <form class="form-horizontal" action="{{ route('saveNew') }}" method="POST">
                    @csrf
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label">Name</label>
                          <div class="col-lg-9">
                              <input type="text" class="form-control" name="name">
                          </div>
                      </div>
                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label">Nick Name</label>
                          <div class="col-lg-9">
                              <input type="text" class="form-control" name="nick_name">
                          </div>
                      </div>

                      <div class="form-group row mb-5">
                          <label class="col-lg-3 form-control-label">Department</label>
                          <div class="col-lg-9 select mb-3">
                              <select name="department" class="custom-select form-control">
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
                      </div>


                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label">Exam Session</label>
                          <div class="col-lg-9">
                              <input type="text" class="form-control" name="exam_session">
                          </div>
                      </div>

                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label">Graduation Year</label>
                          <div class="col-lg-9">
                              <input type="text" class="form-control" name="graduation_year">
                          </div>
                      </div>

                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label">Attachment Year</label>
                          <div class="col-lg-9 select mb-3">
                              <select name="attachment" class="custom-select form-control">
                                  <option>Select</option>
                                  <option value="attached">Attached</option>
                                  <option value="resident">Resident</option>
                              </select>
                          </div>
                      </div>

                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label">Room No </label>
                          <div class="col-lg-9">
                              <input type="text" class="form-control" name="room_no">
                          </div>
                      </div>

                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label">Hall Life Duration</label>
                          <div class="col-lg-9">
                              <input type="text" class="form-control" name="hall_duration">
                          </div>
                      </div>

                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label">Birth Date</label>
                          <div class="col-lg-9">
                              <input type="text" class="form-control" name="birthdate">
                          </div>
                      </div>

                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label">gender</label>
                          <div class="col-lg-9 select mb-3">
                              <select name="gender" class="custom-select form-control">
                                  <option>Select</option>
                                  <option value="male">Male</option>
                                  <option value="female">Female</option>
                              </select>
                          </div>
                      </div>

                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label">Present Address</label>
                          <div class="col-lg-9">
                              <input type="text" class="form-control" name="present_address">
                          </div>
                      </div>

                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label">Anniversary Date</label>
                          <div class="col-lg-9">
                              <input type="text" class="form-control" name="anniversary_date">
                          </div>
                      </div>

                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label">Post Code</label>
                          <div class="col-lg-9">
                              <input type="text" class="form-control" name="postcode">
                          </div>
                      </div>

                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label">Mobile 1</label>
                          <div class="col-lg-9">
                              <input type="text" class="form-control" name="mobile_1">
                          </div>
                      </div>

                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label">Mobile 2</label>
                          <div class="col-lg-9">
                              <input type="text" class="form-control" name="mobile_2">
                          </div>
                      </div>

                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label">Email</label>
                          <div class="col-lg-9">
                              <input type="text" class="form-control" name="email">
                          </div>
                      </div>

                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label">Occupation</label>
                          <div class="col-lg-9">
                              <input type="text" class="form-control" name="occupation">
                          </div>
                      </div>

                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label">Position</label>
                          <div class="col-lg-9">
                              <input type="text" class="form-control" name="position">
                          </div>
                      </div>

                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label">Organization</label>
                          <div class="col-lg-9">
                              <input type="text" class="form-control" name="organization">
                          </div>
                      </div>

                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label">Spouse Name</label>
                          <div class="col-lg-9">
                              <input type="text" class="form-control" name="spouse_name">
                          </div>
                      </div>

                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label">Spouse Profession</label>
                          <div class="col-lg-9">
                              <input type="text" class="form-control" name="spouse_profession">
                          </div>
                      </div>

                      <hr>




                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label">14 FEB Din(@300tk)</label>
                          <div class="col-lg-9 select mb-3">
                              <select name="d1da" class="custom-select form-control" id="d1da">
                                  <option value="0" selected="">Select Quantity</option>
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
                      </div>


                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label">15 FEB Lun(@300tk)</label>
                          <div class="col-lg-9 select mb-3">
                              <select name="d2la" class="custom-select form-control" id="d2la">
                                  <option value="0" selected="">Select Quantity</option>
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
                      </div>

                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label">15 FEB Grand Din(@700tk)</label>
                          <div class="col-lg-9 select mb-3">
                              <select name="d2da" class="custom-select form-control" id="d2da">
                                  <option value="0" selected="">Select Quantity</option>
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
                      </div>


                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label">Driver's Dinner(@300tk)</label>
                          <div class="col-lg-9 select mb-3">
                              <select name="driver" class="custom-select form-control" id="d2dda">
                                  <option value="0" selected="">Select Quantity</option>
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
                      </div>


                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label" id="totalamount"></label>
                          <div class="col-lg-9">
                              <input type="hidden" class="form-control" id="totalamountToPay" name="total_amount">
                              <input type="hidden" class="form-control" id="" name="added_by" value="{{ Auth::user()->name }}">
                          </div>
                      </div>

                      <div class="form-group row d-flex align-items-center mb-5">
                          <label class="col-lg-3 form-control-label">Payment Method</label>
                          <div class="col-sm-9">
                              <div class="mb-3">
                                  <div class="styled-radio">
                                      <input type="radio" name="payment_method" id="rad-1" value="online">
                                      <label for="rad-1">Online</label>
                                  </div>
                              </div>
                              <div class="mb-3">
                                  <div class="styled-radio">
                                      <input type="radio" name="payment_method" id="rad-2" value="bank">
                                      <label for="rad-2">Bank</label>
                                  </div>
                              </div>
                              <div class="mb-3">
                                  <div class="styled-radio">
                                      <input type="radio" name="payment_method" id="rad-disabled" value="cash">
                                      <label for="rad-disabled">Cash</label>
                                  </div>
                              </div>

                          </div>
                      </div>


                      <div class="text-left">
                          <button class="btn btn-gradient-01" type="submit">Submit Form</button>
                          <button class="btn btn-shadow" type="reset">Reset</button>
                      </div>



                  </form>
              </div>
          </div>
          <!-- End Form -->
      </div>
  </div>
  <!-- End Row -->


@endsection


@section('extra_js')

<script type="text/javascript">
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
    $('#totalamount').text(total_price);
    $('#totalamountToPay').val(total_price);

    //console.log(day_1_dinner,day_2_lunch,day_2_dinner,total_price);
  }

  totalPayable();

  $('#d1da, #d2la, #d2da, #d2dda').on('change',function(){
    totalPayable();
  });
</script>


@endsection