<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu"><?php echo app('translator')->get('Salon'); ?></li>

                <li>
                    <a href="/dashboard">
                        <i class="bx bx-home"></i>
                        <span key="t-dashboards"><?php echo app('translator')->get('Dashboard'); ?></span>
                    </a>
                </li>

                <li>
                    <a href="/viewClients">
                        <i class="bx bx-user"></i>
                        <span key="t-layouts"><?php echo app('translator')->get('Clients'); ?></span>
                    </a>
                </li>
                <li>
                    <a href="/viewEmployees">
                        <i class="bx bx-group"></i>
                        <span key="t-dashboards"><?php echo app('translator')->get('Employees'); ?></span>
                    </a>
                </li>

                <li>
                    <a href="/viewBookings">
                        <i class="bx bx-calendar"></i>
                        <span key="t-chat"><?php echo app('translator')->get('Bookings'); ?></span>
                    </a>
                </li>
                
                <li>
                    <a href="/viewEmployeeServices">
                        <i class="bx bx-file"></i>
                        <span key="t-file-manager"><?php echo app('translator')->get('Employee Services'); ?></span>
                    </a>
                </li>

                <li>
                    <a href="/viewPositions">
                        <i class="bx bx-user"></i>
                        <span key="t-crypto"><?php echo app('translator')->get('Positions'); ?></span>
                    </a>
                </li>

                <li>
                    <a href="/viewServices">
                        <i class="bx bx-envelope"></i>
                        <span key="t-email"><?php echo app('translator')->get('Services'); ?></span>
                    </a>
                </li>

                <li>
                    <a href="/viewServiceCategories">
                        <i class="bx bx-envelope"></i>
                        <span key="t-email"><?php echo app('translator')->get('Service Categories'); ?></span>
                    </a>
                </li>

                <li>
                    <a href="/viewMpesaPayments">
                        <i class="bx bx-dollar"></i>
                        <span key="t-projects"><?php echo app('translator')->get('Mpesa Payments'); ?></span>
                    </a>
                </li>

                <li>
                    <a href="/viewPaypalPayments">
                        <i class="bx bx-dollar"></i>
                        <span key="t-projects"><?php echo app('translator')->get('Paypal Payments'); ?></span>
                    </a>
                </li>

                <li>
                    <a href="/viewFeedback">
                        <i class="bx bx-like"></i>
                        <span key="t-contacts"><?php echo app('translator')->get('User Feedback'); ?></span>
                    </a>
                </li>
                <li>
                    <a href="/logout" class="waves-effect">
                        <i class="bx bx-log-out"></i>
                        <span key="t-contacts"><?php echo app('translator')->get('Logout'); ?></span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<?php /**PATH D:\BITYARN\Salon-Booking\resources\views/custom/common/sidebar.blade.php ENDPATH**/ ?>