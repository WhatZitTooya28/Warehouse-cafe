@extends('layouts.app')

@section('title', 'Tambah Barang Baru')

@section('content')
    <div class="p-6 bg-blue-600 text-white rounded-lg shadow-md mb-8">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-white/20 rounded-full">
                <i class="fa-solid fa-box-archive w-8 h-8 text-2xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold">Tambah Barang Baru</h1>
                <p class="text-sm text-blue-100">Isi form di bawah ini untuk menambahkan data barang baru ke dalam sistem.</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-8 rounded-lg shadow-md">
        @if ($errors->any())
            <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative" role="alert">
                <strong class="font-bold">Oops! Terjadi kesalahan.</strong>
                <ul class="mt-2 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('barang.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- ID Barang tidak diinput manual karena akan dibuat otomatis --}}
                
                <div>
                    <label for="nama_barang" class="block text-sm font-medium text-gray-700 mb-1">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang" value="{{ old('nama_barang') }}" required class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <input type="text" name="kategori" id="kategori" value="{{ old('kategori') }}" required class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="stok" class="block text-sm font-medium text-gray-700 mb-1">Stok Awal</label>
                    <input type="number" name="stok" id="stok" value="{{ old('stok') }}" required class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="satuan" class="block text-sm font-medium text-gray-700 mb-1">Satuan</label>
                    <input type="text" name="satuan" id="satuan" value="{{ old('satuan') }}" required class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="lokasi_rak" class="block text-sm font-medium text-gray-700 mb-1">Lokasi Rak</label>
                    <input type="text" name="lokasi_rak" id="lokasi_rak" value="{{ old('lokasi_rak') }}" required class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            <div class="mt-8 flex justify-end gap-4">
                <a href="{{ route('barang.index') }}" class="bg-red-500 text-white font-bold py-2 px-6 rounded-lg hover:bg-red-600 transition duration-300">Batal</a>
                <button type="submit" class="bg-green-500 text-white font-bold py-2 px-6 rounded-lg hover:bg-green-600 transition duration-300">Simpan</button>
            </div>
        </form>
    </div>
@endsection
