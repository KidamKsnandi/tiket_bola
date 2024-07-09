<?php

namespace App\Http\Controllers;

use App\Models\JadwalPertandingan;
use App\Models\Tiket;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_jadwal)
    {
        $tiket = Tiket::all();
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

        $tiket = new Tiket();
        $tiket->id_jadwal_pertandingan = $id_jadwal;
        $tiket->nama_tiket = $request->nama_tiket;
        $tiket->tribun = $request->tribun;
        $tiket->kuota = $request->kuota;
        $tiket->harga = $request->harga;
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
    public function edit(Tiket $tiket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tiket $tiket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tiket $tiket)
    {
        //
    }
}
