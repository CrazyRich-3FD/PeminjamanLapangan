<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ @$title != '' ? "$title" : '' }} Booking Lapangan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('peminjaman/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com')}}">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('peminjaman/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('peminjaman/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('peminjaman/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('peminjaman/lib/twentytwenty/twentytwenty.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    {{-- <link href="{{ asset('peminjaman/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Template Stylesheet -->
    <link href="{{ asset('peminjaman/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('kalender/style.css') }}" />

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
</head>

<body style="color: rgb(158, 155, 155)">
    @include('sweetalert::alert')
    @include('layouts.spinner')
    @include('layouts.navbar')
    @yield('content')
    @include('layouts.footer')


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top mb-4"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="{{ asset('peminjaman/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('peminjaman/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('peminjaman/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('peminjaman/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('peminjaman/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('peminjaman/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('peminjaman/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('peminjaman/lib/twentytwenty/jquery.event.move.js') }}"></script>
    <script src="{{ asset('peminjaman/lib/twentytwenty/jquery.twentytwenty.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('peminjaman/js/main.js') }}"></script>
    <script src="{{ asset('kalender/script.js') }}"></script>
</body>

</html>
