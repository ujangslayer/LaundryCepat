<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $totalPesanan = Pesanan::where('user_id', $userId)->count();
        
        $pesananAktif = Pesanan::where('user_id', $userId)
            ->whereIn('status', ['pending', 'picked_up', 'washing', 'ironing', 'ready'])
            ->count();
            
        $pesananSelesai = Pesanan::where('user_id', $userId)
            ->where('status', 'completed')
            ->count();

        $totalPengeluaran = Pesanan::where('user_id', $userId)
            ->where('payment_status', 'paid')
            ->sum('total_harga');

        // 2. Mengambil 5 riwayat transaksi terakhir milik user ini
        $recentOrders = Pesanan::where('user_id', $userId)
            ->latest()
            ->take(5)
            ->get();

        // Mengirimkan semua variabel ke view bawaan Anda
        return view('customer.dashboard', compact(
            'totalPesanan', 
            'pesananAktif', 
            'pesananSelesai', 
            'totalPengeluaran', 
            'recentOrders'
        ));
    }
}