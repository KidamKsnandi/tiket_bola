<?php

namespace App\Http\Controllers;

use App\Models\stadion;
use Illuminate\Http\Request;

class StadionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stadions = Stadion::all();
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
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $stadion = new stadion();
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
