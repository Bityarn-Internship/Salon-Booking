<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">@lang('Salon')</li>

                <li>
                    <a href="/dashboard">
                        <i class="bx bx-home"></i>
                        <span key="t-dashboards">@lang('Dashboard')</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user"></i>
                        <span key="t-layouts">@lang('Clients')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="/viewClients"
                               key="t-vertical">@lang('View Clients')</a>
                        </li>

                        <li>
                            <a href="/viewTrashedClients"
                               key="t-horizontal">@lang('Inactive Clients')</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-group"></i>
                        <span key="t-dashboards">@lang('Employees')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/viewEmployees" key="t-tui-calendar">@lang('View Employees')</a></li>
                        <li><a href="/viewTrashedEmployees" key="t-full-calendar">@lang('Inactive Employees')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-calendar"></i>
                        <span key="t-chat">@lang('Bookings')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/viewBookings" key="t-tui-calendar">@lang('View Bookings')</a></li>
                        <li><a href="/viewTrashedBookings" key="t-full-calendar">@lang('Inactive Bookings')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-file"></i>
                        <span key="t-file-manager">@lang('Booked Services')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/viewBookedServices" key="t-tui-calendar">@lang('View Booked Services')</a></li>
                        <li><a href="/viewTrashedBookedServices" key="t-full-calendar">@lang('Inactive Booked Services')</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-file"></i>
                        <span key="t-file-manager">@lang('Employee Services')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/viewEmployeeServices" key="t-tui-calendar">@lang('View Employee Services')</a></li>
                        <li><a href="/viewTrashedEmployeeServices" key="t-full-calendar">@lang('Inactive Employee Services')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user"></i>
                        <span key="t-crypto">@lang('Positions')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/viewPositions" key="t-wallet">@lang('View Positions')</a></li>
                        <li><a href="/viewTrashedPositions" key="t-buy">@lang('Inactive Positions')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-envelope"></i>
                        <span key="t-email">@lang('Services')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/viewServices" key="t-inbox">@lang('View Services')</a></li>
                        <li><a href="/viewTrashedServices" key="t-read-email">@lang('Inactive Services')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-dollar"></i>
                        <span key="t-projects">@lang('Payments')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/viewMpesaPayments" key="t-p-grid">@lang('View Mpesa Payments')</a></li>
                        <li><a href="/viewTrashedMpesaPayments" key="t-p-list">@lang('Inactive Mpesa Payments')</a></li>
                        <li><a href="/viewPaypalPayments" key="t-p-overview">@lang('View Paypal Payments')</a>
                        </li>
                        <li><a href="/viewTrashedPaypalPayments" key="t-create-new">@lang('Inactive Paypal Payments')</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-like"></i>
                        <span key="t-contacts">@lang('User Feedback')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/viewFeedback" key="t-user-grid">@lang('View Feedback')</a></li>
                        <li><a href="/viewTrashedFeedback" key="t-user-list">@lang('Inactive Feedback')</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/logout" class="waves-effect">
                        <i class="bx bx-log-out"></i>
                        <span key="t-contacts">@lang('Logout')</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
