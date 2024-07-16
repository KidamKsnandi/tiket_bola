<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        return view("admin.transaksi.index", compact("transaksi"));
    }

    public function konfirmasi(Request $request, $id)
    {
        $action = $request->input('action');

        $transaksi = Transaksi::find($id);
        if ($action == 'accept') {
            $transaksi->status = 3;
        } elseif ($action == 'reject') {
            $transaksi->status = 4;
            $transaksi->keterangan = $request->keterangan;
        }

        $transaksi->save();
        return redirect()->route('transaksi.index');
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
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
