
<div style="background-color: #457B9D;" class="nav-header fixed-header">
    <div class="brand-logo">
        <a href="{{ route('motor-link-dashboard') }}">
            <b class="logo-abbr">
                <img src="{{asset('landing/assets/images/icons/whiteLogo.png')}}" style="width: 200px; margin-left:-10px" alt="logo"> 
            </b>
            <span class="logo-compact">
                <img src="{{ asset('landing/assets/images/motorlink-high-resolution-logo-transparent (1).png') }}" alt="">
            </span>
            <span class="brand-title">
                <img src="{{ asset('landing/assets/images/motorlink-high-resolution-logo-white-transparent.png') }}" style="width: 200px; margin-left:-10px" alt="">
            </span>
        </a>
    </div>
</div>


        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown"><a href="{{ route('motor-link-dashboard-contacts') }}">
                                <i class="mdi mdi-email-outline"></i>
                                {{-- <span class="badge badge-pill gradient-1">3</span> --}}
                            </a>
                        </li>
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                                {{-- <span class="badge badge-pill gradient-2">3</span> --}}
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">2 New Notifications</span>  
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-2">5</span>
                                    </a>
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events near you</h6>
                                                    <span class="notification-text">Within next 5 days</span> 
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Started</h6>
                                                    <span class="notification-text">One hour ago</span> 
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Event Ended Successfully</h6>
                                                    <span class="notification-text">One hour ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events to Join</h6>
                                                    <span class="notification-text">After two days</span> 
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown d-none d-md-flex">
                            <a href="javascript:void(0)" class="log-user"  data-toggle="dropdown">
                                <span>English</span>  <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                            </a>
                            <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="javascript:void()">English</a></li>
                                        <li><a href="javascript:void()">Dutch</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                @if (Auth::check() && Auth::user()->image)
                                    <img src="{{ asset(Auth::user()->image) }}"
                                         alt="{{ Auth::user()->name }}"
                                         class="img-thumbnail"
                                         height="40"
                                         width="40"
                                         style="border-radius: 50%; object-fit: cover;">
                                @else
                                    <img src="{{ asset('dashboard/images/imgs/image.png') }}"
                                         alt="Default Image"
                                         class="img-thumbnail"
                                         height="40"
                                         width="40"
                                         style="border-radius: 50%; object-fit: cover;">
                                @endif
                            </div>
                                                        <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="{{ route('motor-link-dashboard-profile') }}"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <li>
                                            {{-- javascript:void() --}}
                                            <a href="{{route('motor-link-dashboard-contacts')}}">
                                                <i class="icon-envelope-open"></i> <span>Inbox</span>
                                            </a>
                                        </li>
                                        
                                        <hr class="my-2">
                                        <li>
                                            <a href="{{ route('motor-link') }}"><i class="icon-lock"></i> <span>Home</span></a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}" 
                                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                               <i class="icon-key"></i> 
                                               <span>Logout</span>
                                            </a>
                                        </li>
                                        
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>                                                                            
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
