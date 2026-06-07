<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // ==========================================
    // SISI ADMIN
    // ==========================================
    
    // Menampilkan daftar semua ulasan di halaman admin
    public function index()
    {
        $reviews = Review::with(['user', 'pesanan'])->latest()->get();
        return view('admin.reviews.index', compact('reviews'));
    }

    // Menghapus ulasan (Delete oleh admin)
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('success', 'Ulasan pelanggan berhasil dihapus dari sistem.');
    }

    // Membalas ulasan pelanggan (Terhubung ke User)
    public function reply(Request $request, $id)
    {
        $request->validate([
            'admin_reply' => 'required|string|max:1000'
        ]);

        $review = Review::findOrFail($id);
        $review->update([
            'admin_reply' => $request->admin_reply
        ]);

        return redirect()->back()->with('success', 'Balasan untuk ulasan pelanggan berhasil dikirim!');
    }


    // ==========================================
    // SISI CUSTOMER (BARU)
    // ==========================================

    // Menampilkan halaman ulasan milik customer yang sedang login
    public function customerIndex(Request $request)
    {
        $userId = Auth::id();

        // 1. Ambil semua ulasan yang pernah dibuat oleh user ini beserta balasan adminnya
        $myReviews = Review::with(['pesanan.detail.layanan'])
                            ->where('user_id', $userId)
                            ->latest()
                            ->get();

        // 2. Cari pesanan milik user ini yang statusnya sudah 'completed' (Selesai)
        // tapi BELUM PERNAH diberi ulasan sama sekali
        $reviewedOrderIds = Review::where('user_id', $userId)->pluck('pesanan_id')->toArray();
        
        $unreviewedOrders = Pesanan::with(['detail.layanan'])
                                    ->where('user_id', $userId)
                                    ->where('status', 'completed')
                                    ->whereNotIn('id', $reviewedOrderIds)
                                    ->latest()
                                    ->get();

        // Mengambil pesanan_id dari URL jika diklik langsung dari halaman tracking shortcut
        $selectedOrderId = $request->query('pesanan_id');

        return view('customer.reviews', compact('myReviews', 'unreviewedOrders', 'selectedOrderId'));
    }

    // Menyimpan ulasan baru yang dikirim oleh customer
    public function store(Request $request)
    {
        $request->validate([
            'pesanan_id' => 'required|exists:pesanan,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        // Keamanan: Pastikan pesanan tersebut memang milik user yang login dan sudah selesai
        $pesanan = Pesanan::where('id', $request->pesanan_id)
                          ->where('user_id', Auth::id())
                          ->where('status', 'completed')
                          ->firstOrFail();

        // Keamanan ganda: Pastikan pesanan belum pernah diulas sebelumnya
        $alreadyReviewed = Review::where('pesanan_id', $pesanan->id)->exists();
        if ($alreadyReviewed) {
            return redirect()->back()->with('error', 'Pesanan ini sudah pernah Anda ulas.');
        }

        // Simpan ke tabel reviews sesuai blueprint tabel migrasi Anda
        Review::create([
            'pesanan_id' => $pesanan->id,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('customer.reviews')->with('success', 'Terima kasih banyak! Ulasan Anda berhasil dikirim.');
    }
}