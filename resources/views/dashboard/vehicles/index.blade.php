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
                            <h5 class="card-title">Vehicle</h5>
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
                            <a href="{{ route('vehicles.create') }}" type="button" class="btn btn-outline-primary">Add
                                Vehicle</a>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>
                                            <b>Vehicle </b>Type
                                        </th>
                                        <th>Plate Number</th>
                                        <th>Year</th>
                                        <th>Region</th>
                                        <th>Owned Vehicle</th>
                                        <th>Service Scedule</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Vehicle Type</th>
                                        <th>Plate Number</th>
                                        <th>Year</th>
                                        <th>Region</th>
                                        <th>Owned Vehicle</th>
                                        <th>Service Scedule</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($data as $data)
                                        <tr>
                                            <td>{{ $data->type }}</td>
                                            <td>{{ $data->registration_number }}</td>
                                            <td>{{ $data->year }}</td>
                                            <td>{{ $data->region }}</td>
                                            <td>{{ $data->owned_vehicles }}</td>
                                            <td>{{ $data->service_schedule }}</td>

                                            <td>
                                                @if ($data->status == '1')
                                                    <span class="badge bg-success">Available</span>
                                                @else
                                                    <span class="badge bg-danger">Booked</span>
                                                @endif

                                            <td class="d-flex gap-2">
                                                <a href="{{ route('vehicles.edit', $data->slug) }}"
                                                    class="btn btn-outline-info">Edit</a>

                                                <form action="{{ route('vehicles.destroy', $data->id) }}" method="POST"
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
