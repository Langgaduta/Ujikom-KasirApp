<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DetailPenjualan extends Model

{
    use HasFactory;

    protected $table = 'detail_penjualan';

    protected $fillable = [

        'penjualan_id',
        'produk_id',
        'jumlah',
        'harga_satuan',
        'sub_total',

    ];


    public function penjualan()

    {

        return $this->belongsTo(Penjualan::class);

    }


    public function produk()

    {

        return $this->belongsTo(Produk::class);

    }

}

