@extends('layouts.master')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tabel Surat Keluar</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Surat Keluar</a></li>
            <li class="breadcrumb-item active">Tabel</li>
        </ol>
        <div class="row">
            <div class="col-md-3 mb-3">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah Surat
                    Keluar</button>
            </div>
        </div>
        @if (session('message'))
            <div class="alert alert-success">
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
                Tabel Data Surat Keluar
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Kategori</th>
                            <th>Tanggal Masuk</th>
                            <th>Tujuan</th>
                            <th>Perihal</th>
                            <th>Tempat</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 0; ?>
                        @foreach ($surat_keluars as $d)
                            <?php $no++; ?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $d->kode_surat }}</td>
                                <td>{{ $d->kategori->nama_kategori }}</td>
                                <td>{{ $d->tgl_keluar }}</td>
                                <td>{{ $d->tujuan }}</td>
                                <td>{{ $d->perihal }}</td>
                                <td>{{ $d->tempat }}</td>
                                <td>{{ $d->tgl_mulai }}</td>
                                <td>{{ $d->tgl_selesai }}</td>
                                <td>{{ $d->keterangan }}</td>
                                <td>

                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editmodal{{ $d->kode_surat }}"><i
                                            class="fa-solid fa-pencil"></i></button>


                                    <a href="/surat/keluar/hapus/{{ $d->kode_surat }}"
                                        onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"
                                        class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                    <a href="{{ url('/suratkeluar/' . $d->file) }}" class="btn btn-sm btn-success"><i
                                            class="fa-solid fa-file-arrow-down"></i></a>
                                </td>
                            </tr>
                            <!-- editModal -->
                            <div class="modal fade" id="editmodal{{ $d->kode_surat }}" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{ route('updatesuratkeluar') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="hidden" name="id" value="{{ $d->id }}">
                                                        <div class="mb-3">
                                                            <label for="kode" class="form-label">Kode</label>
                                                            <input type="text" class="form-control" id="kode"
                                                                name="kode_surat" value="{{ $d->kode_surat }}" readonly>

                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="kategori" class="form-label">Kategori</label>
                                                            <select class="form-select" aria-label="Default select example"
                                                                name="kategori_id">
                                                                <option value="{{ $d->kategori_id }}" selected>
                                                                    {{ $d->kategori->nama_kategori }}</option>
                                                                @foreach ($kategori_surats as $k)
                                                                    <option value="{{ $k->id }}">
                                                                        {{ $k->nama_kategori }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="tgl_keluar" class="form-label">Tanggal
                                                                Keluar</label>
                                                            <input type="date" class="form-control" id="tgl_keluar"
                                                                name="tgl_keluar" value="{{ $d->tgl_keluar }}">

                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="tempat" class="form-label">Tempat</label>
                                                            <input type="text" class="form-control" id="tempat"
                                                                name="tempat" value="{{ $d->tempat }}">

                                                        </div>


                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="mb-3">
                                                            <label for="tujuan" class="form-label">Tujuan</label>
                                                            <input type="text" class="form-control" id="tujuan"
                                                                name="tujuan" value="{{ $d->tujuan }}">

                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="perihal" class="form-label">Perihal</label>
                                                            <input type="text" class="form-control" id="perihal"
                                                                name="perihal" value="{{ $d->perihal }}">

                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="tgl_mulai" class="form-label">Tanggal
                                                                Mulai</label>
                                                            <input type="date" class="form-control" id="tgl_mulai"
                                                                name="tgl_mulai" value="{{ $d->tgl_mulai }}">

                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="tgl_selesai" class="form-label">Tanggal
                                                                Selesai</label>
                                                            <input type="date" class="form-control" id="tgl_selesai"
                                                                name="tgl_selesai" value="{{ $d->tgl_selesai }}">

                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="keterangan" class="form-label">Keterangan</label>
                                                            <textarea name="keterangan" id="keterangan" class="form-control">{{ $d->keterangan }}</textarea>

                                                        </div>



                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="file" class="form-label">File</label>
                                                        <input type="file" name="file" class="form-control"
                                                            id="file" value="{{ $d->file }}">

                                                    </div>
                                                    <p>*masukkan file yang sama</p>
                                                </div>



                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                        </form>
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
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('simpansuratkeluar') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="kode" class="form-label">Kode</label>
                                <input type="text" class="form-control" id="kode" name="kode_surat">
                                {{-- <div id="kode" class="form-text">We'll never share your email with anyone else.
                                </div> --}}
                            </div>
                            <div class="mb-3">
                                <label for="tujuan" class="form-label">Tujuan</label>
                                <input type="text" class="form-control" id="tujuan" name="tujuan">
                                {{-- <div id="pengirim" class="form-text">We'll never share your email with anyone else.
                                </div> --}}
                            </div>
                            <div class="mb-3">
                                <label for="tgl_keluar" class="form-label">Tanggal Keluar</label>
                                <input type="date" class="form-control" id="tgl_keluar" name="tgl_keluar">
                                {{-- <div id="tgl_keluar" class="form-text">We'll never share your email with anyone else.
                                </div> --}}
                            </div>
                            <div class="mb-3">
                                <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai">

                            </div>



                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select class="form-select" aria-label="Default select example" name="kategori_id">
                                    <option value="" selected>Pilih Kategori...</option>
                                    @foreach ($kategori_surats as $k)
                                        <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                    @endforeach

                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="perihal" class="form-label">Perihal</label>
                                <input type="text" class="form-control" id="perihal" name="perihal">

                            </div>
                            <div class="mb-3">
                                <label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai">

                            </div>
                            <div class="mb-3">
                                <label for="tempat" class="form-label">Tempat</label>
                                <input type="text" class="form-control" id="tempat" name="tempat">

                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control"></textarea>

                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">File</label>
                            <input type="file" name="file" class="form-control" id="file">

                        </div>

                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
