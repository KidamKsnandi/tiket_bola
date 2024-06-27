<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $data = [
            "users" => $users
        ];

        return view('admin.users.index', $data);
    }

    public function create()
    {
        $role = Role::all();
        return view('admin.users.create', compact('role'));
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

        return redirect('/admin/user-admin')->with('success', 'User created successfully!');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $data = [
            "user"  => $user
        ];

        return view('admin.users.edit', $data);
    }

    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->id,
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect('/user')->with('success', 'User created successfully!');
    }

    public function destroy($id)
    {
        $User = User::find($id);
        if (!$User) {
            return redirect()->back()->with(['Eror', 'Pengguna tidak dapat digunakan'],);
        }

        $User->delete();
        return redirect()->route('user-admin.index')->with(['Berhasil', 'Data berhasil dihapus']);
    }
}
