<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('View Mpesa Payments'); ?>
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

                    <h4 class="card-title text-primary text-center">View Mpesa Payments</h4>

                    <div class="table-responsive">
                        <div class="d-flex gx-10">
                            <div class="col">
                                <?php if($status == 'Inactive'): ?> 
                                    <a href = "/restoreMpesaPayments"><button type="button" class="btn btn-primary">
                                        <b>Restore All</b>
                                        <i class="fas fa-trash-restore"></i>
                                    </button></a>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-4">
                                <form action = "<?php echo e(url('/viewMpesaPayments')); ?>" method = "GET">
                                    <?php echo csrf_field(); ?>
                                    <span style="display: inline-block"><label for="status" class="form-label">Filter by status</label></span>
                                    <span style="display: inline-block">
                                        <select class="form-select" name = "status">
                                            <option value = "Active">Active</option>
                                            <option value = "Inactive">Inactive</option>
                                        </select>
                                        
                                    </span>
                                
                                    <span style="display: inline-block"><h3><button class="btn btn-primary"><b>Filter</b></button></h3></span>
                                </form>
                                
                            </div>
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
                                <th>Actions</th>
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
                                    <td> 
                                        <?php if($status != 'Inactive'): ?> 
                                        <a class="btn btn-outline-danger btn-sm edit" href="<?php echo e(url ('deleteMpesaPayment/'.$mpesapayment->id)); ?>" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <?php else: ?>
                                            <a class="btn btn-outline-primary btn-sm edit" href="<?php echo e(url ('restoreMpesaPayment/'.$mpesaPayment->id)); ?>" title="Restore">
                                                <i class="fas fa-trash-restore"></i>
                                            </a>
                                        <?php endif; ?>
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







<?php echo $__env->make('custom.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/User/Projects/Bityarn/Salon-Booking/resources/views/custom/payments/viewMpesaPayments.blade.php ENDPATH**/ ?>