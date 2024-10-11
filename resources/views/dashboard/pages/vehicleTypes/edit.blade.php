@extends('dashboard.layouts.master')

@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('motor-link-dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('motor-link-dashboard-vehicle-types') }}">Vehicle Types</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Vehicle Type</a></li>
        </ol>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Vehicle Type</h4>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form id="editVehicleTypeForm" action="{{ route('motor-link-dashboard-vehicle-types-update', $vehicleType->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                    
                        <div class="form-group">
                            <label for="name">Type Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $vehicleType->name) }}" required>
                            @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <!-- Button to trigger SweetAlert -->
                        <button style="background-color: #457B9D; border: none;" type="button" class="btn btn-primary" id="confirmEdit">
                            Update Vehicle Type
                        </button>
                        <button style="background-color: #8FBBA1; border: none;" type="button" class="btn btn-primary" id="backButton">
                            Back
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for SweetAlert confirmation -->
<script>
    document.getElementById('confirmEdit').addEventListener('click', function() {
        // SweetAlert confirmation
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to update this vehicle type?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('editVehicleTypeForm').submit();
            }
        });
    });

    document.getElementById('backButton').addEventListener('click', function() {
        window.location.href = '{{ route("motor-link-dashboard-vehicle-types") }}';
    });
</script>

@endsection
