<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

// Trang mặc định
Route::get('/sach', [BookController::class, 'sach']);

// Lọc theo thể loại
Route::get('/sach/theloai/{id}', [BookController::class, 'theloai']);

// Chi tiết sách
Route::get('sach/chitiet/{id}','App\Http\Controllers\BookController@chitiet');

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
