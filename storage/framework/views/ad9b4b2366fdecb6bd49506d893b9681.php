


<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>


<div class="row">
    <div class="col-xl-6">
        <div class="card d-flex justify-content-center">
            <div class="card-body">
                <h5 class="card-title text-center">Make a Deposit Payment</h5>
                <p>Hello <?php echo e(Auth::user()->firstName." ".Auth::user()->lastName); ?>,</br>Thank you for booking with us.</p>
                <div class = "text-center">
                    <h6 class = "card-title text-center">Your Services</h6>
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><?php echo e($service->name.': '.$service->cost); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <p></p>
                    <p>Total Cost: <?php echo e($cost); ?></p>
                </div>

                <p>To confirm your booking you need to make a 20% deposit payment of your booked services cost.</p>
                <br><p>Deposit Cost: <?php echo e((0.2 * $cost)); ?></p>

                <center>
                    <form action="<?php echo e(url('/payment')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="bookingID" value="<?php echo e($bookingID); ?>">
                        <input type="hidden" name="cost" value="<?php echo e((0.2 * $cost)); ?>">
                        <button type="submit" class="btn btn-primary w-md">Pay with paypal</button>
                    </form>

                    <br/>
                    <form action = "<?php echo e(url('/mpesaPayment')); ?>" method = "POST">
                        <?php echo csrf_field(); ?>
                        <input hidden value = "<?php echo e($bookingID); ?>" name = "bookingID">
                        <input hidden value = "<?php echo e($cost); ?>" name = "cost">
                        <div>
                            <button type="submit" class="btn btn-success w-md">Pay with MPESA</button>
                        </div>
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

<!-- end row -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BITYARN\Salon-Booking\resources\views//depositPayment.blade.php ENDPATH**/ ?>