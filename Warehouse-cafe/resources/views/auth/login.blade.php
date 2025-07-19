<x-guest-layout>
    {{-- Menggunakan @section untuk mengirim ilustrasi spesifik ke layout induk --}}
    @section('illustration')
        <img src="https://i.imgur.com/O3s5p1j.png" alt="Ilustrasi Login" class="max-w-full h-auto">
    @endsection

    <h2 class="text-3xl font-bold text-gray-800 mb-6">Masuk</h2>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="relative mb-4">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            </span>
            <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus autocomplete="username" placeholder="Username"
                   class="w-full pl-10 pr-4 py-3 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 custom-placeholder">
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <div class="relative mb-4">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            </span>
            <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Password"
                   class="w-full pl-10 pr-4 py-3 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 custom-placeholder">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="relative mb-4">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
               <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </span>
            <select name="role" id="role" required class="w-full pl-10 pr-4 py-3 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-500 font-medium appearance-none custom-placeholder">
                <option value="" disabled selected>Pilih Role</option>
                <option value="admin">Admin</option>
                <option value="kasir">Kasir</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div class="text-right mb-6">
            @if (Route::has('password.request'))
                <a class="text-sm font-medium text-indigo-600 hover:text-indigo-500" href="{{ route('password.request') }}">
                    Lupa Password ?
                </a>
            @endif
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-3 rounded-lg hover:bg-indigo-700 transition duration-300">
            Masuk
        </button>

    </form>
</x-guest-layout>
