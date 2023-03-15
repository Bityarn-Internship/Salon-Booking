


<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">

        <form action="<?php echo e(url('/login')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <!-- Email input -->
        <div class="container2 justify-content-center">
            <div class="form-outline mb-4">
                <label class="form-label" for="form1Example1">Email address</label>
                <input type="email" name="email" id="form1Example1" class="form-control" />
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="form1Example2">Password</label>
                <input type="password" name="password" id="form1Example2" class="form-control" />
            </div>


                <div class="col">
                    <!-- Simple link -->
                    <a class="text-right" href="#!">Forgot password?</a>
                </div>
            <div class="text-center ">
                <button type="submit" class="btn btn-primary btn-block ">Sign in</button>
            </div>

        </div>


        </form>







































<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Projects\Bityarn\Laravel Admin\Admin\resources\views/login.blade.php ENDPATH**/ ?>