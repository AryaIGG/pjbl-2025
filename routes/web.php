<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('home', [
        'title' => 'Home Page',
        'posts' => Post::latest()->take(6)->get()
    ]);
});

Route::get('/contact', [PageController::class, 'contact']);

Route::get('/posts', function () {
    $posts = Post::latest()->get();
    return view('posts', ['title' => 'Blog Page', 'posts' => $posts]);
});

Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}', [PostController::class, 'destroy']);

Route::get('/authors/{user:username}', function (User $user) {
    return view('posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', ['title' => ' Articles in: ' . $category->name, 'posts' => $category->posts]);
});

Route::get('/about', [PageController::class, 'about']);
