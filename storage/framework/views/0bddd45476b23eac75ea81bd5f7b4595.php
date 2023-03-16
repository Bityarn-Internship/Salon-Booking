<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon | Positions</title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/forms.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <form action = "<?php echo e(url('/positions')); ?>" method = "post">
        <?php echo csrf_field(); ?>
        <?php if(session()->has('message')): ?>
            <div class="alert alert-info">
                <?php echo e(session()->get('message')); ?>

            </div>
        <?php endif; ?>
        <h5 class="card-title text-center">Edit Position</h5><br/>
        <div class="form-floating mb-3">
            <?php if($errors->has('positionName')): ?>
                <div class = "alert alert-danger" role = "alert">
                    <?php echo e($errors->first('positionName')); ?>

                </div>
            <?php endif; ?>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingnameInput" placeholder="Enter the position..." name = "positionName" value="<?php echo e($position->name); ?>">
                <label for="floatingnameInput">Position Name</label>
            </div>
        </div>

        <div class="form-floating mb-3">
            <?php if($errors->has('positionDescription')): ?>
                <div class = "alert alert-danger" role = "alert">
                    <?php echo e($errors->first('positionDescription')); ?>

                </div>
            <?php endif; ?>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingemailInput" placeholder="Describe the position..." name = "positionDescription" value="<?php echo e($position->description); ?>">
                <label for="floatingemailInput">Position Description</label>
            </div>
        </div>
        <div class = "text-center">
            <button type="submit" class="btn btn-primary w-md">Submit</button>
        </div>
    </form>
</body>
</html><?php /**PATH C:\Users\User\Projects\Bityarn\Laravel Admin\Admin\resources\views/editPosition.blade.php ENDPATH**/ ?>