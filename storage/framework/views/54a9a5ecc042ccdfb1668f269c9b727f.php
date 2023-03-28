

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Login'); ?> 2
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

                    <div class="col-xl-8">
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
                                                            <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="item">
                                                                <div class="py-3">
                                                                    <p class="font-size-16 mb-4">" <?php echo e($feedback->message); ?> "</p>

                                                                    <div>
                                                                        <p class="font-size-14 mb-0">- <?php echo e($feedback->firstName); ?></p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                    <div class="col-xl-4">
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
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p class="text-muted">Sign in to continue to Skote.</p>
                                        </div>

                                        <div class="mt-4">
                                            <div class="row">
                                                <?php if(session()->has('message')): ?>
                                                    <div class="alert alert-info" role="alert">
                                                        <?php echo e(session()->get('message')); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <form action="<?php echo e(url('/login')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <div class="mb-3">
                                                    <?php if($errors->has('email')): ?>
                                                        <div class = "alert alert-danger" role = "alert">
                                                            <?php echo e($errors->first('email')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                           placeholder="Enter Your Email">
                                                </div>

                                                <div class="mb-3">
                                                    <?php if($errors->has('password')): ?>
                                                        <div class = "alert alert-danger" role = "alert">
                                                            <?php echo e($errors->first('password')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="float-end">
                                                        <a href="auth-recoverpw-2" class="text-muted">Forgot
                                                            password?</a>
                                                    </div>
                                                    <label class="form-label">Password</label>
                                                    <div class="input-group auth-pass-inputgroup">
                                                        <input type="password" class="form-control"
                                                               placeholder="Enter Your Password" aria-label="Password"
                                                               aria-describedby="password-addon" name="password">
                                                        <button class="btn btn-light " type="button" id="password-addon"><i
                                                                class="mdi mdi-eye-outline"></i></button>
                                                    </div>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="remember-check">
                                                    <label class="form-check-label" for="remember-check">
                                                        Remember me
                                                    </label>
                                                </div>

                                                <div class="mt-3 d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light"
                                                            type="submit">Log In</button>
                                                </div>


                                                <div class="mt-4 text-center">
                                                    <h5 class="font-size-14 mb-3">Sign in with</h5>

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
                                                <p>Don't have an account ? <a href="<?php echo e(URL::to('/clients')); ?>"
                                                    class="fw-medium text-primary"> Signup now </a> </p>
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

<?php echo $__env->make('custom.common.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Projects\Bityarn\salonBooking\resources\views/custom/auth/login.blade.php ENDPATH**/ ?>