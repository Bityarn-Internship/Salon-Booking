

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Register'); ?> 2
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

                    <div class="col-xl-7">
                        <div class="auth-full-bg pt-lg-5 p-4">
                            <div class="w-100">
                                <div class="bg-overlay"></div>
                                <div class="d-flex h-100 flex-column">

                                    <div class="p-4 mt-auto">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-7">
                                                <div class="text-center">

                                                    <h4 class="mb-3"><i
                                                            class="bx bxs-quote-alt-left text-primary h1 align-middle me-3"></i><span
                                                            class="text-primary">5k</span>+ Satisfied clients</h4>

                                                    <div dir="ltr">
                                                        <div class="owl-carousel owl-theme auth-review-carousel"
                                                             id="auth-review-carousel">
                                                            <div class="item">
                                                                <div class="py-3">
                                                                    <p class="font-size-16 mb-4">" Fantastic theme with a
                                                                        ton of options. If you just want the HTML to
                                                                        integrate with your project, then this is the
                                                                        package. You can find the files in the 'dist'
                                                                        folder...no need to install git and all the other
                                                                        stuff the documentation talks about. "</p>

                                                                    <div>
                                                                        <h4 class="font-size-16 text-primary">Abs1981</h4>
                                                                        <p class="font-size-14 mb-0">- Skote User</p>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="item">
                                                                <div class="py-3">
                                                                    <p class="font-size-16 mb-4">" If Every Vendor on Envato
                                                                        are as supportive as Themesbrand, Development with
                                                                        be a nice experience. You guys are Wonderful. Keep
                                                                        us the good work. "</p>

                                                                    <div>
                                                                        <h4 class="font-size-16 text-primary">nezerious</h4>
                                                                        <p class="font-size-14 mb-0">- Skote User</p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-5">
                        <div class="auth-full-page-content p-md-5 p-4">
                            <div class="w-100">

                                <div class="d-flex flex-column h-100">
                                    <div class="mb-4 mb-md-5">
                                        <a href="index" class="d-block auth-logo">
                                            <img src="<?php echo e(URL::asset('/assets/images/logo-dark.png')); ?>" alt="" height="18"
                                                 class="auth-logo-dark">
                                            <img src="<?php echo e(URL::asset('/assets/images/logo-light.png')); ?>" alt="" height="18"
                                                 class="auth-logo-light">
                                        </a>
                                    </div>
                                    <div class="my-auto">
                                        <div>
                                            <h5 class="text-primary">Register account</h5>
                                        </div>

                                        <div class="mt-4">
                                            <form action = "<?php echo e(url('/employees')); ?>" method = "post" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <div class="row">
                                                    <div class="col-md-6 pt-2">
                                                        <label for="firstName" class="form-label">First Name</label>
                                                        <input type="text" class="form-control" id="firstName" name="firstName"
                                                               placeholder="Enter Your First Name" required>
                                                        <div class="invalid-feedback">
                                                            Enter Your First Name
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pt-2">
                                                        <label for="lastName" class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" id="lastName" name="lastName"
                                                               placeholder="Enter Your Last Name" required>
                                                        <div class="invalid-feedback">
                                                            Enter Your Last Name
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 pt-2">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="email" name="email"
                                                               placeholder="Enter Your Email" required>
                                                        <div class="invalid-feedback">
                                                            Enter Your Email
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pt-2">
                                                        <label for="telephoneNumber" class="form-label">Telephone Number</label>
                                                        <input type="tel" class="form-control" id="telephoneNumber" name="telephoneNumber"
                                                               placeholder="Enter Telephone Number" required>
                                                        <div class="invalid-feedback">
                                                            Enter Your Telephone Number
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 pt-2">
                                                        <label for="IDNumber" class="form-label">National ID Number/ Passport Number</label>
                                                        <input type="number" class="form-control" id="IDNumber" name="IDNumber"
                                                               placeholder="Enter Your National ID / Passport Number" required>
                                                        <div class="invalid-feedback">
                                                            Enter Your IDNumber
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 pt-2">
                                                        <label for="positionID" class="form-label">Choose a position</label>
                                                        <select id="positionID" class="form-select" name = "positionID">
                                                            <option disabled selected value="">Select the position</option>
                                                            <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($position->id); ?>"><?php echo e($position->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 pt-2">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="password" class="form-control" id="password" name="password"
                                                               placeholder="Enter Your Password" required>
                                                        <div class="invalid-feedback">
                                                            Enter Your Password
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pt-2">
                                                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                                                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                                                               placeholder="Confirm Your Password" required>
                                                        <div class="invalid-feedback">
                                                            Confirm Your Password
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-4 d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light"
                                                            type="submit">Register</button>
                                                </div>

                                                <div class="mt-4 text-center">
                                                    <h5 class="font-size-14 mb-3">Sign up using</h5>

                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <a href="javascript::void()"
                                                               class="social-list-item bg-primary text-white border-primary">
                                                                <i class="mdi mdi-facebook"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="javascript::void()"
                                                               class="social-list-item bg-info text-white border-info">
                                                                <i class="mdi mdi-twitter"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="javascript::void()"
                                                               class="social-list-item bg-danger text-white border-danger">
                                                                <i class="mdi mdi-google"></i>
                                                            </a>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </form>

                                            <div class=" text-center">
                                                <p>Already have an account ? <a href="auth-login-2"
                                                                                class="fw-medium text-primary"> Login</a> </p>
                                            </div>

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

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Projects\Bityarn\salonBooking\resources\views/custom/auth/employees.blade.php ENDPATH**/ ?>