<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BarangController extends Controller
{
    public function index(): View
    {
        $barangs = Barang::latest()->paginate(10);
        return view('barang.index', compact('barangs'));
    }

    public function create(): View
    {
        return view('barang.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi data dari form (tanpa id_barang)
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required|string',
            'lokasi_rak' => 'required|string',
        ]);

        // 2. Logika pembuatan ID otomatis
        $lastBarang = Barang::orderBy('id', 'desc')->first();
        $lastId = $lastBarang ? $lastBarang->id : 0;
        $newIdBarang = 'BRG' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);

        // 3. Gabungkan data dari form dengan ID baru
        $data = $request->all();
        $data['id_barang'] = $newIdBarang;

        // 4. Simpan data baru ke database
        Barang::create($data);

        return redirect()->route('barang.index')->with('success', 'Barang baru berhasil ditambahkan.');
    }
    public function edit(Barang $barang): View
    {
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang): RedirectResponse
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required|string',
            'lokasi_rak' => 'required|string',
        ]);

        // Untuk update, kita tidak mengubah id_barang, jadi kita hanya kirim data lainnya
        $barang->update($request->only([
            'nama_barang', 'kategori', 'stok', 'satuan', 'lokasi_rak'
        ]));

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui.');
    }

    public function destroy(Barang $barang): RedirectResponse
    {
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Data barang berhasil dihapus.');
    }
}