@extends('landingpage.layouts.master')

@section('content')
<br><br><br><br><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div style="border: none !important" class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- Profile Image Column -->
                        <div class="col-md-4 text-center">
                            @if($user->image)
                            <img id="profileImage" src="{{ asset($user->image) }}" alt="Profile Image" class="img-thumbnail profile-img" style="width: 280px; height: 280px; border-radius: 50%; object-fit: cover;">
                            @else
                            <img id="profileImage" src="{{ asset('dashboard/images/imgs/image.png') }}" alt="Default Profile Image" class="img-thumbnail profile-img" style="width: 280px; height: 280px; border-radius: 50%; object-fit: cover;">
                            @endif
                        </div>

                        <!-- Primary Details Column -->
                        <div class="col-md-4">
                            <br><br>
                            <p style="color: #6a8b9d"><strong style="color: #457B9D">Name:</strong> {{ $user->name }}</p>
                            <p style="color: #6a8b9d"><strong style="color: #457B9D">Email:</strong> {{ $user->email }}</p>
                            <p style="color: #6a8b9d"><strong style="color: #457B9D">Phone Number:</strong> {{ $user->phone_number ?? 'N/A' }}</p>
                        </div>

                        <!-- Additional Details Column -->
                        <div class="col-md-4">
                            <br><br>
                            <p style="color: #6a8b9d"><strong style="color: #457B9D">Since:</strong> {{ $user->created_at->format('d M, Y') }}</p>
                            <!-- Button to trigger modal -->
                            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#editProfileModal" style="width:32%;background-color: #8FBBA1; border:none">
                                Edit my info
                            </button>
                        </div>
                    </div>

                    <br><br><br>
                    <h1 class="Vehicles-title">Your Bookings</h1>
                    <br><br>

                    @if($bookings->isEmpty())
                        <p>You have not made any bookings yet.</p>
                    @else
                    <table class="table table-striped table-bordered text-center" style="background-color: #ffffff !important;">
                        <thead>
                            <tr style="background-color: #ffffff !important;">
                                <th>Vehicle Image</th>
                                <th>Vehicle Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Total Price</th>
                                <th>Delivery Option</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: #ffffff !important;">
                            @foreach($bookings as $booking)
                                <tr>
                                    <td class="align-middle">
                                        @if($booking->vehicle->image)
                                        <img src="{{ asset($booking->vehicle->image) }}" alt="{{ $booking->vehicle->make }}" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">
                                        @else
                                        <img src="{{ asset('landing/assets/images/carsilhouette.jpg') }}" alt="Image" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;" />
                                    @endif
                                    </td>
                                    <td class="align-middle">{{ $booking->vehicle->make }}</td>
                                    <td class="align-middle">{{ \Carbon\Carbon::parse($booking->start_date)->format('d M Y') }}</td>
                                    <td class="align-middle">{{ \Carbon\Carbon::parse($booking->end_date)->format('d M Y') }}</td>
                                    <td class="align-middle">{{ number_format($booking->total_price, 2) }}</td>
                                    <td class="align-middle">{{ $booking->delivery_option }}</td>
                                    <td class="align-middle">{{ $booking->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Editing Profile -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('updateProfile', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $user->phone_number }}">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Profile Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: #457B9D;">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
