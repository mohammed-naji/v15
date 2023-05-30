<?php

use Illuminate\Support\Facades\Route;

// . // concatenate
// -> // object -> method, value
// => // array key => value
// :: // class :: static method

// use , namespace

// Route::get('url', 'Action');
// Route::post('url', 'Action');
// Route::put('url', 'Action');
// Route::patch('url', 'Action');
// Route::delete('url', 'Action');

// Route::post('/', function() {
//     return 'Homepage - Post';
// });

// Route::put('/', function() {
//     return 'Homepage - Put';
// });

// Route::get('/', function() {
//     return 'Homepage - Get';
// });

Route::get('/', function() {
    return 'Home';
});

Route::get('about', function() {
    return 'About Page';
});

Route::get('contact', function() {
    return 'Contact Page';
});

// include 'admin.php';

Route::match(['put', 'patch'], 'edit-profile', function() {
    return 'Edit Profile';
});

Route::any('/policy', function() {
    return 'Policy Page';
});

Route::get('post/{id}', function($id) {
    return "Post ID : " . $id;
});
