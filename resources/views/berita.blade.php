@extends('layouts.master')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tabel Berita</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Data Berita</a></li>
            <li class="breadcrumb-item active">Tabel</li>
        </ol>
        <div class="row">
            <div class="col-md-3 mb-3">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addmodal">Tambah
                    Berita</button>
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
                Tabel Berita
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th width="200">Judul</th>
                            <th width="300">Isi Postingan</th>
                            {{-- <th width="700">Isi Post</th> --}}
                            <th>Tanggal Post</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        @foreach ($postingans as $p)
                            <?php $no++; ?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $p->judul }}</td>
                                <td>{{ $p->excerpt }}</td>
                                {{-- <td>{{ $p->post }}</td> --}}
                                <td>{{ $p->tgl_post }}</td>
                                <td><img src="{{ url('/gambarpostingan/' . $p->image) }}" width="80" alt="">
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editmodal{{ $p->slug }}"><i
                                            class="fa-solid fa-pencil"></i></button>

                                    <a href="/post/berita/hapus/{{ $p->slug }}"
                                        onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"
                                        class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <div class="modal fade" id="editmodal{{ $p->slug }}" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Data Berita</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{ route('updateberita') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $p->id }}">
                                                <div class="mb-3">
                                                    <label for="judul" class="form-label">Judul</label>
                                                    <input type="text" class="form-control" name="judul" id="judul2"
                                                        value="{{ $p->judul }}">
                                                </div>
                                                {{-- <div class="mb-3">
                                                    <label for="excerpt" class="form-label">Excerpt</label>
                                                    <textarea class="form-control" name="excerpt" id="excerpt">{{ $p->excerpt }}</textarea>
                                                </div> --}}
                                                <div class="mb-3">
                                                    <label for="slug" class="form-label">Slug</label>
                                                    <input type="text" class="form-control" name="slug" id="slug2"
                                                        required value="{{ $p->slug }}">
                                                </div>
                                                <input type="hidden" name="kategori" value="berita">
                                                <div class="mb-3">
                                                    <label for="post">Isi Post</label>
                                                    {{-- <textarea class="form-control" name="post" id="excerpt" style="height: 400px">{{ $p->post }}</textarea> --}}
                                                    <input type="hidden" name="post" id="x"
                                                        value="{{ $p->post }}">
                                                    <trix-editor input="x"></trix-editor>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tgl_post" class="form-label">Tanggal Post</label>
                                                    <input type="date" class="form-control" name="tgl_post"
                                                        id="tgl_post" value="{{ $p->tgl_post }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="gambar" class="form-label">Gambar</label>
                                                    <input type="file" class="form-control" id="gambar" name="image"
                                                        placeholder="Gambar...">
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
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Data Berita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('simpanberita') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" name="judul" id="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" name="slug" id="slug" required>
                    </div>
                    <input type="hidden" name="kategori" value="berita">
                    <div class="mb-3">
                        <label for="post">Isi Post</label>
                        {{-- <textarea class="form-control" name="post" style="height: 400px" required></textarea> --}}
                        <input type="hidden" name="post" id="post">
                        <trix-editor input="post"></trix-editor>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_post" class="form-label">Tanggal Post</label>
                        <input type="date" class="form-control" name="tgl_post" id="tgl_post" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        {{--  --}}
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        {{--  --}}
                        <input type="file" class="form-control" id="image" name="image"
                            onchange="previewImage()" required>
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

<script>
    const judul = document.querySelector('#judul');
    const slug = document.querySelector('#slug');


    judul.addEventListener('keyup', function() {

        fetch('/x/berita/cekSlug?judul=' + judul.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug);
    });

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
