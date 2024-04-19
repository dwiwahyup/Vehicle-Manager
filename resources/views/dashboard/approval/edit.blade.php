@extends('dashboard.layouts.template')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Approval Data</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Approval</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Approval </h5>
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

                            @if (Auth::user()->id == $booking->manager_id)
                                <form action="{{ route('approval.updateManager', $booking->id) }}" method="post"
                                    enctype="multipart/form-data" class="row g-3">
                                    @method('PUT')
                                    @csrf


                                    <div class="col-md-6">
                                        <label for="inputState" class="form-label">Approval Status</label>
                                        <select name="approval_status_manager" id="inputState" class="form-select">
                                            <option value="">Choose Approval</option>
                                            <option value="{{ $booking->approval_status_manager }}" selected>
                                                @if ($booking->approval_status_manager == 0)
                                                    Pending
                                                @elseif ($booking->approval_status_manager == 1)
                                                    Approved
                                                @elseif ($booking->approval_status_manager == 2)
                                                    Rejected
                                                @endif
                                            </option>
                                            <option value="0">Pending</option>
                                            <option value="1">Approved</option>
                                            <option value="2">Rejected</option>
                                        </select>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            @endif

                            @if (Auth::user()->id == $booking->staff_id)
                                <form action="{{ route('approval.updateStaff', $booking->id) }}" method="post"
                                    enctype="multipart/form-data" class="row g-3">
                                    @method('PUT')
                                    @csrf

                                    <div class="col-md-6">
                                        <label for="inputState" class="form-label">Approval Status</label>
                                        <select name="approval_status_staff" id="inputState" class="form-select">
                                            <option value="">Choose Approval</option>
                                            <option value="{{ $booking->approval_status_staff }}" selected>
                                                @if ($booking->approval_status_staff == 0)
                                                    Pending
                                                @elseif ($booking->approval_status_staff == 1)
                                                    Approved
                                                @elseif ($booking->approval_status_staff == 2)
                                                    Rejected
                                                @endif
                                            </option>
                                            <option value="0">Pending</option>
                                            <option value="1">Approved</option>
                                            <option value="2">Rejected</option>
                                        </select>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            @endif



                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
