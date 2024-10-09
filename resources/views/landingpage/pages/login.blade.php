@extends('landingpage.layouts.master')
@section('content')

<div class="container my-5">
    <section class="login-section row justify-content-center">
        <!-- Login Form -->
        <div id="login-form" class="col-md-6 card p-4 shadow">
            <form>
                <h1 class="text-center mb-4">Login</h1>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <ion-icon name="mail-outline"></ion-icon>
                        </span>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <input type="password" class="form-control" id="password" required>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <input type="checkbox" id="remember">
                        <label for="remember">Remember Me</label>
                    </div>
                    <a href="#" onclick="toggleForm()">Forget Password</a>
                </div>
                <div class="d-grid mt-4">
                        <button type="submit" id="theloginbtn">Log in</button>
                    </div>
                <div class="d-grid mt-2">
                    <button type="button" class="btn btn-secondary" onclick="location.href='{{ route('motor-link') }}'">Home</button>
                </div>
                <div class="text-center mt-4">
                    <p>Don't have an account? <a href="#" onclick="toggleForm()">Register</a></p>
                </div>
            </form>
        </div>
        
        <!-- Register Form (Initially hidden) -->
        <div id="register-form" class="col-md-6 card p-4 shadow" style="display: none;">
            <form>
                <h1 class="text-center mb-4">Register</h1>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <input type="text" class="form-control" id="username" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="register-email" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <ion-icon name="mail-outline"></ion-icon>
                        </span>
                        <input type="email" class="form-control" id="register-email" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="register-password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <input type="password" class="form-control" id="register-password" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <input type="password" class="form-control" id="confirm-password" required>
                    </div>
                </div>
                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
                <div class="d-grid mt-2">
                    <button type="button" class="btn btn-secondary" onclick="location.href='{{ route('motor-link') }}'">Home</button>
                </div>
                <div class="text-center mt-4">
                    <p>Already have an account? <a href="#" onclick="toggleForm()">Login</a></p>
                </div>
            </form>
        </div>
    </section>
</div>

@endsection
