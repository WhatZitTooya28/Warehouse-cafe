<?php

namespace App\Http\Controllers;

use App\Models\Supplier; // <-- Pastikan ini ada
use Illuminate\Http\Request;
use Illuminate\View\View;

class SupplierController extends Controller
{
    /**
     * Menampilkan daftar semua supplier.
     */
    public function index(): View
    {
        // Mengambil data supplier dari database, diurutkan dari yang terbaru
        $suppliers = Supplier::latest()->paginate(10);
        
        // Mengirim data ke view 'supplier.index'
        return view('supplier.index', compact('suppliers'));
    }

    /**
     * Menampilkan form untuk membuat supplier baru.
     */
    public function create()
    {
        // Logika untuk menampilkan form tambah supplier akan ditambahkan di sini
    }

    /**
     * Menyimpan supplier baru ke database.
     */
    public function store(Request $request)
    {
        // Logika untuk validasi dan penyimpanan data akan ditambahkan di sini
    }

    /**
     * Menampilkan detail satu supplier.
     */
    public function show(Supplier $supplier)
    {
        // Logika untuk menampilkan detail supplier akan ditambahkan di sini
    }

    /**
     * Menampilkan form untuk mengedit supplier.
     */
    public function edit(Supplier $supplier)
    {
        // Logika untuk menampilkan form edit akan ditambahkan di sini
    }

    /**
     * Memperbarui data supplier di database.
     */
    public function update(Request $request, Supplier $supplier)
    {
        // Logika untuk validasi dan pembaruan data akan ditambahkan di sini
    }

    /**
     * Menghapus supplier dari database.
     */
    public function destroy(Supplier $supplier)
    {
        // Logika untuk menghapus data akan ditambahkan di sini
    }
}
