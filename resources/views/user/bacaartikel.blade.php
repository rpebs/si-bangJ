@extends('user.master')
@section('content')
    <div class="container" style="min-height: 793px">
        <div class="row mt-5">
            <div class="ms-auto me-auto col-md-8 justify-content-center">
                <h2 class="card-title">{{ $postingans->judul }}</h2>
                <p class="card-text"><small class="text-muted">Di Posting pada : {{ $postingans->tgl_post }}</small></p>
                <div class="text-center">
                    <img src="/gambarpostingan/{{ $postingans->image }}" alt="...">
                </div>


                <p class="card-text mt-5 mb-5">{{ $postingans->post }}</p>
            </div>



        </div>

    </div>
@endsection
