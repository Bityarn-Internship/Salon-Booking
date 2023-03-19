<?php $__env->startSection('content'); ?>


        <div class="row mx-2 my-2">
                <div class="col-md-6">

                    <!-- Simple card -->
<center>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mt-0">Make a Deposit Payment</h4>
                            <p class="card-title mt-0">Hello <?php echo e(Auth::user()->firstName." ".Auth::user()->lastName); ?>,</br>Thank you for booking with us.</p>
                            <h4 class="card-title mt-0"><b>Your Requested Services:</b></h4>
                              <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p><?php echo e($service->name.': '.$service->cost); ?>KSH</p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <p></p>
                                <p>Total Cost: <?php echo e($cost); ?>KSH</p>
                            <p>To confirm your booking you need to make a <b>20%</b> deposit payment of your booked services cost.</p>
                            <br>
                            <p><b>Deposit Cost: <?php echo e((0.2 * $cost)); ?>KSH</b></p>

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




<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BITYARN\Salon-Booking\resources\views//depositPayment.blade.php ENDPATH**/ ?>