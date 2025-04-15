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
                            <input type="text" class="form-control" name="harga" id="harga">
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

<script>
    const hargaInput = document.getElementById('harga');

    hargaInput.addEventListener('input', function (e) {
        // Ambil angka dari input, hapus semua karakter selain digit
        let value = e.target.value.replace(/[^,\d]/g, '');
        if (value) {
            // Format ke Rupiah
            value = formatRupiah(value, 'Rp ');
        }
        e.target.value = value;
    });

    function formatRupiah(angka, prefix) {
        const numberString = angka.replace(/[^,\d]/g, '').toString();
        const split = numberString.split(',');
        let sisa = split[0].length % 3;
        let rupiah = split[0].substr(0, sisa);
        const ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            const separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix === undefined ? rupiah : (rupiah ? prefix + rupiah : '');
    }
</script>
