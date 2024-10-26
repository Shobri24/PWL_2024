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
use App\Http\Controllers\DetailController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProfileController;
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

    Route::middleware(['authorize:ADM,MNG,STF,CUS'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'index']);
        Route::get('/profile/{id}/edit_ajax', [ProfileController::class, 'edit_ajax']);
        Route::put('/profile/{id}/update_ajax', [ProfileController::class, 'update_ajax']);
        Route::get('/profile/{id}/edit_foto', [ProfileController::class, 'edit_foto']);
        Route::put('/profile/{id}/update_foto', [ProfileController::class, 'update_foto']);
    });
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
            Route::post('/stok/import_ajax', [UserController::class, 'import_ajax']); // ajax import excel
            Route::get('/stok/export_excel', [UserController::class, 'export_excel']); // export excel
            Route::get('/stok/export_pdf', [UserController::class, 'export_pdf']); // export pdf
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
            Route::post('import_ajax', [LevelController::class, 'import_ajax']); // ajax import excel
            Route::get('export_excel', [LevelController::class, 'export_excel']); // export excel
            Route::get('export_pdf', [LevelController::class, 'export_pdf']); // export pdf
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
        Route::post('import_ajax', [KategoriController::class, 'import_ajax']); // ajax import excel
        Route::get('export_excel', [KategoriController::class, 'export_excel']); // export excel
        Route::get('export_pdf', [KategoriController::class, 'export_pdf']); // export pdf
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
            Route::post('import_ajax', [SupplierController::class, 'import_ajax']); // ajax import excel
            Route::get('export_excel', [SupplierController::class, 'export_excel']); // export excel
            Route::get('export_pdf', [SupplierController::class, 'export_pdf']); // export pdf
        });
    });

    Route::middleware(['authorize:ADM,MNG'])->group(function () {
        Route::get('/stok', [StokController::class, 'index']); // menampilkan halaman awal stok
        Route::post('/stok/list', [StokController::class, 'list']); // menampilkan data stok dalam bentuk json untuk datatables
        Route::get('/stok/create', [StokController::class, 'create']); // menampilkan halaman form tambah stok
        Route::post('/stok', [StokController::class, 'store']); // menyimpan data stok baru
        Route::get('/stok/create_ajax', [StokController::class, 'create_ajax']); // menampilkan halaman form tambah stok Ajax
        Route::post('/stok/ajax', [StokController::class, 'store_ajax']); // menyimpan data stok baru Ajax
        Route::get('/stok/{id}', [StokController::class, 'show']); // menampilkan detail stok
        Route::get('/stok/{id}/edit', [StokController::class, 'edit']); // menampilkan halaman form edit stok
        Route::get('/stok/{id}/edit_ajax', [StokController::class, 'edit_ajax']); // menampilkan halaman form edit stok Ajax
        Route::put('/stok/{id}', [StokController::class, 'update']); // menyimpan perubahan data stok
        Route::put('/stok/{id}/update_ajax', [StokController::class, 'update_ajax']); // menyimpan perubahan data stok Ajax
        Route::get('/stok/{id}/delete_ajax', [StokController::class, 'confirm_ajax']); // untuk tampilkan form confirm delete stok Ajax
        Route::delete('/stok/{id}/delete_ajax', [StokController::class, 'delete_ajax']); // untuk hapus data stok Ajax 
        Route::delete('/stok/{id}', [StokController::class, 'destroy']); // menghapus data stok
        Route::get('/stok/import', [StokController::class, 'import']); // ajax form upload excel
        Route::post('/stok/import_ajax', [StokController::class, 'import_ajax']); // ajax import excel
        Route::get('/stok/export_excel', [StokController::class, 'export_excel']); // export excel
        Route::get('/stok/export_pdf', [StokController::class, 'export_pdf']); // export pdf
    });

    Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
        Route::get('/penjualan', [PenjualanController::class, 'index']);          // menampilkan halaman awal stok
        Route::post('/penjualan/list', [PenjualanController::class, 'list']);      // menampilkan data stok dalam bentuk json untuk datatables
        Route::get('/penjualan/create', [PenjualanController::class, 'create']);   // menampilkan halaman form tambah stok
        Route::get('/penjualan/create_ajax', [PenjualanController::class, 'create_ajax']);
        Route::post('/penjualan/ajax', [PenjualanController::class, 'store_ajax']);
        Route::post('/penjualan', [PenjualanController::class, 'store']);         // menyimpan data stok baru
        Route::get('/penjualan/import', [PenjualanController::class, 'import']);
        Route::post('/penjualan/import_ajax', [PenjualanController::class, 'import_ajax']);
        Route::get('/penjualan/export_excel', [PenjualanController::class, 'export_excel']); // export excel
        Route::get('/penjualan/export_pdf', [PenjualanController::class, 'export_pdf']); // export pdf
        Route::get('/penjualan/{id}', [PenjualanController::class, 'show']);       // menampilkan detail stok
        Route::get('/penjualan/{id}/edit', [PenjualanController::class, 'edit']);  // menampilkan halaman form edit stok
        Route::put('/penjualan/{id}', [PenjualanController::class, 'update']);     // menyimpan perubahan data stok
        Route::get('/penjualan/{id}/edit_ajax', [PenjualanController::class, 'edit_ajax']);
        Route::put('/penjualan/{id}/update_ajax', [PenjualanController::class, 'update_ajax']);
        Route::get('/penjualan/{id}/delete_ajax', [PenjualanController::class, 'confirm_ajax']);
        Route::delete('/penjualan/{id}/delete_ajax', [PenjualanController::class, 'delete_ajax']);
        Route::delete('/penjualan/{id}', [PenjualanController::class, 'destroy']); // menghapus data stok
    });
    Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
        Route::get('/detail', [DetailController::class, 'index']);          // menampilkan halaman awal stok
        Route::post('/detail/list', [DetailController::class, 'list']);  // menampilkan halaman form tambah stok
        Route::get('/detail/create_ajax', [DetailController::class, 'create_ajax']);
        Route::post('/detail/ajax', [DetailController::class, 'store_ajax']);       // menyimpan data stok baru
        Route::get('/detail/import', [DetailController::class, 'import']);
        Route::post('/detail/import_ajax', [DetailController::class, 'import_ajax']);
        Route::get('/detail/export_excel', [DetailController::class, 'export_excel']); // export excel
        Route::get('/detail/export_pdf', [DetailController::class, 'export_pdf']); // export pdf
        Route::get('/detail/{id}', [DetailController::class, 'show']);    // menyimpan perubahan data stok
        Route::get('/detail/{id}/edit_ajax', [DetailController::class, 'edit_ajax']);
        Route::put('/detail/{id}/update_ajax', [DetailController::class, 'update_ajax']);
        Route::get('/detail/{id}/delete_ajax', [DetailController::class, 'confirm_ajax']);
        Route::delete('/detail/{id}/delete_ajax', [DetailController::class, 'delete_ajax']);
        Route::delete('/detail/{id}', [DetailController::class, 'destroy']); // menghapus data stok
    });
});
