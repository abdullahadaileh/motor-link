@extends('landingpage.layouts.master')

@section('content')

<div class="Vehicles-header">
  <h1 class="Vehicles-title">Vehicles</h1>
  <div id="car-animation" style="width: 120px;"></div>

  <div class="Vehicles-filters">
      <form id="filterForm" method="GET" action="{{ route('motor-link-vehicles') }}">
          <input style="width: 150px" type="text" class="Vehicles-search" id="searchInput" name="search" placeholder="Search vehicles..." value="{{ request('search') }}">
          <select id="filterSelect" class="Vehicles-filter" name="type_id">
              <option value="all">All Types</option>
              @foreach($vehicleTypes as $id => $name)
                  <option value="{{ $id }}" {{ request('type_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
              @endforeach
          </select>
          <button style="width: 100px" type="submit" id="filterButton" class="Vehicles-filter-button">Filter</button>
      </form>
  </div>
</div>

{{-- Vehicle Cards --}}
<div class="Vehicles-container" id="vehiclesContainer">
    @forelse ($vehicles as $vehicle)
        <div class="Vehicles-card" data-make="{{ $vehicle->make }}" data-type="{{ $vehicle->type->name ?? 'N/A' }}">

            @if($vehicle->image)
                <img src="{{ asset($vehicle->image) }}" alt="Image" style=" height: 200px; object-fit: cover;" class="Vehicles-card-image" />
            @else
                <img src="{{ asset('landing/assets/images/carsilhouette.jpg') }}" alt="Image" style=" height: 200px; object-fit: cover;" class="Vehicles-card-image" />
            @endif

            <div class="Vehicles-card-content">
                <h3>{{ $vehicle->make }} {{ $vehicle->model }} ({{ $vehicle->year }})</h3>
                <p>{{ $vehicle->type->name ?? 'N/A' }}</p>
                <p class="clamped-text">{{ Str::words($vehicle->description, 10, '...') }}</p>
                <a href="{{ route('motor-link-vehicle-details', $vehicle) }}" class="Vehicles-view-button">Show more</a>
            </div>
        </div>
    @empty
        <p>No vehicles found</p>
    @endforelse
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const filterSelect = document.getElementById('filterSelect');
        const filterButton = document.getElementById('filterButton');
        const vehiclesContainer = document.getElementById('vehiclesContainer');
        const vehicleCards = vehiclesContainer.querySelectorAll('.Vehicles-card');

        // Function to filter vehicles based on search and filter
        function filterVehicles() {
            const searchTerm = searchInput.value.toLowerCase();
            const selectedFilter = filterSelect.value.toLowerCase();

            vehicleCards.forEach(function(card) {
                const make = card.getAttribute('data-make').toLowerCase();
                const type = card.getAttribute('data-type').toLowerCase();

                // Check if the card matches both search term and filter selection
                const matchesSearch = make.includes(searchTerm);
                const matchesFilter = selectedFilter === 'all' || type === selectedFilter;

                // Display or hide the card based on the matching criteria
                if (matchesSearch && matchesFilter) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Attach event listener to the filter button
        filterButton.addEventListener('click', function() {
            filterVehicles(); // Filter only when button is clicked
        });
    });
</script>
@endsection
