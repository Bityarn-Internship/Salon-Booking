<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Inactive Mpesa Payments'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link href="<?php echo e(URL::asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet"
          type="text/css" />
    <link href="<?php echo e(URL::asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet"
          type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?php echo e(URL::asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>"
          rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title text-primary text-center">Inactive Mpesa Payments</h4>

                    <div class="table-responsive">
                        <div class="col col-md-11 text-right">
                           <span style="display: inline-block"><h3><a class="btn btn-primary" href="<?php echo e(url('restoreMpesaPayments')); ?>"><b>Restore All</b>
                            <i class="fas fa-trash-restore"></i></a></h3></span>
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Transaction ID</th>
                                <th>Transaction Date</th>
                                <th>Amount</th>
                                <th>Currency </th>
                                <th>Telephone Number</th>
                                <th>Booking ID </th>
                                <th colspan="3">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $mpesapayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mpesapayment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($mpesapayment-> transactionID); ?></td>
                                    <td><?php echo e($mpesapayment-> transactionDate); ?></td>
                                    <td><?php echo e($mpesapayment-> amount); ?></td>
                                    <td><?php echo e($mpesapayment-> currency); ?></td>
                                    <td><?php echo e($mpesapayment-> telephoneNumber); ?></td>
                                    <td><?php echo e($mpesapayment-> bookingID); ?></td>
                                    <td><a class="btn btn-primary" href="<?php echo e(url ('restoreMpesaPayment/'.$mpesapayment->id)); ?>" title="Restore">
                                            <i class="fas fa-trash-restore"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- Required datatable js -->
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <!-- Buttons examples -->
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/pdfmake/build/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/pdfmake/build/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')); ?>"></script>

    <!-- Responsive examples -->
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')); ?>"></script>
    <!-- Datatable init js -->
    <script src="<?php echo e(URL::asset('/assets/js/pages/datatables.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BITYARN\Salon-Booking\resources\views/custom/payments/ViewTrashedMpesaPayments.blade.php ENDPATH**/ ?>