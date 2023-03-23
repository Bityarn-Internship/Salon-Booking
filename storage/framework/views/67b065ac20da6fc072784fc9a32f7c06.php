

<?php $__env->startSection('content'); ?>


    <form action="<?php echo e(url('/bookEmployee')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input hidden value = "<?php echo e($bookingID); ?>" name = "bookingID">
    <center>
        <div class="row mx-5 mt-5 mb-1">
        <?php $__currentLoopData = $employeeServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employeeService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-6 col-xl-4">

            <!-- Simple card -->
            <div class="card mt-5">
                <img class="card-img-top img-fluid" src="<?php echo e(URL::asset('/assets/images/small/img-1.jpg')); ?>" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title mt-0">Employee Name: <span><?php echo e(\App\Http\Controllers\EmployeesController::getEmployeeName($employeeService->employeeID)); ?></span></h4>
                    <h4 class="card-title mt-0">Service Offered: <?php echo e(\App\Http\Controllers\ServicesController::getServiceName($employeeService->serviceID)); ?></h4>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" value = "<?php echo e($employeeService->id); ?>"name = "employeeServices[]">
                        <label class="form-check-label" for="flexSwitchCheckDefault">To choose this employee toggle the checkbox!</label>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </center>
    <center>
    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
    </center>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- masonry pkgd -->
    <script src="<?php echo e(URL::asset('/assets/libs/masonry-layout/masonry.pkgd.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>



























<?php echo $__env->make('custom.common.master-client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Projects\Bityarn\salonBooking\resources\views/custom/employeeServices/bookEmployeeServices.blade.php ENDPATH**/ ?>