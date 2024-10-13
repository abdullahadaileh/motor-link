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

                    <form id="editVehicleTypeForm" action="{{ route('motor-link-dashboard-vehicle-types-update', $vehicleType->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    
                        <div class="form-group">
                            <label for="name">Type Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $vehicleType->name) }}" required>
                            @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="description">Vehicle Type Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $vehicleType->description) }}</textarea>
                            @error('description')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Vehicle Type Image</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="imageUpload" accept="image/*">
                                    <label class="custom-file-label" for="imageUpload">Choose file</label>
                                </div>
                            </div>
                            <div class="mt-2">
                                <img id="previewImage" 
                                     src="{{ $vehicleType->image ? asset($vehicleType->image) : asset('path/to/default/image.jpg') }}" 
                                     alt="Vehicle Type Image" 
                                     class="img-thumbnail" 
                                     style="max-height: 150px; object-fit: cover;">
                            </div>
                            @error('image')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Button to trigger SweetAlert -->
                        <button style="background-color: #457B9D; border: none;" type="button" class="btn btn-primary" id="confirmEdit">
                            Update Vehicle Type
                        </button>
                        <button style="background-color: #7A9E8A; border: none;" type="button" class="btn btn-primary" id="backButton">
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

    document.getElementById('imageUpload').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader(); 
        reader.onload = function(e) {
            document.getElementById('previewImage').src = e.target.result;
        }
        reader.readAsDataURL(file); 
    }
});

</script>

@endsection
