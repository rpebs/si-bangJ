<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-nav ">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row mt-5">

            <form action="#" class=" form-inline d-flex justify-content-center">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <input class="form-control" type="text" name="" id=""
                        placeholder="cari barang...">
                </div>
                <div class="ms-1 col-md-3">
                    <button class="btn btn-md btn-primary">Cari</button>
                </div>
            </form>
        </div>

        <div class="row">
            @foreach ($barangs as $b)
                <div class="col-md-3 mt-5">
                    <div class="card" style="width: 18rem;">
                        <img src="/gambarbarang/{{ $b->image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $b->nama_barang }}</h5>
                            <p class="card-text d-inline">Rp. {{ $b->harga }}</p>
                            <a href="#" class="float-end d-inline btn btn-md btn-primary">Beli</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>




    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
