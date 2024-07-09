<?php

namespace App\Http\Controllers;

use App\Models\JadwalPertandingan;
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
    public function show(JadwalPertandingan $jadwalPertandingan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalPertandingan $jadwalPertandingan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalPertandingan $jadwalPertandingan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalPertandingan $jadwalPertandingan)
    {
        //
    }
}
