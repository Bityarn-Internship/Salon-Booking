<!doctype html>
<head>
    <meta charset="utf-8" />
    <title>Salon</title>
   
    <!-- App favicon -->
    @include('layouts.head-css')
</head>

 <div id="layout-wrapper">
      
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        
        </div>
        <!-- end main content-->
    </div>
   