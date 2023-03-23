
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('View Positions'); ?>
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

                    <h4 class="card-title text-primary text-center">View Positions</h4>

                    <div class="table-responsive">
                        <div class="d-flex gx-10">
                            <div class = "col">
                                <span style="display: inline-block">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <b>Add Position</b>
                                    </button>

                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-center w-100" id="exampleModalLabel">Add Position</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form action = "<?php echo e(url('/positions')); ?>" method = "post" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <div class="row">
                                                    <?php if($errors->has('message')): ?>
                                                        <div class = "alert alert-info" role = "alert">
                                                            <?php echo e(session()->get('message')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 pt-2">
                                                        <?php if($errors->has('positionName')): ?>
                                                            <div class = "alert alert-danger" role = "alert">
                                                                <?php echo e($errors->first('positionName')); ?>

                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingnameInput" placeholder="Enter the position..." name = "positionName">
                                                            <label for="floatingnameInput">Position Name</label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 pt-2">
                                                        <?php if($errors->has('positionDescription')): ?>
                                                            <div class = "alert alert-danger" role = "alert">
                                                                <?php echo e($errors->first('positionDescription')); ?>

                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingemailInput" placeholder="Describe the position..." name = "positionDescription">
                                                            <label for="floatingemailInput">Position Description</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-4 d-grid text-center">
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

                                </span>
                            </div>
                            <div class="col-md-4">
                                <form action = "<?php echo e(url('/viewPositions')); ?>" method = "GET">
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
                                <th>Position Name</th>
                                <th>Position Description
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($position->id); ?></td>
                                    <td><?php echo e($position->name); ?></td>
                                    <td><?php echo e($position->description); ?></td>
                                    <td>
                                        <i class="fas fa-pencil-alt btn btn-outline-success btn-sm edit" data-bs-toggle="modal" data-bs-target="#editModal"></i>
                                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-center w-100" id="editModalLabel">Edit Position</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action = "<?php echo e(url('/updatePosition/'.$position->id)); ?>" method = "post" enctype="multipart/form-data">
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
                                                                        <input type="text" class="form-control" id="floatingnameInput" value = "<?php echo e($position->name); ?>" name = "positionName">
                                                                        <label for="floatingnameInput">Position Name</label>
                                                                    </div>

                                                                    <div class="invalid-feedback">
                                                                        <?php if($errors->has('positionName')): ?>
                                                                            <?php echo e($errors->first('positionName')); ?>

                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 pt-2">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control" id="floatingemailInput" value = "<?php echo e($position->description); ?>" name = "positionDescription">
                                                                        <label for="floatingemailInput">Position Description</label>
                                                                    </div>
                                                                    <div class="invalid-feedback">
                                                                        <?php if($errors->has('positionDescription')): ?>
                                                                            <?php echo e($errors->first('positionDescription')); ?>

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

                                        <a class="btn btn-outline-danger btn-sm edit" href="<?php echo e(url ('deletePosition/'.$position->id)); ?>" title="Delete">
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





<?php echo $__env->make('custom.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Projects\Bityarn\salonBooking\resources\views/custom/positions/viewPositions.blade.php ENDPATH**/ ?>