<head>
    <?php echo $__env->make('layouts.head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link href = "//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel = "stylesheet">
</head>

<h4 class="card-title text-center">Employee Services</h4>

<table id="employeeServicesView" class="table mb-0">
    <thead>
    <tr>
        <th>ID</th>
        <th>Employee Name</th>
        <th>Service Name</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $employeeServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employeeService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>

            <td><?php echo e($employeeService->id); ?></td>
            <td><?php echo e(\App\Http\Controllers\EmployeesController::getEmployeeName($employeeService->employeeID)); ?></td>
            <td><?php echo e(\App\Http\Controllers\ServicesController::getServiceName($employeeService->serviceID)); ?></td>
            <td>
                <a href="<?php echo e(url ('editEmployeeService/'.$employeeService->id)); ?>">Edit</a>
                <a href="<?php echo e(url ('deleteEmployeeService/'.$employeeService->id)); ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src = "//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function (){
        $('#employeeServicesView').DataTable();
    });
</script>
<?php /**PATH D:\BITYARN\Salon-Booking\resources\views/viewEmployeeServices.blade.php ENDPATH**/ ?>