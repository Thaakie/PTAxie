@extends('layouts.app')

@section('title', $product->name . ' - Axion Tech')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-14">
    
    <!-- Breadcrumb Clean -->
    <nav class="flex items-center gap-2 text-xs text-slate-500 mb-8 font-medium">
        <a href="{{ route('home') }}" class="hover:text-brand-600 transition">Beranda</a>
        <span>/</span>
        <a href="{{ route('home', ['category' => $product->category->slug]) }}#katalog" class="hover:text-brand-600 transition">{{ $product->category->name }}</a>
        <span>/</span>
        <span class="text-slate-900 font-semibold truncate max-w-xs">{{ $product->name }}</span>
    </nav>

    <!-- Main Detail Card (Gitye Clean Editorial Style) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 bg-white p-6 sm:p-10 rounded-3xl border border-slate-200 shadow-sm">
        
        <!-- Left: Image Preview -->
        <div class="lg:col-span-6">
            <div class="sticky top-28 space-y-4">
                <div class="relative h-96 sm:h-[450px] rounded-2xl bg-slate-50 overflow-hidden flex items-center justify-center border border-slate-200">
                    @if($product->image && (Storage::disk('public')->exists($product->image) || file_exists(public_path('storage/' . $product->image))))
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-full object-cover">
                    @else
                        <div class="text-center p-8 flex flex-col items-center justify-center">
                            <div class="w-24 h-24 rounded-3xl bg-blue-50 text-blue-600 flex items-center justify-center mb-4 shadow-sm">
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
                            <span class="text-sm font-semibold text-slate-500">{{ $product->category->name }}</span>
                            <span class="text-xs text-slate-400 mt-1">Official Axion Tech Gear</span>
                        </div>
                    @endif

                    <div class="absolute top-4 left-4">
                        <span class="px-3.5 py-1.5 rounded-full text-xs font-semibold bg-white/95 text-slate-800 border border-slate-200 shadow-sm backdrop-blur-md">
                            {{ $product->category->name }}
                        </span>
                    </div>
                </div>

                <!-- Info Badges Pill -->
                <div class="grid grid-cols-3 gap-3 text-center">
                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                        <div class="text-[10px] uppercase text-slate-400 font-semibold">Status Stok</div>
                        <div class="text-xs font-bold {{ $product->stock > 0 ? 'text-emerald-700' : 'text-rose-600' }}">
                            {{ $product->stock > 0 ? $product->stock . ' Unit Tersedia' : 'Habis' }}
                        </div>
                    </div>
                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                        <div class="text-[10px] uppercase text-slate-400 font-semibold">Garansi</div>
                        <div class="text-xs font-bold text-slate-800">{{ $product->warranty }}</div>
                    </div>
                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200">
                        <div class="text-[10px] uppercase text-slate-400 font-semibold">Kondisi</div>
                        <div class="text-xs font-bold text-slate-800">100% Brand New</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: Specs & WhatsApp Order CTA -->
        <div class="lg:col-span-6 flex flex-col justify-between">
            <div>
                <div class="inline-block px-3 py-1 rounded-full text-[11px] font-semibold bg-blue-50 text-blue-700 border border-blue-200 mb-3">
                    ID Produk: #AX-{{ str_pad($product->id, 4, '0', STR_PAD_LEFT) }}
                </div>

                <h1 class="text-3xl sm:text-4xl font-display font-bold text-slate-900 leading-tight mb-4">
                    {{ $product->name }}
                </h1>

                <!-- Price Block Clean -->
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 mb-6 flex items-center justify-between">
                    <div>
                        <div class="text-xs uppercase tracking-wider text-slate-500 font-medium">Harga Resmi</div>
                        <div class="text-3xl font-display font-bold text-slate-900">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                            <i class="fa-solid fa-circle-check text-xs"></i> Verified Axion
                        </span>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-8">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-900 mb-3 flex items-center gap-2">
                        <i class="fa-solid fa-file-lines text-brand-600"></i> Deskripsi &amp; Spesifikasi Produk
                    </h3>
                    <div class="text-slate-600 text-sm leading-relaxed whitespace-pre-line p-5 rounded-2xl bg-slate-50/70 border border-slate-200">
                        {{ $product->description }}
                    </div>
                </div>

                <!-- Company Guarantee Box -->
                <div class="p-4 rounded-xl bg-blue-50/60 border border-blue-200/80 mb-8 flex items-start gap-3.5">
                    <div class="w-10 h-10 rounded-lg bg-blue-600 text-white flex items-center justify-center shrink-0 shadow-sm">
                        <i class="fa-solid fa-building-shield text-base"></i>
                    </div>
                    <div class="text-xs leading-relaxed text-slate-700">
                        <strong class="text-slate-900">Jaminan PT Akses Digital Mandiri (Axion Tech):</strong><br>
                        Produk orisinal 100%, bergaransi resmi, pengecekan QC switch dan material presisi tinggi sebelum proses pengiriman.
                    </div>
                </div>
            </div>

            <!-- CTA Buttons -->
            <div class="space-y-3 pt-6 border-t border-slate-200">
                <a href="https://wa.me/6281234567890?text={{ urlencode('Halo Admin Axion Tech (PT Akses Digital Mandiri), saya ingin memesan: ' . $product->name . ' (Harga: Rp ' . number_format($product->price, 0, ',', '.') . '). Apakah ada stok untuk dikirim hari ini?') }}" 
                   target="_blank"
                   class="w-full py-4 px-6 rounded-xl font-bold text-sm bg-slate-900 hover:bg-brand-600 text-white shadow-lg shadow-slate-900/10 flex items-center justify-center gap-2.5 transition-all">
                    <i class="fa-brands fa-whatsapp text-lg"></i> Hubungi via WhatsApp untuk Pembelian
                </a>

                <div class="grid grid-cols-2 gap-3">
                    <a href="{{ route('home') }}#katalog" class="w-full py-3 px-4 rounded-xl text-center text-xs font-semibold bg-slate-100 hover:bg-slate-200 text-slate-700 transition-colors">
                        &larr; Kembali ke Katalog
                    </a>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="w-full py-3 px-4 rounded-xl text-center text-xs font-semibold bg-white hover:bg-slate-50 text-slate-700 border border-slate-300 transition-colors">
                        <i class="fa-solid fa-pen-to-square me-1"></i> Edit di Admin
                    </a>
                </div>
            </div>

        </div>

    </div>

    <!-- Related Products Clean -->
    @if($relatedProducts->count() > 0)
        <div class="mt-16 pt-10 border-t border-slate-200">
            <h3 class="text-xl font-display font-bold text-slate-900 mb-6">Produk Terkait di Kategori {{ $product->category->name }}</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                @foreach($relatedProducts as $rel)
                    <a href="{{ route('public.product.show', $rel->slug) }}" class="gitye-card p-4 rounded-2xl flex items-center gap-4 group">
                        <div class="w-16 h-16 rounded-xl bg-slate-50 flex items-center justify-center shrink-0 border border-slate-100 overflow-hidden">
                            @if($rel->image && Storage::disk('public')->exists($rel->image))
                                <img src="{{ asset('storage/' . $rel->image) }}" class="w-full h-full object-cover">
                            @else
                                <i class="fa-solid fa-microchip text-slate-400"></i>
                            @endif
                        </div>
                        <div class="overflow-hidden">
                            <h4 class="text-xs font-bold text-slate-900 group-hover:text-brand-600 transition-colors truncate">{{ $rel->name }}</h4>
                            <div class="text-xs font-display font-bold text-slate-900 mt-1">Rp {{ number_format($rel->price, 0, ',', '.') }}</div>
                            <span class="text-[10px] text-slate-500">Garansi: {{ $rel->warranty }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

</div>
@endsection
