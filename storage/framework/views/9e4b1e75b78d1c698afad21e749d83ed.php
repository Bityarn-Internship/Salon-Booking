<header style="background-color:#556ee6;" id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?php echo e(URL::asset('/assets/images/logo.svg')); ?>" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?php echo e(URL::asset('/assets/images/logo-dark.png')); ?>" alt="" height="17">
                    </span>
                </a>

                <a href="index" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?php echo e(URL::asset('/assets/images/logo-light.svg')); ?>" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?php echo e(URL::asset('/assets/images/logo-light.png')); ?>" alt="" height="19">
                    </span>
                </a>
            </div>


        </div>

        <div class="d-flex">
            <?php if(Session::get('user') == 'client'): ?>
            <div class="d-inline-block">
                <a href = "<?php echo e(URL::to('/bookings')); ?>">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown">
                        <span class="d-none d-xl-inline-block ms-1" key="t-henry">Make a Booking</span>
                    </button>
                </a>
            </div>
            <div class="d-inline-block">
                <a href = "<?php echo e(URL::to('/viewClientBookings/'.Auth::user()->id)); ?>">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown">
                        <span class="d-none d-xl-inline-block ms-1" key="t-henry">My Bookings</span>
                    </button>
                </a>
            </div>
            

            <div class="d-inline-block">
                <a href = "<?php echo e(URL::to('/feedback')); ?>">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown">
                        <span class="d-none d-xl-inline-block ms-1" key="t-henry">Feedback</span>
                    </button>
                </a>

            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?php echo e(isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('/assets/images/users/avatar-1.jpg')); ?>"
                         alt="Header Avatar">
                    <?php if(session()->get('user') == 'client'): ?>
                        <span class="d-none d-xl-inline-block ms-1" key="t-henry"><?php echo e(\App\Http\Controllers\UsersController::getClientName(Session::get('clientID'))); ?></span>
                    <?php endif; ?>

                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="/clientProfile"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile"><?php echo app('translator')->get('User Profile'); ?></span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout"><?php echo app('translator')->get('Logout'); ?></span></a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</header>

<?php /**PATH C:\Users\User\Projects\Bityarn\salonBooking\resources\views/custom/common/navbar.blade.php ENDPATH**/ ?>