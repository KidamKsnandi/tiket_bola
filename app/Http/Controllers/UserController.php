<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
    
    }

    public function create() {
        $role = Role::all();
    return view('user.create', compact('role'));

    }
    public function store(Request $request) {
    
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);  // Gunakan Hash::make untuk hashing password
        $user->role_id = $request->role;
        $user->save();

        return redirect('/user')->with('success', 'User created successfully!');
    }

    public function edit($id) {

    }
    public function update($id, Request $request_) {

    }
    public function destroy($id) {

    }
    


}
