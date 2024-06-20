<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function destroy($id)
    {
        $User = User::find($id);
        if (!$User) {
            return redirect()->back()->with(['Eror', 'Pengguna tidak dapat digunakan'],);
        }

        $User->delete();
        return redirect()->route('user.index')->with(['Berhasil', 'Data berhasil dihapus']);
    }
}
