@extends('admin.app')
@section('extra_css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection


@section('main_content')

<section class="content-header">
  <h1>
    All Submission
    <small>it all starts here</small>
    @if (count($data) > 0)
      <a href="{{ route('currentStudentxl') }}" class="btn btn-success float-right">Download Excell</a>
    @endif
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Current Student</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Student Id</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Allotment</th>
              <th>room_no</th>
              <th>t_shirt</th>
              <th>gdinner_status</th>
              <th>Date</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($data as $single_data)
	            <tr>
	              <td>{{ $loop->index + 1 }}</td>
                <td>{{ $single_data->name }}</td>
	              <td>{{ $single_data->student_id }}</td>
	              <td>{{ $single_data->phone }}</td>
                <td>{{ $single_data->email }}</td>
	              <td>{{ $single_data->allotment }}</td>
                <td>{{ $single_data->room_no }}</td>
                <td>{{ $single_data->t_shirt }}</td>
                <td>{{ $single_data->gdinner_status }}</td>
	              <td>{{ $single_data->created_at }}</td>
	            </tr>
            @endforeach	

            </tbody>
            <tfoot>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Student Id</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Allotment</th>
              <th>room_no</th>
              <th>t_shirt</th>
              <th>gdinner_status</th>
              <th>Date</th>
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






@endsection

@section('extra_js')

<!-- DataTables -->
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    
    $('#example2').DataTable({
      // "order": [[ 0, "desc" ]]
    });


  })
</script>


@endsection