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

use App\Http\Controllers\CategoryController;

Route::get('/danhmuc', [CategoryController::class, 'index'])->name('danhmuc');
Route::get('/danhmuc/them', [CategoryController::class, 'create'])->name('danhmuc.create');
Route::post('/danhmuc/them', [CategoryController::class, 'store'])->name('danhmuc.store');

Route::get('/danhmuc/sua/{id}', [CategoryController::class, 'edit'])->name('danhmuc.edit');
Route::post('/danhmuc/capnhat', [CategoryController::class, 'update'])->name('danhmuc.update');

Route::get('/danhmuc/xoa/{id}', [CategoryController::class, 'delete'])->name('danhmuc.delete');

Route::get("/layouts/sach_layout","App\Http\Controllers\BookController@sach");

Route::get('/sach/theloai/{id}','App\Http\Controllers\BookController@theloai');

Route::get('sach/chitiet/{id}', 'App\Http\Controllers\BookController@chitiet');


Route::get('/order','App\Http\Controllers\BookController@order')->name('order');

Route::post('/cart/add','App\Http\Controllers\BookController@cartadd')->name('cartadd');

Route::post('/cart/delete','App\Http\Controllers\BookController@cartdelete')->name('cartdelete');

Route::post('/order/create','App\Http\Controllers\BookController@ordercreate')
    ->middleware('auth')->name('ordercreate');

