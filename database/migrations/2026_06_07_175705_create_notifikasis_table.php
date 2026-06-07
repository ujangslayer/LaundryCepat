<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notifikasis', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke tabel users (Pelanggan)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            // Relasi ke tabel pesanans (Pesanan)
            $table->foreignId('pesanan_id')->constrained('pesanan')->onDelete('cascade');
            
            $table->string('judul');
            $table->text('pesan');
            $table->boolean('is_read')->default(false); // Default berisi false (belum dibaca)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifikasis');
    }
};