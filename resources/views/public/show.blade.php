@extends('layouts.app')

@section('title', $product->name . ' - Axion Tech')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <!-- Breadcrumb -->
    <nav class="flex items-center gap-2 text-xs font-mono text-slate-400 mb-8">
        <a href="{{ route('home') }}" class="hover:text-cyan-400">Beranda</a>
        <span>/</span>
        <a href="{{ route('home', ['category' => $product->category->slug]) }}#katalog" class="hover:text-cyan-400">{{ $product->category->name }}</a>
        <span>/</span>
        <span class="text-slate-200 truncate max-w-xs">{{ $product->name }}</span>
    </nav>

    <!-- Main Detail Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        
        <!-- Left: Image Preview -->
        <div class="lg:col-span-6">
            <div class="glass-panel rounded-3xl p-6 border border-slate-800 sticky top-28">
                <div class="relative h-96 sm:h-[450px] rounded-2xl bg-slate-800/80 overflow-hidden flex items-center justify-center border border-slate-700/60">
                    @if($product->image && (Storage::disk('public')->exists($product->image) || file_exists(public_path('storage/' . $product->image))))
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-full object-cover">
                    @else
                        <div class="text-center p-8 flex flex-col items-center justify-center">
                            <div class="w-24 h-24 rounded-3xl bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center text-cyan-400 mb-4 shadow-lg glow-cyan">
                                @if(str_contains(strtolower($product->category->name), 'keyboard'))
                                    <i class="fa-solid fa-keyboard text-4xl"></i>
                                @elseif(str_contains(strtolower($product->category->name), 'mouse'))
                                    <i class="fa-solid fa-computer-mouse text-4xl"></i>
                                @elseif(str_contains(strtolower($product->category->name), 'deskmat'))
                                    <i class="fa-solid fa-rug text-4xl"></i>
                                @else
                                    <i class="fa-solid fa-display text-4xl"></i>
                                @endif
                            </div>
                            <span class="text-sm font-mono text-slate-400">{{ $product->category->name }}</span>
                            <span class="text-xs text-slate-500 mt-1">Official Axion Hardware</span>
                        </div>
                    @endif

                    <div class="absolute top-4 left-4">
                        <span class="px-3.5 py-1.5 rounded-full text-xs font-mono font-bold bg-navy-900/90 text-cyan-400 border border-cyan-500/40 backdrop-blur-md">
                            {{ $product->category->name }}
                        </span>
                    </div>
                </div>

                <!-- Info Badges -->
                <div class="grid grid-cols-3 gap-3 mt-4 text-center">
                    <div class="p-3 rounded-xl bg-slate-800/50 border border-slate-700/50">
                        <div class="text-[10px] font-mono uppercase text-slate-400">Status Stok</div>
                        <div class="text-sm font-bold {{ $product->stock > 0 ? 'text-emerald-400' : 'text-rose-400' }}">
                            {{ $product->stock > 0 ? 'Tersedia (' . $product->stock . ')' : 'Habis' }}
                        </div>
                    </div>
                    <div class="p-3 rounded-xl bg-slate-800/50 border border-slate-700/50">
                        <div class="text-[10px] font-mono uppercase text-slate-400">Garansi</div>
                        <div class="text-sm font-bold text-cyan-400">{{ $product->warranty }}</div>
                    </div>
                    <div class="p-3 rounded-xl bg-slate-800/50 border border-slate-700/50">
                        <div class="text-[10px] font-mono uppercase text-slate-400">Kondisi</div>
                        <div class="text-sm font-bold text-white">100% Brand New</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: Product Specs & Ordering -->
        <div class="lg:col-span-6 flex flex-col justify-between">
            <div>
                <div class="inline-block px-3 py-1 rounded-md text-[11px] font-mono bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 mb-3">
                    ID Produk: #AX-{{ str_pad($product->id, 4, '0', STR_PAD_LEFT) }}
                </div>

                <h1 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight mb-4">
                    {{ $product->name }}
                </h1>

                <!-- Price Block -->
                <div class="p-5 rounded-2xl bg-gradient-to-r from-slate-800 to-navy-800 border border-slate-700/80 mb-6 flex items-center justify-between">
                    <div>
                        <div class="text-xs font-mono uppercase tracking-wider text-slate-400">Harga Resmi</div>
                        <div class="text-3xl sm:text-4xl font-black text-cyan-400 font-mono">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">
                            <i class="fa-solid fa-circle-check text-xs"></i> Verified Seller
                        </span>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-8">
                    <h3 class="text-sm font-mono uppercase tracking-wider text-cyan-400 font-bold mb-3 flex items-center gap-2">
                        <i class="fa-solid fa-file-lines"></i> Deskripsi &amp; Spesifikasi Produk
                    </h3>
                    <div class="prose prose-invert max-w-none text-slate-300 text-sm leading-relaxed whitespace-pre-line p-5 rounded-2xl bg-slate-800/40 border border-slate-800">
                        {{ $product->description }}
                    </div>
                </div>

                <!-- Company Guarantee Box -->
                <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/60 mb-8 flex items-start gap-3.5">
                    <div class="w-10 h-10 rounded-lg bg-electric-500/20 text-electric-400 flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-building-shield text-lg"></i>
                    </div>
                    <div class="text-xs leading-relaxed text-slate-300">
                        <strong class="text-white">Jaminan PT Akses Digital Mandiri (Axion Tech):</strong><br>
                        Seluruh produk bergaransi resmi, melewati pengecekan QC switch/sensor/material ketat, dan didukung layanan purna jual profesional.
                    </div>
                </div>
            </div>

            <!-- CTA Buttons -->
            <div class="space-y-3 pt-6 border-t border-slate-800">
                <a href="https://wa.me/6281234567890?text={{ urlencode('Halo Admin Axion Tech (PT Akses Digital Mandiri), saya ingin memesan: ' . $product->name . ' (Harga: Rp ' . number_format($product->price, 0, ',', '.') . '). Apakah ada stok untuk dikirim hari ini?') }}" 
                   target="_blank"
                   class="w-full py-4 px-6 rounded-xl font-bold text-sm bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white shadow-xl shadow-emerald-950/40 flex items-center justify-center gap-2.5 transition-all duration-200 glow-cyan">
                    <i class="fa-brands fa-whatsapp text-xl"></i> Hubungi via WhatsApp untuk Pembelian
                </a>

                <div class="grid grid-cols-2 gap-3">
                    <a href="{{ route('home') }}#katalog" class="w-full py-3 px-4 rounded-xl text-center text-xs font-bold bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 transition-colors">
                        <i class="fa-solid fa-arrow-left me-1.5"></i> Kembali ke Katalog
                    </a>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="w-full py-3 px-4 rounded-xl text-center text-xs font-bold bg-slate-800 hover:border-cyan-500/50 text-cyan-400 border border-slate-700 transition-colors">
                        <i class="fa-solid fa-pen-to-square me-1.5"></i> Edit di Admin
                    </a>
                </div>
            </div>

        </div>

    </div>

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
        <div class="mt-20 pt-10 border-t border-slate-800">
            <h3 class="text-xl font-bold text-white mb-6">Produk Terkait di Kategori {{ $product->category->name }}</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                @foreach($relatedProducts as $rel)
                    <a href="{{ route('public.product.show', $rel->slug) }}" class="glass-panel p-4 rounded-2xl hover:border-cyan-500/40 transition-all flex items-center gap-4 group">
                        <div class="w-16 h-16 rounded-xl bg-slate-800 flex items-center justify-center shrink-0 border border-slate-700/60 overflow-hidden">
                            @if($rel->image && Storage::disk('public')->exists($rel->image))
                                <img src="{{ asset('storage/' . $rel->image) }}" class="w-full h-full object-cover">
                            @else
                                <i class="fa-solid fa-microchip text-cyan-400"></i>
                            @endif
                        </div>
                        <div class="overflow-hidden">
                            <h4 class="text-xs font-bold text-white group-hover:text-cyan-400 transition-colors truncate">{{ $rel->name }}</h4>
                            <div class="text-xs font-mono font-bold text-cyan-400 mt-1">Rp {{ number_format($rel->price, 0, ',', '.') }}</div>
                            <span class="text-[10px] text-slate-400 font-mono">Garansi: {{ $rel->warranty }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

</div>
@endsection
