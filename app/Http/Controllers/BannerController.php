<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::orderBy('created_at', 'desc')->get();
        return view("admin.banners.index", compact("banners"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.banners.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png',
            'deskripsi' => 'required',
        ]);

        $banner = new Banner();
        $banner->nama = $validatedData['nama'];
        if ($request->hasFile('gambar')) {
            $image = $request->gambar;
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/banners/', $name);
            $banner->gambar = $name;
        }
        $banner->deskripsi = $validatedData['deskripsi'];
        $banner->save();

        session()->put('success', 'Data Berhasil ditambahkan');

        return redirect()->route('banner.index')->with('success', 'Banner berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png',
            'deskripsi' => 'required',
        ]);

        $banner = Banner::find($banner->id);
        $banner->nama = $validatedData['nama'];
        if ($request->hasFile('gambar')) {
            $banner->deleteGambar();
            $image = $request->gambar;
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/banners/', $name);
            $banner->gambar = $name;
        }
        $banner->deskripsi = $validatedData['deskripsi'];
        $banner->save();

        return redirect()->route('banner.index')->with('success', 'Banner berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        $banner->deleteGambar();
        return redirect()->route('banner.index')->with('success', 'Banner berhasil dihapus!');
    }
}
