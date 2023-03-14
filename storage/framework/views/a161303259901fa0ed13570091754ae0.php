


<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>


        <div class="row">
            <div class="col-xl-6">
                <div class="card d-flex justify-content-center">
                    <div class="card-body">
                        <h5 class="card-title text-center">Edit Employee Details</h5>
                        <form action = "<?php echo e(url('/updateEmployee/'.$employee->id)); ?>" method = "post">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingnameInput" value="<?php echo e($employee->firstName); ?>" placeholder="Enter Your First Name" name="firstName">
                                        <label for="floatingnameInput">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingnameInput" value="<?php echo e($employee->lastName); ?>" placeholder="Enter Your Last Name" name="lastName">
                                        <label for="floatingnameInput">Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingnameInput" value="<?php echo e($employee->email); ?>" placeholder="Enter Your Email" name="email">
                                        <label for="floatingnameInput">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="tel" class="form-control" id="floatingnameInput" value="<?php echo e($employee->telephoneNumber); ?>" placeholder="Enter Your Telephone Number" name="telephoneNumber">
                                        <label for="floatingnameInput">Telephone Number</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <label for="formrow-inputState" class="form-label">Position</label>
                                <select id="formrow-inputState" class="form-select" name = "positionID">
                                    <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($position->id); ?>"><?php echo e($position->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingnameInput" value="<?php echo e($employee->IDNumber); ?>" placeholder="Enter the ID Number..." name="IDNumber">
                                <label for="floatingnameInput">National ID Number/ Passport Number</label>
                            </div>
                            
                            <center>
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Register</button>
                                </div>
                            </center>
                        </form>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->

        </div>
        <!-- end row -->

        <!-- end col -->
        </div>
        <!-- end row -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Projects\Bityarn\Laravel Admin\Admin\resources\views/editEmployee.blade.php ENDPATH**/ ?>