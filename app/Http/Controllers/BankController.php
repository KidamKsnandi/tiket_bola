<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banks = Bank::all();
        return view('admin.clubs.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'logo' => 'required|image|mimes:jpg,jpeg,png',
            'nama_bank' => 'required|max:255',
            'atas_nama' => 'required',
            'no_rekening' => 'required',
        ]);

        $bank = new Bank();
        $bank->nama_bank = $validatedData['nama_bank'];
        $bank->atas_nama = $validatedData['atas_nama'];
        $bank->no_rekening = $validatedData['no_rekening'];
        if ($request->hasFile('logo')) {
            $image = $request->logo;
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/banks/', $name);
            $bank->logo = $name;
        }
        $bank->save();

        return redirect()->route('bank.index')->with('status', 'Bank created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bank $bank)
    {
        return view('admin.banks.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bank $bank)
    {
        $validatedData = $request->validate([
            'logo' => 'nullable|image|mimes:jpg,jpeg,png',
            'nama_bank' => 'required|max:255',
            'atas_nama' => 'required',
            'no_rekening' => 'required',
        ]);

        $bank = Bank::find($bank->id);
        $bank->nama_bank = $validatedData['nama_bank'];
        $bank->atas_nama = $validatedData['atas_nama'];
        $bank->no_rekening = $validatedData['no_rekening'];
        if ($request->hasFile('logo')) {
            $bank->deleteLogo();
            $image = $request->logo;
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/banks/', $name);
            $bank->logo = $name;
        }
        $bank->save();

        return redirect()->route('bank.index')->with('status', 'Bank updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bank $bank)
    {
        //
    }
}
