


<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>


<div class="row">
    <div class="col-xl-6">
        <div class="card d-flex justify-content-center">
            <div class="card-body">
                <h5 class="card-title text-center">Complete Payment</h5>
                
                <p>Hello <?php echo e(\App\Http\Controllers\UsersController::getClientName($clientID)); ?>,

                </br>Thank you for booking with us and coming.</p>
                <div class = "text-center">
                    <h6 class = "card-title text-center">Your Services</h6>
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><?php echo e($service->name.': '.$service->cost); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <p></p>
                    <p>Amount Paid: <?php echo e($total - $balance); ?></p>
                    <p>Total Cost: <?php echo e($total); ?></p>
                </div>

                <p>You have already paid a total of <?php echo e($total - $balance); ?></p>
                <br><p>Balance to be paid: <?php echo e($balance); ?></p>

                <center>
                    <form action="<?php echo e(url('/payment')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="bookingID" value="<?php echo e($bookingID); ?>">
                        <input hidden value = "<?php echo e($balance); ?>" name = "cost">
                        <button type="submit" class="btn btn-primary w-md">Pay with paypal</button>
                    </form>
                    <form action = "<?php echo e(url('/completeMpesaPayment')); ?>" method = "POST">
                        <?php echo csrf_field(); ?>
                        <input hidden value = "<?php echo e($bookingID); ?>" name = "bookingID">
                        <input hidden value = "<?php echo e($balance); ?>" name = "balance">
                        <div>
                            <button type="submit" class="btn btn-success w-md">Pay with MPESA</button>
                        </div>
                    </form>
                    <form action = "<?php echo e(url('/completeCashPayment')); ?>" method = "POST">
                        <?php echo csrf_field(); ?>
                        <input hidden value = "<?php echo e($bookingID); ?>" name = "bookingID">
                        <input hidden value = "<?php echo e($balance); ?>" name = "amount">
                        <div><br/>
                            <button type="submit" class="btn btn-primary w-md">Paid with cash</button>
                        </div><br/>
                    </form>
                </center>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->

</div>
<!-- end row -->

    <!-- end col -->
</div>
<!-- end row -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Projects\Bityarn\Laravel Admin\Admin\resources\views/completePayment.blade.php ENDPATH**/ ?>