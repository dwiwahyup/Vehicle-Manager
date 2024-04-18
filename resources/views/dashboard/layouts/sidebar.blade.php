<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        {{-- Menu for Admin --}}
        @if (Auth::user()->roles === 'admin')
            <li class="nav-item">
                <a class="nav-link collapsed" href="">
                    <i class="bi bi-person"></i>
                    <span>Admin</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('vehicles.index') }}">
                    <i class="bi bi-person"></i>
                    <span>Vehicle</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('drivers.index') }}">
                    <i class="bi bi-person"></i>
                    <span>Driver</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('bookings.index') }}">
                    <i class="bi bi-person"></i>
                    <span>Booking</span>
                </a>
        @endif

        {{-- Menu for Leader --}}
        @if (Auth::user()->roles === 'manager')
            <li class="nav-item">
                <a class="nav-link collapsed" href="">
                    <i class="bi bi-person"></i>
                    <span>Manager</span>
                </a>
            </li>
        @endif

        {{-- Menu for Driver --}}
        @if (Auth::user()->roles === 'staff')
            <li class="nav-item">
                <a class="nav-link collapsed" href="">
                    <i class="bi bi-person"></i>
                    <span>Staff</span>
                </a>
            </li>
        @endif


        {{-- <li class="nav-item">
            <a class="nav-link collapsed" href="{{ '/dashboard/users' }}">
                <i class="bi bi-person"></i>
                <span>Users</span>
            </a>
        </li>> --}}


        {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Books</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ '/dashboard/books' }}">
                        <i class="bi bi-circle"></i><span>Books</span>
                    </a>
                </li>
                <li>
                    <a href="{{ '/dashboard/book_categories' }}">
                        <i class="bi bi-circle"></i><span>Book Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ '/dashboard/book_publishers' }}">
                        <i class="bi bi-circle"></i><span>Book Publisher</span>
                    </a>
                </li>

            </ul>
        </li> --}}



    </ul>

</aside>
<!-- End Sidebar-->
