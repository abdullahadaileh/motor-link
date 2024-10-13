<div class="nk-sidebar fixed-sidebar">           
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('motor-link-dashboard') }}">Home 1</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Apps</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./app-profile.html">Profile</a></li>
                </ul>
            </li>
            <li class="nav-label">Forms</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-note menu-icon"></i><span class="nav-text">Users</span>
                </a>
                <ul aria-expanded="false">
                    {{-- <li><a href="{{ route('motor-link-dashboard-addUser') }}">Add new user</a></li> --}}
                    <li><a href="{{ route('motor-link-dashboard-users') }}" aria-expanded="false">Manage users</a></li>
                    <li><a href="{{ route('motor-link-dashboard-users-trashed') }}" aria-expanded="false">Restore users</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-note menu-icon"></i><span class="nav-text">Vehicles</span>
                </a>
                <ul aria-expanded="false">
                    {{-- <li><a href="{{ route('motor-link-dashboard-vehicles-create') }}">Add vehicles</a></li> --}}
                    <li><a href="{{ route('motor-link-dashboard-vehicles-index') }}" aria-expanded="false">Vehicles</a></li>
                    <li><a href="{{ route('motor-link-dashboard-vehicle-types') }}" aria-expanded="false">Vehicle types</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
