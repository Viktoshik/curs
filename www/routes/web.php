<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/register', [RegisterController::class, 'registerForm']);
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/auth', [RegisterController::class, 'authForm'])->name('login');
Route::post('/auth', [RegisterController::class, 'auth']);
Route::get('/logout', [RegisterController::class, 'logout']);
Route::post('/cabinet/changePassword', [RegisterController::class, 'changePassword']);
Route::get('/favorite', [RegisterController::class, 'favorite']);
Route::get('/favorite/{id}', [RegisterController::class, 'favoriteAdd']);


Route::get('/', [HomeController::class, 'index']);
Route::get('/category/{category}', [HomeController::class, 'category']);
Route::get('/basket/add/{id}', [BasketController::class, 'add']);



/*Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');

// API для корзины
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/products/quickview', [ProductController::class, 'quickView'])->name('products.quickview');*/
