<head>
    <?php echo $__env->make('layouts.head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link href = "//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel = "stylesheet">
</head>

<h4 class="card-title text-center">View Employees</h4>

<table id="employeesView" class="table mb-0">
    <thead>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Telephone Number</th>
        <th>ID Number</th>
        <th>Position</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($employee->id); ?></td>
            <td><?php echo e($employee->firstName); ?></td>
            <td><?php echo e($employee->lastName); ?></td>
            <td><?php echo e($employee->email); ?></td>
            <td><?php echo e($employee->telephoneNumber); ?></td>
            <td><?php echo e($employee->IDNumber); ?></td>
            <td><?php echo e(\App\Http\Controllers\PositionsController::getPositionName($employee->positionID)); ?></td>
            <td>
                <a href="<?php echo e(url ('editEmployee/'.$employee->id)); ?>">Edit</a>
                <a href="<?php echo e(url ('deleteEmployee/'.$employee->id)); ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src = "//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function (){
        $('#employeesView').DataTable();
    });
</script>
<?php /**PATH C:\Users\User\Projects\Bityarn\Laravel Admin\Admin\resources\views/viewEmployees.blade.php ENDPATH**/ ?>