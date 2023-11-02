@extends('admin.index')
@section('content')
    <main id="main" class="main vh-100">
        <div class="card">
            @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
            <div class="card-body vh-100">
                <h5 class="card-title">Table with stripped rows</h5>

                <!-- Table with stripped rows -->
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">ID Pinjam</th>
                            <th scope="col">Kode Lapangan</th>
                            <th scope="col">User</th>
                            <th scope="col">tgl awal</th>
                            <th scope="col">tgl akhir</th>
                            <th scope="col">waktu awal</th>
                            <th scope="col">waktu akhir</th>
                            <th scope="col">Status</th>
                            <th scope="col">
                                <label>
                                    <div class="logo w-auto btn btn-sm btn-info">
                                        <a class="text-dark fw-bold" href="{{ route('Bookings.create') }}">
                                            <img style="padding: 0; margin: 0;" src="{{ asset('NiceAdmin/assets/img/page.png') }}"
                                                alt="">&nbsp;Tambah</a>
                                    </div>
                                </label>
                            
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($waktupinjaman as $w) 
                            <tr class="text-center">
                                <th scope="row">PMJ{{$w->pin->idpinjam}}</th>
                                <th>LPN{{ $w->pin->lapangan_id }}</th>
                                <th>USR{{ $w->pin->user_id }}</th>
                                <td>{{ $w->tgl_awal }}</td>
                                <td>{{ $w->tgl_akhir }}</td>
                                <td>{{ $w->jam_awal }}</td>
                                <td>{{ $w->jam_akhir }}</td>
                                <td>{{ $w->pin->status }}</td>
                                <td class="d-flex justify-content-around align-items-center">
                                    @if ($w->pin->status !== 'disetujui') 
                                        <form action="{{route('Bookings.destroy', $w->idwaktu)}}" method="POST">
                                        <a href="{{route('Bookings.edit', $w->idwaktu)}}" class="logo w-auto btn btn-sm btn-primary">
                                            <img style="padding: 0; margin: 0;" src="{{ asset('NiceAdmin/assets/img/edit.png') }}" alt="">
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="logo w-auto btn btn-sm btn-danger show_confirm" data-toggle="tooltip" name="delete">
                                            <img style="padding: 0; margin: 0;" src="{{ asset('NiceAdmin/assets/img/bin.png') }}" alt="">
                                        </button>
                                    </form>
                                    @else 
                                        <form action="{{route('Bookings.destroy', $w->idwaktu)}}" method="POST">
                                            <a href="{{route('home.cetak', $w->idwaktu)}}" class="logo w-auto btn btn-sm btn-warning">
                                                <img style="padding: 0; margin: 0;" src="{{ asset('NiceAdmin/assets/img/pdf.png') }}" alt="">
                                            </a>
                                            <a href="{{route('Bookings.edit', $w->idwaktu)}}" class="logo w-auto btn btn-sm btn-primary">
                                                <img style="padding: 0; margin: 0;" src="{{ asset('NiceAdmin/assets/img/edit.png') }}" alt="">
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="logo w-auto btn btn-sm btn-danger show_confirm" data-toggle="tooltip" name="delete">
                                                <img style="padding: 0; margin: 0;" src="{{ asset('NiceAdmin/assets/img/bin.png') }}" alt="">
                                            </button>
                                        </form>
                                    @endif
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>
    </main>
@endsection
