@extends('layouts.app')

@section('title', 'Manajemen Supplier')

@section('content')
    <div class="p-6 bg-blue-600 text-white rounded-lg shadow-md mb-8">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-white/20 rounded-full">
                <i class="fa-solid fa-truck w-8 h-8 text-2xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold">Data Supplier</h1>
                <p class="text-sm text-blue-100">Menampilkan dan mengelola data supplier yang tersedia di gudang.</p>
            </div>
        </div>
    </div>

    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <a href="{{ route('supplier.create') }}" class="w-full sm:w-auto bg-blue-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300 flex items-center justify-center space-x-2">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Supplier</span>
        </a>
        {{-- Form untuk filter bisa ditambahkan di sini --}}
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-6 py-3">No.</th>
                        <th class="px-6 py-3">ID Supplier</th>
                        <th class="px-6 py-3">Nama Supplier</th>
                        <th class="px-6 py-3">Kategori</th>
                        <th class="px-6 py-3">Telepon</th>
                        <th class="px-6 py-3">E-mail</th>
                        <th class="px-6 py-3">Tanggal Kerjasama</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($suppliers as $index => $supplier)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $suppliers->firstItem() + $index }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $supplier->id_supplier }}</td>
                        <td class="px-6 py-4">{{ $supplier->nama_supplier }}</td>
                        <td class="px-6 py-4">{{ $supplier->kategori }}</td>
                        <td class="px-6 py-4">{{ $supplier->telepon }}</td>
                        <td class="px-6 py-4">{{ $supplier->email }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($supplier->tanggal_kerjasama)->format('d - m - Y') }}</td>
                        <td class="px-6 py-4 flex space-x-4">
                            <a href="{{ route('supplier.edit', $supplier->id) }}" class="text-blue-600 hover:text-blue-900" title="Edit"><i class="fa-solid fa-pencil"></i></a>
                            <form action="{{ route('supplier.destroy', $supplier->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus supplier ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" title="Hapus"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-4">Tidak ada data supplier.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $suppliers->links() }}
        </div>
    </div>
@endsection
