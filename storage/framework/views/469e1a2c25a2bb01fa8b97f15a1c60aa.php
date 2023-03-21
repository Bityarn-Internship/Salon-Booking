<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Services'); ?>
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
                                            <h5 class="text-primary text-center">Edit Employee</h5>
                                        </div>
                                        <div class="mt-4">
                                            <form action = "<?php echo e(url('/updateEmployee/'.$employee->id)); ?>" method = "post" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <div class="row">
                                                    <?php if(session()->has('message')): ?>
                                                        <div class="valid-feedback">
                                                            <?php echo e(session()->get('message')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 pt-2">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingnameInput" value = "<?php echo e($employee->firstName); ?>" name = "firstName">
                                                            <label for="floatingnameInput">First Name</label>
                                                        </div>

                                                        <div class="invalid-feedback">
                                                            <?php if($errors->has('firstName')): ?>
                                                                <?php echo e($errors->first('firstName')); ?>

                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12 pt-2">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingnameInput" value = "<?php echo e($employee->lastName); ?>" name = "lastName">
                                                            <label for="floatingnameInput">Last Name</label>
                                                        </div>

                                                        <div class="invalid-feedback">
                                                            <?php if($errors->has('lastName')): ?>
                                                                <?php echo e($errors->first('lastName')); ?>

                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12 pt-2">
                                                        <div class="form-floating mb-3">
                                                            <input type="email" class="form-control" id="floatingnameInput" value = "<?php echo e($employee->email); ?>" name = "email">
                                                            <label for="floatingnameInput">Email Address</label>
                                                        </div>

                                                        <div class="invalid-feedback">
                                                            <?php if($errors->has('email')): ?>
                                                                <?php echo e($errors->first('email')); ?>

                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12 pt-2">
                                                        <div class="form-floating mb-3">
                                                            <input type="tel" class="form-control" id="floatingnameInput" value = "<?php echo e($employee->telephoneNumber); ?>" name = "telephoneNumber">
                                                            <label for="floatingnameInput">Telephone Number</label>
                                                        </div>

                                                        <div class="invalid-feedback">
                                                            <?php if($errors->has('telephoneNumber')): ?>
                                                                <?php echo e($errors->first('telephoneNumber')); ?>

                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12 pt-2">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingnameInput" value = "<?php echo e($employee->IDNumber); ?>" name = "IDNumber">
                                                            <label for="floatingnameInput">ID Number / Passport Number</label>
                                                        </div>

                                                        <div class="invalid-feedback">
                                                            <?php if($errors->has('IDNumber')): ?>
                                                                <?php echo e($errors->first('IDNumber')); ?>

                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class = "row">
                                                    <div class="col-md-12 pt-2">
                                                        <div class="form-floating mb-3">
                                                            <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name = "positionID">
                                                                <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($position->id); ?>"><?php echo e($position->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            <label for="floatingSelectGrid">Select a position</label>
                                                            <div class="invalid-feedback">
                                                                <?php if($errors->has('positionID')): ?>
                                                                    <?php echo e($errors->first('positionID')); ?>

                                                                <?php endif; ?>
                                                            </div>
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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('custom.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BITYARN\Salon-Booking\resources\views/custom/auth/editEmployee.blade.php ENDPATH**/ ?>