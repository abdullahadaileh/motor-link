@extends('dashboard.layouts.master')

@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('motor-link-dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Trashed Users</a></li>
        </ol>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Trashed Users</h4>
                    
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($users->isEmpty())
                        <p>No trashed users available.</p>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>                                            
                                            @if($user->image)
                                            <img src="{{ asset($user->image) }}" alt="Image" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;" />
                                            @else
                                            <img src="{{ asset('dashboard/images/imgs/image.png') }}" alt="Image" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;" />
                                        @endif
                                    </td>
                                    <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone_number ?? 'N/A' }}</td>
                                        <td>
                                            <form action="{{ route('motor-link-dashboard-users-restore', $user->id) }}" method="POST" class="restore-form">
                                                @csrf
                                                <button style="background-color: #7A9E8A; border:none" type="button" class="btn btn-primary restore-button">Restore</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    <a style="background-color: #457B9D; border:none" href="{{ route('motor-link-dashboard-users') }}" class="btn btn-primary">Back to Users</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.restore-button').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('form');

            Swal.fire({
                title: 'Are you sure?',
                text: "You are about to restore this user!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, restore it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    // Prevent alert if user navigates away without restoring
    let hasRestored = false;

    document.querySelectorAll('.restore-button').forEach(button => {
        button.addEventListener('click', function () {
            hasRestored = true; 
        });
    });

    window.addEventListener('beforeunload', function (e) {
        if (!hasRestored) {
            return undefined;
        }
    });
</script>
@endsection  
