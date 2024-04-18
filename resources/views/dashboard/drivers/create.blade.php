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

                            <form action="{{ route('drivers.store') }}" method="post" enctype="multipart/form-data"
                                class="row g-3">
                                @csrf

                                <div class="col-md-4">
                                    <label class="form-label">Driver Name</label>
                                    <input name="name" type="text" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Email</label>
                                    <input name="email" type="email" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Phone Number</label>
                                    <input name="phone_number" type="number" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Addres</label>
                                    <input name="address" type="text" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Licence Number</label>
                                    <input name="license_number" type="number" class="form-control">
                                </div>


                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">Status</label>
                                    <select name="status" id="inputState" class="form-select">
                                        <option value="0">Active/Avialable</option>
                                        <option value="1">Booked</option>
                                        <option value="2">Inactive</option>
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
