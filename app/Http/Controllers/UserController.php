<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $data = [
            "users" => $users
        ];

        return view('users.index', $data);
    }
}
