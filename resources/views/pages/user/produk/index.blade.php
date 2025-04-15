
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
                        @foreach ($produks as $index => $produk)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $produk->nama_produk }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $produk->foto_produk) }}" alt="Foto Produk" width="50">
                                </td>
                                <td>{{ number_format($produk->harga, 0, ',', '.') }}</td>
                                <td>{{ $produk->stok }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
