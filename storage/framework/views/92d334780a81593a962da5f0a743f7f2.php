<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Recover_Password'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

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
                                        <h5 class="text-primary"> Reset Password</h5>
                                        <p class="text-muted">Re-Password with Skote.</p>
                                    </div>

                                    <div class="mt-4">
                                        <form action="<?php echo e(url('/passwordReset')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="token" value="<?php echo e($token); ?>">
                                            <div class="mb-3">
                                                <label for="useremail" class="form-label">Email</label>
                                                <input type="email" class="form-control" value="<?php echo e($email ?? old ('email')); ?>" name="email"
                                                       placeholder="Enter email">
                                                <?php if($errors->has('email')): ?>
                                                    <span style="color: red;" class="text-danger"><?php echo e($errors->first('email')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" name="password"
                                                       placeholder="Enter password">
                                                <?php if($errors->has('password')): ?>
                                                    <span style="color: red;" class="text-danger"><?php echo e($errors->first('password')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control" name="confirmPassword"
                                                       placeholder="Confirm password">
                                                <?php if($errors->has('confirmPassword')): ?>
                                                    <span style="color: red;" class="text-danger"><?php echo e($errors->first('confirmPassword')); ?></span>
                                                <?php endif; ?>
                                            </div>

                                            <div class="mt-3 d-grid">
                                                <button class="btn btn-primary waves-effect waves-light"
                                                        type="submit">Reset Password</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                                <div class="mt-5 text-center">
                                    <p>© <script>
                                            document.write(new Date().getFullYear())

                                        </script> Designed and Developed by Bityarn Consult.</p>
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

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BITYARN\Salon-Booking\resources\views/custom/password/resetPassword.blade.php ENDPATH**/ ?>