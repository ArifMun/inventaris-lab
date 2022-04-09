<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
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
// Route::get('/',[AuthController::class, 'index'])->name('index');
// Route::post('/cek_login',[AuthController::class, 'cek_login']);
// Route::get('/logout',[AuthController::class, 'logout']);

// Route::group(['middleware']) 
Route::get('login', [AuthController::class, 'index'])->name('index');
// Route::get('register', 'App\Http\Controllers\AuthController@register')->name('register');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['middlewere' => ['auth','CheckLevel:admin']], function(){
    Route::resource('admin', AkunController::class);
     // Data master (User)
     Route::get('user', [UserController::class, 'index']);
     Route::post('/user/store', [UserController::class, 'store']);
     Route::post('/user/{id}/update', [UserController::class, 'update']);
     Route::get('/user/{id}/destroy', [UserController::class, 'destroy']);


     // Data master (Kategori)
     Route::get('kategori', [KategoriController::class, 'index']);
     Route::post('/kategori/store', [KategoriController::class, 'store']);
     Route::post('/kategori/{id}/update', [KategoriController::class, 'update']);
     Route::get('/kategori/{id}/destroy', [KategoriController::class, 'destroy']);


     // Data master (Barang)
     Route::get('barang', [BarangController::class, 'index']);
     Route::post('/barang/store', [BarangController::class, 'store']);
     Route::get('/barang/create', [BarangController::class, 'create']);
     Route::post('/barang/{id}/update', [BarangController::class, 'update']);
     Route::get('/barang/kode_kategori/{id} ', [BarangController::class, 'autofill']);
    //  Route::get('/barang/no_barang/{id} ', [BarangController::class, 'autofillBarang']);
     Route::get('/barang/{id}/destroy', [BarangController::class, 'destroy']);
});

Route::group(['middlewere' => ['auth','CheckLevel:superadmin']], function(){
    Route::resource('superadmin', AkunController::class);
     // Data master (User)
     Route::resource('user', UserController::class);
     Route::resource('kategori', KategoriController::class);
     Route::resource('barang', BarangController::class);
    
});