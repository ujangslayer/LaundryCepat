<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan; // Memanggil model Layanan

class LayananController extends Controller
{
    // Fungsi untuk MENAMPILKAN data (Read)
    public function index()
    {
        // Ambil semua data layanan dari database
        $services = Layanan::all(); 
        
        // Kirim data tersebut ke file blade admin/services/index
        return view('admin.services.index', compact('services'));
    }

    // Fungsi untuk MENYIMPAN data baru (Create)
    public function store(Request $request)
    {
        // 1. Validasi data yang dikirim dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'unit_type' => 'required|in:kg,pcs',
            'harga' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string'
        ]);

        // 2. Simpan ke database
        Layanan::create([
            'name' => $request->name,
            'unit_type' => $request->unit_type,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi
        ]);

        // 3. Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Layanan baru berhasil ditambahkan!');
    }
    // Fungsi untuk MENGUPDATE data (Update)
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'unit_type' => 'required|in:kg,pcs',
            'harga' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string'
        ]);

        Layanan::findOrFail($id)->update([
            'name' => $request->name,
            'unit_type' => $request->unit_type,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->back()->with('success', 'Layanan berhasil diperbarui!');
    }

    // Fungsi untuk MENGHAPUS data (Delete)
    public function destroy($id)
    {
        Layanan::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Layanan berhasil dihapus!');
    }
}