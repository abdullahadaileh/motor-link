@extends('dashboard.layouts.master')

@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('motor-link-dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">User Details</a></li>
        </ol>
    </div>
</div>
<!-- row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User Details</h4>
                    <br>
                    <div class="row">
                        <div class="col-md-4 text-center">
                            @if($user->image)
                                <img id="userImage" src="{{ asset($user->image) }}" alt="User Image" style="width: 300px; height: 300px; border-radius: 20%; object-fit: cover;" />
                            @else
                                <img id="userImage" src="{{ asset('path/to/default/image.jpg') }}" alt="User Image" style="width: 300px; height: 300px; border-radius: 20%; object-fit: cover;" />
                            @endif
                        </div>
                        <div class="col-md-8">
                            <br>
                            <br>        
                            <p><strong>Name:</strong> {{ $user->name }}</p>
                            <p><strong>Email:</strong> {{ $user->email }}</p>
                            <p><strong>Phone Number:</strong> {{ $user->phone_number ?? 'N/A' }}</p>
                            
                            <a style="background-color: #457B9D; border:none" href="{{ route('motor-link-dashboard-users') }}" class="btn btn-primary">Back to Users</a>
                            <a style="background-color: #8FBBA1; border:none" href="{{ route('motor-link-dashboard-editUser', $user->id) }}" class="btn btn-primary">Edit User</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Structure -->
<div id="imageModal" class="image-modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="modalImage">
</div>

<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const image = document.getElementById('userImage');
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
