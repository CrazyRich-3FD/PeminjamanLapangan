@extends('admin.index')
@section('content')
    <main id="main" class="main vh-100">
        <div class="card">
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
                            <th scope="col">ID Jenis Lapangan</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">
                                <label>
                                    <div class="logo w-auto btn btn-sm btn-info">
                                        <a class="text-dark fw-bold" href="{{ route('Jenis.create') }}">
                                            <img style="padding: 0; margin: 0;" src="{{ asset('NiceAdmin/assets/img/page.png') }}"
                                                alt="">&nbsp;Tambah</a>
                                    </div>
                                </label>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jenis as $j) 
                            <tr class="text-center">
                                <th scope="row">JNS{{ $j->idjenis }}</th>
                                <td>{{ $j->jenis }}</td>
                                <td class="d-flex justify-content-around align-items-center">
                                    <form action="{{ route('Jenis.destroy', $j->idjenis) }}" method="POST">
                                        <a href="{{ route('Jenis.edit', $j->idjenis) }}" class="logo w-auto btn btn-sm btn-primary">
                                            <img style="padding: 0; margin: 0;" src="{{ asset('NiceAdmin/assets/img/edit.png') }}" alt="">
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="logo w-auto btn btn-sm btn-danger confirm-delete" data-toggle="tooltip" name="delete">
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
