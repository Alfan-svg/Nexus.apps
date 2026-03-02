<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="font-sans antialiased">
    <!-- BACKGROUND LAYER - TETAP DI BELAKANG -->
    <div class="fixed inset-0 -z-10">
        <!-- Bagian Atas 30% dengan Gradasi PUTIH ke BIRU (bukan biru ke putih) -->
        <div class="absolute top-0 left-0 w-full h-[30vh] bg-gradient-to-b from-[#FFFFFF] to-[#004AAD]"></div>
        
        <!-- GARIS PEMBATAS BIRU YANG JELAS (nyambung sama warna biru gradasi) -->
        <div class="absolute top-[30vh] left-0 w-full h-[3px] bg-[#004AAD] shadow-[0_2px_4px_rgba(0,74,173,0.3)]"></div>
        
        <!-- Bagian Bawah 70% Putih Polos -->
        <div class="absolute bottom-0 left-0 w-full h-[70vh] bg-white"></div>
    </div>

    <!-- KONTEN LAYER - DI ATAS BACKGROUND -->
    <div class="relative z-10 h-screen overflow-hidden">
        <div class="flex h-full">
            <!-- Sidebar -->
            <aside class="w-64 bg-white shadow-lg flex flex-col rounded-2xl m-6 h-[calc(100%-3rem)]">
                <div class="p-6 justify-center items-center">
                    <img src="{{ asset('storage/images/Nexus.png') }}" alt="Nexus Logo" class="'max-h-16">
                </div>

                <!-- Sidebar Navigasi -->
                <nav class="flex-1">
                    <div class="px-6 mb-2">
                        <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider">NAVIGATION</h2>
                    </div>
                    
                    <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-3 {{ Route::currentRouteName()=='dashboard' ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50'}}">
                        <i class="fas fa-tachometer-alt w-4"></i>
                        <span class="mx-3">Dashboard</span>
                    </a>
                    
                    <a href="{{ route('aktivitas') }}" class="flex items-center px-6 py-3 {{ Route::currentRouteName()=='aktivitas' ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50'}}">
                        <i class="fas fa-calendar-alt w-4"></i>
                        <span class="mx-2">Aktivitas</span>
                    </a>

                    <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-50">
                        <i class="fas fa-users w-4"></i>
                        <span class="mx-3">Data Member</span>
                    </a>
                    
                    <a href="{{ route('pengguna') }}" class="flex items-center px-6 py-2.5 {{ request()->routeIs('pengguna') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50' }}">
                        <i class="fas fa-user-cog w-5"></i>
                        <span class="mx-2">Pengguna dan Peran</span>
                    </a>
                </nav>

                <!-- Footer -->
                <footer class="py-4 px-6">
                    <p class="text-sm text-gray-500 text-center">@2026 Nexus All rights reserved.</p>
                </footer>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto pr-6 pt-6">
                <!-- TOP NAVIGATION BAR -->
                <div class="flex justify-between items-center p-6">
                    <div>
                        @if(Route::currentRouteName() == 'dashboard')
                            <p class="text-sm text-gray-600">Selamat Datang!</p>
                            <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
                        @else
                            <h1 class="text-2xl font-bold text-gray-800">@yield('page-title')</h1>
                        @endif
                    </div>
                    <div class="flex items-center">
                        <a href="#" class="text-gray-600 hover:text-blue-600 mx-3">
                            <i class="fas fa-home text-lg"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-blue-600 mx-3 relative">
                            <i class="fas fa-bell text-lg"></i>
                            <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">5</span>
                        </a>
                        <a href="#" class="flex items-center text-gray-600 hover:text-blue-600 ml-3">
                            <i class="fas fa-user-circle text-2xl mr-1"></i>
                            <span class="font-medium">Admin</span>
                        </a>
                    </div>
                </div>
                
                <!-- CONTENT -->
                <div class="mt-6 mr-6">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
</html>