@extends('landingpage.layouts.master')

@section('content')
<div class="all-login">
<section class="login-section">
    <div id="login-form" class="form-container">
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
                <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
            </div>
            <div class="social-login">
                <a href="auth/google" class="btn-google">
                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" alt="Google sign-in">
                </a>
            </div>
        </form>
    </div>
</section>
</div>

@endsection
