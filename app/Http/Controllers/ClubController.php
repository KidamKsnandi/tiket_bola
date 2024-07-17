<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clubs = Club::orderBy('created_at', 'desc')->get();
        return view('admin.clubs.index', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.clubs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255|unique:clubs',
            'logo' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $club = new Club();
        $club->nama = $validatedData['nama'];
        if ($request->hasFile('logo')) {
            $image = $request->logo;
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/clubs/', $name);
            $club->logo = $name;
        }
        $club->save();

        return redirect()->route('club.index')->with('success', 'Club berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Club $club)
    {
        return view('admin.clubs.show', compact('club'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Club $club)
    {
        return view('admin.clubs.edit', compact('club'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Club $club)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255|unique:clubs,nama,' . $club->id,
            'logo' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $club = Club::find($club->id);
        $club->nama = $validatedData['nama'];
        if ($request->hasFile('logo')) {
            $club->deleteLogo();
            $image = $request->logo;
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/clubs/', $name);
            $club->logo = $name;
        }
        $club->save();

        return redirect()->route('club.index')->with('success', 'Club berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Club $club)
    {
        if (Club::has('jadwal_pertandingan1')->find($club->id)) {
            return back()->withErrors(['error' => 'Club ini memiliki jadwal pertandingan.'])->withInput();
        }
        if (Club::has('jadwal_pertandingan2')->find($club->id)) {
            return back()->withErrors(['error' => 'Club ini memiliki jadwal pertandingan.'])->withInput();
        }

        $club->delete();
        return redirect()->route('club.index')->with('success', 'Club berhasil dihapus!');
    }
}
