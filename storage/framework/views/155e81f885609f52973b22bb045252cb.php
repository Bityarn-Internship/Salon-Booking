<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Profile'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <div class="row">
        <div class="col-xl-5">
            <div class="card overflow-hidden">
                <div class="bg-primary bg-soft">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-3">
                                <h5 class="text-primary">Welcome Back !</h5>
                                <p>Hi, <?php echo e($employee->firstName." ".$employee->lastName); ?> </p>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="profile-img">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    
                                    <div class="mt-4">
                                        <a href="" class="btn btn-primary waves-effect waves-light btn-sm" data-bs-toggle="modal" data-bs-target=".update-profile">Edit Profile</a>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="pt-4">


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Personal Information
                        <span class="px-auto"><i class="fas fa-pencil-alt btn btn-outline-primary btn-sm edit" data-bs-toggle="modal" data-bs-target="#editModal"></i>
                    </span>
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center w-100" id="editModalLabel">Edit Employee Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action = "<?php echo e(url('/changeDetails/'.$employee->id)); ?>" method = "post" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class="row">
                                                <?php if(session()->has('message')): ?>
                                                    <div class="valid-feedback">
                                                        <?php echo e(session()->get('message')); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingnameInput" value = "<?php echo e($employee->firstName); ?>" name = "firstName">
                                                        <label for="floatingnameInput">First Name</label>
                                                    </div>

                                                    <div class="invalid-feedback">
                                                        <?php if($errors->has('firstName')): ?>
                                                            <?php echo e($errors->first('firstName')); ?>

                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingnameInput" value = "<?php echo e($employee->lastName); ?>" name = "lastName">
                                                        <label for="floatingnameInput">Last Name</label>
                                                    </div>

                                                    <div class="invalid-feedback">
                                                        <?php if($errors->has('lastName')): ?>
                                                            <?php echo e($errors->first('lastName')); ?>

                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="email" class="form-control" id="floatingnameInput" value = "<?php echo e($employee->email); ?>" name = "email">
                                                        <label for="floatingnameInput">Email Address</label>
                                                    </div>

                                                    <div class="invalid-feedback">
                                                        <?php if($errors->has('email')): ?>
                                                            <?php echo e($errors->first('email')); ?>

                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="tel" class="form-control" id="floatingnameInput" value = "<?php echo e($employee->telephoneNumber); ?>" name = "telephoneNumber">
                                                        <label for="floatingnameInput">Telephone Number</label>
                                                    </div>

                                                    <div class="invalid-feedback">
                                                        <?php if($errors->has('telephoneNumber')): ?>
                                                            <?php echo e($errors->first('telephoneNumber')); ?>

                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingnameInput" value = "<?php echo e($employee->IDNumber); ?>" name = "IDNumber">
                                                        <label for="floatingnameInput">ID Number / Passport Number</label>
                                                    </div>

                                                    <div class="invalid-feedback">
                                                        <?php if($errors->has('IDNumber')): ?>
                                                            <?php echo e($errors->first('IDNumber')); ?>

                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class = "row">
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name = "positionID">
                                                            <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($position->id); ?>"><?php echo e($position->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <label for="floatingSelectGrid">Select a position</label>
                                                        <div class="invalid-feedback">
                                                            <?php if($errors->has('positionID')): ?>
                                                                <?php echo e($errors->first('positionID')); ?>

                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-4 d-grid">
                                                <button class="btn btn-primary waves-effect waves-light"
                                                        type="submit">Save Changes</button>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </h4>
                    <div class="table-responsive">
                        <table class="table table-nowrap mb-0">
                            <tbody>
                            <tr>
                                <th scope="row">Full Name : </th>
                                <td><?php echo e($employee->firstName); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Last Name :</th>
                                <td><?php echo e($employee->lastName); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">E-mail :</th>
                                <td><?php echo e($employee->email); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Telephone Number :</th>
                                <td><?php echo e($employee->telephoneNumber); ?></td>
                            </tr>
                            <tr>
                                <th scope="row"> National ID:</th>
                                <td><?php echo e($employee->IDNumber); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Position Name :</th>
                                <td><?php echo e(\App\Http\Controllers\PositionsController::getPositionName($employee->positionID)); ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end card -->

            <!-- end card -->
        </div>

        <div class="col-xl-7">

            <div class="row">
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium mb-2">My Services</p>
                                    <h4 class="mb-0"></h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                    <span class="avatar-title">
                                        <i class="bx bx-envelope font-size-24"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium mb-2">Booked Clients</p>
                                    <h4 class="mb-0"></h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="avatar-sm mini-stat-icon rounded-circle bg-primary">
                                    <span class="avatar-title">
                                        <i class="bx bx-calendar font-size-24"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium mb-2">Total Cost</p>
                                    <h4 class="mb-0"></h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="avatar-sm mini-stat-icon rounded-circle bg-primary">
                                    <span class="avatar-title">
                                        <i class="bx bx-dollar font-size-24"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4 ">Change Password</h4>
                    <form action="<?php echo e(route('changePassword')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="">Old Password</label>
                            <input id="oldInput" type="password" name="oldPassword" class="form-control">
                            <?php if($errors->has('oldPassword')): ?>
                                <span style="color: red;" class="text-danger"><?php echo e($errors->first('oldPassword')); ?></span>
                            <?php endif; ?>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label>New Password</label>
                            <input id="newInput" type="password" name="password" class="form-control" />
                            <?php if($errors->has('password')): ?>
                                <span style="color: red;" class="text-danger"><?php echo e($errors->first('password')); ?></span>
                            <?php endif; ?>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label>Confirm Password</label>
                            <input id="confirmInput" type="password" name="confirmPassword" class="form-control">
                            <?php if($errors->has('confirmPassword')): ?>
                                <span style="color: red;" class="text-danger"><?php echo e($errors->first('confirmPassword')); ?></span>
                            <?php endif; ?>
                        </div>
                        <input type="checkbox" onclick="myFunction()">Show Password
                        <div class="mb-3 text-end">
                            <hr>

                            <button type="submit" class="btn btn-primary waves-effect waves-light btn-sm">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Upcoming Bookings</h4>
                    <div class="table-responsive">
                        <table class="table table-nowrap table-hover mb-0">
                            <thead>
                            <tr>
                                <th class="align-middle">ID</th>
                                <th class="align-middle">Client Name</th>
                                <th class="align-middle">Date</th>
                                <th class="align-middle">Time</th>
                                <th class="align-middle">Cost</th>
                                <th class="align-middle">Payment Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $upcomingBookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upcomingBooking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-body fw-bold"><?php echo e($upcomingBooking->id); ?></a> </td>
                                    <td><?php echo e(\App\Http\Controllers\UsersController::getClientName($upcomingBooking->clientID)); ?></td>
                                    <td><?php echo e($upcomingBooking->date); ?></td>
                                    <td><?php echo e($upcomingBooking->time); ?></td>
                                    <td><?php echo e($upcomingBooking->cost); ?></td>
                                    <td><?php echo e($upcomingBooking->status); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <!--  Update Profile example -->
    <div class="modal fade update-profile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="update-profile">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" value="" id="data_id">
                        <div class="mb-3">
                            <label for="useremail" class="form-label">Email</label>
                            <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="useremail" value="" name="email" placeholder="Enter email" autofocus>
                            <div class="text-danger" id="emailError" data-ajax-feedback="email"></div>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="" id="username" name="name" autofocus placeholder="Enter username">
                            <div class="text-danger" id="nameError" data-ajax-feedback="name"></div>
                        </div>

                        <div class="mb-3">
                            <label for="userdob">Date of Birth</label>
                            <div class="input-group" id="datepicker1">
                                <input type="text" class="form-control <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" data-date-container='#datepicker1' data-date-end-date="0d" value="" data-provide="datepicker" name="dob" autofocus id="dob">
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                            <div class="text-danger" id="dobError" data-ajax-feedback="dob"></div>
                        </div>

                        <div class="mb-3">
                            <label for="avatar">Profile Picture</label>
                            <div class="input-group">
                                <input type="file" class="form-control <?php $__errorArgs = ['avatar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="avatar" name="avatar" autofocus>
                                <label class="input-group-text" for="avatar">Upload</label>
                            </div>
                            <div class="text-start mt-2">
                                <img src="" alt="" class="rounded-circle avatar-lg">
                            </div>
                            <div class="text-danger" role="alert" id="avatarError" data-ajax-feedback="avatar"></div>
                        </div>

                        <div class="mt-3 d-grid">
                            <button class="btn btn-primary waves-effect waves-light UpdateProfile" data-id="" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- apexcharts -->
    <script src="<?php echo e(URL::asset('/assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>

    <!-- profile init -->
    <script src="<?php echo e(URL::asset('/assets/js/pages/profile.init.js')); ?>"></script>

    <script>
        $('#update-profile').on('submit', function(event) {
            event.preventDefault();
            var Id = $('#data_id').val();
            let formData = new FormData(this);
            $('#emailError').text('');
            $('#nameError').text('');
            $('#dobError').text('');
            $('#avatarError').text('');
            $.ajax({
                url: "<?php echo e(url('update-profile')); ?>" + "/" + Id,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#emailError').text('');
                    $('#nameError').text('');
                    $('#dobError').text('');
                    $('#avatarError').text('');
                    if (response.isSuccess == false) {
                        alert(response.Message);
                    } else if (response.isSuccess == true) {
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }
                },
                error: function(response) {
                    $('#emailError').text(response.responseJSON.errors.email);
                    $('#nameError').text(response.responseJSON.errors.name);
                    $('#dobError').text(response.responseJSON.errors.dob);
                    $('#avatarError').text(response.responseJSON.errors.avatar);
                }
            });
        });
            function myFunction() {
            var x = document.getElementById("oldInput");
            var y = document.getElementById("newInput");
            var z = document.getElementById("confirmInput");
            if (x.type === "password" && y.type === "password" && z.type === "password") {
            x.type = "text";
            y.type = "text";
            z.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
            z.type = "password";
        }
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('custom.common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BITYARN\Salon-Booking\resources\views/custom/home/userProfile.blade.php ENDPATH**/ ?>