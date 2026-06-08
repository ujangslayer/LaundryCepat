<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Log;

class MidtransController extends Controller
{
    public function callback(Request $request)
    {
        // 1. Ambil Server Key dari config
        $serverKey = config('midtrans.server_key');
        
        // 2. Buat rumus keamanan (Signature Key) untuk memverifikasi bahwa 
        // sinyal ini BENAR-BENAR datang dari Midtrans, bukan dari hacker.
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        // 3. Cocokkan signature key-nya
        if ($hashed == $request->signature_key) {
            
            // 4. Jika cocok, cari pesanan berdasarkan nomor order
            $order = Pesanan::where('order_number', $request->order_id)->first();
            
            if ($order) {
                // 5. Cek status transaksinya
                // 'settlement' = Lunas (untuk QRIS/Transfer), 'capture' = Lunas (untuk Kartu Kredit)
                if ($request->transaction_status == 'settlement' || $request->transaction_status == 'capture') {
                    
                    // Ubah status pembayaran di database menjadi 'paid' (Lunas)
                    $order->update(['payment_status' => 'paid']);
                    
                    Log::info('Pesanan ' . $order->order_number . ' otomatis LUNAS via Midtrans.');
                } 
                elseif ($request->transaction_status == 'expire' || $request->transaction_status == 'cancel') {
                    // Opsional: Jika dibatalkan / kedaluwarsa
                    $order->update(['payment_status' => 'failed']);
                }
            }
        } else {
            Log::warning('Ada percobaan callback palsu yang tidak lolos verifikasi keamanan!');
        }

        // Midtrans hanya butuh balasan "200 OK" dari kita
        return response()->json(['message' => 'Callback berhasil diproses']);
    }
}