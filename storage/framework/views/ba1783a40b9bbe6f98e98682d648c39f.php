<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Profile'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <div class="row">
        <div class="col-xl-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Booking Details
                        <span class="px-auto"><i class="fas fa-pencil-alt btn btn-outline-primary btn-sm edit" data-bs-toggle="modal" data-bs-target="#editModal"></i>
                    </span>
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center w-100" id="editModalLabel">Edit Employee Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action = "<?php echo e(url('/updateBooking/'.$booking->bookedServiceID)); ?>" method = "post" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class="row">
                                                <?php if(session()->has('message')): ?>
                                                    <div class="valid-feedback">
                                                        <?php echo e(session()->get('message')); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingnameInput" value = "<?php echo e($booking->bookingID); ?>" name = "bookingID">
                                                        <label for="floatingnameInput">Booking ID</label>
                                                    </div>

                                                    <div class="invalid-feedback">
                                                        <?php if($errors->has('clientID')): ?>
                                                            <?php echo e($errors->first('clientID')); ?>

                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingnameInput" value = "<?php echo e(\App\Http\Controllers\UsersController::getClientName($booking->clientID)); ?>" name = "clientID">
                                                        <label for="floatingnameInput">Client Name</label>
                                                    </div>

                                                    <div class="invalid-feedback">
                                                        <?php if($errors->has('clientID')): ?>
                                                            <?php echo e($errors->first('clientID')); ?>

                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingnameInput" value = "<?php echo e($booking->date); ?>" name = "date">
                                                        <label for="floatingnameInput">Date</label>
                                                    </div>

                                                    <div class="invalid-feedback">
                                                        <?php if($errors->has('date')): ?>
                                                            <?php echo e($errors->first('date')); ?>

                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="time" class="form-control" id="floatingnameInput" value = "<?php echo e($booking->time); ?>" name = "time">
                                                        <label for="floatingnameInput">Time</label>
                                                    </div>

                                                    <div class="invalid-feedback">
                                                        <?php if($errors->has('time')): ?>
                                                            <?php echo e($errors->first('time')); ?>

                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingnameInput" value = "<?php echo e($booking->cost); ?>" name = "cost">
                                                        <label for="floatingnameInput">Total Cost</label>
                                                    </div>

                                                    <div class="invalid-feedback">
                                                        <?php if($errors->has('cost')): ?>
                                                            <?php echo e($errors->first('cost')); ?>

                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-4 d-grid">
                                                <button class="btn btn-primary waves-effect waves-light"
                                                        type="submit">Save Changes</button>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </h4>
                    <div class="table-responsive">
                        <table class="table table-nowrap mb-0">
                            <tbody>
                            <tr>
                                <th scope="row">Booking ID: </th>
                                <td><?php echo e($booking->id); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Client Name :</th>
                                <td><?php echo e(\App\Http\Controllers\UsersController::getClientName($booking->clientID)); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Date :</th>
                                <td><?php echo e($booking->date); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Time :</th>
                                <td><?php echo e($booking->time); ?></td>
                            </tr>
                            <tr>
                                <th scope="row"> Total Cost:</th>
                                <td><?php echo e($booking->cost); ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end card -->

            <!-- end card -->
        </div>

        <div class="col-xl-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4 ">Change Password</h4>
                    <form action="<?php echo e(route('changePassword')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="">Old Password</label>
                            <input id="oldInput" type="password" name="oldPassword" class="form-control">
                            <?php if($errors->has('oldPassword')): ?>
                                <span style="color: red;" class="text-danger"><?php echo e($errors->first('oldPassword')); ?></span>
                            <?php endif; ?>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label>New Password</label>
                            <input id="newInput" type="password" name="password" class="form-control" />
                            <?php if($errors->has('password')): ?>
                                <span style="color: red;" class="text-danger"><?php echo e($errors->first('password')); ?></span>
                            <?php endif; ?>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label>Confirm Password</label>
                            <input id="confirmInput" type="password" name="confirmPassword" class="form-control">
                            <?php if($errors->has('confirmPassword')): ?>
                                <span style="color: red;" class="text-danger"><?php echo e($errors->first('confirmPassword')); ?></span>
                            <?php endif; ?>
                        </div>
                        <input type="checkbox" onclick="myFunction()">Show Password
                        <div class="mb-3 text-end">
                            <hr>

                            <button type="submit" class="btn btn-primary waves-effect waves-light btn-sm">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- apexcharts -->
    <script src="<?php echo e(URL::asset('/assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>

    <!-- profile init -->
    <script src="<?php echo e(URL::asset('/assets/js/pages/profile.init.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('custom.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BITYARN\Salon-Booking\resources\views/custom/bookings/viewBooking.blade.php ENDPATH**/ ?>