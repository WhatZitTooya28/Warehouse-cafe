@extends('layouts.app')

@section('title', 'Manajemen Barang')

@section('content')
    <div class="p-6 bg-blue-600 text-white rounded-lg shadow-md mb-8">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-white/20 rounded-full">
                <i class="fa-solid fa-box-archive w-8 h-8 text-2xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold">Data Barang</h1>
                <p class="text-sm text-blue-100">Menampilkan dan mengelola data barang yang tersedia di gudang</p>
            </div>
        </div>
    </div>

    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <a href="{{ route('barang.create') }}" class="w-full sm:w-auto bg-blue-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300 flex items-center justify-center space-x-2">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Barang</span>
        </a>
        {{-- Form untuk filter bisa ditambahkan di sini --}}
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-6 py-3">No.</th>
                        <th class="px-6 py-3">ID Barang</th>
                        <th class="px-6 py-3">Nama Barang</th>
                        <th class="px-6 py-3">Kategori</th>
                        <th class="px-6 py-3">Stok</th>
                        <th class="px-6 py-3">Satuan</th>
                        <th class="px-6 py-3">Lokasi Rak</th>
                        <th class="px-6 py-3">Tanggal Masuk</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barangs as $index => $barang)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $barangs->firstItem() + $index }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $barang->id_barang }}</td>
                        <td class="px-6 py-4">{{ $barang->nama_barang }}</td>
                        <td class="px-6 py-4">{{ $barang->kategori }}</td>
                        <td class="px-6 py-4"><span class="bg-yellow-200 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">{{ $barang->stok }}</span></td>
                        <td class="px-6 py-4">{{ $barang->satuan }}</td>
                        <td class="px-6 py-4">{{ $barang->lokasi_rak }}</td>
                        <td class="px-6 py-4">{{ $barang->created_at->format('d - m - Y') }}</td>
                        <td class="px-6 py-4 flex space-x-4">
                            <a href="{{ route('barang.edit', $barang->id) }}" class="text-blue-600 hover:text-blue-900" title="Edit"><i class="fa-solid fa-pencil"></i></a>
                            <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" title="Hapus"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-4">Tidak ada data barang.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $barangs->links() }}
        </div>
    </div>
@endsection
