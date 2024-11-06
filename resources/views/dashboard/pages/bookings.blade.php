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
                                    <th>Vehicle Name</th>
                                    {{-- <th>User</th> --}}
                                    {{-- <th>Location</th>  --}}
                                    <th>Delivery Option</th> 
                                    <th>Start Date</th>
                                    {{-- <th>End Date</th> --}}
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th style="width: 19%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->vehicle->make }}</td>
                                        {{-- <td>{{ $booking->user->name }}</td> --}}
                                        {{-- <td>{{ $booking->user->location }}</td>  --}}
                                        <td>{{ $booking->delivery_option }}</td>
                                        <td>{{ \Carbon\Carbon::parse($booking->start_date)->format('F j, Y') }}</td>
                                        {{-- <td>{{ \Carbon\Carbon::parse($booking->end_date)->format('F j, Y') }}</td> --}}
                                        <td>{{ $booking->total_price }}</td>
                                        <td>
                                            <span style="padding:10px; color:white" class="badge badge-{{ $booking->status == 'Approved' ? 'success' : ($booking->status == 'Declined' ? 'danger' : 'warning') }}">
                                                {{ $booking->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <a style="background-color: #8FBBA1; border:none; color:white; margin-top:10px" href="{{ route('motor-link-dashboard-bookings-show', $booking->id) }}" class="btn btn-primary" style="margin-top: 10px">
                                                View 
                                            </a>
                                            <form id="delete-form{{ $booking->id }}" action="{{ route('motor-link-dashboard-bookings-delete', $booking->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button style=" border:none; color:white; margin-top:10px" type="button" class="btn btn-danger" onclick="confirmDelete({{ $booking->id }})">
                                                    Delete
                                                </button>
                                            </form>
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

<script>
    function confirmDelete(bookingId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the delete form
                document.getElementById('delete-form' + bookingId).submit();
            }
        });
    }

</script>

@endsection
