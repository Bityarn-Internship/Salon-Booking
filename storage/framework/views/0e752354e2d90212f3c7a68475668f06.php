

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('View Feedback'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link href="<?php echo e(URL::asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet"
          type="text/css" />
    <link href="<?php echo e(URL::asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet"
          type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?php echo e(URL::asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>"
          rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title text-primary text-center">View Feedback</h4>

                    <div class="table-responsive">
                        <div class="row d-flex gx-10">
                            <div class="col"></div>
                            <div class="col-md-4">
                                <form action = "<?php echo e(url('/viewFeedback')); ?>" method = "GET">
                                    <?php echo csrf_field(); ?>
                                    <span style="display: inline-block"><label for="status" class="form-label">Filter by status</label></span>
                                    <span style="display: inline-block">
                                        <select class="form-select" name = "status">
                                            <option value = "Active">Active</option>
                                            <option value = "Inactive">Inactive</option>
                                        </select>
                                        
                                    </span>
                                
                                    <span style="display: inline-block"><h3><button class="btn btn-primary"><b>Filter</b></button></h3></span>
                                </form>
                                
                            </div>
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($feedback->id); ?></td>
                                    <td><?php echo e($feedback->firstName); ?></td>
                                    <td><?php echo e($feedback->lastName); ?></td>
                                    <td><?php echo e($feedback->email); ?></td>
                                    <td><?php echo e($feedback->message); ?></td>
                                    <td><?php echo e($feedback->status); ?></td>
                                    <td>
                                        <i class="fas fa-pencil-alt btn btn-outline-success btn-sm edit" data-bs-toggle="modal" data-bs-target="#editModal"></i>
                                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-center w-100" id="editModalLabel">Edit Employee Service</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action = "<?php echo e(url('/updateFeedback/'.$feedback->id)); ?>" method = "post" enctype="multipart/form-data">
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
                                                                        <input type="text" class="form-control" id="floatingnameInput" value = "<?php echo e($feedback->firstName); ?>" name = "firstName" readonly>
                                                                        <label for="floatingnameInput">First Name</label>
                                                                    </div>

                                                                    <div class="invalid-feedback">
                                                                        <?php if($errors->has('firstName')): ?>
                                                                            <?php echo e($errors->first('firstName')); ?>

                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12 pt-2">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control" id="floatingnameInput" value = "<?php echo e($feedback->lastName); ?>" name = "lastName" readonly>
                                                                        <label for="floatingnameInput">Last Name</label>
                                                                    </div>

                                                                    <div class="invalid-feedback">
                                                                        <?php if($errors->has('lastName')): ?>
                                                                            <?php echo e($errors->first('lastName')); ?>

                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12 pt-2">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="email" class="form-control" id="floatingnameInput" value = "<?php echo e($feedback->email); ?>" name = "email" readonly>
                                                                        <label for="floatingnameInput">Email Address</label>
                                                                    </div>

                                                                    <div class="invalid-feedback">
                                                                        <?php if($errors->has('email')): ?>
                                                                            <?php echo e($errors->first('email')); ?>

                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12 pt-2">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="tel" class="form-control" id="floatingnameInput" value = "<?php echo e($feedback->message); ?>" name = "message" readonly>
                                                                        <label for="floatingnameInput">Feedback</label>
                                                                    </div>

                                                                    <div class="invalid-feedback">
                                                                        <?php if($errors->has('message')): ?>
                                                                            <?php echo e($errors->first('message')); ?>

                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class = "row">
                                                                <div class="col-md-12 pt-2">
                                                                    <div class="form-floating mb-3">
                                                                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name = "status">
                                                                            <option value="Poor">Poor</option>
                                                                            <option value="Good">Good</option>
                                                                        </select>
                                                                        <label for="floatingSelectGrid">Update Status</label>
                                                                        <div class="invalid-feedback">
                                                                            <?php if($errors->has('status')): ?>
                                                                                <?php echo e($errors->first('status')); ?>

                                                                            <?php endif; ?>
                                                                        </div>
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
                                        <a class="btn btn-outline-danger btn-sm edit" href="<?php echo e(url ('deleteFeedback/'.$feedback->id)); ?>" title="Delete">
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
        </div> <!-- end col -->
    </div> <!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- Required datatable js -->
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <!-- Buttons examples -->
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/pdfmake/build/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/pdfmake/build/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')); ?>"></script>

    <!-- Responsive examples -->
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')); ?>"></script>
    <!-- Datatable init js -->
    <script src="<?php echo e(URL::asset('/assets/js/pages/datatables.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>










<?php echo $__env->make('custom.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BITYARN\Salon-Booking\resources\views/custom/home/viewFeedback.blade.php ENDPATH**/ ?>