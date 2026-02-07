<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nexus - Login Dashboard Admin</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
            /* Membuat efek radial gradient halus di latar belakang seperti pada gambar */
            background: radial-gradient(circle at 80% 20%, #e0eaff 0%, #fdfdfc 50%);
        }
    </style>
</head>
<body class="bg-[#FDFDFC] flex items-center justify-center min-h-screen p-6">

    <div class="bg-white w-full max-w-[450px] p-10 rounded-xl shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-gray-100 flex flex-col items-center">
        
        <div class="flex flex-col items-center mb-8">
            <div class="flex items-center gap-2 mb-1">
                <div class="text-[#2b59c3] font-bold text-4xl flex items-center">
                    <span class="text-5xl italic">iN</span>
                    <span class="ml-1 text-3xl tracking-tight">exus</span>
                </div>
            </div>
            <div class="w-32 h-[2px] bg-[#2b59c3]"></div>
            <p class="text-[10px] text-gray-400 mt-1 uppercase tracking-widest font-semibold">IF23H UAI</p>
        </div>

        <div class="text-center mb-8">
            <h2 class="text-[#1b1b18] text-xl font-semibold">Selamat Datang!</h2>
            <p class="text-gray-400 text-sm mt-1 font-medium">Silakan masuk ke Dashboard Admin</p>
        </div>

        @if ($errors->any())
            <div class="w-full mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                <p class="text-red-600 text-sm font-medium">{{ session('error') ?? 'Terjadi kesalahan validasi' }}</p>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="w-full">
            @csrf

            <div class="mb-5">
                <input id="email" type="email" name="email" placeholder="Email" required
                    class="w-full px-5 py-3.5 bg-gray-50/50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all placeholder-gray-400 text-sm">
            </div>

            <div class="relative mb-5">
                <input id="password" type="password" name="password" placeholder="Kata Sandi" required
                    class="w-full px-5 py-3.5 bg-gray-50/50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all placeholder-gray-400 text-sm">
                
                <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-blue-600 transition-colors">
                    <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.644C3.301 8.844 5.95 7 9 7s5.699 1.844 6.964 4.678c.114.256.114.538 0 .794C14.701 15.156 12.05 17 9 17s-5.699-1.844-6.964-4.678Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </button>
            </div>

            <div class="flex items-center mb-8">
                <label class="flex items-center cursor-pointer group">
                    <input id="remember_me" type="checkbox" name="remember" 
                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 transition-all">
                    <span class="ml-3 text-sm text-gray-500 group-hover:text-gray-700 transition-colors">Ingatkan saya</span>
                </label>
            </div>

            <button type="submit" 
                class="w-full bg-[#4a80ff] hover:bg-[#3b6ee8] text-white font-semibold py-3.5 rounded-xl shadow-lg shadow-blue-500/30 transform active:scale-[0.98] transition-all duration-200">
                Masuk
            </button>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />`;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.644C3.301 8.844 5.95 7 9 7s5.699 1.844 6.964 4.678c.114.256.114.538 0 .794C14.701 15.156 12.05 17 9 17s-5.699-1.844-6.964-4.678Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />`;
            }
        }
    </script>
</body>
</html>