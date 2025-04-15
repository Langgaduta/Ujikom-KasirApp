<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;


class Member extends Model

{

    use HasFactory;


    protected $table = 'members';


    protected $fillable = [

        'nama',

        'no_hp',

        'poin',

        'tanggal_bergabung'

    ];



    public function penjualan()

    {

        return $this->hasMany(Penjualan::class, 'member_id');

    }

}



