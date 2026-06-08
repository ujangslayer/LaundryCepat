<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
// Import Library Midtrans di sini
use Midtrans\Config;
use Midtrans\Snap;
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

                    // --- INTEGRASI MIDTRANS START ---
        
        // Konfigurasi Kunci Akses Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        // Logika: Buat Snap Token HANYA JIKA belum lunas, menggunakan metode transfer, dan kolom snap_token masih kosong
        if (empty($order->snap_token) && $order->payment_status === 'unpaid' && $order->payment_method === 'transfer') {
            
            $params = [
                'transaction_details' => [
                    'order_id' => $order->order_number, // Menggunakan nomor nota unik
                    'gross_amount' => (int) $order->total_harga, // Total tagihan wajib integer
                ],
                'customer_details' => [
                    'first_name' => $order->user->name,
                    'email' => $order->user->email,
                    'phone' => $order->user->nomer_telepon ?? '081234567890',
                ],
            ];

            try {
                // Minta token transaksi ke server Midtrans
                $snapToken = Snap::getSnapToken($params);
                
                // Simpan token ke database agar tidak berubah-ubah saat halaman di-refresh
                $order->snap_token = $snapToken;
                $order->save();
            } catch (\Exception $e) {
                // Mencatat error ke log Laravel jika integrasi mengalami kendala
                Log::error('Midtrans Token Error di TrackingController: ' . $e->getMessage());
            }
        }

        // --- INTEGRASI MIDTRANS END ---
                    
        return view('customer.tracking', compact('order'));
    }
}