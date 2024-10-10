<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('motor-link') }}">
      <img src="{{ asset('landing/assets/images/motorlink-high-resolution-logo-transparent (1).png') }}" alt="Brand Logo" height="40">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

      <!-- User Authentication Links -->
      @if (Route::has('login'))
          <div class="ml-auto">
              @auth
                  <!-- Dropdown for User -->
                  <div class="dropdown">
                      <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          {{ Auth::user()->name }}
                      </button>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                          <a class="dropdown-item" href="">User Profile</a>
                          <a class="dropdown-item" href="{{ route('motor-link-dashboard') }}">Admin Dashboard</a>
                          <a class="dropdown-item" href="{{ route('logout') }}" 
                          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          Logout
                       </a>
                       
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
