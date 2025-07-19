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
    Schema::create('barang', function (Blueprint $table) {
        $table->id(); // INI AKAN MEMBUAT PRIMARY KEY BERNAMA 'id'
        $table->string('id_barang')->unique(); // Ini kode unik Anda
        $table->string('nama_barang');
        $table->string('kategori')->nullable();
        $table->integer('stok')->default(0);
        $table->string('satuan')->nullable();
        $table->string('lokasi_rak')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
