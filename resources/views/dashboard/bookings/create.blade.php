@extends('dashboard.layouts.template')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Booking Data</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Booking</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Booking</h5>
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

                            <form action="{{ route('bookings.store') }}" method="post" enctype="multipart/form-data"
                                class="row g-3">
                                @csrf


                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">Driver</label>
                                    <select name="driver_id" id="inputState" class="form-select">
                                        <option value="">Choose Driver</option>
                                        @foreach ($driver as $driver)
                                            <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">Vehicle</label>
                                    <select name="vehicle_id" id="inputState" class="form-select">
                                        <option value="">Choose Vehicle</option>
                                        @foreach ($vehicle as $vehicle)
                                            <option value="{{ $vehicle->id }}">
                                                {{ $vehicle->registration_number }} - {{ $vehicle->type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">Manager</label>
                                    <select name="manager_id" id="inputState" class="form-select">
                                        <option value="">Choose Manager</option>
                                        @foreach ($manager as $manager)
                                            <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">Staff</label>
                                    <select name="staff_id" id="inputState" class="form-select">
                                        <option value="">Choose Staff</option>
                                        @foreach ($staff as $staff)
                                            <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-md-4">
                                    <label class="form-label">Pickup Date</label>
                                    <input name="pickup_date" type="date" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Return Date</label>
                                    <input name="return_date" type="date" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Fuel Consumtion</label>
                                    <input name="fuel_consumption" type="number" class="form-control">
                                </div>

                                <div class="col-md-8">
                                    <label class="form-label">Note</label>
                                    <textarea name="note" class="form-control" style="height: 15px;"></textarea>
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
