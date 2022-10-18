<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{Auth::user()->name}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
          <li><a href="{{ route('admin') }}"><i class="fa fa-circle-o"></i>DashBoard</a></li>
          <li><a href="{{ route('alldata') }}"><i class="fa fa-circle-o"></i> All Data</a></li>
          <li><a href="{{ route('pending') }}"><i class="fa fa-circle-o"></i>Pending(Bank)</a></li>
          <li><a href="{{ route('onlinePending') }}"><i class="fa fa-circle-o"></i>Pending(Online)</a></li>
          <li><a href="{{ route('failed') }}"><i class="fa fa-circle-o"></i>Failed</a></li>
          <li><a href="{{ route('canceled') }}"><i class="fa fa-circle-o"></i>Canceled</a></li>
          <li><a href="{{ route('addnew') }}"><i class="fa fa-circle-o"></i> Add New</a></li>
          <li><a href="{{ route('changes') }}"><i class="fa fa-circle-o"></i>Changes</a></li>
          <li><a href="{{ route('currentStudent') }}"><i class="fa fa-circle-o"></i>Current Student</a></li>
          <li><a href="{{ route('movedentry') }}"><i class="fa fa-circle-o"></i>Moved Entry</a></li>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
