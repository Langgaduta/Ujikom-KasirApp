@include('layout.app')
@include('layout.navbar-admin')

<div class="container">
    <div class="row">
        <div class="mt-5">
            <h3>Produk</h3>
            <div class="row mt-5">
                <div class="col-md-12 text-end">
                    <a href="#" class="btn btn-primary">Tambah Produk +</a>
                </div>

                <table class="table table-striped mt-3 text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Foto Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Contoh Produk 1</td>
                            <td>
                                <img src="https://via.placeholder.com/50" alt="Foto Produk" width="50">
                            </td>
                            <td>10.000</td>
                            <td>20</td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-primary btn-sm">Update Stok</a>
                                <form action="#" method="POST" class="d-inline">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Contoh Produk 2</td>
                            <td>
                                <img src="https://via.placeholder.com/50" alt="Foto Produk" width="50">
                            </td>
                            <td>25.000</td>
                            <td>10</td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-primary btn-sm">Update Stok</a>
                                <form action="#" method="POST" class="d-inline">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
