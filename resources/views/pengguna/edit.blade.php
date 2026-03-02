@extends('dashboard')

@section('title', 'Edit User - Nexus')
@section('page-title', 'Pengguna & Peran/Edit')

@section('content')
<div class="space-y-6">

    <!-- Header -->
    <div class="ml-6 flex justify-between items-center">
        <h2 class="text-xl font-bold text-gray-800">Edit User</h2>
    </div>

    <!-- Form Edit User (STATIS) -->
    <div class="bg-white rounded-xl shadow-lg p-8">
        <form>
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                <!-- Nama Lengkap -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="nama" value="Fulan" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Masukkan nama lengkap">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" value="fulan@gmail.com" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Masukkan email">
                </div>

                <!-- Password dan Konfirmasi Password (SEJAJAR) -->
                <div class="grid grid-cols-2 gap-4">
                    <!-- Password -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Password Baru</label>
                        <input type="password" name="password" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Kosongkan jika tidak diubah">
                    </div>

                    <!-- Konfirmasi Password -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Ulangi password baru">
                    </div>
                </div>
                <p class="text-xs text-gray-500 -mt-2">*Kosongkan jika tidak ingin mengubah password</p>

                <!-- Nomor Telepon -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon <span class="text-red-500">*</span></label>
                    <input type="text" name="telepon" value="0897654321" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Masukkan nomor telepon">
                </div>

                <!-- Peran -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Peran <span class="text-red-500">*</span></label>
                    <select name="role" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                        <option value="admin" selected>Admin</option>
                        <option value="pengguna">Pengguna Biasa</option>
                    </select>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                    <a href="{{ route('pengguna') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Batal
                    </a>
                    <a href="{{ route('pengguna.update') }}" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg flex items-center gap-2 transition-colors">
                        Update
                    </a>
                </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection