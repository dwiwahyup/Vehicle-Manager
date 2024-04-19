<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        @if (Auth::user()->roles === 'admin')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('vehicles.index') }}">
                    <i class="bx bxs-car"></i>
                    <span>Vehicle</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('drivers.index') }}">
                    <i class="bi bi-people"></i>
                    <span>Driver</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('bookings.index') }}">
                    <i class="bi bi-plus-circle"></i>
                    <span>Booking</span>
                </a>
            </li>
        @endif
        <hr>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('approval.index') }}">
                <i class="bi bi-cart4"></i>
                <span>Approval</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('approval.approved') }}">
                <i class="bi bi-cart-check"></i>
                <span>Approved</span>
            </a>
        </li>


        @if (Auth::user()->roles === 'manager')
        @endif

        @if (Auth::user()->roles === 'staff')
        @endif






    </ul>

</aside>
<!-- End Sidebar-->
