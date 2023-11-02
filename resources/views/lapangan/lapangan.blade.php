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
                            <th scope="col">ID Lapangan</th>
                            <th scope="col">Lapangan</th>
                            <th scope="col">Kode Jenis</th>
                            <th scope="col">keterangan</th>
                            <th scope="col">foto</th>
                            <th scope="col">
                                <label>
                                    <div class="logo w-auto btn btn-sm btn-info">
                                        <a class="text-dark fw-bold" href="{{ route('Lapangans.create') }}">
                                            <img style="padding: 0; margin: 0;" src="{{ asset('NiceAdmin/assets/img/page.png') }}" alt=""> &nbsp;Tambah
                                        </a>
                                    </div>
                                </label>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fotolapangan as $f) 
                            <tr class="text-center">
                                <th scope="row">LPN{{ $f->lap->idlapangan }}</th>
                                <td>{{ $f->lap->nama }}</td>
                                <th>JNS{{ $f->lap->jenis_id }}</th>
                                <td>{{ $f->keterangan }}</td>
                                <td>{{ $f->foto }}</td>
                                <td class="d-flex justify-content-around align-items-center">
                                    <form action="{{ route('Lapangans.destroy', $f->idfoto)}}" method="POST">
                                        <a href="{{ route('Lapangans.edit', $f->idfoto)}}" class="logo w-auto btn btn-sm btn-primary">
                                            <img style="padding: 0; margin: 0;" src="{{ asset('NiceAdmin/assets/img/edit.png') }}" alt="">
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="logo w-auto btn btn-sm btn-danger show_confirm" data-toggle="tooltip" name="delete">
                                            <img style="padding: 0; margin: 0;" src="{{ asset('NiceAdmin/assets/img/bin.png') }}" alt="">
                                        </button>
                                    </form>
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
