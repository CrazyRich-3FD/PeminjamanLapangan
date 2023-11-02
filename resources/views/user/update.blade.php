@extends('admin.index')
@section('content')
<main id="main" class="main">
    <div class="card">
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card-body">
            <h5 class="card-title">Create User Form</h5>
            <!-- Floating Labels Form -->
            <form action="{{ route('User.update',$u->iduser) }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" placeholder="ID User" value="USR{{$u->iduser}}" disabled>
                        <input type="text" hidden value="{{$u->iduser}}" name="iduser">
                        <label for="floatingName">ID User</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" placeholder="Your Name" name="name" value="{{$u->name}}">
                        <label for="floatingName">Your Name</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingUsername" placeholder="Username" name="username" value="{{$u->username}}">
                        <label for="floatingUsername">Username</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="floatingEmail" placeholder="Your Email" name="email" value="{{$u->email}}">
                        <label for="floatingEmail">Your Email</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingnohp" placeholder="No HP" name="no_hp" value="{{$u->no_hp}}">
                        <label for="floatingnohp">Your No HP</label>
                    </div>
                </div>
                {{-- <div class="col-md-4">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" value="{{$u->password}}">
                        <label for="floatingPassword">Password</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="CPassword">
                        <label for="password">Confirm Password</label>
                    </div>
                </div> --}}
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="State" name="role">
                            <option value="{{$u->role}}" selected>{{$u->role}}</option>
                            <option value="user" >User</option>
                            <option value="admin">Admin</option>
                        </select>
                        <label for="floatingSelect">Role</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;" name="alamat">{{$u->alamat}}</textarea>
                        <label for="floatingTextarea">Address</label>
                    </div>
                </div>
                <div class="col-12">
                    <label for="formFile" class="col-sm-2 col-form-label">File Upload</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="oldfoto" value="{{ $u->foto }}">
                        @if($u->foto)
                        <img src="{{asset('storage/'.$u->foto)}}" class="img-thumbnail img-preview" style="width: 50%">
                        @else
                        <img src="" class="img-thumbnail img-preview" style="width: 50%">
                        @endif
                        <input class="form-control" type="file" id="foto" name="foto" onchange="previewImage()">
                        <script>
                            function previewImage() {
                                const image = document.querySelector('#foto');
                                const imgPreview = document.querySelector('.img-preview');

                                imgPreview.style.display = 'block';

                                const oFReader = new FileReader();
                                oFReader.readAsDataURL(image.files[0]);

                                oFReader.onload = function (oFREvent) {
                                    imgPreview.src = oFREvent.target.result;
                                }
                            }
                        </script>
                    </div>
                </div>
                <div class="text-center mt-5">
                    <label>
                        <button class="logo w-auto btn btn-primary text-dark fw-bold" type="submit"><img style="padding: 0; margin: 0;"
                                src="{{ asset('NiceAdmin/assets/img/upload.png') }}" alt=""> &nbsp;Submit</button>
                    </label>
                
                    <label>
                        <button class="logo w-auto btn btn-secondary text-dark fw-bold" type="reset"><img style="padding: 0; margin: 0;"
                                src="{{ asset('NiceAdmin/assets/img/reset.png') }}" alt=""> &nbsp;Reset</button>
                    </label>
                
                    <label>
                        <div class="logo w-auto btn btn-danger">
                            <a class="text-dark fw-bold" href="{{ route('User.index') }}">
                                <img style="padding: 0; margin: 0;" src="{{ asset('NiceAdmin/assets/img/back.png') }}" alt="">
                                &nbsp;Kembali
                            </a>
                        </div>
                    </label>
                </div>
            </form><!-- End floating Labels Form -->
    
        </div>
    </div>
</main>
@endsection
