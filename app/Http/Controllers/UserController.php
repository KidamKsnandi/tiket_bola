<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update($id, request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',

        ]);

        $user = User::findOrFail($id);
        $userData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),

        ];

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->input('password'));
        }

        $user->update($userData);

        return redirect()->route('user.edit', $user->id)->with('success', 'User updated successfully.');
    }

    public function index()
    {
        $users = User::all();
        $data = [
            "users" => $users
        ];

        return view('users.index', $data);
    }

    public function create()
    {
        $role = Role::all();
        return view('user.create', compact('role'));
    }
    public function store(Request $request)
    {

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
}
