<?php

namespace App\Http\Controllers;

use App\Models\JadwalPertandingan;
use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_jadwal)
    {
        $tiket = Tiket::where('id_jadwal_pertandingan', $id_jadwal)->orderBy('created_at', 'desc')->get();
        return view("admin.tikets.index", compact("tiket", "id_jadwal"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_jadwal)
    {
        $jadwal = JadwalPertandingan::find($id_jadwal);
        return view('admin.tikets.create', compact('jadwal', 'id_jadwal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id_jadwal)
    {
        $request->validate([
            'nama_tiket' => 'required',
            'tribun' => 'required',
            'kuota' => 'required',
            'harga' => 'required',
        ]);

        $jadwal = JadwalPertandingan::find($id_jadwal);

        $tiket = new Tiket();
        $tiket->id_jadwal_pertandingan = $id_jadwal;
        $tiket->nama_tiket = $request->nama_tiket;
        $tiket->tribun = $request->tribun;
        $tiket->kuota = $request->kuota;
        $tiket->harga = str_replace('.', '', $request->harga);
        $tiket->slug = Str::slug($request->nama_tiket . " " . $request->tribun . " " . $jadwal->slug);
        $tiket->save();

        return redirect()->route('tiket.index', $id_jadwal)->with('success', 'Tiket berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tiket $tiket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_jadwal, $id)
    {
        $jadwal = JadwalPertandingan::find($id_jadwal);
        $tiket = Tiket::find($id);
        return view("admin.tikets.edit", compact("tiket", "jadwal", "id_jadwal"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_jadwal, $id)
    {
        $request->validate([
            'nama_tiket' => 'required',
            'tribun' => 'required',
            'kuota' => 'required',
            'harga' => 'required',
        ]);

        $tiket = Tiket::find($id);
        $tiket->id_jadwal_pertandingan = $id_jadwal;
        $tiket->nama_tiket = $request->nama_tiket;
        $tiket->tribun = $request->tribun;
        $tiket->kuota = $request->kuota;
        $tiket->harga = str_replace('.', '', $request->harga);
        $tiket->save();

        return redirect()->route('tiket.index', $id_jadwal)->with('success', 'Tiket berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_jadwal, $id)
    {
        if (Tiket::has('transaksi')->find($id)) {
            return back()->withErrors(['error' => 'Tiket ini memiliki transaksi.'])->withInput();
        }
        $tiket = Tiket::find($id);
        $tiket->delete();
        return redirect()->route('tiket.index', $id_jadwal)->with('success', 'Tiket berhasil dihapus');
    }
}
