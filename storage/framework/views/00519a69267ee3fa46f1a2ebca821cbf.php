<?php $__env->startSection('content'); ?>


    <form action="<?php echo e(url('/bookEmployee')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input hidden value = "<?php echo e($bookingID); ?>" name = "bookingID">
    <center>
        <div class="row mx-5 mt-5 mb-0">
            <?php $__currentLoopData = $employeeServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employeeService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 col-xl-4">

            <!-- Simple card -->
            <div class="card mt-5 ">
                <img style="height: 300px;"  class="card-img-top img-fluid w-40 p-3 h-10" src="<?php echo e(URL::asset('/assets/images/employee.png')); ?>" alt="Card image cap">
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
    <button type="submit" class="btn btn-primary waves-effect waves-light mt-0 mb-2">Submit</button>
    </center>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- masonry pkgd -->
    <script src="<?php echo e(URL::asset('/assets/libs/masonry-layout/masonry.pkgd.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>



























<?php echo $__env->make('custom.common.master-client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BITYARN\Salon-Booking\resources\views/custom/employeeServices/bookEmployeeServices.blade.php ENDPATH**/ ?>