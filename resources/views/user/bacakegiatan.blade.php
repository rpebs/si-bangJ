@extends('user.master')
@section('content')
    <div class="container" style="min-height: 793px">
        <div class="row mt-5">
            <div class="ms-auto me-auto col-md-8 justify-content-center">
                <h2 class="card-title">{{ $kegiatans->nama_kegiatan }}</h2>
                <p class="card-text"><small>Di Laksanakan pada : {{ $kegiatans->tgl_kegiatan }}</small><br><small>Tempat :
                        {{ $kegiatans->tempat }}</small></p>

                <div class="text-center">
                    <img src="/gambarpostingan/{{ $kegiatans->image }}" width="500" alt="...">
                </div>


                <p class="card-text mt-5 mb-5">{!! $kegiatans->deskripsi !!}</p>
            </div>



        </div>

    </div>
@endsection
