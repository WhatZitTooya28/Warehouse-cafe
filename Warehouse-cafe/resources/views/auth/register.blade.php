<x-guest-layout>
    {{-- Menggunakan @section untuk mengirim ilustrasi ke layout induk --}}
    @section('illustration')
        <img src="https://i.imgur.com/r6nBwYh.png" alt="Ilustrasi Daftar" class="max-w-full h-auto">
    @endsection

    <h2 class="text-3xl font-bold text-gray-800 mb-6">Daftar</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Input Email -->
        <div class="relative mb-4">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </span>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email"
                   class="w-full pl-10 pr-4 py-3 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 custom-placeholder">
        </div>

        <!-- Input Username -->
        <div class="relative mb-4">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            </span>
            <input id="username" type="text" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Username"
                   class="w-full pl-10 pr-4 py-3 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 custom-placeholder">
        </div>

        <!-- Input Password -->
        <div class="relative mb-4">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            </span>
            <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Password"
                   class="w-full pl-10 pr-4 py-3 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 custom-placeholder">
        </div>
        
        <!-- Input Konfirmasi Password -->
        <div class="relative mb-4">
             <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            </span>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password"
                   class="w-full pl-10 pr-4 py-3 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 custom-placeholder">
        </div>

        <!-- Input Role -->
        <div class="relative mb-6">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
               <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </span>
            <select name="role" id="role" required class="w-full pl-10 pr-4 py-3 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-500 font-medium appearance-none custom-placeholder">
                <option value="" disabled selected>Role</option>
                <option value="admin">Admin</option>
                <option value="user">Karyawan</option>
            </select>
        </div>

        <!-- Tombol Daftar -->
        <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-3 rounded-lg hover:bg-indigo-700 transition duration-300">
            Daftar
        </button>

        <!-- Link ke Masuk -->
        <p class="text-center text-sm text-gray-500 mt-4">
            Sudah Punya Akun ? <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">Masuk</a>
        </p>
    </form>

    <!-- Script SweetAlert2 untuk menampilkan notifikasi pop-up -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops! Terjadi kesalahan',
                html: `
                    <ul class="text-left list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                `,
                confirmButtonColor: '#4F46E5', // Warna tombol indigo
            });
        </script>
    @endif
</x-guest-layout>
