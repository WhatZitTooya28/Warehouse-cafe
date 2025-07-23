{{-- resources/views/users/reset-password.blade.php --}}
@extends('layouts.app')

@section('title', 'Reset Password: ' . $user->nama_lengkap)

@section('content')
    <div class="p-6 bg-blue-600 text-white rounded-lg shadow-md mb-8">
        <h1 class="text-2xl font-bold">Reset Password : {{ $user->nama_lengkap }}</h1>
    </div>

    <div class="bg-white p-8 rounded-lg shadow-md">
        <div class="bg-gray-100 p-4 rounded-lg mb-6 text-gray-700 text-sm">
            <p>Anda akan mereset password untuk akun '<strong>{{ $user->username }}</strong>'.</p>
            <p>Password sementara akan dibuat secara otomatis.</p>
            <p>Pengguna akan diminta mengganti password saat login berikutnya.</p>
        </div>
        <form action="{{ route('users.reset-password.submit', $user->id) }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                    <input type="password" name="password" id="password" required class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            <div class="mt-8 flex justify-end gap-4">
                <a href="{{ route('users.edit', $user->id) }}" class="bg-red-500 text-white font-bold py-2 px-6 rounded-lg hover:bg-red-600 transition duration-300">Batal</a>
                <button type="submit" class="bg-green-500 text-white font-bold py-2 px-6 rounded-lg hover:bg-green-600 transition duration-300">Reset</button>
            </div>
        </form>
    </div>
@endsection
