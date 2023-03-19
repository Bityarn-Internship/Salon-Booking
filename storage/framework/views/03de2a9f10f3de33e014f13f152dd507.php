<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Form_Layouts'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row ">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Employee Services</h4>

                            <form action = "<?php echo e(url('/employeeServices')); ?>" method = "post">
                                <?php echo csrf_field(); ?>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label">Employee Name</label>
                                    <select id="formrow-inputState" class="form-select" name = "employeeID">
                                        <option disabled selected>Select the employee</option>
                                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->firstName." ".$employee->latName); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label">Service</label>
                                    <select id="formrow-inputState" class="form-select" name = "serviceID">
                                        <option disabled selected>Select the service employee offers</option>
                                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($service->id); ?>"><?php echo e($service->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>


                        <div>
                            <center>
                            <button type="submit" class="btn btn-primary w-md">Assign</button>
                            </center>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
    </div>

























































<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BITYARN\Salon-Booking\resources\views/employeeServices.blade.php ENDPATH**/ ?>