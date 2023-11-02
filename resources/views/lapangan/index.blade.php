@extends('layouts.index')
@section('content')
<!-- Pricing Start -->
<div class="container-fluid py-5 wow fadeInUp vh-100" data-wow-delay="0.1s">
    <div class="container">
        <div class="section-title mb-4">
            <h5 class="position-relative d-inline-block text-primary text-uppercase">List Lapangan</h5>
        </div>
        <div class="row g-3">
            @foreach ($fotolapangan as $f) 
                <div class="col-4 price-item" style="margin-bottom: 7.5rem">
                <div class="position-relative w-100 bg-success" style="height: 40%">
                    <img class="img-fluid w-100 h-100 rounded-top" src="{{ asset ('storage/'.$f->foto) }}" alt="">
                    {{-- <img class="img-fluid w-100 h-100 rounded-top" src="{{ asset('storage/'.$f->gambar) }}" alt=""> --}}
                    <div class="d-flex align-items-center justify-content-center bg-light rounded pt-2 px-3 position-absolute top-100 start-50 translate-middle"
                        style="z-index: 2;">
                        <h5 class="text-primary m-0">{{ $f->lap->nama }}</h5>
                        {{-- <h5 class="text-primary m-0">Lapangan 1</h5> --}}
                    </div>
                </div>
                <div class="position-relative bg-light border-bottom border-primary py-5 p-4">
                    <h4 class="text-center">Deskripsi</h4>
                    <hr class="text-primary w-50 mx-auto mt-0">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>Jenis</td>
                                <td>:</td>
                                <td>{{ $f->lap->jl->jenis }}</td>
                            </tr>
                            <tr>
                                <td colspan="3">Keterangan</td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="text-dark rounded-3 p-3" style="background-color: rgb(219, 219, 219)">
                                        {{ $f->keterangan }}
                                    </div>
                                </td> 
                            </tr>
                        </tbody>
                    </table>
                    <form action="{{ route('Booking.create') }}" method="get" class="d-flex justify-content-center">
                        @csrf
                        <input type="hidden" name="id" value="{{ $f->idfoto }}">
                        <button type="submit"
                            class="btn btn-primary py-2 px-4 position-absolute top-100 start-50 translate-middle">Booking</button>
                    </form>
                    
                </div>
            </div>
            @endforeach
        </div>
        {{-- <div class="d-flex justify-content-center my-5">{{ $fapangan->links() }}</div> --}}
    </div>
</div>
<!-- Pricing End -->
@endsection
