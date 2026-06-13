<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function callback(Request $request)
    {
        // 1. Inisialisasi Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        try {
            // 2. Tangkap notifikasi menggunakan library resmi
            $notif = new Notification();
            
            $transaction = $notif->transaction_status;
            $orderId = $notif->order_id;

            // 🔥 FIX JIKA TOMBOL 'TEST' MIDTRANS DIKLIK:
            // Jika order_id mengandung kata 'test-notification', langsung jawab 200 OK tanpa cek DB
            if (str_contains($orderId, 'test-notification')) {
                Log::info('Dashboard Midtrans sedang melakukan tes ping. Koneksi aman!');
                return response()->json(['message' => 'Test Notification Success'], 200);
            }

            // 3. Cari pesanan asli di database
            $order = Pesanan::where('order_number', $orderId)->first();
            
            // 🔥 FIX JIKA PESANAN TIDAK ADA:
            // Tetap jawab 200 OK agar Midtrans tidak mengirim ulang terus-menerus
            if (!$order) {
                Log::warning('Midtrans mengirim callback untuk order ' . $orderId . ', tapi tidak ada di database.');
                return response()->json(['message' => 'Callback diterima, tetapi data tidak ditemukan'], 200);
            }

            // 4. Jika pesanan ditemukan, proses perubahan statusnya
            if ($transaction == 'settlement' || $transaction == 'capture') {
                
                $order->update(['payment_status' => 'paid']);
                Log::info('Pesanan ' . $order->order_number . ' otomatis LUNAS via Midtrans Webhook.');
                
            } elseif ($transaction == 'expire' || $transaction == 'cancel') {
                
                $order->update(['payment_status' => 'failed']);
                Log::info('Pesanan ' . $order->order_number . ' dinyatakan GAGAL/EXPIRED.');
                
            }

            return response()->json(['message' => 'Callback berhasil diproses'], 200);

        } catch (\Exception $e) {
            // Jika ada error fatal di sistem, catat di log Railway Anda
            Log::error('Midtrans Callback Error: ' . $e->getMessage());
            return response()->json(['message' => 'Terjadi gangguan internal server'], 200);
        }
    }
}