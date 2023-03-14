<head>
    <?php echo $__env->make('layouts.head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link href = "//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel = "stylesheet">
</head>

<h4 class="card-title text-center">View Clients</h4>

<table id="clientsView" class="table mb-0">
    <thead>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Telephone Number</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($client->id); ?></td>
            <td><?php echo e($client->firstName); ?></td>
            <td><?php echo e($client->lastName); ?></td>
            <td><?php echo e($client->email); ?></td>
            <td><?php echo e($client->telephoneNumber); ?></td>
            <td>
                <a href="<?php echo e(url ('editClient/'.$client->id)); ?>">Edit</a>
                <a href="<?php echo e(url ('deleteClient/'.$client->id)); ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src = "//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function (){
        $('#clientsView').DataTable();
    });
</script>
<?php /**PATH C:\Users\User\Projects\Bityarn\Laravel Admin\Admin\resources\views/viewClients.blade.php ENDPATH**/ ?>