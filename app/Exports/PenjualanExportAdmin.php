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

        return Penjualan::with('user')

            ->get()

            ->map(function ($penjualan) {

                return [

                    'nama_pelanggan' => $penjualan->nama_pelanggan,

                    'tanggal_penjualan' => $penjualan->tanggal_penjualan,

                    'total_harga' => $penjualan->total_harga,

                    'dibuat_oleh' => $penjualan->user->name ?? '-',

                ];

            });

    }


    public function headings(): array

    {

        return ['Nama Pelanggan', 'Tanggal Penjualan', 'Total Harga', 'Dibuat Oleh'];

    }

}
