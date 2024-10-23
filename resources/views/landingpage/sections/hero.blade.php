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
  
              // SweetAlert2 notification when location is successfully fetched
              Swal.fire({
                icon: 'success',
                title: 'Location Found!',
                text: `Your location has been set to: ${data.display_name}`
              });
            }
          })
          .catch(error => {
            console.error('Error:', error);
            
            // SweetAlert2 error notification
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'Failed to fetch location. Please try again.'
            });
          });
      });
    } else {
      // SweetAlert2 notification when geolocation is not supported
      Swal.fire({
        icon: 'error',
        title: 'Geolocation not supported',
        text: 'Your browser does not support geolocation.'
      });
    }
  });
  

  document.getElementById('save-location-btn').addEventListener('click', function() {
    const location = document.getElementById('location-input').value;
  
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
          // SweetAlert2 success notification
          Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Location saved successfully!'
          });
        }
      })
      .catch(error => {
        console.error('Error:', error);
        
        // SweetAlert2 error notification
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'An error occurred. Please try again.'
        });
      });
    } else {
      // SweetAlert2 notification for empty location input
      Swal.fire({
        icon: 'warning',
        title: 'Location Required',
        text: 'Please enter a location first.'
      });
    }
  });
  const isAuthenticated = @json(auth()->check()); // Returns true if logged in, false otherwise

    document.getElementById('save-location-btn').addEventListener('click', function() {
        const location = document.getElementById('location-input').value;

        if (!isAuthenticated) {
            // If the user is not authenticated, show SweetAlert and redirect to login page
            Swal.fire({
                icon: 'warning',
                title: 'Not Logged In',
                text: 'Please log in to save your location.',
                confirmButtonText: 'Go to Login',
                willClose: () => {
                    // Redirect to the login page
                    window.location.href = '{{ route('login') }}';
                }
            });
            return; // Stop the function execution if not authenticated
        }

        if (location) {
            // Send data to the server
            fetch('/save-location', {  // Ensure to update this URL to match your endpoint
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
                    // SweetAlert2 success notification
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Location saved successfully!'
                    });
                } else {
                    // SweetAlert2 error notification
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error saving location.'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                
                // SweetAlert2 error notification
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred. Please try again.'
                });
            });
        } else {
            // SweetAlert2 notification for empty location input
            Swal.fire({
                icon: 'warning',
                title: 'Location Required',
                text: 'Please enter a location first.'
            });
        }
    });
  </script>