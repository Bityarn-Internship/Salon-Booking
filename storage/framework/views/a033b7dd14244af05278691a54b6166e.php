<!doctype html>
<head>
    <meta charset="utf-8" />
    <title>Salon</title>
   
    <!-- App favicon -->
    <?php echo $__env->make('layouts.head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

 <div id="layout-wrapper">
      
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        
        </div>
        <!-- end main content-->
    </div>
   <?php /**PATH D:\BITYARN\Salon-Booking\resources\views/layouts/master.blade.php ENDPATH**/ ?>