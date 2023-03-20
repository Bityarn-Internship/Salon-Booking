<head>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/forms.css')); ?>">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <form action = "<?php echo e(url('/updateBookedService/'.$bookedService->id)); ?>" method = "post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="row">
            
            <h5 class=" text-center py-2 text-primary">Edit Booked Services</h5>
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingnameInput" value="<?php echo e($bookedService->bookingID); ?>"  name="bookingID" readonly>
                    <label for="floatingnameInput">Booking ID</label>
                </div>
            </div>
        </div>
        <div class = "row">
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name = "serviceID">
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($service->id); ?>"><?php echo e($service->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <label for="floatingSelectGrid">Select service</label>
                    <div class="invalid-feedback">
                        <?php if($errors->has('serviceID')): ?>
                            <?php echo e($errors->first('serviceID')); ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class = "row">
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name = "employeeID">
                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->firstName.' '.$employee->lastName); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <label for="floatingSelectGrid">Select employee</label>
                    <div class="invalid-feedback">
                        <?php if($errors->has('employeeID')): ?>
                            <?php echo e($errors->first('employeeID')); ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="mt-4 d-grid">
            <button class="btn btn-primary waves-effect waves-light"
                    type="submit">Save</button>
        </div>
    </form>
</body>
<?php /**PATH C:\Users\User\Projects\Bityarn\salonBooking\resources\views/editBookedService.blade.php ENDPATH**/ ?>