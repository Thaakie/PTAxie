<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Axion Tech - PT Akses Digital Mandiri | Computer & Desk Setup Store')</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#f0f5ff',
                            100: '#e5edff',
                            200: '#cddbfe',
                            300: '#b4c6fc',
                            500: '#2563eb',
                            600: '#1d4ed8',
                            800: '#1e3a8a',
                            900: '#1e293b',
                            950: '#0f172a'
                        },
                        accent: {
                            blue: '#2b59ff',
                            cyan: '#06b6d4',
                            soft: '#f8fafc'
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        display: ['"Space Grotesk"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        .gitye-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px -2px rgba(15, 23, 42, 0.05);
            transition: all 0.25s ease;
        }
        .gitye-card:hover {
            border-color: #cbd5e1;
            box-shadow: 0 12px 30px -4px rgba(15, 23, 42, 0.08);
        }
        .gitye-hero-bg {
            background: radial-gradient(circle at 80% 20%, rgba(205, 219, 254, 0.45) 0%, rgba(241, 245, 249, 0.6) 40%, #ffffff 80%);
        }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-800 font-sans min-h-screen flex flex-col selection:bg-brand-500 selection:text-white">

    <!-- Top Accent Bar -->
    <div class="h-1 w-full bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500"></div>

    <!-- Navigation Header (Clean Floating Gitye Style) -->
    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-200/80 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo Brand -->
                <a href="{{ route('home') }}" class="flex items-center gap-3.5 group">
                    <div class="w-11 h-11 rounded-2xl bg-slate-900 p-0.5 shadow-md flex items-center justify-center overflow-hidden group-hover:scale-105 transition-transform">
                        @if(file_exists(public_path('images/LOGOTECH.jpeg')))
                            <img src="{{ asset('images/LOGOTECH.jpeg') }}" alt="Axion Tech Logo" class="w-full h-full object-cover rounded-[14px]">
                        @else
                            <span class="text-white font-display font-bold text-xl">A</span>
                        @endif
                    </div>
                    <div>
                        <div class="flex items-center gap-1.5">
                            <span class="text-2xl font-display font-bold tracking-tight text-slate-900">AXION</span>
                            <span class="text-2xl font-display font-bold tracking-tight text-brand-600">TECH</span>
                        </div>
                        <p class="text-[10px] tracking-wider text-slate-500 font-medium uppercase">PT Akses Digital Mandiri</p>
                    </div>
                </a>

                <!-- Navigation Links Capsule -->
                <nav class="hidden md:flex items-center gap-1 bg-slate-100/90 p-1.5 rounded-full border border-slate-200">
                    <a href="{{ route('home') }}" class="px-5 py-2 rounded-full text-xs font-semibold transition-all {{ request()->routeIs('home') ? 'bg-white text-slate-900 shadow-sm font-bold' : 'text-slate-600 hover:text-slate-900' }}">
                        Beranda
                    </a>
                    <a href="{{ route('public.catalog') }}" class="px-5 py-2 rounded-full text-xs font-semibold transition-all {{ request()->routeIs('public.catalog') ? 'bg-white text-slate-900 shadow-sm font-bold' : 'text-slate-600 hover:text-slate-900' }}">
                        Katalog Produk
                    </a>
                    <a href="{{ route('home') }}#tentang" class="px-5 py-2 rounded-full text-xs font-semibold text-slate-600 hover:text-slate-900 transition-all">
                        Tentang Kami
                    </a>
                </nav>

                <!-- Right Action Button -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full text-xs font-bold bg-slate-900 text-white hover:bg-brand-600 transition-all shadow-sm">
                        <i class="fa-solid fa-gauge text-[11px]"></i> Admin Panel
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
                <div class="flex items-center justify-between p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 shadow-sm">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-circle-check text-emerald-600 text-lg"></i>
                        <span class="text-sm font-semibold">{{ session('success') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-900 text-sm"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
                <div class="flex items-center justify-between p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 shadow-sm">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-circle-exclamation text-rose-600 text-lg"></i>
                        <span class="text-sm font-semibold">{{ session('error') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-rose-600 hover:text-rose-900 text-sm"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Clean Tech Footer (Gitye Style) -->
    <footer class="bg-white border-t border-slate-200 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <div class="md:col-span-2">
                    <div class="flex items-center gap-3 mb-4">
                        @if(file_exists(public_path('images/LOGOTECH.jpeg')))
                            <img src="{{ asset('images/LOGOTECH.jpeg') }}" alt="Axion Tech" class="w-8 h-8 rounded-xl object-cover border border-slate-200">
                        @endif
                        <span class="text-xl font-display font-bold text-slate-900">AXION TECH</span>
                    </div>
                    <p class="text-sm text-slate-600 leading-relaxed max-w-md mb-6">
                        Axion Tech (PT Akses Digital Mandiri) adalah penyedia perlengkapan komputer dan aksesoris desk setup terbaik untuk meningkatkan produktivitas dan estetika ruang kerja Anda.
                    </p>
                    <div class="flex items-center gap-3">
                        <a href="https://wa.me/6281234567890" target="_blank" class="w-9 h-9 rounded-full bg-slate-100 text-slate-700 flex items-center justify-center hover:bg-emerald-600 hover:text-white transition">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                        <a href="https://instagram.com" target="_blank" class="w-9 h-9 rounded-full bg-slate-100 text-slate-700 flex items-center justify-center hover:bg-pink-600 hover:text-white transition">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="https://github.com" target="_blank" class="w-9 h-9 rounded-full bg-slate-100 text-slate-700 flex items-center justify-center hover:bg-slate-900 hover:text-white transition">
                            <i class="fa-brands fa-github"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-900 mb-4">Katalog Setup</h4>
                    <ul class="space-y-2.5 text-sm text-slate-600">
                        <li><a href="{{ route('public.catalog', ['category' => 'mechanical-keyboard']) }}" class="hover:text-brand-600 transition">Mechanical Keyboards</a></li>
                        <li><a href="{{ route('public.catalog', ['category' => 'deskmat-mousepad']) }}" class="hover:text-brand-600 transition">Deskmat &amp; Mousepad</a></li>
                        <li><a href="{{ route('public.catalog', ['category' => 'gaming-mouse']) }}" class="hover:text-brand-600 transition">Gaming Mice</a></li>
                        <li><a href="{{ route('public.catalog', ['category' => 'desk-accessories']) }}" class="hover:text-brand-600 transition">Desk Accessories</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-xs font-bold uppercase tracking-wider text-slate-900 mb-4">Legal &amp; Kampus</h4>
                    <p class="text-xs text-slate-500 leading-relaxed mb-3">
                        PT Akses Digital Mandiri<br>
                        Tugas UTS Pemrograman Web II<br>
                        Teknik Informatika - FTIK
                    </p>
                    <span class="inline-block px-3 py-1 rounded-full text-[11px] font-mono bg-blue-50 text-blue-700 border border-blue-200">
                        Laravel &amp; Clean Responsive UI
                    </span>
                </div>
            </div>

            <div class="border-t border-slate-200 mt-12 pt-6 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500">
                <p>&copy; {{ date('Y') }} Axion Tech (PT Akses Digital Mandiri). All rights reserved.</p>
                <p class="mt-2 sm:mt-0 font-medium">Clean Tech Aesthetic Theme</p>
            </div>
        </div>
    </footer>

</body>
</html>
