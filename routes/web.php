<?php

use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);        // Menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']);    // Menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']); // Menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);       // Menyimpan data user baru

    Route::get('/create_ajax', [UserController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
    Route::post('/ajax', [UserController::class, 'store_ajax']);        // Menyimpan data user baru Ajax

    Route::get('/{id}', [UserController::class, 'show']);     // Menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']); // Menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']);    // Menyimpan perubahan data user
    
    Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);        // Menampilkan halaman form edit user Ajax
    Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);    // Menyimpan perubahan data user Ajax
    
    Route::get('/{id}/confirm_delete', [UserController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete user Ajax
    Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']);  // Untuk hapus data user Ajax

    Route::delete('/{id}', [UserController::class, 'destroy']);// Menghapus data user
});



Route::get('/level', [LevelController::class, "index"]);
Route::get('/kategori', [KategoriController::class, "index"]);

// CRUD untuk m_level
Route::group(['prefix' => 'level'], function () {
    Route::get('/', [LevelController::class, 'index']);
    Route::get('/list', [LevelController::class, 'list']);
    Route::get('/create', [LevelController::class, 'create']);
    Route::post('/', [LevelController::class, 'store']); // Menambahkan rute POST
    Route::get('/create_ajax', [LevelController::class, 'create_ajax']);
    Route::post('/ajax', [LevelController::class, 'store_ajax']);
    Route::get('/{id}/show', [LevelController::class, 'show']);
    Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']);
});

// CRUD untuk m_kategori
Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [KategoriController::class, 'index']);
    Route::get('/list', [KategoriController::class, 'list']);
    Route::get('/create', [KategoriController::class, 'create']);
    Route::post('/', [KategoriController::class, 'store']); // Sudah ada
    Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);
    Route::post('/ajax', [KategoriController::class, 'store_ajax'])->withoutMiddleware('auth');
    Route::get('/{id}/show', [KategoriController::class, 'show']);
    Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);
});

// CRUD untuk m_supplier
Route::group(['prefix' => 'suplier'], function () {
    Route::get('/', [SuplierController::class, 'index']);
    Route::get('/list', [SuplierController::class, 'list']);
    Route::get('/create', [SuplierController::class, 'create']);
    Route::post('/', [SuplierController::class, 'store']); // Menambahkan rute POST
    Route::get('/create_ajax', [SuplierController::class, 'create_ajax']);
    Route::post('/ajax', [SuplierController::class, 'store_ajax']);
    Route::get('/{id}/show', [SuplierController::class, 'show']);
    Route::get('/{id}/edit_ajax', [SuplierController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [SuplierController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [SuplierController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [SuplierController::class, 'delete_ajax']);
});


// CRUD untuk m_barang
Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [BarangController::class, 'index']);
    Route::post('/list', [BarangController::class, 'list']);
    Route::get('/create', [BarangController::class, 'create']);
    Route::post('/', [BarangController::class, 'store']); // Menambahkan rute POST
    Route::get('/create_ajax', [BarangController::class, 'create_ajax']);
    Route::post('/ajax', [BarangController::class, 'store_ajax'])->name('barang.store_ajax');
    Route::get('/{id}/show', [BarangController::class, 'show']);
    Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);
});