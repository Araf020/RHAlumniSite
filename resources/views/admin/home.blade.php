@extends('admin.app')



@section('main_content')

<section class="content-header">
  <h1>
    Admin Home
    <small>it all starts here</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">

	<!-- Small boxes (Stat box) -->
	<div class="row">


	  <div class="col-lg-3 col-xs-6">
	    <!-- small box -->
	    <div class="small-box bg-aqua">
	      <div class="inner">
	        <h3>{{ $total_reg }}</h3>

	        <p>Total Participant</p>
	      </div>
	      <div class="icon">
	        <i class="ion ion-bag"></i>
	      </div>
	      <a href="{{ route('alldata') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	    </div>
	  </div>
	  <!-- ./col -->

	  <div class="col-lg-3 col-xs-6">
	    <!-- small box -->
	    <div class="small-box bg-aqua">
	      <div class="inner">
	        <h3>{{ $failed }}</h3>

	        <p>Failed Transaction</p>
	      </div>
	      <div class="icon">
	        <i class="ion ion-bag"></i>
	      </div>
	      <a href="{{ route('failed') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	    </div>
	  </div>
	  <!-- ./col -->

	  <div class="col-lg-3 col-xs-6">
	    <!-- small box -->
	    <div class="small-box bg-aqua">
	      <div class="inner">
	        <h3>{{ $pending }}</h3>

	        <p>Online Pending Transaction</p>
	      </div>
	      <div class="icon">
	        <i class="ion ion-bag"></i>
	      </div>
	      <a href="{{ route('onlinePending') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	    </div>
	  </div>
	  <!-- ./col -->

	  <div class="col-lg-3 col-xs-6">
	    <!-- small box -->
	    <div class="small-box bg-aqua">
	      <div class="inner">
	        <h3>{{ $approval }}</h3>

	        <p>Awating Approval</p>
	      </div>
	      <div class="icon">
	        <i class="ion ion-bag"></i>
	      </div>
	      <a href="{{ route('pending') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	    </div>
	  </div>
	  <!-- ./col -->
	  <hr>

	  <div class="col-lg-3 col-xs-6">
	    <!-- small box -->
	    <div class="small-box bg-aqua">
	      <div class="inner">
	        <h3>{{ $_14_lun }}</h3>

	        <p>Lunch</p>
	      </div>
	      <div class="icon">
	        <i class="ion ion-bag"></i>
	      </div>
	      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	    </div>
	  </div>
	  <!-- ./col -->

	  <div class="col-lg-3 col-xs-6">
	    <!-- small box -->
	    <div class="small-box bg-aqua">
	      <div class="inner">
	        <h3>{{ $_14_din }}</h3>

	        <p>Dinner</p>
	      </div>
	      <div class="icon">
	        <i class="ion ion-bag"></i>
	      </div>
	      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	    </div>
	  </div>
	  <!-- ./col -->


	  {{-- <div class="col-lg-3 col-xs-6">
	    <!-- small box -->
	    <div class="small-box bg-aqua">
	      <div class="inner">
	        <h3>{{ $_15_lun }}</h3>

	        <p>15 FEB Lunch</p>
	      </div>
	      <div class="icon">
	        <i class="ion ion-bag"></i>
	      </div>
	      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	    </div>
	  </div>
	  <!-- ./col -->

	  <div class="col-lg-3 col-xs-6">
	    <!-- small box -->
	    <div class="small-box bg-aqua">
	      <div class="inner">
	        <h3>{{ $_15_din }}</h3>

	        <p>15 FEB Gr.Dinner</p>
	      </div>
	      <div class="icon">
	        <i class="ion ion-bag"></i>
	      </div>
	      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	    </div>
	  </div>
	  <!-- ./col --> --}}

	  <div class="col-lg-3 col-xs-6">
	    <!-- small box -->
	    <div class="small-box bg-aqua">
	      <div class="inner">
	        <h3>{{ $_15_dri }}</h3>

	        <p>Driver Dinner</p>
	      </div>
	      <div class="icon">
	        <i class="ion ion-bag"></i>
	      </div>
	      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	    </div>
	  </div>
	  <!-- ./col -->

	  @foreach ($t_shirt as $single_tshirt)
		  <div class="col-lg-3 col-xs-6">
		    <!-- small box -->
		    <div class="small-box bg-aqua">
		      <div class="inner">
		        <h3>{{ $single_tshirt->number }}</h3>

		        <p>T Shirt Size : {{ $single_tshirt->tshirt }}</p>
		      </div>
		      <div class="icon">
		        <i class="ion ion-bag"></i>
		      </div>
		      <a href="{{ route('alldata') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		    </div>
		  </div>
		  <!-- ./col -->
	  @endforeach


	  <div class="col-lg-3 col-xs-6">
	    <!-- small box -->
	    <div class="small-box bg-aqua">
	      <div class="inner">
	        <h3>{{ $total }}</h3>

	        <p>Total Amount</p>
	      </div>
	      <div class="icon">
	        <i class="ion ion-bag"></i>
	      </div>
	      <a href="{{ route('alldata') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	    </div>
	  </div>
	  <!-- ./col -->

	  <div class="col-lg-3 col-xs-6">
	    <!-- small box -->
	    <div class="small-box bg-aqua">
	      <div class="inner">
	        <h3>{{ $total_online }}</h3>

	        <p>Total Online Amount</p>
	      </div>
	      <div class="icon">
	        <i class="ion ion-bag"></i>
	      </div>
	      <a href="{{ route('alldata') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	    </div>
	  </div>
	  <!-- ./col -->

	  <div class="col-lg-3 col-xs-6">
	    <!-- small box -->
	    <div class="small-box bg-aqua">
	      <div class="inner">
	        <h3>{{ $total_bank }}</h3>

	        <p>Total Bank Amount</p>
	      </div>
	      <div class="icon">
	        <i class="ion ion-bag"></i>
	      </div>
	      <a href="{{ route('alldata') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	    </div>
	  </div>
	  <!-- ./col -->

	  <div class="col-lg-3 col-xs-6">
	    <!-- small box -->
	    <div class="small-box bg-aqua">
	      <div class="inner">
	        <h3>{{ $total_cash }}</h3>

	        <p>Total Cash Amount</p>
	      </div>
	      <div class="icon">
	        <i class="ion ion-bag"></i>
	      </div>
	      <a href="{{ route('alldata') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	    </div>
	  </div>
	  <!-- ./col -->

	  <div class="col-lg-3 col-xs-6">
	    <!-- small box -->
	    <div class="small-box bg-aqua">
	      <div class="inner">
	        <h3>{{ $moved_data }}</h3>

	        <p>Total Moved</p>
	      </div>
	      <div class="icon">
	        <i class="ion ion-bag"></i>
	      </div>
	      <a href="{{ route('movedentry') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	    </div>
	  </div>
	  <!-- ./col -->


	</div>
	<!-- /.row -->

</section>

@endsection


@section('extra_js')

<script>
  $(function () {







  })
</script>


@endsection
