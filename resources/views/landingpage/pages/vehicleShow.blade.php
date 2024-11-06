@extends('landingpage.layouts.master')

@section('content')
{{-- <br>
<br>
<br> --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div style="border: none !important" class="card">
                <div class="card-body">
                    {{-- <h4 class="card-title">Vehicle Details</h4> --}}
                    <h1 class="Vehicles-title">Vehicle Details: {{ $vehicle->make }}</h1>

                    <br><br>

                    <div class="row">
                        <!-- First column for vehicle image -->
                        <div class="col-md-4 text-center">
                            @if($vehicle->image)
                                <img id="vehicleImage" class="showVehicleImage" src="{{ asset($vehicle->image) }}" alt="Image" style="width: 100%; height: auto; max-width: 300px; border-radius: 20%; object-fit: cover;" />
                            @else
                                <img id="vehicleImage" class="showVehicleImage" src="{{ asset('landing/assets/images/carsilhouette.jpg') }}" alt="Image" style="width: 100%; height: auto; max-width: 300px; border-radius: 20%; object-fit: cover;" />
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
                            <a style="background-color: #6a8b9d; border:none" href="javascript:history.back()" class="btn btn-primary">&larr; Back</a>
                            @if($vehicle->status !== 'unavailable')
                            <a id="book-now-btn" style="background-color: #8FBBA1; border:none;" href="#" class="btn btn-success">Book Now</a>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="vehicleModal" class="image-modal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.8); align-items: center; justify-content: center;">
    <span class="close" style="position: absolute; top: 20px; right: 20px; font-size: 30px; color: white; cursor: pointer;">&times;</span>
    <img id="modalVehicleImage" style="width:700px" />
</div>
<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const vehicleImage = document.getElementById('vehicleImage');
    const vehicleModal = document.getElementById('vehicleModal');
    const modalVehicleImage = document.getElementById('modalVehicleImage');
    const closeModal = vehicleModal.querySelector('.close');

    vehicleImage.addEventListener('click', function () {
        modalVehicleImage.src = this.src; 
        vehicleModal.style.display = 'flex'; 
    });

    closeModal.addEventListener('click', function () {
        vehicleModal.style.display = 'none'; 
    });


    vehicleModal.addEventListener('click', function (event) {
        if (event.target === vehicleModal) {
            vehicleModal.style.display = 'none';
        }
    });
});


const isAuthenticated = @json(auth()->check()); 

    document.getElementById('book-now-btn').addEventListener('click', function(event) {
        event.preventDefault();

        if (!isAuthenticated) {
            Swal.fire({
                icon: 'warning',
                title: 'You Should Log In First',
                text: 'Please log in to proceed with booking.',
                confirmButtonText: 'Go to Login',
                willClose: () => {
                    window.location.href = '{{ route('login') }}';
                }
            });
        } else {
            window.location.href = '{{ route('motor-link-vehicle-booking', $vehicle) }}';
        }
    });
</script>
@endsection
