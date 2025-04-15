<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Member;
use App\Models\DetailPenjualan;
use Illuminate\Support\Facades\Auth;
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

    public function simpanNonMember(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|array',
            'qty' => 'required|array',
            'dibayar' => 'required|numeric|min:0',
        ]);

        $total_harga = 0;
        $items = [];

        foreach ($request->produk_id as $i => $id_produk) {
            $produk = Produk::find($id_produk);
            $jumlah = (int) $request->qty[$i];

            if (!$produk) {
                return back()->with('error', "Produk dengan ID $id_produk tidak ditemukan.");
            }

            if ($produk->stok < $jumlah) {
                return back()->with('error', "Stok produk '{$produk->nama}' tidak mencukupi.");
            }

            $subtotal = $produk->harga * $jumlah;
            $total_harga += $subtotal;

            $items[] = [
                'produk_id' => $produk->id,
                'jumlah' => $jumlah,
                'harga_satuan' => $produk->harga,
                'sub_total' => $subtotal,
            ];
        }

        if ($request->dibayar < $total_harga) {
            return back()->with('error', 'Uang dibayar tidak mencukupi total harga.');
        }

        $penjualan = Penjualan::create([
            'nama_pelanggan' => 'Non Member',
            'user_id' => Auth::guard('user')->id(),
            'tanggal_penjualan' => now(),
            'total_harga' => $total_harga,
            'uang_diberikan' => $request->dibayar,
            'kembalian' => $request->dibayar - $total_harga,
            'poin_digunakan' => 0,
        ]);

        foreach ($items as $item) {
            DetailPenjualan::create(array_merge($item, ['penjualan_id' => $penjualan->id]));

            $produk = Produk::find($item['produk_id']);
            $produk->decrement('stok', $item['jumlah']);
        }

        return redirect()->route('user.penjualan.index', ['penjualanId' => $penjualan->id])
            ->with('success', 'Data penjualan berhasil disimpan untuk member.');
    }



}
