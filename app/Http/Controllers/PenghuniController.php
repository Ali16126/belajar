<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PenghuniController extends Controller
{
    public function index()
    {
        // Ambil semua akun yang perannya 'pengguna' (bukan admin)
        $penghuni = User::where('role', 'pengguna')->get();
        return view('penghuni.index', compact('penghuni'));
    }
    public function edit($id)
    {
        $penghuni = User::findOrFail($id);
        return view('penghuni.edit', compact('penghuni'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$id,
        ]);

        $penghuni = User::findOrFail($id);
        $penghuni->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('penghuni.index')->with('success', 'Data penghuni berhasil diubah!');
    }
}
