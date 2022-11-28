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
                {{-- @foreach ($surat_masuks as $sm)
                    <h1>{{ $sm->kode_surat }}</h1>
                    <h4>Kategori : {{ $sm->kategori->nama_kategori }}</h4>
                    <h4>Dikirim pada : {{ $sm->tgl_masuk }}</h4>
                    <h4>Kepada : {{ $sm->pengirim }}</h4>
                    <h4>Waktu Pelaksanaan : {{ $sm->tgl_mulai }} - {{ $sm->tgl_selesai }} </h4>
                    <h4>Perihal : {{ $sm->perihal }}</h4>
                    <h4>Lokasi : {{ $sm->tempat }}</h4>
                    <h4>{{ $sm->keterangan }}</h4>
                @endforeach --}}

                <table class="table table-bordered border-dark">

                    <tbody>

                        @foreach ($surat_masuks as $sm)
                            <tr>
                                <th scope="row">Kode Surat</th>
                                <td>{{ $sm->kode_surat }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kategori</th>
                                <td>{{ $sm->kategori->nama_kategori }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Dikirim Pada</th>
                                <td>{{ $sm->tgl_masuk }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kepada</th>
                                <td>{{ $sm->pengirim }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Waktu Pelaksanaan</th>
                                <td>{{ $sm->tgl_mulai }} Sampai {{ $sm->tgl_selesai }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Perihal</th>
                                <td>{{ $sm->perihal }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Lokasi</th>
                                <td>{{ $sm->tempat }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Keterangan</th>
                                <td>{{ $sm->keterangan }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
