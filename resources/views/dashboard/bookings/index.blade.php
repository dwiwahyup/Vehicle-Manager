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
                                        <th>Pickup Date</th>
                                        <th>Return Date</th>
                                        <th>Fuel Consumtion</th>
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
                                        <th>Pickup Date</th>
                                        <th>Return Date</th>
                                        <th>Fuel Consumtion</th>
                                        <th>Note</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($data as $data)
                                        <tr>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->phone_number }}</td>
                                            <td>{{ $data->address }}</td>
                                            <td>{{ $data->license_number }}</td>
                                            <td>{{ $data->status }}</td>

                                            <td class="d-flex gap-2">
                                                <a href="{{ route('drivers.edit', $data->slug) }}"
                                                    class="btn btn-outline-info">Edit</a>

                                                <form action="{{ route('drivers.destroy', $data->id) }}" method="POST"
                                                    id="deleteForm">
                                                    @method('DELETE')
                                                    @csrf

                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit"
                                                        class="btn btn-xs btn-danger btn-flat show_confirm"
                                                        data-toggle="tooltip" title='Delete'>Delete</button>
                                                </form>
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
