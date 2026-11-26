@extends('layouts.app')

@section('title', 'Tambah Produk Baru - Admin Axion Tech')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <!-- Breadcrumb -->
    <nav class="flex items-center gap-2 text-xs font-mono text-slate-400 mb-6">
        <a href="{{ route('admin.products.index') }}" class="hover:text-cyan-400">Admin Dashboard</a>
        <span>/</span>
        <span class="text-cyan-400">Tambah Produk Baru</span>
    </nav>

    <div class="glass-panel rounded-3xl p-6 sm:p-10 border border-slate-800 shadow-2xl">
        <div class="flex items-center justify-between pb-6 mb-8 border-b border-slate-800">
            <div>
                <h1 class="text-2xl font-black text-white tracking-tight flex items-center gap-2.5">
                    <i class="fa-solid fa-plus-circle text-cyan-400"></i> Tambah Produk Inventaris
                </h1>
                <p class="text-xs text-slate-400 font-mono mt-1">Lengkapi form di bawah ini untuk menambahkan gear baru ke katalog publik.</p>
            </div>
            <a href="{{ route('admin.products.index') }}" class="px-4 py-2 rounded-xl text-xs font-bold bg-slate-800 hover:bg-slate-700 text-slate-300 border border-slate-700 transition-colors">
                <i class="fa-solid fa-arrow-left me-1"></i> Batal
            </a>
        </div>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Nama Produk -->
            <div>
                <label for="name" class="block text-xs font-mono uppercase tracking-wider text-slate-300 mb-2 font-bold">
                    Nama Produk <span class="text-rose-400">*</span>
                </label>
                <input type="text" 
                       name="name" 
                       id="name" 
                       value="{{ old('name') }}" 
                       placeholder="Contoh: Axion Stealth Pro 75% Wireless Keyboard" 
                       class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border {{ $errors->has('name') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-700' }} text-white text-sm focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all font-sans" 
                       required>
                @error('name')
                    <p class="mt-1.5 text-xs text-rose-400 font-mono flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Kategori & Garansi Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Dropdown Kategori -->
                <div>
                    <label for="category_id" class="block text-xs font-mono uppercase tracking-wider text-slate-300 mb-2 font-bold">
                        Kategori Hardware <span class="text-rose-400">*</span>
                    </label>
                    <div class="relative">
                        <select name="category_id" 
                                id="category_id" 
                                class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border {{ $errors->has('category_id') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-700' }} text-white text-sm focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all appearance-none" 
                                required>
                            <option value="" disabled selected>- Pilih Kategori -</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 text-xs pointer-events-none"></i>
                    </div>
                    @error('category_id')
                        <p class="mt-1.5 text-xs text-rose-400 font-mono flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Masa Garansi -->
                <div>
                    <label for="warranty" class="block text-xs font-mono uppercase tracking-wider text-slate-300 mb-2 font-bold">
                        Masa Garansi <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" 
                           name="warranty" 
                           id="warranty" 
                           value="{{ old('warranty', '1 Tahun Garansi Resmi') }}" 
                           placeholder="Contoh: 1 Tahun Garansi Resmi" 
                           class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border {{ $errors->has('warranty') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-700' }} text-white text-sm focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all font-sans" 
                           required>
                    @error('warranty')
                        <p class="mt-1.5 text-xs text-rose-400 font-mono flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <!-- Harga & Stok Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Harga -->
                <div>
                    <label for="price" class="block text-xs font-mono uppercase tracking-wider text-slate-300 mb-2 font-bold">
                        Harga Satuan (Rp) <span class="text-rose-400">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-xs font-mono text-cyan-400 font-bold">Rp</span>
                        <input type="number" 
                               name="price" 
                               id="price" 
                               value="{{ old('price') }}" 
                               min="0" 
                               step="1000" 
                               placeholder="1250000" 
                               class="w-full pl-12 pr-4 py-3 rounded-xl bg-slate-900/90 border {{ $errors->has('price') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-700' }} text-white text-sm font-mono focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all" 
                               required>
                    </div>
                    @error('price')
                        <p class="mt-1.5 text-xs text-rose-400 font-mono flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Stok -->
                <div>
                    <label for="stock" class="block text-xs font-mono uppercase tracking-wider text-slate-300 mb-2 font-bold">
                        Jumlah Stok <span class="text-rose-400">*</span>
                    </label>
                    <input type="number" 
                           name="stock" 
                           id="stock" 
                           value="{{ old('stock', 10) }}" 
                           min="0" 
                           placeholder="10" 
                           class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border {{ $errors->has('stock') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-700' }} text-white text-sm font-mono focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all" 
                           required>
                    @error('stock')
                        <p class="mt-1.5 text-xs text-rose-400 font-mono flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <!-- Upload File Gambar -->
            <div>
                <label for="image" class="block text-xs font-mono uppercase tracking-wider text-slate-300 mb-2 font-bold">
                    Foto Produk (Format: JPG, PNG, WEBP - Maks. 2MB)
                </label>
                <div class="relative border-2 border-dashed border-slate-700 hover:border-cyan-500/50 rounded-2xl p-6 text-center bg-slate-900/40 transition-colors">
                    <input type="file" 
                           name="image" 
                           id="image" 
                           accept="image/png, image/jpeg, image/jpg, image/webp" 
                           class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    <div class="flex flex-col items-center justify-center pointer-events-none">
                        <i class="fa-solid fa-cloud-arrow-up text-3xl text-cyan-400 mb-2"></i>
                        <span class="text-xs text-slate-300 font-medium">Klik atau seret file gambar produk ke sini</span>
                        <span class="text-[10px] text-slate-500 font-mono mt-1">Disimpan ke storage/app/public/products</span>
                    </div>
                </div>
                @error('image')
                    <p class="mt-1.5 text-xs text-rose-400 font-mono flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Deskripsi Detail -->
            <div>
                <label for="description" class="block text-xs font-mono uppercase tracking-wider text-slate-300 mb-2 font-bold">
                    Deskripsi &amp; Spesifikasi Lengkap <span class="text-rose-400">*</span>
                </label>
                <textarea name="description" 
                          id="description" 
                          rows="5" 
                          placeholder="Jelaskan spesifikasi switch, dimensi deskmat, sensor mouse, kelengkapan kotak, dan fitur unggulan..." 
                          class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border {{ $errors->has('description') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-700' }} text-white text-sm focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all font-sans leading-relaxed" 
                          required>{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1.5 text-xs text-rose-400 font-mono flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Actions -->
            <div class="pt-6 border-t border-slate-800 flex items-center justify-end gap-3">
                <a href="{{ route('admin.products.index') }}" class="px-5 py-3 rounded-xl text-xs font-bold bg-slate-800 hover:bg-slate-700 text-slate-300 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-7 py-3 rounded-xl text-xs font-bold bg-gradient-to-r from-cyan-500 to-electric-600 hover:from-cyan-400 hover:to-electric-500 text-navy-900 shadow-lg shadow-cyan-500/25 transition-all glow-cyan">
                    <i class="fa-solid fa-save me-1.5"></i> Simpan Produk ke Katalog
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
