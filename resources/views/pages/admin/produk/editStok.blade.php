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
                    <form action="#" method="POST">
                        <!-- @csrf -->
                        <!-- @method('PUT') -->

                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="Contoh Produk" required disabled>
                        </div>

                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" value="50" required>
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
