<section class="moto-hero">
    <div class="Moto-containerHero">
      <div class="moto-hero-content">
        <h1>Welcome to MotorLink</h1>
        <p>MotorLink simplifies vehicle rentals with easy booking, flexible options, and 24/7 support.</p>
        <a href="{{route('motor-link-vehicles')}}" class="moto-cta-btn">Book Now</a>
      </div>
      <!-- Selection bar inside hero section -->
      <div class="selection-bar">
        <div class="selection-container">
          <input type="text" id="location-input" class="location-input" placeholder="Search for a location">
          <input type="date" class="date-picker" placeholder="Pick a Date">
          <button class="search-btn">Search</button>
          <!-- Add a div to hold the map -->
          <div id="map" class="map"></div>
        </div>
      </div>
    </div>
  </section>
