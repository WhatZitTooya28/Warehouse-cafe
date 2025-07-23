@extends('layouts.app')

@section('title', 'Transaksi Barang Masuk')

@section('content')
    <div class="p-6 bg-blue-600 text-white rounded-lg shadow-md mb-8">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-white/20 rounded-full">
                <i class="fa-solid fa-cart-arrow-down w-8 h-8 text-2xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold">Barang Masuk</h1>
                <p class="text-sm text-blue-100">Menampilkan dan mengelola data barang yang masuk ke gudang.</p>
            </div>
        </div>
    </div>

    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <a href="#" class="w-full sm:w-auto bg-blue-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300 flex items-center justify-center space-x-2">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Barang Masuk</span>
        </a>
        <div class="w-full sm:w-auto flex items-center gap-4">
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
                </span>
                <input type="text" placeholder="Cari ID/Nama..." class="w-full sm:w-64 pl-10 pr-4 py-2 border rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <select class="px-4 py-2 border rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option disabled selected>Supplier</option>
                {{-- Opsi supplier diisi dinamis --}}
            </select>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-6 py-3">No.</th>
                        <th class="px-6 py-3">ID Transaksi</th>
                        <th class="px-6 py-3">Nama Supplier</th>
                        <th class="px-6 py-3">Nama Barang</th>
                        <th class="px-6 py-3">Jumlah</th>
                        <th class="px-6 py-3">Total Harga</th>
                        <th class="px-6 py-3">Lokasi Simpan</th>
                        <th class="px-6 py-3">Penerima</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaksis as $index => $transaksi)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $transaksis->firstItem() + $index }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $transaksi->id_transaksi }}</td>
                        <td class="px-6 py-4">{{ $transaksi->supplier->nama_supplier ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $transaksi->barang->nama_barang ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $transaksi->jumlah }} {{ $transaksi->barang->satuan ?? ''}}</td>
                        <td class="px-6 py-4">Rp {{ number_format($transaksi->jumlah * $transaksi->harga_satuan, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">{{ $transaksi->lokasi }}</td>
                        <td class="px-6 py-4">{{ $transaksi->penerima_atau_tujuan }}</td>
                        <td class="px-6 py-4 flex space-x-4">
                            <a href="#" class="text-blue-600 hover:text-blue-900" title="Edit"><i class="fa-solid fa-pencil"></i></a>
                            <a href="#" class="text-red-600 hover:text-red-900" title="Hapus"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-4">Tidak ada data barang masuk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $transaksis->links() }}
        </div>
    </div>
@endsection
