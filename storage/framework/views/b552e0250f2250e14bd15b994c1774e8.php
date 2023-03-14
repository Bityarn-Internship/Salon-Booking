


<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>


        <div class="row">
            <div class="col-xl-6">
                <div class="card d-flex justify-content-center">
                    <div class="card-body">
                        <form action="<?php echo e(url('/updateClient/'.$client->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" value="<?php echo e($client->firstName); ?>" name="firstName" id="floatingnameInput" placeholder="Enter Your First Name">
                                        <label for="floatingnameInput">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" value="<?php echo e($client->lastName); ?>" name="lastName" id="floatingnameInput" placeholder="Enter Your Last Name">
                                        <label for="floatingnameInput">Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" value="<?php echo e($client->email); ?>" name="email" id="floatingnameInput" placeholder="Enter Your Email">
                                        <label for="floatingnameInput">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" value="<?php echo e($client->telephoneNumber); ?>" name="telephoneNumber"  id="floatingnameInput" placeholder="Enter Your Telephone Number">
                                        <label for="floatingnameInput">Telephone Number</label>
                                    </div>
                                </div>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Projects\Bityarn\Laravel Admin\Admin\resources\views/editClient.blade.php ENDPATH**/ ?>