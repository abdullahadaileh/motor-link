@extends('dashboard.layouts.master')

@section('content')

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('motor-link-dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Users</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                        <h4 class="card-title">Users List</h4>                        
                        <a style="background-color: #457B9D;border:none" href="{{ route('motor-link-dashboard-addUser') }}" class="btn btn-primary">Add User</a> 
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th style="width: 25%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            {{-- <td>{{ $loop->iteration }}</td> --}}
                                            <td>{{ $user->id }}</td>
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
                                                <div class="d-flex justify-content-between">
                                                    <a style="background-color: #7A9E8A; border:none; color:white" href="{{ route('motor-link-dashboard-showUser', $user->id) }}" class="btn btn-warning">View</a>
                                                    <a style="background-color: #457B9D; border:none; color:white" href="{{ route('motor-link-dashboard-editUser', $user->id) }}" class="btn btn-warning">Edit</a>
                                                
                                                <button style="border: none" type="button" class="btn btn-danger" onclick="confirmDelete('{{ $user->id }}')">
                                                    Delete
                                                </button>

                                                <form id="deleteForm{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                </div>
                                            </td>                                                                                    
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- <a href="{{ route('motor-link-dashboard-addUser') }}" class="btn btn-primary">Add User</a>  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->

    <script>
        @if(session('success'))
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif

        function confirmDelete(userId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm' + userId).submit();
                }
            });
        }
    </script>

@endsection
