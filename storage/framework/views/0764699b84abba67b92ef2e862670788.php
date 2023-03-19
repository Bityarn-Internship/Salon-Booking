<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Salon Booking | Invoice <?php echo e($booking->id); ?></title>

    <style>
        button{
            background-color: #414ab1;
            padding: 10px;
            border-radius: 5px;
            border: none;
            color: white;
            cursor: pointer;
        }
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        #total-text{
            text-align:center;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">Salon Booking</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice Id: #<?php echo e($booking->id); ?></span> <br>
                    <span>Date: <?php echo e(date('d/m/Y')); ?></span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Booking Details</th>
                <th width="50%" colspan="2">User Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Booking Id:</td>
                <td><?php echo e($booking->id); ?></td>

                <td>Full Name:</td>
                <td><?php echo e(\App\Http\Controllers\UsersController::getClientName($booking->clientID)); ?></td>
            </tr>
            <tr>
                <td>Booking Date:</td>
                <td><?php echo e(date('d/m/Y', strtotime($booking->date))); ?></td>

                <td>Phone:</td>
                <td><?php echo e($client->telephoneNumber); ?></td>
            </tr>
            <tr>
                <td>Booking Time:</td>
                <td><?php echo e(date('h:i a', strtotime($booking->time))); ?></td>

                <td>Email:</td>
                <td><?php echo e($client->email); ?></td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Booked Services
                </th>
            </tr>
            <tr class="bg-blue">
                <th>ID</th>
                <th>Service</th>
                <th>Cost</th>
                <th>Employee</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $bookedServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookedService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($bookedService->id); ?></td>
                <td><?php echo e(\App\Http\Controllers\ServicesController::getServiceName($bookedService->serviceID)); ?></td>
                <td class="fw-bold"><?php echo e(\App\Http\Controllers\ServicesController::getServiceCost($bookedService->serviceID).' KES'); ?></td>
                <td><?php echo e(\App\Http\Controllers\EmployeesController::getEmployeeName($bookedService->employeeID)); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td colspan="3" class="total-heading" id = "total-text">Total Amount:</td>
                <td colspan="1" class="total-heading"><?php echo e($booking->cost.' KES'); ?></td>
            </tr>
        </tbody>
    </table> 

    <br>
    <p class="text-center">
        Thank you booking with us!
    </p>
    <p class = "text-center">
        <a href="<?php echo e(url ('generateInvoice/'.$booking->id.'/generate')); ?>"><button>Download Invoice</button></a>
    </p>

</body>
</html><?php /**PATH D:\BITYARN\Salon-Booking\resources\views/generateInvoice.blade.php ENDPATH**/ ?>