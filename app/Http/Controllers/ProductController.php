<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * HALAMAN PUBLIK: Menampilkan katalog produk dengan filter kategori
     */
    public function publicIndex(Request $request)
    {
        $selectedCategory = $request->query('category');

        $query = Product::with('category')->latest();

        if ($selectedCategory) {
            $query->whereHas('category', function ($q) use ($selectedCategory) {
                $q->where('slug', $selectedCategory);
            });
        }

        $products = $query->paginate(9)->withQueryString();
        $categories = Category::withCount('products')->get();

        return view('public.index', compact('products', 'categories', 'selectedCategory'));
    }

    /**
     * HALAMAN PUBLIK: Detail spesifikasi produk
     */
    public function publicShow($slug)
    {
        $product = Product::with('category')->where('slug', $slug)->firstOrFail();
        $relatedProducts = Product::with('category')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(3)
            ->get();

        return view('public.show', compact('product', 'relatedProducts'));
    }

    /**
     * ADMIN: Tabel daftar produk (Dashboard CRUD)
     */
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalStock = Product::sum('stock');

        return view('admin.index', compact('products', 'totalProducts', 'totalCategories', 'totalStock'));
    }

    /**
     * ADMIN: Form tambah produk baru
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.create', compact('categories'));
    }

    /**
     * ADMIN: Simpan produk baru dengan validasi & upload gambar
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:150',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'warranty'    => 'required|string|max:50',
            'stock'       => 'required|integer|min:0',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'name.required'        => 'Nama produk wajib diisi.',
            'category_id.required' => 'Kategori produk wajib dipilih.',
            'category_id.exists'   => 'Kategori tidak valid.',
            'description.required' => 'Deskripsi produk wajib diisi.',
            'price.required'       => 'Harga produk wajib diisi.',
            'price.numeric'        => 'Harga produk harus berupa angka numerik.',
            'warranty.required'    => 'Garansi produk wajib diisi.',
            'stock.required'       => 'Stok produk wajib diisi.',
            'stock.integer'        => 'Stok harus berupa bilangan bulat.',
            'image.image'          => 'File harus berupa gambar.',
            'image.max'            => 'Ukuran gambar maksimal 2MB (2048 KB).',
        ]);

        $validated['slug'] = Str::slug($validated['name']) . '-' . Str::random(5);

        // Penanganan upload gambar via Storage::disk('public')->put()
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('products', $file, $filename);
            $validated['image'] = 'products/' . $filename;
        }

        Product::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk "' . $validated['name'] . '" berhasil ditambahkan ke katalog Axion Tech!');
    }

    /**
     * ADMIN: Form edit produk
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.edit', compact('product', 'categories'));
    }

    /**
     * ADMIN: Update produk dengan validasi & update upload gambar
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:150',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'warranty'    => 'required|string|max:50',
            'stock'       => 'required|integer|min:0',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'name.required'        => 'Nama produk wajib diisi.',
            'category_id.required' => 'Kategori produk wajib dipilih.',
            'category_id.exists'   => 'Kategori tidak valid.',
            'description.required' => 'Deskripsi produk wajib diisi.',
            'price.required'       => 'Harga produk wajib diisi.',
            'price.numeric'        => 'Harga produk harus berupa angka numerik.',
            'warranty.required'    => 'Garansi produk wajib diisi.',
            'stock.required'       => 'Stok produk wajib diisi.',
            'stock.integer'        => 'Stok harus berupa bilangan bulat.',
            'image.image'          => 'File harus berupa gambar.',
            'image.max'            => 'Ukuran gambar maksimal 2MB (2048 KB).',
        ]);

        // Jika nama diubah, perbarui slug
        if ($product->name !== $validated['name']) {
            $validated['slug'] = Str::slug($validated['name']) . '-' . Str::random(5);
        }

        // Penanganan ganti gambar
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada di storage public dan bukan placeholder seeder default
            if ($product->image && Storage::disk('public')->exists($product->image) && !str_contains($product->image, 'sample-')) {
                Storage::disk('public')->delete($product->image);
            }

            $file = $request->file('image');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('products', $file, $filename);
            $validated['image'] = 'products/' . $filename;
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Data produk "' . $product->name . '" berhasil diperbarui!');
    }

    /**
     * ADMIN: Hapus produk
     */
    public function destroy(Product $product)
    {
        $name = $product->name;

        // Hapus file gambar jika tersimpan di disk public
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk "' . $name . '" berhasil dihapus dari sistem.');
    }
}
