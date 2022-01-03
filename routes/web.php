<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

// get untuk ambil atau tampilkan data
// post untuk mengirim data
// put/patch untuk mengedit data
// delete untuk menghapus data

// ini untuk ambil Semua data
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');

// ini ambil salah satu data
Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('category.show');

//prefix
Route::prefix('album')->group(function(){
    Route::get('/create', [AlbumController::class, 'create'])->name('album.create');
    Route::post('/store', [AlbumController::class, 'store'])->name('album.store');
    Route::get('/{album:slug}', [AlbumController::class, 'show'])->name('album.show');
    Route::get('/album-edit/{album:slug}', [AlbumController::class, 'edit'])->name('album.edit');
    Route::put('/update/{album:slug}', [AlbumController::class, 'update'])->name('album.update');
    Route::delete('/album-delete/{album:slug}', [AlbumController::class, 'destroy'])->name('album.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
