@include('layout.app')
@include('layout.navbar-admin')

<div class="container">
    <div class="row">
        <div class="mt-5">
            <h3>Produk</h3>
            <div class="row mt-5">
                <div class="col-md-12 text-end">
                    <a href="{{ url('/admin/produk/create') }}" class="btn btn-primary">Tambah Produk +</a>
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
                        @foreach ($produks as $index => $produk)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $produk->nama_produk }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $produk->foto_produk) }}" alt="Foto Produk" width="50">
                                </td>
                                <td>{{ number_format($produk->harga, 0, ',', '.') }}</td>
                                <td>{{ $produk->stok }}</td>
                                <td>
                                    <a href="{{ route('admin.produk.edit', $produk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ route('admin.produk.updateStok', $produk->id) }}" class="btn btn-primary btn-sm">Update Stok</a>
                                    <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
