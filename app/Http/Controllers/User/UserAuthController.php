<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Penjualan;
use Carbon\Carbon;
class UserAuthController extends Controller
{
    public function dashboard()
    {
        $penjualanHariIni = Penjualan::whereDate('tanggal_penjualan', Carbon::today())->count();
        return view('pages.user.dashboard.index');
    }

    public function showLoginForm()
    {
        if (auth()->guard('user')->check()) {
            return redirect()->route('user.dashboard.index');
        }
        return view('pages.user.login.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('user')->attempt($credentials)) {
            return redirect()->intended('/user/dashboard');
        }

        return back()->withErrors(['email' => 'Email or password is incorrect.']);
    }

    public function logout(Request $request)
    {
        Auth::guard('user')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/user/login');
    }

}
