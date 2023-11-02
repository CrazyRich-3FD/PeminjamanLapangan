@extends('admin.index')
@section('content')
<style>
    #inputTime1{
        overflow-y:auto;
    }
    option{
        overflow-y:scroll;
    }
</style>
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
            <h5 class="card-title">Create Peminjaman Form</h5>
    
            <!-- Floating Labels Form -->
            <form action="{{ route('Bookings.store') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" placeholder="Lapangan" value="PMJ{{ $rid }}" disabled>
                        <label for="floatingName">ID Pinjam</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="State" name="user_id">
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
                            <option value="menunggu" >Menunggu</option>
                            <option value="disetujui">Disetujui</option>
                            <option value="tolak">Tolak</option>
                            <option value="selesai">Selesai</option>
                        </select>
                        <label for="floatingSelect">Status</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="inputDate" class="Ride_Date">Tanggal Awal</label>
                    <div class="">
                        <input type="date" id="Ride_Start_Date1" class="form-control date" name="tgl_awal">
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="inputDate" class="Ride_Date">Tanggal Akhir</label>
                    <div class="">
                        <input type="date" id="Ride_Start_Date2" class="form-control"  name="tgl_akhir">
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="inputTime1" class="">Jam Mulai</label>
                    <select class="form-select" id="inputTime1" aria-label="Jam Awal" name="jam_awal">
                        <option value="00:00" >00:00</option>
                        <option value="01:00" >01:00</option>
                        <option value="02:00" >02:00</option>
                        <option value="03:00" >03:00</option>
                        <option value="04:00" >04:00</option>
                        <option value="05:00" >05:00</option>
                        <option value="06:00" >06:00</option>
                        <option value="07:00" >07:00</option>
                        <option value="08:00" >08:00</option>
                        <option value="09:00" >09:00</option>
                        <option value="10:00" >10:00</option>
                        <option value="11:00" >11:00</option>
                        <option value="12:00" >12:00</option>
                        <option value="13:00" >13:00</option>
                        <option value="14:00" >14:00</option>
                        <option value="15:00" >15:00</option>
                        <option value="16:00" >16:00</option>
                        <option value="17:00" >17:00</option>
                        <option value="18:00" >18:00</option>
                        <option value="19:00" >19:00</option>
                        <option value="20:00" >20:00</option>
                        <option value="21:00" >21:00</option>
                        <option value="22:00" >22:00</option>
                        <option value="23:00" >23:00</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="inputTime2" class="">Jam Akhir</label>
                    <select class="form-select" id="inputTime2" aria-label="State" name="jam_akhir">
                        <option value="00:00" >00:00</option>
                        <option value="01:00" >01:00</option>
                        <option value="02:00" >02:00</option>
                        <option value="03:00" >03:00</option>
                        <option value="04:00" >04:00</option>
                        <option value="05:00" >05:00</option>
                        <option value="06:00" >06:00</option>
                        <option value="07:00" >07:00</option>
                        <option value="08:00" >08:00</option>
                        <option value="09:00" >09:00</option>
                        <option value="10:00" >10:00</option>
                        <option value="11:00" >11:00</option>
                        <option value="12:00" >12:00</option>
                        <option value="13:00" >13:00</option>
                        <option value="14:00" >14:00</option>
                        <option value="15:00" >15:00</option>
                        <option value="16:00" >16:00</option>
                        <option value="17:00" >17:00</option>
                        <option value="18:00" >18:00</option>
                        <option value="19:00" >19:00</option>
                        <option value="20:00" >20:00</option>
                        <option value="21:00" >21:00</option>
                        <option value="22:00" >22:00</option>
                        <option value="23:00" >23:00</option>
                    </select>
                </div>
                <div class="col-9">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Keterangan" id="floatingTextarea" style="height: 100px;"
                            name="ulasan" disabled></textarea>
                        <label for="floatingTextarea">Ulasan</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="State" name="rating" disabled>
                            <option value=""></option>
                        </select>
                        <label for="floatingSelect">Rating</label>
                    </div>
                </div>
                <input type="text" name="idwaktu" value="{{$rid}}" hidden>
                <input type="text" name="peminjaman_id" value="{{$rid}}" hidden>
                <input type="text" name="idpinjam" value="{{$rid}}" hidden>
                <input type="text" name="ulasan_id" value="{{$rid}}" hidden>
                <input type="text" name="idulasan" value="{{$rid}}" hidden>
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
    var minDate = year + "-" + month + "-" + tdate; // 2023-12-01
    document.getElementById("Ride_Start_Date1").setAttribute('min',minDate);
    document.getElementById("Ride_Start_Date2").setAttribute('min',minDate);
    console.log(minDate);
</script>
@endsection
