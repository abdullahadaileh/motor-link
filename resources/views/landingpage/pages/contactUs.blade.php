@extends('landingpage.layouts.master')
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('landing/assets/images/pexels-molnartamasphotography-25635758.jpg');"
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
                    <p><span>Email: </span> <a href="mailto:motorlink@gmail.com">motorlink@gmail.com</a></p>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center">
                <img src="landing/assets/images/icons/Active Support-bro.svg" alt="Contact Image" class="img-fluid" style="max-height: 100%; max-width: 100%;">
            </div>
        </div>            

        <div class="col-md-12">
            <form action="#" class="contact-form">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Your Name">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Your Email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Subject">
                </div>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Message"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</div>
</section>
<button id="scrollToTopBtn" class="scroll-to-top">↑</button>

@endsection