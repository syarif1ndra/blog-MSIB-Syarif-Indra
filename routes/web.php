<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
<<<<<<< HEAD
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute untuk menampilkan detail pos
Route::get('/home/posts/{post}', [HomeController::class, 'showPost'])->name('home.posts.show');
=======
use App\Http\Controllers\PostQbuilderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
>>>>>>> 3b9aed0d0cebc4a471119d63ed3688d019f301d1

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

<<<<<<< HEAD
Route::resource('posts', PostController::class);
Route::resource('authors', AuthorController::class);

=======
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{post}', [CategoryController::class, 'show'])->name('posts.show');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/edit/{post}', [PostController::class, 'edit'])->name('posts.edit');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::resource('posts', PostController::class);
Route::resource('authors', AuthorController::class);



>>>>>>> 3b9aed0d0cebc4a471119d63ed3688d019f301d1
Route::middleware(['auth'])->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/{user}/profile', [UserController::class, 'profile'])->name('users.profile');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update'); 
});
<<<<<<< HEAD

Route::resource('users', UserController::class);

=======
Route::resource('users', UserController::class);

Route::get('/', [HomeController::class, 'index'])->name('home');


>>>>>>> 3b9aed0d0cebc4a471119d63ed3688d019f301d1
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

<<<<<<< HEAD
Route::get('/profile', [UserController::class, 'show'])->name('profile')->middleware('auth');
Route::middleware(['auth'])->group(function () {
    Route::resource('authors', AuthorController::class);
    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
});
=======

Route::get('/profile', [UserController::class, 'show'])->name('profile')->middleware('auth');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
>>>>>>> 3b9aed0d0cebc4a471119d63ed3688d019f301d1
