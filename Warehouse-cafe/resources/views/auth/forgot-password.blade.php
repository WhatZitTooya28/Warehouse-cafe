<x-guest-layout>
    <!-- Definisikan Ilustrasi -->
    <x-slot name="illustration">
        <img src="https://placehold.co/400x350/1F2A40/FFFFFF?text=Ilustrasi+Lupa+Password" alt="Ilustrasi Lupa Password" class="max-w-full h-auto">
    </x-slot>

    <h2 class="text-3xl font-bold text-gray-800 mb-4">Lupa Password</h2>
    <p class="text-gray-600 mb-6 text-sm">
        Lupa password? Tidak masalah. Beri tahu kami alamat email Anda dan kami akan mengirimkan link untuk mengatur ulang password Anda.
    </p>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="relative mb-6">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </span>
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus placeholder="Email" class="w-full pl-10 custom-placeholder" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <x-primary-button class="w-full justify-center text-base">
            Kirim Link Reset Password
        </x-primary-button>

        <p class="text-center text-sm text-gray-500 mt-4">
            Kembali ke <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">Masuk</a>
        </p>
    </form>
</x-guest-layout>
