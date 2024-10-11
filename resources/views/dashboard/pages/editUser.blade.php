@extends('dashboard.layouts.master')

@section('content')
    <div class="row page-tiles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('motor-link-dashboard-users') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit User</a></li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit User</h4>

                        <!-- Form to edit user -->
                        <form id="editUserForm" action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') 

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
                            </div>

                            <!-- Image Upload and Preview -->
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
                                    <img id="previewImage" src="{{ asset($user->image) }}" alt="User Image" class="img-thumbnail" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                                </div>
                            </div>
                            
                            <!-- Button to trigger SweetAlert -->
                            <button style="background-color: #457B9D; border:none" type="button" class="btn btn-primary" id="confirmEdit">
                                Update User
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

    <!-- JavaScript for SweetAlert confirmation and Image Preview -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Store the original values for comparison
            const originalData = {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                phone_number: document.getElementById('phone_number').value
            };

            // Preview Image functionality
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

            // Function to check if form has been modified
            function isFormModified() {
                return document.getElementById('name').value !== originalData.name ||
                       document.getElementById('email').value !== originalData.email ||
                       document.getElementById('phone_number').value !== originalData.phone_number ||
                       document.getElementById('imageUpload').files.length > 0;
            }

            // SweetAlert confirmation before submitting the form
            document.getElementById('confirmEdit').addEventListener('click', function() {
                if (isFormModified()) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You are about to update this user's details.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, update it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('editUserForm').submit();
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'No Changes Detected',
                        text: "No modifications were made to update.",
                        icon: 'info',
                        confirmButtonColor: '#3085d6'
                    });
                }
            });

            // Optional: If the user tries to leave the page, warn them if form is modified
            window.addEventListener('beforeunload', function (e) {
                if (isFormModified()) {
                    e.preventDefault();
                    e.returnValue = ''; // Standard for most browsers
                }
            });
        });
        document.getElementById('backButton').addEventListener('click', function() {
        window.location.href = '{{ route("motor-link-dashboard-users") }}';
    });

    </script>
@endsection
