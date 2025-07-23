@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
    <!-- Header Konten Utama -->
    <div class="p-6 bg-blue-600 text-white rounded-lg shadow-md mb-8">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-white/20 rounded-full">
                <i class="fa-solid fa-pencil w-8 h-8 text-2xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold">Edit Barang: {{ $barang->nama_barang }}</h1>
                <p class="text-sm text-blue-100">Perbarui detail data barang di bawah ini.</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-8 rounded-lg shadow-md">
        <form action="{{ route('barang.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="id_barang" class="block text-sm font-medium text-gray-700 mb-1">ID Barang</label>
                    <input type="text" name="id_barang" id="id_barang" value="{{ old('id_barang', $barang->id_barang) }}" required class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('id_barang') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="nama_barang" class="block text-sm font-medium text-gray-700 mb-1">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}" required class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('nama_barang') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <input type="text" name="kategori" id="kategori" value="{{ old('kategori', $barang->kategori) }}" required class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('kategori') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="stok" class="block text-sm font-medium text-gray-700 mb-1">Stok</label>
                    <input type="number" name="stok" id="stok" value="{{ old('stok', $barang->stok) }}" required class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('stok') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="satuan" class="block text-sm font-medium text-gray-700 mb-1">Satuan</label>
                    <input type="text" name="satuan" id="satuan" value="{{ old('satuan', $barang->satuan) }}" required class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('satuan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="lokasi_rak" class="block text-sm font-medium text-gray-700 mb-1">Lokasi Rak</label>
                    <input type="text" name="lokasi_rak" id="lokasi_rak" value="{{ old('lokasi_rak', $barang->lokasi_rak) }}" required class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('lokasi_rak') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mt-8 flex justify-end gap-4">
                <a href="{{ route('barang.index') }}" class="bg-red-500 text-white font-bold py-2 px-6 rounded-lg hover:bg-red-600 transition duration-300">Batal</a>
                <button type="submit" class="bg-green-500 text-white font-bold py-2 px-6 rounded-lg hover:bg-green-600 transition duration-300">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection
