<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminAuthController extends Controller

{

    public function showLoginForm()
    {
        if (auth()->guard('admin')->check()) {

            return redirect()->route('admin.dashboard.index');

        }
        return view('pages.admin.login.index');
    }


    public function login(Request $request)

    {

        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {

            return redirect()->intended('/admin/dashboard');

        }

        return back()->withErrors(['email' => 'Email or password is incorrect.']);

    }

    public function dashboard()

    {

        $salesData = DB::table('penjualan')
            ->selectRaw('DATE(tanggal_penjualan) as date, COUNT(*) as total_sales')
            ->where('tanggal_penjualan', '>=', now()->subDays(7)) // 7 hari terakhir
            ->groupByRaw('DATE(tanggal_penjualan)')
            ->orderBy('date', 'asc')
            ->get();


        // Siapkan data untuk chart

        $chartData = [

            'dates' => $salesData->pluck('date')->toArray(),
            'sales' => $salesData->pluck('total_sales')->toArray(),

        ];
        return view('pages.admin.dashboard.index', compact('chartData'));
    }


    public function logout(Request $request)

    {

        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');

    }
}
