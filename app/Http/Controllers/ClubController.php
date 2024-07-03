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
        $clubs = Club::all();
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
            'nama' => 'required|max:255',
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

        return redirect()->route('club.index')->with('status', 'Club created successfully!');
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
            'nama' => 'required|max:255',
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

        return redirect()->route('club.index')->with('status', 'Club updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Club $club)
    {
        $club->delete();
        return redirect()->route('club.index')->with('status', 'Club deleted successfully!');
    }
}
