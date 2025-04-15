@extends('layout.app')
@include('layout.navbar-admin')

@section('content')
<div class="container">
    <div class="row mt-5">
        <h3>Edit Produk</h3>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <!-- @csrf -->
                        <!-- @method('PUT') -->

                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="Contoh Produk" required>
                        </div>

                        <div class="mb-3">
                            <label for="foto_produk" class="form-label">Foto Produk</label>
                            <input type="file" class="form-control" id="foto_produk" name="foto_produk">
                            <div class="mt-2">
                                <img src="https://via.placeholder.com/150" alt="Foto Produk" width="150">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" value="10.000" required>
                        </div>

                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" value="25" required readonly>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                        <a href="#" class="btn btn-secondary mt-3">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
