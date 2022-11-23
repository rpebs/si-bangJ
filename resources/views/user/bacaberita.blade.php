@extends('user.master')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <h2 class="card-title">{{ $postingans->judul }}</h2>
            <p class="card-text"><small class="text-muted">Di Posting pada : {{ $postingans->tgl_post }}</small></p>
            <img src="/gambarpostingan/{{ $postingans->image }}" class="card-img-top" alt="...">

            <p class="card-text mt-5 mb-5">{{ $postingans->post }}</p>


        </div>

    </div>
@endsection
