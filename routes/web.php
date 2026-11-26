<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Axion Tech (PT Akses Digital Mandiri)
|--------------------------------------------------------------------------
*/

// 1. Rute Publik
Route::get('/', [ProductController::class, 'publicIndex'])->name('home');
Route::get('/catalog', [ProductController::class, 'publicIndex'])->name('public.catalog');
Route::get('/product/{slug}', [ProductController::class, 'publicShow'])->name('public.product.show');

// 2. Rute Admin Dashboard CRUD Resource (/admin/products)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::redirect('/', '/admin/products');
    Route::resource('products', ProductController::class)->except(['show']);
});
