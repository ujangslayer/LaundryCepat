<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = [
        'user_id', 'order_number', 'delivery_option', 'waktu_pengambilan', 
        'status', 'total_harga', 'payment_method', 'payment_status', 'payment_receipt',
        'snap_token'
    ];

    // Relasi: Pesanan ini milik 1 User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: 1 Pesanan punya Banyak Detail Pesanan (Keranjang)
    public function detail()
    {
        return $this->hasMany(DetailPesanan::class, 'pesanan_id');
    }

    // Relasi: 1 Pesanan punya 1 Ulasan (Review)
    public function review()
    {
        return $this->hasOne(Review::class, 'pesanan_id');
    }
}