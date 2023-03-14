<head>
    <?php echo $__env->make('layouts.head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link href = "//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel = "stylesheet">
</head>

<h4 class="card-title text-center">View Services</h4>
<div class="col col-md-11 text-right">
   <h3><a href="<?php echo e(url('restoreServices')); ?>"><b>Restore All</b></a></h3>
</div>
<table id="servicesView" class="table mb-0">
    <thead>
    <tr>
        <th>ID</th>
        <th>Service Name</th>
        <th>Cost</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($service->id); ?></td>
            <td><?php echo e($service->name); ?></td>
            <td><?php echo e($service->cost); ?></td>
            <td><a href="<?php echo e(url ('restoreService/'.$service->id)); ?>">Restore</a></td>

        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src = "//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function (){
        $('#servicesView').DataTable();
    });
</script>
<?php /**PATH C:\Users\User\Projects\Bityarn\Laravel Admin\Admin\resources\views/ViewTrashedServices.blade.php ENDPATH**/ ?>