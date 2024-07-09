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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        return view("admin.stadions.index", compact("stadion"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $stadion = Stadion::findOrFail($id);
        $stadion->nama = $request->nama;
        $stadion->alamat = $request->alamat;
        $stadion->save();

        return redirect()->route('stadion.index')->with('success', 'Stadion updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
