<?php

use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;

Route::get('/suggested-suppliers/{category}', [SupplierController::class, 'getSuggestedSuppliers']);
Route::post('/products', [ProductController::class, 'store']);
