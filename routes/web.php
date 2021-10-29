<?php

use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('categories', App\Http\Controllers\CategoryController::class);
Route::resource('products', App\Http\Controllers\ProductController::class);
Route::get('orders/{id_order}/status/{id_status}', 'App\Http\Controllers\OrderController@status')->name('orders.status');
Route::resource('orders', App\Http\Controllers\OrderController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
