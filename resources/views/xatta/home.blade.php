<!DOCTYPE html>
<html lang="en">
    <head>
     @include('admin.partials.head')
    </head>
    <body id="page-top">
        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas">
                <img src="assets/img/logo.png" alt="logo" class="loader-logo">
                <div class="spinner"></div>   
            </div>
        </div>
        <!-- End Preloader -->
        <div class="page">
            <!-- Begin Header -->
            <header class="header">
             @include('admin.partials.header')
            </header>
            <!-- End Header -->
            <!-- Begin Page Content -->
            <div class="page-content d-flex align-items-stretch">
                <div class="default-sidebar">
                    <!-- Begin Side Navbar -->
                    @include('admin.partials.sidebar')
                    <!-- End Side Navbar -->
                </div>
                <!-- End Left Sidebar -->
                <div class="content-inner">


                    @if(session()->has('message'))
                        <div class="widget-body">
                            <div class="alert alert-primary alert-dissmissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                <strong>Hey!</strong> {{ session('message') }}
                            </div>
                        </div>
                    @endif
                    <div class="container-fluid">
                        @section('main_content')
                            @show
                    </div>
                    <!-- End Container -->

                    <!-- Begin Page Footer-->
                  @include('admin.partials.footer')
        <!-- End Page Snippets -->
    </body>
</html>