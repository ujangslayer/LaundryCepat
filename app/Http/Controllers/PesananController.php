<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Barryvdh\DomPDF\Facade\Pdf;
class PesananController extends Controller
{
    // 1. Menampilkan daftar semua pesanan (Read List)
    public function index()
    {
        // Mengambil semua pesanan beserta data User (pelanggan), diurutkan dari yang terbaru
        $orders = Pesanan::with('user')->latest()->get();
        
        return view('admin.orders.index', compact('orders'));
    }

    // 2. Menampilkan detail dari satu pesanan spesifik (Read Detail)
    public function show($id)
    {
        // Mengambil pesanan beserta data User, dan Detail Pesanan yang di dalamnya ada data Layanan
        $order = Pesanan::with(['user', 'detail.layanan'])->findOrFail($id);
        
        return view('admin.orders.show', compact('order'));
    }

    // 3. Mengubah status pesanan (Update Status)
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,picked_up,washing,ironing,ready,completed,cancelled'
        ]);

        $order = Pesanan::findOrFail($id);
        $order->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui menjadi: ' . strtoupper($request->status));
    }

    // 4. BARU: Verifikasi Pembayaran (Mengubah dari Unpaid ke Paid)
    public function updatePaymentStatus(Request $request, $id)
    {
        $request->validate([
            'payment_status' => 'required|in:unpaid,paid'
        ]);

        $order = Pesanan::findOrFail($id);
        $order->update(['payment_status' => $request->payment_status]);

        $pesanStatus = $request->payment_status === 'paid' ? 'LUNAS' : 'BELUM BAYAR';

        return redirect()->back()->with('success', 'Status pembayaran untuk pesanan #' . $order->order_number . ' berhasil diperbarui menjadi: ' . $pesanStatus);
    }
    public function exportCsv()
    {
        $orders = Pesanan::with('user')->latest()->get();
        $filename = "laporan_pesanan_laundry_" . date('Y-m-d') . ".csv";
        
        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['Order Number', 'Nama Pelanggan', 'Status Pesanan', 'Status Pembayaran', 'Total Harga (Rp)', 'Tanggal Dibuat'];

        $callback = function() use($orders, $columns) {
            $file = fopen('php://output', 'w');
            
            // Tambahkan BOM agar Excel membaca karakter UTF-8 / Rupiah dengan benar tanpa berantakan
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            
            fputcsv($file, $columns);

            foreach ($orders as $order) {
                fputcsv($file, [
                    $order->order_number,
                    $order->user->name ?? 'Pelanggan',
                    strtoupper($order->status),
                    strtoupper($order->payment_status),
                    $order->total_harga,
                    $order->created_at->format('Y-m-d H:i')
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    // 6. BARU (Gelombang 2): Cetak Struk PDF
    public function printReceipt($id)
    {
        $order = Pesanan::with(['user', 'detail.layanan'])->findOrFail($id);
        
        // Memuat file view receipt.blade.php khusus cetak nota
        $pdf = Pdf::loadView('admin.orders.receipt', compact('order'));
        
        // Ukuran kertas nota kasir (A5 Portrait cocok untuk struk laundry)
        $pdf->setPaper('A5', 'portrait');
        
        return $pdf->stream('Struk_Laundry_' . $order->order_number . '.pdf');
    }

}