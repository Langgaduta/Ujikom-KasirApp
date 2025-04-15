<?php

namespace App\Exports;

use App\Models\Penjualan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PenjualanExportAdmin implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Penjualan::with(['user', 'detail_penjualan.produk'])
            ->get()
            ->flatMap(function ($penjualan) {
                return $penjualan->detail_penjualan->map(function ($detail) use ($penjualan) {
                    return [
                        'nama_pelanggan'     => $penjualan->nama_pelanggan,
                        'tanggal_penjualan'  => $penjualan->tanggal_penjualan,
                        'nama_produk'        => $detail->produk->nama_produk ?? 'Produk tidak ditemukan',
                        'jumlah'             => $detail->jumlah,
                        'harga_satuan'       => $detail->harga_satuan,
                        'subtotal'           => $detail->subtotal,
                        'total_harga'        => $penjualan->total_harga,
                        'dibuat_oleh'        => $penjualan->user->name ?? '-',
                    ];
                });
            });
    }

    public function headings(): array
    {
        return [
            'Nama Pelanggan',
            'Tanggal Penjualan',
            'Nama Produk',
            'Jumlah',
            'Harga Satuan',
            'Subtotal',
            'Total Harga',
            'Dibuat Oleh',
        ];
    }
}
