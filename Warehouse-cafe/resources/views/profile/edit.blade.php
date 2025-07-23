@extends('layouts.app')

@section('title', 'Edit Profile Saya')

@section('content')
    <div class="p-6 bg-blue-600 text-white rounded-lg shadow-md mb-8">
        <h1 class="text-2xl font-bold">Edit Profile Saya</h1>
    </div>

    {{-- Form untuk memperbarui informasi profil --}}
    <div class="bg-white p-8 rounded-lg shadow-md mb-8">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Informasi Profil</h2>
        <p class="text-sm text-gray-600 mb-6">Perbarui informasi profil, alamat email, dan foto akun Anda.</p>
        
        <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('patch')

            {{-- Bagian Upload Foto --}}
            <div class="mb-6" x-data="{photoName: null, photoPreview: null}">
                <label class="block text-sm font-medium text-gray-700 mb-2">Foto Profil</label>
                <div class="flex items-center space-x-4">
                    <!-- Pratinjau Foto Saat Ini -->
                    <div class="shrink-0">
                        <img class="h-20 w-20 rounded-full object-cover" 
                             :src="photoPreview ? photoPreview : '{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode($user->username) }}'" 
                             alt="{{ $user->username }}">
                    </div>
                    <!-- Tombol Upload -->
                    <div>
                        <input type="file" name="photo" class="hidden"
                               x-ref="photo"
                               x-on:change="
                                   photoName = $refs.photo.files[0].name;
                                   const reader = new FileReader();
                                   reader.onload = (e) => {
                                       photoPreview = e.target.result;
                                   };
                                   reader.readAsDataURL($refs.photo.files[0]);
                               ">
                        <button type="button" x-on:click.prevent="$refs.photo.click()" class="bg-gray-200 text-gray-700 font-bold py-2 px-4 rounded-lg hover:bg-gray-300">
                            Pilih Foto Baru
                        </button>
                        <div x-show="photoName" class="text-sm text-gray-500 mt-1" x-text="photoName"></div>
                    </div>
                </div>
            </div>

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
            </div>

            <div class="mt-8 flex justify-end gap-4">
                <a href="{{ route('users.index') }}" class="bg-red-500 text-white font-bold py-2 px-6 rounded-lg hover:bg-red-600 transition duration-300">Batal</a>
                <button type="submit" class="bg-green-500 text-white font-bold py-2 px-6 rounded-lg hover:bg-green-600 transition duration-300">Simpan</button>
            </div>
        </form>
    </div>

    {{-- Form untuk mengubah password --}}
    <div class="bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Ubah Password</h2>
        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">Password Lama</label>
                    <input type="password" name="current_password" id="current_password" required class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                    <input type="password" name="password" id="password" required class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            <div class="mt-8 flex justify-end gap-4">
                <button type="submit" class="bg-green-500 text-white font-bold py-2 px-6 rounded-lg hover:bg-green-600 transition duration-300">Simpan Password</button>
            </div>
        </form>
    </div>
@endsection
