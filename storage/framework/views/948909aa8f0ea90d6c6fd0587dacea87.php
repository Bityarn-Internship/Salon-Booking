<head>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/forms.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
<form action = "<?php echo e(url('/updateBooking/'.$booking->id)); ?>" method = "post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-12">
            <h5 class=" text-center py-2">Edit Booking Details</h5>
                <div class="form-floating mb-3">
                    <input hidden name = "bookingID" value = "<?php echo e($booking->id); ?>">
                    <input type="text" class="form-control" id="floatingnameInput" value="<?php echo e(\App\Http\Controllers\UsersController::getClientName($booking->clientID)); ?>" name="name" readonly>
                    <label for="floatingnameInput">Client Name</label>
                </div>
            </div>
        </div>
        <div class = "row mb-3">
            <div class="col-md-6">
                <?php if($errors->has('date')): ?>
                    <div class = "alert alert-danger" role = "alert">
                        <?php echo e($errors->first('date')); ?>

                    </div>
                <?php endif; ?>
                <input type="date" class="form-control" name="date">
            </div>
            <div class="col-md-6">
                <?php if($errors->has('time')): ?>
                    <div class = "alert alert-danger" role = "alert">
                        <?php echo e($errors->first('time')); ?>

                    </div>
                <?php endif; ?>
                <input type="time" name="time" class = "form-control">
            </div>
        </div>
        <center>
            <div>
                <button type="submit" class="btn btn-primary w-md">Save</button>
            </div>
        </center>
    </form>
</body>

<?php /**PATH C:\Users\User\Projects\Bityarn\salonBooking\resources\views/editBooking.blade.php ENDPATH**/ ?>