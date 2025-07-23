@extends('layouts.app')

@section('title', 'Edit Supplier')

@section('content')
    <!-- Header Konten Utama -->
    <div class="p-6 bg-blue-600 text-white rounded-lg shadow-md mb-8">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-white/20 rounded-full">
                <i class="fa-solid fa-pencil w-8 h-8 text-2xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold">Edit Supplier: {{ $supplier->nama_supplier }}</h1>
                <p class="text-sm text-blue-100">Perbarui detail data supplier di bawah ini.</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-8 rounded-lg shadow-md">
        <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="id_supplier" class="block text-sm font-medium text-gray-700 mb-1">ID Supplier</label>
                    <input type="text" name="id_supplier" id="id_supplier" value="{{ old('id_supplier', $supplier->id_supplier) }}" required class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="nama_supplier" class="block text-sm font-medium text-gray-700 mb-1">Nama Supplier</label>
                    <input type="text" name="nama_supplier" id="nama_supplier" value="{{ old('nama_supplier', $supplier->nama_supplier) }}" required class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <input type="text" name="kategori" id="kategori" value="{{ old('kategori', $supplier->kategori) }}" required class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="telepon" class="block text-sm font-medium text-gray-700 mb-1">Telepon</label>
                    <input type="text" name="telepon" id="telepon" value="{{ old('telepon', $supplier->telepon) }}" class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $supplier->email) }}" class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="tanggal_kerjasama" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Kerjasama</label>
                    <input type="date" name="tanggal_kerjasama" id="tanggal_kerjasama" value="{{ old('tanggal_kerjasama', $supplier->tanggal_kerjasama) }}" required class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            <div class="mt-8 flex justify-end gap-4">
                <a href="{{ route('supplier.index') }}" class="bg-red-500 text-white font-bold py-2 px-6 rounded-lg hover:bg-red-600 transition duration-300">Batal</a>
                <button type="submit" class="bg-green-500 text-white font-bold py-2 px-6 rounded-lg hover:bg-green-600 transition duration-300">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection
