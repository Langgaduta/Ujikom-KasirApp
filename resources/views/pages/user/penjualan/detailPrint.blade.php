@include('layout.app')
@include('layout.navbar-user')

<div class="container">
    <div class="row">
        <div class="col-md-2 mt-5">
            <h3>Pembayaran</h3>
        </div>
    </div>

    <!-- Tombol Kembali dan Unduh di atas Card -->
    <div class="mt-4 mb-3 text-end">
        <a href="{{ route('user.penjualan.index') }}" class="btn btn-secondary me-2">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <a href="{{ route('user.penjualan.exportPdf', $penjualan->id) }}" class="btn btn-primary">
            <i class="fas fa-download"></i> Unduh Struk
        </a>
    </div>

    <div class="container d-flex flex-column justify-content-center align-items-center mt-2">
        <div class="card shadow-sm w-100" style="max-width: 800px;">
            <div class="card-body">
                <h4 class="mb-4">Struk Penjualan</h4>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>No. HP :</strong>  {{ $penjualan->member->no_hp ?? '-' }}
                    </div>
                    <div class="col-md-6 text-end">
                        <strong>Tanggal Penjualan :</strong> {{ $penjualan->created_at->format('d F Y') }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Nama :</strong> {{ $penjualan->member->nama ?? '-' }}
                    </div>
                    <div class="col-md-6 text-end">
                        <strong>Invoice : </strong> #{{ $penjualan->id }}
                    </div>
                </div>

                <table class="table table-bordered text-center">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjualan->detail_penjualan as $detail)
                            <tr>
                                <td>{{ $detail->produk->nama_produk }}</td>
                                <td>Rp {{ number_format($detail->produk->harga, 0, ',', '.') }}</td>
                                <td>{{ $detail->jumlah }}</td>
                                <td>Rp {{ number_format($detail->jumlah * $detail->produk->harga, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="row text-center mt-4">
                    <div class="col-md-3 border-end">
                        <strong>Point Digunakan</strong><br>
                        {{ $penjualan->poin_digunakan ?? 0 }}
                    </div>
                    <div class="col-md-3 border-end">
                        <strong>Kasir</strong><br>
                        {{ $penjualan->user->name }}
                    </div>
                    <div class="col-md-3 border-end">
                        <strong>Kembalian</strong><br>
                        Rp {{ number_format($penjualan->kembalian, 0, ',', '.') }}
                    </div>
                    <div class="col-md-3">
                        <strong>Total</strong><br>
                        Rp {{ number_format($penjualan->total_harga, 0, ',', '.') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
