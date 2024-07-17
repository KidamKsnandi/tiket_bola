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
        $users = User::orderBy('created_at', 'desc')->get();
        $data = [
            "users" => $users
        ];

        return view('admin.users.index', $data);
    }

    public function create()
    {
        $role = Role::orderBy('created_at', 'desc')->get();
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

        return redirect('/admin/pengguna')->with('success', 'User berhasil ditambah!');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $role = Role::orderBy('created_at', 'desc')->get();
        $data = [
            "user"  => $user,
            "role"  => $role
        ];

        return view('admin.users.edit', $data);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|min:6',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role;
        $user->save();

        return redirect('/admin/pengguna')->with('success', 'User berhasil ditambah!');
    }

    public function destroy($id)
    {
        $User = User::find($id);

        if (User::has('transaksi')->find($id)) {
            return back()->withErrors(['error' => 'Pengguna ini memiliki transaksi.'])->withInput();
        }
        if (!$User) {
            return redirect()->back()->with(['error', 'Pengguna tidak dapat digunakan'],);
        }

        $User->delete();
        return redirect()->route('pengguna.index')->with('success', 'Data berhasil dihapus');
    }
}
