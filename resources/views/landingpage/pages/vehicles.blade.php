@extends('landingpage.layouts.master')

@section('content')

<div class="Vehicles-header">
    <h1 class="Vehicles-title">Vehicles</h1>
    <div id="car-animation" style="width: 120px;"></div>

    <div class="Vehicles-filters">
        <input type="text" class="Vehicles-search" id="searchInput" placeholder="Search vehicles...">
        {{-- <select class="Vehicles-filter" id="filterSelect">
            <option value="all">All</option>
            <option value="Economical car">Economical car</option>
            <option value="Jeep car">Jeep car</option>
            <option value="Luxury car">Luxury car</option>
            <option value="Pickup Truck">Pickup Truck</option>
            <option value="Sport car">Sport car</option>
            <option value="Sedan">Sedan</option>
            <option value="Hatchback">Hatchback</option>
            <option value="Coupe">Coupe</option>
            <option value="Convertible">Convertible</option>
            <option value="Station Wagon">Station Wagon</option>
            <option value="Minivan">Minivan</option>
            <option value="SUV">SUV</option>
            <option value="Crossover">Crossover</option>
            <option value="MPV">MPV</option>
            <option value="Van">Van</option>
            <option value="Compact car">Compact car</option>
            <option value="Luxury SUV">Luxury SUV</option>
            <option value="Off-road vehicle">Off-road vehicle</option>
            <option value="Electric car">Electric car</option>
            <option value="Hybrid car">Hybrid car</option>
            <option value="Microcar">Microcar</option>
        </select> --}}
    </div>
</div>

{{-- Vehicle Cards --}}
<div class="Vehicles-container" id="vehiclesContainer">
    @forelse ($vehicles as $vehicle)
        <div class="Vehicles-card" data-make="{{ $vehicle->make }}" data-type="{{ $vehicle->type }}">
            {{-- <img src="landing/assets/images/pexels-molnartamasphotography-25635758.webp" alt="{{ $vehicle->make }} Image" class="Vehicles-card-image"> --}}
            

            @if($vehicle->image)
            <img src="{{ asset($vehicle->image) }}" alt="Image" class="Vehicles-card-image" />
        @else
            <img src="{{ asset('path/to/default/image.jpg') }}" alt="Image" class="Vehicles-card-image" />
        @endif


            <div class="Vehicles-card-content">
                <h3>{{ $vehicle->make }} {{ $vehicle->model }} ({{ $vehicle->year }})</h3>
                <p>{{ $vehicle->description }}</p>
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

        // Attach event listeners to search and filter
        searchInput.addEventListener('input', filterVehicles);
        filterSelect.addEventListener('change', filterVehicles);
    });
</script>
@endsection
