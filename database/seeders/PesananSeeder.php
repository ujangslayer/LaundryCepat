<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pesanan;
use App\Models\DetailPesanan;
use Illuminate\Support\Str;

class PesananSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Data Pesanan Induk
        $pesanan1 = Pesanan::create([
            'user_id' => 2, // ID Budi Customer
            'order_number' => 'ORD-' . strtoupper(Str::random(6)),
            
            // 👇 INI YANG KITA SESUAIKAN DENGAN MIGRATION 👇
            'delivery_option' => 'pickup', 
            'waktu_pengambilan' => now()->addDays(1),
            'status' => 'pending',
            'total_harga' => 24000,
            'payment_method' => 'cod', // 👈 INI JUGA DISESUAIKAN
            'payment_status' => 'unpaid',
        ]);

        // 2. Buat Detail Pesanannya (Budi pesan Cuci Kering 3 kg)
        DetailPesanan::create([
            'pesanan_id' => $pesanan1->id,
            'layanan_id' => 1, // ID Layanan Cuci Kering + Setrika
            'quantity' => 3,
            'harga_per_unit' => 8000,
            'subtotal' => 24000,
        ]);
    }
}