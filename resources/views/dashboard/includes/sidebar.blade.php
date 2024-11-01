<div class="nk-sidebar fixed-sidebar">           
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a  href="{{ route('motor-link-dashboard') }}" href="javascript:void()" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">statistics</span>
                </a>
            </li>
            <li>
                <a href="{{ route('motor-link-dashboard-profile') }}" href="javascript:void()" aria-expanded="false">
                    <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Profile</span>
                </a>
            </li>
            <!-- Contact submissions -->
            <li>
                <a  href="{{ route('motor-link-dashboard-contacts') }}" href="javascript:void()" aria-expanded="false">
                    <i class="icon-envelope-open"></i><span class="nav-text">Contacts</span>
                </a>
            </li>

            <!-- Users Section -->
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-user"></i><span class="nav-text">Users</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('motor-link-dashboard-users') }}" aria-expanded="false">Manage users</a></li>
                    <li><a href="{{ route('motor-link-dashboard-users-trashed') }}" aria-expanded="false">Restore users</a></li>
                </ul>
            </li>

            <!-- Vehicles Section -->
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class='bx bx-car bx-light menu-icon' style="font-size: 1.1rem;"></i><span class="nav-text">Vehicles</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('motor-link-dashboard-vehicles-index') }}" aria-expanded="false">Vehicles</a></li>
                    <li><a href="{{ route('motor-link-dashboard-vehicle-types') }}" aria-expanded="false">Vehicle types</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class='bx bx-car bx-light menu-icon' style="font-size: 1.1rem;"></i><span class="nav-text">Bookings</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('motor-link-dashboard-bookings-index') }}" aria-expanded="false">Manage Bookings</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
