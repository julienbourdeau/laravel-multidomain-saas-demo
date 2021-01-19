<?php

use App\Models\Post;
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

Route::domain('demo.laravel')->group(function () {

    Route::view('/', 'welcome');

    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        Route::view('/dashboard', 'dashboard')->name('dashboard');

        Route::get('/posts', function () {
            return view('posts.index', [
                'posts' => Post::all(),
            ]);
        })->name('posts');

        Route::get('/posts/{post}', function(Post $post) {
            return view('posts.show', [
                'post' => $post,
            ]);
        });
    });
});

Route::domain('{blog:domain}')->where(['blog' => '.+'])->group(function () {
   Route::get('/', function() {
       return view('blog.home', [
           'posts' => Post::all(),
       ]);
   });

   Route::get('/{post}', function(\App\Models\Team $blog, Post $post) {
       return view('blog.post', [
           'post' => $post,
       ]);
   })->name('blogpost');
});
