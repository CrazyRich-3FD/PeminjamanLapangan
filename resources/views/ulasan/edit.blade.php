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
            <form action="{{ route('Ulasan.update', $ul->idulasan) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-12 row">
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingName" placeholder="Lapangan" value="ULS{{$ul->idulasan}}" disabled>
                            <label for="floatingName">ID Ulasan</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="State" name="rating">
                                <option value="">Kasih Rating</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <label for="floatingSelect">Rating</label>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Keterangan" id="floatingTextarea"
                            style="height: 100px;" name="ulasan">{{$ul->ulasan}}</textarea>
                        <label for="floatingTextarea">Ulasan</label>
                    </div>
                </div>
                <input type="text" name="idulasan" value="{{$ul->idulasan}}" hidden>
                <div class="text-center mt-5">
                    <label>
                        <button class="logo w-auto btn btn-primary text-dark fw-bold" type="submit"><img
                                style="padding: 0; margin: 0;" src="{{ asset('NiceAdmin/assets/img/upload.png') }}"
                                alt=""> &nbsp;Submit</button>
                    </label>

                    <label>
                        <button class="logo w-auto btn btn-secondary text-dark fw-bold" type="reset"><img
                                style="padding: 0; margin: 0;" src="{{ asset('NiceAdmin/assets/img/reset.png') }}"
                                alt=""> &nbsp;Reset</button>
                    </label>

                    <label>
                        <div class="logo w-auto btn btn-danger">
                            <a class="text-dark fw-bold" href="{{ route('Bookings.index') }}">
                                <img style="padding: 0; margin: 0;" src="{{ asset('NiceAdmin/assets/img/back.png') }}"
                                    alt="">
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
