<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Penjualan extends Model

{

    use HasFactory;


    protected $table = 'penjualan';


    protected $fillable = [

        'nama_pelanggan',

        'user_id',

        'member_id',

        'tanggal_penjualan',

        'total_harga',

        'uang_diberikan',

        'kembalian',

        'poin_digunakan'

    ];


    public function user()

    {

        return $this->belongsTo(User::class);

    }


    public function member()

    {

        return $this->belongsTo(Member::class, 'member_id');

    }


    public function detail_penjualan()

    {

        return $this->hasMany(DetailPenjualan::class);

    }

}


