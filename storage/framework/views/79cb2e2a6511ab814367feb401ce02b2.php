<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon | Login</title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/forms.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <form action="<?php echo e(url('/login')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php if(session()->has('message')): ?>
            <div class="alert alert-info">
                <?php echo e(session()->get('message')); ?>

            </div>
        <?php endif; ?>
        <div class="container2 justify-content-center">
            <!-- Email input -->
            <h3 class = "text-center">LOGIN</h3>
            <div class="form-outline mb-4">
                <?php if($errors->has('email')): ?>
                    <div class = "alert alert-danger" role = "alert">
                        <?php echo e($errors->first('email')); ?>

                    </div>
                <?php endif; ?>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingnameInput" placeholder="Enter Your email" name="email">
                    <label for="floatingnameInput">Email Address</label>
                </div>
            </div>
            <div class="form-outline mb-4">
                <?php if($errors->has('password')): ?>
                    <div class = "alert alert-danger" role = "alert">
                        <?php echo e($errors->first('password')); ?>

                    </div>
                <?php endif; ?>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingnameInput" placeholder="Enter Your password" name="password">
                    <label for="floatingnameInput">Password</label>
                </div>
            </div>

            <div class="col">
                <!-- Simple link -->
                <a style = "text-decoration:none" class="text-right" href="#!">Forgot password?</a>
            </div>

            <div class="text-center ">
                <button type="submit" class="btn btn-primary btn-block ">Sign in</button>
            </div>

        </div>
    </form>
</body>
</html><?php /**PATH C:\Users\User\Projects\Bityarn\Laravel Admin\Admin\resources\views/login.blade.php ENDPATH**/ ?>