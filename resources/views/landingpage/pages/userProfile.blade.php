@extends('landingpage.layouts.master')

@section('content')
<br>
<br>
<br>
<br>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div style="border: none !important" class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- First column for profile image -->
                        <div class="col-md-4 text-center">
                            @if($user->image)
                            <img id="profileImage" src="{{ asset($user->image) }}" alt="Profile Image" class="img-thumbnail profile-img" style="width: 280px; height: 280px; border-radius: 50%; object-fit: cover;">
                            @else
                            <img id="profileImage" src="{{ asset('dashboard/images/imgs/image.png') }}" alt="Default Profile Image" class="img-thumbnail profile-img" style="width: 280px; height: 280px; border-radius: 50%; object-fit: cover;">
                            @endif
                        </div>

                        <!-- Second column for primary details -->
                        <div class="col-md-4">
                            <br>
                            <br>
                            <p style="color: #6a8b9d"><strong style="color: #457B9D">Name:</strong> {{ $user->name }}</p>
                            <p style="color: #6a8b9d"><strong style="color: #457B9D">Email:</strong> {{ $user->email }}</p>
                            <p style="color: #6a8b9d"><strong style="color: #457B9D">Phone Number:</strong> {{ $user->phone_number ?? 'N/A' }}</p>
                        </div>

                        <!-- Third column for additional details -->
                        <div class="col-md-4">
                            <br>
                            <br>
                            <p style="color: #6a8b9d"><strong style="color: #457B9D">Since:</strong> {{ $user->created_at->format('d M, Y') }}</p>
                            <a style="background-color: #8FBBA1; border:none" href="{{ route('motor-link-dashboard-editUser', $user->id) }}" class="btn btn-primary mt-3">Edit my info</a>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <h1 class="Vehicles-title">Your Bookings</h1>
                    <br>
                    <br>
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
@endsection
