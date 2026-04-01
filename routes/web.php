<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
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
=======
>>>>>>> origin/truonghomailinh

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
Route::get('/book/list','App\Http\Controllers\BookController@booklist')
->middleware('auth')->name("booklist");
Route::get('/book/create','App\Http\Controllers\BookController@bookcreate')
->middleware('auth')->name("bookcreate");
Route::get('/book/edit/{id}','App\Http\Controllers\BookController@bookedit')
->middleware('auth')->name("bookedit");
Route::post('/book/save/{action}','App\Http\Controllers\BookController@booksave')
->middleware('auth')->name("booksave");
Route::post('/book/delete','App\Http\Controllers\BookController@bookdelete')
->middleware('auth')->name("bookdelete");
Route::get('/book/create','App\Http\Controllers\BookController@bookcreate')
->middleware('auth')->name("bookcreate");
