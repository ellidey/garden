<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\ShopController::class, 'showAll'])->name('root');
Route::get('/category/{id}', [App\Http\Controllers\ShopController::class, 'showCategory'])->name('category');
Route::get('/item/{id}', [\App\Http\Controllers\ItemController::class, 'show'])->name('item');

Route::post('/basket/add/{id}', [\App\Http\Controllers\ShopController::class, 'addBasket'])->name('basket.add');
Route::post('/basket/remove/{id}', [\App\Http\Controllers\ShopController::class, 'removeBasket'])->name('basket.remove');

Route::get('/orders/create', [\App\Http\Controllers\OrdersController::class, 'create'])->name('orders.create');
Route::post('/orders/create', [\App\Http\Controllers\OrdersController::class, 'store'])->name('orders.store');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::middleware('operator')->prefix('admin')->group(function () {
    Route::resource('users', \App\Http\Controllers\UserController::class)->except('show');
    Route::resource('categories', \App\Http\Controllers\CategoryController::class)->except('show');
    Route::resource('items', \App\Http\Controllers\ItemController::class)->except('show');
    Route::resource('orders', \App\Http\Controllers\OrdersController::class)->except('create', 'store');
});

Route::middleware('auth')->group(function () {
});
