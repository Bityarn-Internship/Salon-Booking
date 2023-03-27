

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Services'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('/assets/libs/owl.carousel/assets/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('/assets/libs/owl.carousel/assets/owl.theme.default.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-xl-5 mx-auto">
                    <div class="auth-full-page-content p-md-5 p-4">
                        <div class="w-100">

                            <div class="d-flex flex-column h-100">
                                <div >
                                    <div>
                                        <h5 class="text-primary text-center">Edit Service Category</h5>
                                    </div>

                                    <div class="mt-4">
                                        <form action = "<?php echo e(url('/updateServiceCategory/'.$serviceCategory->id)); ?>" method = "post" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class="row">
                                                <?php if(session()->has('message')): ?>
                                                    <div class = "alert alert-info" role = "alert">
                                                        <?php echo e(session()->get('message')); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                            <div class="row">
                                                <?php if($errors->has('categoryID')): ?>
                                                    <div class = "alert alert-danger" role = "alert">
                                                        <?php echo e($errors->first('categoryID')); ?>

                                                    </div>
                                                <?php endif; ?>
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingnameInput" value = "<?php echo e($serviceCategory->id); ?>" name = "categoryID" readonly>
                                                        <label for="floatingnameInput">Service Category ID</label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <?php if($errors->has('categoryName')): ?>
                                                    <div class = "alert alert-danger" role = "alert">
                                                        <?php echo e($errors->first('categoryName')); ?>

                                                    </div>
                                                <?php endif; ?>
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingnameInput" value = "<?php echo e($serviceCategory->name); ?>" name = "categoryName">
                                                        <label for="floatingnameInput">Service Category Name</label>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <?php if($errors->has('categoryDescription')): ?>
                                                    <div class = "alert alert-danger" role = "alert">
                                                        <?php echo e($errors->first('categoryDescription')); ?>

                                                    </div>
                                                <?php endif; ?>
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingemailInput" value = "<?php echo e($serviceCategory->description); ?>" name = "categoryDescription">
                                                        <label for="floatingemailInput">Service Category Description</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-4 d-grid">
                                                <button class="btn btn-primary waves-effect waves-light"
                                                    type="submit">Submit</button>
                                            </div>

                                        </form>
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

<?php echo $__env->make('custom.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Projects\Bityarn\salonBooking\resources\views/custom/serviceCategories/editServiceCategory.blade.php ENDPATH**/ ?>