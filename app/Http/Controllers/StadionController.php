<?php

namespace App\Http\Controllers;

use App\Models\Stadion;
use Illuminate\Http\Request;

class StadionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stadions = Stadion::orderBy('created_at', 'desc')->get();
        return view('admin.stadions.index', compact('stadions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.stadions.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:stadions',
            'alamat' => 'required',
        ]);

        $stadion = new Stadion();
        $stadion->nama = $request->nama;
        $stadion->alamat = $request->alamat;
        $stadion->save();

        return redirect()->route('stadion.index')->with('success', 'Stadion berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $stadion = Stadion::findOrfail($id);
        return view("admin.stadions.edit", compact("stadion"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:stadions,nama,' . $id,
            'alamat' => 'required',
        ]);

        $stadion = Stadion::findOrFail($id);
        $stadion->nama = $request->nama;
        $stadion->alamat = $request->alamat;
        $stadion->save();

        return redirect()->route('stadion.index')->with('success', 'Stadion berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        if (Stadion::has('jadwal_pertandingan')->find($id)) {
            return back()->withErrors(['error' => 'Stadion ini memiliki jadwal pertandingan.'])->withInput();
        }

        $stadion = Stadion::findOrfail($id);
        $stadion->delete();
        return redirect()->route('stadion.index')->with('success', 'Stadion berhasil dihapus!');
    }
}
