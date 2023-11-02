@extends('user.index', ['title' => 'Register'])
@section('content')
    <main>
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="{{ asset('/peminjaman/img/logo.jpeg') }}" alt="">
                                    <span class="d-none d-lg-block">Booking Lapangan</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                        <p class="text-center small">Enter your personal details to create account</p>
                                    </div>

                                    <!-- Floating Labels Form -->
                                    <form action="{{ route('Register.store') }}" method="POST"
                                        enctype="multipart/form-data" class="row g-3">
                                        @csrf
                                        <input type="text" hidden value="{{ $rid }}" name="iduser">
                                        <input type="text" hidden value="user" name="role">
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    id="floatingName" placeholder="Your Name" name="name" required
                                                    value="{{ old('name') }}">
                                                <label for="floatingName">Your Name</label>
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text"
                                                    class="form-control @error('username') is-invalid @enderror"
                                                    id="floatingUsername" placeholder="Username" name="username" required value="{{ old('username') }}">
                                                <label for="floatingUsername">Username</label>
                                                @error('username')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="floatingEmail" placeholder="Your Email" name="email" required value="{{ old('email') }}">
                                                <label for="floatingEmail">Your Email</label>
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="number"
                                                    class="form-control @error('no_hp') is-invalid @enderror"
                                                    id="floatingnohp" placeholder="No HP" name="no_hp" required value="{{ old('no_hp') }}">
                                                <label for="floatingnohp">Your No HP</label>
                                                @error('no_hp')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="floatingPassword" placeholder="Password" name="password" required>
                                                <label for="floatingPassword">Password</label>
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password_confirmation"
                                                    placeholder="CPassword" required>
                                                <label for="password">Confirm Password</label>
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <textarea class="form-control @error('alamat') is-invalid @enderror" placeholder="Address" id="floatingTextarea"
                                                    style="height: 100px;" name="alamat" required>{{ old('alamat') }}</textarea>
                                                <label for="floatingTextarea">Address</label>
                                                @error('alamat')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="formFile" class="col-sm-2 col-form-label">Upload Foto</label>
                                            <div class="col-sm-10">
                                                <img class="img-thumbnail img-preview" style="width: 50%">
                                                <input class="form-control @error('foto') is-invalid @enderror"
                                                    type="file" id="foto" name="foto" onchange="previewImage()"
                                                    required>
                                                @error('foto')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
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
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox"
                                                    value="" id="acceptTerms" required>
                                                <label class="form-check-label" for="acceptTerms">I agree and accept the
                                                    <a href="#">terms and conditions</a></label>
                                                <div class="invalid-feedback">You must agree before submitting.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary w-100" type="submit">Create
                                                Account</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Already have an account? <a
                                                    href="{{ route('Login.index') }}">Log in</a></p>
                                        </div>
                                    </form><!-- End floating Labels Form -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->
@endsection
