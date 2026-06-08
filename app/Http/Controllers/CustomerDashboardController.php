<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Notifikasi;
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

            $latestActiveOrder = Pesanan::where('user_id', $userId)
            ->whereIn('status', ['pending', 'picked_up', 'washing', 'ironing', 'ready'])
            ->latest()
            ->first();

        // Mengirimkan semua variabel ke view bawaan Anda
        return view('customer.dashboard', compact(
            'totalPesanan', 
            'pesananAktif', 
            'pesananSelesai', 
            'totalPengeluaran', 
           'latestActiveOrder',
            'recentOrders'
            
        ));
    }
    public function getNotifications()
    {
        $userId = Auth::id();
        
        $notifications = Notifikasi::where('user_id', $userId)
            ->latest()
            ->take(5)
            ->get();

        $unreadCount = Notifikasi::where('user_id', $userId)
            ->where('is_read', false)
            ->count();

        return response()->json([
            'notifications' => $notifications,
            'unread_count' => $unreadCount
        ]);
    }

    // FUNGSI BARU: Menandai notifikasi tertentu sebagai 'sudah dibaca'
    public function markAsRead($id)
    {
        $notification = Notifikasi::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
            
        $notification->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }

}