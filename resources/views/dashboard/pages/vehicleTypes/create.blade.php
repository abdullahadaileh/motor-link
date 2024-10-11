@extends('dashboard.layouts.master')

@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('motor-link-dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('motor-link-dashboard-vehicle-types') }}">Vehicle Types</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Vehicle Type</a></li>
        </ol>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Vehicle Type</h4>
                    <p class="text-muted m-b-15 f-s-12">Fill in the details below to create a new vehicle type.</p>

                    <div class="basic-form">
                        <form action="{{ route('motor-link-dashboard-vehicle-types-store') }}" method="POST">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="name">Type Name</label>
                                <input type="text" class="form-control input-default" id="name" name="name" placeholder="Enter vehicle type name" required>
                            </div>
                            
                            <button style="background-color: #457B9D; border:none" type="submit" class="btn btn-primary">Add Vehicle Type</button>
                            <a href="{{ route('motor-link-dashboard-vehicle-types') }}" style="background-color: #8FBBA1; border:none" class="btn btn-secondary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>            
    </div>
</div>
@endsection
