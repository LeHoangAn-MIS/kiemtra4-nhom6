<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\BookController;

// Trang mặc định
Route::get('/sach', [BookController::class, 'sach']);

// Lọc theo thể loại
Route::get('/sach/theloai/{id}', [BookController::class, 'theloai']);

// Chi tiết sách
Route::get('sach/chitiet/{id}','App\Http\Controllers\BookController@chitiet');

use App\Http\Controllers\CategoryController;

Route::get('/danhmuc', [CategoryController::class, 'index'])->name('danhmuc');
Route::get('/danhmuc/them', [CategoryController::class, 'create'])->name('danhmuc.create');
Route::post('/danhmuc/them', [CategoryController::class, 'store'])->name('danhmuc.store');

Route::get('/danhmuc/sua/{id}', [CategoryController::class, 'edit'])->name('danhmuc.edit');
Route::post('/danhmuc/capnhat', [CategoryController::class, 'update'])->name('danhmuc.update');

Route::get('/danhmuc/xoa/{id}', [CategoryController::class, 'delete'])->name('danhmuc.delete');