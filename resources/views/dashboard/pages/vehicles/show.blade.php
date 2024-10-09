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
                    <p><strong>Make:</strong> {{ $vehicle->make }}</p>
                    <p><strong>Model:</strong> {{ $vehicle->model }}</p>
                    <p><strong>Year:</strong> {{ $vehicle->year }}</p>
                    <p><strong>Type:</strong> {{ $vehicle->type }}</p>
                    <p><strong>Price Per Day:</strong> {{ $vehicle->price_per_day }}</p>
                    <p><strong>Fuel Type:</strong> {{ $vehicle->fuel_type }}</p>
                    <p><strong>Status:</strong> {{ $vehicle->status }}</p>
                    
                    <a href="{{ route('motor-link-dashboard-vehicles-index') }}" class="btn btn-primary">Back to Vehicles</a>
                    <a href="{{ route('motor-link-dashboard-vehicles-edit', $vehicle->id) }}" class="btn btn-primary">Edit vehicle</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
