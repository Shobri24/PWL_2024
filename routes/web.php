<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BabyController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\BeautyController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeCareController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index']);

// User Routes
Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']); // Display user listing
    Route::post('/list', [UserController::class, 'list']); // Return user data in JSON for datatables
    Route::get('/create', [UserController::class, 'create']); // Show form to add a new user
    Route::post('/', [UserController::class, 'store']); // Save a new user
    Route::get('/create_ajax', [UserController::class, 'create_ajax']); // menampilkan halaman form tambah user ajax
    Route::post('/ajax', [UserController::class, 'store_ajax']); // menyimpan data user baru ajax
    Route::get('/{id}', [UserController::class, 'show']); // Show user details
    Route::get('/{id}/edit', [UserController::class, 'edit']); // Show form to edit user
    Route::put('/{id}', [UserController::class, 'update']); // Save edited user details
    Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']); // Show form to edit user ajax
    Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']); // Save edited user details ajax
    Route::delete('/{id}', [UserController::class, 'destroy']); // Delete user
});

// Level Routes
Route::group(['prefix' => 'level'], function () {
    Route::get('/', [LevelController::class, 'index']); // Display level listing
    Route::post('/list', [LevelController::class, 'list']); // Return level data in JSON for datatables
    Route::get('/create', [LevelController::class, 'create']); // Show form to add a new level
    Route::post('/', [LevelController::class, 'store']); // Save a new level
    Route::get('/{id}', [LevelController::class, 'show']); // Show level details
    Route::get('/{id}/edit', [LevelController::class, 'edit']); // Show form to edit level
    Route::put('/{id}', [LevelController::class, 'update']); // Save edited level details
    Route::delete('/{id}', [LevelController::class, 'destroy']); // Delete level
});

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [KategoriController::class, 'index']); // Display level listing
    Route::post('/list', [KategoriController::class, 'list']); // Return level data in JSON for datatables
    Route::get('/create', [KategoriController::class, 'create']); // Show form to add a new level
    Route::post('/', [KategoriController::class, 'store']); // Save a new level
    Route::get('/{id}', [KategoriController::class, 'show']); // Show level details
    Route::get('/{id}/edit', [KategoriController::class, 'edit']); // Show form to edit level
    Route::put('/{id}', [KategoriController::class, 'update']); // Save edited level details
    Route::delete('/{id}', [KategoriController::class, 'destroy']); // Delete level
});

Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [BarangController::class, 'index']); // Display level listing
    Route::post('/list', [BarangController::class, 'list']); // Return level data in JSON for datatables
    Route::get('/create', [BarangController::class, 'create']); // Show form to add a new level
    Route::post('/', [BarangController::class, 'store']); // Save a new level
    Route::get('/{id}', [BarangController::class, 'show']); // Show level details
    Route::get('/{id}/edit', [BarangController::class, 'edit']); // Show form to edit level
    Route::put('/{id}', [BarangController::class, 'update']); // Save edited level details
    Route::delete('/{id}', [BarangController::class, 'destroy']); // Delete level
});

Route::group(['prefix' => 'supplier'], function () {
    Route::get('/', [SupplierController::class, 'index']); // Display level listing
    Route::post('/list', [SupplierController::class, 'list']); // Return level data in JSON for datatables
    Route::get('/create', [SupplierController::class, 'create']); // Show form to add a new level
    Route::post('/', [SupplierController::class, 'store']); // Save a new level
    Route::get('/{id}', [SupplierController::class, 'show']); // Show level details
    Route::get('/{id}/edit', [SupplierController::class, 'edit']); // Show form to edit level
    Route::put('/{id}', [SupplierController::class, 'update']); // Save edited level details
    Route::delete('/{id}', [SupplierController::class, 'destroy']); // Delete level
});
