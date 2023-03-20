

<?php $__env->startSection('content'); ?>


    <div class="row mx-2 my-2">
        <div class="col-md-6">

            <!-- Simple card -->
            <center>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mt-0">Complete Payment</h4>
                        <p>Hello <?php echo e(\App\Http\Controllers\UsersController::getClientName($clientID)); ?>,
                            </br>Thank you for booking with us and coming.</p>
                                <div class = "text-center">
                                    <h4 class="card-title mt-0"><b>Your Services</b></h4>
                                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p><?php echo e($service->name.': '.$service->cost); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <p></p>
                                    <p>Amount Paid: <?php echo e($total - $balance); ?></p>
                                    <p>Total Cost: <?php echo e($total); ?></p>
                                </div>

                                <p>You have already paid a total of <?php echo e($total - $balance); ?></p>
                                <br><p>Balance to be paid: <?php echo e($balance); ?></p>
                        <form action="<?php echo e(url('/payment')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="bookingID" value="<?php echo e($bookingID); ?>">
                            <input hidden value = "<?php echo e($balance); ?>" name = "cost">
                            <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Pay with Paypal</button>
                                </div>
                        </form>
                        <form action = "<?php echo e(url('/completeMpesaPayment')); ?>" method = "POST">
                            <?php echo csrf_field(); ?>
                            <input hidden value = "<?php echo e($bookingID); ?>" name = "bookingID">
                            <input hidden value = "<?php echo e($balance); ?>" name = "balance">
                            <div>
                               <button type="submit" class="btn btn-success w-md">Pay with Mpesa</button>
                            </div>
                        </form>
                        <form action = "<?php echo e(url('/completeCashPayment')); ?>" method = "POST">
                            <?php echo csrf_field(); ?>
                            <input hidden value = "<?php echo e($bookingID); ?>" name = "bookingID">
                            <input hidden value = "<?php echo e($balance); ?>" name = "amount">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Pay with Cash</button>
                            </div>
                        </form>


                    </div>
                </div>
            </center>
        </div>
    </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- masonry pkgd -->
    <script src="<?php echo e(URL::asset('/assets/libs/masonry-layout/masonry.pkgd.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>













































































<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Projects\Bityarn\salonBooking\resources\views/completePayment.blade.php ENDPATH**/ ?>