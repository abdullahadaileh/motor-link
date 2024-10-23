<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('motor-link') }}">
        <img src="{{ asset('landing/assets/images/motorlink-high-resolution-logo-transparent (1).png') }}" alt="Brand Logo" height="40">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('motor-link') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('motor-link-about') }}">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('motor-link-contact') }}">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('motor-link-vehicles') }}">Vehicles</a>
            </li>
        </ul>
  
        @if (Route::has('login'))
        <div class="ml-auto">
            @auth
                <div class="dropdown">
                    <div class="img-thumbnail rounded-circle" data-toggle="dropdown">
                        <span class="activity active"></span>
                        @if (Auth::check() && Auth::user()->image)
                            <img src="{{ asset(Auth::user()->image) }}" alt="{{ Auth::user()->name }}" height="40" width="40" style="border-radius: 50%; object-fit: cover;">
                        @else
                            <img src="{{ asset('dashboard/images/imgs/image.png') }}" alt="Default Image" height="40" width="40" style="border-radius: 50%; object-fit: cover;">
                        @endif
                    </div>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{route('motor-link-profile')}}">Profile</a>
                        @if(auth()->user()->role === 'owner')
                        <a class="dropdown-item" href="{{ route('motor-link-dashboard') }}">Admin Dashboard</a>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>                      
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-secondary">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-outline-secondary ml-2">Register</a>
                @endif
            @endauth
        </div>
        @endif
    </div>
  </nav>
  