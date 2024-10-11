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
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-4 text-center">
                            @if($vehicle->image)
                                <img src="{{ asset($vehicle->image) }}" alt="Image" style="width: 300px; height: 300px; border-radius: 20%; object-fit: cover;" />
                            @else
                                <img src="{{ asset('path/to/default/image.jpg') }}" alt="Image" style="width: 300px; height: 300px; border-radius: 20%; object-fit: cover;" />
                            @endif
                        </div>
                        <div class="col-md-8">
                            <br>
                            <p><strong>Make:</strong> {{ $vehicle->make }}</p>
                            <p><strong>Model:</strong> {{ $vehicle->model }}</p>
                            <p><strong>Year:</strong> {{ $vehicle->year }}</p>
                            <p><strong>Type:</strong> {{ $vehicle->type->name ?? 'N/A' }}</p>
                            <p><strong>Price Per Day:</strong> {{ $vehicle->price_per_day }}</p>
                            <p><strong>Fuel Type:</strong> {{ $vehicle->fuel_type }}</p>
                            <p><strong>Status:</strong> {{ $vehicle->status }}</p>
                            
                            <a style="background-color: #457B9D; border:none" href="{{ route('motor-link-dashboard-vehicles-index') }}" class="btn btn-primary">Back to Vehicles</a>
                            <a style="background-color: #8FBBA1; border:none" href="{{ route('motor-link-dashboard-vehicles-edit', $vehicle->id) }}" class="btn btn-primary">Edit Vehicle</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  
