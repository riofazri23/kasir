<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DiskonController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);

// CRUD DATA USER
Route::get('/user',[UserController::class, 'index']);
Route::post('/user/store',[UserController::class, 'store']);
Route::post('/user/update/{id}',[UserController::class, 'update']);
Route::post('/user/destroy/{id}',[UserController::class, 'destroy']);

// CRUD DATA JENIS BARANG
Route::get('/jenisbarang',[JenisBarangController::class, 'index']);
Route::post('/jenisbarang/store',[JenisBarangController::class, 'store']);
Route::post('/jenisbarang/update/{id}',[JenisBarangController::class, 'update']);
Route::post('/jenisbarang/destroy/{id}',[JenisBarangController::class, 'destroy']);

// CRUD DATA BARANG
Route::get('/barang',[BarangController::class, 'index']);
Route::post('/barang/store',[BarangController::class, 'store']);
Route::post('/barang/update/{id}',[BarangController::class, 'update']);
Route::post('/barang/destroy/{id}',[BarangController::class, 'destroy']);

// SETTING DISKON
Route::get('/setdiskon',[DiskonController::class, 'index']);
Route::post('/setdiskon/update/{id}',[DiskonController::class, 'update']);

// KASIR
Route::get('/transaksi',[TransaksiController::class, 'index']);
Route::get('/transaksi/create',[TransaksiController::class, 'create']);