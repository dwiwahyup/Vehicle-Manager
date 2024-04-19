<table class="table datatable">
    <thead>
        <tr>
            <th>Driver</th>
            <th>Vehicle</th>
            <th>Manager</th>
            <th>Staff</th>
            <th>Pickup</th>
            <th>Return</th>
            <th>Fuel</th>
            <th>Note</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($booking as $booking)
            <tr>
                <td>{{ $booking->driver->name }}</td>
                <td>{{ $booking->vehicle->registration_number }} - {{ $booking->vehicle->type }}</td>
                <td>
                    @if ($booking->approval_status_manager == 1)
                        <span class="badge bg-success">Approved</span>
                    @endif
                </td>
                <td>
                    @if ($booking->approval_status_staff == 1)
                        <span class="badge bg-success">Approved</span>
                    @endif
                </td>
                <td>{{ $booking->pickup_date }}</td>
                <td>{{ $booking->return_date }}</td>
                <td>{{ $booking->fuel_consumption }} Liter</td>
                <td>{{ $booking->note }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
