<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Produk extends Model

{

    protected $table = 'produk';


    protected $fillable = [

        'nama_produk',

        'foto_produk',

        'harga',

        'stok',

    ];

    use HasFactory;


    public function detail_penjualan()

    {

        return $this->hasMany(DetailPenjualan::class);

    }

}



