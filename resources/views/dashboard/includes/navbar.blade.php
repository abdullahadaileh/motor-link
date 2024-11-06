
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
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <a href="{{ route('motor-link-dashboard-contacts') }}">
                                <i class="icon-envelope-open"></i>
                                @if($totalContacts > 0)
                                    <span class="badge badge-danger">{{ $totalContacts }}</span>
                                @endif
                            </a>
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
