@extends('layouts.master')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tabel Barang</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Data Barang</a></li>
            <li class="breadcrumb-item active">Tabel</li>
        </ol>
        <div class="row">
            <div class="col-md-3 mb-3">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addmodal">Tambah Barang</button>
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
                Tabel Barang
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 0; ?>
                        @foreach ($barangs as $b)
                            <?php $no++; ?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $b->kode_barang }}</td>
                                <td>{{ $b->nama_barang }}</td>
                                <td>{{ $b->kategori->nama_kategori }}</td>
                                <td>{{ $b->harga }}</td>
                                <td><img src="{{ url('/gambarbarang/' . $b->image) }}" width="80" alt="">
                                </td>
                                <td>

                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editmodal{{ $b->kode_barang }}"><i
                                            class="fa-solid fa-pencil"></i></button>

                                    <a href="/barang/hapus/{{ $b->kode_barang }}"
                                        onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"
                                        class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>

                                </td>
                            </tr>

                            {{-- editModal --}}
                            <div class="modal fade" id="editmodal{{ $b->kode_barang }}" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Data Barang</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{ route('updatebarang') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $b->id }}">
                                                <div class="mb-3">
                                                    <label for="kode_barang" class="form-label">Kode Barang</label>
                                                    <input type="text" name="kode_barang" class="form-control"
                                                        id="kode_barang" placeholder="Kode Barang..."
                                                        value="{{ $b->kode_barang }}" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nama_barang" class="form-label">Nama Barang</label>
                                                    <input type="text" class="form-control" name="nama_barang"
                                                        id="nama_barang" placeholder="Nama Barang..."
                                                        value="{{ $b->nama_barang }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nama_kategori" class="form-label">Kategori</label>
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="kategori_id">
                                                        <option value="{{ $b->kategori_id }}" selected>
                                                            {{ $b->kategori->nama_kategori }}
                                                        </option>
                                                        @foreach ($kategori_barangs as $k)
                                                            <option value="{{ $k->id }}">{{ $k->nama_kategori }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="harga" class="form-label">Harga</label>
                                                    <input type="number" name="harga" class="form-control" id="harga"
                                                        placeholder="Harga Barang..." value="{{ $b->harga }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="gambar" class="form-label">Gambar</label>
                                                    <input type="file" class="form-control" name="image"
                                                        id="gambar">
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
<div class="modal fade" id="addmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Data Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('simpanbarang') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="kode_barang" class="form-label">Kode Barang</label>
                        <input type="text" name="kode_barang" class="form-control" id="kode_barang"
                            placeholder="Kode Barang...">
                    </div>
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" id="nama_barang"
                            placeholder="Nama Barang...">
                    </div>
                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label">Kategori</label>
                        <select class="form-select" aria-label="Default select example" name="kategori_id">
                            <option value="" selected>Pilih Kategori...</option>
                            @foreach ($kategori_barangs as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control" id="harga"
                            placeholder="Harga Barang...">
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control" name="image" id="gambar">
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
