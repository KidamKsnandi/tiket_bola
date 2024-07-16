<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Club;
use App\Models\JadwalPertandingan;
use App\Models\Tiket;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function transaksi($slug)
    {
        $bank = Bank::all();
        $tiket = Tiket::where('slug', $slug)->first();
        return view('user.transaksi.checkout', compact('bank', 'tiket'));
    }

    public function checkout(Request $request, $slug)
    {
        $tiket = Tiket::where('slug', $slug)->first();
        $transaksi = new Transaksi();
        $transaksi->id_user = Auth::user()->id;
        $transaksi->id_tiket = $tiket->id;
        $transaksi->id_bank = $request->bank;
        $transaksi->nama = $request->nama;
        $transaksi->email = $request->email;
        $transaksi->no_hp = $request->no_hp;
        $transaksi->alamat = $request->alamat;
        $transaksi->jumlah = $request->jumlah_tiket;
        $transaksi->kode_unik = $request->kode_unik;
        $transaksi->total_bayar = $request->nominal;
        $transaksi->status = 1; // 1 = Pending, 2 = Diproses, 3 = Berhasil, 4 = Ditolak
        $transaksi->tanggal_transaksi = now()->timezone('Asia/Jakarta')->format('Y-m-d');
        $transaksi->countdown_date = now()->addHour()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s');
        $transaksi->save();

        $transaksiE = Transaksi::find($transaksi->id);
        $transaksiE->no_invoice = "INV-" . now()->timezone('Asia/Jakarta')->format('Ymd') . $transaksi->id . $tiket->id . $request->bank;
        $transaksiE->save();

        return redirect("/user/invoice/" . $transaksiE->no_invoice);
    }
}
