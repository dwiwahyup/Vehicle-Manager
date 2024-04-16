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
                            <h5 class="card-title">Datatables</h5>
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
                            <button type="button" class="btn btn-outline-primary" disabled>Add User</button>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>
                                            <b>N</b>ame
                                        </th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th data-type="date" data-format="YYYY/DD/MM">Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $data)
                                        <tr>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>
                                                @if ($data->roles === 'superadmin')
                                                    <span class="badge bg-danger">Super Admin</span>
                                                @elseif ($data->roles === 'admin')
                                                    <span class="badge bg-warning">Admin</span>
                                                @else
                                                    <span class="badge bg-success">User</span>
                                                @endif
                                            </td>
                                            <td>{{ $data->updated_at->toDateString() }}</td>
                                            <td class="d-flex gap-2">
                                                <a href="{{ route('users.edit', $data->slug) }}"
                                                    class="btn btn-outline-info">Edit</a>
                                                <form action="{{ route('users.destroy', $data->id) }}" method="POST">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit"
                                                        class="btn btn-xs btn-danger btn-flat show_confirm"
                                                        data-toggle="tooltip" title='Delete'>Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th data-type="date" data-format="YYYY/DD/MM">Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
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
