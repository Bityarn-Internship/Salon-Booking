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













                        </tbody>
                    </table>
    <script>
        $(document).ready(function (){
            $('#servicesView').DataTable();
        });
    </script>
<?php /**PATH D:\BITYARN\Salon-Booking\resources\views/viewServices.blade.php ENDPATH**/ ?>