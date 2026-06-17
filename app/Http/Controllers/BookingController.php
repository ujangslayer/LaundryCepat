<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\DetailPesanan;
use App\Models\Layanan;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // 1. Menampilkan halaman form booking
    public function index()
    {
        // Ambil semua layanan untuk ditampilkan di form pilihan
        $services = Layanan::all();
        return view('customer.booking', compact('services'));
    }

    // 2. Memproses form pesanan baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'layanan' => 'required|array',
            'layanan.*.id' => 'exists:layanan,id',
            'layanan.*.qty' => 'nullable|numeric|min:0',
            'delivery_option' => 'required|in:dropoff,pickup',
            'waktu_pengambilan' => 'nullable|date',
            'alamat' => 'required_if:delivery_option,pickup',
            'payment_method' => 'required|in:cod,transfer',
        ]);

        // Saring layanan yang benar-benar diisi (qty lebih dari 0)
        $selectedLayanan = collect($request->layanan)->filter(function($item) {
            return isset($item['qty']) && $item['qty'] > 0;
        });

        // Jika pelanggan tidak mengisi jumlah (qty) di satupun layanan
        if ($selectedLayanan->isEmpty()) {
            return back()->with('error', 'Silakan pilih minimal satu layanan dan masukkan jumlahnya.')->withInput();
        }

        // Generate Nomor Order (Format: LC-TahunBulanTanggal-UrutanHariIni)
        $today = date('Ymd');
        $orderCountToday = Pesanan::whereDate('created_at', date('Y-m-d'))->count();
        $orderNumber = 'LC-' . $today . '-' . str_pad($orderCountToday + 1, 3, '0', STR_PAD_LEFT);

        // 1. Simpan tabel utama: Pesanan
        $pesanan = Pesanan::create([
            'user_id' => Auth::id(),
            'order_number' => $orderNumber,
            'delivery_option' => $request->delivery_option,
            'waktu_pengambilan' => $request->delivery_option === 'pickup' ? $request->waktu_pengambilan : null,
           'alamat' => $request->delivery_option === 'pickup' ? $request->alamat : null,
            'status' => 'pending', // Baru masuk otomatis pending
            'payment_method' => $request->payment_method,
            'payment_status' => 'unpaid',
            'total_harga' => 0 // Akan di-update setelah subtotal dihitung
        ]);

        $totalHarga = 0;

        // 2. Simpan tabel anak: Detail Pesanan (keranjangnya)
        foreach ($selectedLayanan as $item) {
            $layananDb = Layanan::find($item['id']);
            $subtotal = $layananDb->harga * $item['qty'];
            $totalHarga += $subtotal;

            DetailPesanan::create([
                'pesanan_id' => $pesanan->id,
                'layanan_id' => $layananDb->id,
                'quantity' => $item['qty'],
                'harga_per_unit' => $layananDb->harga,
                'subtotal' => $subtotal
            ]);
        }

        // 3. Update total_harga di tabel Pesanan
        $pesanan->update(['total_harga' => $totalHarga]);

       return redirect()->route('customer.tracking', $pesanan->id)->with('success', 'Pesanan Anda berhasil dijadwalkan!');
    }
}