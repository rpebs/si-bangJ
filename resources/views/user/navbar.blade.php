<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-nav ">
        <div class="container">
            <a class="navbar-brand" href="#">RIDEDEV</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" aria-current="page"
                            href="{{ route('blog') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'berita' ? 'active' : '' }}" aria-current="page"
                            href="{{ route('tampilberita') }}">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'artikel' ? 'active' : '' }}"
                            href="{{ route('tampilartikel') }}">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'ecommerce' ? 'active' : '' }}"
                            href="{{ route('ecommerce') }}">Toko</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
