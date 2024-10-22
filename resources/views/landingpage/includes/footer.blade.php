<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2"><a href="{{ route('motor-link') }}" class="logo">Motor<span>Link</span></a></h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
              there live the blind texts.</p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-5">
            <h2 class="ftco-heading-2">Information</h2>
            <ul class="list-unstyled">
              <li><a href="{{ route('motor-link-about') }}" class="py-2 d-block">About</a></li>
              <li><a href="{{ route('motor-link-about') }}" class="py-2 d-block">Services</a></li>
              <li><a href="#" class="py-2 d-block">Term and Conditions</a></li>
              <li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
              <li><a href="#" class="py-2 d-block">Privacy &amp; Cookies Policy</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Customer Support</h2>
            <ul class="list-unstyled">
              <li><a href="{{ route('motor-link-about') }}#faq-section" class="py-2 d-block">FAQ</a></li>
              <li><a href="#" class="py-2 d-block">Payment Option</a></li>
              <li><a href="{{ route('motor-link') }}#how-it-works" class="py-2 d-block">Booking Tips</a></li>
              <li><a href="{{ route('motor-link') }}#how-it-works" class="py-2 d-block">How it works</a></li>
              <li><a href="contactUs.html" class="py-2 d-block">Contact Us</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Have a Questions?</h2>
            <div class="block-23 mb-3">
              <ul>
                <li style="color: white;">Jordan | Aqaba
                    </li>
                <li><a href="#"><span class="icon icon-phone"></span><span class="text">0781075450 
                    </span></a></li>
                <li><a href="mailto:motorlink31@gmail.com"><span class="icon icon-envelope"></span><span
                      class="text">motorlink31@gmail.com</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">

          <p> Copyright &copy; All rights reserved | <a href="{{ route('motor-link') }}" class="linkfotermotorlink">Motor Link</a></p>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer end -->



<!--  JavaScript  -->
<script defer src="{{ asset('landing/assets/js/script.js') }}"></script>
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Google Maps API -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

{{-- login Page --}}
<script>
function toggleForm() {
  const loginForm = document.getElementById('login-form');
  const registerForm = document.getElementById('register-form');
  

  if (loginForm.style.display === 'none') {
    loginForm.style.display = 'block';
    registerForm.style.display = 'none';
  } else {
    loginForm.style.display = 'none';
    registerForm.style.display = 'block';
  }
}
var animation = lottie.loadAnimation({
        container: document.getElementById('car-animation'), 
        path: 'https://lottie.host/222fcaf5-fe5b-4352-b0a8-4af061ff3c12/IkDqWYLkDg.json', 
        renderer: 'svg', 
        loop: true, 
        autoplay: true, 
    });
</script>

</body>

</html>