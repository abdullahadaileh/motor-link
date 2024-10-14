@extends('dashboard.layouts.master')

@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('motor-link-dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Vehicle Details</a></li>
        </ol>
    </div>
</div>
<!-- row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Vehicle Details</h4>
                    <br><br>

                    <div class="row">
                        <!-- First column for vehicle image -->
                        <div class="col-md-4 text-center">
                            @if($vehicle->image)
                                <img id="vehicleImage" src="{{ asset($vehicle->image) }}" alt="Vehicle Image" style="width: 100%; height: auto; max-width: 300px; border-radius: 20%; object-fit: cover;" />
                            @else
                                <img id="vehicleImage" src="{{ asset('path/to/default/image.jpg') }}" alt="Vehicle Image" style="width: 100%; height: auto; max-width: 300px; border-radius: 20%; object-fit: cover;" />
                            @endif
                        </div>

                        <!-- Second column for primary details -->
                        <div class="col-md-4">
                            <p><strong>Make:</strong> {{ $vehicle->make }}</p>
                            <p><strong>Model:</strong> {{ $vehicle->model }}</p>
                            <p><strong>Year:</strong> {{ $vehicle->year }}</p>
                            <p><strong>Type:</strong> {{ $vehicle->type->name ?? 'N/A' }}</p>
                        </div>

                        <!-- Third column for additional details -->
                        <div class="col-md-4">
                            <p><strong>Description:</strong> {{ $vehicle->description }}</p>
                            <p><strong>Price Per Day:</strong> {{ $vehicle->price_per_day }}</p>
                            <p><strong>Fuel Type:</strong> {{ $vehicle->fuel_type }}</p>
                            <p><strong>Status:</strong> {{ $vehicle->status }}</p>

                            <br>
                            <a style="background-color: #457B9D; border:none" href="{{ route('motor-link-dashboard-vehicles-index') }}" class="btn btn-primary">Back to Vehicles</a>
                            <a style="background-color: #8FBBA1; border:none" href="{{ route('motor-link-dashboard-vehicles-edit', $vehicle->id) }}" class="btn btn-primary">Edit Vehicle</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Structure -->
<div id="imageModal" class="image-modal" style="display: none;">
    <span class="close">&times;</span>
    <img class="modal-content" id="modalImage">
</div>

<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const image = document.getElementById('vehicleImage');
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        const closeModal = document.querySelector('.close');

        image.addEventListener('click', function () {
            modal.style.display = 'flex';
            modalImage.src = this.src;
        });

        closeModal.addEventListener('click', function () {
            modal.style.display = 'none';
        });

        window.addEventListener('click', function (e) {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    });
</script>


@endsection
