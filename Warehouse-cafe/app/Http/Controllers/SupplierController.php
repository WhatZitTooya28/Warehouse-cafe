<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SupplierController extends Controller
{
    public function index(): View
    {
        $suppliers = Supplier::latest()->paginate(10);
        return view('supplier.index', compact('suppliers'));
    }

    public function create(): View
    {
        return view('supplier.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id_supplier' => 'required|string|unique:supplier,id_supplier',
            'nama_supplier' => 'required|string|max:255',
            'kategori' => 'required|string',
            'telepon' => 'nullable|string',
            'email' => 'nullable|email',
            'tanggal_kerjasama' => 'required|date',
        ]);

        Supplier::create($request->all());

        return redirect()->route('supplier.index')->with('success', 'Supplier baru berhasil ditambahkan.');
    }

    public function edit(Supplier $supplier): View
    {
        return view('supplier.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier): RedirectResponse
    {
        $request->validate([
            'id_supplier' => 'required|string|unique:supplier,id_supplier,'.$supplier->id,
            'nama_supplier' => 'required|string|max:255',
            'kategori' => 'required|string',
            'telepon' => 'nullable|string',
            'email' => 'nullable|email',
            'tanggal_kerjasama' => 'required|date',
        ]);

        $supplier->update($request->all());

        return redirect()->route('supplier.index')->with('success', 'Data supplier berhasil diperbarui.');
    }

    public function destroy(Supplier $supplier): RedirectResponse
    {
        $supplier->delete();
        return redirect()->route('supplier.index')->with('success', 'Data supplier berhasil dihapus.');
    }
}