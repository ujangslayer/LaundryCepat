<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    // Menampilkan daftar semua ulasan
    public function index()
    {
        // Mengambil data review beserta data user (pelanggan) dan pesanannya
        $reviews = Review::with(['user', 'pesanan'])->latest()->get();
        
        return view('admin.reviews.index', compact('reviews'));
    }

    // Menghapus ulasan (Delete)
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('success', 'Ulasan pelanggan berhasil dihapus dari sistem.');
    }
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
}