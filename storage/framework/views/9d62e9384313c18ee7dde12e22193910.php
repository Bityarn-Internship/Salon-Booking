

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Employee Services'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('/assets/libs/owl.carousel/assets/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('/assets/libs/owl.carousel/assets/owl.theme.default.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">

                <div class="col-xl-5 mx-auto">
                    <div class="auth-full-page-content p-md-5 p-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100">

                                <div>
                                    <div>
                                        <h5 class = "text-primary text-center">Book another service</h5>
                                    </div>

                                    <div class="mt-4">
                                        <form action = "<?php echo e(url('/bookService')); ?>" method = "post" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class = "row">
                                                
                                                <?php if(session()->has('message')): ?>
                                                    <div class = "alert alert-info" role = "alert">
                                                        <?php echo e(session()->get('message')); ?>

                                                    </div>
                                                <?php endif; ?>
                    
                                            </div>
                                            <div class = "row">
                                                <div class="col-md-12">
                                                    <?php if($errors->has('bookingID')): ?>
                                                        <div class = "alert alert-danger" role = "alert">
                                                            <?php echo e($errors->first('bookingID')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingnameInput" value="<?php echo e($bookingID); ?>"  name="bookingID" readonly>
                                                        <label for="floatingnameInput">Booking ID</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class = "row">
                                                <div class="col-md-12 pt-2">
                                                    <?php if($errors->has('employeeServiceID')): ?>
                                                        <div class = "alert alert-danger" role = "alert">
                                                            <?php echo e($errors->first('employeeServiceID')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name = "employeeServiceID">
                                                            <option selected disabled>Select the employee and service</option>
                                                            <?php $__currentLoopData = $employeeServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employeeService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($employeeService->id); ?>"><?php echo e(\App\Http\Controllers\EmployeesController::getEmployeeName($employeeService->employeeID).' -> '.\App\Http\Controllers\ServicesController::getServiceName($employeeService->serviceID)); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <label for="floatingSelectGrid">Select Employee and Service</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 d-grid">
                                                <button class="btn btn-primary waves-effect waves-light"
                                                        type="submit">Submit</button>
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
<?php echo $__env->make('custom.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Projects\Bityarn\salonBooking\resources\views/custom/bookedServices/bookService.blade.php ENDPATH**/ ?>