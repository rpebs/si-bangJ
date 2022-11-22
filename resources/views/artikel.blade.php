@extends('layouts.master')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tabel Barang</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Data Artikel</a></li>
        <li class="breadcrumb-item active">Tabel</li>
    </ol>
    <div class="row">
        <div class="col-md-3 mb-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >Tambah Artikel</button>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabel Artikel
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Slug</th>
                        <th>Excerpt</th>
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
                        <td>Penangkapan Bandar Judi</td>
                        <td>penangkapan-bandar-judi</td>
                        <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ducimus, explicabo.</td>
                        <td>bandra.jpg</td>
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
          <h5 class="modal-title" id="staticBackdropLabel">Data Artikel</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="surat/kategori/tambah" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" placeholder="Judul...">
              </div>
              <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" placeholder="Slug...">
              </div>
              <div class="mb-3">
                <label for="excerpt" class="form-label">Excerpt</label>
                <textarea class="form-control" name="excerpt" id="excerpt"></textarea>
              </div>
              <div class="mb-3">
                <label for="post">Isi Post</label>
                <textarea class="form-control" name="excerpt" id="excerpt"></textarea>
              </div>
              <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" placeholder="Gambar...">
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
