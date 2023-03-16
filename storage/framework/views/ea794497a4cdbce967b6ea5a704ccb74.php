


<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">

        <form action="<?php echo e(url('/checkTransaction')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <!-- Email input -->
            <div class="container2 justify-content-center">
                <h3 class = "text-center">MPESA Confirmation</h3>
                <div class="form-outline mb-4">
                    <?php if(session()->has('message')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session()->get('message')); ?>

                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-outline mb-4">
                    <input hidden value = "<?php echo e($bookingID); ?>" name = "bookingID">
                    <label for="transaction" class="form-label">Transaction Code</label>
                    <input type="text" class="form-control" id="transaction" name = "transaction" placeholder="e.g. RB97B5WMYN">

                </div>
            
                <div class="text-center ">
                    <button type="submit" class="btn btn-primary btn-block ">Confirm</button>
                </div>
            </div>
        </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Projects\Bityarn\Laravel Admin\Admin\resources\views/mpesaConfirmation.blade.php ENDPATH**/ ?>