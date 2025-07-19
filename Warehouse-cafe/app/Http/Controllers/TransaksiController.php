<?php

namespace App\Http\Controllers;

use App\Models\Transaksi; // <-- Pastikan ini ada
use Illuminate\Http\Request;
use Illuminate\View\View;

class TransaksiController extends Controller
{
    /**
     * Menampilkan halaman untuk transaksi Barang Masuk.
     */
    public function indexBarangMasuk(): View
    {
        // Ambil data transaksi dengan tipe 'masuk'
        // 'with' digunakan untuk mengambil data relasi (barang & supplier) secara efisien
        $transaksis = Transaksi::with(['barang', 'supplier'])
                                ->where('tipe', 'masuk')
                                ->latest('tanggal_transaksi') // Urutkan berdasarkan tanggal
                                ->paginate(10); // Batasi 10 data per halaman

        return view('transaksi.masuk', compact('transaksis'));
    }

    /**
     * Menampilkan halaman untuk transaksi Barang Keluar.
     */
    public function indexBarangKeluar(): View
    {
        // Ambil data transaksi dengan tipe 'keluar'
        $transaksis = Transaksi::with('barang')
                            ->where('tipe', 'keluar')
                            ->latest('tanggal_transaksi') // Urutkan berdasarkan tanggal
                            ->paginate(10);

        return view('transaksi.keluar', compact('transaksis'));
    }
}
