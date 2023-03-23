

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('View Employees'); ?>
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

                    <h4 class="card-title text-primary text-center">View Employees</h4>

                    <div class="table-responsive">
                        <div class="d-flex gx-10">
                            <div class = "col">
                                <!-- <span style="display: inline-block"><h3><a class="btn btn-primary" href="<?php echo e(url('/employees')); ?>"><b>Add Employee</b>
                                    </a></h3></span> -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <b>Add Employee</b>
                                    </button>

                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-center w-100" id="exampleModalLabel">Add Employee</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form action = "<?php echo e(url('/employees')); ?>" method = "post" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <div class="row">
                                                    <?php if($errors->has('message')): ?>
                                                        <div class = "alert alert-info" role = "alert">
                                                            <?php echo e(session()->get('message')); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 pt-2">
                                                        <?php if($errors->has('firstName')): ?>
                                                            <div class = "alert alert-danger" role = "alert">
                                                                <?php echo e($errors->first('firstName')); ?>

                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingnameInput" placeholder="Enter the first name..." name = "firstName">
                                                            <label for="floatingnameInput">First Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pt-2">
                                                        <?php if($errors->has('lastName')): ?>
                                                            <div class = "alert alert-danger" role = "alert">
                                                                <?php echo e($errors->first('lastName')); ?>

                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingnameInput" placeholder="Enter the last name..." name = "lastName">
                                                            <label for="floatingnameInput">Last Name</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 pt-2">
                                                        <?php if($errors->has('email')): ?>
                                                            <div class = "alert alert-danger" role = "alert">
                                                                <?php echo e($errors->first('email')); ?>

                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="form-floating mb-3">
                                                            <input type="email" class="form-control" id="floatingnameInput" placeholder="Enter email..." name = "email">
                                                            <label for="floatingnameInput">Email</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pt-2">
                                                        <?php if($errors->has('telephoneNumber')): ?>
                                                            <div class = "alert alert-danger" role = "alert">
                                                                <?php echo e($errors->first('telephoneNumber')); ?>

                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="form-floating mb-3">
                                                            <input type="tel" class="form-control" id="floatingnameInput" placeholder="Enter telephone number..." name = "telephoneNumber">
                                                            <label for="floatingnameInput">Telephone Number</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class = "row">
                                                    <div class="col-md-6 pt-2">
                                                        <?php if($errors->has('IDNumber')): ?>
                                                            <div class = "alert alert-danger" role = "alert">
                                                                <?php echo e($errors->first('IDNumber')); ?>

                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingnameInput" placeholder="Enter ID number..." name = "IDNumber">
                                                            <label for="floatingnameInput">National ID/Passport Number</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pt-2">
                                                        <?php if($errors->has('positionID')): ?>
                                                            <div class = "alert alert-danger" role = "alert">
                                                                <?php echo e($errors->first('positionID')); ?>

                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="form-floating mb-3">
                                                            <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name = "positionID">
                                                                <option selected disabled>Choose a position</option>
                                                                <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($position->id); ?>"><?php echo e($position->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            <label for="floatingSelectGrid">Select a position</label>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 pt-2">
                                                        <?php if($errors->has('password')): ?>
                                                            <div class = "alert alert-danger" role = "alert">
                                                                <?php echo e($errors->first('password')); ?>

                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="form-floating mb-3">
                                                            <input type="password" class="form-control" id="floatingnameInput" placeholder="Enter the password..." name = "password">
                                                            <label for="floatingnameInput">Password</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pt-2">
                                                        <?php if($errors->has('confirmPassword')): ?>
                                                            <div class = "alert alert-danger" role = "alert">
                                                                <?php echo e($errors->first('confirmPassword')); ?>

                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="form-floating mb-3">
                                                            <input type="password" class="form-control" id="floatingnameInput" placeholder="Enter the confirmation password..." name = "confirmPassword">
                                                            <label for="floatingnameInput">Password confirmation</label>
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

                            </div>
                            <div class="col-md-4">
                                <form action = "<?php echo e(url('/viewEmployees')); ?>" method = "GET">
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
                                <th>Telephone Number</th>
                                <th>ID Number</th>
                                <th>Position</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($employee->id); ?></td>
                                    <td><?php echo e($employee->firstName); ?></td>
                                    <td><?php echo e($employee->lastName); ?></td>
                                    <td><?php echo e($employee->email); ?></td>
                                    <td><?php echo e($employee->telephoneNumber); ?></td>
                                    <td><?php echo e($employee->IDNumber); ?></td>
                                    <td><?php echo e(\App\Http\Controllers\PositionsController::getPositionName($employee->positionID)); ?></td>
                                    <td>
                                        <a class="btn btn-outline-success btn-sm edit" href="<?php echo e(url ('editEmployee/'.$employee->id)); ?>" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-outline-danger btn-sm edit" href="<?php echo e(url ('deleteEmployee/'.$employee->id)); ?>" title="Delete">
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







<?php echo $__env->make('custom.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Projects\Bityarn\salonBooking\resources\views/custom/auth/viewEmployees.blade.php ENDPATH**/ ?>