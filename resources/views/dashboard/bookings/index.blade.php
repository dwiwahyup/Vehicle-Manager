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
                            <h5 class="card-title">Booking</h5>
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
                            <a href="{{ route('bookings.create') }}" type="button" class="btn btn-outline-primary">Add
                                Booking</a>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>
                                            <b>Driver </b>
                                        </th>
                                        <th>Vehicle</th>
                                        <th>Manager</th>
                                        <th>Staff</th>
                                        <th>Pickup</th>
                                        <th>Return</th>
                                        <th>Fuel</th>
                                        <th>Note</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Driver</th>
                                        <th>Vehicle</th>
                                        <th>Manager</th>
                                        <th>Staff</th>
                                        <th>Pickup</th>
                                        <th>Return</th>
                                        <th>Fuel</th>
                                        <th>Note</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody">
                                    @foreach ($booking as $booking)
                                        <tr>
                                            <td>{{ $booking->driver->name }}</td>
                                            <td> {{ $booking->vehicle->registration_number }} -
                                                {{ $booking->vehicle->type }}
                                            </td>
                                            <td>
                                                @switch($booking->approval_status_manager)
                                                    @case(1)
                                                        <span class="badge bg-success">Approved</span>
                                                    @break

                                                    @case(0)
                                                        <span class="badge bg-warning">Pending</span>
                                                    @break

                                                    @default
                                                        <span class="badge bg-danger">Rejected</span>
                                                @endswitch
                                            </td>
                                            <td>
                                                @switch($booking->approval_status_staff)
                                                    @case(1)
                                                        <span class="badge bg-success">Approved</span>
                                                    @break

                                                    @case(0)
                                                        <span class="badge bg-warning">Pending</span>
                                                    @break

                                                    @default
                                                        <span class="badge bg-danger">Rejected</span>
                                                @endswitch
                                            </td>

                                            <td>{{ $booking->pickup_date }}</td>
                                            <td>{{ $booking->return_date }}</td>
                                            <td>{{ $booking->fuel_consumption }}</td>
                                            <td>{{ $booking->note }}</td>
                                            <td>
                                                <a href="{{ route('bookings.edit', $booking->id) }}"
                                                    class="btn btn-outline-primary mr-3">Edit</a>
                                                <form action="{{ route('bookings.destroy', $booking->id) }}" method="post"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger show_confirm"
                                                        data-name="{{ $booking->name }}">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach




                                    </tbody>


                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
@endsection
