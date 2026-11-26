@extends('layouts.app')

@section('title', 'Admin Dashboard - Axion Tech')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <!-- Header Panel -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8 pb-6 border-b border-slate-800">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md text-xs font-mono bg-cyan-500/10 text-cyan-400 border border-cyan-500/30 mb-2">
                <i class="fa-solid fa-shield-halved"></i> Administrator Control Center
            </div>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Katalog Inventaris Produk</h1>
            <p class="text-xs text-slate-400 font-mono mt-1">Kelola data barang, harga, garansi, foto, dan stok PT Akses Digital Mandiri</p>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('public.catalog') }}" class="px-4 py-2.5 rounded-xl text-xs font-bold bg-slate-800 hover:bg-slate-700 text-slate-300 border border-slate-700 transition-colors">
                <i class="fa-solid fa-eye me-1.5"></i> Lihat Web Publik
            </a>
            <a href="{{ route('admin.products.create') }}" class="px-5 py-2.5 rounded-xl text-xs font-bold bg-gradient-to-r from-cyan-500 to-electric-600 hover:from-cyan-400 hover:to-electric-500 text-navy-900 shadow-lg shadow-cyan-500/25 transition-all duration-200 glow-cyan">
                <i class="fa-solid fa-plus me-1.5"></i> Tambah Produk Baru
            </a>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-8">
        <div class="glass-panel p-5 rounded-2xl border border-slate-800 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center text-cyan-400 text-xl">
                <i class="fa-solid fa-boxes-stacked"></i>
            </div>
            <div>
                <div class="text-xs font-mono uppercase text-slate-400">Total Macam Produk</div>
                <div class="text-2xl font-black text-white font-mono">{{ $totalProducts }} <span class="text-xs font-normal text-slate-400">Item</span></div>
            </div>
        </div>

        <div class="glass-panel p-5 rounded-2xl border border-slate-800 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-electric-500/10 border border-electric-500/30 flex items-center justify-center text-electric-400 text-xl">
                <i class="fa-solid fa-layer-group"></i>
            </div>
            <div>
                <div class="text-xs font-mono uppercase text-slate-400">Total Kategori</div>
                <div class="text-2xl font-black text-white font-mono">{{ $totalCategories }} <span class="text-xs font-normal text-slate-400">Kategori</span></div>
            </div>
        </div>

        <div class="glass-panel p-5 rounded-2xl border border-slate-800 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-emerald-500/10 border border-emerald-500/30 flex items-center justify-center text-emerald-400 text-xl">
                <i class="fa-solid fa-warehouse"></i>
            </div>
            <div>
                <div class="text-xs font-mono uppercase text-slate-400">Total Stok Fisik</div>
                <div class="text-2xl font-black text-emerald-400 font-mono">{{ $totalStock }} <span class="text-xs font-normal text-slate-400">Unit</span></div>
            </div>
        </div>
    </div>

    <!-- Main Data Table Container -->
    <div class="glass-panel rounded-2xl border border-slate-800 overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-800 bg-slate-900/80 text-[11px] font-mono uppercase tracking-wider text-cyan-400">
                        <th class="py-4 px-4 text-center w-12">#</th>
                        <th class="py-4 px-4 w-20">Foto</th>
                        <th class="py-4 px-4">Nama Produk &amp; SKU</th>
                        <th class="py-4 px-4">Kategori</th>
                        <th class="py-4 px-4">Harga Satuan</th>
                        <th class="py-4 px-4">Garansi</th>
                        <th class="py-4 px-4 text-center">Stok</th>
                        <th class="py-4 px-4 text-center w-36">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800 text-xs">
                    @forelse($products as $index => $product)
                        <tr class="hover:bg-slate-800/40 transition-colors">
                            <td class="py-4 px-4 text-center text-slate-500 font-mono">
                                {{ $products->firstItem() + $index }}
                            </td>
                            <td class="py-4 px-4">
                                <div class="w-12 h-12 rounded-lg bg-slate-800 overflow-hidden border border-slate-700 flex items-center justify-center shrink-0">
                                    @if($product->image && (Storage::disk('public')->exists($product->image) || file_exists(public_path('storage/' . $product->image))))
                                        <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover">
                                    @else
                                        <i class="fa-solid fa-microchip text-slate-500"></i>
                                    @endif
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <a href="{{ route('public.product.show', $product->slug) }}" target="_blank" class="font-bold text-white hover:text-cyan-400 transition-colors text-sm line-clamp-1">
                                    {{ $product->name }}
                                </a>
                                <span class="text-[11px] font-mono text-slate-400">Slug: {{ $product->slug }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="px-2.5 py-1 rounded-md text-[11px] font-mono bg-navy-900 text-cyan-300 border border-cyan-500/20">
                                    {{ $product->category->name }}
                                </span>
                            </td>
                            <td class="py-4 px-4 font-mono font-bold text-cyan-400 text-sm">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </td>
                            <td class="py-4 px-4 text-slate-300">
                                <i class="fa-solid fa-shield-halved text-cyan-500 me-1"></i>{{ $product->warranty }}
                            </td>
                            <td class="py-4 px-4 text-center">
                                @if($product->stock > 0)
                                    <span class="px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 font-mono">
                                        {{ $product->stock }}
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full text-[11px] font-bold bg-rose-500/20 text-rose-300 border border-rose-500/30 font-mono">
                                        0
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.products.edit', $product->id) }}" 
                                       class="p-2 rounded-lg bg-amber-500/10 text-amber-400 hover:bg-amber-500 hover:text-navy-900 border border-amber-500/30 transition-all"
                                       title="Edit Produk">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk {{ addslashes($product->name) }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="p-2 rounded-lg bg-rose-500/10 text-rose-400 hover:bg-rose-500 hover:text-white border border-rose-500/30 transition-all"
                                                title="Hapus Produk">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-12 text-slate-400">
                                <i class="fa-solid fa-inbox text-4xl mb-3 text-slate-600 block"></i>
                                Belum ada produk tersimpan di database.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($products->hasPages())
            <div class="p-4 border-t border-slate-800 bg-slate-900/60">
                {{ $products->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
