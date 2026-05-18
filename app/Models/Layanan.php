<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan'; // Beri tahu nama tabel aslinya

    protected $fillable = [
        'name', 'unit_type', 'harga', 'deskripsi'
    ];

    // Relasi: 1 Layanan bisa ada di Banyak Detail Pesanan
    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class);
    }
}