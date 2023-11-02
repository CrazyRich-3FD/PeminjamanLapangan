<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('Admin.index') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('/peminjaman/img/logo.jpeg') }}" alt="">
            <span class="d-none d-lg-block"> Booking Lapangan</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-chat-left-text"></i>
                    <span class="badge bg-success badge-number">{{ auth()->user()->unreadNotifications->count() }}</span>
                </a><!-- End Messages Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                    <li class="dropdown-header mx-5 text-dark fw-bold">
                        You have {{ auth()->user()->unreadNotifications->count() }} new messages
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    @foreach (auth()->user()->unreadNotifications as $notification)
                    @if ($notification->data['status'] == 'menunggu')
                    <li class="message-item" style="background-color: rgb(210, 224, 236)">
                        <a href="{{url($notification->data['url'].'?id='.$notification->id)}}">
                            <div class="">
                                <h4>{{ $notification->data['title'] }}</h4>
                                <p>{{ ucwords($notification->data['messages']) }}</p>
                                <p>{{ $notification->created_at->diffForHumans() }}</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    
                    @else
                        
                    @endif
                    @endforeach

                    <li class="dropdown-footer">
                        <a href="#">Show all messages</a>
                    </li>

                </ul><!-- End Messages Dropdown Items -->

            </li><!-- End Messages Nav -->
            @auth
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ auth()->user()->name }}</h6>
                            <span>{{ auth()->user()->role }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center"
                                href="{{ route('Admin.show', auth()->user()->iduser) }}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <form action="{{ route('Login.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item d-flex align-items-center"> <i
                                        class="bi bi-box-arrow-right"></i><span>Sign Out</span></button>
                            </form>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->
            @endauth


        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
