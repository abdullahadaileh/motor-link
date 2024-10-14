@extends('dashboard.layouts.master')

@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('motor-link-dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Vehicle Types</a></li>
        </ol>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Vehicle Types List</h4>
                        <a style="background-color: #457B9D; border:none" href="{{ route('motor-link-dashboard-vehicle-types-create') }}" class="btn btn-primary mt-3">Add New Vehicle Type</a>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th> 
                                    <th>Type Name</th>
                                    <th>Description</th>
                                    <th style="width: 15.5%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($types as $type)
                                    <tr>
                                        <td>{{ $type->id }}</td>
                                        <td>
                                            @if($type->image)
                                            <img src="{{ asset($type->image) }}" alt="{{ $type->name }}" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;" />
                                        @else
                                            <img src="{{ asset('path/to/default/image.jpg') }}" alt="No Image" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;" />
                                        @endif
                                        </td>
                                        <td>{{ $type->name }}</td>
                                        <td>{{ $type->description }}</td>
                                        <td>
                                            <div class="d-flex justify-content-between">
                                                <a style="background-color: #8FBBA1; border:none" href="{{ route('motor-link-dashboard-vehicle-types-edit', $type->id) }}" class="btn btn-info">Edit</a>
                                                <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $type->id }}')">Delete</button>

                                                <form id="deleteForm{{ $type->id }}" action="{{ route('motor-link-dashboard-vehicle-types-destroy', $type->id) }}" method="POST" style="display: none;">
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
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert script -->
<script>
    @if(session('success'))
        Swal.fire({
            title: 'Success!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @endif

    function confirmDelete(typeId) {
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
                document.getElementById('deleteForm' + typeId).submit();
            }
        });
    }
</script>

@endsection
