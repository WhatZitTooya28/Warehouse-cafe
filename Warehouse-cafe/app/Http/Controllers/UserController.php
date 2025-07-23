<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        // Mulai query ke model User, tapi jangan ambil datanya dulu
        $query = User::where('id', '!=', auth()->id());

        // Cek apakah ada input pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                ->orWhere('username', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Cek apakah ada filter role yang dipilih
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        // Ambil data setelah semua filter diterapkan, lalu paginasi
        // withQueryString() penting agar filter tetap aktif saat pindah halaman paginasi
        $users = $query->latest()->paginate(10)->withQueryString();

        return view('users.index', compact('users'));
    }


    public function create(): View
    {
        return view('users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telepon' => ['nullable', 'string', 'max:15'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:admin,kasir'],
            'status' => ['required', 'in:aktif,tidak aktif'],
        ]);

        User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => $request->status,
        ]);

        return redirect()->route('users.index')->with('success', 'User baru berhasil ditambahkan.');
    }

    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username,'.$user->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'telepon' => ['nullable', 'string', 'max:15'],
            'role' => ['required', 'in:admin,kasir'],
            'status' => ['required', 'in:aktif,tidak aktif'],
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'Data user berhasil diperbarui.');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }

    // --- METHOD BARU UNTUK MENAMPILKAN FORM RESET PASSWORD ---
    public function showResetForm(User $user): View
    {
        return view('users.reset-password', compact('user'));
    }

    // --- METHOD BARU UNTUK MEMPROSES RESET PASSWORD ---
    public function resetPassword(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('users.index')->with('success', 'Password untuk user ' . $user->nama_lengkap . ' berhasil direset.');
    }
}
