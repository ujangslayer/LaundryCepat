<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Layanan;

class LayananSeeder extends Seeder
{
    public function run(): void
    {
        Layanan::create([
            'name' => 'Cuci Kering + Setrika',
            'unit_type' => 'kg',
            'harga' => 8000,
            'deskripsi' => 'Pakaian dicuci bersih, dikeringkan, dan disetrika rapi.'
        ]);

        Layanan::create([
            'name' => 'Cuci Basah',
            'unit_type' => 'kg',
            'harga' => 5000,
            'deskripsi' => 'Pakaian dicuci bersih dan dikembalikan dalam keadaan basah.'
        ]);

        Layanan::create([
            'name' => 'Cuci Karpet',
            'unit_type' => 'pcs',
            'harga' => 50000,
            'deskripsi' => 'Pencucian karpet satuan.'
        ]);
    }
}