<head>
    <?php echo $__env->make('layouts.head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link href = "//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel = "stylesheet">
</head>

<h4 class="card-title text-center">View Bookings</h4>

<table id="bookingsView" class="table mb-0">
    <thead>
    <tr>
        <th>Client Name</th>
        <th>Employee Name</th>
        <th>Service Name</th>
        <th>Date</th>
        <th>Time</th>
        <th>Total Cost</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e(\App\Http\Controllers\UsersController::getClientName($booking->clientID)); ?></td>
            <td><?php echo e(\App\Http\Controllers\EmployeesController::getEmployeeName($booking->employeeID)); ?></td>
            <td><?php echo e(\App\Http\Controllers\ServicesController::getServiceName($booking->serviceID)); ?></td>
            <td><?php echo e($booking->date); ?></td>
            <td><?php echo e($booking->time); ?></td>
            <td><?php echo e($booking->cost); ?></td>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




        </tr>

    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src = "//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function (){
        $('#bookingsView').DataTable();
    });
</script>
<?php /**PATH D:\BITYARN\Salon-Booking\resources\views/viewCompletedBookings.blade.php ENDPATH**/ ?>