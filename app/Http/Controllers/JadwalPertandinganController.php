<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\JadwalPertandingan;
use App\Models\Stadion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JadwalPertandinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwalPertandingan = JadwalPertandingan::orderBy('created_at', 'desc')->get();
        return view("admin.jadwal_pertandingan.index", compact("jadwalPertandingan"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $club = Club::orderBy('created_at', 'desc')->get();
        $stadion = Stadion::orderBy('created_at', 'desc')->get();
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

        if ($request->club1 == $request->club2) {
            return back()->withErrors(['club1' => 'Club yang bertanding tidak boleh sama.'])->withInput();
        }

        $tanggalTanding = $request->jadwal_tanding;
        $tanggalSekarang = now();
        if ($tanggalTanding < $tanggalSekarang) {
            return back()->withErrors(['jadwal_tanding' => 'Tanggal tanding tidak boleh lebih kecil dari tanggal sekarang.'])->withInput();
        }

        $club1 = Club::find($request->club1);
        $club2 = Club::find($request->club2);
        $stadion = Stadion::find($request->stadion);

        $jadwalPertandingan = new JadwalPertandingan();
        $jadwalPertandingan->id_club_1 = $request->club1;
        $jadwalPertandingan->id_club_2 = $request->club2;
        $jadwalPertandingan->slug = Str::slug($club1->nama . "-vs-" . $club2->nama . " " . $request->keterangan . " " . $stadion->nama);
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
        $club = Club::orderBy('created_at', 'desc')->get();
        $stadion = Stadion::orderBy('created_at', 'desc')->get();
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

        if ($request->club1 == $request->club2) {
            return back()->withErrors(['club1' => 'Club yang bertanding tidak boleh sama.'])->withInput();
        }

        $tanggalTanding = $request->jadwal_tanding;
        $tanggalSekarang = now();
        if ($tanggalTanding < $tanggalSekarang) {
            return back()->withErrors(['jadwal_tanding' => 'Tanggal tanding tidak boleh lebih kecil dari tanggal sekarang.'])->withInput();
        }

        $club1 = Club::find($request->club1);
        $club2 = Club::find($request->club2);
        $stadion = Stadion::find($request->stadion);

        $jadwalPertandingan = JadwalPertandingan::findOrFail($id);
        $jadwalPertandingan->id_club_1 = $request->club1;
        $jadwalPertandingan->id_club_2 = $request->club2;
        $jadwalPertandingan->slug = Str::slug($club1->nama . "-vs-" . $club2->nama . " " . $request->keterangan . " " . $stadion->nama);
        $jadwalPertandingan->keterangan = $request->keterangan;
        $jadwalPertandingan->tanggal_tanding = $request->jadwal_tanding;
        $jadwalPertandingan->id_stadion = $request->stadion;
        $jadwalPertandingan->save();

        return redirect()->route('jadwal-pertandingan.index')->with('success', 'Jadwal Pertandingan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        if (JadwalPertandingan::has('tiket')->find($id)) {
            return back()->withErrors(['error' => 'Jadwal Pertandingan ini memiliki tiket.'])->withInput();
        }
        $jadwalPertandingan = JadwalPertandingan::findOrFail($id);
        $jadwalPertandingan->delete();
        return redirect()->route('jadwal-pertandingan.index')->with('success', 'Jadwal Pertandingan berhasil dihapus');
    }
}
