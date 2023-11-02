<!-- Carousel Start -->
<div class="container-fluid p-0">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="{{ asset ('peminjaman/img/carousel-1.jpg') }}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-3 animated slideInDown">Ingin Bermain Futsal Bersama Teman Atau Saudara</h5>
                        <h1 class="display-1 text-white mb-md-4 animated zoomIn">Booking Lapangan Sekarang Juga</h1>
                        <a href="{{ route('Lapangan.index') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Booking</a>
                        <a href="{{ route('Contact Us') }}" class="btn btn-warning py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="{{ asset ('peminjaman/img/carousel-2.jpg') }}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-3 animated slideInDown">Ingin Bermain Futsal Bersama Teman Atau Saudara</h5>
                        <h1 class="display-1 text-white mb-md-4 animated zoomIn">Booking Lapangan Sekarang Juga</h1>
                        <a href="{{ route('Lapangan.index') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Booking</a>
                        <a href="{{ route('Contact Us') }}" class="btn btn-warning py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->


<!-- Banner Start -->
<div class="container-fluid banner mb-5">
    <div class="container">
        <div class="row gx-0 wow zoomIn" data-wow-delay="0.1s">
            <div class="col-lg-7" >
                <div class="bg-primary d-flex flex-column p-5" style="height: 300px;">
                    <h3 class="text-white mb-3">Opening Hours</h3>
                    <div class="d-flex justify-content-between text-white mb-3">
                        <h6 class="text-white mb-0">Mon - Fri</h6>
                        <p class="mb-0"> 8:00am - 9:00pm</p>
                    </div>
                    <div class="d-flex justify-content-between text-white mb-3">
                        <h6 class="text-white mb-0">Saturday</h6>
                        <p class="mb-0"> 8:00am - 7:00pm</p>
                    </div>
                    <div class="d-flex justify-content-between text-white mb-3">
                        <h6 class="text-white mb-0">Sunday</h6>
                        <p class="mb-0"> 8:00am - 5:00pm</p>
                    </div>
                    <label class="btn btn-light">Ingin Pesan Jangan Lupa Lihat Jadwal Ya Guys</label>
                    <a href="{{route('Event.index')}}"class="btn btn-sm btn-danger mt-1">LIHAT JADWAL TERKINI</a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="bg-info d-flex flex-column p-5" style="height: 300px;">
                    <h3 class="text-white mb-3">Make Appointment</h3>
                    <p class="text-white">Ipsum erat ipsum dolor clita rebum no rebum dolores labore, ipsum magna at eos
                        et eos amet.</p>
                    <h2 class="text-white mb-0">+012 345 6789</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Start -->

