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
    Schema::create('supplier', function (Blueprint $table) {
        $table->id(); // INI AKAN MEMBUAT PRIMARY KEY BERNAMA 'id'
        $table->string('id_supplier')->unique();
        $table->string('nama_supplier');
        $table->string('kategori');
        $table->string('telepon')->nullable();
        $table->string('email')->nullable()->unique();
        $table->date('tanggal_kerjasama');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
