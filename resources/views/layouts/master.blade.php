@include('layouts.head')
@include('layouts.navbar')
@include('layouts.sidenav')
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
@include('layouts.footer')

