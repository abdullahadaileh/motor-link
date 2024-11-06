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
                    <input type="email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                    <label>Email</label>
                    @if ($errors->has('email'))
                        <span class="error-text">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="password" autocomplete="current-password">
                    <label>Password</label>
                    @if ($errors->has('password'))
                        <span class="error-text">{{ $errors->first('password') }}</span>
                    @endif
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
