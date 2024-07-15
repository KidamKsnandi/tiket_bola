<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JadwalPertandingan;
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
    public function tiket()
    {
    }
    public function transaksi()
    {
    }
}
