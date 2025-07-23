<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    // Nama tabel jika berbeda dari penamaan standar Laravel (opsional, tapi baik untuk kejelasan)
    protected $table = 'barang';

    // Tentukan primary key jika bukan 'id'
    protected $primaryKey = 'id_barang';

    // Izinkan kolom-kolom ini untuk diisi secara massal (mass assignable)
    protected $fillable = [
        'id_barang', // <-- PASTIKAN BARIS INI ADA
        'nama_barang',
        'kategori',
        'stok',
        'satuan',
        'lokasi_rak',
    ];
}