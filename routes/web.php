<?php

use Illuminate\Support\Facades\Route;

// . // concatenate
// -> // object -> method, value
// => // array key => value
// :: // class :: static method

// method chain

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

// Route::get('/', function() {
//     return 'Home';
// });

// Route::get('about', function() {
//     return 'About Page';
// });

// Route::get('contact', function() {
//     return 'Contact Page';
// });

// include 'admin.php';

// Route::match(['put', 'patch'], 'edit-profile', function() {
//     return 'Edit Profile';
// });

// Route::any('/policy', function() {
//     return 'Policy Page';
// });

// Route::get('post/{id}', function($id) {
//     return "Post ID : " . $id;
// })->whereNumber('id');

// Route::get('profile/{name}/{age}/{user}', function($name, $age, $user) {
//     return "Welcome $name, your age is $age, Username is $user";
// })->where('name', '[A-Za-z]+')->whereNumber('age')->whereAlphaNumeric('user');


// https://bakkah.com/sessions/capm
// https://bakkah.com/sessions/capm/online-training

// Route::get('sessions/{course}/{type?}', function($course, $type = '') {

//     if(empty($type)) {
//         return "Course : $course";
//     }else {
//         return "Course : $course , Type : $type";
//     }
// });

Route::get('/', function() {
    return 'Home';
});

Route::get('/about', function() {
    return 'About';
});

Route::get('/contact', function() {
    return 'Contact page';
});

Route::post('/contact', function() {
    return 'Contact post';
});

Route::get('/posts/{id?}', function($id = '') {
    return 'Posts';
});

Route::post('subscribe', function() {
    return 'Subscribe';
});














Route::get('our-team', function() {
    return 'Our Team';
})->name('teampage');

// DRY => DON'T REPEAT YOURSELF

// $page = 'admin';

// Route::get($page.'/posts', function() {});
// Route::get($page.'/comment', function() {});
// Route::get($page.'/products', function() {});
// Route::get($page.'/orders', function() {});
// Route::get($page.'/users', function() {});
// Route::get($page.'/roles', function() {});


Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/posts', function() {})->name('posts');
    Route::get('/comment', function() {})->name('comment');
    Route::get('/products', function() {})->name('products');
    Route::get('/orders', function() {})->name('orders');
    Route::get('/users', function() {})->name('users');
    Route::get('/roles', function() {})->name('roles');
});









