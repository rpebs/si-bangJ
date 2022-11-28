@extends('layouts.master')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tabel Surat Keluar</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Surat Keluar</a></li>
            <li class="breadcrumb-item active">Tabel</li>
        </ol>


        <div class="card mb-4">
            <div class="card-header">

                Detail Agenda Surat
            </div>
            <div class="card-body">
                @foreach ($surat_masuks as $sm)
                    <h1>{{ $sm->kode_surat }}</h1>
                    <h4>Kategori : {{ $sm->kategori->nama_kategori }}</h4>
                    <h4>Dikirim pada : {{ $sm->tgl_masuk }}</h4>
                    <h4>Kepada : {{ $sm->pengirim }}</h4>
                    <h4>Waktu Pelaksanaan : {{ $sm->tgl_mulai }} - {{ $sm->tgl_selesai }} </h4>
                    <h4>Perihal : {{ $sm->perihal }}</h4>
                    <h4>Lokasi : {{ $sm->tempat }}</h4>
                    <h4>{{ $sm->keterangan }}</h4>
            </div>
        </div>
    </div>
    @endforeach
@endsection
