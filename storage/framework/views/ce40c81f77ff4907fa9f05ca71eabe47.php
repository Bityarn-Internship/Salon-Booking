

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('MPESA Confirmation'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('/assets/libs/owl.carousel/assets/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('/assets/libs/owl.carousel/assets/owl.theme.default.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

    <body class="auth-body-bg">
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>

        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-xl-5 mx-auto">
                        <div class="auth-full-page-content p-md-5 p-4">
                            <div class="w-100">

                                <div class="d-flex flex-column h-100">
                                    <div class="my-auto">
                                        <div>
                                            <h5 class="text-primary text-center">Make a Deposit Payment</h5>
                                        </div>

                                        <div class="mt-4 text-center">
                                        
                                            <p class="mt-0">Hello <?php echo e(\App\Http\Controllers\UsersController::getClientName($clientID)); ?>,</br>Thank you for booking with us.</p>
                                            <h4 class="card-title mt-0"><b>Your Requested Services:</b></h4>
                                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <p><?php echo e($service->name.': '.$service->cost); ?>KSH</p>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <p></p>
                                                <p>Total Cost: <?php echo e($cost); ?>KSH</p>
                                            <p>To confirm your booking you need to make a <b>20%</b> deposit payment of your booked services cost.</p>
                                            <br>
                                            <p><b>Deposit Cost: <?php echo e((0.2 * $cost)); ?>KSH</b></p>
                                            
                                            <form action="<?php echo e(url('/payment')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="bookingID" value="<?php echo e($bookingID); ?>">
                                                <input type="hidden" name="cost" value="<?php echo e((0.2 * $cost)); ?>">
                                                <div class="d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light"
                                                        type="submit">Pay with Paypal</button>
                                                </div>
                                            </form>

                                            <br/>
                                            <form action = "<?php echo e(url('/mpesaPayment')); ?>" method = "POST">
                                                <?php echo csrf_field(); ?>
                                                <input hidden value = "<?php echo e($bookingID); ?>" name = "bookingID">
                                                <input hidden value = "<?php echo e($cost); ?>" name = "cost">
                                                <div class="d-grid">
                                                    <button class="btn btn-success waves-effect waves-light"
                                                        type="submit">Pay with MPESA</button>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </div>

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
        <!-- owl.carousel js -->
        <script src="<?php echo e(URL::asset('/assets/libs/owl.carousel/owl.carousel.min.js')); ?>"></script>
        <!-- auth-2-carousel init -->
        <script src="<?php echo e(URL::asset('/assets/js/pages/auth-2-carousel.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Projects\Bityarn\salonBooking\resources\views//custom/payments/depositPayment.blade.php ENDPATH**/ ?>