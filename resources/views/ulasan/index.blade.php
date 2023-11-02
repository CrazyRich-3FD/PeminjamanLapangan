@extends('admin.index')
@section('content')
    <main id="main" class="main vh-100">
        <div class="card">
            <div class="card-body vh-100">
                @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                <h5 class="card-title">Table with stripped rows</h5>

                <!-- Table with stripped rows -->
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">ID Ulasan</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Ulasan</th>
                            <th scope="col"></th>
                            
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pin as $p)
                        {{-- {{ dd($u->us) }} --}}
                            <tr class="text-center">
                                <th scope="row">ULS{{$p->ul->idulasan}}</th>
                                <td>{{ $p->ul->rating }}</td>
                                <td>{{ $p->ul->ulasan }}</td>
                                <td class="d-flex justify-content-around align-items-center">
                                    <a href="{{route('Ulasan.edit', $p->ul->idulasan)}}" class="logo w-auto btn btn-sm btn-primary">
                                        <img style="padding: 0; margin: 0;" src="{{ asset('NiceAdmin/assets/img/edit.png') }}" alt="">
                                    </a>
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
