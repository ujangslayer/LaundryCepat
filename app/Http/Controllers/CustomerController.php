<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    // Fungsi untuk menampilkan daftar pelanggan
    public function index(Request $request)
    {
        // Mulai query, pastikan role 'customer' dan hitung relasi pesanan
        $query = User::where('role', 'customer')->withCount('pesanan');

        // 1. Logika Pencarian (Search)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('nomer_telepon', 'LIKE', "%{$search}%");
            });
        }

        // 2. Logika Pengurutan (Filter/Sort)
        if ($request->filled('sort')) {
            if ($request->sort === 'oldest') {
                $query->oldest(); // Sama dengan orderBy('created_at', 'asc')
            } elseif ($request->sort === 'most_orders') {
                // 'pesanan_count' otomatis dibuat oleh withCount('pesanan')
                $query->orderBy('pesanan_count', 'desc'); 
            } else {
                $query->latest(); // Default: Terbaru
            }
        } else {
            $query->latest(); // Default jika tidak ada filter yang dipilih
        }

        // Eksekusi query
        $customers = $query->get();
        
        return view('admin.customer.index', compact('customers'));
    }
    public function exportCsv(Request $request)
{
    // 1. Ambil data dengan query & filter yang sama seperti halaman index
    $query = User::where('role', 'customer')->withCount('pesanan');

    // Logika Pencarian
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('name', 'LIKE', "%{$search}%")
              ->orWhere('email', 'LIKE', "%{$search}%")
              ->orWhere('nomer_telepon', 'LIKE', "%{$search}%");
        });
    }

    // Logika Pengurutan
    if ($request->filled('sort')) {
        if ($request->sort === 'oldest') {
            $query->oldest();
        } elseif ($request->sort === 'most_orders') {
            $query->orderBy('pesanan_count', 'desc');
        } else {
            $query->latest();
        }
    } else {
        $query->latest();
    }

    $customers = $query->get();

    // 2. Proses pembuatan file CSV menggunakan Stream Response
    $fileName = 'daftar_pelanggan_' . date('Ymd_His') . '.csv';
    
    $headers = [
        "Content-type"        => "text/csv",
        "Content-Disposition" => "attachment; filename=$fileName",
        "Pragma"              => "no-cache",
        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        "Expires"             => "0"
    ];

    // Header Kolom di dalam file Excel/CSV nantinya
    $columns = ['Nama Pelanggan', 'Email', 'No. Telepon', 'Alamat Lengkap', 'Total Pesanan', 'Tanggal Bergabung'];

    $callback = function() use($customers, $columns) {
        $file = fopen('php://output', 'w');
        
        // Tambahkan header kolom
        fputcsv($file, $columns);

        // Tambahkan baris data pelanggan
        foreach ($customers as $customer) {
            fputcsv($file, [
                $customer->name,
                $customer->email,
                $customer->nomer_telepon ?? '-',
                $customer->alamat ?? 'Belum mengatur alamat',
                $customer->pesanan_count, // Menggunakan hasil dari withCount('pesanan')
                $customer->created_at->format('d M Y')
            ]);
        }

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
}
}