@extends('dashboard')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')
@section('content')
<div class="p-8">
    <!-- 4 Stats Card -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <!-- Card 1: Aktivitas Berlangsung -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Aktivitas Berlangsung</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">4</p>
            </div>
            <div class="bg-green-100 p-3 rounded-full">
                <i class="fas fa-calendar-alt text-green-500 text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Card 2: Aktivitas Selesai -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Aktivitas Selesai</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">14</p>
            </div>
            <div class="bg-blue-100 p-3 rounded-full">
                <i class="fas fa-calendar-check text-blue-500 text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Card 3: Total Aktivitas -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Total Aktivitas</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">20</p>
            </div>
            <div class="bg-purple-100 p-3 rounded-full">
                <i class="fas fa-chart-bar text-purple-500 text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Card 4: Total Member -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Total Member</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">34</p>
            </div>
            <div class="bg-orange-100 p-3 rounded-full">
                <i class="fas fa-users text-orange-500 text-2xl"></i>
            </div>
        </div>
    </div>
</div>

<div class="flex flex-wrap lg:flex-nowrap gap-6 mb-8">
    <!-- Kolom Kiri (70%) - 2 Card Atas Bawah -->
    <div class="w-full lg:w-7/12 space-y-6">
        <!-- Card 1: Statistik Event dengan Dropdown Tahun (ATAS) -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-700">Statistik Event</h3>
                <!-- Dropdown Tahun -->
                <select class="border border-gray-300 rounded-lg px-3 py-1 text-sm focus:outline-none focus:border-blue-500">
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                </select>
            </div>
            
            <!-- Card Utama -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Jumlah Event Selesai</p>
                        <p class="text-4xl font-bold text-gray-800">20</p>
                        <p class="text-sm text-green-600 mt-2">
                            <i class="fas fa-arrow-up mr-1"></i>+12% dari tahun lalu
                        </p>
                    </div>
                    <div class="bg-blue-100 p-4 rounded-full">
                        <i class="fas fa-calendar-check text-blue-500 text-3xl"></i>
                    </div>
                </div>
                
                <!-- Statistik Bulanan (Mini Bar Chart) -->
                <div class="mt-6 grid grid-cols-4 gap-2">
                    <div class="text-center">
                        <div class="bg-blue-200 rounded-lg w-full mb-1" style="height: 40px;"></div>
                        <span class="text-xs text-gray-500">Jan</span>
                    </div>
                    <div class="text-center">
                        <div class="bg-blue-300 rounded-lg w-full mb-1" style="height: 65px;"></div>
                        <span class="text-xs text-gray-500">Feb</span>
                    </div>
                    <div class="text-center">
                        <div class="bg-blue-400 rounded-lg w-full mb-1" style="height: 55px;"></div>
                        <span class="text-xs text-gray-500">Mar</span>
                    </div>
                    <div class="text-center">
                        <div class="bg-blue-500 rounded-lg w-full mb-1" style="height: 80px;"></div>
                        <span class="text-xs text-gray-500">Apr</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Pie Chart Aktivitas (BAWAH) -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Statistik Aktivitas</h3>
            
            <div class="flex flex-col md:flex-row items-center">
                <!-- Canvas untuk Pie Chart -->
                <div class="w-48 h-48 mb-4 md:mb-0">
                    <canvas id="activityChart"></canvas>
                </div>
                
                <!-- Legend/Detail -->
                <div class="md:ml-6 flex-1">
                    <div class="mb-3">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <span class="w-3 h-3 bg-green-500 rounded-full mr-2"></span>
                                <span class="text-sm text-gray-600">Selesai</span>
                            </div>
                            <span class="font-semibold">1.450</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                            <div class="bg-green-500 rounded-full h-2" style="width: 70%"></div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <span class="w-3 h-3 bg-blue-500 rounded-full mr-2"></span>
                                <span class="text-sm text-gray-600">Sedang Berlangsung</span>
                            </div>
                            <span class="font-semibold">582</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                            <div class="bg-blue-500 rounded-full h-2" style="width: 28%"></div>
                        </div>
                    </div>
                    
                    <div class="mt-4 pt-3 border-t border-gray-100">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Total Aktivitas</span>
                            <span class="font-bold text-gray-800">2.032</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kolom Kanan (30%) - 2 Card Event Berlangsung -->
    <div class="w-full lg:w-5/12 space-y-6">
        <!-- Card 3: Event Sedang Berlangsung -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Event Sedang Berlangsung</h3>
            
            <!-- List Events -->
            <div class="space-y-4">
                <!-- Event 1 -->
                <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                    <div>
                        <h4 class="font-medium text-gray-800">Seminar Tech</h4>
                        <p class="text-xs text-gray-500">10 Juli 2025</p>
                    </div>
                    <span class="px-2 py-1 bg-green-500 text-white text-xs rounded-full">Live</span>
                </div>
                
                <!-- Event 2 -->
                <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg">
                    <div>
                        <h4 class="font-medium text-gray-800">Kemping Ceria</h4>
                        <p class="text-xs text-gray-500">15 Juli 2025</p>
                    </div>
                    <span class="px-2 py-1 bg-yellow-500 text-white text-xs rounded-full">Soon</span>
                </div>
                
                <!-- Event 3 -->
                <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg">
                    <div>
                        <h4 class="font-medium text-gray-800">IF Sport Competition</h4>
                        <p class="text-xs text-gray-500">20 Juli 2025</p>
                    </div>
                    <span class="px-2 py-1 bg-yellow-500 text-white text-xs rounded-full">Soon</span>
                </div>
                
                <!-- Event 4 -->
                <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg">
                    <div>
                        <h4 class="font-medium text-gray-800">Main Boardgame</h4>
                        <p class="text-xs text-gray-500">25 Juli 2025</p>
                    </div>
                    <span class="px-2 py-1 bg-yellow-500 text-white text-xs rounded-full">Soon</span>
                </div>
            </div>
            
            <!-- Link Lihat Semua -->
            <a href="#" class="mt-4 text-sm text-blue-600 hover:text-blue-800 flex items-center justify-end">
                Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>

        <!-- Card 4: List Member IF23H -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-700">Member IF23H</h3>
            <span class="text-xs bg-blue-100 text-blue-600 px-2 py-1 rounded-full">4 Members</span>
        </div>
        
        <!-- List Member dalam bentuk baris (vertikal) dengan profil -->
        <div class="space-y-3">
            <!-- Member 1: Adella Aprillia -->
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-blue-50 transition-colors">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-pink-100 rounded-full flex items-center justify-center mr-3">
                        <span class="text-pink-600 font-semibold">AD</span>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-800">Adella Aprillia</h4>
                        <p class="text-xs text-gray-500">Member since 2023</p>
                    </div>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>

            <!-- Member 2: Alfan Nur Khasani -->
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-blue-50 transition-colors">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                        <span class="text-blue-600 font-semibold">AN</span>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-800">Alfan Nur Khasani</h4>
                        <p class="text-xs text-gray-500">Member since 2023</p>
                    </div>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>

            <!-- Member 3: Airlangga Wibowo -->
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-blue-50 transition-colors">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                        <span class="text-green-600 font-semibold">AW</span>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-800">Airlangga Wibowo</h4>
                        <p class="text-xs text-gray-500">Member since 2023</p>
                    </div>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>

            <!-- Member 4: Bona Firmanto -->
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-blue-50 transition-colors">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                        <span class="text-purple-600 font-semibold">BF</span>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-800">Bona Firmanto</h4>
                        <p class="text-xs text-gray-500">Member since 2023</p>
                    </div>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
        </div>

        <!-- Link Lihat Semua Member -->
        <a href="#" class="mt-4 text-sm text-blue-600 hover:text-blue-800 flex items-center justify-end">
            Lihat Semua Member <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>

<!-- Script untuk Pie Chart (sama seperti sebelumnya) -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('activityChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Selesai', 'Sedang Berlangsung'],
                datasets: [{
                    data: [1450, 582],
                    backgroundColor: ['#22c55e', '#3b82f6'],
                    borderWidth: 0
                }]
            },
            options: {
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.label + ': ' + context.raw + ' event';
                            }
                        }
                    }
                },
                responsive: true,
                maintainAspectRatio: true
            }
        });
    });
</script>

{{-- 
    <!-- Events Section -->
    <div class="mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Event Yang Akan Berlangsung</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Event Card 1 -->
            <div class="bg-white rounded-lg shadow-md p-4 flex items-center">
                <div class="bg-green-100 p-3 rounded-full mr-4">
                    <i class="fas fa-laptop text-green-500 text-xl"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800">Seminar Tech</h3>
                    <p class="text-sm text-gray-500">10 Juli 2025</p>
                </div>
            </div>

            <!-- Event Card 2 -->
            <div class="bg-white rounded-lg shadow-md p-4 flex items-center">
                <div class="bg-yellow-100 p-3 rounded-full mr-4">
                    <i class="fas fa-campground text-yellow-500 text-xl"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800">Kemping Ceria</h3>
                    <p class="text-sm text-gray-500">15 Juli 2025</p>
                </div>
            </div>

            <!-- Event Card 3 -->
            <div class="bg-white rounded-lg shadow-md p-4 flex items-center">
                <div class="bg-red-100 p-3 rounded-full mr-4">
                    <i class="fas fa-futbol text-red-500 text-xl"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800">IF Sport Competition</h3>
                    <p class="text-sm text-gray-500">20 Juli 2025</p>
                </div>
            </div>

            <!-- Event Card 4 -->
            <div class="bg-white rounded-lg shadow-md p-4 flex items-center">
                <div class="bg-purple-100 p-3 rounded-full mr-4">
                    <i class="fas fa-dice text-purple-500 text-xl"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800">Main Boardgame</h3>
                    <p class="text-sm text-gray-500">25 Juli 2025</p>
                </div>
            </div>
        </div>
    </div>

    --}}

    {{-- 
    <!-- Members List -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">List Member IF23H</h2>
        
        <div class="space-y-3">
            <div class="flex items-center justify-between py-2 border-b border-gray-100">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                        <span class="text-blue-600 font-semibold">AA</span>
                    </div>
                    <span class="text-gray-700">Adella Aprilia</span>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>

            <div class="flex items-center justify-between py-2 border-b border-gray-100">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3">
                        <span class="text-green-600 font-semibold">AN</span>
                    </div>
                    <span class="text-gray-700">Alfan N Khasani</span>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>

            <div class="flex items-center justify-between py-2 border-b border-gray-100">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center mr-3">
                        <span class="text-yellow-600 font-semibold">AR</span>
                    </div>
                    <span class="text-gray-700">Arkelina</span>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>

            <div class="flex items-center justify-between py-2">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                        <span class="text-purple-600 font-semibold">JM</span>
                    </div>
                    <span class="text-gray-700">John Michael</span>
                </div>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </div>
        </div>
    </div>
</div>

 --}}
@endsection