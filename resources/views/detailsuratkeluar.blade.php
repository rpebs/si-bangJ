@extends('layouts.master')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Surat Keluar</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Surat Keluar</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>


        <div class="card mb-4">
            <div class="card-header">

                Detail Agenda Surat
            </div>
            <div class="card-body">
                @foreach ($surat_keluars as $sk)
                    <h1>{{ $sk->kode_surat }}</h1>
                    <h4>Kategori : {{ $sk->kategori->nama_kategori }}</h4>
                    <h4>Dikirim pada : {{ $sk->tgl_keluar }}</h4>
                    <h4>Kepada : {{ $sk->tujuan }}</h4>
                    <h4>Waktu Pelaksanaan : {{ $sk->tgl_mulai }} - {{ $sk->tgl_selesai }} </h4>
                    <h4>Perihal : {{ $sk->perihal }}</h4>
                    <h4>Lokasi : {{ $sk->tempat }}</h4>
                    <h4>{{ $sk->keterangan }}</h4>
            </div>
        </div>
    </div>
    @endforeach
@endsection
