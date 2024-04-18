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

                            <form action="{{ route('drivers.update', $data->id) }}" method="post"
                                enctype="multipart/form-data" class="row g-3">
                                @method('PUT')
                                @csrf


                                <div class="col-md-4">
                                    <label class="form-label">Driver Name</label>
                                    <input value="{{ old('name') ?? $data->name }}" name="name" type="text"
                                        class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Email</label>
                                    <input value="{{ old('email') ?? $data->email }}" name="email" type="email"
                                        class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Phone Number</label>
                                    <input value="{{ old('phone_number') ?? $data->phone_number }}" name="phone_number"
                                        type="number" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Addres</label>
                                    <input value="{{ old('address') ?? $data->address }}" name="address" type="text"
                                        class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Licence Number</label>
                                    <input value="{{ old('license_number') ?? $data->license_number }}"
                                        name="license_number" type="number" class="form-control">
                                </div>


                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">Status</label>
                                    <select name="status" id="inputState" class="form-select">
                                        <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Active/Available
                                        </option>
                                        <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Booked</option>
                                        <option value="2" {{ $data->status == 2 ? 'selected' : '' }}>Inactive</option>
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
