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

        <div class="row mt-5 justify-content-center">
            <div class="col-md-8">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <div class="card mb-3">
                                <img src="/gambarpostingan/{{ $first->image }}" class="img-fluid" alt="..."
                                    style="max-height: 400px">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $first->judul }}</h5>
                                    <p class="card-text">{{ $first->excerpt }}</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>

                        @foreach ($slide as $s)
                            <div class="carousel-item">
                                <div class="card mb-3">
                                    <img src="/gambarpostingan/{{ $s->image }}" class="img-fluid" alt="..."
                                        style="max-height: 400px">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $s->judul }}</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a natural
                                            lead-in to
                                            additional content. This content is a little bit longer.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </div>

        <div class="row mt-5">
            <h3>Postingan Terbaru</h3>
            @foreach ($postingan as $p)
                <div class="col-md-12">
                    <div class="card card-post mb-3">
                        <span class="mt-1 ms-1 position-absolute badge bg-danger text-light">{{ $p->kategori }}
                        </span>
                        <div class="row g-0">

                            <div class="col-md-4">
                                <img src="/gambarpostingan/{{ $p->image }}" class="img-fluid rounded-start"
                                    alt="..." width="800">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body hover-body">
                                    <h5 class="card-title"><a
                                            href="/berita/baca/{{ $p->slug }}">{{ $p->judul }}</a></h5>
                                    <p class="card-text">{{ $p->excerpt }}</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    <p><a href="/berita/baca/{{ $p->slug }}">Baca Selengkapnya</a></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="row mb-5 ">
            <h3>Produk UMKM Terbaru</h3>
            @foreach ($barangs as $b)
                <div class="col-6 col-md-3 col-lg-2 mt-3 ">
                    <div class="card h-100 card-post">
                        <div class="col-md-2">
                            <span
                                class="mt-1 ms-1 position-absolute badge bg-danger text-light">{{ $b->kategori->nama_kategori }}
                            </span>
                        </div>

                        <img src="/gambarbarang/{{ $b->image }}" class="card-img-top" alt="...">
                        <div class="card-body d-flex align-items-end">
                            <ul class="list-group" style="list-style-type: none; text-align:center;">
                                <?php $float = (float) $b->harga; ?>
                                <li>
                                    <h5 class="card-title ">{{ $b->nama_barang }}</h5>
                                </li>
                                <li>
                                    <p class="card-text mb-2"><?php echo 'Rp ' . number_format("$float", 0, ',', '.'); ?></p>
                                </li>
                                <li>
                                    <center>
                                        <button data-bs-toggle="modal" data-bs-target="#detail{{ $b->kode_barang }}"
                                            class="btn btn-md btn-primary " target="_blank" rel="noopener noreferrer"
                                            style="width: 80%">Beli</button>
                                    </center>
                                </li>
                            </ul>



                            {{-- <center><a
                                    href="https://api.whatsapp.com/send?phone=+62881036102146&text=Halo admin ! Saya%20mau%20pesan%20barang%0ANama%20Barang : *{{ $b->nama_barang }}*%0AKode Barang : *{{ $b->kode_barang }}*"
                                    class="btn btn-md btn-primary" target="_blank" rel="noopener noreferrer"
                                    style="width: 80%">Beli</a></center> --}}

                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="detail{{ $b->kode_barang }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ $b->nama_barang }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="ms-3 col-md-3">
                                        <img src="/gambarbarang/{{ $b->image }}" width="300" alt="">
                                    </div>
                                    <div class="col-md-6 ms-auto">
                                        <h3>{{ $b->nama_barang }}</h3>
                                        <p>{{ $b->detail }}</p>
                                        <h5>Harga : <?php echo 'Rp ' . number_format("$float", 0, ',', '.'); ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <a href="https://api.whatsapp.com/send?phone=+62881036102146&text=Halo admin ! Saya%20mau%20pesan%20barang%0ANama%20Barang : *{{ $b->nama_barang }}*%0AKode Barang : *{{ $b->kode_barang }}*$0AHarga : *<?php echo 'Rp ' . number_format("$float", 0, ',', '.'); ?>*"
                                    class="btn btn-primary" style="width: 20%">Beli</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection
