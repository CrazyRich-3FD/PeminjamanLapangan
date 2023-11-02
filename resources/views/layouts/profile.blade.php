@extends('layouts.index')
@section('content')
    <div class="container ">
        <div class="card">
            <div class="row">
                <div class="col-4 bg-info p-3">
                    <div class="card vh-100 rounded-5">
                        <div class="pt-5 d-flex flex-column align-items-center">

                            <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="Profile" width="300px"
                                class="rounded-circle">
                            <h2 class="text-dark">{{ auth()->user()->name }}</h2>
                            <h3 class="text-dark">{{ auth()->user()->role }}</h3>
                            <div class="social-links mt-2">
                                <a href="#" class="twitter text-dark"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook text-dark"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram text-dark"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin text-dark"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8 bg-info p-3">
                    <div class="card p-4 vh-100 rounded-5">
                        <div class="card-body">
                            <div class="d-flex justify-content-between  mb-5">
                                <h2 class="card-title">My Profile</h2>
                                <!-- Button trigger modal -->
                                <a href="#profile{{ auth()->user()->iduser }}" type="button"
                                    class="logo w-auto btn btn-primary" data-bs-toggle="modal" data-bs-target="#profile">
                                    Edit Profile
                                </a>
                                <!-- Modal -->
                                <div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Beri
                                                    Ulasan
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Floating Labels Form -->
                                                <form action="{{ route('user.user', auth()->user()->iduser) }}"
                                                    method="POST" enctype="multipart/form-data" class="row g-3">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="col-md-4">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="floatingName"
                                                                placeholder="ID User"
                                                                value="USR{{ auth()->user()->iduser }}" disabled>
                                                            <input type="text" hidden
                                                                value="{{ auth()->user()->iduser }}" name="iduser">
                                                            <label for="floatingName">ID User</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="floatingName"
                                                                placeholder="Your Name" name="name"
                                                                value="{{ auth()->user()->name }}">
                                                            <label for="floatingName">Your Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="floatingUsername"
                                                                placeholder="Username" name="username"
                                                                value="{{ auth()->user()->username }}">
                                                            <label for="floatingUsername">Username</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating">
                                                            <input type="email" class="form-control" id="floatingEmail"
                                                                placeholder="Your Email" name="email"
                                                                value="{{ auth()->user()->email }}">
                                                            <label for="floatingEmail">Your Email</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating">
                                                            <input type="number" class="form-control" id="floatingnohp"
                                                                placeholder="No HP" name="no_hp"
                                                                value="{{ auth()->user()->no_hp }}">
                                                            <label for="floatingnohp">Your No HP</label>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-md-4">
                                                        <div class="form-floating">
                                                            <input type="password" class="form-control"
                                                                id="floatingPassword" placeholder="Password"
                                                                name="password" value="{{ auth()->user()->password }}">
                                                            <label for="floatingPassword">Password</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-floating">
                                                            <input type="password" class="form-control"
                                                                id="floatingCPassword" placeholder="CPassword">
                                                            <label for="floatingCPassword">Confirm Password</label>
                                                        </div>
                                                    </div> --}}
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <textarea class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;" name="alamat">{{ auth()->user()->alamat }}</textarea>
                                                            <label for="floatingTextarea">Address</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="formFile" class="col-sm-2 col-form-label">File
                                                            Upload</label>
                                                        <div class="col-sm-10">
                                                            <input type="hidden" name="oldfoto"
                                                                value="{{ auth()->user()->foto }}">
                                                            @if (auth()->user()->foto)
                                                                <img src="{{ asset('storage/' . auth()->user()->foto) }}"
                                                                    class="img-thumbnail img-preview" style="width: 50%">
                                                            @else
                                                                <img src="" class="img-thumbnail img-preview"
                                                                    style="width: 50%">
                                                            @endif
                                                            <input class="form-control" type="file" id="foto"
                                                                name="foto" onchange="previewImage()">
                                                            <script>
                                                                function previewImage() {
                                                                    const image = document.querySelector('#foto');
                                                                    const imgPreview = document.querySelector('.img-preview');

                                                                    imgPreview.style.display = 'block';

                                                                    const oFReader = new FileReader();
                                                                    oFReader.readAsDataURL(image.files[0]);

                                                                    oFReader.onload = function(oFREvent) {
                                                                        imgPreview.src = oFREvent.target.result;
                                                                    }
                                                                }
                                                            </script>
                                                        </div>
                                                    </div>

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
                            </div>
                            <div class="col-12 row mb-3">
                                <div class="col-lg-3 col-md-4 ">
                                    <h4>Full Name</h4>
                                </div>
                                <div class="col-lg-9 col-md-8">
                                    <h5>{{ auth()->user()->name }}</h5>
                                </div>
                            </div>
                            <div class="col-12 row mb-3">
                                <div class="col-lg-3 col-md-4 ">
                                    <h4>Username</h4>
                                </div>
                                <div class="col-lg-9 col-md-8">
                                    <h5>{{ auth()->user()->username }}</h5>
                                </div>
                            </div>
                            <div class="col-12 row mb-3">
                                <div class="col-lg-3 col-md-4 ">
                                    <h4>Role</h4>
                                </div>
                                <div class="col-lg-9 col-md-8">
                                    <h5>{{ auth()->user()->role }}</h5>
                                </div>
                            </div>
                            <div class="col-12 row mb-3">
                                <div class="col-lg-3 col-md-4 ">
                                    <h4>Alamat</h4>
                                </div>
                                <div class="col-lg-9 col-md-8">
                                    <h5>{{ auth()->user()->alamat }}</h5>
                                </div>
                            </div>
                            <div class="col-12 row mb-3">
                                <div class="col-lg-3 col-md-4 ">
                                    <h4>Phone</h4>
                                </div>
                                <div class="col-lg-9 col-md-8">
                                    <h5>{{ auth()->user()->no_hp }}</h5>
                                </div>
                            </div>
                            <div class="col-12 row mb-3">
                                <div class="col-lg-3 col-md-4 ">
                                    <h4>Email</h4>
                                </div>
                                <div class="col-lg-9 col-md-8">
                                    <h5>{{ auth()->user()->email }}</h5>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Bordered Tabs -->

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
