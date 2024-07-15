<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JadwalPertandingan;
use App\Models\Tiket;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function welcome()
    {
        $jadwal = JadwalPertandingan::orderBy('created_at', 'asc')->take(4)->get();
        return view("welcome", compact("jadwal"));
    }
    public function jadwal()
    {
        $jadwal = JadwalPertandingan::orderBy('created_at', 'asc')->get();
        return view("user.jadwal", compact("jadwal"));
    }
    public function tiket($slug_jadwal)
    {
        $jadwal = JadwalPertandingan::where("slug", $slug_jadwal)->first();
        $tiket = Tiket::where("id_jadwal_pertandingan", $jadwal->id)->get();
        return view('user.tiket', compact('jadwal', 'tiket'));
    }
    public function transaksi()
    {
    }
}
