<head>
    <?php echo $__env->make('layouts.head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link href = "//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel = "stylesheet">
</head>

<h4 class="card-title text-center">View Booked Services</h4>

<table id="bookedServicesView" class="table mb-0">
    <thead>
    <tr>
        <th>ID</th>
        <th>Booking ID</th>
        <th>Service Name</th>
        <th>Employee Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $bookedServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookedService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($bookedService->id); ?></td>
            <td><?php echo e($bookedService->bookingID); ?></td>
            <td><?php echo e(\App\Http\Controllers\ServicesController::getServiceName($bookedService->serviceID)); ?></td>
            <td><?php echo e(\App\Http\Controllers\EmployeesController::getEmployeeName($bookedService->employeeID)); ?></td>

            <td>
                <a href="<?php echo e(url ('editBookedService/'.$bookedService->id)); ?>">Edit</a>
                <a href="<?php echo e(url ('deleteBookedService/'.$bookedService->id)); ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src = "//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function (){
        $('#bookedServicesView').DataTable();
    });
</script>
<?php /**PATH C:\Users\User\Projects\Bityarn\Laravel Admin\Admin\resources\views/viewBookedServices.blade.php ENDPATH**/ ?>