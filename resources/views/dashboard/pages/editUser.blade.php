@extends('dashboard.layouts.master')

@section('content')
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('motor-link-dashboard-users') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit User</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit User</h4>

                        <form id="editUserForm" action="{{ route('users.update', $user->id) }}" method="POST">
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

                            <!-- Button to trigger SweetAlert -->
                            <button type="button" class="btn btn-primary" id="confirmEdit">
                                Update User
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- JavaScript for SweetAlert confirmation -->
    <script>
        document.getElementById('confirmEdit').addEventListener('click', function() {
            // Trigger SweetAlert confirmation
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
                    // Submit the form if confirmed
                    document.getElementById('editUserForm').submit();
                }
            });
        });

        // Check if there's a success message in the session and show SweetAlert
    </script>
@endsection
