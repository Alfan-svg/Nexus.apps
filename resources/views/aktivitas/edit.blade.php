@extends('dashboard')

@section('title', 'Edit Event - Nexus')
@section('page-title', 'Aktivitas/Detail/Edit')

@section('content')
<div class="space-y-6">

    <!-- Header -->
    <div class="ml-6 flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-800">Edit Event</h2>
    </div>
    
    <!-- Form Edit Event (STATIS) -->
    <div class="bg-white rounded-xl shadow-lg p-8">
        <form>
            @csrf
            @method('GET')
            
            <div class="space-y-6">
                <!-- Nama Event -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Event <span class="text-red-500">*</span></label>
                    <input type="text" name="nama_event" value="KEMPING CERIA" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Masukkan nama event">
                </div>

                <!-- Deskripsi Event -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Event</label>
                    <textarea name="deskripsi" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Masukkan deskripsi event">• Membuat karier baru melalui pengalaman yang mendalam.
• Cerita bersama dengan teman-teman di Puncak Bogor.
• Akan banyak agenda yang seru untuk diikuti.</textarea>
                </div>

                <!-- Tanggal dan Waktu (BERJAJAR) -->
                <div class="grid grid-cols-2 gap-4">
                    <!-- Tanggal -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal <span class="text-red-500">*</span></label>
                        <input type="date" name="tanggal" value="2025-06-27" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                    </div>
                    <!-- Waktu -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Waktu <span class="text-red-500">*</span></label>
                        <input type="time" name="waktu" value="08:00" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                    </div>
                </div>

                <!-- Lokasi Event -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi Event <span class="text-red-500">*</span></label>
                    <input type="text" name="lokasi" value="Vivo Bogor, Jl. Raya Ciawi-Bogor No.Km. 50, Cimandala, Kec. Sukaraja, Kabupaten Bogor" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Masukkan lokasi event">
                </div>

                <!-- Kuota Member -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kuota Member <span class="text-red-500">*</span></label>
                    <input type="number" name="kuota" value="40" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Maksimal peserta" min="1">
                </div>

                <!-- Upload Poster Event -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Poster Event</label>
                    
                    <div class="mb-3">
                        <div class="bg-gradient-to-br from-blue-100 to-purple-100 rounded-lg h-32 w-32 flex items-center justify-center">
                            <i class="fas fa-campground text-4xl text-blue-500"></i>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Poster saat ini</p>
                    </div>
                    
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-500 transition-colors">
                        <div class="space-y-2">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400"></i>
                            <p class="text-sm text-gray-500">Klik untuk ganti poster</p>
                            <p class="text-xs text-gray-400">PNG, JPG, JPEG (Max. 2MB)</p>
                            <input type="file" class="hidden" id="poster" name="poster" accept="image/*">
                            <button type="button" id="uploadBtn" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm transition-colors">
                                Pilih File
                            </button>
                        </div>
                    </div>
                    <div id="preview" class="mt-2 hidden">
                        <img src="#" alt="Preview Poster" class="h-32 rounded-lg">
                    </div>
                </div>

                <!-- Informasi Tambahan -->
                <div class="bg-blue-50 p-4 rounded-lg">
                    <h4 class="text-sm font-semibold text-blue-700 mb-2 flex items-center gap-2">
                        <i class="fas fa-info-circle"></i>
                        Informasi
                    </h4>
                    <p class="text-xs text-blue-600">Field dengan tanda <span class="text-red-500">*</span> wajib diisi</p>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                     <a href="{{ route('aktivitas') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Batal
                    </a>
                    <a href="{{ route('aktivitas.update') }}" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg flex items-center gap-2 transition-colors">
                        Update
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Script untuk Preview Gambar (copy dari create) -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const posterInput = document.getElementById('poster');
        const uploadBtn = document.getElementById('uploadBtn');
        
        if (uploadBtn) {
            uploadBtn.addEventListener('click', function() {
                posterInput.click();
            });
        }
        
        if (posterInput) {
            posterInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const preview = document.getElementById('preview');
                        if (preview) {
                            preview.classList.remove('hidden');
                            const img = preview.querySelector('img');
                            if (img) {
                                img.src = e.target.result;
                            }
                        }
                    }
                    reader.readAsDataURL(file);
                }
            });
        }
    });
</script>
@endsection