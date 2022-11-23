@extends('user.master')
@section('content')
    <div class="container">
        <div class="row mt-5">
            @foreach ($postingans as $p)
                <div class="col-md-3">
                    <div class="card mb-3">
                        <img src="/gambarpostingan/{{ $p->image }}" height="200px" class="card-img-top" alt="...">

                        <div class="card-body">
                            <h5 class="card-title">{{ $p->judul }}</h5>
                            <p class="card-text"><small class="text-muted">{{ $p->tgl_post }}</small></p>
                            <p class="card-text">{{ $p->excerpt }}</p>
                            <a href="/berita/baca/{{ $p->slug }}">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
