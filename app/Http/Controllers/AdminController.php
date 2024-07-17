<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Club;
use App\Models\JadwalPertandingan;
use App\Models\Stadion;
use App\Models\Tiket;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $jumlah = [
            "user" => User::where('role_id', 1)->count(),
            "admin" => User::where('role_id', 2)->count(),
            "banner" => Banner::count(),
            "stadion" => Stadion::count(),
            "club" => Club::count(),
            "jadwal" => JadwalPertandingan::count(),
            "tiket" => Tiket::count(),
            "transaksi" => Transaksi::count(),
        ];

        return view('admin.dashboard', compact('jumlah'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'You have been logged out!');
    }
}
