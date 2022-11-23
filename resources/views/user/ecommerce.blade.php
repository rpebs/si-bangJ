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
            <a href="/ecommerce/kategori/{{ $k->id }}" class="btn btn-outline-primary">{{ $k->nama_kategori }}</a>
        @endforeach

        <div class="row mb-5">
            @foreach ($barangs as $b)
                <div class="col-md-2 mt-5">
                    <div class="card">
                        <div class="col-md-2">
                            <span class="ms-1 badge bg-danger text-light">{{ $b->kategori->nama_kategori }}</span>
                        </div>

                        <img src="/gambarbarang/{{ $b->image }}" class="card-img-top" height="160"alt="...">
                        <div class="card-body">
                            <?php $float = (float) $b->harga; ?>
                            <h5 class="card-title">{{ $b->nama_barang }}</h5>
                            <p class="card-text"><?php echo 'Rp ' . number_format("$float", 2, ',', '.'); ?></p>
                            <center><a
                                    href="https://api.whatsapp.com/send?phone=+62881036102146&text=Halo admin ! Saya%20mau%20pesan%20barang%0ANama%20Barang : *{{ $b->nama_barang }}*%0AKode Barang : *{{ $b->kode_barang }}*"
                                    class="btn btn-md btn-primary" target="_blank" rel="noopener noreferrer"
                                    style="width: 150px">Beli</a></center>
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
