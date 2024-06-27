<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Periksa apakah pengguna memiliki peran admin
        if (Auth::user()->role_id == 1) {
            return redirect()->route('admin.dashboard');
        }

        // Jika bukan admin, arahkan ke halaman home biasa
        return view('home');
    }
}
