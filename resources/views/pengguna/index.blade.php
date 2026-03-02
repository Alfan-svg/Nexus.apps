@extends('dashboard')

@section('title', 'Pengguna dan Peran - Nexus')
@section('page-title', 'Pengguna & Peran')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="ml-6 flex justify-between items-center">
        <a href="{{ route('pengguna.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-colors">
            Tambah User
            <i class="fas fa-plus"></i>
        </a>
    </div>

     {{-- NOTIFIKASI SUKSES -- TARUH DI SINI --}}
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


    <!-- Card Daftar Pengguna -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Kelola Pengguna</h3>
        
        <!-- Table Pengguna -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No Telepon</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengguna</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Row 1 -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm text-gray-800">01</td>
                        <td class="px-4 py-3 text-sm text-gray-800">Fulan</td>
                        <td class="px-4 py-3 text-sm text-gray-800">fulan@gmail.com</td>
                        <td class="px-4 py-3 text-sm text-gray-600">0897654321</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs bg-blue-100 text-blue-600 rounded-full">Admin</span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex gap-3">
                                <a href="{{ route('pengguna.edit') }}" class="text-green-600 hover:text-green-800 flex items-center gap-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                    <span class="text-sm">Edit</span>
                                </a>
                                <button onclick="openDeleteModal()" class="text-red-600 hover:text-red-800 flex items-center gap-1" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                    <span class="text-sm">Hapus</span>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm text-gray-800">02</td>
                        <td class="px-4 py-3 text-sm text-gray-800">Adella Aprillia</td>
                        <td class="px-4 py-3 text-sm text-gray-800">adella@gmail.com</td>
                        <td class="px-4 py-3 text-sm text-gray-600">0812345678</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs bg-green-100 text-green-600 rounded-full">Pengguna</span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex gap-3">
                                <button class="text-green-600 hover:text-green-800" title="Edit">
                                    <i class="fas fa-edit"></i>
                                    <span class="text-sm">Edit</span>
                                </button>
                                <button class="text-red-600 hover:text-red-800" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                    <span class="text-sm">Hapus</span>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm text-gray-800">03</td>
                        <td class="px-4 py-3 text-sm text-gray-800">Alfan Nur Khasani</td>
                        <td class="px-4 py-3 text-sm text-gray-800">alfan@gmail.com</td>
                        <td class="px-4 py-3 text-sm text-gray-600">0876543210</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs bg-green-100 text-green-600 rounded-full">Pengguna</span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex gap-3">
                                <button class="text-green-600 hover:text-green-800" title="Edit">
                                    <i class="fas fa-edit"></i>
                                    <span class="text-sm">Edit</span>
                                </button>
                                <button class="text-red-600 hover:text-red-800" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                    <span class="text-sm">Hapus</span>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 4 -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm text-gray-800">04</td>
                        <td class="px-4 py-3 text-sm text-gray-800">Airlangga Wibowo</td>
                        <td class="px-4 py-3 text-sm text-gray-800">airlangga@gmail.com</td>
                        <td class="px-4 py-3 text-sm text-gray-600">0856781234</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs bg-green-100 text-green-600 rounded-full">Pengguna</span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex gap-3">
                                <button class="text-green-600 hover:text-green-800" title="Edit">
                                    <i class="fas fa-edit"></i>
                                    <span class="text-sm">Edit</span>
                                </button>
                                <button class="text-red-600 hover:text-red-800" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                    <span class="text-sm">Hapus</span>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 5 -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm text-gray-800">05</td>
                        <td class="px-4 py-3 text-sm text-gray-800">Bona Firmanto</td>
                        <td class="px-4 py-3 text-sm text-gray-800">bona@gmail.com</td>
                        <td class="px-4 py-3 text-sm text-gray-600">0823456789</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs bg-green-100 text-green-600 rounded-full">Pengguna</span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex gap-3">
                                <button class="text-green-600 hover:text-green-800" title="Edit">
                                    <i class="fas fa-edit"></i>
                                    <span class="text-sm">Edit</span>
                                </button>
                                <button class="text-red-600 hover:text-red-800" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                    <span class="text-sm">Hapus</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-between items-center mt-6 pt-4 border-t border-gray-200">
            <p class="text-sm text-gray-500">Menampilkan 1-5 dari 25 pengguna</p>
            <div class="flex gap-2">
                <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50" disabled>
                    <i class="fas fa-chevron-left text-sm"></i>
                </button>
                <button class="w-10 h-10 flex items-center justify-center rounded-lg bg-blue-600 text-white">1</button>
                <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50">2</button>
                <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50">3</button>
                <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50">
                    <i class="fas fa-chevron-right text-sm"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-2xl max-w-md w-full mx-4">
        <div class="p-6">
            <!-- Ikon Peringatan -->
            <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
            </div>
            
            <!-- Judul -->
            <h3 class="text-xl font-bold text-gray-800 text-center mb-2">Hapus User</h3>
            
            <!-- Pesan -->
            <p class="text-gray-600 text-center mb-6">
                Apakah Anda yakin ingin menghapus user ini?<br>
            </p>
            
            <!-- Tombol Aksi -->
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
        window.location.href = "{{ route('pengguna.delete') }}";
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