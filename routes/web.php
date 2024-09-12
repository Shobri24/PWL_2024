<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BabyController;
use App\Http\Controllers\BeautyController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeCareController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/world', function () {
    return 'World';
});

Route::get('/', function () {
    return 'Selamat Datang';
});

Route::get('/about', function () {
    return '2241760092_Muhammad Shobri Al Mughdhor';
});

Route::get('/user/{name}', function ($name) {
    return 'Nama saya ' .$name;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-' .$postId. "Komentar ke-:" .$commentId;
});

Route::get('/articles/{id}', function ($id) {
    return 'Halaman Artikel dengan ID ' . $id;
});

Route::get('/user/{name?}', function ($name=null) {
    return 'Nama Saya ' . $name;
});

Route::get('/user/{name?}', function ($name='John') {
    return 'Nama Saya ' . $name;
});

Route::get ('/hello', [WelcomeController::class,'hello']);

Route::get ('/', [WelcomeController::class,'index']);

Route::get ('/about', [WelcomeController::class,'about']);

Route::get ('/articles/{id}', [WelcomeController::class,'articles']);

Route::get ('/', [HomeController::class,'welcome']);

Route::get ('/about', [AboutController::class,'about']);

Route::get ('/article/{id}', [ArticleController::class,'article']);

Route::resource('photos', PhotoController::class);

Route::resource('photos', PhotoController::class)->only((['index', 'show']));

Route::resource('photos', PhotoController::class)->except('create', 'store', 'update', 'destroy');

/*Route::get('greeting', function() {
    return view('hello', ['name' => 'Shobri']);
});*/

/*Route::get('greeting', function() {
    return view('blog.hello', ['name' => 'Shobri']);
});*/

Route::get('/greeting', [WelcomeController::class, 'greeting']);

Route::get('/', [HomeController::class, 'index']);


Route::get('/food-beverage', [FoodController::class, 'food_beverage']);
Route::get('/beauty-health', [BeautyController::class, 'beauty_health']);
Route::get('/home-care', [HomeCareController::class, 'home_care']);
Route::get('/baby-kid', [BabyController::class, 'baby_kid']);

Route::get('/user/{id}/name/{name}', [UserController::class, 'show']);

Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan');

Route::get('/level', [LevelController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);