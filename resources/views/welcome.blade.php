<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Pengajuan Cuti</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/heroicons/2.0.1/20/solid.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div id="preloader" class="preloader">
        <div class="spinner"></div>
    </div>

    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <header class="px-6 py-6 lg:px-20 animate-fade-down">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <x-application-logo class="size-12 sm:size-16" />
                    <h1 class="text-xl font-bold text-[#FF2D20] dark:text-white">Aplikasi Pengajuan Cuti</h1>
                </div>
                @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="hover:scale-105 transition-transform">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="hover:scale-105 transition-transform">Log in</a>
                            {{-- @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="hover:scale-105 transition-transform">Register</a>
                            @endif --}}
                        @endauth
                    </nav>
                @endif
            </div>
        </header>

        <main class="px-6 lg:px-20 mt-6">
            <section class="mt-6 grid gap-6 lg:grid-cols-2">
                <div class="relative rounded-lg overflow-hidden animate-fade-left">
                    <img src="{{ asset('assets/welcome.jpg') }}" alt="Selamat Datang" class="w-full h-auto object-cover">
                </div>
                <div class="grid gap-6 animate-fade-right">
                    <!-- Card 1: Ajukan Cuti -->
                    <a href="{{ route('login') }}" class="flex items-center gap-4 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md hover:scale-105 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-[#FF2D20]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span class="text-lg font-medium text-black dark:text-white">Ajukan Cuti</span>
                    </a>

                    <!-- Card 2: Riwayat Pengajuan -->
                    <a href="{{ route('login') }}" class="flex items-center gap-4 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md hover:scale-105 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-[#FF2D20]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                        </svg>
                        <span class="text-lg font-medium text-black dark:text-white">Riwayat Pengajuan</span>
                    </a>

                    <!-- Card 3: Persetujuan Cepat -->
                    <a href="{{ route('login') }}" class="flex items-center gap-4 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md hover:scale-105 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-[#FF2D20]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-lg font-medium text-black dark:text-white">Persetujuan Cepat</span>
                    </a>
                </div>
            </section>
        </main>

        <footer class="py-10 px-6 lg:px-20 text-center text-sm text-black dark:text-white/70 animate-fade-up mt-33">
            Aplikasi Pengajuan Cuti v1.0 (Laravel v{{ Illuminate\Foundation\Application::VERSION }}) by Aisyah Siti Zahra
        </footer>
    </div>

    <script>
        window.addEventListener('load', () => {
            gsap.to("#preloader", { opacity: 0, visibility: "hidden", duration: 1 });
            gsap.from("header", { opacity: 0, y: -20, duration: 1 });
            gsap.from("main", { opacity: 0, y: 20, duration: 1, delay: 0.5 });
            gsap.from("footer", { opacity: 0, y: 20, duration: 1, delay: 1 });
        });
    </script>
</body>
</html>