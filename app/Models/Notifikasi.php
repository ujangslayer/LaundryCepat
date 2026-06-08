<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    // Mendefinisikan nama tabel secara eksplisit
    protected $table = 'notifikasis';

    // Kolom yang diizinkan untuk diisi secara massal
    protected $fillable = [
        'user_id',
        'pesanan_id',
        'judul',
        'pesan',
        'is_read'
    ];

    /**
     * Hubungan relasi balik ke model Pesanan
     */
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }

    /**
     * Hubungan relasi balik ke model User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}