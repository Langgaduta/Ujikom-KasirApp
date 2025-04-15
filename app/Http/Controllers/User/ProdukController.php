<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
       $produks = Produk::all();
       return view('pages.user.produk.index', compact('produks'));
    }
}
