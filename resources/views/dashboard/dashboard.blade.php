@extends('dashboard.layouts.template')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <div class="col-lg-12">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">


                                <div class="card-body">
                                    <h5 class="card-title">Driver</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $countDriver }} Driver</h6>
                                            <span class="text-success small pt-1 fw-bold">{{ $countAvailableDrivers }}
                                                Available</span>
                                            <span class="text-danger small pt-1 fw-bold">{{ $countBookedDrivers }}
                                                Booked</span>
                                            <span class="text-warning small pt-1 fw-bold">{{ $countInactiveDrivers }}
                                                Inavtive</span>


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="card-body pb-0">
                                    <h5 class="card-title">Vehicle </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bx bxs-car"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $countVehicle }} Vehicle</h6>
                                            <span class="text-success small pt-1 fw-bold">{{ $countAvialableVehicles }}
                                                Available</span>
                                            <span class="text-danger small pt-1 fw-bold">{{ $countBookedVehicles }}
                                                Booked</span>

                                            <Span>
                                                (
                                                <span class="text-info small pt-1 fw-bold">{{ $countFreightVehicles }}
                                                    Freight Vehicle</span>

                                                <span
                                                    class="text-info small pt-1 fw-bold">{{ $countPeopleTransportVehicles }}
                                                    People Transport</span>
                                                )
                                            </Span>


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-xl-12">
                            <div class="card info-card customers-card">


                                <div class="card-body">
                                    <h5 class="card-title">Booking</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-clipboard-data"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $bookingCount }} Booking</h6>
                                            <span class="text-success small pt-1 fw-bold">{{ $bookingApprove }}
                                                Approved</span>
                                            <span class="text-warning small pt-1 fw-bold">{{ $bookingPending }}
                                                Pending</span>
                                            <span class="text-danger small pt-1 fw-bold">{{ $bookingRejected }}
                                                Rejected</span>


                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Vehicle Usage </h5>

                            <!-- Bar Chart -->


                            <div>
                                <canvas id="peopleTransportChart" style="max-height: 400px;"></canvas>
                            </div>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {

                                    new Chart(document.querySelector('#freightChart'), {
                                        type: 'bar',
                                        data: {
                                            labels: ['Freight Vehicles'],
                                            datasets: [{
                                                label: 'Vehicle Count',
                                                data: [{!! $countFreightVehicles !!}],
                                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                                borderColor: 'rgb(255, 99, 132)',
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true,
                                                    stepSize: 1 // Set step size to 1 for integer counts
                                                }
                                            }
                                        }
                                    });
                                });
                            </script>


                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Vehicle Usage</h5>

                            <div>
                                <canvas id="freightChart" style="max-height: 400px;"></canvas>
                            </div>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {

                                    new Chart(document.querySelector('#peopleTransportChart'), {
                                        type: 'bar',
                                        data: {
                                            labels: ['People Transport Vehicles'],
                                            datasets: [{
                                                label: 'Vehicle Count',
                                                data: [{!! $countPeopleTransportVehicles !!}],
                                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                                borderColor: 'rgb(75, 192, 192)',
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true,
                                                    stepSize: 1 // Set step size to 1 for integer counts
                                                }
                                            }
                                        }
                                    });
                                });
                            </script>


                        </div>
                    </div>
                </div>


            </div>
        </section>

    </main>
    <!-- End #main -->
@endsection
