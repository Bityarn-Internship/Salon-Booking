<head>
    <?php echo $__env->make('layouts.head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link href = "//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel = "stylesheet">
</head>

<h4 class="card-title text-center">View Paypal Payments</h4>
<div class="col col-md-11 text-right">
    <h3><a class="deletebutton" href="<?php echo e(url('restoreAllPaypalPayments')); ?>">Restore All</a></h3>
</div>
<table id="paypalView" class="table mb-0">
    <thead>
    <tr>
        <th>Payment ID</th>
        <th>Payer ID</th>
        <th>Payer Email</th>
        <th>Booking ID</th>
        <th>Total Cost </th>
        <th>Currency </th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $paypalpayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paypalpayment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($paypalpayment-> payment_id); ?></td>
            <td><?php echo e($paypalpayment-> payer_id); ?></td>
            <td><?php echo e($paypalpayment-> payer_email); ?></td>
            <td><?php echo e($paypalpayment-> bookingID); ?></td>
            <td><?php echo e($paypalpayment-> amount); ?></td>
            <td><?php echo e($paypalpayment-> currency); ?></td>
            <td><a class="deletebutton" href="<?php echo e(url ('restorePaypalPayment/'.$paypalpayment->id)); ?>">Restore</a></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src = "//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function (){
        $('#paypalView').DataTable();
    });
</script>
<?php /**PATH D:\BITYARN\Salon-Booking\resources\views/ViewTrashedPaypalPayments.blade.php ENDPATH**/ ?>