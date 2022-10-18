@extends('admin.home')


@section('extra_css')

<link rel="stylesheet" href="{{ asset('assets/css/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/animate/animate.min.css') }}">

@endsection


@section('main_content')

	
<!-- Begin Page Header-->
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center">
            <h2 class="page-header-title">All Submitted Data</h2>
            <div>
                <ul class="breadcrumb">
                    <a type="button" href="{{ route('addnew') }}" class="btn btn-primary btn-square mr-1 mb-2">Add</a>
                </ul>
            </div>	                            
        </div>
    </div>
</div>
<!-- End Page Header -->
<!-- Begin Row -->
<div class="row">
    <div class="col-xl-12">
        <!-- Sorting -->
        <div class="widget has-shadow">
            <div class="widget-header bordered no-actions d-flex align-items-center">
            </div>
            <div class="widget-body">
                <div class="table-responsive">
                    <table id="sorting-table" class="table mb-0">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Name</th>
                                {{-- <th>Department</th> --}}
                                <th>Email</th>
                                <th>Total Amount(Method)</th>
                                <th><span style="width:100px;">Status</span></th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                        	@foreach ($alldata as $single_data)
	                            <tr>
	                                <td><span class="text-primary">{{ $single_data->id }}</span></td>
	                                <td>{{ $single_data->name }}</td>
	                                {{-- <td>{{$single_data->department}}</td> --}}
	                                <td>{{ $single_data->email }}</td>
	                                <td>{{ $single_data->total_amount }}({{ $single_data->payment_method }})</td>
	                                <td>
	                                	@if ($single_data->status == 0)
	                                		<span style="width:100px;"><span class="badge-text badge-text-small info">Pending</span></span>
	                                	@elseif($single_data->status == 1)
	                                		<span style="width:100px;"><span class="badge-text badge-text-small success">Paid</span></span>
	                                	@elseif($single_data->status == 2)
	                                		<span style="width:100px;"><span class="badge-text badge-text-small danger">Cancelled</span></span>
	                                	@endif
	                                </td>
	                                <td>{{ \Carbon\Carbon::parse($single_data->created_at)->toFormattedDateString() }}</td>
	                                <td class="td-actions">
                                    @if ($single_data->status != 1)
	                                    <a href="#" class="payment_confirm" data-id="{{ $single_data->id }}"><i class="la la-edit edit"></i></a>
                                    @endif
	                                    <a href="#" class="Modal_switch" data-id="{{ $single_data->id }}"  data-toggle="modal" data-target="#scroll-modal"><i class="la la-eye delete "></i></a>
	                                </td>
	                            </tr>
                        	@endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End Sorting -->
        
    </div>
</div>
<!-- End Row -->

<!-- Begin Scrolling Modal -->
   <div id="scroll-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h4 class="modal-title">Modal Title</h4>
                   <button type="button" class="close" data-dismiss="modal">
                       <span aria-hidden="true">×</span>
                       <span class="sr-only">close</span>
                   </button>
               </div>
               <div class="modal-body">
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

                   <p>14th Feb Dinner: <strong><span id="d1da"></span></strong></p>
                   <p>15th Feb Lunch: <strong><span id="d2la"></span></strong></p>
                   <p>15th Feb Dinner: <strong><span id="d2da"></span></strong></p>
                   <p>15th Feb Driver's Dinner: <strong><span id="driver"></span></strong></p>
                   <p>Total: <strong><span id="total_amount"></span></strong></p>
                   <p>payment Method: <strong><span id="payment_method"></span></strong></p>
                   <p>Added By: <strong><span id="added_by"></span></strong></p>

               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-shadow" data-dismiss="modal">Close</button>
               </div>
           </div>
       </div>
   </div>
   <!-- End Scrolling Modal -->

@endsection


@section('extra_js')
<!-- Begin Page Vendor Js -->
        <script src="{{ asset('assets/vendors/js/datatables/datatables.min.js')}}"></script>
        <script src="{{ asset('assets/vendors/js/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{ asset('assets/vendors/js/datatables/jszip.min.js')}}"></script>
        <script src="{{ asset('assets/vendors/js/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{ asset('assets/vendors/js/datatables/pdfmake.min.js')}}"></script>
        <script src="{{ asset('assets/vendors/js/datatables/vfs_fonts.js')}}"></script>
        <script src="{{ asset('assets/vendors/js/datatables/buttons.print.min.js')}}"></script>
        <script src="{{ asset('assets/vendors/js/nicescroll/nicescroll.min.js')}}"></script>
        <script src="{{ asset('assets/vendors/js/app/app.min.js')}}"></script>
        <!-- End Page Vendor Js -->
        <!-- Begin Page Snippets -->
        <script src="{{ asset('assets/js/components/tables/tables.js')}}"></script>
        <script src="{{ asset('assets/vendors/js/noty/noty.min.js') }}"></script>
        <!-- End Page Snippets -->
        <script type="text/javascript">
        	$(function () {
        		$('#sorting-table').DataTable();


                $('.payment_confirm').on('click',function(e){
                    e.preventDefault();
                    var id = $(this).data('id');
                    var _token = $('meta[name="csrf-token"]').attr('content');

                    if(confirm('Are You Sure')){
                      //console.log(id);
                      $.ajax({
                        url: '{{ route('updatePaymentStatus') }}',
                        type: 'POST',
                        data: {id:id,_token:_token},
                        dataType:'json',
                        success: function(data){
                          //console.log(data);
                          new Noty({type:"notification",layout:"bottomRight",text:"PaymentUpdated",closeWith:["click","button"],progressBar:true,timeout:2500,animation:{open:"animated bounceInDown",close:"animated bounceOutDown"}}).show();

                        }
                      });
                    }



                });


                $('.Modal_switch').on('click',function(){

                    var id = $(this).data('id');
                    var _token = $('meta[name="csrf-token"]').attr('content');
                    console.log(id,_token);

                    $.ajax({
                        url: '{{ route('getdatabyid') }}',
                        type:'POST',
                        data: {id:id,_token:_token},
                        dataType:'json',
                        success: function(data){
                            //console.log(data);
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
                          $('#d1da').html(data.d1da);
                          $('#d2la').html(data.d2la);
                          $('#d2da').html(data.d2da);
                          $('#driver').html(data.driver);
                          $('#total_amount').html(data.total_amount);
                          $('#payment_method').html(data.payment_method);
                          $('#added_by').html(data.added_by);
                        }
                    });


                });






        	});



        </script>
@endsection