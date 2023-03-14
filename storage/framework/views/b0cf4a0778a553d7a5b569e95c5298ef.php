<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">



































    <div class="container">

                <div >
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

        <!-- end row -->
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BITYARN\Salon-Booking\resources\views/login.blade.php ENDPATH**/ ?>