@extends('dashboard.layouts.template')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Vehicle Data</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Vehicle</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Vehicle</h5>
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <i class="bi bi-check-circle me-1"></i>
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <i class="bi bi-exclamation-octagon me-1"></i>

                                    {{ session('error') }}
                                </div>
                            @endif

                            <form action="{{ route('vehicles.store') }}" method="post" enctype="multipart/form-data"
                                class="row g-3">
                                @csrf
                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">Vehicle Type</label>
                                    <select name="type" id="inputState" class="form-select">
                                        <option value="People Transport Vehicles">People Transport Vehicles</option>
                                        <option value="Freight Vehicles">Freight Vehicles</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Plate Number</label>
                                    <input name="registration_number" type="text" class="form-control"
                                        placeholder="example: S 4456 GG">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Year</label>
                                    <input name="year" type="number" class="form-control" placeholder="YYYY"
                                        min="2017" max="2100">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">Region</label>
                                    <select name="region" id="inputState" class="form-select">
                                        <option value="Head Office">Head Office</option>
                                        <option value="Branch office">Branch Office</option>
                                        <option value="Region 1">Region 1</option>
                                        <option value="Region 2">Region 2</option>
                                        <option value="Region 3">Region 3</option>
                                        <option value="Region 4">Region 4</option>
                                        <option value="Region 5">Region 5</option>
                                        <option value="Region 6">Region 6</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">Owned Vehicle</label>
                                    <select name="owned_vehicles" id="inputState" class="form-select">
                                        <option value="Company Owned">Company Owned</option>
                                        <option value="Rent">Rent</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Service Scedule</label>
                                    <input name="service_schedule" type="date" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">Status</label>
                                    <select name="status" id="inputState" class="form-select">
                                        <option value="1">Available</option>
                                        <option value="0">Booked</option>
                                    </select>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
