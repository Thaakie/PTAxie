<!DOCTYPE html>
<html lang="id" class="dark scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Axion Tech - PT Akses Digital Mandiri | Computer & Desk Setup Store')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@500;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        navy: {
                            900: '#0b1120',
                            800: '#0f172a',
                            700: '#1e293b',
                            600: '#334155',
                        },
                        cyan: {
                            400: '#22d3ee',
                            500: '#06b6d4',
                            600: '#0891b2',
                        },
                        electric: {
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        mono: ['"JetBrains Mono"', 'monospace'],
                    }
                }
            }
        }
    </script>
    
    <!-- Lucide Icons & FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        /* Cyberpunk glow & glassmorphism */
        .glow-cyan {
            box-shadow: 0 0 25px -5px rgba(6, 182, 212, 0.35);
        }
        .glow-electric {
            box-shadow: 0 0 25px -5px rgba(59, 130, 246, 0.35);
        }
        .glass-panel {
            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(51, 65, 85, 0.5);
        }
        .cyber-grid {
            background-size: 30px 30px;
            background-image: 
                linear-gradient(to right, rgba(51, 65, 85, 0.15) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(51, 65, 85, 0.15) 1px, transparent 1px);
        }
    </style>
</head>
<body class="bg-navy-900 text-slate-200 font-sans min-h-screen flex flex-col selection:bg-cyan-500 selection:text-navy-900">

    <!-- Top Glow Line -->
    <div class="h-1 w-full bg-gradient-to-r from-cyan-500 via-electric-500 to-cyan-400"></div>

    <!-- Navigation Header -->
    <header class="sticky top-0 z-50 glass-panel border-b border-slate-800/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo Brand -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="relative flex items-center justify-center w-11 h-11 rounded-xl bg-gradient-to-tr from-cyan-500 to-electric-600 text-navy-900 shadow-lg group-hover:scale-105 transition-all duration-300">
                        <i class="fa-solid fa-microchip text-xl text-navy-900"></i>
                        <span class="absolute -top-1 -right-1 flex h-3 w-3">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-cyan-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-cyan-300"></span>
                        </span>
                    </div>
                    <div>
                        <div class="flex items-center gap-1.5">
                            <span class="text-2xl font-black tracking-wider text-white">AXION</span>
                            <span class="text-2xl font-black tracking-wider text-cyan-400">TECH</span>
                        </div>
                        <p class="text-[10px] tracking-widest text-slate-400 font-mono uppercase">PT Akses Digital Mandiri</p>
                    </div>
                </a>

                <!-- Desktop Nav -->
                <nav class="hidden md:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-sm font-semibold transition-colors hover:text-cyan-400 {{ request()->routeIs('home') ? 'text-cyan-400' : 'text-slate-300' }}">
                        <i class="fa-solid fa-house me-1.5 text-xs"></i> Beranda
                    </a>
                    <a href="{{ route('public.catalog') }}" class="text-sm font-semibold transition-colors hover:text-cyan-400 {{ request()->routeIs('public.catalog') ? 'text-cyan-400' : 'text-slate-300' }}">
                        <i class="fa-solid fa-layer-group me-1.5 text-xs"></i> Katalog Produk
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-bold bg-slate-800 text-cyan-400 border border-cyan-500/30 hover:bg-cyan-500/10 hover:border-cyan-400 transition-all glow-cyan">
                        <i class="fa-solid fa-gauge-high"></i> Admin Dashboard
                    </a>
                </nav>

                <!-- Mobile Action -->
                <div class="flex items-center md:hidden gap-3">
                    <a href="{{ route('admin.products.index') }}" class="px-3 py-1.5 rounded-lg text-xs font-bold bg-cyan-500/20 text-cyan-400 border border-cyan-500/40">
                        Admin
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-grow">
        <!-- Flash Alert Notification -->
        @if(session('success'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
                <div class="flex items-center p-4 rounded-xl bg-cyan-500/10 border border-cyan-500/40 text-cyan-300 shadow-lg glow-cyan">
                    <i class="fa-solid fa-circle-check text-xl me-3 text-cyan-400"></i>
                    <div class="text-sm font-medium">{{ session('success') }}</div>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
                <div class="flex items-center p-4 rounded-xl bg-rose-500/10 border border-rose-500/40 text-rose-300 shadow-lg">
                    <i class="fa-solid fa-circle-exclamation text-xl me-3 text-rose-400"></i>
                    <div class="text-sm font-medium">{{ session('error') }}</div>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Tech Footer -->
    <footer class="bg-navy-900 border-t border-slate-800 mt-20 relative overflow-hidden">
        <div class="absolute inset-0 cyber-grid opacity-30 pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div class="md:col-span-2">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="text-xl font-black text-white">AXION</span>
                        <span class="text-xl font-black text-cyan-400">TECH</span>
                    </div>
                    <p class="text-sm text-slate-400 leading-relaxed max-w-md">
                        Axion Tech (PT Akses Digital Mandiri) adalah penyedia perlengkapan komputer dan aksesoris desk setup terbaik untuk meningkatkan produktivitas dan estetika ruang kerja Anda.
                    </p>
                    <div class="flex items-center gap-4 mt-5">
                        <a href="https://instagram.com" target="_blank" class="w-9 h-9 rounded-lg bg-slate-800 text-slate-400 flex items-center justify-center hover:bg-cyan-500 hover:text-navy-900 transition-all">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="https://github.com" target="_blank" class="w-9 h-9 rounded-lg bg-slate-800 text-slate-400 flex items-center justify-center hover:bg-cyan-500 hover:text-navy-900 transition-all">
                            <i class="fa-brands fa-github"></i>
                        </a>
                        <a href="https://wa.me/6281234567890" target="_blank" class="w-9 h-9 rounded-lg bg-slate-800 text-slate-400 flex items-center justify-center hover:bg-cyan-500 hover:text-navy-900 transition-all">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="text-xs font-mono uppercase tracking-widest text-cyan-400 font-bold mb-4">Navigasi Utama</h4>
                    <ul class="space-y-2 text-sm text-slate-400">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="{{ route('public.catalog') }}" class="hover:text-white transition-colors">Katalog Lengkap</a></li>
                        <li><a href="{{ route('admin.products.index') }}" class="hover:text-white transition-colors">Admin Panel</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-xs font-mono uppercase tracking-widest text-cyan-400 font-bold mb-4">Informasi Kampus</h4>
                    <p class="text-xs text-slate-400 leading-relaxed mb-2 font-mono">
                        <strong class="text-slate-200">Tugas Praktikum &amp; UTS:</strong><br>
                        Pemrograman Web 2 (INF231102)<br>
                        Teknik Informatika - FTIK
                    </p>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[11px] font-mono bg-cyan-500/10 text-cyan-400 border border-cyan-500/20">
                        <i class="fa-solid fa-code text-[10px]"></i> Laravel 11/12 + Tailwind
                    </span>
                </div>
            </div>
            
            <div class="border-t border-slate-800 pt-6 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500">
                <p>&copy; {{ date('Y') }} Axion Tech - PT Akses Digital Mandiri. Hak Cipta Dilindungi.</p>
                <p class="font-mono mt-2 sm:mt-0">Built with <i class="fa-solid fa-bolt text-cyan-400"></i> &amp; Blade</p>
            </div>
        </div>
    </footer>

</body>
</html>
