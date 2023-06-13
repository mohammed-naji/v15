<?php

use App\Http\Controllers\CoffeeController;
use Illuminate\Support\Facades\Route;

Route::prefix('coffee')->name('coffee.')->group(function() {
    Route::get('/', [CoffeeController::class, 'index'])->name('index');
    Route::get('/about', [CoffeeController::class, 'about'])->name('about');
    Route::get('/products', [CoffeeController::class, 'products'])->name('products');
    Route::get('/store', [CoffeeController::class, 'store'])->name('store');
});
