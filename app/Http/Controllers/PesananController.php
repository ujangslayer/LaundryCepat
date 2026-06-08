<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Barryvdh\DomPDF\Facade\Pdf;
class PesananController extends Controller
{
    // 1. Menampilkan daftar semua pesanan (Read List)
public function index(Request $request)
    {
        // Mulai query dengan memanggil relasi 'user'
        $query = Pesanan::with('user');

        // Logika Filter Status
        if ($request->filled('status') && $request->status !== 'all') {
            if ($request->status === 'process') {
                // Jika pilih 'Proses', tampilkan pesanan yang sedang berjalan
                $query->whereIn('status', ['picked_up', 'washing', 'ironing', 'ready']);
            } else {
                $query->where('status', $request->status); // pending, completed, cancelled
            }
        }

        // Logika Pencarian (Nomor Order ATAU Nama Pelanggan)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('order_number', 'LIKE', "%{$search}%")
                  ->orWhereHas('user', function($userQuery) use ($search) {
                      // Mencari di tabel users berdasarkan relasi
                      $userQuery->where('name', 'LIKE', "%{$search}%");
                  });
            });
        }

        // Eksekusi query
        $orders = $query->latest()->get();
        
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

        $statusTitles = [
            'picked_up' => 'Pakaian Telah Dijemput 🚚',
            'washing'   => 'Pakaian Sedang Dicuci 🧼',
            'ironing'   => 'Pakaian Sedang Disetrika ✨',
            'ready'     => 'Cucian Siap Diantar/Diambil 📦',
            'completed' => 'Transaksi Laundry Selesai 🎉',
            'cancelled' => 'Pesanan Dibatalkan ❌',
        ];

        $statusMessages = [
            'picked_up' => "Pesanan #{$order->order_number} telah diambil oleh kurir kami.",
            'washing'   => "Pakaian Anda pada pesanan #{$order->order_number} sekarang masuk dalam proses pencucian.",
            'ironing'   => "Proses cuci selesai! Pakaian Anda pada pesanan #{$order->order_number} sedang disetrika rapi.",
            'ready'     => "Kabar gembira! Cucian Anda pada pesanan #{$order->order_number} sudah bersih dan siap diambil/diantarkan.",
            'completed' => "Terima kasih telah memercayakan pakaian Anda di toko kami pada pesanan #{$order->order_number}.",
            'cancelled' => "Mohon maaf, pesanan #{$order->order_number} Anda telah dibatalkan.",
        ];

        // Jika status yang diubah membutuhkan notifikasi ke user
        if (array_key_exists($request->status, $statusTitles)) {
            \App\Models\Notifikasi::create([
                'user_id' => $order->user_id,
                'pesanan_id' => $order->id,
                'judul' => $statusTitles[$request->status],
                'pesan' => $statusMessages[$request->status],
                'is_read' => false
            ]);
        }
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

        $pesanStatus = $request->payment_status === 'paid' ? 'Telah Dibayar' : 'Belum Dibayar';

        return redirect()->back()->with('success', 'Status pembayaran untuk pesanan #' . $order->order_number . ' berhasil diperbarui menjadi: ' . $pesanStatus);
    }
public function exportCsv(Request $request)
    {
        $query = Pesanan::with('user');

        // --- Logika filter yang SAMA PERSIS dengan index ---
        if ($request->filled('status') && $request->status !== 'all') {
            if ($request->status === 'process') {
                $query->whereIn('status', ['picked_up', 'washing', 'ironing', 'ready']);
            } else {
                $query->where('status', $request->status);
            }
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('order_number', 'LIKE', "%{$search}%")
                  ->orWhereHas('user', function($userQuery) use ($search) {
                      $userQuery->where('name', 'LIKE', "%{$search}%");
                  });
            });
        }
        // --- Akhir logika filter ---

        $orders = $query->latest()->get();
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
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF)); // BOM UTF-8
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