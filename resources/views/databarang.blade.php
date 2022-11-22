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
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >Tambah Barang</button>
        </div>
    </div>

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
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>

                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>BRG-001</td>
                        <td>Micropohon Saramonic</td>
                        <td>Elektronik</td>
                        <td>mic.jpg</td>
                        <td>
                            edit|delete|lihat
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection


  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Data Barang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="surat/kategori/tambah" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" placeholder="Kode Barang...">
              </div>
              <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" placeholder="Nama Barang...">
              </div>
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Kategori</label>
                <select class="form-select" aria-label="Default select example" name="kategori">
                    <option value="" selected>Pilih Kategori...</option>
                    <option value="1">Elektronik</option>
                    <option value="2">Outdoor</option>
                    <option value="3">Indoor</option>
                  </select>
              </div>
              <div class="mb-3">
                <label for="nama_barang" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="nama_barang" placeholder="Nama Barang...">
              </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
