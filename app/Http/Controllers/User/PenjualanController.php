<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Member;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index(){
        $penjualans = Penjualan::with([
            'member',
            'user',
            'detail_penjualan.produk'
        ])->latest()->get();
        return view('pages.user.penjualan.index', compact('penjualans'));
    }

    public function pilihProduk(){
        $produks = Produk::all();
         return view('pages.user.penjualan.pilihProduk', compact ('produks'));
    }

    public function konfirmasiProduk(Request $request)
    {
        $id_produk = $request->input('produk_id', []);
        $jumlah_produk = $request->input('qty', []);
        $no_hp = $request->input('no_hp');
        $member = null;

        if ($request->input('status_pelanggan') === 'member' && $no_hp) {
            $member = Member::where('no_hp', $no_hp)->first();

            if (!$member) {
                session()->forget(['konfirmasi_produk', 'no_hp']);

                session([
                    'konfirmasi_produk' => [
                        'produk_id' => $id_produk,
                        'qty' => $jumlah_produk,
                    ],
                ]);

                return redirect()->route('user.member.create', ['no_hp' => $no_hp])
                    ->with('error', 'Nomor telepon tidak ditemukan sebagai member. Silakan tambahkan member.');
            }
        }

        $produk_terpilih = [];

        foreach ($id_produk as $i => $id) {
            $produk = Produk::find($id);
            $jumlah = (int) $jumlah_produk[$i];

            if ($produk && $jumlah > 0) {
                $produk_terpilih[] = [
                    'produk' => $produk,
                    'jumlah' => $jumlah,
                    'subtotal' => $produk->harga * $jumlah,
                ];
            }
        }

        session([
            'penjualan_data' => $produk_terpilih,
            'member_data' => $member,
        ]);

        $total_harga = array_sum(array_column($produk_terpilih, 'subtotal'));

        return view('pages.user.penjualan.konfirmasiProduk', compact('produk_terpilih', 'total_harga'));
    }


}
