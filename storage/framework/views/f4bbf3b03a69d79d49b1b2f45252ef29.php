

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Booking'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('/assets/libs/owl.carousel/assets/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('/assets/libs/owl.carousel/assets/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

    <body class="auth-body-bg">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">

                <div class="col-xl-5 mx-auto">
                    <div class="auth-full-page-content p-md-5 p-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100">

                                <div class="my-auto">
                                    <div>
                                        <h5 class = "text-primary text-center">Make a Booking</h5>
                                    </div>

                                    <div class="mt-4">
                                        <form action = "<?php echo e(url('/bookings')); ?>" method = "post" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class = "row">
                                                <?php if(session()->has('message')): ?>
                                                    <div class = "alert alert-info" role = "alert">
                                                        <?php echo e(session()->get('message')); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                            <div class="row">

                                                <div class="col-md-12 pt-2">
                                                    <?php if($errors->has('services')): ?>
                                                        <div class = "alert alert-danger" role = "alert">
                                                            <?php echo e($errors->first('services')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                    <label for="services" class="form-label">Select all the services that apply: </label>
                                                    <select name="services[]" id="services" multiple>
                                                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($service->id); ?>"><?php echo e($service->name." - ".$service->cost); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div><br/>
                                            <div class="row">
                                                <div class="col-md-6 pt-2">
                                                    <?php if($errors->has('date')): ?>
                                                        <div class = "alert alert-danger" role = "alert">
                                                            <?php echo e($errors->first('date')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="form-floating mb-3">
                                                        <input type="date" class="form-control" id="demo" placeholder="Select a date..." name = "date">
                                                        <label for="floatingemailInput">Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pt-2">
                                                    <?php if($errors->has('time')): ?>
                                                        <div class = "alert alert-danger" role = "alert">
                                                            <?php echo e($errors->first('time')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="form-floating mb-3">
                                                        <input type="time" class="form-control" id="floatingemailInput" placeholder="Select a time..." name = "time">
                                                        <label for="floatingemailInput">Time</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class = "row">
                                                <?php if(session()->get('user') == 'employee'): ?>
                                                    <input hidden type="text" name="clientID" value = "<?php echo e($clientID); ?>">
                                                <?php else: ?>
                                                    <input hidden type="text" name="clientID" value = "<?php echo e(Auth::user()->id); ?>">
                                                <?php endif; ?>
                                            </div>

                                            <div class="mt-4 d-grid">
                                                <button class="btn btn-primary waves-effect waves-light"
                                                    type="submit">Book</button>
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
    <script>
        var date = new Date();
        var tdate = date.getDate();
        var month = date.getMonth() + 1;
        if (date < 10) {
            date = "0" + date;
        }
        if (month < 10) {
            month = "0" + month
        }
        var year = date.getUTCFullYear() - 0;
        var minDate = year + "-" + month + "-" + tdate;
        document.getElementById("demo").setAttribute("min", minDate);
        console.log(minDate);
    </script>






<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- owl.carousel js -->
    <script src="<?php echo e(URL::asset('/assets/libs/owl.carousel/owl.carousel.min.js')); ?>"></script>
    <!-- auth-2-carousel init -->
    <script src="<?php echo e(URL::asset('/assets/js/pages/auth-2-carousel.init.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('services')  // id
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('custom.common.master-client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Projects\Bityarn\salonBooking\resources\views/custom/bookings/bookings.blade.php ENDPATH**/ ?>