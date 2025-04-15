<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Penjualan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: center; }
        .text-end { text-align: right; }
        .text-center { text-align: center; }
    </style>
</head>
<body>
    <h3 class="text-center">Struk Penjualan</h3>
    <p><strong>No. HP:</strong> {{ $penjualan->member->no_hp ?? '-' }}</p>
    <p><strong>Nama:</strong> {{ $penjualan->member->nama ?? '-' }}</p>
    <p><strong>Tanggal Penjualan:</strong> {{ $penjualan->created_at->format('d F Y') }}</p>
    <p><strong>Invoice:</strong> #{{ $penjualan->id }}</p>
    <table>
        <thead>
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
    <p><strong>Total:</strong> Rp {{ number_format($penjualan->total_harga, 0, ',', '.') }}</p>
    <p><strong>Kasir:</strong> {{ $penjualan->user->name }}</p>
    <p><strong>Kembalian:</strong> Rp {{ number_format($penjualan->kembalian, 0, ',', '.') }}</p>
</body>
</html>
