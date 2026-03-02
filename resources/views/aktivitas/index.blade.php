@extends('dashboard')

@section('title', 'Aktivitas - Nexus')
@section('page-title', 'Aktivitas')

@section('content')
<div class="space-y-6">

<!-- POPUP NOTIFIKASI SUKSES -->
        @if(session('success'))
        <div id="successAlert" class="fixed top-20 right-6 z-50 max-w-md">
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-lg flex items-center justify-between gap-4">
                <div class="flex items-center gap-2">
                    <i class="fas fa-check-circle text-green-500"></i>
                    <span>{{ session('success') }}</span>
                </div>
                <button onclick="this.parentElement.parentElement.remove()" class="text-green-700 hover:text-green-900">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <script>
            setTimeout(function() {
                const alert = document.getElementById('successAlert');
                if (alert) {
                    alert.style.transition = 'opacity 0.5s';
                    alert.style.opacity = '0';
                    setTimeout(function() {
                        if (alert && alert.parentNode) {
                            alert.remove();
                        }
                    }, 500);
                }
            }, 3000);
        </script>
        @endif
        <!-- Tombol Tambah Event -->
        <div class="ml-6 flex justify-start mt-4">
            <a href="{{ route('aktivitas.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-colors">
                Tambah Event
                <i class="fas fa-plus"></i>
            </a>
        </div>

    <!-- Card Besar untuk Semua Event -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Daftar Event</h3>
        
        <!-- Grid 3 Kolom untuk Cards Event di DALAM Card Besar -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Seminar Tech (Terjadwal) -->
        <div class="overflow-hidden hover:shadow-md">
            <!-- Gambar -->
            <div class="w-full h-48 bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center">
                <i class="fas fa-laptop text-5xl text-blue-500"></i>
                <!-- Atau pakai gambar real: -->
                <!-- <img src="{{ asset('images/seminar.jpg') }}" alt="Seminar Tech" class="w-full h-full object-cover"> -->
            </div>
            
            <div class="p-5">
                <!-- Judul Kegiatan -->
                <h3 class="text-xl font-bold text-gray-800 mb-2">Seminar Tech</h3>
                
                <!-- Deskripsi Kegiatan -->
                <p class="text-sm text-gray-600 mb-4">Seminar Tech diisi oleh pemateri profesional di bidang Web Development.</p>
                
                <!-- Bagian Bawah: Status dan Tombol Lihat -->
                <div class="flex justify-between items-center">
                    <span class="text-xs font-semibold px-3 py-1 text-green-600">
                        <i class="fas fa-calendar"></i>
                        Terjadwal
                    </span>

                    <a href="{{ route('aktivitas.detail') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-full flex items-center gap-2 transition-colors duration-200 shadow-sm hover:shadow">
                        Lihat
                    </a>
                </div>
            </div>
        </div>

            <!-- Card 2: Kemping Ceria (Terjadwal) -->
            <div class="overflow-hidden hover:shadow-md">
                <!-- Gambar -->
                <div class="w-full h-48 bg-gradient-to-br from-green-100 to-yellow-100 flex items-center justify-center">
                    <i class="fas fa-campground text-5xl text-green-500"></i>
                </div>
                
                <div class="p-5">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Kemping Ceria</h3>
                    <p class="text-sm text-gray-600 mb-4">Kegiatan mengisi sela-sela libur kuliah yang diikuti IF23H.</p>
                    
                    <div class="flex justify-between items-center">
                        <span class="text-xs font-semibold px-3 py-1 text-green-600 flex items-center gap-1">
                            <i class="fas fa-calendar"></i>
                            Terjadwal
                        </span>
                        <a href="{{ route('aktivitas.detail') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-full flex items-center gap-2 transition-colors duration-200 shadow-sm hover:shadow">
                            Lihat
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 3: IF Sport Competition (Berlangsung) -->
            <div class="overflow-hidden hover:shadow-md">
                <!-- Gambar -->
                <div class="w-full h-48 bg-gradient-to-br from-red-100 to-orange-100 flex items-center justify-center">
                    <i class="fas fa-futbol text-5xl text-red-500"></i>
                </div>
                
                <div class="p-5">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">IF Sport Competition</h3>
                    <p class="text-sm text-gray-600 mb-4">Lomba yang diselenggarakan Prodi Informatika.</p>
                    
                    <div class="flex justify-between items-center">
                        <span class="text-xs font-semibold px-3 py-1 text-yellow-600 flex items-center gap-1">
                            <i class="fas fa-play-circle"></i>
                            Berlangsung
                        </span>
                        <a href="{{ route('aktivitas.detail') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-full flex items-center gap-2 transition-colors duration-200 shadow-sm hover:shadow">
                            Lihat
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 4: Main Boardgame (Berlangsung) -->
            <div class="overflow-hidden hover:shadow-md">
                <!-- Gambar -->
                <div class="w-full h-48 bg-gradient-to-br from-purple-100 to-pink-100 flex items-center justify-center">
                    <i class="fas fa-dice text-5xl text-purple-500"></i>
                </div>
                
                <div class="p-5">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Main Boardgame</h3>
                    <p class="text-sm text-gray-600 mb-4">Kegiatan bermain sambil menunggu mata kuliah selanjutnya.</p>
                    
                    <div class="flex justify-between items-center">
                        <span class="text-xs font-semibold px-3 py-1 text-yellow-600 flex items-center gap-1">
                            <i class="fas fa-play-circle"></i>
                            Berlangsung
                        </span>
                        <a href="{{ route('aktivitas.detail') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-full flex items-center gap-2 transition-colors duration-200 shadow-sm hover:shadow">
                            Lihat
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 5: Seminar Tech (Aktivitas Selesai) -->
            <div class="overflow-hidden hover:shadow-md">
                <!-- Gambar -->
                <div class="w-full h-48 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                    <i class="fas fa-laptop text-5xl text-gray-500"></i>
                </div>
                
                <div class="p-5">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Seminar Tech</h3>
                    <p class="text-sm text-gray-600 mb-4">Seminar Tech diisi oleh pemateri profesional di bidang Web Development.</p>
                    
                    <div class="flex justify-between items-center">
                        <span class="text-xs font-semibold px-3 py-1 text-gray-600 flex items-center gap-1">
                            <i class="fas fa-check-circle"></i>
                            Aktivitas Selesai
                        </span>
                        <a href="{{ route('aktivitas.detail') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-full flex items-center gap-2 transition-colors duration-200 shadow-sm hover:shadow">
                            Lihat
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 6: Kumpul Semester (Aktivitas Selesai) -->
            <div class="overflow-hidden hover:shadow-md">
                <!-- Gambar -->
                <div class="w-full h-48 bg-gradient-to-br from-indigo-100 to-blue-100 flex items-center justify-center">
                    <i class="fas fa-users text-5xl text-indigo-500"></i>
                </div>
                
                <div class="p-5">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Kumpul Semester</h3>
                    <p class="text-sm text-gray-600 mb-4">Meluangkan waktu untuk mengisi liburan semester.</p>
                    
                    <div class="flex justify-between items-center">
                        <span class="text-xs font-semibold px-3 py-1 text-gray-600 flex items-center gap-1">
                            <i class="fas fa-check-circle"></i>
                            Aktivitas Selesai
                        </span>
                        <a href="{{ route('aktivitas.detail') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-full flex items-center gap-2 transition-colors duration-200 shadow-sm hover:shadow">
                            Lihat
                        </a>
                    </div>
                </div>
            </div>
        </div>

            <!-- PAGINATION DI DALAM CARD BESAR -->
        <div class="flex justify-between items-center mt-8 pt-4 border-t border-gray-200">
                <!-- Kiri: Showing entries (tetap di kiri) -->
            <div class="text-sm text-gray-500">
                    Showing <span class="font-medium">1</span> to <span class="font-medium">6</span> of <span class="font-medium">12</span> entries
                </div>
                
                <!-- Kanan: Pagination buttons (di kanan) -->
                <div class="flex gap-2">
                    <button class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 text-gray-500 hover:bg-gray-50 disabled:opacity-50" disabled>
                        <i class="fas fa-chevron-left text-sm"></i>
                    </button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-600 text-white">1</button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 text-gray-500 hover:bg-gray-50">2</button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 text-gray-500 hover:bg-gray-50">3</button>
                    <button class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 text-gray-500 hover:bg-gray-50">
                        <i class="fas fa-chevron-right text-sm"></i>
                    </button>
                </div>
            </div>
@endsection