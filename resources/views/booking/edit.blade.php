@extends('admin.index')
@section('content')
<main id="main" class="main">
    <div class="card">
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
        <div class="card-body">
            <h5 class="card-title">Edit Peminjaman Form</h5>
    
            <!-- Floating Labels Form -->
            <form action="{{ route('Bookings.update', $w->idwaktu) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" placeholder="Lapangan" value="PMJ{{ $w->pin->idpinjam }}" disabled>
                        <label for="floatingName">ID Pinjam</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="State" name="user_id">
                            <option value="{{ $w->pin->us->iduser }}">{{ $w->pin->us->name }}</option>
                            @foreach ($us as $u) 
                                <option value="{{ $u->iduser }}" >{{ $u->name }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">User</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="State" name="lapangan_id">
                            <option value="{{ $w->pin->lap->idlapangan }}">{{ $w->pin->lap->nama }}</option>
                            @foreach ($lap as $l)
                            <option value="{{ $l->idlapangan }}">{{ $l->nama }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Lapangan</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="State" name="status">
                            <option value="{{ $w->pin->status }}">{{ $w->pin->status }}</option>
                            <option value="menunggu" >Menunggu</option>
                            <option value="disetujui">Disetujui</option>
                            <option value="tolak">Ditolak</option>
                            <option value="selesai">Selesai</option>
                        </select>
                        <label for="floatingSelect">Status</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="inputDate" class="col-sm-5 col-form-label">Tanggal Awal</label>
                    <div class="col-sm-7">
                        <input type="date" class="form-control" id="Ride_Start_Date1" name="tgl_awal" value="{{$w->tgl_awal}}">
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="inputDate" class="col-sm-5 col-form-label">Tanggal Akhir</label>
                    <div class="col-sm-7">
                        <input type="date" class="form-control" id="Ride_Start_Date2" name="tgl_akhir" value="{{$w->tgl_akhir}}">
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="inputTime" class="col-sm-5 col-form-label">Jam Mulai</label>
                    <div class="col-sm-7">
                        <input type="time" class="form-control" name="jam_awal" value="{{$w->jam_awal}}">
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="inputTime" class="col-sm-5 col-form-label">Jam Akhir</label>
                    <div class="col-sm-7">
                        <input type="time" class="form-control" name="jam_akhir" value="{{$w->jam_akhir}}">
                    </div>
                </div>
                <div class="col-9">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Keterangan" id="floatingTextarea" style="height: 100px;"
                            name="ulasan"></textarea>
                        <label for="floatingTextarea">Ulasan</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="State" name="rating">
                            <option value="">Beri Rating</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <label for="floatingSelect">Rating</label>
                    </div>
                </div>
                <input type="text" name="idwaktu" value="{{$w->idwaktu}}" hidden>
                <input type="text" name="peminjaman_id" value="{{$w->peminjaman_id}}" hidden>
                <input type="text" name="idpinjam" value="{{$w->pin->idpinjam}}" hidden>
                <input type="text" name="ulasan_id" value="{{$w->pin->idpinjam}}" hidden>
                <input type="text" name="idulasan" value="{{$w->pin->idpinjam}}" hidden>
                <div class="text-center mt-5">
                                    <label>
                                        <button class="logo w-auto btn btn-primary text-dark fw-bold" type="submit"><img style="padding: 0; margin: 0;"
                                                src="{{ asset('NiceAdmin/assets/img/upload.png') }}" alt=""> &nbsp;Submit</button>
                                    </label>
                                
                                    <label>
                                        <button class="logo w-auto btn btn-secondary text-dark fw-bold" type="reset"><img style="padding: 0; margin: 0;"
                                                src="{{ asset('NiceAdmin/assets/img/reset.png') }}" alt=""> &nbsp;Reset</button>
                                    </label>
                                
                                    <label>
                                        <div class="logo w-auto btn btn-danger">
                                            <a class="text-dark fw-bold" href="{{ route('Bookings.index') }}">
                                                <img style="padding: 0; margin: 0;" src="{{ asset('NiceAdmin/assets/img/back.png') }}" alt="">
                                                &nbsp;Kembali
                                            </a>
                                        </div>
                                    </label>
                                </div>
            </form><!-- End floating Labels Form -->
    
        </div>
    </div>
</main>
<script>
    var date = new Date();
    var tdate = date.getDate();
    var month = date.getMonth() + 1;
    if(tdate < 10){
        tdate = '0'+ tdate;
    }
    if(month < 10){
        month = '0'+ month;
    }
    var year = date.getFullYear();
    var minDate = year + "-" + month + "-" + tdate;
    document.getElementById("Ride_Start_Date1").setAttribute('min',minDate);
    document.getElementById("Ride_Start_Date2").setAttribute('min',minDate);
    console.log(minDate);
</script>
@endsection
