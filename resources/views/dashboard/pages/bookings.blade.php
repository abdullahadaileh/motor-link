@extends('dashboard.layouts.master')

@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('motor-link-dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Bookings</a></li>
        </ol>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bookings List</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Vehicle Name</th>
                                    <th>User</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->id }}</td>
                                        <td>{{ $booking->vehicle->make }}</td>
                                        <td>{{ $booking->user->name }}</td>
                                        <td>{{ $booking->start_date }}</td>
                                        <td>{{ $booking->end_date }}</td>
                                        <td>{{ $booking->total_price }}</td>
                                        <td>
                                            <span style="padding:10px; color:white" class="badge badge-{{ $booking->status == 'Approved' ? 'success' : ($booking->status == 'Rejected' ? 'danger' : 'warning') }}">
                                                {{ $booking->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <button style="background-color: #8FBBA1; border:none; color:white; margin-top:10px" type="button" class="btn btn-info" onclick="openModal({{ $booking->id }}, '{{ $booking->status }}')">
                                                Change Status
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                        <select name="status" id="status" class="form-control" required>
                            <option value="pending">Pending</option>
                            <option value="Approved">Approved</option>
                            <option value="Rejected">Rejected</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </form>
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
