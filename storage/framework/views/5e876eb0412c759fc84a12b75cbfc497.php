<head>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/forms.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
<form action = "<?php echo e(url('/updateEmployee/'.$employee->id)); ?>" method = "post">
    <?php echo csrf_field(); ?>
    <div class="row">
        <h5 class=" text-center py-2">Edit Employee Details</h5>
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

    <div class="mb-3">
        <?php if($errors->has('positionID')): ?>
            <div class = "alert alert-danger" role = "alert">
                <?php echo e($errors->first('positionID')); ?>

            </div>
        <?php endif; ?>
        <select id="formrow-inputState" class="form-select" name = "positionID">
            <option disabled selected value="">Select the position</option>
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
                <button type="submit" class="btn btn-primary w-md">Save</button>
            </div>
        </center>
    </form>
</body>
<?php /**PATH D:\BITYARN\Salon-Booking\resources\views/editEmployee.blade.php ENDPATH**/ ?>