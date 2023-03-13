<head>
    <?php echo $__env->make('layouts.head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<h4 class="card-title text-center">View Services</h4>

<table id="servicesView" class="table mb-0">

    <thead>
    <tr>
        <th>ID</th>
        <th>Service Name</th>
        <th>Cost</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($service->id); ?></td>
            <td><?php echo e($service->serviceName); ?></td>
            <td><?php echo e($service->serviceCost); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>
<script>
    $(document).ready(function (){
        $('#servicesView').DataTable();
    });
</script>
<?php /**PATH D:\BITYARN\Salon-Booking\resources\views/ViewTrashedServices.blade.php ENDPATH**/ ?>