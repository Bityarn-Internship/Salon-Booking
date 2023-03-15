<link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<body>
<section>
<form action="<?php echo e(url('/bookings')); ?>" method="POST">
    <?php $__currentLoopData = $employeeServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employeeService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class=" container">
        <div class=" content">

            <div class="card">
                <div class="card-content">

                    <div class="image">
                        <img src="" alt="">
                    </div>
                    <div class="profession">
                        <span class="name">
                            Employee Name: <?php echo e(\App\Http\Controllers\EmployeesController::getEmployeeName($employeeService->employeeID)); ?>

                        </span>
                        <br>
                        <span class="name">
                            Service:  <?php echo e(\App\Http\Controllers\ServicesController::getServiceName($employeeService->serviceID)); ?>

                        </span>
                    </div>
                    <div>
                        <input type="checkbox" class="check-service">
                    </div>

                </div>

            </div>
        </div>

    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</form>

</section>

</body>
























<?php /**PATH D:\BITYARN\Salon-Booking\resources\views/employeeServices.blade.php ENDPATH**/ ?>