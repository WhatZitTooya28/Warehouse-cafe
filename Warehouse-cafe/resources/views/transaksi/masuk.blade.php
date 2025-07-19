<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaksi Barang Masuk - {{ config('app.name', 'Laravel') }}</title>
    {{-- Salin semua isi <head> dari file dashboard.blade.php Anda ke sini --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-gray-100 antialiased">
    <div x-data="{ sidebarOpen: true }" class="flex h-screen bg-gray-200">
  <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="w-64 bg-[#2D3748] text-white flex flex-col fixed inset-y-0 left-0 transform transition duration-300 ease-in-out md:relative md:translate-x-0 z-30">
            <div class="p-4 flex items-center space-x-4 border-b border-gray-700 h-20 shrink-0">
                <img class="h-10 w-10 rounded-full object-cover" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&color=FFFFFF&background=4A5568" alt="User Avatar">
                <div>
                    <p class="font-semibold text-sm">{{ Auth::user()->username }}</p>
                    <p class="text-xs text-gray-400 capitalize">{{ Auth::user()->role }}</p>
                </div>
            </div>

            <nav class="flex-1 px-2 py-4 space-y-1 overflow-y-auto no-scrollbar">
                <a href="{{ route('dashboard') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-lg font-semibold 
                          {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700' }}">
                    <i class="fa-solid fa-house w-6 text-center"></i>
                    <span>Dashboard</span>
                </a>
                
                <p class="px-4 pt-4 pb-1 text-xs font-bold uppercase text-gray-400">Manajemen Barang</p>
                <div x-data="{ open: {{ request()->routeIs('barang.*') || request()->routeIs('supplier.*') ? 'true' : 'false' }} }" class="space-y-1">
                    <button @click="open = !open" 
                            class="w-full flex items-center justify-between px-4 py-3 rounded-lg focus:outline-none 
                                   {{ request()->routeIs('barang.*') || request()->routeIs('supplier.*') ? 'text-white' : 'text-gray-300 hover:bg-gray-700' }}">
                        <div class="flex items-center space-x-3">
                            <i class="fa-solid fa-cubes-stacked w-6 text-center"></i>
                            <span>Barang</span>
                        </div>
                        <svg class="w-4 h-4 transform transition-transform duration-200" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" x-transition class="pl-8 space-y-1">
                        <a href="{{ route('barang.index') }}" 
                           class="flex items-center space-x-3 w-full text-left px-4 py-2 text-sm rounded-lg 
                                  {{ request()->routeIs('barang.index') ? 'text-white font-semibold' : 'text-gray-300 hover:bg-gray-700' }}">
                            <i class="fa-solid fa-box-archive w-5 text-center"></i>
                            <span>Data Barang</span>
                        </a>
                        <a href="{{ route('supplier.index') }}" 
                           class="flex items-center space-x-3 w-full text-left px-4 py-2 text-sm rounded-lg 
                                  {{ request()->routeIs('supplier.index') ? 'text-white font-semibold' : 'text-gray-300 hover:bg-gray-700' }}">
                            <i class="fa-solid fa-truck w-5 text-center"></i>
                            <span>Data Supplier</span>
                        </a>
                    </div>
                </div>

                    <p class="px-4 pt-4 pb-1 text-xs font-bold uppercase text-gray-400">Transaksi</p>
                    <a href="{{ route('transaksi.masuk') }}" 
                    class="flex items-center space-x-3 px-4 py-3 rounded-lg 
                            {{ request()->routeIs('transaksi.masuk') ? 'bg-blue-600 text-white font-semibold' : 'text-gray-300 hover:bg-gray-700' }}">
                        <i class="fa-solid fa-cart-arrow-down w-6 text-center"></i>
                        <span>Barang Masuk</span>
                    </a>
                    <a href="{{ route('transaksi.keluar') }}" 
                        class="flex items-center space-x-3 px-4 py-3 rounded-lg 
                            {{ request()->routeIs('transaksi.keluar') ? 'bg-blue-600 text-white font-semibold' : 'text-gray-300 hover:bg-gray-700' }}">
                        <i class="fa-solid fa-truck-ramp-box w-6 text-center"></i>
                        <span>Barang Keluar</span>
                    </a>

                <p class="px-4 pt-4 pb-1 text-xs font-bold uppercase text-gray-400">Laporan</p>
                <a href="{{ route('laporan.stok') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-300 hover:bg-gray-700 rounded-lg">
                    <i class="fa-solid fa-clipboard-list w-6 text-center"></i>
                    <span>Laporan Stok</span>
                </a>
                <a href="{{ route('laporan.masuk') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-300 hover:bg-gray-700 rounded-lg">
                    <i class="fa-solid fa-file-arrow-down w-6 text-center"></i>
                    <span>Laporan Barang Masuk</span>
                </a>
                <a href="{{ route('laporan.keluar') }}" class="flex items-center space-x-3 px-4 py-3 text-gray-300 hover:bg-gray-700 rounded-lg">
                    <i class="fa-solid fa-file-arrow-up w-6 text-center"></i>
                    <span>Laporan Barang Keluar</span>
                </a>

                <p class="px-4 pt-4 pb-1 text-xs font-bold uppercase text-gray-400">Pengaturan</p>
                <a href="#" class="flex items-center space-x-3 px-4 py-3 text-gray-300 hover:bg-gray-700 rounded-lg">
                    <i class="fa-solid fa-users w-6 text-center"></i>
                    <span>Manajemen User</span>
                </a>

                <p class="px-4 pt-4 pb-1 text-xs font-bold uppercase text-gray-400">Bantuan</p>
                <a href="#" class="flex items-center space-x-3 px-4 py-3 text-gray-300 hover:bg-gray-700 rounded-lg">
                    <i class="fa-solid fa-circle-question w-6 text-center"></i>
                    <span>Bantuan</span>
                </a>
            </nav>

             </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
              <header class="flex justify-between items-center p-4 sm:p-6 bg-white border-b-2 border-gray-200">
                 <div class="flex items-center">
                     <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none md:hidden">
                         <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                             <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                         </svg>
                     </button>
                 </div>
                 <div class="flex items-center">
                     <div x-data="{ dropdownOpen: false }" class="relative">
                         <button @click="dropdownOpen = ! dropdownOpen" class="relative block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none">
                             <img class="h-full w-full object-cover" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->username) }}&color=7F9CF5&background=EBF4FF" alt="Your avatar">
                         </button>
                         <div x-show="dropdownOpen" @click.away="dropdownOpen = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10" style="display: none;">
                              <form method="POST" action="{{ route('logout') }}">
                                 @csrf
                                 <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Logout</a>
                             </form>
                         </div>
                     </div>
                 </div>
             </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-4 sm:p-8">
                <!-- Header Konten Utama -->
                <div class="p-6 bg-blue-600 text-white rounded-lg shadow-md mb-8">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-white/20 rounded-full">
                            <i class="fa-solid fa-cart-arrow-down w-8 h-8 text-2xl"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold">Barang Masuk</h1>
                            <p class="text-sm text-blue-100">Menampilkan dan mengelola data barang yang masuk ke gudang.</p>
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi dan Filter -->
                <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
                    <a href="#" class="w-full sm:w-auto bg-blue-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300 flex items-center justify-center space-x-2">
                        <i class="fa-solid fa-plus"></i>
                        <span>Tambah Barang Masuk</span>
                    </a>
                    {{-- Filter & Search --}}
                </div>

                <!-- Tabel Data Barang Masuk -->
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
                                    <th class="px-6 py-3">Lokasi Simpan</th>
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
                                    <td class="px-6 py-4">{{ $transaksi->jumlah }}</td>
                                    <td class="px-6 py-4">{{ $transaksi->lokasi }}</td>
                                    <td class="px-6 py-4">{{ $transaksi->penerima_atau_tujuan }}</td>
                                    <td class="px-6 py-4 flex space-x-4">
                                        <a href="#" class="text-blue-600 hover:text-blue-900" title="Edit"><i class="fa-solid fa-pencil"></i></a>
                                        <a href="#" class="text-red-600 hover:text-red-900" title="Hapus"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">Tidak ada data barang masuk.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $transaksis->links() }}
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
