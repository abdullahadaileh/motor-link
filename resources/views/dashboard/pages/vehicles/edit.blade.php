@extends('dashboard.layouts.master')

@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('motor-link-dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Vehicle</a></li>
        </ol>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Vehicle</h4>

                    <form id="editVehicleForm" action="{{ route('motor-link-dashboard-vehicles-update', $vehicle->id) }}" method="POST"> <!-- Updated route -->
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="make" class="form-label">Make</label>
                            <input type="text" class="form-control" id="make" name="make" value="{{ old('make', $vehicle->make) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="model" class="form-label">Model</label>
                            <input type="text" class="form-control" id="model" name="model" value="{{ old('model', $vehicle->model) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="year" class="form-label">Year</label>
                            <input type="number" class="form-control" id="year" name="year" value="{{ old('year', $vehicle->year) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <input type="text" class="form-control" id="type" name="type" value="{{ old('type', $vehicle->type) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="price_per_day" class="form-label">Price Per Day</label>
                            <input type="number" class="form-control" id="price_per_day" name="price_per_day" value="{{ old('price_per_day', $vehicle->price_per_day) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="fuel_type" class="form-label">Fuel Type</label>
                            <input type="text" class="form-control" id="fuel_type" name="fuel_type" value="{{ old('fuel_type', $vehicle->fuel_type) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" class="form-control" id="status" name="status" value="{{ old('status', $vehicle->status) }}" required>
                        </div>
                        <!-- Button to trigger SweetAlert -->
                        <button type="button" class="btn btn-primary" id="confirmEdit">
                            Update Vehicle
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- JavaScript for SweetAlert confirmation -->
<script>
    document.getElementById('confirmEdit').addEventListener('click', function() {
        // Trigger SweetAlert confirmation
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to update this vehicle's details.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form if confirmed
                document.getElementById('editVehicleForm').submit();
            }
        });
    });
</script>

@endsection
