<?php

use App\Http\Controllers\AdminProductsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home')->name('home');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product');

//Admin routes
//index
Route::get('/admin/products', [AdminProductsController::class, 'index'])->name('admin.products.index');
//create
Route::get('/admin/products/create', [AdminProductsController::class, 'create'])->name('admin.products.create');
Route::post('/admin/products', [AdminProductsController::class, 'store'])->name('admin.products.store');
//edit
Route::get('/admin/products/{product}/edit', [AdminProductsController::class, 'edit'])->name('admin.products.edit');
Route::put('/admin/products/{product}', [AdminProductsController::class, 'update'])->name('admin.products.update');
//delete
Route::delete('/admin/products/{product}', [AdminProductsController::class, 'destroy'])->name('admin.products.destroy');
//delete product image
Route::get('/admin/products/{product}/image', [AdminProductsController::class, 'deleteImage'])->name('admin.products.image.delete');

