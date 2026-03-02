@extends('dashboard')

@section('title', 'Tambah User - Nexus')
@section('page-title', 'Pengguna & Peran/Tambah User')

@section('content')
<div class="space-y-6">

    <!-- Header -->
    <div class="ml-6 flex justify-between items-center">
        <h2 class="text-xl font-bold text-gray-800">Tambah User Baru</h2>
    </div>

    <!-- Form Tambah User -->
    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="{{ route('pengguna.store') }}" method="POST">
            @csrf
            
            <div class="space-y-6">
                <!-- Nama Lengkap -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="nama" value="{{ old('nama') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Masukkan nama lengkap">
                    @error('nama') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Masukkan email">
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Password dan Konfirmasi Password (SEJAJAR) -->
                <div class="grid grid-cols-2 gap-4">
                    <!-- Password -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Password <span class="text-red-500">*</span></label>
                        <input type="password" name="password" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Minimal 6 karakter">
                        @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Konfirmasi Password -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password <span class="text-red-500">*</span></label>
                        <input type="password" name="password_confirmation" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Ulangi password">
                    </div>
                </div>

                <!-- Nomor Telepon -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon <span class="text-red-500">*</span></label>
                    <input type="text" name="telepon" value="{{ old('telepon') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Masukkan nomor telepon">
                    @error('telepon') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Peran -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Peran <span class="text-red-500">*</span></label>
                    <select name="role" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                        <option value="">Pilih Peran</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="pengguna" {{ old('role') == 'pengguna' ? 'selected' : '' }}>Pengguna Biasa</option>
                    </select>
                    @error('role') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Tombol Aksi (Batal & Simpan) -->
                <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                    <a href="{{ route('pengguna') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg flex items-center gap-2 transition-colors">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection