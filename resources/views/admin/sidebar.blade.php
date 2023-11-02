<!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link {{ set_on("Admin.index")}}" href="{{ route('Admin.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ set_on("Home.index")}}" href="{{ route('Home.index') }}">
                    <i class="bi bi-question-circle"></i>
                    <span>Landing Page</span>
                </a>
            </li><!-- End Landing Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ set_on("User.index")}}" href="{{ route('User.index') }}">
                    <i class="bi bi-person"></i>
                    <span>User</span>
                </a>
            </li><!-- End User Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ set_on("Lapangans.index")}}" href="{{ route('Lapangans.index') }}">
                    <i class="bi bi-envelope"></i>
                    <span>Lapangan</span>
                </a>
            </li><!-- End Lapangan Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ set_on(" Jenis.index")}}" href="{{ route('Jenis.index') }}">
                    <i class="bi bi-envelope"></i>
                    <span>Jenis Lapangan</span>
                </a>
            </li><!-- End Jenis Lapangan Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ set_on("Bookings.index")}}" href="{{ route('Bookings.index') }}">
                    <i class="bi bi-card-list"></i>
                    <span>Booking</span>
                </a>
            </li><!-- End Booking Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ set_on("Ulasan.index")}}" href="{{ route('Ulasan.index') }}">
                    <i class="bi bi-envelope"></i>
                    <span>Ulasan</span>
                </a>
            </li><!-- End Ulasan Page Nav -->

        </ul>

    </aside><!-- End Sidebar-->