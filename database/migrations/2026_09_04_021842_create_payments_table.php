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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            // Menghubungkan tagihan dengan penghuni (tabel users)
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->integer('jumlah_tagihan'); // Contoh: 1500000
            $table->date('tenggat_pembayaran'); // Batas akhir bayar
            $table->enum('status_pembayaran', ['belum_lunas', 'lunas'])->default('belum_lunas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
