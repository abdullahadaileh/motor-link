<section class="moto-hero">
  <div class="Moto-containerHero">
    <div class="moto-hero-content">
      <h1>Welcome to MotorLink</h1>
      <p>MotorLink simplifies vehicle rentals with easy booking, flexible options, and 24/7 support.</p>
      <a href="{{ route('motor-link-vehicles') }}" class="moto-cta-btn">Book Now</a>
    </div>
    
    <!-- Selection bar inside hero section -->
    <div class="selection-bar">
      <div class="selection-container">
        <input type="text" id="location-input" name="location" class="location-input" placeholder="Enter your location" required>
        <button id="current-location-btn" class="search-btn">Use Current Location</button>
        <button id="save-location-btn" class="search-btn" style="background-color: #457b9dbc; border:none">Save Location</button>
      </div>
    </div>
  </div>
</section>

<script>
  function showAlert(icon, title, text) {
    Swal.fire({
      icon: icon,
      title: title,
      text: text
    });
  }

  document.getElementById('current-location-btn').addEventListener('click', function() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;

        const locationInput = document.getElementById('location-input');

        fetch(`https://nominatim.openstreetmap.org/reverse?lat=${latitude}&lon=${longitude}&format=json`)
          .then(response => response.json())
          .then(data => {
            if (data && data.display_name) {
              locationInput.value = data.display_name;
              showAlert('success', 'Location Found!', `Your location has been set to: ${data.display_name}`);
            }
          })
          .catch(error => {
            console.error('Error:', error);
            showAlert('error', 'Error', 'Failed to fetch location. Please try again.');
          });
      });
    } else {
      showAlert('error', 'Geolocation not supported', 'Your browser does not support geolocation.');
    }
  });

  const isAuthenticated = @json(auth()->check()); // Returns true if logged in, false otherwise

  document.getElementById('save-location-btn').addEventListener('click', function() {
    const location = document.getElementById('location-input').value;

    if (!isAuthenticated) {
      showAlert('warning', 'Not Logged In', 'Please log in to save your location.');
      window.location.href = '{{ route('login') }}';
      return;
    }

    if (location) {
      fetch('/save-location', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ location: location })
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          showAlert('success', 'Success', 'Location saved successfully!');
        } else {
          showAlert('error', 'Error', 'Error saving location.');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        showAlert('error', 'Error', 'An error occurred. Please try again.');
      });
    } else {
      showAlert('warning', 'Location Required', 'Please enter a location first.');
    }
  });
</script>
