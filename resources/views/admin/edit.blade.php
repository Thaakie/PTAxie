@extends('layouts.app')

@section('title', 'Edit Produk: ' . $product->name . ' - Admin Axion Tech')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <!-- Breadcrumb -->
    <nav class="flex items-center gap-2 text-xs font-mono text-slate-400 mb-6">
        <a href="{{ route('admin.products.index') }}" class="hover:text-cyan-400">Admin Dashboard</a>
        <span>/</span>
        <span class="text-cyan-400">Edit Produk #{{ $product->id }}</span>
    </nav>

    <div class="glass-panel rounded-3xl p-6 sm:p-10 border border-slate-800 shadow-2xl">
        <div class="flex items-center justify-between pb-6 mb-8 border-b border-slate-800">
            <div>
                <h1 class="text-2xl font-black text-white tracking-tight flex items-center gap-2.5">
                    <i class="fa-solid fa-pen-to-square text-amber-400"></i> Perbarui Data Produk
                </h1>
                <p class="text-xs text-slate-400 font-mono mt-1">Ubah spesifikasi atau upload foto baru untuk {{ $product->name }}</p>
            </div>
            <a href="{{ route('admin.products.index') }}" class="px-4 py-2 rounded-xl text-xs font-bold bg-slate-800 hover:bg-slate-700 text-slate-300 border border-slate-700 transition-colors">
                <i class="fa-solid fa-arrow-left me-1"></i> Batal
            </a>
        </div>

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nama Produk -->
            <div>
                <label for="name" class="block text-xs font-mono uppercase tracking-wider text-slate-300 mb-2 font-bold">
                    Nama Produk <span class="text-rose-400">*</span>
                </label>
                <input type="text" 
                       name="name" 
                       id="name" 
                       value="{{ old('name', $product->name) }}" 
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
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
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
                           value="{{ old('warranty', $product->warranty) }}" 
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
                               value="{{ old('price', (int)$product->price) }}" 
                               min="0" 
                               step="1000" 
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
                           value="{{ old('stock', $product->stock) }}" 
                           min="0" 
                           class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border {{ $errors->has('stock') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-700' }} text-white text-sm font-mono focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all" 
                           required>
                    @error('stock')
                        <p class="mt-1.5 text-xs text-rose-400 font-mono flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <!-- Upload File Gambar & Preview Lama -->
            <div>
                <label for="image" class="block text-xs font-mono uppercase tracking-wider text-slate-300 mb-2 font-bold">
                    Ganti Foto Produk (Kosongkan bila tidak ingin mengubah)
                </label>
                
                @if($product->image)
                    <div class="flex items-center gap-4 mb-3 p-3 rounded-xl bg-slate-900/60 border border-slate-800">
                        <div class="w-14 h-14 rounded-lg bg-slate-800 overflow-hidden border border-slate-700 shrink-0">
                            @if(Storage::disk('public')->exists($product->image) || file_exists(public_path('storage/' . $product->image)))
                                <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-cyan-400"><i class="fa-solid fa-image"></i></div>
                            @endif
                        </div>
                        <div class="text-xs">
                            <div class="text-slate-300 font-mono truncate max-w-sm">{{ $product->image }}</div>
                            <span class="text-[10px] text-cyan-400 font-mono">Foto produk saat ini aktif</span>
                        </div>
                    </div>
                @endif

                <div class="relative border-2 border-dashed border-slate-700 hover:border-cyan-500/50 rounded-2xl p-6 text-center bg-slate-900/40 transition-colors">
                    <input type="file" 
                           name="image" 
                           id="image" 
                           accept="image/png, image/jpeg, image/jpg, image/webp" 
                           class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    <div class="flex flex-col items-center justify-center pointer-events-none">
                        <i class="fa-solid fa-cloud-arrow-up text-3xl text-cyan-400 mb-2"></i>
                        <span class="text-xs text-slate-300 font-medium">Pilih gambar baru untuk menggantikan foto lama</span>
                        <span class="text-[10px] text-slate-500 font-mono mt-1">Maks. 2MB (JPG, PNG, WEBP)</span>
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
                          class="w-full px-4 py-3 rounded-xl bg-slate-900/90 border {{ $errors->has('description') ? 'border-rose-500 ring-1 ring-rose-500' : 'border-slate-700' }} text-white text-sm focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all font-sans leading-relaxed" 
                          required>{{ old('description', $product->description) }}</textarea>
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
                <button type="submit" class="px-7 py-3 rounded-xl text-xs font-bold bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-navy-900 shadow-lg shadow-amber-500/25 transition-all">
                    <i class="fa-solid fa-check me-1.5"></i> Perbarui Data Produk
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
