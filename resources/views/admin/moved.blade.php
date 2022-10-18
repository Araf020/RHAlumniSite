@extends('admin.app')
@section('extra_css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection


@section('main_content')

<section class="content-header">
  <h1>
     Moved Submission
    <small>it all starts here</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Orders awating for manual approval</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>Order ID</th>
              <th>Order Status</th>
              <th>Name</th>
              <th>Email</th>
              <th>Amount(method)</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($alldata as $single_data)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $single_data->order_id }}</td>
                <td><span class="label label-{{ ($single_data->order_status == 'Processing' || $single_data->order_status == 'Complete') ? 'success' : 'danger'  }}">{{ $single_data->order_status }}</span></td>
                <td>{{ $single_data->name }}</td>
                <td>{{ $single_data->email }}</td>
                <td>{{ $single_data->total_amount }}({{ $single_data->payment_method }})</td>
                <td>{{ $single_data->created_at  }}</td>
                <td>
                  <a href="#" data-id={{ $single_data->id }} class="btn btn-primary payment_check"><i class="fa fa-check"></i></a>
                  <a href="#" data-id='{{ $single_data->id }}' data-type='temp' class="btn btn-primary modal_switch" data-toggle="modal" data-target="#modal-default"><i class="fa fa-eye"></i></a>
                </td>
              </tr>
            @endforeach 

            </tbody>
            <tfoot>
            <tr>
              <th>#</th>
              <th>Order ID</th>
              <th>Order Status</th>
              <th>Name</th>
              <th>Email</th>
              <th>Amount(method)</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->


<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Default Modal</h4>
      </div>
      <div class="modal-body">
        <div id="bank_statement" style="display: none;">
          <h3>Bank Statement</h3>
          <p>Bank Name: <strong><span id="bankname"></span></strong></p>
          <p>Bank Branch: <strong><span id="bankBranch"></span></strong></p>
          <p>Payment Date: <strong><span id="paymentdate"></span></strong></p>
          <p>Scroll No: <strong><span id="scrollNo"></span></strong></p>
          <hr>
        </div>
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

       <p>14th Feb Lunch: <strong><span id="d1la"></span></strong></p>
       <p>14th Feb Dinner: <strong><span id="d1da"></span></strong></p>
       <p>15th Feb Lunch: <strong><span id="d2la"></span></strong></p>
       <p>15th Feb Dinner: <strong><span id="d2da"></span></strong></p>
       <p>15th Feb Driver's Dinner: <strong><span id="driver"></span></strong></p>
       <p>Total: <strong><span id="total_amount"></span></strong></p>
       <p>payment Method: <strong><span id="payment_method"></span></strong></p>
       <p>Added By: <strong><span id="added_by"></span></strong></p>
       <p>T Shirt Size: <strong><span id="t_shirt"></span></strong></p>
       <img src="" id="image" height="100" width="auto">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->




@endsection

@section('extra_js')

<!-- DataTables -->
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $('#example1').DataTable({
      // "order": [[ 0, "desc" ]]
    });
    $('#example2').DataTable({
      // "order": [[ 0, "desc" ]]
    });


    $('.modal_switch').on('click',function(){

        var id = $(this).data('id');
        var type = $(this).data('type');
        var _token = $('meta[name="csrf-token"]').attr('content');
        //console.log(id,_token,type);

        $.ajax({
            url: '{{ route('getdatabyid.moved') }}',
            type:'POST',
            data: {id:id,_token:_token,type:type},
            dataType:'json',
            success: function(data){
                console.log(data);
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
              $('#d2la').html(data.d2la);
              $('#d2da').html(data.d2da);
              $('#driver').html(data.driver);
              $('#total_amount').html(data.total_amount);
              $('#payment_method').html(data.payment_method);
              $('#added_by').html(data.added_by);
              $('#t_shirt').html(data.t_shirt);
              $('#image').attr('src','/storage/images/'+data.image);
            }
        });
    });

    $('#example1 tbody').on('click', '.payment_check', function () {
    // alert("you activate the event");


          if(confirm('Are Your sure !!')){
            var id = $(this).data('id');
            var _token = $('meta[name="csrf-token"]').attr('content');
            //console.log(id,_token);

            $.ajax({
                url: '{{ route('updateMovedStatus') }}',
                type:'POST',
                data: {id:id,_token:_token},
                dataType:'json',
                beforeSend: function(){
                  $.notify({
                    // options
                    message: 'Please Wait, The order is processing', 
                  },{
                    // settings
                    type: 'success',
                    allow_dismiss: false,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                      },
                  });
                },
                success: function(data){
                    console.log(data);
                    if(data.message == 'success')
                    {
                      //window.location = '';
                      location.reload();
                    }
                },
            });
          }
    });

    // $('.payment_check').on('click',function(){
    //   if(confirm('Are Your sure !!')){
    //     var id = $(this).data('id');
    //     var _token = $('meta[name="csrf-token"]').attr('content');
    //     //console.log(id,_token);

    //     $.ajax({
    //         url: '',
    //         type:'POST',
    //         data: {id:id,_token:_token},
    //         dataType:'json',
    //         beforeSend: function(){
    //           $.notify({
    //             // options
    //             message: 'Please Wait, The order is processing', 
    //           },{
    //             // settings
    //             type: 'success',
    //             allow_dismiss: false,
    //             animate: {
    //                 enter: 'animated fadeInDown',
    //                 exit: 'animated fadeOutUp'
    //               },
    //           });
    //         },
    //         success: function(data){
    //             console.log(data);
    //             if(data.message == 'success')
    //             {
    //               //window.location = '';
    //               location.reload();
    //             }
    //         },
    //     });
    //   }


    // });




  })
</script>


@endsection