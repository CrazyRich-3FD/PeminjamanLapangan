@extends('admin.index')
@section('content')
<main id="main" class="main">
        <div class="card">
            <div class="card-body pt-3 d-flex justify-content-around">
                <div class="col-4 d-flex flex-column align-items-center pt-5">
                    <div class="img-wrapper">
                        <img src="{{ asset('storage/'.$u->foto)}}" alt="Profile" width="400px" style="object-fit: cover;">
                    </div>     
                    <h2>{{$u->name}}</h2>
                    <h3>{{$u->role}}</h3>
                    <div class="flex-row mt-5">
                        <label>
                            <div class="logo w-auto btn btn-primary">
                                <a class="text-dark fw-bold" href="{{ route('User.edit', $u->iduser) }}">
                                    <img style="padding: 0; margin: 0;" src="{{ asset('NiceAdmin/assets/img/edit.png') }}" alt=""> &nbsp;Edit
                                </a>
                            </div>
                        </label>
                        <label>
                            <div class="logo w-auto btn btn-danger">
                                <a class="text-dark fw-bold" href="{{ route('User.index') }}">
                                    <img style="padding: 0; margin: 0;" src="{{ asset('NiceAdmin/assets/img/back.png') }}" alt=""> &nbsp;Kembali
                                </a>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="col-8 pt-3">
                    <div class="row g-4">
                    <div class="col-12">
                        <h5 class="card-title">Profile Details</h5>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Full Name</div>
                            <div class="col-lg-9 col-md-8">{{$u->name}}</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Username</div>
                            <div class="col-lg-9 col-md-8">{{$u->username}}</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Role</div>
                            <div class="col-lg-9 col-md-8">{{$u->role}}</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Email </div>
                            <div class="col-lg-9 col-md-8">{{$u->email}}</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">No HP</div>
                            <div class="col-lg-9 col-md-8">{{$u->no_hp}}</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Address</div>
                            <div class="col-lg-9 col-md-8">{{$u->alamat}}</div>
                        </div>
                    </div>
                </div>
                </div>
                
                
            </div>
        </div>
</main>
@endsection
