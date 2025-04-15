@include('layout.app')
@include('layout.navbar-admin')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="mt-5">
                <div class="row mb-4">
                    <div class="col">
                        <h1 class="display-4 text-dark">Dashboard</h1>
                        <p class="text-muted">Selamat datang kembali, <strong>Admin!</strong> Ini adalah ringkasan data penjualan hari ini.</p>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Statistik Penjualan Per Hari</h5>
                        <canvas id="salesChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

</script>
