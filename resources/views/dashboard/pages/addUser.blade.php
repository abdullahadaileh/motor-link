@extends('dashboard.layouts.master')

@section('content')

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('motor-link-dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('users.create') }}">Add User</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add User</h4>
                        <p class="text-muted m-b-15 f-s-12">Fill in the details below to create a new user.</p>

                        <div class="basic-form">
                            <!-- Form to add user -->
                            <form id="addUserForm" method="POST" action="{{ route('users.store') }}">
                                @csrf <!-- CSRF Token for form security -->

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control input-default" placeholder="Enter user name" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control input-default" placeholder="Enter user email" required>
                                </div>

                                <div class="form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control input-flat" placeholder="Enter user phone number">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control input-default" placeholder="Enter password" required>
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control input-default" placeholder="Confirm password" required>
                                </div>

                                <!-- Trigger SweetAlert for confirmation -->
                                <button type="button" class="btn btn-primary" id="addUserButton">
                                    Add User
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>

    <!-- JavaScript to handle SweetAlert confirmation -->
    <script>
        document.getElementById('addUserButton').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent form submission

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to add this user?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, add user!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show a success message and submit the form
                    Swal.fire(
                        'User Added!',
                        'The user has been added successfully.',
                        'success'
                    ).then(() => {
                        document.getElementById('addUserForm').submit();
                    });
                }
            });
        });
    </script>

@endsection
