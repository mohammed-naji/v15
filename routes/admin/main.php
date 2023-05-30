<?php

use Illuminate\Support\Facades\Route;

Route::get('admin/posts', function() {
    return 'Admin Posts';
});

Route::get('admin/products', function() {
    return 'Admin Products';
});
