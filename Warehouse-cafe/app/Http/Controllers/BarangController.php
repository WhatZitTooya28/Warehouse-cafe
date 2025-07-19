<?php

namespace App\Http\Controllers;

use App\Models\Barang; // <-- Tambahkan ini
use Illuminate\Http\Request;
use Illuminate\View\View;

class BarangController extends Controller
{
    public function index(): View
        {
            // Ambil data dari database, 10 item per halaman
            // Ganti 'Barang' dengan nama model Anda jika berbeda
            $barangs = Barang::latest()->paginate(10); 

            // Kirim data ke view
            return view('barang.index', compact('barangs'));
        }

    public function create()
    {
        return view('barang.create'); // Tampilkan form tambah
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string|max:100',
            'stok' => 'required|integer',
            'stok_minimum' => 'required|integer',
        ]);

        // Simpan data ke database
        Barang::create($request->all());

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit(Barang $barang)
    {
        // Laravel otomatis menemukan barang berdasarkan id di URL
        return view('barang.edit', compact('barang')); // Tampilkan form edit dengan data lama
    }

    public function update(Request $request, Barang $barang)
    {
        // Validasi
        $request->validate([
            'nama_barang' => 'required|string|max:100',
            'stok' => 'required|integer',
            'stok_minimum' => 'required|integer',
        ]);

        // Update data
        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy(Barang $barang)
    {
        // Hapus data
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}