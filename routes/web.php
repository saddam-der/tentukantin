<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
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

// Route::get('/', function () {
//     return view('user.menu');
// });

Route::get('/', [DashboardController::class, 'index'])->name('index');

Route::get('/cart', [DashboardController::class, 'cart'])->name('cart');

Route::get('tambah/{id_masakan}', [DashboardController::class, 'addToCart']);

Route::patch('update-keranjang', [DashboardController::class, 'update']);

Route::delete('remove-keranjang', [DashboardController::class, 'remove'])->name('hapus');

Route::get('order', [OrderController::class, 'addOrder'])->name('order');
