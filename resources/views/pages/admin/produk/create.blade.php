@include('layout.app')
@include('layout.navbar-admin')


<div class="container">
    <div class="row mt-5">
        <h3>Tambah Produk</h3>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="foto_produk" class="form-label">Foto Produk</label>
                            <input type="file" class="form-control" name="foto_produk" id="foto_produk"
                                accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" name="harga" id="harga">
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="text" class="form-control" name="stok" id="stok">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Tambah</button>
                        <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
