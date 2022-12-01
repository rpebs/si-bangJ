<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link {{ $active === 'dashboard' ? 'text-light' : '' }}" href="/">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed {{ $active === 'suratmasuk' || $active === 'suratkeluar' || $active === 'kategorisurat' ? 'text-light' : '' }}"
                        href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false"
                        aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fa-sharp fa-solid fa-envelope"></i></div>
                        Surat
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ $active === 'suratmasuk' ? 'text-light' : '' }}"
                                href="/surat/masuk"><i class="fa-solid fa-envelope-open-text"></i>&nbsp;
                                Surat Masuk</a>
                            <a class="nav-link {{ $active === 'suratkeluar' ? 'text-light' : '' }}"
                                href="/surat/keluar"><i class="fa-solid fa-envelope-circle-check"></i>&nbsp; Surat
                                Keluar</a>
                            <a class="nav-link {{ $active === 'kategorisurat' ? 'text-light' : '' }}"
                                href="/surat/kategori"><i class="fa-solid fa-table"></i>&nbsp;
                                Kategori</a>
                        </nav>
                    </div>
                    <a class="nav-link {{ $active === 'barang' || $active === 'kategoribarang' ? 'text-light' : '' }} collapsed"
                        href="#" data-bs-toggle="collapse" data-bs-target="#barang" aria-expanded="false"
                        aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-store"></i></div>
                        Barang
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="barang" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ $active === 'barang' ? 'text-light' : '' }}" href="/barang"><i
                                    class="fa-solid fa-box"></i>&nbsp; Data Barang</a>
                            <a class="nav-link {{ $active === 'kategoribarang' ? 'text-light' : '' }}"
                                href="/barang/kategori"><i class="fa-brands fa-microsoft"></i>&nbsp;
                                Kategori Barang</a>
                        </nav>
                    </div>
                    <a class="nav-link {{ $active === 'artikel' || $active === 'berita' || $active === 'kegiatan' ? 'text-light' : '' }} collapsed"
                        href="#" data-bs-toggle="collapse" data-bs-target="#collapsePost" aria-expanded="false"
                        aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Postingan
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePost" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ $active === 'berita' ? 'text-light' : '' }}" href="/post/berita"><i
                                    class="fa-regular fa-newspaper"></i>&nbsp;
                                Berita</a>
                            <a class="nav-link {{ $active === 'artikel' ? 'text-light' : '' }}" href="/post/artikel"><i
                                    class="fa-regular fa-file-lines"></i>&nbsp;
                                Artikel</a>
                            <a class="nav-link {{ $active === 'kegiatan' ? 'text-light' : '' }}"
                                href="{{ route('kegiatan') }}"><i class="fa-brands fa-elementor"></i>&nbsp;
                                Kegiatan</a>
                        </nav>
                    </div>
                    <a class="nav-link {{ $active === 'agenda' ? 'text-light' : '' }}" href="/agenda">
                        <div class="sb-nav-link-icon"><i class="fa-regular fa-calendar-days"></i></div>
                        Agenda
                    </a>




                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                {{ Auth::user()->username }}
            </div>
        </nav>
    </div>
