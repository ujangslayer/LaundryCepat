<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\User;
use Carbon\Carbon;

class DashboardAdminController extends Controller
{
    public function index()
    {
        // 1. Menghitung Pendapatan (Hanya pesanan yang tidak dibatalkan)
        $todayRevenue = Pesanan::whereDate('created_at', Carbon::today())
                               ->where('status', '!=', 'cancelled')
                               ->sum('total_harga');

        $monthRevenue = Pesanan::whereMonth('created_at', Carbon::now()->month)
                               ->whereYear('created_at', Carbon::now()->year)
                               ->where('status', '!=', 'cancelled')
                               ->sum('total_harga');

        // 2. Menghitung Pesanan Aktif (Belum selesai / belum batal)
        $activeOrders = Pesanan::whereNotIn('status', ['completed', 'cancelled'])->count();
        $pendingOrders = Pesanan::where('status', 'pending')->count();

        // 3. Menghitung Pelanggan
        $totalCustomers = User::where('role', 'customer')->count();
        $newCustomersToday = User::where('role', 'customer')
                                 ->whereDate('created_at', Carbon::today())
                                 ->count();

        // 4. Mengambil 5 Pesanan Terbaru untuk tabel
        $recentOrders = Pesanan::with(['user', 'detail.layanan'])
                               ->latest()
                               ->take(5)
                               ->get();

        // Kirim semua variabel ke tampilan (view) admin
        return view('admin.dashboard', compact(
            'todayRevenue', 
            'monthRevenue', 
            'activeOrders', 
            'pendingOrders', 
            'totalCustomers', 
            'newCustomersToday', 
            'recentOrders'
        ));
    }
}