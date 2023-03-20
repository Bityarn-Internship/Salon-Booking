

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
                                            <h5 class="text-primary text-center">MPESA Confirmation</h5>
                                        </div>

                                        <div class="mt-4">
                                            <form action = "<?php echo e(url('/checkTransaction')); ?>" method = "post" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <div class="row">
                                                    <?php if(session()->has('message')): ?>
                                                        <div class="valid-feedback">
                                                            <?php echo e(session()->get('message')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 pt-2">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingnameInput" placeholder="Enter the transaction code..." name = "transaction">
                                                            <label for="floatingnameInput">Transaction Code</label>
                                                        </div>

                                                        <div class="invalid-feedback">
                                                            <?php if($errors->has('transaction')): ?>
                                                                <?php echo e($errors->first('transaction')); ?>

                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 pt-2">
                                                        <input hidden value = "<?php echo e($bookingID); ?>" name = "bookingID">
                                                        <div class="invalid-feedback">
                                                            <?php if($errors->has('bookingID')): ?>
                                                                <?php echo e($errors->first('bookingID')); ?>

                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="mt-4 d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light"
                                                        type="submit">Confirm</button>
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

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Projects\Bityarn\salonBooking\resources\views/custom/payments/mpesaConfirmation.blade.php ENDPATH**/ ?>