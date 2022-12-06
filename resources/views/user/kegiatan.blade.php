@extends('user.master')
@section('content')
    <div class="container" style="min-height: 793px">
        <div class="row mt-5">
            <form action="{{ route('cariartikel') }}" method="get" class=" form-inline d-flex justify-content-center">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <input class="form-control" type="text" name="judul" id="" placeholder="cari artikel...">
                </div>
                <div class="ms-1 col-md-3">
                    <button type="submit" class="btn btn-md btn-primary">Cari</button>
                </div>
            </form>
        </div>

        <div class="row mt-5">
            <?php if($kegiatans->isEmpty()){ ?>
            <h3 class="text-center">Data Kegiatan Tidak Ada</h3>
            <?php } ?>
            @foreach ($kegiatans as $k)
                <div class="col-md-3">
                    <div class="card mb-3">
                        <img src="/gambarpostingan/{{ $k->image }}" height="300px" class="card-img-top" alt="...">

                        <div class="card-body">
                            <h5 class="card-title">{{ $k->nama_kegiatan }}</h5>
                            <p class="card-text"><small
                                    class="text-muted">{{ \Carbon\Carbon::parse($k->tgl_kegiatan)->diffForHumans() }}</small>
                            </p>
                            <p class="card-text">{{ $k->excerpt }}</p>
                            <a href="/artikel/baca/{{ $k->id }}">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection