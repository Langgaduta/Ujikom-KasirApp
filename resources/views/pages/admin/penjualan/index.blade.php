@include('layout.app')
@include('layout.navbar-admin')

<div class="container">
    <div class="row">
        <div class="mt-5">
            <h3>Penjualan</h3>
            <table class="table table-striped mt-5 text-center">
        </div>
        <div class="row">
            <div class="col-md-12 text-end">
                <a href="{{ route('admin.penjualan.export') }}" class="btn btn-success mt-3">Export Excel</a>
            </div>
        </div>

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
            @foreach ($penjualans as $index => $penjualan)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $penjualan->nama_pelanggan }}</td>
                    <td>{{ $penjualan->tanggal_penjualan }}</td>
                    <td>Rp{{ number_format($penjualan->total_harga, 0, ',', '.') }}</td>
                    <td>{{ $penjualan->user->name }}</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                            data-bs-target="#lihatModal{{ $penjualan->id }}">
                            Lihat
                        </button>
                        <div class="modal fade" id="lihatModal{{ $penjualan->id }}" tabindex="-1"
                            aria-labelledby="lihatModalLabel{{ $penjualan->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="fs-5" id="lihatModalLabel{{ $penjualan->id }}">Detail Penjualan
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row mb-3">
                                                <div class="col-md-5">
                                                    <p><strong>Member Status:</strong>
                                                        {{ $penjualan->member_id ? 'Member' : 'Non Member' }}</p>
                                                    <p><strong>No. HP:</strong> {{ $penjualan->member?->no_hp ?? '-' }}
                                                    </p>
                                                    <p><strong>Poin Member:</strong>
                                                        {{ $penjualan->poin_digunakan > 0 ? '-' : ($penjualan->member ? $penjualan->member->poin : '-') }}
                                                    </p>

                                                </div>
                                                <div class="col-md-7">
                                                    <p><strong>Bergabung sejak:</strong>
                                                        {{ \Carbon\Carbon::parse($penjualan->member?->tanggal_bergabung)->translatedFormat('d F Y') ?? ($penjualan->member?->tanggal_bergabung?->format('d M Y') ?? '-') }}
                                                    </p>
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
                                                            @foreach ($penjualan->detail_penjualan as $item)
                                                                <tr>
                                                                    <td>{{ $item->produk->nama_produk }}</td>
                                                                    <td>{{ $item->jumlah }}</td>
                                                                    <td>Rp
                                                                        {{ number_format($item->harga_satuan, 0, ',', '.') }}
                                                                    </td>
                                                                    <td>Rp
                                                                        {{ number_format($item->sub_total, 0, ',', '.') }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12 text-end">
                                                    <p><strong>Total Harga:</strong> Rp
                                                        {{ number_format($penjualan->total_harga, 0, ',', '.') }}</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><strong>Dibuat pada:</strong>
                                                        {{ \Carbon\Carbon::parse($penjualan->tanggal_penjualan)->format('d M Y') }}
                                                    </p>
                                                    <p><strong>Oleh:</strong> {{ $penjualan->user->name }}</p>
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

                        <a href="{{ route('admin.penjualan.exportPdf', $penjualan->id) }}" class="btn btn-primary btn-sm">Unduh Bukti</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
        </table>
    </div>
</div>
