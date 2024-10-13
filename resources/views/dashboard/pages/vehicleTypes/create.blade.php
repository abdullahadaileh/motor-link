@extends('dashboard.layouts.master')

@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('motor-link-dashboard') }}">Dashboard</a></li>
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
                        <form id="addVehicleTypeForm" action="{{ route('motor-link-dashboard-vehicle-types-store') }}" method="POST" enctype="multipart/form-data">
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
                            
                            <!-- Vehicle Type Name Input -->
                            <div class="form-group">
                                <label for="name">Vehicle Type Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <!-- Vehicle Type Description Input -->
                            <div class="form-group">
                                <label for="description">Vehicle Type Description</label>
                                <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter description (optional)"></textarea>
                            </div>                        
                            <!-- Image Upload Input -->
                            <div class="form-group">
                                <label for="image">Vehicle Type Image</label>
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="imageUpload" accept="image/*" required>
                                        <label class="custom-file-label" for="imageUpload">Choose file</label>
                                    </div>
                                </div>
                                
                                <div class="mt-2">
                                    <img id="previewImage" src="" alt="Vehicle Type Image" class="img-thumbnail" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; display: none;">
                                </div>
                            </div>
                            
                            <!-- Submit Button with SweetAlert Confirmation -->
                            <button style="background-color: #457B9D; border:none" type="button" class="btn btn-primary" id="addVehicleTypeButton">
                                Create Vehicle Type
                            </button>
                            <button style="background-color: #7A9E8A; border:none" href="{{ route('motor-link-dashboard-vehicle-types') }}" type="button" class="btn btn-primary" id="backButton">
                                Back
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Image Preview and SweetAlert Confirmation -->
<script>
    // Preview Image functionality
    document.getElementById('imageUpload').addEventListener('change', function(event) {
        const file = event.target.files[0]; 
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('previewImage');
                preview.src = e.target.result;
                preview.style.display = 'block'; // Show the preview image
            }
            reader.readAsDataURL(file); 
        }
    });

    // Handle SweetAlert confirmation before submitting the form
    document.getElementById('addVehicleTypeButton').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent form submission

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to add this vehicle type?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, create vehicle type!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('addVehicleTypeForm').submit();
            }
        });
    });
</script>
@endsection
