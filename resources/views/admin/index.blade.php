@extends('layouts.app')

@section('title', 'Admin Dashboard - Axion Tech')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-12">

    <!-- Header Panel Clean -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8 pb-6 border-b border-slate-200">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-200 mb-2">
                <i class="fa-solid fa-shield-halved text-[11px]"></i> Administrator Control Center
            </div>
            <h1 class="text-3xl font-display font-bold text-slate-900 tracking-tight">Katalog Inventaris Produk</h1>
            <p class="text-xs text-slate-500 mt-1">Kelola data barang, harga, garansi, foto, dan stok PT Akses Digital Mandiri</p>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('public.catalog') }}" class="px-5 py-2.5 rounded-full text-xs font-semibold bg-white hover:bg-slate-50 text-slate-700 border border-slate-300 transition-colors shadow-sm">
                <i class="fa-solid fa-eye me-1.5"></i> Lihat Web Publik
            </a>
            <a href="{{ route('admin.products.create') }}" class="px-5 py-2.5 rounded-full text-xs font-bold bg-slate-900 hover:bg-brand-600 text-white shadow-md shadow-slate-900/10 transition-all">
                <i class="fa-solid fa-plus me-1.5"></i> Tambah Produk Baru
            </a>
        </div>
    </div>

    <!-- Quick Stats Cards (Gitye Metric Style) -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl shrink-0">
                <i class="fa-solid fa-boxes-stacked"></i>
            </div>
            <div>
                <div class="text-xs uppercase text-slate-400 font-semibold tracking-wider">Total Produk</div>
                <div class="text-2xl font-display font-bold text-slate-900">{{ $totalProducts }} <span class="text-xs font-normal text-slate-500">Item</span></div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-xl shrink-0">
                <i class="fa-solid fa-layer-group"></i>
            </div>
            <div>
                <div class="text-xs uppercase text-slate-400 font-semibold tracking-wider">Total Kategori</div>
                <div class="text-2xl font-display font-bold text-slate-900">{{ $totalCategories }} <span class="text-xs font-normal text-slate-500">Kategori</span></div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl shrink-0">
                <i class="fa-solid fa-warehouse"></i>
            </div>
            <div>
                <div class="text-xs uppercase text-slate-400 font-semibold tracking-wider">Total Stok Fisik</div>
                <div class="text-2xl font-display font-bold text-emerald-700">{{ $totalStock }} <span class="text-xs font-normal text-slate-500">Unit</span></div>
            </div>
        </div>
    </div>

    <!-- Main Data Table Container (Gitye Style Clean White Table) -->
    <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50 text-[11px] uppercase tracking-wider font-bold text-slate-600">
                        <th class="py-4 px-5 text-center w-12">#</th>
                        <th class="py-4 px-4 w-20">Foto</th>
                        <th class="py-4 px-5">Nama Produk &amp; SKU</th>
                        <th class="py-4 px-4">Kategori</th>
                        <th class="py-4 px-4">Harga Satuan</th>
                        <th class="py-4 px-4">Garansi</th>
                        <th class="py-4 px-4 text-center">Stok</th>
                        <th class="py-4 px-5 text-center w-36">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs">
                    @forelse($products as $index => $product)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="py-4 px-5 text-center text-slate-400 font-medium">
                                {{ $products->firstItem() + $index }}
                            </td>
                            <td class="py-4 px-4">
                                <div class="w-12 h-12 rounded-xl bg-slate-50 overflow-hidden border border-slate-200 flex items-center justify-center shrink-0">
                                    @if($product->image && (Storage::disk('public')->exists($product->image) || file_exists(public_path('storage/' . $product->image))))
                                        <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover">
                                    @else
                                        <i class="fa-solid fa-microchip text-slate-400"></i>
                                    @endif
                                </div>
                            </td>
                            <td class="py-4 px-5">
                                <a href="{{ route('public.product.show', $product->slug) }}" target="_blank" class="font-bold text-slate-900 hover:text-brand-600 transition-colors text-sm line-clamp-1">
                                    {{ $product->name }}
                                </a>
                                <span class="text-[11px] text-slate-400 font-mono">Slug: {{ $product->slug }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-semibold bg-slate-100 text-slate-700">
                                    {{ $product->category->name }}
                                </span>
                            </td>
                            <td class="py-4 px-4 font-display font-bold text-slate-900 text-sm">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </td>
                            <td class="py-4 px-4 text-slate-600">
                                <i class="fa-solid fa-shield-halved text-brand-600 me-1"></i>{{ $product->warranty }}
                            </td>
                            <td class="py-4 px-4 text-center">
                                @if($product->stock > 0)
                                    <span class="px-2.5 py-1 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        {{ $product->stock }}
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full text-[11px] font-semibold bg-rose-50 text-rose-700 border border-rose-200">
                                        0
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-5 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.products.edit', $product->id) }}" 
                                       class="p-2 rounded-xl bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 transition-all"
                                       title="Edit Produk">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk {{ addslashes($product->name) }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="p-2 rounded-xl bg-rose-50 text-rose-600 hover:bg-rose-100 transition-all"
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
                                <i class="fa-solid fa-inbox text-4xl mb-3 text-slate-300 block"></i>
                                Belum ada produk tersimpan di database.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($products->hasPages())
            <div class="p-4 border-t border-slate-200 bg-slate-50">
                {{ $products->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
