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
            <h5 class="card-title">Edit Lapangan Form</h5>

            <!-- Floating Labels Form -->
            <form action="{{ route('Lapangans.update', $l->idfoto) }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" placeholder="Lapangan" value="LPN{{ $l->idfoto }}" disabled>
                        <label for="floatingName">ID Lapangan</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" placeholder="Lapangan" name="nama" value="{{$l->lap->nama}}">
                        <label for="floatingName">Lapangan</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="State" name="jenis_id">
                            <option value="{{ $l->lap->jl->idjenis }}">{{ $l->lap->jl->jenis }}</option>
                            @foreach ($jenis as $j) 
                                <option value="{{ $j->idjenis }}">{{ $j->jenis }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Jenis Lapangan</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Keterangan" id="floatingTextarea"
                            style="height: 100px;" name="keterangan">{{$l->keterangan}}</textarea>
                        <label for="floatingTextarea">Keterangan</label>
                    </div>
                </div>
                <div class="col-12">
                    <label for="formFile" class="col-sm-2 col-form-label">Foto Lapangan</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="oldfoto" value="{{ $l->foto }}">
                        @if($l->foto)
                        <img src="{{asset('storage/'.$l->foto)}}" class="img-thumbnail img-preview" style="width: 50%">
                        @else
                        <img src="" class="img-thumbnail img-preview" style="width: 50%">
                        @endif
                        <input class="form-control" type="file" id="foto" name="foto" onchange="previewImage()">
                        <script>
                            function previewImage() {
                                const image = document.querySelector('#foto');
                                const imgPreview = document.querySelector('.img-preview');

                                imgPreview.style.display = 'block';

                                const oFReader = new FileReader();
                                oFReader.readAsDataURL(image.files[0]);

                                oFReader.onload = function (oFREvent) {
                                    imgPreview.src = oFREvent.target.result;
                                }
                            }
                        </script>
                    </div>
                </div>
                <input type="text" value="{{ $l->idforo }}" hidden name="idfoto">
                <input type="text" value="{{ $l->lapangan_id }}" hidden name="lapangan_id">
                <input type="text" value="{{ $l->lap->idlapangan }}" hidden name="idlapangan">
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
                            <a class="text-dark fw-bold" href="{{ route('Lapangans.index') }}">
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
@endsection
