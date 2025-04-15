@include('layout.app')
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm py-3">
    <div class="container-fluid">
        <a class="navbar-brand ms-4 fw-bold text-primary" href="#">Kasir-App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('user/dashboard*') ? 'active text-primary fw-bold' : '' }} me-4"
                        href="{{ url('/user/dashboard') }}">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('user/produk*') ? 'active text-primary fw-bold' : '' }} me-4"
                        href="{{ url('/user/produk') }}">Produk</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('user/penjualan*') ? 'active text-primary fw-bold' : '' }} me-4"
                        href="{{ url('/user/penjualan') }}">Penjualan</a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/user/logout') }}" class="nav-link d-flex align-items-center">
                        <i class="bi bi-box-arrow-right fs-4 me-2"></i>
                        <span class="d-none d-lg-inline text-dark">Logout</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
