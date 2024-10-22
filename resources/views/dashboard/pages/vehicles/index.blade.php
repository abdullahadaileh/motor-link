@extends('dashboard.layouts.master')

@section('content')

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('motor-link-dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Vehicles</a></li>
        </ol>
    </div>
</div>

<div class="container-fluid">
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Vehicles List</h4>
                        <a style="background-color: #457B9D; border:none"  href="{{ route('motor-link-dashboard-vehicles-create') }}" class="btn btn-primary mt-3">Add New Vehicle</a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <form method="GET" action="{{ route('motor-link-dashboard-vehicles-index') }}" class="d-flex">
                            <div class="form-group me-2">
                                <label for="type">Filter by Type</label>
                                <select name="type_id" id="type" class="form-control">
                                    <option value="">ALL</option>
                                    @foreach($vehicleTypes as $id => $name)
                                        <option value="{{ $id }}" {{ request('type_id') == $id ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn" style="background-color: #457B9D; border:none; color:white; height:45px">Filter</button>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Make</th>
                                    <th>Model</th>
                                    <th>Year</th>
                                    <th>Type</th>
                                    <th style="width: 23%;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vehicles as $vehicle)
                                    <tr>
                                        <td>{{ $vehicle->id }}</td>
                                        <td>
                                            @if($vehicle->image)
                                                <img src="{{ asset($vehicle->image) }}" alt="Image" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;" />
                                            @else
                                                <img src="{{ asset('landing/assets/images/carsilhouette.jpg') }}" alt="Image" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;" />
                                            @endif
                                        </td>
                                        <td>{{ $vehicle->make }}</td>
                                        <td>{{ $vehicle->model }}</td>
                                        <td>{{ $vehicle->year }}</td>
                                        <td>{{ $vehicle->type->name ?? 'N/A' }}</td> <!-- Adjusted to display the vehicle type -->
                                        <td>
                                            <div class="d-flex justify-content-between">
                                                <a style="background-color: #8FBBA1; border:none" href="{{ route('motor-link-dashboard-vehicles-show', $vehicle->id) }}" class="btn btn-info">View</a>
                                                <a style="background-color: #457B9D; border:none; color:white" href="{{ route('motor-link-dashboard-vehicles-edit', $vehicle->id) }}" class="btn btn-warning">Edit</a>
                                                
                                                <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $vehicle->id }}')">
                                                    Delete
                                                </button>

                                                <form id="deleteForm{{ $vehicle->id }}" action="{{ route('motor-link-dashboard-vehicles-destroy', $vehicle->id) }}" method="POST" style="display: none;">
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

    function confirmDelete(vehicleId) {
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
                document.getElementById('deleteForm' + vehicleId).submit();
            }
        });
    }
</script>

@endsection
