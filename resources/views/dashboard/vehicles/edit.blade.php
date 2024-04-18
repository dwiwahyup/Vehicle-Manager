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
                            <h5 class="card-title">Edit Vehicle </h5>
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

                            <form action="{{ route('vehicles.update', $data->id) }}" method="post"
                                enctype="multipart/form-data" class="row g-3">
                                @method('PUT')
                                @csrf

                                <div class="col-md-4">
                                    <label for="vehicleType" class="form-label">Vehicle Type</label>
                                    <select name="type" id="vehicleType" class="form-select">
                                        <option value="">Select Vehicle Type</option>
                                        <option value="People Transport Vehicles"
                                            {{ (old('type') ?? $data->type) === 'People Transport Vehicles' ? 'selected' : '' }}>
                                            People Transport Vehicles</option>
                                        <option value="Freight Vehicles"
                                            {{ (old('type') ?? $data->type) === 'Freight Vehicles' ? 'selected' : '' }}>
                                            Freight Vehicles</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="plateNumber" class="form-label">Plate Number</label>
                                    <input value="{{ old('registration_number') ?? $data->registration_number }}"
                                        name="registration_number" type="text" class="form-control" id="plateNumber"
                                        placeholder="Example: S 4456 GG">
                                </div>

                                <div class="col-md-4">
                                    <label for="year" class="form-label">Year</label>
                                    <input value="{{ old('year') ?? $data->year }}" name="year" type="number"
                                        class="form-control" id="year" placeholder="YYYY" min="2017"
                                        max="2100">
                                </div>

                                <div class="col-md-4">
                                    <label for="region" class="form-label">Region</label>
                                    <select name="region" id="region" class="form-select">
                                        <option value="">Select Region</option>
                                        <option value="Head Office"
                                            {{ (old('region') ?? $data->region) === 'Head Office' ? 'selected' : '' }}>Head
                                            Office</option>
                                        <option value="Branch Office"
                                            {{ (old('region') ?? $data->region) === 'Branch Office' ? 'selected' : '' }}>
                                            Branch Office</option>
                                        <option value="Region 1"
                                            {{ (old('region') ?? $data->region) === 'Region 1' ? 'selected' : '' }}>Region
                                            1</option>
                                        <option value="Region 2"
                                            {{ (old('region') ?? $data->region) === 'Region 2' ? 'selected' : '' }}>Region
                                            2</option>
                                        <option value="Region 3"
                                            {{ (old('region') ?? $data->region) === 'Region 3' ? 'selected' : '' }}>Region
                                            3</option>
                                        <option value="Region 4"
                                            {{ (old('region') ?? $data->region) === 'Region 4' ? 'selected' : '' }}>Region
                                            4</option>
                                        <option value="Region 5"
                                            {{ (old('region') ?? $data->region) === 'Region 5' ? 'selected' : '' }}>Region
                                            5</option>
                                        <option value="Region 6"
                                            {{ (old('region') ?? $data->region) === 'Region 6' ? 'selected' : '' }}>Region
                                            6</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="ownedVehicle" class="form-label">Owned Vehicle</label>
                                    <select name="owned_vehicles" id="ownedVehicle" class="form-select">
                                        <option value="">Select Owned Vehicle</option>
                                        <option value="Company Owned"
                                            {{ (old('owned_vehicles') ?? $data->owned_vehicles) === 'Company Owned' ? 'selected' : '' }}>
                                            Company Owned</option>
                                        <option value="Rent"
                                            {{ (old('owned_vehicles') ?? $data->owned_vehicles) === 'Rent' ? 'selected' : '' }}>
                                            Rent</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Service Scedule</label>
                                    <input value="{{ old('service_schedule') ?? $data->service_schedule }}"
                                        name="service_schedule" type="date" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-select">
                                        <option value="1"
                                            {{ (old('status') ?? $data->status) === '1' ? 'selected' : '' }}>
                                            Available</option>
                                        <option value="0"
                                            {{ (old('status') ?? $data->status) === '0' ? 'selected' : '' }}>
                                            Booked</option>
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
