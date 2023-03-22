<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
    <h2>Modal Example</h2>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Edit</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div>
                        <h5 class = "text-primary text-center">Edit Booking</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="container-fluid p-0">
                            <div class="row g-0">

                                <div class="col-xl-5 mx-auto">
                                    <div class="auth-full-page-content p-md-5 p-4">
                                        <div class="w-100">
                                            <div class="d-flex flex-column h-100">

                                                <div class="my-auto">


                                                    <div class="mt-4">
                                                        <form action = "" method = "post" enctype="multipart/form-data">
                                                            <?php echo csrf_field(); ?>
                                                            <div class = "row">
                                                                <div class="valid-feedback">
                                                                    <?php if(session()->has('message')): ?>
                                                                        <?php echo e(session()->get('message')); ?>

                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 pt-2">
                                                                    <div class="form-floating mb-3">
                                                                        <label for="floatingemailInput">Booking ID</label>
                                                                        <input type="text" class="form-control" id="floatingemailInput" value = ""name = "bookingID" readonly>

                                                                    </div>
                                                                    <div class="invalid-feedback">
                                                                        <?php if($errors->has('bookingID')): ?>
                                                                            <?php echo e($errors->first('bookingID')); ?>

                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6 pt-2">
                                                                    <div class="form-floating mb-3">
                                                                        <label for="floatingemailInput">Date</label>
                                                                        <input type="date" class="form-control" id="floatingemailInput" placeholder="Select a date..." name = "date">

                                                                    </div>
                                                                    <div class="invalid-feedback">
                                                                        <?php if($errors->has('date')): ?>
                                                                            <?php echo e($errors->first('date')); ?>

                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 pt-2">
                                                                    <div class="form-floating mb-3">
                                                                        <label for="floatingemailInput">Time</label>
                                                                        <input type="time" class="form-control" id="floatingemailInput" placeholder="Select a time..." name = "time">

                                                                    </div>
                                                                    <div class="invalid-feedback">
                                                                        <?php if($errors->has('time')): ?>
                                                                            <?php echo e($errors->first('time')); ?>

                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end container-fluid -->
                    </div>
                </div>

                <div class="modal-footer">
                    <center>
                    <button class="btn btn-primary waves-effect waves-light"
                            type="submit">Save</button>
                </center>
                </div>

            </div>

        </div>
    </div>

</div>

</body>
</html>
<?php /**PATH D:\BITYARN\Salon-Booking\resources\views/custom/bookings/trial.blade.php ENDPATH**/ ?>