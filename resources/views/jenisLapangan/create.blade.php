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
            <h5 class="card-title">Create Jenis Lapangan Form</h5>

            <!-- Floating Labels Form -->
            <form action="{{ route('Jenis.store') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" placeholder="IDJenisLapangan" value="JNS{{$rid}}" disabled>
                        <input name="idjenis" value="{{$rid}}" type="text" hidden>
                        <label for="floatingName">ID Jenis Lapangan</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" placeholder="JenisLapangan" name="jenis">
                        <label for="floatingName">Jenis lapangan</label>
                    </div>
                </div>
                <div class="col-md-12">
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
                                <a class="text-dark fw-bold" href="{{ route('Jenis.index') }}">
                                    <img style="padding: 0; margin: 0;" src="{{ asset('NiceAdmin/assets/img/back.png') }}" alt="">
                                    &nbsp;Kembali
                                </a>
                            </div>
                        </label>
                    </div>
                </div>
                
            </form><!-- End floating Labels Form -->

        </div>
    </div>
</main>
@endsection
