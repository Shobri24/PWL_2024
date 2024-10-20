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
use App\Http\Controllers\AuthController;


Route::pattern('id', '[0-9]+');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'store']);


Route::middleware(['auth'])->group(function () {
    Route::get('/', [WelcomeController::class, 'index']);

    // User Routes
    Route::middleware(['authorize:ADM'])->group(function () {
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
            Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']); // Show form delet ajax
            Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); // hapus user aajax
            Route::delete('/{id}', [UserController::class, 'destroy']); // Delete user 
        });
    });

    // Level Routes
    Route::middleware(['authorize:ADM'])->group(function () {
        Route::prefix('level')->group(function () {
            Route::get('/', [LevelController::class, 'index'])->name('level.index'); // Display level listing
            Route::post('/list', [LevelController::class, 'list'])->name('level.list'); // Return level data in JSON for datatables
            Route::get('/create', [LevelController::class, 'create'])->name('level.create'); // Show form to add a new level
            Route::post('/', [LevelController::class, 'store'])->name('level.store'); // Save a new level
            Route::get('/create_ajax', [LevelController::class, 'create_ajax'])->name('level.create_ajax'); // Show form to add a new level via AJAX
            Route::post('/ajax', [LevelController::class, 'store_ajax'])->name('level.store_ajax'); // Save new level data via AJAX
            Route::get('/{id}', [LevelController::class, 'show'])->name('level.show'); // Show level details
            Route::get('/{id}/edit', [LevelController::class, 'edit'])->name('level.edit'); // Show form to edit level
            Route::put('/{id}', [LevelController::class, 'update'])->name('level.update'); // Save edited level details
            Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax'])->name('level.edit_ajax'); // Show form to edit level via AJAX
            Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax'])->name('level.update_ajax'); // Save edited level details via AJAX
            Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax'])->name('level.confirm_ajax'); // Show confirmation for delete via AJAX
            Route::delete('/{id}', [LevelController::class, 'destroy'])->name('level.destroy'); // Delete level
            Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax'])->name('level.delete_ajax'); // Delete level via AJAX
        });
    });

    Route::group(['prefix' => 'kategori'], function () {
        Route::get('/', [KategoriController::class, 'index']); // Display level listing
        Route::post('/list', [KategoriController::class, 'list']); // Return level data in JSON for datatables
        Route::get('/create', [KategoriController::class, 'create']); // Show form to add a new level
        Route::post('/', [KategoriController::class, 'store']); // Save a new level
        Route::get('/create_ajax', [KategoriController::class, 'create_ajax']); // menampilkan halaman form tambah level ajax
        Route::post('/ajax', [KategoriController::class, 'store_ajax']); // menyimpan data user baru ajax
        Route::get('/{id}', [KategoriController::class, 'show']); // Show level details
        Route::get('/{id}/edit', [KategoriController::class, 'edit']); // Show form to edit level
        Route::put('/{id}', [KategoriController::class, 'update']); // Save edited level details
        Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']); // Show form to edit level ajax
        Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']); // Save edited level details ajax
        Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']); // Show form delet ajax
        Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']); // hapus level aajax
        Route::delete('/{id}', [KategoriController::class, 'destroy']); // Delete level
    });

    Route::group(['prefix' => 'barang'], function () {
        Route::get('/', [BarangController::class, 'index']); // Display level listing
        Route::post('/list', [BarangController::class, 'list']); // Return level data in JSON for datatables
        Route::get('/create', [BarangController::class, 'create']); // Show form to add a new level
        Route::post('/', [BarangController::class, 'store']); // Save a new level
        Route::get('/create_ajax', [BarangController::class, 'create_ajax']); // menampilkan halaman form tambah level ajax
        Route::post('/ajax', [BarangController::class, 'store_ajax']); // menyimpan data user baru ajax
        Route::get('/{id}', [BarangController::class, 'show']); // Show level details
        Route::get('/{id}/edit', [BarangController::class, 'edit']); // Show form to edit level
        Route::put('/{id}', [BarangController::class, 'update']); // Save edited level details
        Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']); // Show form to edit level ajax
        Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']); // Save edited level details ajax
        Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); // Show form delet ajax
        Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); // hapus level aajax
        Route::delete('/{id}', [BarangController::class, 'destroy']); // Delete level
        Route::get('/import', [BarangController::class, 'import']);
        Route::post('/import_ajax', [BarangController::class, 'import_ajax']);
        Route::get('/export_excel', [BarangController::class, 'export_excel']);
        Route::get('/export_pdf', [BarangController::class, 'export_pdf']);
    });

    Route::middleware(['authorize:ADM,MNG'])->group(function () {
        Route::group(['prefix' => 'supplier'], function () {
            Route::get('/', [SupplierController::class, 'index']); // Display level listing
            Route::post('/list', [SupplierController::class, 'list']); // Return level data in JSON for datatables
            Route::get('/create', [SupplierController::class, 'create']); // Show form to add a new level
            Route::post('/', [SupplierController::class, 'store']); // Save a new level
            Route::get('/create_ajax', [SupplierController::class, 'create_ajax']); // menampilkan halaman form tambah level ajax
            Route::post('/ajax', [SupplierController::class, 'store_ajax']); // menyimpan data user baru ajax
            Route::get('/{id}', [SupplierController::class, 'show']); // Show level details
            Route::get('/{id}/edit', [SupplierController::class, 'edit']); // Show form to edit level
            Route::put('/{id}', [SupplierController::class, 'update']); // Save edited level details
            Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']); // Show form to edit level ajax
            Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']); // Save edited level details ajax
            Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']); // Show form delet ajax
            Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']); // hapus level aajax
            Route::delete('/{id}', [SupplierController::class, 'destroy']); // Delete level
        });
    });
});
