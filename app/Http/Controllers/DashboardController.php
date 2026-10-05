<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            // Admin: Ambil semua data pembayaran beserta nama penggunanya
            $payments = Payment::with('user')->orderBy('tenggat_pembayaran', 'asc')->get();
        } else {
            // Pengguna: Hanya ambil data pembayaran miliknya sendiri
            $payments = Payment::where('user_id', $user->id)
                               ->orderBy('tenggat_pembayaran', 'asc')
                               ->get();
        }

        return view('dashboard', compact('payments'));
    }
}