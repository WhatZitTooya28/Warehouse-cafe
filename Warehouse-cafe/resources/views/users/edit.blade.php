{{-- resources/views/users/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit User: ' . $user->nama_lengkap)

@section('content')
    <div class="p-6 bg-blue-600 text-white rounded-lg shadow-md mb-8">
        <h1 class="text-2xl font-bold">Edit User : {{ $user->nama_lengkap }}</h1>
    </div>

    <div class="bg-white p-8 rounded-lg shadow-md">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap', $user->nama_lengkap) }}" required class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}" required class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="telepon" class="block text-sm font-medium text-gray-700 mb-1">No. Telepon</label>
                    <input type="text" name="telepon" id="telepon" value="{{ old('telepon', $user->telepon) }}" class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role/Jabatan</label>
                    <select name="role" id="role" required class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="kasir" {{ old('role', $user->role) == 'kasir' ? 'selected' : '' }}>Kasir</option>
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status Akun</label>
                    <div class="flex items-center gap-4">
                        <label class="flex items-center"><input type="radio" name="status" value="aktif" {{ old('status', $user->status) == 'aktif' ? 'checked' : '' }} class="mr-2"> Aktif</label>
                        <label class="flex items-center"><input type="radio" name="status" value="tidak aktif" {{ old('status', $user->status) == 'tidak aktif' ? 'checked' : '' }} class="mr-2"> Tidak Aktif</label>
                    </div>
                </div>
            </div>
            <div class="mt-8 flex justify-between items-center">
                <div>
                    {{-- PERUBAHAN: Mengubah <button> menjadi <a> --}}
                    <a href="{{ route('users.reset-password.form', $user->id) }}" class="bg-gray-200 text-gray-700 font-bold py-2 px-6 rounded-lg hover:bg-gray-300 transition duration-300">Reset Password</a>
                </div>
                <div class="flex gap-4">
                    <a href="{{ route('users.index') }}" class="bg-red-500 text-white font-bold py-2 px-6 rounded-lg hover:bg-red-600 transition duration-300">Batal</a>
                    <button type="submit" class="bg-green-500 text-white font-bold py-2 px-6 rounded-lg hover:bg-green-600 transition duration-300">Simpan</button>
                </div>
            </div>
        </form>
    </div>
@endsection
