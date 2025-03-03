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
    Route::get('/', [UserController::class, 'index']);       // menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']);   // menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']);// menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);      // menyimpan data user baru
    Route::get('/{id}', [UserController::class, 'show']);    // menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']);  // menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']);     // menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']);// menghapus data user
});


Route::get('/level', [LevelController::class, "index"]);
Route::get('/kategori', [KategoriController::class, "index"]);

// CRUD untuk m_level
Route::group(['prefix' => 'level'], function () {
    Route::get('/', [LevelController::class, 'index']);
    Route::get('/list', [LevelController::class, 'list']);
    Route::get('/create', [LevelController::class, 'create']);
    Route::post('/', [LevelController::class, 'store']);
    Route::get('/{id}', [LevelController::class, 'show']);
    Route::get('/{id}/edit', [LevelController::class, 'edit']);
    Route::put('/{id}', [LevelController::class, 'update']);
    Route::delete('/{id}', [LevelController::class, 'destroy']);
});

// CRUD untuk m_kategori
Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [KategoriController::class, 'index']);
    Route::get('/list', [KategoriController::class, 'list']);
    Route::get('/create', [KategoriController::class, 'create']);
    Route::post('/', [KategoriController::class, 'store']);
    Route::get('/{id}', [KategoriController::class, 'show']);
    Route::get('/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/{id}', [KategoriController::class, 'update']);
    Route::delete('/{id}', [KategoriController::class, 'destroy']);
});

// CRUD untuk m_supplier
Route::group(['prefix' => 'suplier'], function () {
    Route::get('/', [SuplierController::class, 'index']);
    Route::get('/list', [SuplierController::class, 'list']);
    Route::get('/create', action: [SuplierController::class, 'create']);
    Route::post('/', [SuplierController::class, 'store']);
    Route::get('/{id}', [SuplierController::class, 'show']);
    Route::get('/{id}/edit', [SuplierController::class, 'edit']);
    Route::put('/{id}', [SuplierController::class, 'update']);
    Route::delete('/{id}', [SuplierController::class, 'destroy']);
});

// CRUD untuk m_barang
Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [BarangController::class, 'index']);
    Route::get('/list', [BarangController::class, 'list']);
    Route::get('/create', [BarangController::class, 'create']);
    Route::post('/', [BarangController::class, 'store']);
    Route::get('/{id}', [BarangController::class, 'show']);
    Route::get('/{id}/edit', [BarangController::class, 'edit']);
    Route::put('/{id}', [BarangController::class, 'update']);
    Route::delete('/{id}', [BarangController::class, 'destroy']);
});