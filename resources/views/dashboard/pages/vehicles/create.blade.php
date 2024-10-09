@extends('dashboard.layouts.master')

@section('content')

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('motor-link-dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('motor-link-dashboard-vehicles-create') }}">Add Vehicle</a></li>
        </ol>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Vehicle</h4>
                    <p class="text-muted m-b-15 f-s-12">Fill in the details below to create a new vehicle.</p>

                    <div class="basic-form">
                        <!-- Form to add vehicle -->
                        <form id="addVehicleForm" method="POST" action="{{ route('motor-link-dashboard-vehicles-store') }}">
                            @csrf <!-- CSRF Token for form security -->

                            <div class="form-group">
                                <label for="make">Make</label>
                                <input type="text" name="make" class="form-control input-default" placeholder="Enter vehicle make" required>
                            </div>

                            <div class="form-group">
                                <label for="model">Model</label>
                                <input type="text" name="model" class="form-control input-default" placeholder="Enter vehicle model" required>
                            </div>

                            <div class="form-group">
                                <label for="year">Year</label>
                                <input type="number" name="year" class="form-control input-default" placeholder="Enter vehicle year" required>
                            </div>

                            <div class="form-group">
                                <label for="type">Type</label>
                                <input type="text" name="type" class="form-control input-default" placeholder="Enter vehicle type" required>
                            </div>

                            <div class="form-group">
                                <label for="price_per_day">Price Per Day</label>
                                <input type="number" name="price_per_day" class="form-control input-default" placeholder="Enter price per day" required>
                            </div>

                            <div class="form-group">
                                <label for="fuel_type">Fuel Type</label>
                                <input type="text" name="fuel_type" class="form-control input-default" placeholder="Enter fuel type" required>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" name="status" class="form-control input-default" placeholder="Enter vehicle status" required>
                            </div>

                            <!-- Trigger SweetAlert for confirmation -->
                            <button type="button" class="btn btn-primary" id="addVehicleButton">
                                Add Vehicle
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>            
    </div>
</div>

<!-- JavaScript to handle SweetAlert confirmation -->
<script>
    document.getElementById('addVehicleButton').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent form submission

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to add this vehicle?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, add vehicle!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('addVehicleForm').submit();
            }
        });
    });
</script>

@endsection
