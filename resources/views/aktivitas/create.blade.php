@extends('dashboard')

@section('title', 'Tambah Event - Nexus')
@section('page-title', 'Aktivitas/Tambah Event')

@section('content')
<div class="space-y-6">

    <!-- Header -->
    <div class="ml-6 flex justify-between items-center">
        <h2 class="text-xl font-bold text-gray-800">Tambah Event</h2>
    </div>

    <!-- Form Tambah Event dalam Card -->
    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="{{ route('aktivitas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Form 1 Kolom (ke bawah) -->
            <div class="space-y-6">
                <!-- Nama Event -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Event <span class="text-red-500">*</span></label>
                    <input type="text" name="nama_event" value="{{ old('nama_event') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Masukkan nama event">
                </div>

                <!-- Deskripsi Event -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Event</label>
                    <textarea name="deskripsi" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Masukkan deskripsi event">{{ old('deskripsi') }}</textarea>
                </div>

                <!-- Tanggal dan Waktu (BERJAJAR) -->
                <div class="grid grid-cols-2 gap-4">
                    <!-- Tanggal -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal <span class="text-red-500">*</span></label>
                        <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                    </div>
                    <!-- Waktu -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Waktu <span class="text-red-500">*</span></label>
                        <input type="time" name="waktu" value="{{ old('waktu') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500">
                    </div>
                </div>

                <!-- Lokasi Event -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi Event <span class="text-red-500">*</span></label>
                    <input type="text" name="lokasi" value="{{ old('lokasi') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Masukkan lokasi event">
                </div>

                <!-- Kuota Member -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kuota Member <span class="text-red-500">*</span></label>
                    <input type="number" name="kuota" value="{{ old('kuota') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500" placeholder="Maksimal peserta" min="1">
                </div>

                <!-- Upload Poster Event -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Poster Event</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-500 transition-colors">
                        <div class="space-y-2">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400"></i>
                            <p class="text-sm text-gray-500">Klik atau drag & drop untuk upload poster</p>
                            <p class="text-xs text-gray-400">PNG, JPG, JPEG (Max. 2MB)</p>
                            <input type="file" class="hidden" id="poster" name="poster" accept="image/*">
                            <button type="button" id="uploadBtn" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm transition-colors">
                                Pilih File
                            </button>
                        </div>
                    </div>
                    <!-- Preview Gambar (akan muncul setelah pilih file) -->
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

                <!-- Tombol Aksi (Batal & Simpan) -->
                <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                    <a href="{{ route('aktivitas') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg flex items-center gap-2 transition-colors">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
<!-- Script untuk Preview Gambar -->
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