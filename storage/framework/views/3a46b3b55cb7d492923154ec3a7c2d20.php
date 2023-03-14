<head>
    <?php echo $__env->make('layouts.head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link href = "//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel = "stylesheet">
</head>

<h4 class="card-title text-center">View Trashed Positions</h4>
<div class="col col-md-11 text-right">
    <h3><a href="<?php echo e(url('restoreEmployees')); ?>"><b>Restore All</b></a></h3>
</div>
<table id="positionsView" class="table mb-0">
    <thead>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Telephone Number</th>
        <th>ID Number</th>
        <th>Position ID</th>
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
            <td><?php echo e($employee->positionID); ?></td>
            <td><a href="<?php echo e(url ('restoreEmployee/'.$employee->id)); ?>">Restore</a></td>

        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src = "//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function (){
        $('#positionsView').DataTable();
    });
</script>
<?php /**PATH D:\BITYARN\Salon-Booking\resources\views/ViewTrashedEmployees.blade.php ENDPATH**/ ?>