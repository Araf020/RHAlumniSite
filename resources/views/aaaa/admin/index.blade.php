@extends('admin.home')


@section('extra_css')


@endsection


@section('main_content')

  <!-- Begin Row/Widget 12 -->
  <div class="row flex-row">
      
      <!-- Begin Facebook -->
      <div class="col-xl-3 col-md-6 col-sm-6">
          <div class="widget widget-12 has-shadow">
              <div class="widget-body">
                  <div class="media">
                      <div class="media-body align-self-center">
                          <div class="title">Total Registered</div>
                          <div class="number">{{ $total_reg }}</div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- End Facebook -->
      
      <!-- Begin Facebook -->
      <div class="col-xl-3 col-md-6 col-sm-6">
          <div class="widget widget-12 has-shadow">
              <div class="widget-body">
                  <div class="media">
                      <div class="media-body align-self-center">
                          <div class="title">14 Feb Dinner</div>
                          <div class="number">{{ $_14_din }}</div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- End Facebook -->
      
      <!-- Begin Facebook -->
      <div class="col-xl-3 col-md-6 col-sm-6">
          <div class="widget widget-12 has-shadow">
              <div class="widget-body">
                  <div class="media">
                      <div class="media-body align-self-center">
                          <div class="title">15 Feb Lunch</div>
                          <div class="number">{{ $_15_lun }}</div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- End Facebook -->
      
      <!-- Begin Facebook -->
      <div class="col-xl-3 col-md-6 col-sm-6">
          <div class="widget widget-12 has-shadow">
              <div class="widget-body">
                  <div class="media">
                      <div class="media-body align-self-center">
                          <div class="title">15 Feb Dinner</div>
                          <div class="number">{{ $_15_din }}</div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- End Facebook -->
      
      <!-- Begin Facebook -->
      <div class="col-xl-3 col-md-6 col-sm-6">
          <div class="widget widget-12 has-shadow">
              <div class="widget-body">
                  <div class="media">
                      <div class="media-body align-self-center">
                          <div class="title">Driver's Dinner</div>
                          <div class="number">{{ $_15_dri }}</div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- End Facebook -->

      <!-- Begin Facebook -->
      <div class="col-xl-3 col-md-6 col-sm-6">
          <div class="widget widget-12 has-shadow">
              <div class="widget-body">
                  <div class="media">
                      <div class="media-body align-self-center">
                          <div class="title">Total Cash</div>
                          <div class="number">{{ $total }}</div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- End Facebook -->

  </div>
  <!-- End Row/Widget 12 -->


@endsection


@section('extra_js')

@endsection