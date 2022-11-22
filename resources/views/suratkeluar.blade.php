@extends('layouts.master')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tabel Surat Keluar</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Surat Keluar</a></li>
        <li class="breadcrumb-item active">Tabel</li>
    </ol>
    <div class="row">
        <div class="col-md-3 mb-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >Tambah Surat</button>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Kategori</th>
                        <th>Tanggal Keluar</th>
                        <th>Pengirim</th>
                        <th>Perihal</th>
                        <th>Tempat</th>
                        <th>Tanggal Event</th>
                        <th>Keterangan</th>
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
                        <td>PPSRT1</td>
                        <td>Kantor</td>
                        <td>11-11-2000</td>
                        <td>Bupati</td>
                        <td>Rapat Dewan</td>
                        <td>Kantor Dispora</td>
                        <td>24-11-2004</td>
                        <td>Tamu undangan maksimal 2 orang</td>
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
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="surat/keluar/tambah" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">

                    <div class="mb-3">
                      <label for="kode" class="form-label">Kode</label>
                      <input type="text" class="form-control" id="kode" name="kode">
                      <div id="kode" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                      <label for="kategori" class="form-label">Kategori</label>
                      <select class="form-select" aria-label="Default select example" name="kategori">
                          <option value="" selected>Pilih Kategori...</option>
                          <option value="1">Rapat</option>
                          <option value="2">Upacara</option>
                          <option value="3">Ultah</option>
                        </select>
                    </div>
                    <div class="mb-3">
                      <label for="tgl_keluar" class="form-label">Tanggal keluar</label>
                      <input type="date" class="form-control" id="tgl_keluar" name="tgl_keluar">
                      <div id="tgl_keluar" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="tempat" class="form-label">Tempat</label>
                        <input type="text" class="form-control" id="tempat" name="tempat">
                        <div id="tempat" class="form-text">We'll never share your email with anyone else.</div>
                      </div>

                </div>
                <div class="col-md-6">

                    <div class="mb-3">
                      <label for="pengirim" class="form-label">Pengirim</label>
                      <input type="text" class="form-control" id="pengirim" name="pengirim">
                      <div id="pengirim" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                      <label for="perihal" class="form-label">Perihal</label>
                      <input type="text" class="form-control" id="perihal" name="perihal">
                      <div id="perihal" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_event" class="form-label">Tanggal Event</label>
                        <input type="date" class="form-control" id="tgl_event" name="tgl_event">
                        <div id="tgl_event" class="form-text">We'll never share your email with anyone else.</div>
                      </div>
                      <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                        <div id="keterangan" class="form-text">We'll never share your email with anyone else.</div>
                      </div>



                    </div>
                    <div class="mb-3">
                      <label for="kode" class="form-label">File</label>
                      <input type="file" class="form-control" id="kode">
                      {{-- <div id="kode" class="form-text">We'll never share your email with anyone else.</div> --}}
                    </div>

            </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
        </form>
      </div>
    </div>
  </div>
