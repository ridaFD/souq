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


Auth::routes();

Route::group(['middleware' => ['web']],function () {
    Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/user/create', [Controllers\UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [Controllers\UserController::class, 'store']);

    Route::get('/product/create', [Controllers\ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [Controllers\ProductController::class, 'store']);
    Route::post('/product/edit/{id}', [Controllers\ProductController::class, 'edit'])->name('product.edit');
    Route::patch('/product/update/{product}', [Controllers\ProductController::class, 'update']);

    Route::get('/profile', [Controllers\ProfileController::class, 'show'])->name('profile');
    Route::post('/profile/edit/{user}', [Controllers\ProfileController::class, 'edit']);
    Route::patch('/profile/update/{user}', [Controllers\ProfileController::class, 'update']);
});

