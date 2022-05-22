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

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::middleware('operator')->prefix('admin')->group(function () {
    Route::resource('users', \App\Http\Controllers\UserController::class)->except('show');
    Route::resource('categories', \App\Http\Controllers\CategoryController::class)->except('show');
    Route::resource('items', \App\Http\Controllers\ItemController::class)->except('show');
});

Route::middleware('auth')->group(function () {
});
