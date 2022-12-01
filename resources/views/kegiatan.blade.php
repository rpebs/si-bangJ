@extends('layouts.master')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Kegiatan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Kegiatan</a></li>
            <li class="breadcrumb-item active">Tabel</li>
        </ol>

        <div class="row">
            <div class="col-md-3 mb-3">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kegiatan">Tambah</button>
            </div>
        </div>

        @if (session('message'))
            <div class="alert alert-success col-md-5">
                {{ session('message') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tabel Barang
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Gambar</th>
                            <th>Kegiatan</th>
                            <th>Tempat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->tgl_kegiatan }}</td>
                                <td><img src="{{ asset('storage/' . $d->image) }}" alt="{{ $d->nama_kegiatan }}"
                                        width="100px">
                                </td>
                                <td>{{ $d->nama_kegiatan }}</td>
                                <td>{{ $d->tempat }}</td>
                                <td>

                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editKegiatanModal"><i class="fa-solid fa-pencil"></i></button>
                                    <form action="/delete-kegiatan/{{ $d->id }}" class="d-inline" method="post">
                                        @csrf
                                        <button onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"
                                            class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="editKegiatanModal" tabindex="-1"
                                aria-labelledby="editKegiatanModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editKegiatanModalLabel">Kegiatan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('editkegiatan', ['id' => $d->id]) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="oldImage" value="{{ $d->image }}">
                                                <div class="mb-3">
                                                    <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                                                    <input type="text" name="nama_kegiatan" class="form-control"
                                                        id="nama_kegiatan" value="{{ $d->nama_kegiatan }}">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <label for="tgl_kegiatan" class="form-label">Tanggal Kegiatan</label>
                                                    <input type="date" name="tgl_kegiatan" class="form-control"
                                                        id="tgl_kegiatan" value="{{ $d->tgl_kegiatan }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tempat" class="form-label">Tempat</label>
                                                    <input type="text" name="tempat" class="form-control" id="tempat"
                                                        value="{{ $d->tempat }}">

                                                </div>
                                                <div class="mb-3">
                                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                                    <input type="hidden" name="deskripsi" id="xx"
                                                        value="{{ $d->deskripsi }}">
                                                    <trix-editor input="xx"></trix-editor>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="image" class="form-label">Gambar</label>

                                                    <input type="file" name="image" class="form-control"
                                                        id="image">
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection


<!-- Modal -->
<div class="modal fade" id="kegiatan" tabindex="-1" aria-labelledby="kegiatanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kegiatanLabel">Kegiatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('addkegiatan') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                        <input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan">
                    </div>
                    <div class="mb-3 col-3">
                        <label for="tgl_kegiatan" class="form-label">Tanggal Kegiatan</label>
                        <input type="date" name="tgl_kegiatan" class="form-control" id="tgl_kegiatan">
                    </div>
                    <div class="mb-3">
                        <label for="tempat" class="form-label">Tempat</label>
                        <input type="text" name="tempat" class="form-control" id="tempat">

                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="hidden" name="deskripsi" class="form-control" id="uy">
                        <trix-editor input="uy"></trix-editor>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
