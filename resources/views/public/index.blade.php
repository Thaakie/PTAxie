@extends('layouts.app')

@section('title', 'Axion Tech - Modern Desk Setup & Computer Accessories')

@section('content')
    <!-- HERO SECTION (Gitye Clean Editorial Style) -->
    <section class="relative overflow-hidden pt-12 pb-20 lg:pt-16 lg:pb-28 gitye-hero-bg border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Left: Typography & Business Purpose -->
                <div class="lg:col-span-7">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-50 border border-blue-200 text-blue-700 text-xs font-semibold mb-6">
                        <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                        Official Store &bull; Mechanical Keyboards &amp; Desk Setup
                    </div>

                    <h1 class="text-4xl sm:text-6xl font-display font-bold text-slate-900 tracking-tight leading-[1.12] mb-6">
                        Modern Minimalist <br class="hidden sm:inline">
                        <span class="text-brand-600">Desk Setup Gear</span> for Peak Flow.
                    </h1>

                    <!-- Deskripsi Usaha Wajib UTS -->
                    <p class="text-base sm:text-lg text-slate-600 leading-relaxed mb-8 max-w-xl">
                        <strong class="text-slate-900 font-semibold">Axion Tech (PT Akses Digital Mandiri)</strong> adalah penyedia perlengkapan komputer dan aksesoris desk setup terbaik untuk meningkatkan produktivitas dan estetika ruang kerja Anda.
                    </p>

                    <div class="flex flex-wrap items-center gap-4">
                        <a href="#katalog" class="px-7 py-3.5 rounded-full font-bold text-sm bg-slate-900 hover:bg-brand-600 text-white shadow-lg shadow-slate-900/10 hover:shadow-brand-500/20 hover:-translate-y-0.5 transition-all">
                            Jelajahi Katalog <i class="fa-solid fa-arrow-right ms-2 text-xs"></i>
                        </a>
                        <a href="{{ route('admin.products.index') }}" class="px-6 py-3.5 rounded-full font-semibold text-sm bg-white hover:bg-slate-100 text-slate-700 border border-slate-300 transition-all">
                            Kelola Inventaris
                        </a>
                    </div>

                    <!-- Mini Stat / Highlights Row -->
                    <div class="grid grid-cols-3 gap-6 mt-12 pt-8 border-t border-slate-200/80">
                        <div>
                            <div class="text-2xl font-display font-bold text-slate-900">100%</div>
                            <div class="text-xs text-slate-500 mt-0.5 font-medium">Garansi Resmi Brand</div>
                        </div>
                        <div>
                            <div class="text-2xl font-display font-bold text-slate-900">48 Jam</div>
                            <div class="text-xs text-slate-500 mt-0.5 font-medium">Pengiriman Kilat Aman</div>
                        </div>
                        <div>
                            <div class="text-2xl font-display font-bold text-slate-900">Top Tier</div>
                            <div class="text-xs text-slate-500 mt-0.5 font-medium">Kualitas Switch &amp; Mat</div>
                        </div>
                    </div>
                </div>

                <!-- Right: Clean Minimal Product Showcase Card (Gitye Style) -->
                <div class="lg:col-span-5">
                    <div class="relative">
                        <!-- Decorative Abstract Soft Shapes -->
                        <div class="absolute -top-10 -right-10 w-72 h-72 bg-blue-100/70 rounded-full blur-3xl pointer-events-none"></div>
                        <div class="absolute -bottom-10 -left-10 w-60 h-60 bg-indigo-100/60 rounded-full blur-2xl pointer-events-none"></div>

                        <div class="relative bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-xl shadow-slate-200/50">
                            <div class="flex items-center justify-between pb-4 mb-6 border-b border-slate-100">
                                <div>
                                    <span class="text-[11px] font-bold uppercase tracking-wider text-brand-600">Featured Setup</span>
                                    <h3 class="text-lg font-display font-bold text-slate-900">Curated Workstation</h3>
                                </div>
                                <span class="w-8 h-8 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center text-xs">
                                    <i class="fa-solid fa-sparkles"></i>
                                </span>
                            </div>

                            <div class="aspect-[4/3] rounded-2xl bg-gradient-to-tr from-slate-100 via-blue-50/60 to-slate-50 overflow-hidden flex items-center justify-center p-6 border border-slate-100 mb-6">
                                @if(file_exists(public_path('images/LOGOTECH.jpeg')))
                                    <img src="{{ asset('images/LOGOTECH.jpeg') }}" alt="Axion Hardware Setup" class="w-full h-full object-cover rounded-xl shadow-sm">
                                @else
                                    <i class="fa-solid fa-keyboard text-5xl text-blue-300"></i>
                                @endif
                            </div>

                            <div class="space-y-3">
                                <div class="flex items-center justify-between text-sm">
                                    <span class="font-semibold text-slate-800">Axion Stealth Mechanical</span>
                                    <span class="font-display font-bold text-brand-600">Rp 1.250.000</span>
                                </div>
                                <div class="flex items-center justify-between text-xs text-slate-500">
                                    <span>Material: Aluminium &amp; PBT</span>
                                    <span class="text-emerald-600 font-semibold"><i class="fa-solid fa-circle-check me-1"></i> Ready Stock</span>
                                </div>
                                <a href="#katalog" class="block w-full py-2.5 text-center rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-bold transition-all mt-4">
                                    Lihat Seluruh Koleksi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION KATALOG PRODUK & FILTER -->
    <section id="katalog" class="py-16 lg:py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Filter Header Clean Editorial -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12 pb-6 border-b border-slate-200">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-brand-600">Hardware &amp; Accessories</span>
                <h2 class="text-3xl font-display font-bold text-slate-900 mt-1">Katalog Produk Pilihan</h2>
                <p class="text-xs text-slate-500 mt-1">Peralatan keyboard, alas meja cordura, mouse ultralight, dan aksesoris meja.</p>
            </div>

            <!-- Dropdown Filter Kategori Clean -->
            <div class="flex items-center gap-3">
                <label for="categoryFilter" class="text-xs font-semibold text-slate-500 whitespace-nowrap">
                    <i class="fa-solid fa-filter me-1 text-brand-600"></i> Filter Kategori:
                </label>
                <div class="relative min-w-[220px]">
                    <select id="categoryFilter" 
                            onchange="window.location.href = this.value" 
                            class="w-full pl-4 pr-10 py-2.5 rounded-full text-xs font-semibold bg-white text-slate-800 border border-slate-300 hover:border-slate-400 focus:outline-none focus:border-brand-600 focus:ring-1 focus:ring-brand-600 transition-all appearance-none cursor-pointer shadow-sm">
                        <option value="{{ route('home') }}#katalog" {{ empty($selectedCategory) ? 'selected' : '' }}>
                            Semua Kategori ({{ $categories->sum('products_count') }})
                        </option>
                        @foreach($categories as $category)
                            <option value="{{ route('home', ['category' => $category->slug]) }}#katalog" {{ $selectedCategory === $category->slug ? 'selected' : '' }}>
                                {{ $category->name }} ({{ $category->products_count }})
                            </option>
                        @endforeach
                    </select>
                    <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 text-xs pointer-events-none"></i>
                </div>
            </div>
        </div>

        <!-- Grid Produk Card (Gitye Clean Card) -->
        @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products as $product)
                    <div class="gitye-card rounded-2xl overflow-hidden flex flex-col group">
                        
                        <!-- Image Container with Soft Tech Fallback -->
                        <div class="relative h-60 bg-slate-50 overflow-hidden flex items-center justify-center border-b border-slate-100">
                            @if($product->image && (Storage::disk('public')->exists($product->image) || file_exists(public_path('storage/' . $product->image))))
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="text-center p-6 flex flex-col items-center justify-center">
                                    <div class="w-16 h-16 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center mb-2 group-hover:scale-110 transition-transform">
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
                                    <span class="text-xs font-semibold text-slate-400">{{ $product->category->name }}</span>
                                </div>
                            @endif

                            <!-- Kategori Badge -->
                            <div class="absolute top-3 left-3">
                                <span class="px-3 py-1 rounded-full text-[11px] font-semibold bg-white/95 text-slate-800 border border-slate-200 shadow-sm backdrop-blur-md">
                                    {{ $product->category->name }}
                                </span>
                            </div>

                            <!-- Stok Status Badge -->
                            <div class="absolute top-3 right-3">
                                @if($product->stock > 0)
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        Stok: {{ $product->stock }}
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-semibold bg-rose-50 text-rose-700 border border-rose-200">
                                        Habis
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Content Detail -->
                        <div class="p-6 flex-grow flex flex-col justify-between">
                            <div>
                                <h3 class="text-base font-display font-bold text-slate-900 group-hover:text-brand-600 transition-colors line-clamp-1 mb-1.5">
                                    {{ $product->name }}
                                </h3>
                                <p class="text-slate-500 text-xs leading-relaxed line-clamp-2 mb-4">
                                    {{ $product->description }}
                                </p>
                            </div>

                            <div class="pt-4 border-t border-slate-100">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <div class="text-[10px] uppercase text-slate-400 font-medium">Harga Resmi</div>
                                        <div class="text-xl font-display font-bold text-slate-900">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-[10px] uppercase text-slate-400 font-medium">Garansi</div>
                                        <div class="text-xs font-semibold text-slate-700">
                                            <i class="fa-solid fa-shield-check text-brand-600 me-1"></i>{{ $product->warranty }}
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-2">
                                    <a href="{{ route('public.product.show', $product->slug) }}" 
                                       class="w-full text-center py-2.5 px-3 rounded-xl text-xs font-bold bg-slate-100 hover:bg-slate-200 text-slate-800 transition-colors">
                                        Detail Produk
                                    </a>
                                    <a href="https://wa.me/6281234567890?text={{ urlencode('Halo Axion Tech (PT Akses Digital Mandiri), saya ingin memesan produk: ' . $product->name . ' seharga Rp ' . number_format($product->price, 0, ',', '.')) }}" 
                                       target="_blank"
                                       class="w-full text-center py-2.5 px-3 rounded-xl text-xs font-bold bg-slate-900 hover:bg-brand-600 text-white transition-all flex items-center justify-center gap-1.5 shadow-sm">
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
            <div class="text-center py-16 bg-white rounded-3xl border border-slate-200">
                <i class="fa-solid fa-box-open text-4xl text-slate-400 mb-3"></i>
                <h3 class="text-base font-bold text-slate-800 mb-1">Belum Ada Produk di Kategori Ini</h3>
                <p class="text-xs text-slate-500 max-w-sm mx-auto mb-4">
                    Silakan pilih kategori lainnya atau reset filter ke seluruh produk.
                </p>
                <a href="{{ route('home') }}#katalog" class="px-5 py-2 rounded-full text-xs font-bold bg-slate-900 text-white">
                    Tampilkan Semua
                </a>
            </div>
        @endif

    </section>
@endsection
