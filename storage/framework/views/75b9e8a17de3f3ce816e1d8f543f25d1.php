<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>

</head>
<body>
<form action="<?php echo e(url('/bookings')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <h4>Service Name</h4>
    <select name="services[]" id="services" multiple>
        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($service->id); ?>"><?php echo e($service->name." - ".$service->cost); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <label for="date">Date</label>
    <input type="date" name="date">
    <label for="date">Time</label>
    <input type="time" name="time">
    <?php if(session()->get('user') == 'employee'): ?>
        <input hidden type="text" name="clientID" value = "<?php echo e($clientID); ?>">
    <?php else: ?>
        <input hidden type="text" name="clientID" value = "<?php echo e(Auth::user()->id); ?>">
    <?php endif; ?>
    <br>
    <div>
        <button type="submit" class="btn btn-primary w-md">Register</button>
    </div>

</form>



</body>


<script>
    new MultiSelectTag('services')  // id
</script>
<?php /**PATH C:\Users\User\Projects\Bityarn\Laravel Admin\Admin\resources\views//bookings.blade.php ENDPATH**/ ?>