


<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>


        <div class="row">
            <div class="col-xl-6">
                <div class="card d-flex justify-content-center">
                    <div class="card-body">
                        <h5 class="card-title text-center">Client Details</h5>
                        <form action="<?php echo e(url('/clients')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingnameInput" name="firstName" placeholder="Enter Your First Name">
                                        <label for="floatingnameInput">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingnameInput" name="lastName" placeholder="Enter Your Last Name">
                                        <label for="floatingnameInput">Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingnameInput" name="email" placeholder="Enter Your Email">
                                        <label for="floatingnameInput">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="tel" class="form-control" id="floatingnameInput" name="telephoneNumber" placeholder="Enter Your Telephone Number">
                                        <label for="floatingnameInput">Telephone Number</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingnameInput" name="password" placeholder="Enter Your password...">
                                <label for="floatingnameInput">Password</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingemailInput" name="confirmPassword" placeholder="Enter Your Confirmed Password...">
                                <label for="floatingemailInput">Confirm Password</label>
                            </div>
                            <center>
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Register</button>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Projects\Bityarn\Laravel Admin\Admin\resources\views/clients.blade.php ENDPATH**/ ?>