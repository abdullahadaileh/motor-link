@extends('landingpage.layouts.master')

@section('content')
<div class="container-fluid">
    @if(session('success'))
        <script>
            window.onload = function() {
                Swal.fire({
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            }
        </script>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card" style="border: none !important;">
                <div class="card-body">
                    <h1 class="Vehicles-title">Book Vehicle: {{ $vehicle->make }} {{ $vehicle->model }}</h1>
                    <br><br>
                    <br><br>
                    <br><br>

                    <div class="row">
                        <!-- First column for vehicle image -->
                        <div class="col-md-4 text-center">
                            @if($vehicle->image)
                                <img class="showVehicleImage" src="{{ asset($vehicle->image) }}" alt="Image" style="width: 100%; height: auto; max-width: 300px; border-radius: 20%; object-fit: cover;" />
                            @else
                                <img class="showVehicleImage" src="{{ asset('landing/assets/images/carsilhouette.jpg') }}" alt="Image" style="width: 100%; height: auto; max-width: 300px; border-radius: 20%; object-fit: cover;" />
                            @endif
                        </div>

                        <!-- Second column for primary vehicle details -->
                        <div class="col-md-4">
                            <p style="color: #6a8b9d"><strong style="color: #8FBBA1">Make:</strong> {{ $vehicle->make }}</p>
                            <p style="color: #6a8b9d"><strong style="color: #8FBBA1">Model:</strong> {{ $vehicle->model }}</p>
                            <p style="color: #6a8b9d"><strong style="color: #8FBBA1">Year:</strong> {{ $vehicle->year }}</p>
                            <p style="color: #6a8b9d"><strong style="color: #8FBBA1">Type:</strong> {{ $vehicle->type->name ?? 'N/A' }}</p>
                            <p style="color: #6a8b9d"><strong style="color: #8FBBA1">Price Per Day:</strong> {{ $vehicle->price_per_day }}</p>
                        </div>

                        <!-- Third column for booking form and additional details -->
                        <div class="col-md-4">
                            <form id="bookingForm" method="POST" action="{{ route('motor-link-vehicle-booking-store', $vehicle) }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="start_date" class="form-label">Start Date:</label>
                                    <input type="date" id="start_date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" 
                                           min="{{ \Carbon\Carbon::now()->toDateString() }}" 
                                           max="{{ \Carbon\Carbon::now()->addMonth()->toDateString() }}" 
                                           value="{{ old('start_date') }}" required>
                                    @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="end_date" class="form-label">End Date:</label>
                                    <input type="date" id="end_date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" 
                                           min="{{ \Carbon\Carbon::now()->toDateString() }}" 
                                           max="{{ \Carbon\Carbon::now()->addMonth()->toDateString() }}" 
                                           value="{{ old('end_date') }}" required>
                                    @error('end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="delivery_option" class="form-label">Delivery Option:</label>
                                    <select id="delivery_option" name="delivery_option" class="form-control" required>
                                        <option value="" disabled selected>Select an option</option>
                                        <option value="receipt">Receipt</option>
                                        <option value="delivery">Delivery to the site</option>
                                    </select>
                                </div>
                                <div class="form-group d-flex justify-content-between">
                                    <a style="background-color: #6a8b9d ;border:none" href="{{ route('motor-link-vehicle-details', $vehicle->id) }}" class="btn btn-secondary">&larr; Back</a>
                                    <button style="width: 80% ;background-color: #8FBBA1 ;border:none" type="submit" class="btn btn-primary">Confirm Booking</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('bookingForm').addEventListener('submit', function(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to confirm this booking?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, book it!'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit(); 
            }
        });
    });
</script>
@endsection
