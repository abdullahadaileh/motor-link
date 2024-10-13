@extends('dashboard.layouts.master')

@section('content')

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('motor-link-dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('motor-link-dashboard-vehicles-create') }}">Add Vehicle</a></li>
        </ol>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Vehicle</h4>
                    <p class="text-muted m-b-15 f-s-12">Fill in the details below to create a new vehicle.</p>

                    <div class="basic-form">
                        <!-- Form to add vehicle -->
                        <form id="addVehicleForm" method="POST" action="{{ route('motor-link-dashboard-vehicles-store') }}" enctype="multipart/form-data">
                            @csrf 
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="make">Make</label>
                                <select name="make" class="form-control input-default" required>
                                    <option value="">Select vehicle make</option>
                                    <option value="Toyota">Toyota</option>
                                    <option value="Honda">Honda</option>
                                    <option value="Nissan">Nissan</option>
                                    <option value="Kia">Kia</option>
                                    <option value="Hyundai">Hyundai</option>
                                    <option value="Ford">Ford</option>
                                    <option value="Chevrolet">Chevrolet</option>
                                    <option value="Mitsubishi">Mitsubishi</option>
                                    <option value="Subaru">Subaru</option>
                                    <option value="Mazda">Mazda</option>
                                    <option value="Volkswagen">Volkswagen</option>
                                    <option value="Renault">Renault</option>
                                    <option value="Peugeot">Peugeot</option>
                                    <option value="Mercedes-Benz">Mercedes-Benz</option>
                                    <option value="BMW">BMW</option>
                                    <option value="Land Rover">Land Rover</option>
                                    <option value="Dodge">Dodge</option>
                                    <option value="Jeep">Jeep</option>
                                    <option value="Lexus">Lexus</option>
                                    <option value="Chrysler">Chrysler</option>
                                    <option value="Buick">Buick</option>
                                    <option value="Volvo">Volvo</option>
                                    <option value="Fiat">Fiat</option>
                                    <option value="Tesla">Tesla</option>
                                    <option value="Infiniti">Infiniti</option>
                                    <option value="Acura">Acura</option>
                                    <option value="Lincoln">Lincoln</option>
                                    <option value="Mini">Mini</option>
                                    <option value="Porsche">Porsche</option>
                                    <option value="Jaguar">Jaguar</option>
                                    <option value="Aston Martin">Aston Martin</option>
                                    <option value="Alfa Romeo">Alfa Romeo</option>
                                    <option value="Genesis">Genesis</option>
                                    <option value="Scion">Scion</option>
                                    <option value="Saab">Saab</option>
                                    <option value="Lotus">Lotus</option>
                                    <option value="Pagani">Pagani</option>
                                    <option value="Mitsubishi">Mitsubishi</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="model">Model</label>
                                <input type="text" name="model" class="form-control input-default" placeholder="Enter vehicle model" required>
                            </div>

                            <div class="form-group">
                                <label for="year">Year</label>
                                <select name="year" class="form-control input-default" required>
                                    <option value="">Select year</option>
                                    <?php
                                    $currentYear = date("Y");
                                    for ($year = 1980; $year <= $currentYear; $year++) {
                                        echo "<option value=\"$year\">$year</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select name="type_id" class="form-control input-default" required>
                                    <option value="">Select vehicle type</option>
                                    @foreach($vehicleTypes as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                                                                                                                 
                            <div class="form-group">
                                <label for="price_per_day">Price Per Day</label>
                                <input type="number" name="price_per_day" class="form-control input-default" placeholder="Enter price per day" required>
                            </div>

                            <div class="form-group">
                                <label for="fuel_type">Fuel Type</label>
                                <select name="fuel_type" class="form-control input-default" required>
                                    <option value="" disabled selected>Select fuel type</option>
                                    <option value="Petrol">Petrol</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Electric">Electric</option>
                                    <option value="Hybrid">Hybrid</option>
                                    <option value="CNG">CNG</option>
                                    <option value="LPG">LPG</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control input-default" required>
                                    <option value="" disabled selected>Select vehicle status</option>
                                    <option value="available">Available</option>
                                    <option value="unavailable">Unavailable</option>
                                    <option value="maintenance">Under Maintenance</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="image">Vehicle Image</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="imageUpload" accept="image/*" required>
                                        <label class="custom-file-label" for="imageUpload">Choose file</label>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <img id="previewImage" src="" alt="Vehicle Image" class="img-thumbnail" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; display: none;">
                                </div>
                            </div>
                            
                            <!-- Trigger SweetAlert for confirmation -->
                            <button style="background-color: #457B9D; border:none" type="button" class="btn btn-primary" id="addVehicleButton">
                                Add Vehicle
                            </button>
                            <button style="background-color: #7A9E8A; border:none" type="button" class="btn btn-primary" id="backButton">
                                Back
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>            
    </div>
</div>

<!-- JavaScript to handle SweetAlert confirmation and Image Preview -->
<script>
    // Preview Image functionality
    document.getElementById('imageUpload').addEventListener('change', function(event) {
        const file = event.target.files[0]; 
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('previewImage');
                preview.src = e.target.result;
                preview.style.display = 'block'; // Show the preview image
            }
            reader.readAsDataURL(file); 
        }
    });

    // Handle SweetAlert confirmation before submitting the form
    document.getElementById('addVehicleButton').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent form submission

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to add this vehicle?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, add vehicle!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('addVehicleForm').submit();
            }
        });
    });

    // Handle Back button action
    document.getElementById('backButton').addEventListener('click', function() {
        window.location.href = '{{ route("motor-link-dashboard-vehicles-index") }}';
    });
</script>

@endsection  
