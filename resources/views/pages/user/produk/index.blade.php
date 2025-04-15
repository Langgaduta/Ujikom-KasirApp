
@include('layout.app')
@include('layout.navbar-user')

<div class="container">
    <div class="row">
        <div class="mt-5">
            <h3>Produk</h3>
            <div class="row mt-5">
                <table class="table table-striped mt-3 text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Foto Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Handphone</td>
                                <td>
                                    <img src="" alt="Foto Produk" width="50">
                                </td>
                                <td>Rp 1.000.000</td>
                                <td>10</td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
