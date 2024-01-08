<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DiskonController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\SesiController;
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
Route::middleware(['guest'])->group(function(){
    Route::get('/',[SesiController::class,'index'])->name('login');
    Route::post('/',[SesiController::class,'login']);
});

Route::middleware(['auth'])->group(function(){
    // CRUD DATA USER
    Route::get('/user',[UserController::class, 'index'])->middleware('userAkses:super_admin');
    Route::post('/user/store',[UserController::class, 'store'])->middleware('userAkses:super_admin');
    Route::post('/user/update/{id}',[UserController::class, 'update'])->middleware('userAkses:super_admin');
    Route::post('/user/destroy/{id}',[UserController::class, 'destroy'])->middleware('userAkses:super_admin');
    
    // CRUD DATA JENIS BARANG
    Route::get('/jenisbarang',[JenisBarangController::class, 'index'])->middleware('userAkses:admin');
    Route::post('/jenisbarang/store',[JenisBarangController::class, 'store'])->middleware('userAkses:admin');
    Route::post('/jenisbarang/update/{id}',[JenisBarangController::class, 'update'])->middleware('userAkses:admin');
    Route::post('/jenisbarang/destroy/{id}',[JenisBarangController::class, 'destroy'])->middleware('userAkses:admin');
    
    // CRUD DATA BARANG
    Route::get('/barang',[BarangController::class, 'index'])->middleware('userAkses:admin');
    Route::post('/barang/store',[BarangController::class, 'store'])->middleware('userAkses:admin');
    Route::post('/barang/update/{id}',[BarangController::class, 'update'])->middleware('userAkses:admin');
    Route::post('/barang/destroy/{id}',[BarangController::class, 'destroy'])->middleware('userAkses:admin');
    
    // SETTING DISKON
    Route::get('/setdiskon',[DiskonController::class, 'index'])->middleware('userAkses:admin');
    Route::post('/setdiskon/update/{id}',[DiskonController::class, 'update'])->middleware('userAkses:admin');
    Route::get('/logout',[SesiController::class,'logout']);
});


// KASIR
Route::get('/transaksi',[TransaksiController::class, 'index']);
Route::get('/transaksi/create',[TransaksiController::class, 'create']);
