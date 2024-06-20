<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
