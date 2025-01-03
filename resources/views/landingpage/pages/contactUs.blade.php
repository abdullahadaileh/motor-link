@extends('landingpage.layouts.master')
@section('content')
<div class="bodyOfContact">
<section class="hero-wrap hero-wrap-2 js-fullheight" 
data-stellar-background-ratio="0.5">
<div class="overlay"></div>
<div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        
    </div>
</div>
</section>

<section class="contact-section">
<div class="container">
    <div class="row contact-info">
        <div class="row d-flex align-items-center">
            <div class="col-md-6">
                <div class="contact-info-item">
                    <div class="icon">
                        <span class="icon-map-o"></span>
                    </div>
                    <p><span>Address: </span>Jordan | Aqaba</p>
                </div>
                <div class="contact-info-item">
                    <div class="icon">
                        <span class="icon-mobile-phone"></span>
                    </div>
                    <p><span>Phone: </span> <a href="tel://0781075450">0781075450</a></p>
                </div>
                <div class="contact-info-item">
                    <div class="icon">
                        <span class="icon-envelope-o"></span>
                    </div>
                    <p><span>Email: </span> <a href="mailto:motorlink31@gmail.com">motorlink31@gmail.com</a></p>
                </div>
                <div class="contact-info-item">
                    <div class="icon">
                        <span class="icon-envelope-o"></span>
                    </div>
                    <p>
                        <span>Social Media: </span>
                        <a href="https://www.instagram.com/motor_1ink?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank">
                          <i class="fab fa-instagram"></i> MotorLink
                        </a>
                      </p>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center">
                <img src="landing/assets/images/car-silver2.png" alt="Contact Image" class="img-fluid" style="max-height: 100%; max-width: 100%;">
            </div>
        </div>            

        <div class="col-md-12">
            <form action="{{ route('motor-link-contact.store') }}" method="POST" class="contact-form">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" 
                           value="{{ auth()->user()->name ?? '' }}" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Your Email" 
                           value="{{ auth()->user()->email ?? '' }}" required>
                </div>
                <div class="form-group">
                    <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                </div>
                <div class="form-group">
                    <textarea name="message" class="form-control" placeholder="Message" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</div>
</section>

<!-- Scroll to top button -->
<button id="scrollToTopBtn" class="scroll-to-top">↑</button>

<!-- SweetAlert script for form submission -->
@if(Session::has('success'))
    <script>
        Swal.fire({
            title: 'Message Sent!',
            text: '{{ Session::get('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@if(Session::has('error'))
    <script>
        Swal.fire({
            title: 'Error!',
            text: '{{ Session::get('error') }}',
            icon: 'error',
            confirmButtonText: 'Try Again'
        });
    </script>
@endif
</div>
@endsection
