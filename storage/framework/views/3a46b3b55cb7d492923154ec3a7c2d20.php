<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href = "//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel = "stylesheet">
</head>

<h4 class="text-center py-2">Inactive Employees</h4>
<div class="container ">
    <div class="row">
        <div class="col col-md-11 text-right">
            <h3><a class="btn btn-primary" href="<?php echo e(url('restoreEmployees')); ?>"><b>Restore All</b></a></h3>
        </div>
        <table id="employeesView" class="table table-striped" style="width:100%">
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
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src = "//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function (){
        $('#employeesView').DataTable();
    });
</script>
<?php /**PATH D:\BITYARN\Salon-Booking\resources\views/ViewTrashedEmployees.blade.php ENDPATH**/ ?>