<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerProfilController extends Controller
{
    // Menampilkan halaman profil customer
    public function index()
    {
        $user = Auth::user();
        return view('customer.profil', compact('user'));
    }

    // Memproses pembaruan data profil & alamat rumah
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input dengan mencocokkan kolom asli database Anda
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'nomer_telepon' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:1000',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Menyusun data pembaruan
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'nomer_telepon' => $request->nomer_telepon,
            'alamat' => $request->alamat,
        ];

        // Enkripsi password baru jika diisi oleh user
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Jalankan perintah pembaruan data ke database
        $user->update($data);

        return redirect()->back()->with('success', 'Profil dan alamat rumah Anda berhasil diperbarui!');
    }
}