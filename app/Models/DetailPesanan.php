<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    use HasFactory;

    protected $table = 'detail_pesanan';

    protected $fillable = [
        'pesanan_id', 'layanan_id', 'quantity', 'harga_per_unit', 'subtotal'
    ];

    // Relasi kembali ke Pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    // Relasi ke Layanan (untuk memanggil nama layanannya)
    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}