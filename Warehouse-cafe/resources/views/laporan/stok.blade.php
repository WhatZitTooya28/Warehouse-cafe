@extends('layouts.app')

@section('title', 'Laporan Stok')

@section('content')
    <div class="p-6 bg-blue-600 text-white rounded-lg shadow-md mb-8">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-white/20 rounded-full">
                <i class="fa-solid fa-clipboard-list w-8 h-8 text-2xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold">Laporan Stok</h1>
                <p class="text-sm text-blue-100">Menampilkan ringkasan status stok terkini dari semua barang di gudang.</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
            <div class="p-3 bg-green-100 rounded-full"><i class="fa-solid fa-boxes-stacked text-2xl text-green-500"></i></div>
            <div><p class="text-sm font-medium text-gray-500">Total Jenis Item</p><p class="text-2xl font-bold text-gray-800">{{ $totalItem ?? 0 }}</p></div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
            <div class="p-3 bg-orange-100 rounded-full"><i class="fa-solid fa-dolly text-2xl text-orange-500"></i></div>
            <div><p class="text-sm font-medium text-gray-500">Total Kuantitas Stok</p><p class="text-2xl font-bold text-gray-800">{{ $totalKuantitas ?? 0 }}</p></div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
            <div class="p-3 bg-red-100 rounded-full"><i class="fa-solid fa-arrow-trend-down text-2xl text-red-500"></i></div>
            <div><p class="text-sm font-medium text-gray-500">Item Stok Rendah</p><p class="text-2xl font-bold text-gray-800">{{ $itemStokRendah ?? 0 }}</p></div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="w-full sm:w-auto flex items-center gap-4">
                <input type="text" placeholder="Cari Nama/ID Barang..." class="w-full sm:w-64 px-4 py-2 border rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                <select class="px-4 py-2 border rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option disabled selected>Kategori</option>
                </select>
                <select class="px-4 py-2 border rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option disabled selected>Lokasi Rak</option>
                </select>
            </div>
            <a href="#" class="w-full sm:w-auto bg-green-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-green-600 transition duration-300 flex items-center justify-center space-x-2">
                <i class="fa-solid fa-file-excel"></i>
                <span>Export Excel</span>
            </a>
        </div>
    </div>


    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-6 py-3">No.</th>
                        <th class="px-6 py-3">ID Barang</th>
                        <th class="px-6 py-3">Nama Barang</th>
                        <th class="px-6 py-3">Stok Saat Ini</th>
                        <th class="px-6 py-3">Batas Minimum</th>
                        <th class="px-6 py-3">Status Stok</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barangs as $index => $barang)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $barangs->firstItem() + $index }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $barang->id_barang }}</td>
                        <td class="px-6 py-4">{{ $barang->nama_barang }}</td>
                        <td class="px-6 py-4 font-semibold">{{ $barang->stok }}</td>
                        <td class="px-6 py-4">{{ $barang->stok_minimum ?? 10 }}</td>
                        <td class="px-6 py-4">
                            @if($barang->stok <= ($barang->stok_minimum ?? 10))
                                <span class="bg-red-200 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Rendah</span>
                            @else
                                <span class="bg-green-200 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Aman</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="text-blue-600 hover:text-blue-900" title="Lihat Riwayat"><i class="fa-solid fa-eye"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">Tidak ada data stok barang.</td>
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
