@extends('dashboard.layouts.master')

@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('motor-link-dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
        </ol>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Profile</h4>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            @if($user->image)
                                <img id="profileImage" src="{{ asset($user->image) }}" alt="Profile Image" class="img-thumbnail profile-img" style="width: 280px; height: 280px; border-radius: 50%; object-fit: cover;">
                            @else
                                <img id="profileImage" src="{{ asset('dashboard/images/imgs/image.png') }}" alt="Default Profile Image" class="img-thumbnail profile-img" style="width: 280px; height: 280px; border-radius: 50%; object-fit: cover;">
                            @endif
                        </div>

                        <div class="col-md-8">
                            <br>
                            <br>
                            <p><strong>Name: </strong> {{ $user->name }}</p>
                            <p><strong>Email: </strong> {{ $user->email }}</p>
                            <p><strong>Phone Number: </strong> {{ $user->phone_number ?? 'N/A' }}</p>
                            <p><strong>Since: </strong>{{ $user->created_at->format('d M, Y') }}</p>

                            <button class="btn btn-secondary mt-3" style="background-color: #8FBBA1; color:white; border:none" data-toggle="modal" data-target="#editProfileModal">Edit Profile</button>
                        </div>
                    </div>

                    <!-- Modal for Editing Profile -->
                    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('updateProfile', $user->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <!-- Name and Current Password fields -->
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="old_password" class="form-label">Current Password</label>
                                                <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter current password">
                                            </div>
                                        </div>
                                      
                                        <!-- Email and New Password fields -->
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="password" class="form-label">New Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password">
                                            </div>
                                        </div>
                                      
                                        <!-- Phone number and Confirm Password fields -->
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="phone_number" class="form-label">Phone Number</label>
                                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $user->phone_number }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password">
                                            </div>
                                        </div>
                                        
                                        <!-- Image Upload -->
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input" id="imageUpload" accept="image/*">
                                                    <label class="custom-file-label" for="imageUpload">Choose file</label>
                                                    
                                                    <!-- Image Preview Section -->
                                                    <div id="imagePreview" class="mt-2">
                                                        @if($user->image)
                                                            <img src="{{ asset($user->image) }}" alt="Current Image" class="img-thumbnail" width="100" id="previewImage">
                                                        @else
                                                            <img src="" alt="Preview Image" class="img-thumbnail mt-2" width="100" id="previewImage" style="display: none;">
                                                        @endif
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        {{-- <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="imageUpload" accept="image/*">
                                            <label class="custom-file-label" for="imageUpload">Choose file</label>
                                        </div> --}}
    
                                        <!-- Save Changes Button -->
                                        <div class="d-flex justify-content-end mt-3">
                                            <button type="submit" class="btn btn-primary" style="background-color: #457B9D;border:none">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                                        <!-- End Modal -->

                    <!-- Modal for Profile Image -->
                    <div id="imageModal" class="image-modal" style="display:none;">
                        {{-- <span class="close" style="cursor:pointer;">&times;</span> --}}
                        <img class="modal-content" id="modalImage" style="max-width: 90%; max-height: 90%;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Image Modal -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const profileImage = document.getElementById('profileImage');
        const imageModal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        const closeImageModal = document.querySelector('.close');

        profileImage.addEventListener('click', function () {
            imageModal.style.display = 'flex';
            modalImage.src = this.src;
        });

        
        closeImageModal.addEventListener('click', function () {
            imageModal.style.display = 'none';
        });

        window.addEventListener('click', function (e) {
            if (e.target === imageModal) {
                imageModal.style.display = 'none';
            }
        });
    });
    document.getElementById('imageUpload').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            // Set the preview image source to the file content
            const previewImage = document.getElementById('previewImage');
            previewImage.src = e.target.result;
            previewImage.style.display = 'block'; // Show the preview image
        };
        reader.readAsDataURL(file);
    }
});

</script>
@endsection
