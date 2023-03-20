<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon | Services</title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/forms.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <form action="<?php echo e(url('/checkTransaction')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <!-- Email input -->
        <div class="container2 justify-content-center">
            <h3 class = "text-center">MPESA Confirmation</h3>
            <div class="form-outline mb-4">
                <?php if(session()->has('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session()->get('message')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="form-outline mb-4">
                <?php if($errors->has('transaction')): ?>
                    <div class = "alert alert-danger" role = "alert">
                        <?php echo e($errors->first('transaction')); ?>

                    </div>
                <?php endif; ?>
                <input hidden value = "<?php echo e($bookingID); ?>" name = "bookingID">
                <label for="transaction" class="form-label">Transaction Code</label>
                <input type="text" class="form-control" id="transaction" name = "transaction" placeholder="e.g. RB97B5WMYN">

            </div>
        
            <div class="text-center ">
                <button type="submit" class="btn btn-primary btn-block ">Confirm</button>
            </div>
        </div>
    </form>
</body>
</html><?php /**PATH C:\Users\User\Projects\Bityarn\salonBooking\resources\views/mpesaConfirmation.blade.php ENDPATH**/ ?>