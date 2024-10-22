@extends('landingpage.layouts.master')

@section('content')
<br>
<br>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div style="border: none !important" class="card">
                <div class="card-body">
                    <h4 class="card-title">Vehicle Details</h4>
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

                        <!-- Second column for primary details -->
                        <div class="col-md-4">
                            <p style="color: #6a8b9d"><strong style="color: #457B9D">Make:</strong> {{ $vehicle->make }}</p>
                            <p style="color: #6a8b9d"><strong style="color: #457B9D">Model:</strong> {{ $vehicle->model }}</p>
                            <p style="color: #6a8b9d"><strong style="color: #457B9D">Year:</strong> {{ $vehicle->year }}</p>
                            <p style="color: #6a8b9d"><strong style="color: #457B9D">Type:</strong> {{ $vehicle->type->name ?? 'N/A' }}</p>
                        </div>

                        <!-- Third column for additional details -->
                        <div class="col-md-4">
                            <p style="color: #6a8b9d"><strong style="color: #457B9D">Description:</strong> {{ $vehicle->description }}</p>
                            <p style="color: #6a8b9d"><strong style="color: #457B9D">Price Per Day:</strong> {{ $vehicle->price_per_day }}</p>
                            <p style="color: #6a8b9d"><strong style="color: #457B9D">Fuel Type:</strong> {{ $vehicle->fuel_type }}</p>
                            <p style="color: #6a8b9d"><strong style="color: #457B9D">Status:</strong> {{ $vehicle->status }}</p>

                            <br>
                            <a style="background-color: #6a8b9d; border:none" href="{{ route('motor-link-vehicles') }}" class="btn btn-primary">&larr; Back</a>
                            <a style="background-color: #8FBBA1 ;border:none" href="{{ route('motor-link-vehicle-booking', $vehicle) }}" class="btn btn-success">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if($vehicle->status === 'unavailable')
            Swal.fire({
                title: 'Soory this vehicle is not available',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        @endif
    });
</script>
@endsection
