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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->string('order_number')->unique();
        $table->enum('delivery_option', ['dropoff', 'pickup'])->default('dropoff');
        $table->dateTime('waktu_pengambilan')->nullable();
        
        $table->enum('status', [
            'pending', 'picked_up', 'washing', 'ironing', 'ready', 'completed', 'cancelled'
        ])->default('pending');
        
        $table->integer('total_harga')->default(0);
        $table->enum('payment_method', ['cod', 'transfer'])->default('cod');
        $table->enum('payment_status', ['unpaid', 'pending_verification', 'paid'])->default('unpaid');
        $table->string('payment_receipt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
