@extends('dashboard.layouts.master')

@section('content')

    <div class="row page-tiles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('motor-link-dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('users.create') }}">Add User</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add User</h4>
                        <p class="text-muted m-b-15 f-s-12">Fill in the details below to create a new user.</p>

                        <div class="basic-form">
                            <!-- Form to add user -->
                            <form id="addUserForm" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                                @csrf <!-- CSRF Token for form security -->

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control input-default" placeholder="Enter user name" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control input-default" placeholder="Enter user email" required>
                                </div>

                                <div class="form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control input-flat" placeholder="Enter user phone number">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control input-default" placeholder="Enter password" required>
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control input-default" placeholder="Confirm password" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="image">User Image</label>
                                
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
                                        <img id="previewImage" src="{{ asset('dashboard/images/imgs/image.png') }}" 
                                             alt="Default Profile Image" 
                                             class="img-thumbnail" 
                                             style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                                    </div>
                                </div>                                
                                <button style="background-color: #457B9D;border:none" type="submit" class="btn btn-primary">
                                    Add User
                                </button>
                                <button style="background-color: #8FBBA1; border:none" href="{{ route('motor-link-dashboard-users') }}" type="button" class="btn btn-primary" id="backButton">
                                    Back
                                </button>    
                            </form>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>

    <!-- SweetAlert Success Message -->
    <script>
        @if(session('success'))
            console.log("Session found: {{ session('success') }}"); // Debugging
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        @else
            console.log("No session found.");
        @endif

// JavaScript for Image Preview
document.getElementById('imageUpload').addEventListener('change', function(event) {
    const file = event.target.files[0]; 
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const previewImage = document.getElementById('previewImage');
            previewImage.src = e.target.result;
            previewImage.style.display = 'block'; // Show the image preview
        }
        reader.readAsDataURL(file); 
    }
});

// Handle Back button action
document.getElementById('backButton').addEventListener('click', function() {
    window.location.href = '{{ route("motor-link-dashboard-users") }}';
});

            // Handle Back button action
    document.getElementById('backButton').addEventListener('click', function() {
        window.location.href = '{{ route("motor-link-dashboard-users") }}';
    });

    </script>

@endsection
