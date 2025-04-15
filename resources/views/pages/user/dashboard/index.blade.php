@include('layout.app')
@include('layout.navbar-user')

<div class="container-fluid py-5">
    <div class="container">
        <!-- Header Section -->
        <div class="row mb-4">
            <div class="col">
                <h1 class="display-4 text-dark">Dashboard</h1>
                <p class="text-muted">Selamat datang kembali, <strong>Petugas!</strong> Ini adalah ringkasan data penjualan hari ini.</p>
            </div>
        </div>

        <!-- Card Total Penjualan Hari Ini -->
        <div class="row g-4">
            <div class="col-md-12">
                <div class="card shadow rounded-4 border-0">
                    <div class="card-body text-center">
                        <!-- Ikon dengan efek gradien -->
                        <div class="icon-circle bg-gradient-primary p-4 mb-3">
                            <i class="bi bi-cart-fill display-4 text-white"></i>
                        </div>
                        <h5 class="card-title text-primary mb-3">Total Penjualan Hari Ini</h5>
                        <h2 class="text-dark fw-bold mb-3">Rp 1.500.000</h2> <!-- Ganti dengan nilai statis -->
                        <p class="card-text text-muted">Jumlah transaksi yang berhasil dilakukan hari ini</p>
                        <a href="#" class="btn btn-primary btn-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menambahkan grafik atau data lain (Opsional) -->
        <!-- Grafik bisa ditambahkan di sini menggunakan library seperti Chart.js atau ApexCharts -->
    </div>
</div>

<!-- Menambahkan Bootstrap Icons untuk ikon -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.min.js"></script>
