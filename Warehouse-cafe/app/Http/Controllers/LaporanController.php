<?php

namespace App\Http\Controllers;

use App\Models\Barang; // <-- Tambahkan ini
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB; // <-- Tambahkan ini
use App\Models\Transaksi;

class LaporanController extends Controller
{
    public function stok(): View
    {
        // Data untuk kartu ringkasan
        $totalItem = Barang::count();
        $totalKuantitas = Barang::sum('stok');
        $itemStokRendah = Barang::where('stok', '<=', 10)->count(); // Asumsi batas minimum adalah 10

        // Data untuk tabel
        $barangs = Barang::latest()->paginate(10);

        return view('laporan.stok', compact('barangs', 'totalItem', 'totalKuantitas', 'itemStokRendah'));
    }

public function masuk(): View
{
    // --- LOGIKA BARU UNTUK KARTU RINGKASAN ---
    $query = Transaksi::where('tipe', 'masuk');

    // 1. Hitung total transaksi masuk
    $totalTransaksi = $query->count();

    // 2. Hitung total unit/kuantitas barang yang masuk
    $totalUnit = $query->sum('jumlah');

    // 3. Hitung total nilai (harga * jumlah) dari semua barang yang masuk
    $totalNilai = $query->sum(DB::raw('jumlah * harga_satuan'));
    // --- AKHIR LOGIKA BARU ---

    // Ambil data untuk tabel dengan paginasi
    $transaksis = Transaksi::with(['barang', 'supplier'])
                            ->where('tipe', 'masuk')
                            ->latest('tanggal_transaksi')
                            ->paginate(10);

    // Kirim semua data (untuk kartu dan tabel) ke view
    return view('laporan.masuk', compact('transaksis', 'totalTransaksi', 'totalUnit', 'totalNilai'));
}

public function keluar(): View
{
    // --- LOGIKA BARU UNTUK KARTU RINGKASAN ---
    $query = Transaksi::where('tipe', 'keluar');

    // 1. Hitung total transaksi keluar
    $totalTransaksi = $query->count();

    // 2. Hitung total unit/kuantitas barang yang keluar
    $totalUnit = $query->sum('jumlah');

    // 3. Hitung total nilai (harga * jumlah) dari semua barang yang keluar
    $totalNilai = $query->sum(DB::raw('jumlah * harga_satuan'));
    // --- AKHIR LOGIKA BARU ---

    // Ambil data untuk tabel dengan paginasi
    $transaksis = Transaksi::with('barang')
                            ->where('tipe', 'keluar')
                            ->latest('tanggal_transaksi')
                            ->paginate(10);

    // Kirim semua data (untuk kartu dan tabel) ke view
    return view('laporan.keluar', compact('transaksis', 'totalTransaksi', 'totalUnit', 'totalNilai'));
}

    // method lain akan ditambahkan di sini
}