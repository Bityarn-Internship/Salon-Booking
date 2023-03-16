<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<style>
    .container2{
        margin: .1% 30% 3%;
        box-sizing: border-box;
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
        padding: 20px;
        overflow: hidden;

    }
</style>
        <div class="container2">
                <h3 class = "text-center">Make a Deposit Payment. </h3>
            <div class="form-outline mb-4">
                <p>Hello,<?php echo e(Auth::user()->firstName." ".Auth::user()->lastName); ?>,</br>Thank you for booking with us.</p>
                <div class = "text-center">
                    <h6 class = "card-title text-center"><b>Your Requested Services:</b></h6>
                  <b>  <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><?php echo e($service->name.': '.$service->cost); ?>KSH</p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <p></p>
                    <p>Total Cost: <?php echo e($cost); ?>KSH</p>
                  </b>
                </div>

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
            <!-- end card body -->
        </div>
        <!-- end card -->


<?php /**PATH D:\BITYARN\Salon-Booking\resources\views//depositPayment.blade.php ENDPATH**/ ?>