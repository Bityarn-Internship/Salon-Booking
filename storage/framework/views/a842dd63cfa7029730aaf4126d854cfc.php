<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>


        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Edit Position</h5>
                        <form action = "<?php echo e(url('/updatePosition/'.$position->id)); ?>" method = "post">
                            <?php echo csrf_field(); ?>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingnameInput" value="<?php echo e($position->name); ?>"  placeholder="Enter the position..." name = "positionName">
                                <label for="floatingnameInput">Position Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingemailInput" value="<?php echo e($position->description); ?>"  placeholder="Describe the position..." name = "positionDescription">
                                <label for="floatingemailInput">Position Description</label>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->

        </div>
        <!-- end row -->

        </div>
        <!-- end row -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BITYARN\Salon-Booking\resources\views/editPosition.blade.php ENDPATH**/ ?>