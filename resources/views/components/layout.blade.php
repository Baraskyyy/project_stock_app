<body>
    <div class="d-flex">
        <div class="clr max-height-vh-100 min-vh-100" >
            <nav class="nav flex-column">
                <div class="container mt-3" style="padding-right: 50px">
                    <a class="mt-3 head navbar-brand" href="#">
                        <img src="{{ url('/assets/images/laravel.png') }}" height="60">
                        PROJECT
                    </a>
                    <h3 class="m-3 head"></h3>
                </div>

                <!-- Menu Side Bar -->
                    {{-- Menu Dahboard --}}
                    <a href="{{ url('/dashboard') }}" class="px-1 side nav-item nav-link {{ Request::is('dashboard') ? 'active' : '' }} text-light">
                        <i class="mx-2 bi bi-house-fill"></i> Dashboard
                    </a>

                    {{-- Menu Pegawai --}}
                    <a href="{{ url('/pegawai') }}" class="px-1 side nav-item nav-link {{ Request::is('pegawai') ? 'active' : '' }} text-light">
                        <i class="mx-2 fa-solid fa-key"></i> Pegawai
                    </a>

                    {{-- Menu Data Barang --}}
                    <div class="px-3 pt-3 text-decoration-none text-light"><strong>Barang</strong></div>
                        <a href="{{ url('/stok') }}" class="px-4 side nav-item nav-link {{ Request::is('stok') ? 'active' : '' }} text-light">
                            <i class="mx-2 bi bi-file-bar-graph"></i> Stok
                        </a>
                        <a href="{{ url('/barang-masuk') }}" class="px-4 side nav-item nav-link {{ Request::is('barang-masuk') ? 'active' : '' }} text-light">
                            <i class="mx-2 bi bi-arrow-right"></i> Barang Masuk
                        </a>
                        <a href="{{ url('/barang-keluar') }}" class="px-4 side nav-item nav-link {{ Request::is('barang-keluar') ? 'active' : '' }} text-light">
                            <i class="mx-2 bi bi-arrow-left"></i> Barang Keluar
                        </a>


                    <a href="{{ url('/pelanggan') }}" class="px-1 pt-3 side nav-item nav-link {{ Request::is('pelanggan') ? 'active' : '' }} text-light">
                        <i class="mx-2 bi bi-house-fill"></i> Pelanggan
                    </a>
                    <a href="{{ url('/suplier') }}" class="px-1 side nav-item nav-link {{ Request::is('suplier') ? 'active' : '' }} text-light">
                        <i class="mx-2 bi bi-cart4"></i> Suplier
                    </a>


                    {{-- Menu Logout --}}
                    <a href="{{ url('/logout') }}" class="px-1 mt-4 side nav-item nav-link text-light">
                        <i class="mx-2 fa-solid fa-power-off"></i> Logout
                    </a>
            </nav>
        </div>

        <div class="col">
            <nav class="navbar navbar-dark navbar-expand-lg border-left-1">
                <div class="container-fluid">
                    <div class="d-flex align-items-center">
                        <button id="toggleMenuBtn" class="btn btn-light me-2"><i class="fas fa-bars"></i></button>

                        <a class="navbar-brand" href="">
                            Hai {{Auth()->User()->name}}
                        </a>
                    </div>
                </div>

            </nav>

            <div class="p-1 mx-2 foot">
                <!-- Yield -->
                
            </div>

            <footer class="p-3 text-center">
                &copy; 2024 GPA109A - Apps Stok Barang All rights reserved.
            </footer>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="{{ url('assets/bootstrap5/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const toggleMenuBtn = document.getElementById('toggleMenuBtn');
        const sidebar = document.querySelector('.clr');

        toggleMenuBtn.addEventListener('click', function() {
            sidebar.classList.toggle('d-none');
        });
    });

    </script>
    </body>
