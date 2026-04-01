<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

// Trang mặc định
Route::get('/sach', [BookController::class, 'sach']);
Route::get('/accountpanel', 'App\Http\Controllers\AccountController@accountpanel')
    ->middleware('auth')
    ->name('account');

// Lọc theo thể loại
Route::get('/sach/theloai/{id}', [BookController::class, 'theloai']);

// Chi tiết sách
Route::get('sach/chitiet/{id}','App\Http\Controllers\BookController@chitiet');

Route::get('/', 'App\Http\Controllers\BookController@sach');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/saveinfo', 'App\Http\Controllers\AccountController@saveaccountinfo')
    ->middleware('auth')
    ->name('saveinfo');

require __DIR__.'/auth.php';
