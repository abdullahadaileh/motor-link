@extends('landingpage.layouts.master')

@section('content')
<div class="container-fluid">
    @if(session('success'))
        <script>
            // سيتم عرض SweetAlert عند إعادة تحميل الصفحة
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
                    <h4 class="card-title">Book Vehicle: {{ $vehicle->make }} {{ $vehicle->model }}</h4>
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
                            <p style="color: #6a8b9d"><strong style="color: #457B9D">Make:</strong> {{ $vehicle->make }}</p>
                            <p style="color: #6a8b9d"><strong style="color: #457B9D">Model:</strong> {{ $vehicle->model }}</p>
                            <p style="color: #6a8b9d"><strong style="color: #457B9D">Year:</strong> {{ $vehicle->year }}</p>
                            <p style="color: #6a8b9d"><strong style="color: #457B9D">Type:</strong> {{ $vehicle->type->name ?? 'N/A' }}</p>
                            <p style="color: #6a8b9d"><strong style="color: #457B9D">Price Per Day:</strong> {{ $vehicle->price_per_day }}</p>
                        </div>

                        <!-- Third column for booking form and additional details -->
                        <div class="col-md-4">
                            <form id="bookingForm" method="POST" action="{{ route('motor-link-vehicle-booking-store', $vehicle) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="start_date">Start Date:</label>
                                    <input type="date" id="start_date" name="start_date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="end_date">End Date:</label>
                                    <input type="date" id="end_date" name="end_date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="delivery_option">Delivery Option:</label>
                                    <input type="text" id="delivery_option" name="delivery_option" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary d-inline-block" style="margin-right: 10px;">Confirm Booking</button>
                                    <a style="background-color: #457B9D; border:none" href="{{ route('motor-link-vehicle-details', $vehicle->id) }}" class="btn btn-primary d-inline-block">&larr; Back to vehicle</a>
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
