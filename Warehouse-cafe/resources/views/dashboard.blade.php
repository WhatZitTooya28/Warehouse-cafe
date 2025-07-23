@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- Header Konten Utama -->
    <div class="flex items-center space-x-3 mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
    </div>

    <!-- Kartu Ringkasan -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
            <div class="p-3 bg-blue-100 rounded-full">
                <i class="fa-solid fa-box-archive text-2xl text-blue-500"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Data Barang</p>
                <p class="text-2xl font-bold text-gray-800">450</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
            <div class="p-3 bg-green-100 rounded-full">
                <i class="fa-solid fa-cart-arrow-down text-2xl text-green-500"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Data Barang Masuk</p>
                <p class="text-2xl font-bold text-gray-800">130</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
            <div class="p-3 bg-orange-100 rounded-full">
                <i class="fa-solid fa-truck-ramp-box text-2xl text-orange-500"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Data Barang Keluar</p>
                <p class="text-2xl font-bold text-gray-800">250</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
            <div class="p-3 bg-teal-100 rounded-full">
                <i class="fa-solid fa-tags text-2xl text-teal-500"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Data Jenis Barang</p>
                <p class="text-2xl font-bold text-gray-800">25</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
            <div class="p-3 bg-red-100 rounded-full">
                <i class="fa-solid fa-truck text-2xl text-red-500"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Data Supplier</p>
                <p class="text-2xl font-bold text-gray-800">10</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
            <div class="p-3 bg-purple-100 rounded-full">
                <i class="fa-solid fa-users text-2xl text-purple-500"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Data User</p>
                <p class="text-2xl font-bold text-gray-800">3</p>
            </div>
        </div>
    </div>

    <!-- Tabel Notifikasi Stok -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Stok barang telah mencapai batas minimum</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">No.</th>
                        <th scope="col" class="px-6 py-3">ID Barang</th>
                        <th scope="col" class="px-6 py-3">Nama Barang</th>
                        <th scope="col" class="px-6 py-3">Kategori</th>
                        <th scope="col" class="px-6 py-3">Stok</th>
                        <th scope="col" class="px-6 py-3">Satuan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">1</td>
                        <td class="px-6 py-4 font-medium text-gray-900">ARD0006</td>
                        <td class="px-6 py-4">Minyak Goreng</td>
                        <td class="px-6 py-4">Sembako</td>
                        <td class="px-6 py-4"><span class="bg-yellow-200 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">10</span></td>
                        <td class="px-6 py-4">Litar</td>
                    </tr>
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">2</td>
                        <td class="px-6 py-4 font-medium text-gray-900">ARD0007</td>
                        <td class="px-6 py-4">Minyak Kayu Putih</td>
                        <td class="px-6 py-4">Obat-obatan</td>
                        <td class="px-6 py-4"><span class="bg-green-200 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">15</span></td>
                        <td class="px-6 py-4">Botol</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
