<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
<form action="<?php echo e(url('/bookings')); ?>" method="POST">
<h4>Service Name</h4>
    <select name="services" id="services" multiple>
        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($service->id); ?>"><?php echo e($service->name." - ".$service->cost); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <label for="date">Date</label>
    <input type="date" name="date">
    <label for="time">Time</label>
    <input type="time" name="time">
    <br>
    <input type="submit">
</form>


<script>
    new MultiSelectTag('services')  // id

</script>
<?php /**PATH D:\BITYARN\Salon-Booking\resources\views/bookings.blade.php ENDPATH**/ ?>