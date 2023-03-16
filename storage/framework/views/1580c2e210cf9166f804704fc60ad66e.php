


<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>


<div class="row">
    <div class="col-xl-6">
        <div class="card d-flex justify-content-center">
            <div class="card-body">
                <h5 class="card-title text-center">Booking Details</h5>
                <form action = "<?php echo e(url('/updateBooking/'.$booking->id)); ?>" method = "post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input hidden name = "bookingID" value = "<?php echo e($booking->id); ?>">
                                <input type="text" class="form-control" id="floatingnameInput" value="<?php echo e(\App\Http\Controllers\UsersController::getClientName($booking->clientID)); ?>" name="name" readonly>
                                <label for="floatingnameInput">Client Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div>
                                <label for="date">Date</label>
                                <input type="date" name="date" value = "<?php echo e($booking->date); ?>">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div>
                                <label for="time">Time</label>
                                <input type="time" name="time" value = "<?php echo e($booking->time); ?>">
                            </div>
                        </div>
                    </div>
                    
                    <center>
                        <div>
                            <button type="submit" class="btn btn-primary w-md">Save</button>
                        </div>
                    </center>
                </form>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BITYARN\Salon-Booking\resources\views/editBooking.blade.php ENDPATH**/ ?>