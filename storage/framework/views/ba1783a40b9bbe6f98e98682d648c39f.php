

<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Profile'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <div class="row">
        <div class="col-xl-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Booking Details
                        <span class="px-auto">
                            <a class="btn btn-outline-success btn-sm edit float-end" href="<?php echo e(url('completePayment/'.$booking->id)); ?>" title="Complete Payment">
                            <i class="bx bx-dollar"></i></a>

                            <i class="fas fa-pencil-alt btn btn-outline-primary btn-sm edit" data-bs-toggle="modal" data-bs-target="#editModal"></i>
                            
                            <a class="btn btn-outline-danger btn-sm edit" href="<?php echo e(url('deleteBooking/'.$booking->id)); ?>" title="Delete">
                            <i class="fa fa-trash"></i>
                            </a>

                        </span>
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center w-100" id="editModalLabel">Edit Employee Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action = "<?php echo e(url('/updateBooking/'.$booking->id)); ?>" method = "post" enctype="multipart/form-data">
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
                                                        <input type="text" class="form-control" id="floatingnameInput" value = "<?php echo e($booking->id); ?>" name = "bookingID" readonly>
                                                        <label for="floatingnameInput">Booking ID</label>
                                                    </div>

                                                    <div class="invalid-feedback">
                                                        <?php if($errors->has('bookingID')): ?>
                                                            <?php echo e($errors->first('bookingID')); ?>

                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="date" class="form-control" id="floatingnameInput" value = "<?php echo e($booking->date); ?>" name = "date">
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
                            <tr>
                                <th scope="row"> Status:</th>
                                <td><?php echo e($booking->status); ?></td>
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
                    <h4 class="card-title mb-4">Booked Services</h4>
                    <span style="display: inline-block">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <b>Add Service</b>
                            </button>
                    </span>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center w-100" id="exampleModalLabel">Edit Employee Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action = "<?php echo e(url('/bookService')); ?>" method = "post" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class = "row">

                                            <?php if(session()->has('message')): ?>
                                                <div class = "alert alert-info" role = "alert">
                                                    <?php echo e(session()->get('message')); ?>

                                                </div>
                                            <?php endif; ?>

                                        </div>
                                        <div class = "row">
                                            <div class="col-md-12">
                                                <?php if($errors->has('bookingID')): ?>
                                                    <div class = "alert alert-danger" role = "alert">
                                                        <?php echo e($errors->first('bookingID')); ?>

                                                    </div>
                                                <?php endif; ?>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingnameInput" value="<?php echo e($booking->id); ?>"  name="bookingID" readonly>
                                                    <label for="floatingnameInput">Booking ID</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class = "row">
                                            <div class="col-md-12 pt-2">
                                                <?php if($errors->has('employeeServiceID')): ?>
                                                    <div class = "alert alert-danger" role = "alert">
                                                        <?php echo e($errors->first('employeeServiceID')); ?>

                                                    </div>
                                                <?php endif; ?>
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name = "employeeServiceID">
                                                        <option selected disabled>Select the employee and service</option>
                                                        <?php $__currentLoopData = $employeeServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employeeService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($employeeService->id); ?>"><?php echo e(\App\Http\Controllers\EmployeesController::getEmployeeName($employeeService->employeeID).' -> '.\App\Http\Controllers\ServicesController::getServiceName($employeeService->serviceID)); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <label for="floatingSelectGrid">Select Employee and Service</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light"
                                                    type="submit">Submit</button>
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

                    <table id="datatable" class="table table-bordered dt-responsive mt-2  nowrap w-100">
                        <thead>
                        <tr>
                            <th>Service Name</th>
                            <th>Employee Name</th>
                            <th>Cost</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $bookedServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookedService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(\App\Http\Controllers\ServicesController::getServiceName($bookedService->serviceID)); ?></td>
                                <td><?php echo e(\App\Http\Controllers\EmployeesController::getEmployeeName($bookedService->employeeID)); ?></td>
                                <td><?php echo e($bookedService->serviceCost); ?></td>
                                <td>
                                    <a class="btn btn-outline-success btn-sm edit" href="<?php echo e(url ('editBookedService/'.$bookedService->id)); ?>" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a class="btn btn-outline-danger btn-sm edit" href="<?php echo e(url ('deleteBookedService/'.$bookedService->id)); ?>" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
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