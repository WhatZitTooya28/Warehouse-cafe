@extends('layouts.app')

@section('title', 'Laporan Barang Masuk')

@section('content')
    <div class="p-6 bg-blue-600 text-white rounded-lg shadow-md mb-8">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-white/20 rounded-full">
                <i class="fa-solid fa-file-arrow-down w-8 h-8 text-2xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold">Laporan Barang Masuk</h1>
                <p class="text-sm text-blue-100">Menampilkan riwayat lengkap transaksi penerimaan barang ke gudang.</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
            <div class="p-3 bg-green-100 rounded-full"><i class="fa-solid fa-table-list text-2xl text-green-500"></i></div>
            <div><p class="text-sm font-medium text-gray-500">Total Transaksi Masuk</p><p class="text-2xl font-bold text-gray-800">{{ $totalTransaksi ?? 0 }}</p></div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
            <div class="p-3 bg-orange-100 rounded-full"><i class="fa-solid fa-truck text-2xl text-orange-500"></i></div>
            <div><p class="text-sm font-medium text-gray-500">Total Barang Masuk (Unit)</p><p class="text-2xl font-bold text-gray-800">{{ $totalUnit ?? 0 }}</p></div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
            <div class="p-3 bg-blue-100 rounded-full"><i class="fa-solid fa-wallet text-2xl text-blue-500"></i></div>
            <div><p class="text-sm font-medium text-gray-500">Total Nilai Barang Masuk</p><p class="text-2xl font-bold text-gray-800">Rp {{ number_format($totalNilai ?? 0, 0, ',', '.') }}</p></div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="w-full sm:w-auto flex items-center gap-4">
                <input type="text" placeholder="Cari ID Transaksi/Nama Barang..." class="w-full sm:w-64 px-4 py-2 border rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                <input type="date" class="px-4 py-2 border rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                <select class="px-4 py-2 border rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option disabled selected>Supplier</option>
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
                        <th class="px-6 py-3">ID Transaksi</th>
                        <th class="px-6 py-3">Nama Supplier</th>
                        <th class="px-6 py-3">Nama Barang</th>
                        <th class="px-6 py-3">Jumlah Masuk</th>
                        <th class="px-6 py-3">Total Harga</th>
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
                        <td class="px-6 py-4">{{ $transaksi->penerima_atau_tujuan }}</td>
                        <td class="px-6 py-4">
                            <a href="#" class="text-blue-600 hover:text-blue-900" title="Lihat Detail"><i class="fa-solid fa-eye"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-4">Tidak ada data laporan barang masuk.</td>
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
