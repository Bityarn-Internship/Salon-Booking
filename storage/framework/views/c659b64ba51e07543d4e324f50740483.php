


<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>


<div class="card" >
<div class="card-body">
<h5 class="card-title text-center">Employee Details</h5>
<form action = "<?php echo e(url('/employeeServices')); ?>" method = "post" enctype="multipart/form-data">
<?php echo csrf_field(); ?>
<div class="form-floating mb-3">
    <label for="formrow-inputState" class="form-label">Employees</label>
    <select id="formrow-inputState" class="form-select" name = "employeeID">
        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->firstName." ".$employee->latName); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<div class="form-floating mb-3">
    <label for="formrow-inputState" class="form-label">Services</label>
    <select id="formrow-inputState" class="form-select" name = "serviceID">
        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($service->id); ?>"><?php echo e($service->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
    <input type="submit">
</form>
</div>
</div>





<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Projects\Bityarn\Laravel Admin\Admin\resources\views/employeeServices.blade.php ENDPATH**/ ?>