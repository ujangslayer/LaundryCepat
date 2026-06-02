<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    // Fungsi untuk menampilkan daftar pelanggan
    public function index()
    {
        // Mengambil semua data user yang memiliki role 'customer', diurutkan dari yang terbaru
        $customers = User::where('role', 'customer')->latest()->get();
        
        return view('admin.customer.index', compact('customers'));
    }
}