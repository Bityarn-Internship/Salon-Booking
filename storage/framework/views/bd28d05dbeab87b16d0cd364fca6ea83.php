<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon | Register Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/forms.css')); ?>">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <form action = "<?php echo e(url('/employees')); ?>" method = "post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
        <h5 class="card-title text-center">Employee Details</h5><br/>
        <div class="row">
            <div class="col-md-6">
                <?php if($errors->has('firstName')): ?>
                    <div class = "alert alert-danger" role = "alert">
                        <?php echo e($errors->first('firstName')); ?>

                    </div>
                <?php endif; ?>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingnameInput" placeholder="Enter Your First Name" name="firstName">
                    <label for="floatingnameInput">First Name</label>
                </div>
            </div>
            <div class="col-md-6">
                <?php if($errors->has('lastName')): ?>
                    <div class = "alert alert-danger" role = "alert">
                        <?php echo e($errors->first('lastName')); ?>

                    </div>
                <?php endif; ?>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingnameInput" placeholder="Enter Your Last Name" name="lastName">
                    <label for="floatingnameInput">Last Name</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?php if($errors->has('email')): ?>
                    <div class = "alert alert-danger" role = "alert">
                        <?php echo e($errors->first('email')); ?>

                    </div>
                <?php endif; ?>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingnameInput" placeholder="Enter Your Email" name="email">
                    <label for="floatingnameInput">Email</label>
                </div>
            </div>
            <div class="col-md-6">
                <?php if($errors->has('telephoneNumber')): ?>
                    <div class = "alert alert-danger" role = "alert">
                        <?php echo e($errors->first('telephoneNumber')); ?>

                    </div>
                <?php endif; ?>
                <div class="form-floating mb-3">
                    <input type="tel" class="form-control" id="floatingnameInput" placeholder="Enter Your Telephone Number" name="telephoneNumber">
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
            <?php if($errors->has('IDNumber')): ?>
                <div class = "alert alert-danger" role = "alert">
                    <?php echo e($errors->first('IDNumber')); ?>

                </div>
            <?php endif; ?>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingnameInput" placeholder="Enter the ID Number..." name="IDNumber">
                <label for="floatingnameInput">National ID Number/ Passport Number</label>
            </div>
        </div>
        <div class="form-floating mb-3">
            <?php if($errors->has('password')): ?>
                <div class = "alert alert-danger" role = "alert">
                    <?php echo e($errors->first('password')); ?>

                </div>
            <?php endif; ?>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingnameInput" placeholder="Enter the password..." name="password">
                <label for="floatingnameInput">Password</label>
            </div>
        </div>

        <div class="form-floating mb-3">
            <?php if($errors->has('confirmPassword')): ?>
                <div class = "alert alert-danger" role = "alert">
                    <?php echo e($errors->first('confirmPassword')); ?>

                </div>
            <?php endif; ?>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingemailInput" placeholder="Enter the cost..." name="confirmPassword">
                <label for="floatingemailInput">Confirm Password</label>
            </div>
        </div>
        <center>
            <div>
                <button type="submit" class="btn btn-primary w-md">Register</button>
            </div>
        </center>
    </form>
    
</body>
</html><?php /**PATH C:\Users\User\Projects\Bityarn\Laravel Admin\Admin\resources\views/employees.blade.php ENDPATH**/ ?>