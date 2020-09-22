<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PetugasController;
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


// Route::get('tambah/{id_masakan}', [DashboardController::class, 'addToCart']);

// Route::patch('update-keranjang', [DashboardController::class, 'update']);

// Route::delete('remove-keranjang', [DashboardController::class, 'remove'])->name('hapus');

Route::post('order/{id_masakan}', [OrderController::class, 'addOrder']);

Route::get('checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::get('confirm', [OrderController::class, 'confirm']);

Route::delete('hapus/{id_masakan}', [OrderController::class, 'delete']);


Route::get('admin.index', [AdminController::class, 'index'])->name('admin.index');
Route::resource('admin', AdminController::class);

Route::get('admin.petugas', [PetugasController::class, 'index'])->name('admin.petugas');
Route::resource('petugas', PetugasController::class);

Route::get('histori', [HistoriController::class, 'index']);
Route::get('histori/{id_pesan}', [HistoriController::class, 'detail']);
Route::get('detail/{id_pesan}', [HistoriController::class, 'cetak_pdf']);


//Auth
Route::get('register', [PetugasController::class, 'getRegister'])->name('register');
Route::post('register', [PetugasController::class, 'postRegister']);

Route::get('login', [AuthController::class, 'getLogin'])->name('login');
Route::post('login', [AuthController::class, 'postLogin']);

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
