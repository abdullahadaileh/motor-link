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
                    <!-- Profile Information -->
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
                            <p><strong> Since: </strong>{{ $user->created_at->format('d M, Y') }}</p>
                            
                            <!-- Move the button inside this div for it to appear below the text -->
                            <a style="background-color: #8FBBA1; border:none" href="{{ route('motor-link-dashboard-editUser', $user->id) }}" class="btn btn-primary mt-3">Edit my info</a>
                        </div>
                    </div>
                    <div id="imageModal" class="image-modal">
                        <span class="close">&times;</span>
                        <img class="modal-content" id="modalImage">
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    // JavaScript for Image Modal
document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById("imageModal");
    var img = document.getElementById("profileImage");
    var modalImg = document.getElementById("modalImage");
    var closeBtn = document.getElementsByClassName("close")[0];

    // When the user clicks on the image, open the modal
    img.onclick = function() {
        modal.style.display = "flex";
        modalImg.src = this.src; // Set the modal image to the clicked image's source
    }

    // When the user clicks on <span> (x), close the modal
    closeBtn.onclick = function() {
        modal.style.display = "none";
    }

    // Close the modal if the user clicks outside the image
    modal.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});

</script>