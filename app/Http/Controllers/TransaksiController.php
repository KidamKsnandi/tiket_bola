<?php

namespace App\Http\Controllers;

use App\Mail\ApproveMail;
use App\Mail\NoApproveMail;
use App\Models\Tiket;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::orderBy('created_at', 'desc')->get();
        return view("admin.transaksi.index", compact("transaksi"));
    }

    public function konfirmasi(Request $request, $id)
    {
        $action = $request->input('action');

        $transaksi = Transaksi::find($id);
        if ($action == 'accept') {
            $transaksi->status = 3;
            $details = [
                'nama' => $transaksi->nama,
                'no_invoice' => $transaksi->no_invoice,
                'slug' => $transaksi->tiket->slug

            ];

            Mail::to($transaksi->email)->send(new ApproveMail($details));
            $transaksi->save();
            return redirect()->route('transaksi.index')->with('success', 'Transaksi Diterima!');
        } elseif ($action == 'reject') {
            $transaksi->status = 4;
            $transaksi->keterangan = $request->keterangan;
            $tiket = Tiket::find($transaksi->id_tiket);
            $tiket->kuota = $tiket->kuota + $transaksi->jumlah;
            $tiket->save();
            $details = [
                'nama' => $transaksi->nama,
                'no_invoice' => $transaksi->no_invoice,
                'keterangan' => $request->keterangan

            ];

            Mail::to($transaksi->email)->send(new NoApproveMail($details));
            $transaksi->save();
            return redirect()->route('transaksi.index')->with('success', 'Transaksi Ditolak!');
        }
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
