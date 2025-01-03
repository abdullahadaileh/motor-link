<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('motor-link-dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
        </ol>
    </div>
</div>

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">Total Users</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $totalUsers }}</h2>
                        <p class="text-white mb-0">Jan - Oct 2024</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Total Vehicles</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $totalVehicles }}</h2>
                        <p class="text-white mb-0">Jan - Oct 2024</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-car"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white">Available Vehicles</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $availableVehicles }}</h2>
                        <p class="text-white mb-0">Jan - Oct 2024</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-car"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-4">
                <div class="card-body">
                    <h3 class="card-title text-white">Total Bookings</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $totalBookings }}</h2>
                        <p class="text-white mb-0">Jan - Oct 2024</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-car"></i></span>
                </div>
            </div>
        </div>
    </div>
    

    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Users and Vehicles Overview</h4>
                    <canvas id="overviewChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var ctx = document.getElementById('overviewChart').getContext('2d');
    var overviewChart = new Chart(ctx, {
        type: 'bar', // ('line' 'pie')
        data: {
            labels: ['Total Users', 'Total Vehicles', 'Available Vehicles','Total Bookings' ], 
            datasets: [{
                label: 'Counts',
                data: [{{ $totalUsers }}, {{ $totalVehicles }}, {{ $availableVehicles }},{{$totalBookings}}],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 159, 64, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
