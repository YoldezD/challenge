<?php
use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;


Route::get('/brands/{brand}/search-history', [BrandController::class, 'showSearchHistory'])->name('search');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products/create', [ProductController::class, 'showProductForm'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/welcome', function () { return view('welcome');})->name('welcome');
Route::get('/brands/{brandId}/matches', [BrandController::class, 'showMatches']);
Route::get('/suggested-suppliers-view/{category}', function ($category) {
    $suppliersResponse = app(SupplierController::class)->getSuggestedSuppliers($category);
    $suppliers = json_decode($suppliersResponse->content())->suppliers;

    return view('supplier', ['suppliers' => $suppliers]);
});