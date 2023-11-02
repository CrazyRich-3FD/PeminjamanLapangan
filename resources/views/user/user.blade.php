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
                            <th scope="col">ID User</th>
                            <th scope="col">Role</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">No HP</th>
                            <th scope="col">
                                <div class="logo w-auto btn btn-sm btn-info ">
                                    <label>
                                        <a class="text-dark fw-bold" href="{{ route('User.create') }}">
                                            <img style="padding: 0; margin: 0;" src="{{ asset('NiceAdmin/assets/img/page.png') }}" alt=""> 
                                            &nbsp;Tambah
                                        </a>
                                    </label>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $u) 
                            <tr class="text-center">
                                <th scope="row">USR{{ $u->iduser }}</th>
                                <td>{{ $u->role }}</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->username }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->no_hp }}</td>
                                <td class="d-flex justify-content-around align-items-center"> 
                                    <form action="{{route('User.destroy', $u->iduser)}}" method="POST">
                                        <a class="logo w-auto btn btn-sm btn-info" href="{{ route('User.show',$u->iduser) }}">
                                            <img style="padding: 0; margin: 0;" src="{{ asset('NiceAdmin/assets/img/eye.png') }}" alt="">
                                        </a>
                                        <a href="{{ route('User.edit',$u->iduser) }}" class="logo w-auto btn btn-sm btn-primary">
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
