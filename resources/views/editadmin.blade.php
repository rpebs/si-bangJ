@extends('layouts.master')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Profil Admin</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Profil</li>
        </ol>



        <div class="col-md-6 ms-auto me-auto mb-5">
            <div class="card col-md-12">
                <div class="col-md-6 mt-2 ms-auto me-auto">
                    @if (session('message'))
                        <div class="alert alert-success text-center">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger text-center">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('failed'))
                        <div class="alert alert-danger text-center">
                            {{ session('failed') }}
                        </div>
                    @endif
                </div>

                <center>
                    <img src="/gambaradmin/{{ Auth::user()->gambar }}" class="img-fluid rounded" width="180">
                </center>
                @foreach ($admin as $d)
                    <form action="{{ route('updateadmin') }}" class="col-md-6 ms-auto me-auto" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama :</label>
                            <input type="text" class="form-control" id="" name="nama"
                                value="{{ $d->nama }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Username :</label>
                            <input type="text" class="form-control" name="username" value="{{ $d->username }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password Lama :</label>
                            <input type="password" class="form-control" name="old_password">
                            <p class="small" style="color: grey">*kosongkan bila tidak ingin merubah password</p>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password Baru :</label>
                            <input type="password" class="form-control" name="new_password">
                            <p class="small" style="color: grey">*kosongkan bila tidak ingin merubah password</p>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Gambar :</label>
                            <input type="file" class="form-control" name="gambar">
                            <p class="small" style="color: grey">*kosongkan bila tidak ingin merubah gambar</p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <input type="submit" class="btn btn-md btn-primary mb-5" value="Update">
                        </div>



                    </form>
                @endforeach

            </div>
        </div>


    </div>
@endsection
