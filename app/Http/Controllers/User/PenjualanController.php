<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Member;
use App\Models\DetailPenjualan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Exports\PenjualanExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class PenjualanController extends Controller
{
    public function exportExcel()
    {
        return Excel::download(new PenjualanExport, 'penjualan.xlsx');
    }

    public function exportPdf($id)
    {
        $penjualan = Penjualan::with(['member', 'user', 'detail_penjualan.produk'])->findOrFail($id);

        $pdf = Pdf::loadView('pages.user.penjualan.struk_pdf', compact('penjualan'));
        return $pdf->download('Struk_Penjualan_' . $penjualan->id . '.pdf');
    }

    public function index()
    {
        $penjualans = Penjualan::with([
            'member',
            'user',
            'detail_penjualan.produk'
        ])->latest()->get();
        return view('pages.user.penjualan.index', compact('penjualans'));
    }

    public function pilihProduk()
    {
        $produks = Produk::all();
        return view('pages.user.penjualan.pilihProduk', compact('produks'));
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

    public function simpanMember(Request $request)
    {
        $validated = $request->validate([
            'produk_id' => 'required|array',
            'qty' => 'required|array',
            'dibayar' => 'required|numeric|min:0',
            'member_id' => 'required|exists:members,id',
            'gunakan_poin' => 'nullable|boolean',
        ]);

        $member = Member::find($validated['member_id']);

        $total_harga = 0;
        $items = [];

        foreach ($validated['produk_id'] as $i => $id_produk) {
            $produk = Produk::find($id_produk);
            $jumlah = (int)$validated['qty'][$i];

            if (!$produk) {
                return back()->withErrors(['produk_id' => "Produk dengan ID $id_produk tidak ditemukan."]);
            }

            if ($produk->stok < $jumlah) {
                return back()->withErrors(['produk_id' => "Stok produk '{$produk->nama}' tidak mencukupi."]);
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

        $poin = floor($total_harga * 0.01);

        if ($request->boolean('gunakan_poin')) {
            $total_harga -= $poin;
            if ($total_harga < 0) {
                $total_harga = 0;
            }
        }

        if ($validated['dibayar'] < $total_harga) {
            return back()->withErrors(['dibayar' => 'Uang yang dibayar tidak mencukupi total harga.']);
        }

        $penjualan = Penjualan::create([
            'nama_pelanggan' => $member->nama,
            'user_id' => Auth::guard('user')->id(),
            'member_id' => $member->id,
            'tanggal_penjualan' => now(),
            'total_harga' => $total_harga,
            'uang_diberikan' => $validated['dibayar'],
            'kembalian' => $validated['dibayar'] - $total_harga,
            'poin_digunakan' => $request->boolean('gunakan_poin') ? $poin : 0,
        ]);

        foreach ($items as $item) {
            DetailPenjualan::create(array_merge($item, ['penjualan_id' => $penjualan->id]));
            $produk = Produk::find($item['produk_id']);
            $produk->decrement('stok', $item['jumlah']);
        }

        // Tambahkan poin ke member jika tidak sedang menggunakan poin
        if (!$request->boolean('gunakan_poin')) {
            $member->increment('poin', $poin);
        }

        return redirect()->route('user.penjualan.detailPrint', ['penjualanId' => $penjualan->id])
            ->with('success', 'Data penjualan berhasil disimpan untuk member.');
    }


    public function storeDataMember(Request $request)
    {
        $produk_terpilih = session('penjualan_data', []);
        if (empty($produk_terpilih)) {
            return redirect()->back()->with('error', 'Tidak ada produk yang dipilih.');
        }

        $total_harga = array_sum(array_column($produk_terpilih, 'subtotal'));

        $poin_digunakan = $request->has('gunakan_poin') ? floor($total_harga * 0.01) : 0;

        $validated = $request->validate([
            'dibayar' => 'required|numeric|min:0',
            'status_pelanggan' => 'required|in:member,non member',
            'no_hp' => 'nullable|numeric|',
        ]);

        $total_harga -= $poin_digunakan;

        $sessionData = [
            'produk_terpilih' => $produk_terpilih,
            'total_harga' => $total_harga,
            'dibayar' => $validated['dibayar'],
            'status_pelanggan' => $validated['status_pelanggan'],
            'gunakan_poin' => $request->has('gunakan_poin'),
        ];

        if ($validated['status_pelanggan'] === 'member') {
            $member = Member::where('no_hp', $validated['no_hp'])->first();
            if ($member) {
                $sessionData['member_id'] = $member->id;
                $sessionData['no_hp'] = $member->no_hp;
            } else {
                return redirect()->route('user.member.create')->with('error', 'Member tidak ditemukan.');
            }
        }

        if ($request->dibayar < $total_harga) {
            return back()->with('error', 'Uang dibayar tidak mencukupi total harga.');
        }

        session()->put('data_member', $sessionData);

        return redirect()->route('user.penjualan.dataMember');
    }


    public function dataMember()
    {

        $data = session('data_member');
        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan. Silakan ulangi proses.');
        }

        $data['total_harga'] = $data['total_harga'];
        $data['dibayar'] = $data['dibayar'];
        $data['poin'] = floor($data['total_harga'] * 0.01);

        if (isset($data['no_hp']) && $data['status_pelanggan'] === 'member') {
            $member = Member::where('no_hp', $data['no_hp'])->first();
            if ($member) {
                $data['nama_member'] = $member->nama;
                $data['member_id'] = $member->id;

                $jumlahPembelian = $member->penjualan()->count();
                $data['poin_disabled'] = $jumlahPembelian < 1;
            } else {
                $data['nama_member'] = null;
                $data['member_id'] = null;
                $data['poin_disabled'] = true;
            }
        } else {
            $data['nama_member'] = null;
            $data['member_id'] = null;
            $data['poin_disabled'] = true;
        }

        return view('pages.user.penjualan.dataMember', $data);
    }

    public function detailPrint($penjualanId)
    {
        $penjualan = Penjualan::with([
            'detail_penjualan.produk',
            'member',
            'user'
        ])->find($penjualanId);

        return view('pages.user.penjualan.detailPrint', compact('penjualan'));
    }
}
