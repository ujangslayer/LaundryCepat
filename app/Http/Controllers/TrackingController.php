<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
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
    // Tambahkan method ini di dalam TrackingController
    public function cancel($id)
    {
        // Cari pesanan berdasarkan ID dan pastikan itu milik user yang sedang login
        $order = Pesanan::where('user_id', Auth::id())->findOrFail($id);

        // Validasi: Hanya bisa dibatalkan jika statusnya pending atau picked_up
        if (!in_array($order->status, ['pending', 'picked_up'])) {
            return back()->with('error', 'Maaf, pesanan sudah diproses dan tidak dapat dibatalkan.');
        }

        // Ubah status menjadi cancelled
        $order->status = 'cancelled';
        $order->save();

        // (Opsional) Jika kamu pakai Midtrans dan ingin membatalkan tagihannya juga di Midtrans
        // bisa tambahkan logika API cancel Midtrans di sini.

        return back()->with('success', 'Pesanan Anda berhasil dibatalkan.');
    }
    // 4. Mencetak Struk Pesanan Customer
    public function printReceipt($id)
    {
        // Cari pesanan dan pastikan itu milik customer yang login
        $order = Pesanan::with(['detail.layanan', 'user'])
                    ->where('user_id', Auth::id())
                    ->findOrFail($id);

        // Panggil file view struk. 
        // Sesuaikan 'admin.orders.print' dengan lokasi file struk kamu saat ini.
        // Jika file struknya bernama print.blade.php di dalam folder views/admin, gunakan 'admin.print'
        $pdf = Pdf::loadView('admin.orders.receipt', compact('order'));
        
        // Ukuran kertas nota kasir (A5 Portrait cocok untuk struk laundry)
        $pdf->setPaper('A5', 'portrait');
        
        return $pdf->stream('Struk_Laundry_' . $order->order_number . '.pdf');
    }
}