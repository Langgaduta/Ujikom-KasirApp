<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Produk;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('pages.admin.produk.index', compact('produks'));
    }

    public function create()
    {
        return view('pages.admin.produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'foto_produk' => 'nullable|image',
            'harga' => 'required',
            'stok' => 'required|integer',
        ]);

        $fotoPath = $request->file('foto_produk') ? $request->file('foto_produk')->store('produk', 'public') : null;

        $hargaBersih = preg_replace('/[^\d]/', '', $request->harga);

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'foto_produk' => $fotoPath,
            'harga' => $hargaBersih,
            'stok' => $request->stok,
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('pages.admin.produk.edit', compact('produk'));
    }

    public function editStok($id)
    {
        $produk = Produk::findOrFail($id);
        return view('pages.admin.produk.editStok', compact('produk'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'foto_produk' => 'nullable|image',
            'harga' => 'required',
            'stok' => 'required|integer',
        ]);

        $produk = Produk::findOrFail($id);
        $hargaBersih = preg_replace('/[^0-9]/', '', $request->harga);

        if ($request->hasFile('foto_produk')) {
            if ($produk->foto_produk) {
                Storage::disk('public')->delete($produk->foto_produk);
            }
            $fotoPath = $request->file('foto_produk')->store('produk', 'public');
        } else {
            $fotoPath = $produk->foto_produk;
        }

        $produk->update([
            'nama_produk' => $request->nama_produk,
            'foto_produk' => $fotoPath,
            'harga' => $hargaBersih,
            'stok' => $request->stok,
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function updateStok(Request $request, $id)
    {
        $request->validate([
            'stok' => 'required|integer',
        ]);

        $produk = Produk::findOrFail($id);

        $produk->update([
            'stok' => $request->stok,
        ]);
        return redirect()->route('admin.produk.index')->with('success', 'Stok berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->foto_produk) {
            Storage::disk('public')->delete($produk->foto_produk);
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus.');
    }

}
