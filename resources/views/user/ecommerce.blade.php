@extends('user.master')
@section('content')
    <div class="container" style="min-height: 793px">
        <div class="row mt-5">

            <form action="{{ route('caribarang') }}" method="get" class=" form-inline d-flex justify-content-center">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <input class="form-control" type="text" name="nama_barang" id="" placeholder="cari barang...">
                </div>
                <div class="ms-1 col-md-3">
                    <button type="submit" class="btn btn-md btn-primary">Cari</button>
                </div>
            </form>
        </div>
        <p>Kategori Barang :</p>
        <a href="/ecommerce" class="btn btn-outline-primary">Semua</a>
        @foreach ($kategori_barangs as $k)
            <a href="/ecommerce/kategori/{{ $k->id }}"
                class="mt-1 btn btn-outline-primary">{{ $k->nama_kategori }}</a>
        @endforeach

        <div class="row mb-5 ">
            @foreach ($barangs as $b)
                <div class="col-6 col-md-3 col-lg-2 mt-3 ">
                    <div class="card h-100">
                        <div class="col-md-2">
                            <span
                                class="mt-1 ms-1 position-absolute badge bg-danger text-light">{{ $b->kategori->nama_kategori }}</span>
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
                                        <p>ini adalah detail barang : <br> Lorem ipsum dolor sit amet consectetur
                                            adipisicing elit.
                                            Placeat voluptas asperiores quae animi numquam velit dolor? Cupiditate nobis
                                            omnis praesentium.</p>
                                        <h5>Harga : <?php echo 'Rp ' . number_format("$float", 0, ',', '.'); ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="button" class="btn btn-primary" style="width: 20%">Beli</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="d-flex justify-content-center">
            {{ $barangs->links() }}
        </div>





    </div>
@endsection
