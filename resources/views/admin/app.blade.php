<!DOCTYPE html>
<html>
<head>
@include('admin.partials.head')


</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

 @include('admin.partials.header')

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
@include('admin.partials.sidebar')
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('admin.partials.message')
    <!-- Content Header (Page header) -->
    @section('main_content')
      @show

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('admin.partials.footer')

</body>
</html>
