<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('View Services'); ?>
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

                    <h4 class="card-title text-primary text-center">View Service Categories</h4>

                    <div class="table-responsive">
                        <div class="d-flex gx-10">
                            <div class = "col">
                                <span style="display: inline-block">
                                    <?php if($status != 'Inactive'): ?>
                                   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <b>Add Service Category</b>
                                   </button>
                                   <?php else: ?>
                                   <a href = "/restoreServiceCategories"><button type="button" class="btn btn-primary">
                                        <b>Restore All</b>
                                        <i class="fas fa-trash-restore"></i>
                                   </button></a>
                                   <?php endif; ?>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-center w-100" id="exampleModalLabel">Add Service Category</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action = "<?php echo e(url('/serviceCategories')); ?>" method = "post" enctype="multipart/form-data">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="row">
                                                        <?php if(session()->has('message')): ?>
                                                            <div class = "alert alert-info" role = "alert">
                                                                <?php echo e(session()->get('message')); ?>

                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="row">
                                                        <?php if($errors->has('categoryName')): ?>
                                                            <div class = "alert alert-danger" role = "alert">
                                                                <?php echo e($errors->first('categoryName')); ?>

                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="col-md-12 pt-2">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" id="floatingnameInput" placeholder="Enter the service..." name = "categoryName">
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
                                                                <input type="text" class="form-control" id="floatingemailInput" placeholder="Enter the description..." name = "categoryDescription">
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
                                <form action = "<?php echo e(url('/viewServiceCategories')); ?>" method = "GET">
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
                                    <th>Service Category Name</th>
                                    <th>Service Category Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $serviceCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($serviceCategory->id); ?></td>
                                    <td><?php echo e($serviceCategory->name); ?></td>
                                    <td><?php echo e($serviceCategory->description); ?></td>
                                    <td>
                                        <?php if($status != 'Inactive'): ?>
                                            <a class="btn btn-outline-success btn-sm edit" href="<?php echo e(url ('editServiceCategory/'.$serviceCategory->id)); ?>" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-outline-danger btn-sm edit" href="<?php echo e(url ('deleteServiceCategory/'.$serviceCategory->id)); ?>" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        <?php else: ?>
                                            <a class="btn btn-outline-primary btn-sm edit" href="<?php echo e(url ('restoreServiceCategory/'.$serviceCategory->id)); ?>" title="Restore">
                                                <i class="fas fa-trash-restore"></i>
                                            </a>
                                        <?php endif; ?>
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

<?php echo $__env->make('custom.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/User/Projects/Bityarn/Salon-Booking/resources/views/custom/serviceCategories/viewServiceCategories.blade.php ENDPATH**/ ?>