<head>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/forms.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <form action="<?php echo e(url('/updateClient/'.$client->id)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="row">
            <h5 class=" text-center py-2">Edit Client Details</h5>
            <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" value="<?php echo e($client->firstName); ?>" name="firstName" id="floatingnameInput" placeholder="Enter Your First Name">
                        <label for="floatingnameInput">First Name</label>
                    </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" value="<?php echo e($client->lastName); ?>" name="lastName" id="floatingnameInput" placeholder="Enter Your Last Name">
                    <label for="floatingnameInput">Last Name</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" value="<?php echo e($client->email); ?>" name="email" id="floatingnameInput" placeholder="Enter Your Email">
                    <label for="floatingnameInput">Email</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" value="<?php echo e($client->telephoneNumber); ?>" name="telephoneNumber"  id="floatingnameInput" placeholder="Enter Your Telephone Number">
                    <label for="floatingnameInput">Telephone Number</label>
                </div>
            </div>
        </div>
        <center>
            <div>
                <button type="submit" class="btn btn-primary w-md">Register</button>
            </div>
        </center>
    </form>
</body>

<?php /**PATH D:\BITYARN\Salon-Booking\resources\views/editClient.blade.php ENDPATH**/ ?>