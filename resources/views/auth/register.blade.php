@extends('landingpage.layouts.master')

@section('content')
<div class="all-login">
<section class="login-section">
    <!-- Register Form is now displayed by default -->
    <div id="register-form" class="form-container">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h1>Register</h1>
            <div class="inputbox">
                <ion-icon name="person-outline"></ion-icon>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                <label for="">Username</label>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                <label for="">Email</label>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                <label for="">Password</label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <label for="">Confirm Password</label>
            </div>
            <div class="button-container">
                <button type="submit">Register</button>
                <button type="button" class="home-button" onclick="window.location.href='{{ route('motor-link') }}'">Home</button>
            </div>
            <div class="register">
                <p>Already have an account? <a href="#" onclick="toggleForm()">Login</a></p>
            </div>
        </form>
    </div>

    <!-- Login Form is hidden by default -->
    <div id="login-form" class="form-container" style="display: none;">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1>Login</h1>
            <div class="inputbox">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <label for="">Email</label>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="password" name="password" required autocomplete="current-password">
                <label for="">Password</label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="forget">
                <label for=""><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me</label>
                <a href="#" onclick="toggleForm()">Forget Password</a>
            </div>
            <div class="button-container">
                <button type="submit">Log in</button>
                <button type="button" class="home-button" onclick="location.href='{{ route('motor-link') }}'">Home</button>
            </div>
            <div class="register">
                <p>Don't have an account? <a href="#" onclick="toggleForm()">Register</a></p>
            </div>
        </form>
    </div>
</section>
</div>

<script>
function toggleForm() {
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
    if (loginForm.style.display === "none") {
        loginForm.style.display = "block";
        registerForm.style.display = "none";
    } else {
        loginForm.style.display = "none";
        registerForm.style.display = "block";
    }
}
</script>
@endsection
