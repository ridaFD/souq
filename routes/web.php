<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

//Route::middleware('auth')->group(function () {
    Route::get('/user/create', [Controllers\UserController::class, 'create'])->name('user.create')->middleware('can:admin');
    Route::post('/user', [Controllers\UserController::class, 'store'])->name('user.store');


    Route::patch('/purchase/{items}', [
        'uses' => Controllers\PurchaseController::class,
        'as' => '/purchase',
    ]);


    Route::get('/cart', [Controllers\CartController::class, 'index'])->name('cart')->middleware('can:customer');
    Route::post('/cart/{product}', [Controllers\CartController::class, 'addToCart'])->name('add.to.cart');
    Route::delete('/cart/{product}', [Controllers\CartController::class, 'destroy'])->name('cart.destroy');

    Route::get('/home', [Controllers\ProductController::class, 'index'])->name('home');
    Route::get('/product/create', [Controllers\ProductController::class, 'create'])->name('product.create')->middleware('can:owner');
    Route::post('/product', [Controllers\ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{product}', [Controllers\ProductController::class, 'show'])->name('product.show');
    Route::post('/product/{product}/edit', [Controllers\ProductController::class, 'edit'])->name('product.edit');
    Route::patch('/product/{product}', [Controllers\ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{product}', [Controllers\ProductController::class, 'destroy'])->name('product.destroy');


    Route::get('/profile', [Controllers\ProfileController::class, 'show'])->name('profile')->middleware('can:owner');
    Route::post('/profile/{user:id}/edit', [Controllers\ProfileController::class, 'edit']);
    Route::patch('/profile/{user}', [Controllers\ProfileController::class, 'update'])->name('profile.update');
//});

