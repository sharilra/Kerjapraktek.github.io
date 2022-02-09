<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardProduksController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;


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
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/shop', function () {
    return view('shop');
});
// Route::get('/shop-single', function () {
//     return view('shop-single');
// });
Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate']);

Route::post('/logout',[LoginController::class, 'logout']);

Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/shop',[ProdukController::class, 'index']);
Route::get('/shop/{shopsingle:slug}',[ProdukController::class, 'show']);
Route::get('/dashboard',[DashboardController::class, 'index']);
Route::get('/dashboard/produks/checkSlug',[DashboardProduksController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/produks',DashboardProduksController::class)->middleware('auth');
