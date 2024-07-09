<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\JadwalPertandingan;
use App\Models\Stadion;
use Illuminate\Http\Request;

class JadwalPertandinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwalPertandingan = JadwalPertandingan::all();
        return view("admin.jadwal_pertandingan.index", compact("jadwalPertandingan"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $club = Club::all();
        $stadion = Stadion::all();
        return view("admin.jadwal_pertandingan.create", compact("club", "stadion"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'club1' => 'required',
            'club2' => 'required',
            'keterangan' => 'required',
            'jadwal_tanding' => 'required',
            'stadion' => 'required',
        ]);

        $jadwalPertandingan = new JadwalPertandingan();
        $jadwalPertandingan->id_club_1 = $request->club1;
        $jadwalPertandingan->id_club_2 = $request->club2;
        $jadwalPertandingan->keterangan = $request->keterangan;
        $jadwalPertandingan->tanggal_tanding = $request->jadwal_tanding;
        $jadwalPertandingan->id_stadion = $request->stadion;
        $jadwalPertandingan->save();

        return redirect()->route('jadwal-pertandingan.index')->with('success', 'Jadwal Pertandingan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalPertandingan $jadwalPertandingan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jadwalPertandingan = JadwalPertandingan::find($id);
        $club = Club::all();
        $stadion = Stadion::all();
        return view("admin.jadwal_pertandingan.edit", compact("jadwalPertandingan", "club", "stadion"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'club1' => 'required',
            'club2' => 'required',
            'keterangan' => 'required',
            'jadwal_tanding' => 'required',
            'stadion' => 'required',
        ]);

        $jadwalPertandingan = JadwalPertandingan::findOrFail($id);
        $jadwalPertandingan->id_club_1 = $request->club1;
        $jadwalPertandingan->id_club_2 = $request->club2;
        $jadwalPertandingan->keterangan = $request->keterangan;
        $jadwalPertandingan->tanggal_tanding = $request->jadwal_tanding;
        $jadwalPertandingan->id_stadion = $request->stadion;
        $jadwalPertandingan->save();

        return redirect()->route('jadwal-pertandingan.index')->with('success', 'Jadwal Pertandingan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalPertandingan $jadwalPertandingan)
    {
        //
    }
}
