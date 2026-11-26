@extends('layouts.app')

@section('title', 'Axion Tech - Modern Gaming & Desk Setup Gear')

@section('content')
    <!-- HERO / BANNER SECTION -->
    <section class="relative overflow-hidden py-16 lg:py-24 border-b border-slate-800">
        <div class="absolute inset-0 cyber-grid opacity-40 pointer-events-none"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-cyan-500/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute top-1/4 right-10 w-80 h-80 bg-electric-500/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-slate-800/80 border border-cyan-500/30 text-cyan-400 text-xs font-mono font-semibold uppercase tracking-wider mb-6 glow-cyan">
                    <span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse"></span>
                    Modern Tech &amp; Desk Setup Gear
                </div>

                <h1 class="text-4xl sm:text-6xl font-extrabold text-white tracking-tight leading-tight mb-6">
                    Tingkatkan Setup Kerja &amp; Gaming ke <span class="bg-gradient-to-r from-cyan-400 via-electric-400 to-cyan-300 bg-clip-text text-transparent">Level Maksimal</span>
                </h1>

                <!-- Deskripsi Usaha Wajib -->
                <p class="text-base sm:text-lg text-slate-300 leading-relaxed mb-8 font-normal">
                    <strong class="text-white font-semibold">Axion Tech (PT Akses Digital Mandiri)</strong> adalah penyedia perlengkapan komputer dan aksesoris desk setup terbaik untuk meningkatkan produktivitas dan estetika ruang kerja Anda.
                </p>

                <div class="flex flex-wrap items-center justify-center gap-4">
                    <a href="#katalog" class="px-7 py-3.5 rounded-xl font-bold text-sm bg-gradient-to-r from-cyan-500 to-electric-600 text-navy-900 shadow-lg shadow-cyan-500/25 hover:shadow-cyan-500/40 hover:scale-105 transition-all duration-200">
                        <i class="fa-solid fa-cart-shopping me-2"></i> Jelajahi Produk
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="px-7 py-3.5 rounded-xl font-bold text-sm bg-slate-800 text-slate-200 border border-slate-700 hover:border-cyan-500/50 hover:bg-slate-750 transition-all">
                        <i class="fa-solid fa-gear me-2 text-cyan-400"></i> Kelola Inventaris
                    </a>
                </div>

                <!-- Highlights Badges -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-12 pt-8 border-t border-slate-800/60 text-left">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-truck-fast text-cyan-400 text-xl"></i>
                        <div>
                            <div class="text-xs font-bold text-white">Pengiriman Cepat</div>
                            <div class="text-[11px] text-slate-400 font-mono">Ke Seluruh Indonesia</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-shield-halved text-electric-400 text-xl"></i>
                        <div>
                            <div class="text-xs font-bold text-white">Garansi Resmi</div>
                            <div class="text-[11px] text-slate-400 font-mono">Hingga 2 Tahun</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-cube text-cyan-400 text-xl"></i>
                        <div>
                            <div class="text-xs font-bold text-white">100% Original</div>
                            <div class="text-[11px] text-slate-400 font-mono">Build Quality Premium</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-headset text-electric-400 text-xl"></i>
                        <div>
                            <div class="text-xs font-bold text-white">Konsultasi Setup</div>
                            <div class="text-[11px] text-slate-400 font-mono">Fast Response via WA</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- KATALOG PRODUK & FILTER -->
    <section id="katalog" class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Filter Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10 pb-6 border-b border-slate-800">
            <div>
                <span class="text-xs font-mono uppercase tracking-widest text-cyan-400 font-bold">Hardware &amp; Accessories</span>
                <h2 class="text-3xl font-extrabold text-white mt-1">Daftar Produk Unggulan</h2>
            </div>

            <!-- Tab Kategori Filter -->
            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('home') }}#katalog" 
                   class="px-4 py-2 rounded-lg text-xs font-mono font-bold transition-all {{ empty($selectedCategory) ? 'bg-cyan-500 text-navy-900 shadow-lg shadow-cyan-500/30' : 'bg-slate-800 text-slate-300 hover:text-white hover:bg-slate-700' }}">
                    Semua Produk
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('home', ['category' => $category->slug]) }}#katalog" 
                       class="px-4 py-2 rounded-lg text-xs font-mono font-bold transition-all {{ $selectedCategory === $category->slug ? 'bg-cyan-500 text-navy-900 shadow-lg shadow-cyan-500/30' : 'bg-slate-800 text-slate-300 hover:text-white hover:bg-slate-700' }}">
                        {{ $category->name }}
                        <span class="ms-1 px-1.5 py-0.5 rounded text-[10px] {{ $selectedCategory === $category->slug ? 'bg-navy-900/30 text-navy-900' : 'bg-slate-900 text-cyan-400' }}">
                            {{ $category->products_count }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Grid Produk Card -->
        @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products as $product)
                    <div class="group glass-panel rounded-2xl overflow-hidden hover:border-cyan-500/50 transition-all duration-300 hover:-translate-y-1.5 flex flex-col">
                        
                        <!-- Image Container with Fallback Tech Placeholder -->
                        <div class="relative h-56 bg-slate-800/80 overflow-hidden flex items-center justify-center border-b border-slate-800">
                            @if($product->image && (Storage::disk('public')->exists($product->image) || file_exists(public_path('storage/' . $product->image))))
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="text-center p-6 flex flex-col items-center justify-center">
                                    <div class="w-16 h-16 rounded-2xl bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center text-cyan-400 mb-3 group-hover:scale-110 transition-transform">
                                        @if(str_contains(strtolower($product->category->name), 'keyboard'))
                                            <i class="fa-solid fa-keyboard text-2xl"></i>
                                        @elseif(str_contains(strtolower($product->category->name), 'mouse'))
                                            <i class="fa-solid fa-computer-mouse text-2xl"></i>
                                        @elseif(str_contains(strtolower($product->category->name), 'deskmat'))
                                            <i class="fa-solid fa-rug text-2xl"></i>
                                        @else
                                            <i class="fa-solid fa-display text-2xl"></i>
                                        @endif
                                    </div>
                                    <span class="text-xs font-mono text-slate-400">{{ $product->category->name }}</span>
                                </div>
                            @endif

                            <!-- Kategori Badge -->
                            <div class="absolute top-3 left-3">
                                <span class="px-3 py-1 rounded-full text-[11px] font-mono font-bold bg-navy-900/90 text-cyan-300 border border-cyan-500/30 backdrop-blur-md">
                                    {{ $product->category->name }}
                                </span>
                            </div>

                            <!-- Stok Status Badge -->
                            <div class="absolute top-3 right-3">
                                @if($product->stock > 0)
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">
                                        Stok: {{ $product->stock }}
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-rose-500/20 text-rose-300 border border-rose-500/30">
                                        Habis
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Content Detail -->
                        <div class="p-6 flex-grow flex flex-col justify-between">
                            <div>
                                <h3 class="text-lg font-bold text-white group-hover:text-cyan-400 transition-colors line-clamp-1 mb-2">
                                    {{ $product->name }}
                                </h3>
                                <p class="text-slate-400 text-xs leading-relaxed line-clamp-2 mb-4">
                                    {{ $product->description }}
                                </p>
                            </div>

                            <div class="pt-4 border-t border-slate-800/80">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <div class="text-[10px] font-mono uppercase text-slate-400">Harga Satuan</div>
                                        <div class="text-xl font-extrabold text-cyan-400 font-mono">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-[10px] font-mono uppercase text-slate-400">Garansi</div>
                                        <div class="text-xs font-semibold text-slate-200">
                                            <i class="fa-solid fa-shield-check text-cyan-400 me-1"></i>{{ $product->warranty }}
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-2">
                                    <a href="{{ route('public.product.show', $product->slug) }}" 
                                       class="w-full text-center py-2.5 px-3 rounded-lg text-xs font-bold bg-slate-800 text-slate-200 hover:bg-slate-700 hover:text-white border border-slate-700 transition-colors">
                                        Detail Produk
                                    </a>
                                    <a href="https://wa.me/6281234567890?text={{ urlencode('Halo Axion Tech, saya tertarik untuk memesan: ' . $product->name . ' (Rp ' . number_format($product->price, 0, ',', '.') . '). Apakah stok masih tersedia?') }}" 
                                       target="_blank"
                                       class="w-full text-center py-2.5 px-3 rounded-lg text-xs font-bold bg-emerald-600 hover:bg-emerald-500 text-white shadow-md shadow-emerald-900/30 transition-all flex items-center justify-center gap-1.5">
                                        <i class="fa-brands fa-whatsapp text-sm"></i> Pesan
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $products->links() }}
            </div>
        @else
            <!-- State Kosong -->
            <div class="text-center py-16 glass-panel rounded-2xl border border-slate-800">
                <i class="fa-solid fa-box-open text-5xl text-slate-600 mb-4"></i>
                <h3 class="text-lg font-bold text-white mb-2">Belum Ada Produk di Kategori Ini</h3>
                <p class="text-sm text-slate-400 max-w-md mx-auto mb-6">
                    Kategori yang Anda pilih saat ini belum memiliki item inventaris yang tersedia.
                </p>
                <a href="{{ route('home') }}#katalog" class="px-5 py-2.5 rounded-lg text-xs font-bold bg-cyan-500 text-navy-900">
                    Kembali ke Semua Produk
                </a>
            </div>
        @endif

    </section>
@endsection
