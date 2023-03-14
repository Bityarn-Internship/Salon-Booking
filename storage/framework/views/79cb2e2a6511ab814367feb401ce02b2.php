


<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>


        <div class="row">
            <div class="col-xl-6">
                <div class="card d-flex justify-content-center">
                    <div class="card-body">
                        <h5 class="card-title text-center">Login</h5>
                        <form action="<?php echo e(url('/login')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingnameInput" name="email" placeholder="Enter Your Email">
                                    <label for="floatingnameInput">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingnameInput" name="password" placeholder="Enter Your password...">
                                    <label for="floatingnameInput">Password</label>
                                </div>
                            </div>

                            <center>
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Login</button>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Projects\Bityarn\Laravel Admin\Admin\resources\views/login.blade.php ENDPATH**/ ?>