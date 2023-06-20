<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Site1Controller;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SubscribeController;

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

// Route::get('/', function() {
//     return 'Home';
// });

// Route::get('/about', function() {
//     return 'About';
// });

// Route::get('/contact', function() {
//     return 'Contact page';
// });

// Route::post('/contact', function() {
//     return 'Contact post';
// });

// Route::get('/posts/{id?}', function($id = '') {
//     return 'Posts';
// });

// Route::post('subscribe', function() {
//     return 'Subscribe';
// });














// Route::get('our-team', function() {
//     return 'Our Team';
// })->name('teampage');

// DRY => DON'T REPEAT YOURSELF

// $page = 'admin';

// Route::get($page.'/posts', function() {});
// Route::get($page.'/comment', function() {});
// Route::get($page.'/products', function() {});
// Route::get($page.'/orders', function() {});
// Route::get($page.'/users', function() {});
// Route::get($page.'/roles', function() {});


// Route::prefix('admin')->name('admin.')->group(function() {
//     Route::get('/posts', function() {})->name('posts');
//     Route::get('/comment', function() {})->name('comment');
//     Route::get('/products', function() {})->name('products');
//     Route::get('/orders', function() {})->name('orders');
//     Route::get('/users', function() {})->name('users');
//     Route::get('/roles', function() {})->name('roles');
// });


// Route::get('/', 'TestController@index');
// Route::get('/', [TestController::class, 'index']);
// Route::get('/', [TestController::class, 'home']);

// Route::get('/', [SiteController::class, 'index'])->name('site.index');
// Route::get('/about', [SiteController::class, 'about'])->name('site.about');
// Route::get('/services', [SiteController::class, 'services'])->name('site.services');
// Route::get('/team', [SiteController::class, 'team'])->name('site.team');
// Route::get('/contact-me', [SiteController::class, 'contact'])->name('site.contact');


// Posts CRUD Application Routes
// Read Routes
// Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
// Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

// // Create Routes
// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
// Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');

// // Update Routes
// Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Route::match(['put', 'patch'],'/posts/{id}/update', [PostController::class, 'update'])->name('posts.update');

// // Delete
// Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

// Route::resource('posts', PostController::class);

// Route::get('/subscribe', SubscribeController::class);

// Route::get('/', [SiteController::class, 'home'])->name('home');


Route::prefix('site1')->name('site1.')->group(function() {
    Route::get('/', [Site1Controller::class, 'index'])->name('index');
    Route::get('/my-resume', [Site1Controller::class, 'resume'])->name('resume');
    Route::get('/our-projects', [Site1Controller::class, 'projects'])->name('projects');
    Route::get('/contact', [Site1Controller::class, 'contact'])->name('contact');
    Route::post('/contact', [Site1Controller::class, 'contact'])->name('contact');
});



Route::prefix('blog')->name('blog.')->group(function() {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/about', [BlogController::class, 'about'])->name('about');
    Route::get('/contact', [BlogController::class, 'contact'])->name('contact');
    Route::get('/post', [BlogController::class, 'post'])->name('post');
});

Route::get('form1', [FormController::class, 'form1'])->name('form1');
Route::post('form1', [FormController::class, 'form1_data'])->name('form1_data');


Route::get('/form2', [FormController::class, 'form2'])->name('form2');
Route::post('/form2', [FormController::class, 'form2_data'])->name('form2_data');


Route::get('/form3', [FormController::class, 'form3'])->name('form3');
Route::post('/form3', [FormController::class, 'form3_data'])->name('form3_data');

Route::get('/form4', [FormController::class, 'form4'])->name('form4');
Route::post('/form4', [FormController::class, 'form4_data'])->name('form4_data');

Route::get('/form5', [FormController::class, 'form5'])->name('form5');
Route::post('/form5', [FormController::class, 'form5_data'])->name('form5_data');
