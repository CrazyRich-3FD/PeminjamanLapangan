@extends('layouts.index')
@section('content')
    <style>
        @media (min-width: 1200px) {
            .logo {
                width: 280px;
            }
        }

        .logo img {
            max-height: 26px;
            margin-right: 6px;
        }

        .logo span {
            font-size: 26px;
            font-weight: 700;
            color: #012970;
            font-family: "Nunito", sans-serif;
        }
    </style>
    <main id="main" class="main vh-100">
        <div class="container">
            <div class="card m-5 ">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="section-title m-4">
                    <h5 class="position-relative d-inline-block text-primary text-uppercase">Riwayat Booking</h5>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Booking</th>
                            <th scope="col">Lapangan</th>
                            <th scope="col">Tanggal Booking</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($booking as $b)
                            @if (auth()->user()->iduser == $b->pin->user_id)
                                <tr class="text-center">
                                    <th scope="row">1</th>
                                    <td>PMJ{{ $b->pin->idpinjam }}</td>
                                    <td>{{ $b->pin->lap->nama }}</td>
                                    <td>{{ $b->created_at->format('d M Y') }}</td>
                                    <td>
                                        @if ($b->pin->status == 'menunggu')
                                            <label class="btn btn-sm btn-info" style="pointer-events: none;"> MENUNGGU
                                                KONFIRMASI </label>
                                        @elseif ($b->pin->status == 'disetujui')
                                            {{-- <a href="{{route('home.invoice', $b->idwaktu)}}" class="logo w-auto btn btn-sm btn-info">
                                                <img style="padding: 0; margin: 0;" src="{{ asset('NiceAdmin/assets/img/eye.png') }}" alt="">
                                            </a> --}}
                                            <a href="{{ route('home.cetak', $b->idwaktu) }}"
                                                class="logo w-auto btn btn btn-warning">
                                                <img style="padding: 0; margin: 0;"
                                                    src="{{ asset('NiceAdmin/assets/img/pdf.png') }}" alt="">
                                            </a>
                                        @elseif ($b->pin->status == 'selesai')
                                            <label class="logo w-auto btn btn-sm btn-danger" style="pointer-events: none;">
                                                PEMINJAMAN SELESAI
                                            </label>
                                            <!-- Button trigger modal -->
                                            <a href="#ulasan{{ $b->pin->ulasan_id }}" type="button"
                                                class="logo w-auto btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#ulasan-{{ $b->pin->ulasan_id }}">
                                                <img style="padding: 0; margin: 0;"
                                                    src="{{ asset('peminjaman/img/review.png') }}" alt=""> BERI
                                                ULASAN
                                            </a>
                                            @foreach ($ulasan as $u)
                                                <!-- Modal -->
                                                <div class="modal fade" id="ulasan-{{$u->idulasan}}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Beri
                                                                    Ulasan
                                                                </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Floating Labels Form -->
                                                                <form
                                                                    action="{{ route('ulasan.ulasan', $u->idulasan) }}"
                                                                    method="POST" class="row g-3">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="col-12 row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-floating">
                                                                                <input type="text" class="form-control"
                                                                                    id="floatingName" placeholder="Lapangan"
                                                                                    value="ULS{{ $u->idulasan }}"
                                                                                    disabled>
                                                                                <label for="floatingName">ID Ulasan</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-floating mb-3">
                                                                                <select class="form-select"
                                                                                    id="floatingSelect" aria-label="State"
                                                                                    name="rating">
                                                                                    <option value="{{$u->rating}}">{{$u->rating}}
                                                                                    </option>
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
                                                                            <textarea class="form-control" placeholder="Keterangan" id="floatingTextarea" style="height: 100px;" name="ulasan">{{ $u->ulasan }}</textarea>
                                                                            <label for="floatingTextarea">Ulasan</label>
                                                                        </div>
                                                                    </div>
                                                                    <input type="text" name="idulasan"
                                                                        value="{{ $u->idulasan }}" hidden>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="reset" class="btn btn-danger">Reset</button>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                            </form><!-- End floating Labels Form -->
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <label class="logo w-auto btn btn-sm btn-danger" style="pointer-events: none;">
                                                PEMINJAMAN DITOLAK
                                            </label>
                                        @endif
                                        <label>
                                    </td>
                                </tr>
                            @else
                            @endif
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </main>
@endsection
