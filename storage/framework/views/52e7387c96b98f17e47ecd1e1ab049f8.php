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
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user"></i>
                        <span key="t-layouts"><?php echo app('translator')->get('Clients'); ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="/viewClients"
                               key="t-vertical"><?php echo app('translator')->get('View Clients'); ?></a>
                        </li>

                        <li>
                            <a href="/viewTrashedClients"
                               key="t-horizontal"><?php echo app('translator')->get('Inactive Clients'); ?></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-group"></i>
                        <span key="t-dashboards"><?php echo app('translator')->get('Employees'); ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/viewEmployees" key="t-tui-calendar"><?php echo app('translator')->get('View Employees'); ?></a></li>
                        <li><a href="/viewTrashedEmployees" key="t-full-calendar"><?php echo app('translator')->get('Inactive Employees'); ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-calendar"></i>
                        <span key="t-chat"><?php echo app('translator')->get('Bookings'); ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/viewBookings" key="t-tui-calendar"><?php echo app('translator')->get('View Bookings'); ?></a></li>
                        <li><a href="/viewTrashedBookings" key="t-full-calendar"><?php echo app('translator')->get('Inactive Bookings'); ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-file"></i>
                        <span key="t-file-manager"><?php echo app('translator')->get('Booked Services'); ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/viewBookedServices" key="t-tui-calendar"><?php echo app('translator')->get('View Booked Services'); ?></a></li>
                        <li><a href="/viewTrashedBookedServices" key="t-full-calendar"><?php echo app('translator')->get('Inactive Booked Services'); ?></a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-file"></i>
                        <span key="t-file-manager"><?php echo app('translator')->get('Employee Services'); ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/viewEmployeeServices" key="t-tui-calendar"><?php echo app('translator')->get('View Employee Services'); ?></a></li>
                        <li><a href="/viewTrashedEmployeeServices" key="t-full-calendar"><?php echo app('translator')->get('Inactive Employee Services'); ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user"></i>
                        <span key="t-crypto"><?php echo app('translator')->get('Positions'); ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/viewPositions" key="t-wallet"><?php echo app('translator')->get('View Positions'); ?></a></li>
                        <li><a href="/viewTrashedPositions" key="t-buy"><?php echo app('translator')->get('Inactive Positions'); ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-envelope"></i>
                        <span key="t-email"><?php echo app('translator')->get('Services'); ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/viewServices" key="t-inbox"><?php echo app('translator')->get('View Services'); ?></a></li>
                        <li><a href="/viewTrashedServices" key="t-read-email"><?php echo app('translator')->get('Inactive Services'); ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-dollar"></i>
                        <span key="t-projects"><?php echo app('translator')->get('Payments'); ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/viewMpesaPayments" key="t-p-grid"><?php echo app('translator')->get('View Mpesa Payments'); ?></a></li>
                        <li><a href="/viewTrashedMpesaPayments" key="t-p-list"><?php echo app('translator')->get('Inactive Mpesa Payments'); ?></a></li>
                        <li><a href="/viewPaypalPayments" key="t-p-overview"><?php echo app('translator')->get('View Paypal Payments'); ?></a>
                        </li>
                        <li><a href="/viewTrashedPaypalPayments" key="t-create-new"><?php echo app('translator')->get('Inactive Paypal Payments'); ?></a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-like"></i>
                        <span key="t-contacts"><?php echo app('translator')->get('User Feedback'); ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#" key="t-user-grid"><?php echo app('translator')->get('View Feedback'); ?></a></li>
                        <li><a href="#" key="t-user-list"><?php echo app('translator')->get('Inactive Feedback'); ?></a></li>
                    </ul>
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