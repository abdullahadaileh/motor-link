@extends('dashboard.layouts.master')

@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('motor-link-dashboard-bookings-index') }}">Booking</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Booking Details</a></li>
        </ol>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4 class="card-title">Vehicle: {{ $booking->vehicle->make }}</h4>
            
                <button style="background-color: #8FBBA1; border:none; color:white; margin-top:10px" type="button" class="btn btn-info" onclick="openModal({{ $booking->id }}, '{{ $booking->status }}')">
                    Change Status
                </button>
            </div>
            
            <div class="row">
                <!-- Col 1: Booking and User Details on the left -->
                <div class="col-md-8">
                    <p><strong>User:</strong> {{ $booking->user->name }}</p>
                    <p><strong>Start Date:</strong> {{ \Carbon\Carbon::parse($booking->start_date)->format('F j, Y') }}</p>
                    <p><strong>End Date:</strong> {{ \Carbon\Carbon::parse($booking->end_date)->format('F j, Y') }}</p>
                    <p><strong>Delivery Option:</strong> {{ $booking->delivery_option }}</p>
                    <p><strong>Total Price:</strong> ${{ $booking->total_price }}</p>
                    <p><strong>Payment Method:</strong> {{ $booking->payment_method }}</p>
                    <p><strong>Status:</strong> 
                        <span class="badge badge-{{ $booking->status == 'Approved' ? 'success' : ($booking->status == 'Declined' ? 'danger' : 'warning') }}">
                            {{ $booking->status }}
                        </span>
                    </p>
                    <h4>User Details</h4>
                    <p><strong>Email:</strong> {{ $booking->user->email }}</p>
                    <p><strong>Phone:</strong> {{ $booking->user->phone }}</p>
                    <p style="width:70%;"><strong>Address:</strong> {{ $booking->user->location }}</p>
                </div>

                <!-- Col 2: Vehicle Image on the right -->
                <div class="col-md-4 text-center">
                    <img src="{{ asset($booking->vehicle->image) }}" alt="Vehicle Image" style="width:160%;  margin-left:-190px;margin-top:40px">
                </div>
            </div>
        </div>
    </div>
    <a style="background-color: #8FBBA1; border:none; color:white; margin-top:10px" href="{{ route('motor-link-dashboard-bookings-index') }}" class="btn btn-secondary mt-3">Back to Bookings List</a>
    <!-- Modal for status change -->
<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusModalLabel">Change Booking Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="statusForm" method="POST" action="{{ route('motor-link-dashboard-bookings-update', ':id') }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="booking_id" id="booking_id">
                    <div class="form-group">
                        <label for="status">Select Status</label>
                        <select name="status" class="form-control">
                            <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Approved" {{ $booking->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                            <option value="Declined" {{ $booking->status == 'Declined' ? 'selected' : '' }}>Declined</option>
                            <option value="Canceled" {{ $booking->status == 'Canceled' ? 'selected' : '' }}>Canceled</option> <!-- Add this option -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
<script>
    function openModal(bookingId, currentStatus) {
        $('#booking_id').val(bookingId);
        $('#status').val(currentStatus);
        $('#statusForm').attr('action', $('#statusForm').attr('action').replace(':id', bookingId));
        $('#statusModal').modal('show');
    }
</script>

@endsection
