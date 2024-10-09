@extends('landingpage.layouts.master')
@section('content')

<div class="about-us-container">
    <div class="about-us-content" id="about">
        <section class="about-us-section">
            <div class="about-us-wrapper">
                <!-- Existing About Us Content -->
                <div class="about-us-item">
                    <div class="about-us-image">
                        <img src="landing/assets/images/icons/firstAbout.svg" alt="Welcome Image">
                    </div>
                    <div class="about-us-description">
                        <h2 class="about-us-heading">About Us</h2>
                        <h3 class="about-us-subheading">Welcome to MotorLink</h3>
                        <p class="about-us-paragraph">
                            At MotorLink, we're passionate about providing a seamless and convenient
                            vehicle rental experience. Whether you need a car, bike, or truck, our platform
                            is designed to make the process of renting a vehicle as easy and enjoyable as possible.
                        </p>
                    </div>
                </div>

                <div class="about-us-item">
                    <div class="about-us-image">
                        <img src="landing/assets/images/icons/Car rental-bro.svg" alt="Mission Image">
                    </div>
                    <div class="about-us-description">
                        <h3 class="about-us-subheading">Our Mission</h3>
                        <p class="about-us-paragraph">
                            Our mission is to connect you with the perfect vehicle for your needs, offering a variety of
                            options that suit your preferences and budget. We aim to make vehicle rental simple, efficient, and reliable.
                        </p>
                    </div>
                </div>

                <div class="about-us-item">
                    <div class="about-us-image">
                        <img src="landing/assets/images/icons/Active Support-bro.svg" alt="What Sets Us Apart Image">
                    </div>
                    <div class="about-us-description">
                        <h3 class="about-us-subheading">What Sets Us Apart</h3>
                        <ul>
                            <li><strong>Insurance Options</strong>: Choose from multiple insurance plans to ensure peace of mind during your rental.</li>
                            <li><strong>24/7 Support</strong>: Our dedicated customer service team is available around the clock to assist you with any issues or inquiries.</li>
                            <li><strong>Loyalty Programs</strong>: Earn rewards and points with our loyalty programs for frequent users.</li>
                            <li><strong>Special Offers</strong>: Enjoy exclusive discounts and promotions for new users and special occasions.</li>
                        </ul>
                    </div>
                </div>

                <div class="about-us-item">
                    <div class="about-us-image">
                        <img src="landing/assets/images/icons/Service 24_7-bro.svg" alt="Commitment Image">
                    </div>
                    <div class="about-us-description">
                        <h3 class="about-us-subheading">Our Commitment</h3>
                        <p class="about-us-paragraph">
                            We are committed to offering top-notch service and a user-friendly
                            experience. Our goal is to enhance your journey with us and ensure
                            that every rental experience is smooth and satisfying.
                            Thank you for choosing MotorLink. We look forward to serving you!
                        </p>
                    </div>
                </div>

                <div class="about-us-item">
                    <div class="about-us-image">
                        <img src="landing/assets/images/icons/Appreciation-bro (1).svg" alt="Thank You Image">
                    </div>
                    <div class="about-us-description">
                        <h3 class="about-us-subheading">Thank You</h3>
                        <p class="about-us-paragraph">
                            Thank you for visiting MotorLink and considering us for your vehicle rental needs.
                             We appreciate your trust and look forward to serving you with the best experience possible.
                        </p>
                        <p class="about-us-paragraph">Your satisfaction is our priority, and we're here to make sure your rental journey is smooth
                             and enjoyable. Thank you for being a part of the MotorLink family!</p>
                    </div>
                </div>

                <!-- FAQ START -->
                <section class="faq-section" id="faq-section">
                    <h2 class="faq-title">Frequently Asked Questions</h2>
                    <div class="faq-container">
                      <div class="faq-item">
                        <input type="checkbox" id="faq1" class="faq-toggle">
                        <label for="faq1" class="faq-question">
                          <h3>What is MotorLink?</h3>
                          <span class="toggle-button">+</span>
                        </label>
                        <div class="faq-answer">
                          <p>MotorLink is a platform that simplifies vehicle rentals with easy booking, flexible options, and 24/7
                            support.</p>
                        </div>
                      </div>
                      <div class="faq-item">
                        <input type="checkbox" id="faq2" class="faq-toggle">
                        <label for="faq2" class="faq-question">
                          <h3>How do I book a vehicle?</h3>
                          <span class="toggle-button">+</span>
                        </label>
                        <div class="faq-answer">
                          <p>To book a vehicle, sign in, select your vehicle, choose the rental period and payment method, and confirm
                            your booking.</p>
                        </div>
                      </div>
                      <div class="faq-item">
                        <input type="checkbox" id="faq3" class="faq-toggle">
                        <label for="faq3" class="faq-question">
                          <h3>What payment methods are accepted?</h3>
                          <span class="toggle-button">+</span>
                        </label>
                        <div class="faq-answer">
                          <p>We accept various payment methods including credit cards, debit cards, and digital wallets.</p>
                        </div>
                      </div>
                      <div class="faq-item">
                        <input type="checkbox" id="faq4" class="faq-toggle">
                        <label for="faq4" class="faq-question">
                          <h3>Can I modify or cancel my booking?</h3>
                          <span class="toggle-button">+</span>
                        </label>
                        <div class="faq-answer">
                          <p>Yes, you can modify or cancel your booking through your account dashboard. Please check our cancellation
                            policy for details.</p>
                        </div>
                      </div>
                      <div class="faq-item">
                        <input type="checkbox" id="faq5" class="faq-toggle">
                        <label for="faq5" class="faq-question">
                          <h3>What should I do if I have issues with the vehicle?</h3>
                          <span class="toggle-button">+</span>
                        </label>
                        <div class="faq-answer">
                          <p>If you encounter any issues with the vehicle, contact our 24/7 support team for assistance.</p>
                        </div>
                      </div>
                    </div>
                  </section>
                <!-- FAQ START -->

    </div>
</div>
<!-- About Us End -->
<button id="scrollToTopBtn" class="scroll-to-top"><span style="font-size: 19px">↑</span></button>
{{-- <button id="scrollToTopBtn" class="scroll-to-top"><img style="width: 30px" src="landing/assets/images/middle.png" alt=""></button> --}}

@endsection