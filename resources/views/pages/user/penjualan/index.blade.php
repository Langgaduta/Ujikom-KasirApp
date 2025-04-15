@include('layout.app')
@include('layout.navbar-user')

<div class="container">
    <div class="row">
        <div class="mt-5">
            <h3>Penjualan</h3>
        </div>
    </div>
    <div class="row">
        <div class="row">
            <div class="col-md-12 text-end">
                <a href="#" class="btn btn-success mt-3">Export Excel</a>
                <a href="#" class="btn btn-primary mt-3">Tambah Penjualan +</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="">
            <table class="table table-striped mt-4 text-center">
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
                        <td>John Doe</td>
                        <td>15 April 2025</td>
                        <td>Rp 300.000</td>
                        <td>Jane Doe</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#lihatModal1">
                                Lihat
                            </button>
                            <div class="modal fade" id="lihatModal1" tabindex="-1"
                                 aria-labelledby="lihatModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="fs-5" id="lihatModalLabel1">Detail Penjualan</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row mb-3">
                                                    <div class="col-md-5">
                                                        <p><strong>Member Status:</strong> Member</p>
                                                        <p><strong>No. HP:</strong> 081234567890</p>
                                                        <p><strong>Poin Member:</strong> 500</p>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <p><strong>Bergabung sejak:</strong> 01 Januari 2022</p>
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
                                                                    <td>Produk A</td>
                                                                    <td>2</td>
                                                                    <td>Rp 100.000</td>
                                                                    <td>Rp 200.000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Produk B</td>
                                                                    <td>1</td>
                                                                    <td>Rp 100.000</td>
                                                                    <td>Rp 100.000</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-12 text-end">
                                                        <p><strong>Total Harga:</strong> Rp 300.000</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p><strong>Dibuat pada:</strong> 15 April 2025</p>
                                                        <p><strong>Oleh:</strong> Jane Doe</p>
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

                            <a href="#" class="btn btn-primary btn-sm">
                                Unduh Bukti
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jane Smith</td>
                        <td>14 April 2025</td>
                        <td>Rp 500.000</td>
                        <td>John Smith</td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#lihatModal2">
                                Lihat
                            </button>
                            <div class="modal fade" id="lihatModal2" tabindex="-1"
                                 aria-labelledby="lihatModalLabel2" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="fs-5" id="lihatModalLabel2">Detail Penjualan</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row mb-3">
                                                    <div class="col-md-5">
                                                        <p><strong>Member Status:</strong> Non Member</p>
                                                        <p><strong>No. HP:</strong> -</p>
                                                        <p><strong>Poin Member:</strong> -</p>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <p><strong>Bergabung sejak:</strong> -</p>
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
                                                                    <td>Produk X</td>
                                                                    <td>3</td>
                                                                    <td>Rp 150.000</td>
                                                                    <td>Rp 450.000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Produk Y</td>
                                                                    <td>1</td>
                                                                    <td>Rp 50.000</td>
                                                                    <td>Rp 50.000</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-12 text-end">
                                                        <p><strong>Total Harga:</strong> Rp 500.000</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p><strong>Dibuat pada:</strong> 14 April 2025</p>
                                                        <p><strong>Oleh:</strong> John Smith</p>
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

                            <a href="#" class="btn btn-primary btn-sm">
                                Unduh Bukti
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
