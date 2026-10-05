<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;

class PaymentController extends Controller
{
    public function create()
    {
        // Ambil daftar penghuni untuk dipilih di dropdown
        $penghuni = User::where('role', 'pengguna')->get();
        return view('tagihan.create', compact('penghuni'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'jumlah_tagihan' => 'required|numeric|min:0',
            'tenggat_pembayaran' => 'required|date',
        ]);

        Payment::create([
            'user_id' => $request->user_id,
            'jumlah_tagihan' => $request->jumlah_tagihan,
            'tenggat_pembayaran' => $request->tenggat_pembayaran,
            'status_pembayaran' => 'belum_lunas',
        ]);

        return redirect()->route('dashboard')->with('success', 'Tagihan berhasil dibuat!');
    }
}

