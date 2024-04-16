@extends('dashboard.layouts.template')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Users Data</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Users Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Data</h5>

                            <form action="{{ route('users.update', $data->id) }}" method="POST"
                                enctype="multipart/form-data" class="row g-3">
                                @method('PUT')
                                @csrf
                                <div class="col-md-6">
                                    <label for="inputEmail5" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name') ?? $data->name }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">Roles</label>
                                    <select name="roles" id="inputState" class="form-select">
                                        <option value="superadmin"
                                            {{ (old('roles') ?? $data->roles) === 'superadmin' ? 'selected' : '' }}>Super
                                            Admin</option>
                                        <option value="admin"
                                            {{ (old('roles') ?? $data->roles) === 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="user"
                                            {{ (old('roles') ?? $data->roles) === 'user' ? 'selected' : '' }}>User</option>
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
