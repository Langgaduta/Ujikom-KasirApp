@include('layout.app')
@include('layout.navbar-admin')

<div class="container">
    <div class="row">
        <div class="mt-5">
            <h3>Penjualan</h3>
            <table class="table table-striped mt-5 text-center">
        </div>
        <div class="row">
            <div class="col-md-12 text-end">
                <a href="" class="btn btn-success mt-3">Export Excel</a>
            </div>
        </div>

        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Tanggal Penjualan</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Dibuat Oleh</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Lazzuardi Langga Duta Wijaya</td>
                    <td>15 April 2025</td>
                    <td>Rp. 2000.000</td>
                    <td>Petugas</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                            data-bs-target="#lihatModal{{ $penjualan->id }}">
                            Lihat
                        </button>
                        <div class="modal fade" id="lihatModal" tabindex="-1"
                            aria-labelledby="lihatModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="fs-5" id="lihatModalLabel">Detail Penjualan
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row mb-3">
                                                <div class="col-md-5">
                                                    <p><strong>Member Status:</strong>
                                                    <p><strong>No. HP:</strong> 0995378060487
                                                    </p>
                                                    <p><strong>Poin Member:</strong>
                                                        20000</p>
                                                </div>
                                                <div class="col-md-7">
                                                    <p><strong>Bergabung sejak:</strong>
                                                       15 April 2025
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Nama Produk</th>
                                                                <th scope="col">Qty</th>
                                                                <th scope="col">Harga</th>
                                                                <th scope="col">Sub Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                                <tr>
                                                                    <td>Handphone</td>
                                                                    <td>2</td>
                                                                    <td>Rp. 2.000.000</td>
                                                                    <td>Rp. 4.000.000</td>
                                                                </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12 text-end">
                                                    <p><strong>Total Harga:</strong> Rp
                                                        Rp. 2000.000</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><strong>Dibuat pada:</strong>
                                                        15 April 2025
                                                    </p>
                                                    <p><strong>Oleh:</strong>Petugas</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <a href="" class="btn btn-primary btn-sm">Unduh Bukti</a>
                    </td>
                </tr>

        </tbody>
        </table>
    </div>
</div>
