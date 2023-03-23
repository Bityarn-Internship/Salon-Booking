

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Booking'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('/assets/libs/owl.carousel/assets/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('/assets/libs/owl.carousel/assets/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
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
                                        <h5 class = "text-primary text-center">Edit Booking</h5>
                                    </div>

                                    <div class="mt-4">
                                        <form action = "<?php echo e(url('/updateBooking/'.$booking->bookedServiceID)); ?>" method = "post" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class = "row">
                                                <div class="valid-feedback">
                                                    <?php if(session()->has('message')): ?>
                                                        <?php echo e(session()->get('message')); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingemailInput" value = "<?php echo e($booking->bookingID); ?>"name = "bookingID" readonly>
                                                        <label for="floatingemailInput">Booking ID</label>
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        <?php if($errors->has('bookingID')): ?>
                                                            <?php echo e($errors->first('bookingID')); ?>

                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="date" class="form-control" id="floatingemailInput" value = "<?php echo e($booking->date); ?>" name = "date">
                                                        <label for="floatingemailInput">Date</label>
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        <?php if($errors->has('date')): ?>
                                                            <?php echo e($errors->first('date')); ?>

                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="time" class="form-control" id="floatingemailInput" value = "<?php echo e($booking->time); ?>" name = "time">
                                                        <label for="floatingemailInput">Time</label>
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        <?php if($errors->has('time')): ?>
                                                            <?php echo e($errors->first('time')); ?>

                                                        <?php endif; ?>
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
                                                            <option><?php echo e(\App\Http\Controllers\EmployeesController::getEmployeeName($booking->employeeID) .' -> '.\App\Http\Controllers\ServicesController::getServiceName($booking->serviceID)); ?></option>
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
                                                    type="submit">Save</button>
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
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('services')  // id
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('custom.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Projects\Bityarn\salonBooking\resources\views/custom/bookings/editBooking.blade.php ENDPATH**/ ?>