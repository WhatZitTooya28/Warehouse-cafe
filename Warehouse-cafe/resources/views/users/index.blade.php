@extends('layouts.app')

@section('title', 'Manajemen User')

@section('content')
    <!-- Header Konten Utama -->
    <div class="p-6 bg-blue-600 text-white rounded-lg shadow-md mb-8">
        <div class="flex items-center space-x-4">
            <div class="p-3 bg-white/20 rounded-full">
                <i class="fa-solid fa-users-gear w-8 h-8 text-2xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold">Manajemen User</h1>
                <p class="text-sm text-blue-100">Mengelola daftar pengguna, peran, dan akses ke sistem.</p>
            </div>
        </div>
    </div>

    <!-- Tombol Aksi dan Filter -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <a href="{{ route('profile.edit') }}" class="w-full sm:w-auto bg-green-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-green-600 transition duration-300 flex items-center justify-center space-x-2">
            <i class="fa-solid fa-user-pen"></i>
            <span>Edit profile saya</span>
        </a>
        
        <form action="{{ route('users.index') }}" method="GET" class="w-full sm:w-auto flex items-center border rounded-lg bg-white focus-within:ring-2 focus-within:ring-blue-500">
            <div class="relative w-full">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
                </span>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama/Username..." class="w-full sm:w-64 pl-10 pr-10 py-2 rounded-l-lg border-none focus:ring-0">
                @if(request('search'))
                <a href="{{ route('users.index', ['role' => request('role')]) }}" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600">
                    <i class="fa-solid fa-xmark"></i>
                </a>
                @endif
            </div>
            <select name="role" onchange="this.form.submit()" class="pl-4 pr-8 py-2 border-l rounded-r-lg bg-white border-none focus:ring-0 appearance-none">
                <option value="">Semua Role</option>
                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="kasir" {{ request('role') == 'kasir' ? 'selected' : '' }}>Kasir</option>
            </select>
        </form>
    </div>

    <!-- Container Utama Tabel dan Tombol Tambah -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="flex flex-col h-full">
            <!-- Tabel Data User -->
            <div class="flex-grow overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th class="px-6 py-3">No.</th>
                            <th class="px-6 py-3">ID User</th>
                            <th class="px-6 py-3">Nama Lengkap</th>
                            <th class="px-6 py-3">Username</th>
                            <th class="px-6 py-3">E-mail</th>
                            <th class="px-6 py-3">Role</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $index => $user)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $users->firstItem() + $index }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">USR{{ str_pad($user->id, 3, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-6 py-4">{{ $user->nama_lengkap }}</td>
                            <td class="px-6 py-4">{{ $user->username }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4 capitalize">{{ $user->role }}</td>
                            <td class="px-6 py-4">
                                <span class="{{ $user->status == 'aktif' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }} text-xs font-medium px-2.5 py-0.5 rounded-full capitalize">{{ $user->status }}</span>
                            </td>
                            <td class="px-6 py-4 flex space-x-4">
                                <a href="{{ route('users.reset-password.form', $user->id) }}" class="text-gray-500 hover:text-gray-800" title="Reset Password"><i class="fa-solid fa-lock"></i></a>
                                <a href="{{ route('users.edit', $user->id) }}" class="text-blue-600 hover:text-blue-900" title="Edit"><i class="fa-solid fa-pencil"></i></a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" title="Hapus"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">Tidak ada data user lain.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Bagian Bawah: Paginasi dan Tombol Tambah -->
            <div class="flex justify-between items-center mt-4">
                <div>
                    {{ $users->links() }}
                </div>
                <div>
                    <a href="{{ route('users.create') }}" class="bg-blue-600 text-white font-bold py-2 px-4 rounded-full hover:bg-blue-700 transition duration-300 flex items-center justify-center space-x-2 shadow-lg">
                        <i class="fa-solid fa-plus"></i>
                        <span>Tambah User</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
