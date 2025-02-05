<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use App\Models\Category;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/upload-image', [PostController::class, 'uploadImage'])->name('image.upload');
Route::get('blog/{post:slug}', [PostController::class, 'show'])->name('post.show');
Route::get('category/{category:slug}', [CategoryController::class, 'show'])->name('category.show');


// must Login
Route::middleware('auth')->group(function () {
    // categories
    Route::resource('category', CategoryController::class);
    // Projects
    Route::resource('project', ProjectController::class);
    // Posts
    Route::resource('post', PostController::class)->except(['show']);
});

Route::get('blog', BlogController::class)->name('blog');
