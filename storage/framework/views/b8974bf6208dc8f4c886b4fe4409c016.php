

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Employee Services'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('/assets/libs/owl.carousel/assets/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('/assets/libs/owl.carousel/assets/owl.theme.default.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

    <body class="auth-body-bg">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">

                <div class="col-xl-5 mx-auto">
                    <div class="auth-full-page-content p-md-5 p-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100">
                               
                                <div class="my-auto">
                                    <div>
                                        <h5 class = "text-primary text-center">Assign Employee Service</h5>
                                    </div>

                                    <div class="mt-4">
                                        <form action = "<?php echo e(url('/employeeServices')); ?>" method = "post" enctype="multipart/form-data">
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
                                                    <label for="formrow-inputState" class="form-label">Employee Name</label>
                                                    <select id="formrow-inputState" class="form-select" name = "employeeID">
                                                        <option disabled selected>Select the employee</option>
                                                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->firstName." ".$employee->lastName); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>

                                                    <div class="invalid-feedback">
                                                        <?php if($errors->has('employeeID')): ?>
                                                            <?php echo e($errors->first('employeeID')); ?>

                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 pt-2">
                                                    <label for="formrow-inputState" class="form-label">Service</label>
                                                    <select id="formrow-inputState" class="form-select" name = "serviceID">
                                                        <option disabled selected>Select the service employee offers</option>
                                                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($service->id); ?>"><?php echo e($service->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>

                                                    <div class="invalid-feedback">
                                                        <?php if($errors->has('serviceID')): ?>
                                                            <?php echo e($errors->first('serviceID')); ?>

                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="mt-4 d-grid">
                                                <button class="btn btn-primary waves-effect waves-light"
                                                        type="submit">Assign</button>
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

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Projects\Bityarn\salonBooking\resources\views/custom/employeeServices/employeeService.blade.php ENDPATH**/ ?>