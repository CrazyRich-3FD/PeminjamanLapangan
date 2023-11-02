@extends('layouts.index')
@section('content')
    <!-- Appointment Start -->
    <div class="container-fluid bg-light rounded wow fadeInUp" data-wow-delay="0.1s">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 py-5">
                    <div class="py-5">
                        <div class="section-title mb-4">
                            <h5 class="position-relative d-inline-block text-primary text-uppercase">Booking Lapangan</h5>
                        </div>
                        <h1 class="display-5 mb-4" style="color: rgb(18, 18, 53)">We Are A Certified and Award Winning Dental
                            Clinic You Can Trust</h1>
                        <p class="text-dark mb-0">Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum.
                            Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt voluptua. Eos vero
                            eos vero ea et dolore eirmod et. Dolores diam duo invidunt lorem. Elitr ut dolores magna sit.
                            Sea dolore sanctus sed et. Takimata takimata sanctus sed.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="appointment-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn"
                        data-wow-delay="0.6s">
                        <h1 class="text-dark mb-5">Booking Lapangan</h1>
                        <form action="{{ route('Booking.store') }}" method="POST">
                            @csrf
                            <div class="row gy-4">
                                <input type="text" name="status" value="menunggu" hidden>
                                @auth
                                    <div class="col-12">
                                        <span>
                                            <h5 class="text-start">Atas Nama</h5>
                                        </span>
                                        <input type="text" class="form-control bg-white border-0" disabled
                                            value="{{ auth()->user()->name }}" style="height: 55px;">
                                        <input type="text" name="user_id" value="{{ auth()->user()->iduser }}" hidden>
                                    </div>
                                @endauth
                                <div class="col-12">
                                    <div class="row">
                                        <span>
                                            <h5>Lapangan</h5>
                                        </span>
                                        <div class="col-12 col-sm-6">
                                            <span>
                                                <h6>Jenis Lapangan</h6>
                                            </span>
                                            <select class="form-select bg-white border-0" style="height: 55px;">
                                                @if ($lf != null && $lf->idfoto != null)
                                                    <option value="{{ $lf->lap->idlapangan }}">{{ $lf->lap->jl->jenis }}
                                                    </option>
                                                @else
                                                    <option selected>Pilih Jenis Lapangan</option>
                                                    @foreach ($lap as $l)
                                                        <option value="{{ $l->idlapangan }}">{{ $l->jl->jenis }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <span>
                                                <h6>Lapangan</h6>
                                            </span>
                                            <select class="form-select bg-white border-0" style="height: 55px;"
                                                name="lapangan_id">
                                                @if ($lf != null && $lf->idfoto != null)
                                                    <option value="{{ $lf->lapangan_id }}">{{ $lf->lap->nama }}</option>
                                                @else
                                                    <option selected>Pilih Lapangan</option>
                                                    @foreach ($lap as $l)
                                                        <option value="{{ $l->idlapangan }}">{{ $l->nama }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="row gy-2">
                                        <span>
                                            <h5>Tanggal & Waktu Pinjam</h5>
                                        </span>
                                        <div class="col-12 col-sm-5">
                                            <span>
                                                <h6>Tanggal Awal</h6>
                                            </span>
                                            <input type="date" id="Ride_Start_Date1" class="form-control text-center"
                                                name="tgl_awal">
                                        </div>
                                        <div class="col-12 col-sm-2">
                                            <span class="m-1">
                                                <h6>-Sampai-</h6>
                                            </span>
                                        </div>
                                        <div class="col-12 col-sm-5">
                                            <span>
                                                <h6>Tanggal Akhir</h6>
                                            </span>
                                            <input type="date" id="Ride_Start_Date2" class="form-control text-center"
                                                name="tgl_akhir">
                                        </div>
                                        <div class="col-12 col-sm-5">
                                            <label for="inputTime1" class="">Jam Mulai</label>
                                            <select class="form-select" id="inputTime1" aria-label="Jam Awal"
                                                name="jam_awal">
                                                <option value="00:00">00:00</option>
                                                <option value="01:00">01:00</option>
                                                <option value="02:00">02:00</option>
                                                <option value="03:00">03:00</option>
                                                <option value="04:00">04:00</option>
                                                <option value="05:00">05:00</option>
                                                <option value="06:00">06:00</option>
                                                <option value="07:00">07:00</option>
                                                <option value="08:00">08:00</option>
                                                <option value="09:00">09:00</option>
                                                <option value="10:00">10:00</option>
                                                <option value="11:00">11:00</option>
                                                <option value="12:00">12:00</option>
                                                <option value="13:00">13:00</option>
                                                <option value="14:00">14:00</option>
                                                <option value="15:00">15:00</option>
                                                <option value="16:00">16:00</option>
                                                <option value="17:00">17:00</option>
                                                <option value="18:00">18:00</option>
                                                <option value="19:00">19:00</option>
                                                <option value="20:00">20:00</option>
                                                <option value="21:00">21:00</option>
                                                <option value="22:00">22:00</option>
                                                <option value="23:00">23:00</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-2">
                                            <span class="m-1">
                                                <h6>-Sampai-</h6>
                                            </span>
                                        </div>
                                        <div class="col-12 col-sm-5">
                                            <label for="inputTime1" class="">Jam Mulai</label>
                                            <select class="form-select" id="inputTime1" aria-label="Jam Akhir"
                                                name="jam_akhir">
                                                <option value="00:00">00:00</option>
                                                <option value="01:00">01:00</option>
                                                <option value="02:00">02:00</option>
                                                <option value="03:00">03:00</option>
                                                <option value="04:00">04:00</option>
                                                <option value="05:00">05:00</option>
                                                <option value="06:00">06:00</option>
                                                <option value="07:00">07:00</option>
                                                <option value="08:00">08:00</option>
                                                <option value="09:00">09:00</option>
                                                <option value="10:00">10:00</option>
                                                <option value="11:00">11:00</option>
                                                <option value="12:00">12:00</option>
                                                <option value="13:00">13:00</option>
                                                <option value="14:00">14:00</option>
                                                <option value="15:00">15:00</option>
                                                <option value="16:00">16:00</option>
                                                <option value="17:00">17:00</option>
                                                <option value="18:00">18:00</option>
                                                <option value="19:00">19:00</option>
                                                <option value="20:00">20:00</option>
                                                <option value="21:00">21:00</option>
                                                <option value="22:00">22:00</option>
                                                <option value="23:00">23:00</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="text" name="idwaktu" value="{{ $rid }}" hidden>
                                <input type="text" name="peminjaman_id" value="{{ $rid }}" hidden>
                                <input type="text" name="idpinjam" value="{{ $rid }}" hidden>
                                <input type="text" name="ulasan_id" value="{{ $rid }}" hidden>
                                <input type="text" name="idulasan" value="{{ $rid }}" hidden>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" type="submit">Booking</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->
    <script>
        var date = new Date();
        var tdate = date.getDate();
        var month = date.getMonth() + 1;
        if (tdate < 10) {
            tdate = '0' + tdate;
        }
        if (month < 10) {
            month = '0' + month;
        }
        var year = date.getFullYear();
        var minDate = year + "-" + month + "-" + tdate;
        document.getElementById("Ride_Start_Date1").setAttribute('min', minDate);
        document.getElementById("Ride_Start_Date2").setAttribute('min', minDate);
        console.log(minDate);
    </script>
@endsection
