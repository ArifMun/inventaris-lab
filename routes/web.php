<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LapPengajuanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\HomeController;
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
Route::get('/beranda',[HomeController::class, 'index'])->name('index');
Route::get('/data-barang',[HomeController::class, 'barang'])->name('daftar-barang');
Route::get('/kategori-barang',[HomeController::class, 'kategori'])->name('kategori-barang');
Route::get('/pengadaan-barang',[HomeController::class, 'pengadaan'])->name('pengadaan-barang');
Route::get('/cetak-laporan',[HomeController::class, 'cetakBarang']);
// Route::get('laporan/cetak-laporan', [LaporanController::class, 'cetak'])->Auth::guest();
// Route::post('/cek_login',[AuthController::class, 'cek_login']);
// Route::get('/logout',[AuthController::class, 'logout']);

// Route::group(['middleware']) 
Route::get('login', [AuthController::class, 'index'])->name('login');
// Route::get('register', 'App\Http\Controllers\AuthController@register')->name('register');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['auth', 'CheckLevel:admin,superadmin']], function(){
    
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    // Route::resource('admin', AkunController::class);

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
    Route::get('/barang/{id}/destroy', [BarangController::class, 'destroy']);
    Route::get('/barang/kode_kategori/{id} ', [BarangController::class, 'autofill']);

     // Laporan
    Route::get('laporan', [LaporanController::class, 'index']);
    Route::get('laporan-pengajuan', [LapPengajuanController::class, 'index']);
    Route::get('laporan/cetak-laporan-pengajuan', [LapPengajuanController::class, 'cetak']);
    Route::get('laporan/cetak-laporan', [LaporanController::class, 'cetak']);

    //
    Route::get('pengajuan',[PengajuanController::class,'index']);
    Route::post('/pengajuan/store', [PengajuanController::class, 'store']);
    Route::post('/pengajuan/{id}/update', [PengajuanController::class, 'update']);
    Route::get('/pengajuan/{id}/destroy', [PengajuanController::class, 'destroy']);
    Route::get('/pengajuan/id-barang/{id} ', [PengajuanController::class, 'autofill']);
});

// Route::group(['middleware' => ['auth', 'CheckLevel:superadmin']], function(){ 
//     // Data master (User)
//     Route::get('user', [UserController::class, 'index']);
//     Route::post('/user/store', [UserController::class, 'store']);
//     Route::post('/user/{id}/update', [UserController::class, 'update']);
//     Route::get('/user/{id}/destroy', [UserController::class, 'destroy']);
// });

// Route::group(['middleware' => ['auth', 'CheckLevel:superadmin']], function(){
//     Route::resource('superadmin', AkunController::class);
//      // Data master (User)
//     //  Route::resource('user', UserController::class);
//     //  Route::resource('kategori', KategoriController::class);
//     //  Route::resource('barang', BarangController::class);

//     Route::get('user', [SuperAdminController::class, 'index']);
//     Route::post('/user/store', [SuperAdminController::class, 'store']);
//     Route::post('/user/{id}/update', [SuperAdminController::class, 'update']);
//     Route::get('/user/{id}/destroy', [SuperAdminController::class, 'destroy']);
    
// });