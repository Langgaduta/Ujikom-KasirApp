@include('layout.app')
@include('layout.navbar-user')

<div class="container">
    <div class="row">
        <div class="col-md-2 mt-5">
            <h3>Pembayaran</h3>
        </div>
    </div>

    <!-- Tombol Kembali dan Unduh di atas Card -->
    <div class="mt-4 mb-3 text-end">
        <a href="{{ route('user.penjualan.index') }}" class="btn btn-secondary me-2">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <a href="#" class="btn btn-primary">
            <i class="fas fa-download"></i> Unduh Struk
        </a>
    </div>

    <div class="container d-flex flex-column justify-content-center align-items-center mt-2">
        <div class="card shadow-sm w-100" style="max-width: 800px;">
            <div class="card-body">
                <h4 class="mb-4">Struk Penjualan</h4>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>No. HP :</strong>  081234567890
                    </div>
                    <div class="col-md-6 text-end">
                        <strong>Tanggal Penjualan :</strong> 15 April 2025
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Nama :</strong> John Doe
                    </div>
                    <div class="col-md-6 text-end">
                        <strong>Invoice : </strong> #123456
                    </div>
                </div>

                <table class="table table-bordered text-center">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Produk A</td>
                            <td>Rp 100.000</td>
                            <td>2</td>
                            <td>Rp 200.000</td>
                        </tr>
                        <tr>
                            <td>Produk B</td>
                            <td>Rp 150.000</td>
                            <td>1</td>
                            <td>Rp 150.000</td>
                        </tr>
                    </tbody>
                </table>

                <div class="row text-center mt-4">
                    <div class="col-md-3 border-end">
                        <strong>Point Digunakan</strong><br>
                        500
                    </div>
                    <div class="col-md-3 border-end">
                        <strong>Kasir</strong><br>
                        Jane Doe
                    </div>
                    <div class="col-md-3 border-end">
                        <strong>Kembalian</strong><br>
                        Rp 50.000
                    </div>
                    <div class="col-md-3">
                        <strong>Total</strong><br>
                        Rp 300.000
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
