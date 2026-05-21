<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;

class TrackingController extends Controller
{
    // 1. Menampilkan Halaman Riwayat (Daftar semua pesanan user)
    public function index()
    {
        // Ambil semua pesanan milik user yang sedang login beserta detail layanannya
        $orders = Pesanan::with(['detail.layanan'])
                    ->where('user_id', Auth::id())
                    ->latest()
                    ->get();
                    
        // PASTIKAN ada ', compact('orders')' di bagian ini agar variabel dikirim ke view
        return view('customer.history', compact('orders'));
    }

    // 2. Menampilkan Halaman Tracking untuk SATU pesanan saja
    public function track($id)
    {
        $order = Pesanan::with(['detail.layanan'])
                    ->where('user_id', Auth::id())
                    ->findOrFail($id);
                    
        return view('customer.tracking', compact('order'));
    }
}