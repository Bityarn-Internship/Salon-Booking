<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href = "//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel = "stylesheet">
</head>

<h4 class="text-center py-2">View Bookings</h4>
<div class="container ">
    <div class="row">
        <table id="bookingsView" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Client Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Cost</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($booking->id); ?></td>
                    <td><?php echo e(\App\Http\Controllers\UsersController::getClientName($booking->clientID)); ?></td>
                    <td><?php echo e($booking->date); ?></td>
                    <td><?php echo e($booking->time); ?></td>
                    <td><?php echo e($booking->cost); ?></td>
                    <td><?php echo e($booking->status); ?></td>

                    <td>
                        <a class="btn btn-success" href="<?php echo e(url ('completePayment/'.$booking->id)); ?>">Complete Payment</a>
                        <a class="btn btn-primary" target = "_blank" href="<?php echo e(url ('viewInvoice/'.$booking->id)); ?>">View Invoice</a>
                        <a class="btn btn-info" href="<?php echo e(url ('editBooking/'.$booking->id)); ?>">Edit</a>
                        <a class="btn btn-danger" href="<?php echo e(url ('deleteBooking/'.$booking->id)); ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src = "//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function (){
        $('#bookingsView').DataTable();
    });
</script>
<?php /**PATH C:\Users\User\Projects\Bityarn\salonBooking\resources\views/viewBookings.blade.php ENDPATH**/ ?>