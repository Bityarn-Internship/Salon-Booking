<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon | Employee Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/forms.css')); ?>">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>

<body>
    <form action = "<?php echo e(url('/employeeServices')); ?>" method = "post" enctype="multipart/form-data">
        <h5 class="card-title text-center">Employee Services Details</h5></br>
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <?php if($errors->has('employeeID')): ?>
                <div class = "alert alert-danger" role = "alert">
                    <?php echo e($errors->first('employeeID')); ?>

                </div>
            <?php endif; ?>
            <label for="formrow-inputState" class="form-label">Employee Name: </label>

            <select id="formrow-inputState" class="form-select" name = "employeeID">
                <option disabled selected>Select the employee</option>
                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->firstName." ".$employee->latName); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="mb-3">
            <?php if($errors->has('serviceID')): ?>
                <div class = "alert alert-danger" role = "alert">
                    <?php echo e($errors->first('serviceID')); ?>

                </div>
            <?php endif; ?>
            <label for="formrow-inputState" class="form-label">Service Name: </label>
            <select id="formrow-inputState" class="form-select" name = "serviceID">
                <option disabled selected>Select the service employee offers</option>
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($service->id); ?>"><?php echo e($service->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <center>
            <div>
                <button type="submit" class="btn btn-primary w-md">Register</button>
            </div>
        </center>
    </form>
</body><?php /**PATH D:\BITYARN\Salon-Booking\resources\views/employeeServices.blade.php ENDPATH**/ ?>