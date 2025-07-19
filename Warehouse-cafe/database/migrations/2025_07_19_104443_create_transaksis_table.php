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
    Schema::create('transaksis', function (Blueprint $table) {
        $table->id();
        $table->string('id_transaksi')->unique();

        // Sekarang ini akan berfungsi karena merujuk ke 'barang.id'
        $table->foreignId('barang_id')->constrained('barang');

        // Ini juga akan berfungsi karena merujuk ke 'supplier.id'
        $table->foreignId('supplier_id')->nullable()->constrained('supplier');

        $table->integer('jumlah');
        $table->decimal('harga_satuan', 15, 2)->nullable();
        $table->enum('tipe', ['masuk', 'keluar']);
        $table->string('lokasi');
        $table->string('penerima_atau_tujuan');
        $table->text('catatan')->nullable();
        $table->date('tanggal_transaksi');
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
