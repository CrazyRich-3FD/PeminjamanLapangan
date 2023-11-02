<!-- Topbar Start -->
<div class="container-fluid bg-light ps-5 pe-0 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center">
                <small class="py-2"><i class="far fa-clock text-primary me-2"></i>Opening Hours: Mon - Tues : 6.00 am -
                    10.00 pm, Sunday Closed </small>
            </div>
        </div>
        <div class="col-md-6 text-center text-lg-end">
            <div class="position-relative d-inline-flex align-items-center bg-primary text-white top-shape px-5">
                <div class="me-3 pe-3 border-end py-2">
                    <p class="m-0"><i class="fa fa-envelope-open me-2"></i>info@example.com</p>
                </div>
                <div class="py-2">
                    <p class="m-0"><i class="fa fa-phone-alt me-2"></i>+012 345 6789</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
    <a href="{{ route('Home.index') }}" class="navbar-brand p-0">
        <h3 class="m-0 text-primary fw-bold"><img class="" style="width:40px;"
                src="{{ asset('/peminjaman/img/logo.jpeg') }}" alt=""> Boking Lapangan</h3>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0 fw-bold">
            <a href="{{ route('Home.index') }}" class="nav-item nav-link {{ set_active('Home.index') }}">Home</a>
            <a href="{{ route('Lapangan.index') }}"
                class="nav-item nav-link {{ set_active('Lapangan.index') }}">Lapangan</a>
            <a href="{{ route('Contact Us') }}" class="nav-item nav-link {{ set_active('Contact Us') }}">Contact</a>
            @auth
                <div class="nav-item nav-link">
                    <a style="font-size: 20px; text-decoration: none; color: black; font-weight: bold" href="#"
                        data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-danger badge-number">{{ auth()->user()->unreadNotifications->count() }}</span>
                    </a>
                    <!-- End Notification Icon -->

                    <style>
                        .scrollable-menu {
                            height: auto;
                            max-height: 400px;
                            overflow-x: hidden;
                            width: 300px;
                            max-width: 300px;
                        }
                    </style>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start scrollable-menu mt-n2">
                        <li class="dropdown-header">
                            You have {{ auth()->user()->unreadNotifications->count() }} new notifications
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        @foreach (auth()->user()->Notifications as $notification)
                            @if ($notification->data['status'] == 'disetujui')
                                <a href="{{ url($notification->data['urls']) }}"
                                    style="text-decoration: none; color: black">
                                    <li class="notification-item">
                                        <i class="bi bi-info-circle text-primary"></i>
                                        <div>
                                            <h4>{{ $notification->data['title'] }}</h4>
                                            <p>{{ ucwords($notification->data['messages']) }}{{ ucwords($notification->data['disetujui']) }}
                                            </p>
                                            <p>{{ $notification->created_at->diffForHumans() }}</p>
                                        </div>
                                    </li>
                                </a>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @elseif ($notification->data['status'] == 'selesai')
                                <a href="{{ url($notification->data['urls']) }}"
                                    style="text-decoration: none; color: black">
                                    <li class="notification-item">
                                        <i class="bi bi-info-circle text-primary"></i>
                                        <div>
                                            <h4>{{ $notification->data['title'] }}</h4>
                                            <p>{{ ucwords($notification->data['messages']) }}
                                                <br>{{ ucwords($notification->data['selesai']) }}
                                            </p>
                                            <p>{{ $notification->created_at->diffForHumans() }}</p>
                                        </div>
                                    </li>
                                </a>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @elseif ($notification->data['status'] == 'tolak')
                                <a href="{{ url($notification->data['urls']) }}"
                                    style="text-decoration: none; color: black">
                                    <li class="notification-item">
                                        <i class="bi bi-info-circle text-primary"></i>
                                        <div>
                                            <h4>{{ $notification->data['title'] }}</h4>
                                            <p>{{ ucwords($notification->data['messages']) }}
                                                <br>{{ ucwords($notification->data['tolak']) }}
                                            </p>
                                            <p>{{ $notification->created_at->diffForHumans() }}</p>
                                        </div>
                                    </li>
                                </a>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @else
                            @endif
                        @endforeach
                    </ul>
                    <!-- End Notification Dropdown Items -->
                </div>


                <div class="nav-item nav-link dropdown-center mt-n1">
                    <button type="button" class="btn btn-primary py-2 px-4 dropdown-toggle" data-bs-toggle="dropdown"
                        data-bs-display="static" aria-expanded="false">
                        Welcome, {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start mt-n2 w-100">
                        @if (auth()->user()->role == 'admin')
                            <li><a class="dropdown-item" href="{{ route('Admin.index') }}"><i
                                        class="fas fa-fire"></i>&emsp;<span>Dasboard</span></a></li>
                        @endif
                        <li><a class="dropdown-item" href="{{ route('Home.show', auth()->user()->iduser) }}"><i
                                    class="fas fa-user"></i>&emsp;<span>Profile</span></a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('home.riwayat') }}"><i
                                    class="fas fa-coins"></i>&emsp;<span>Riwayat
                                    Peminjaman</span></a></li>
                        <div class="dropdown-divider"></div>
                        <li>
                            <form action="{{ route('Login.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item fw-bold"><i
                                        class="fas fa-sign-out-alt"></i>&emsp;<span>Logout</span></button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <div class="nav-item nav-link dropdown-center mt-n1">
                    <a href="{{ route('Login.index') }}" class="btn btn-primary py-2 px-4 ms-3">Login</a>
                </div>
            @endauth
        </div>

    </div>
</nav>
<!-- Navbar End -->
