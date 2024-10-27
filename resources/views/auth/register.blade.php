@extends('landingpage.layouts.master')

@section('content')
<div class="all-login">
<section class="login-section">
    <!-- Register Form Displayed by Default -->
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
                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
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
