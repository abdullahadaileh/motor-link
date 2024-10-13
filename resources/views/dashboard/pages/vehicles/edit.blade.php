@extends('dashboard.layouts.master')

@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('motor-link-dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Vehicle</a></li>
        </ol>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Vehicle</h4>

                    <form id="editVehicleForm" action="{{ route('motor-link-dashboard-vehicles-update', $vehicle->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="make" class="form-label">Make</label>
                            <select name="make" class="form-control input-default" required>
                                <option value="">Select vehicle make</option>
                                <option value="Toyota" {{ $vehicle->make == 'Toyota' ? 'selected' : '' }}>Toyota</option>
                                <option value="Honda" {{ $vehicle->make == 'Honda' ? 'selected' : '' }}>Honda</option>
                                <option value="Nissan" {{ $vehicle->make == 'Nissan' ? 'selected' : '' }}>Nissan</option>
                                <option value="Kia" {{ $vehicle->make == 'Kia' ? 'selected' : '' }}>Kia</option>
                                <option value="Hyundai" {{ $vehicle->make == 'Hyundai' ? 'selected' : '' }}>Hyundai</option>
                                <option value="Ford" {{ $vehicle->make == 'Ford' ? 'selected' : '' }}>Ford</option>
                                <option value="Chevrolet" {{ $vehicle->make == 'Chevrolet' ? 'selected' : '' }}>Chevrolet</option>
                                <option value="Mitsubishi" {{ $vehicle->make == 'Mitsubishi' ? 'selected' : '' }}>Mitsubishi</option>
                                <option value="Subaru" {{ $vehicle->make == 'Subaru' ? 'selected' : '' }}>Subaru</option>
                                <option value="Mazda" {{ $vehicle->make == 'Mazda' ? 'selected' : '' }}>Mazda</option>
                                <option value="Volkswagen" {{ $vehicle->make == 'Volkswagen' ? 'selected' : '' }}>Volkswagen</option>
                                <option value="Renault" {{ $vehicle->make == 'Renault' ? 'selected' : '' }}>Renault</option>
                                <option value="Peugeot" {{ $vehicle->make == 'Peugeot' ? 'selected' : '' }}>Peugeot</option>
                                <option value="Mercedes-Benz" {{ $vehicle->make == 'Mercedes-Benz' ? 'selected' : '' }}>Mercedes-Benz</option>
                                <option value="BMW" {{ $vehicle->make == 'BMW' ? 'selected' : '' }}>BMW</option>
                                <option value="Land Rover" {{ $vehicle->make == 'Land Rover' ? 'selected' : '' }}>Land Rover</option>
                                <option value="Dodge" {{ $vehicle->make == 'Dodge' ? 'selected' : '' }}>Dodge</option>
                                <option value="Jeep" {{ $vehicle->make == 'Jeep' ? 'selected' : '' }}>Jeep</option>
                                <option value="Lexus" {{ $vehicle->make == 'Lexus' ? 'selected' : '' }}>Lexus</option>
                                <option value="Chrysler" {{ $vehicle->make == 'Chrysler' ? 'selected' : '' }}>Chrysler</option>
                                <option value="Buick" {{ $vehicle->make == 'Buick' ? 'selected' : '' }}>Buick</option>
                                <option value="Volvo" {{ $vehicle->make == 'Volvo' ? 'selected' : '' }}>Volvo</option>
                                <option value="Fiat" {{ $vehicle->make == 'Fiat' ? 'selected' : '' }}>Fiat</option>
                                <option value="Tesla" {{ $vehicle->make == 'Tesla' ? 'selected' : '' }}>Tesla</option>
                                <option value="Infiniti" {{ $vehicle->make == 'Infiniti' ? 'selected' : '' }}>Infiniti</option>
                                <option value="Acura" {{ $vehicle->make == 'Acura' ? 'selected' : '' }}>Acura</option>
                                <option value="Lincoln" {{ $vehicle->make == 'Lincoln' ? 'selected' : '' }}>Lincoln</option>
                                <option value="Mini" {{ $vehicle->make == 'Mini' ? 'selected' : '' }}>Mini</option>
                                <option value="Porsche" {{ $vehicle->make == 'Porsche' ? 'selected' : '' }}>Porsche</option>
                                <option value="Jaguar" {{ $vehicle->make == 'Jaguar' ? 'selected' : '' }}>Jaguar</option>
                                <option value="Aston Martin" {{ $vehicle->make == 'Aston Martin' ? 'selected' : '' }}>Aston Martin</option>
                                <option value="Alfa Romeo" {{ $vehicle->make == 'Alfa Romeo' ? 'selected' : '' }}>Alfa Romeo</option>
                                <option value="Genesis" {{ $vehicle->make == 'Genesis' ? 'selected' : '' }}>Genesis</option>
                                <option value="Scion" {{ $vehicle->make == 'Scion' ? 'selected' : '' }}>Scion</option>
                                <option value="Saab" {{ $vehicle->make == 'Saab' ? 'selected' : '' }}>Saab</option>
                                <option value="Lotus" {{ $vehicle->make == 'Lotus' ? 'selected' : '' }}>Lotus</option>
                                <option value="Pagani" {{ $vehicle->make == 'Pagani' ? 'selected' : '' }}>Pagani</option>
                                <option value="Mitsubishi" {{ $vehicle->make == 'Mitsubishi' ? 'selected' : '' }}>Mitsubishi</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="model" class="form-label">Model</label>
                            <input type="text" class="form-control" id="model" name="model" value="{{ old('model', $vehicle->model) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="year" class="form-label">Year</label>
                            <select name="year" class="form-control input-default" required>
                                <option value="">Select year</option>
                                <?php
                                $currentYear = date("Y");
                                for ($year = 1980; $year <= $currentYear; $year++) {
                                    echo "<option value=\"$year\" " . ($vehicle->year == $year ? 'selected' : '') . ">$year</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="type_id" class="form-label">Type</label>
                            <select name="type_id" class="form-control input-default" required>
                                <option value="">Select vehicle type</option>
                                @foreach($vehicleTypes as $type)
                                    <option value="{{ $type->id }}" {{ $vehicle->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="price_per_day" class="form-label">Price Per Day</label>
                            <input type="number" class="form-control" id="price_per_day" name="price_per_day" value="{{ old('price_per_day', $vehicle->price_per_day) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="fuel_type" class="form-label">Fuel Type</label>
                            <select name="fuel_type" class="form-control input-default" required>
                                <option value="" disabled>Select fuel type</option>
                                <option value="Petrol" {{ $vehicle->fuel_type == 'Petrol' ? 'selected' : '' }}>Petrol</option>
                                <option value="Diesel" {{ $vehicle->fuel_type == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                                <option value="Electric" {{ $vehicle->fuel_type == 'Electric' ? 'selected' : '' }}>Electric</option>
                                <option value="Hybrid" {{ $vehicle->fuel_type == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                                <option value="CNG" {{ $vehicle->fuel_type == 'CNG' ? 'selected' : '' }}>CNG</option>
                                <option value="LPG" {{ $vehicle->fuel_type == 'LPG' ? 'selected' : '' }}>LPG</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-control input-default" required>
                                <option value="" disabled>Select vehicle status</option>
                                <option value="available" {{ $vehicle->status == 'available' ? 'selected' : '' }}>Available</option>
                                <option value="unavailable" {{ $vehicle->status == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                                <option value="maintenance" {{ $vehicle->status == 'maintenance' ? 'selected' : '' }}>Under Maintenance</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">Vehicle Image</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="imageUpload" accept="image/*">
                                    <label class="custom-file-label" for="imageUpload">Choose file</label>
                                </div>
                            </div>
                            <div class="mt-2">
                                <img id="previewImage" src="{{ asset($vehicle->image) }}" alt="Vehicle Image" class="img-thumbnail" style="max-height: 150px; object-fit: cover;">
                            </div>
                        </div>

                        <button style="background-color: #457B9D; border:none;" type="button" class="btn btn-primary" id="confirmEdit">Update Vehicle</button>
                        <button style="background-color: #7A9E8A; border:none" type="button" class="btn btn-primary" id="backButton">Back</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JavaScript for SweetAlert confirmation -->
<script>
    // Listen for the input change event
    document.getElementById('imageUpload').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader(); 
            reader.onload = function(e) {
                document.getElementById('previewImage').src = e.target.result;
            }
            reader.readAsDataURL(file); 
        }
    });

    document.getElementById('confirmEdit').addEventListener('click', function() {
        // Use SweetAlert here for confirmation
        document.getElementById('editVehicleForm').submit();
    });

    document.getElementById('backButton').addEventListener('click', function() {
        window.location.href = '{{ route("motor-link-dashboard-vehicles-index") }}';
    });
</script>

@endsection
