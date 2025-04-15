<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Produk;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function create(Request $request)
    {
        // dd($request->all(), session()->all());
        return view('pages.user.member.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_hp' => 'required|numeric',
            'nama' => 'required|string',
            'tanggal_bergabung' => 'required|date',
        ]);

        $member = Member::create([
            'no_hp' => $request->no_hp,
            'nama' => $request->nama,
            'tanggal_bergabung' => $request->tanggal_bergabung,
        ]);

        $redirectUrl = $request->input('redirect_url', route('user.member.index'));

        return redirect($redirectUrl)->with('success', 'Member berhasil ditambahkan.');
    }
}
