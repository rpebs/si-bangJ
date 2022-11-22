@extends('layouts.master')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tabel Kategori Surat</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Kategori Surat</a></li>
        <li class="breadcrumb-item active">Tabel</li>
    </ol>
    <div class="row">
        <div class="col-md-3 mb-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >Tambah Kategori</button>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabel Kategori
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
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
                        <td>Surat Perintah</td>
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
          <h5 class="modal-title" id="staticBackdropLabel">Kategori Surat</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="surat/kategori/tambah">
            @csrf
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="name" class="form-control" id="nama_kategori" placeholder="Nama Kategori...">
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
