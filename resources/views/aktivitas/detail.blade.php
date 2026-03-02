@extends('dashboard')

@section('title', 'Detail Event - Nexus')
@section('page-title', 'Aktivitas/Detail')

@section('content')

    <div class="ml-6">
        <h4 class="text-xl font-bold text-gray-800 mb-4">Detail Event</h4>
    </div>
    

<!-- Konten Utama 100% -->
<div class="w-full space-y-6">
    <!-- Card Informasi Event dengan Gambar -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Bagian Kiri - Gambar -->
            <div class="md:w-1/3">
                <div class="bg-gradient-to-br from-blue-100 to-purple-100 rounded-lg h-48 md:h-64 flex items-center justify-center">
                    <i class="fas fa-campground text-6xl text-blue-500"></i>
                    <!-- Atau pakai gambar real: -->
                    <!-- <img src="{{ asset('images/kemping.jpg') }}" alt="Kemping Ceria" class="w-full h-full object-cover rounded-lg"> -->
                </div>
            </div>

            <!-- Bagian Kanan - Detail Event -->
            <div class="md:w-2/3 space-y-4">
                <!-- Nama Aktivitas sejajar dengan tombol -->
                 <div class="flex justify between items-center">
                <h3 class="text-3xl font-bold text-gray-800">KEMPING CERIA</h3>
                <div class="flex gap-2 ml-auto">
                  <a href="{{ route('aktivitas.edit') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center gap-1 transition-colors">
                    <i class="fas fa-edit"></i>
                    Edit
                </a>
                    <button onclick="openDeleteModal()" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg flex items-center gap-1 transition-colors">
                        <i class="fas fa-trash"></i>
                        Hapus
                    </button>
                </div>
            </div>

                <!-- Deskripsi -->
                <div class="space-y-2 text-gray-600">
                    <p>• Membuat karier baru melalui pengalaman yang mendalam.</p>
                    <p>• Cerita bersama dengan teman-teman di Puncak Bogor.</p>
                    <p>• Akan banyak agenda yang seru untuk diikuti.</p>
                </div>

               <!-- Informasi Tanggal dan Tempat -->
                <div class="space-y-3 mt-4">
                    <!-- Tanggal -->
                    <div class="flex items-start gap-3">
                        <i class="fas fa-calendar-alt text-blue-500 w-5 mt-1"></i>
                        <div>
                            <span class="text-sm text-gray-500">Tanggal:</span>
                            <span class="text-gray-800 ml-2">27 Juni 2025, 08:00</span>
                        </div>
                    </div>

                    <!-- Tempat -->
                    <div class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt text-green-500 w-5 mt-1"></i>
                        <div>
                            <span class="text-sm text-gray-500">Lokasi:</span>
                            <span class="text-gray-800 ml-2">Vivo Bogor, Jl. Raya Ciawi-Bogor No.Km. 50, Cimandala, Kec. Sukaraja, Kabupaten Bogor</span>
                        </div>
                    </div>
                </div>

                    <!-- Member Terdaftar -->
                    <div class="flex gap-40 mt-4">
                    <div class="flex items-start gap-3 p-3 bg-purple-50 rounded-lg">
                        <i class="fas fa-users text-purple-500 mt-1"></i>
                        <div>
                            <p class="text-xs text-gray-500">40 Member Terdaftar</p>
                        </div>
                    </div>

                    <!-- Member Hadir -->
                    <div class="flex items-start gap-3 p-3 bg-yellow-50 rounded-lg">
                        <i class="fas fa-check-circle text-yellow-500 mt-1"></i>
                        <div>
                            <p class="text-xs text-gray-500">21 Member Hadir</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

            <!-- Card Member yang Mengikuti (MASIH DALAM CARD BESAR) -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <!-- Header dengan Search dan Export -->
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Member yang Mengikuti Kemping Ceria</h3>
                    
                    <!-- Search Box -->
                    <div class="flex gap-3">
                        <div class="relative">
                            <input type="text" placeholder="Cari member..." 
                                class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500 w-64">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                            <i class="fas fa-download"></i> Export
                        </button>
                    </div>
                </div>
                
                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No Telepon</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kehadiran</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Row 1 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm text-gray-800">01</td>
                                <td class="px-4 py-3 text-sm text-gray-800">Fulan</td>
                                <td class="px-4 py-3 text-sm text-gray-600">Fulan@gmail.com</td>
                                <td class="px-4 py-3 text-sm text-gray-600">0897654321</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 text-xs bg-green-100 text-green-600 rounded-full">Ya</span>
                                </td>
                                <td class="px-4 py-3">
                                    <button class="text-gray-400 hover:text-blue-600 transition-colors" title="title Detail Member">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Row 2 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm text-gray-800">02</td>
                                <td class="px-4 py-3 text-sm text-gray-800">Fulan</td>
                                <td class="px-4 py-3 text-sm text-gray-600">Fulan@gmail.com</td>
                                <td class="px-4 py-3 text-sm text-gray-600">0897654321</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 text-xs bg-green-100 text-green-600 rounded-full">Ya</span>
                                </td>
                                <td class="px-4 py-3">
                                    <button class="text-gray-400 hover:text-blue-600 transition-colors" title="title Detail Member">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Row 3 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm text-gray-800">03</td>
                                <td class="px-4 py-3 text-sm text-gray-800">Fulan</td>
                                <td class="px-4 py-3 text-sm text-gray-600">Fulan@gmail.com</td>
                                <td class="px-4 py-3 text-sm text-gray-600">0897654321</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-600 rounded-full">Tidak</span>
                                </td>
                                <td class="px-4 py-3">
                                    <button class="text-gray-400 hover:text-blue-600 transition-colors" title="title Detail Member">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Row 4 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm text-gray-800">04</td>
                                <td class="px-4 py-3 text-sm text-gray-800">Fulan</td>
                                <td class="px-4 py-3 text-sm text-gray-600">Fulan@gmail.com</td>
                                <td class="px-4 py-3 text-sm text-gray-600">0897654321</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-600 rounded-full">Tidak</span>
                                </td>
                                <td class="px-4 py-3">
                                    <button class="text-gray-400 hover:text-blue-600 transition-colors" title="title Detail Member">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Row 5 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm text-gray-800">05</td>
                                <td class="px-4 py-3 text-sm text-gray-800">Fulan</td>
                                <td class="px-4 py-3 text-sm text-gray-600">Fulan@gmail.com</td>
                                <td class="px-4 py-3 text-sm text-gray-600">0897654321</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-600 rounded-full">Tidak</span>
                                </td>
                                <td class="px-4 py-3">
                                    <button class="text-gray-400 hover:text-blue-600 transition-colors" title="title Detail Member">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Row 6 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm text-gray-800">06</td>
                                <td class="px-4 py-3 text-sm text-gray-800">Fulan</td>
                                <td class="px-4 py-3 text-sm text-gray-600">Fulan@gmail.com</td>
                                <td class="px-4 py-3 text-sm text-gray-600">0897654321</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-600 rounded-full">Tidak</span>
                                </td>
                                <td class="px-4 py-3">
                                    <button class="text-gray-400 hover:text-blue-600 transition-colors" title="title Detail Member">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

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
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-2xl max-w-md w-full mx-4">
        <div class="p-6">
            <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
            </div>
            
            <h3 class="text-xl font-bold text-gray-800 text-center mb-2">Hapus Aktivitas</h3>
            
            <p class="text-gray-600 text-center mb-6">
                Apakah Anda yakin ingin menghapus <span class="font-semibold">KEMPING CERIA</span>?<br>
            </p>
            
            <div class="flex gap-3">
                <button onclick="closeDeleteModal()" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    Tidak
                </button>
                
                <button onclick="confirmDelete()" class="flex-1 px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors">
                    Ya, Hapus
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk Modal -->
<script>
    function openDeleteModal() {
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteModal').classList.add('flex');
    }
    
    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
        document.getElementById('deleteModal').classList.remove('flex');
    }
    
    function confirmDelete() {
        // Untuk sementara hanya close modal
        window.location.href = "{{ route('aktivitas.delete') }}";

    }
    
    // Tutup modal jika klik di luar modal
    window.onclick = function(event) {
        const modal = document.getElementById('deleteModal');
        if (event.target == modal) {
            closeDeleteModal();
        }
    }
</script>
@endsection