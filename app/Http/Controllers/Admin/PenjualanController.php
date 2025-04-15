<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PenjualanExportAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class PenjualanController extends Controller
{
    public function exportExcel()
    {
        return Excel::download(new PenjualanExportAdmin, 'penjualan.xlsx');
    }

    public function exportPdf($id)
    {
        $penjualan = Penjualan::with(['member', 'user', 'detail_penjualan.produk'])->findOrFail($id);

        $pdf = Pdf::loadView('pages.admin.penjualan.struk_pdf', compact('penjualan'));
        return $pdf->download('Struk_Penjualan_' . $penjualan->id . '.pdf');
    }
    public function index()
    {
        $penjualans = Penjualan::with([
            'member',
            'user',
            'detail_penjualan.produk'
        ])->latest()->get();

        return view('pages.admin.penjualan.index', compact('penjualans'));
    }
}
