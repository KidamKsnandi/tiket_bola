<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Club;
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
    public function jadwal(Request $request)
    {
        if ($request->input('search-club')) {
            $query = $request->input('search-club');
            $jadwal = JadwalPertandingan::whereHas('club1', function ($q) use ($query) {
                $q->where('nama', 'LIKE', "%$query%");
            })
                ->orWhereHas('club2', function ($q) use ($query) {
                    $q->where('nama', 'LIKE', "%$query%");
                })
                ->get();
        } else {
            $jadwal = JadwalPertandingan::orderBy('created_at', 'asc')->get();
        }
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
