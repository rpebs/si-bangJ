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
                {{-- @foreach ($surat_keluars as $sk)
                    <h1>{{ $sk->kode_surat }}</h1>
                    <h4>Kategori : {{ $sk->kategori->nama_kategori }}</h4>
                    <h4>Dikirim pada : {{ $sk->tgl_keluar }}</h4>
                    <h4>Kepada : {{ $sk->tujuan }}</h4>
                    <h4>Waktu Pelaksanaan : {{ $sk->tgl_mulai }} - {{ $sk->tgl_selesai }} </h4>
                    <h4>Perihal : {{ $sk->perihal }}</h4>
                    <h4>Lokasi : {{ $sk->tempat }}</h4>
                    <h4>{{ $sk->keterangan }}</h4>
                @endforeach --}}
                <table class="table table-bordered border-dark">

                    <tbody>

                        @foreach ($surat_keluars as $sk)
                            <tr>
                                <th scope="row">Kode Surat</th>
                                <td>{{ $sk->kode_surat }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kategori</th>
                                <td>{{ $sk->kategori->nama_kategori }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal Dikirim</th>
                                <td>{{ $sk->tgl_keluar }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kepada</th>
                                <td>{{ $sk->tujuan }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Waktu Pelaksanaan</th>
                                <td>{{ $sk->tgl_mulai }} Sampai {{ $sk->tgl_selesai }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Perihal</th>
                                <td>{{ $sk->perihal }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Lokasi</th>
                                <td>{{ $sk->tempat }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Keterangan</th>
                                <td>{{ $sk->keterangan }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
