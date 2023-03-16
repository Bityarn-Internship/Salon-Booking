<h3>Thank you for booking with us!</h3>

<p><?php echo $body; ?></p>
<h4>Booked Services:</h4>
<?php $__currentLoopData = $bookedServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookedService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p><?php echo \App\Http\Controllers\ServicesController::getServiceName($bookedService->serviceID).' service offered by '.\App\Http\Controllers\EmployeesController::getEmployeeName($bookedService->employeeID); ?></p>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<p>Thank you!</p>

Regards,<br/>Salon Booking System<?php /**PATH C:\Users\User\Projects\Bityarn\Laravel Admin\Admin\resources\views/sendBookingEmail.blade.php ENDPATH**/ ?>